<?php

require_once dirname(__FILE__).'/../lib/playerGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/playerGeneratorHelper.class.php';

/**
 * player actions.
 *
 * @package    sfHfLan
 * @subpackage player
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class playerActions extends autoPlayerActions
{
  public function executeListExportCsv(sfWebRequest $request)
  {
    $ms = true;
    $this->options = array('ms' => $ms);

    $query = $this->getPlayersFromFilterQuery();

    $this->lines = $query->fetchArray();

    $this->outstream = 'php://output';
    $this->delimiter = $ms ? ';' : ',';
    $this->enclosure = '"';
    $this->charset   = array('db' => 'UTF-8', 'ms' => 'WINDOWS-1252//TRANSLIT');


    sfConfig::set('sf_web_debug', false);
    sfConfig::set('sf_escaping_strategy', false);
    sfConfig::set('sf_charset', $ms ? $this->charset['ms'] : $this->charset['db']);
    $this->getResponse()->clearHttpHeaders();
    $this->getResponse()->setContentType('text/csv');
    $this->getResponse()->setHttpHeader('content-disposition', 'attachment; filename=objectives.csv');
    $this->setLayout(false);
  }

  public function executeListBooking(sfWebRequest $request)
  {
    $this->form = new BookingForm();

    if ($request->isMethod('post'))
    {
      $this->form->bind($request->getPostParameters());
      if ($this->form->isValid())
      {
        $values = $this->form->getValues();
        $emails = $values['input'];
        $tournament = TournamentTable::getInstance()->findOneById($values['tournament']);

        $num = 0;
        foreach($emails as $email => $nick)
        {
          $count = PlayerTable::getInstance()->findOneByEmail($email);
          if($count)
          {
            $num++;
            $this->getUser()->setFlash('error', $num." joueurs déja inscrit(s).", false);
          }
          else
          {
            $player = $this->createBookedPlayer($email, $nick, $tournament);
            $this->sendConfirmationMail($player);
          }
        }

        $this->getUser()->setFlash('notice', (count($emails)-$num)." joueurs inscrits.", false);
      }
      else
      {
        $this->getUser()->setFlash('error', "Erreurs dans le formulaire.", false);
      }
    }
  }

  public function executeListMailingList(sfWebRequest $request)
  {
    $players = $this->getPlayersFromFilter();

    if($players->count() > 0)
    {
      $emails = array();
      foreach($players as $player)
      {
        $emails[] = $player->getEmail();
      }
      $this->emails = implode(", ", $emails);
      $this->link = implode(",", $emails);
    }
    else
    {
      $this->emails = false;
      $this->link = false;
    }

  }

  protected function createBookedPlayer($email, $nick, $tournament)
  {
    $player = new Player();
    $player->setFirstname("-");
    $player->setLastname("-");
    $player->setNickname($nick);
    $player->setEmail($email);
    $player->setTournament($tournament);
    $player->save();

    return $player;
  }

  protected function getPlayersFromFilterQuery()
  {
    $holder = $this->getUser()->getAttributeHolder()->getAll('admin_module');

    $query = PlayerTable::getInstance()->createQuery();

    if (isset($holder['player.filters']))
    {
      $parameters = $holder['player.filters'];
      $form = new PlayerNoCSRFFormFilter($parameters);
      $form->setQuery($query);

      $form->bind($parameters);
      if ($form->isValid()) {
        $query = $form->getQuery(); // apply filters to the query
      }
    }

    return $query;
  }

  protected function getPlayersFromFilter()
  {
    return $this->getPlayersFromFilterQuery()->execute();
  }

  protected function sendConfirmationMail($player)
  {
    $editUrl = "http://www.hf-lan.fr/inscriptions/edit/".$player->getToken();
    $cancelUrl = "http://www.hf-lan.fr/inscriptions/cancel/".$player->getToken();

    $nick = $player->getNickname();

    $message = $this->getMailer()->compose(
      array('noreply@hf-lan.fr' => 'hf.lan'),
      $player->getEmail(),
      'Confirmez votre pré-inscription à la hf-lan / Confirm your pre-registration for the hf.lan',
      <<<EOF
Bonjour, $nick.

Vous avez été pré-inscrit à la hf-lan !
http://www.hf-lan.fr

Pour finaliser votre inscription, merci de compléter votre fiche à l'adresse suivante :
$editUrl

Pour toute information complémentaire, n'hésitez pas à contecter le staff hf.lan :
infos@hf-lan.fr

------------------------

Hello, $nick.

You have been pre-registered to the hf-lan !
http://www.hf-lan.fr

To complete your inscription, please fill the following form :
$editUrl

For any additional information, make sure to contact the hf.lan staff :
infos@hf-lan.fr
EOF
    );
    $this->getMailer()->send($message);
  }
}

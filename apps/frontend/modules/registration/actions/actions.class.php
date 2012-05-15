<?php

/**
 * registration actions.
 *
 * @package    sfHfLan
 * @subpackage registration
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class registrationActions extends sfActions
{
  public function executeClosed(sfWebRequest $request) {}

  public function executeFull(sfWebRequest $request) {}
  
  /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->redirect("registration/step1");
  }

  public function executeStep1(sfWebRequest $request)
  {
    $event = EventTable::getInstance()->findUpComingEvent();

    $this->forwardClosedIfNoEventUpcoming();

    $this->form = new TournamentChooserForm(array(), array('event' => $event));

    if ($request->isMethod('post'))
    {
      $this->form->bind($request->getPostParameters());
      if ($this->form->isValid())
      {
        $tid = $request->getParameter('tournament');
        $tournament = TournamentTable::getInstance()->findOneById($tid);
        $this->getUser()->setAttribute('tournament', $tournament);
        $this->redirect("registration/step2");
      }
      else
      {
        $this->getUser()->setFlash('error', "Erreurs dans le formulaire.", false);
      }
    }
  }
  
  public function executeStep2(sfWebRequest $request)
  {
    $this->forwardClosedIfNoEventUpcoming();

    $tournament = $this->getUser()->getAttribute('tournament');

    $this->forward404Unless($tournament and $tournament instanceof Tournament);

    $this->forwardIf($tournament->isFull(), "registration", "full");

    $this->form = new TournamentSignupForm(array(), array('tournament' => $tournament));
    if ($request->isMethod('post'))
    {
      $this->form->bind($request->getPostParameters());
      if ($this->form->isValid())
      {
        $this->form->save();
        $players = $this->form->getPlayers();
        $this->getUser()->setAttribute('players', $players);
        $this->getUser()->setFlash('notice', "Inscription prise en compte !", false);
        $this->redirect("registration/confirm");
      }
      else
      {
        $this->getUser()->setFlash('error', "Erreurs dans le formulaire.", false);
      }
    }
  }

  public function executeEditPlayer(sfWebRequest $request)
  {
    $this->player = $this->getRoute()->getObject();

    $tournament = $this->player->getTournament();

    $this->form = new PlayerTournamentForm($this->player, array('tournament' => $tournament));

    if($request->isMethod('post'))
    {
      $this->form->bind($request->getParameter($this->form->getName()));
      if ($this->form->isValid())
      {
        $this->form->save();
        $this->getUser()->setFlash('notice', "Fiche du joueur mise a jour.", false);
      }
      else
      {
        $this->getUser()->setFlash('error', "Erreurs dans le formulaire.", false);
      }
    }
  }

  public function executeCancelPlayer(sfWebRequest $request)
  {
    $this->player = $this->getRoute()->getObject();

    $firstName = $this->player->getFirstName();
    $lastName = $this->player->getLastName();

    $this->player->delete();

    $this->getUser()->setFlash('notice', "La désinscription de $firstName $lastName a bien été prise en compte.", true);

    $this->redirect("home/index");
  }

  public function executeConfirm(sfWebRequest $request)
  {
    $this->forwardClosedIfNoEventUpcoming();

    $players = $this->getUser()->getAttribute('players');
    $tournament = $this->getUser()->getAttribute('tournament');

    $this->forward404Unless($players);
    $this->forward404Unless($tournament and $tournament instanceof Tournament);

    foreach($players as $player)
    {
      $this->sendConfirmationMail($player);
    }

    $event = EventTable::getInstance()->findUpComingEvent();
    $this->event = $event;

    $this->isUpComing = ($event);
  }

  protected function forwardClosedIfNoEventUpcoming()
  {
    $event = EventTable::getInstance()->findUpComingEvent();

    $this->ForwardUnless(
      ($event) AND
        ($event->getIsOpened()) AND
          ($event->getTournaments()->count() > 0),
      "registration", "closed"
    );
  }

  protected function sendConfirmationMail($player)
  {
    $editUrl = "http://www.hf-lan.fr/inscriptions/edit/".$player->getToken();
    $cancelUrl = "http://www.hf-lan.fr/inscriptions/cancel/".$player->getToken();

    $message = $this->getMailer()->compose(
      array('noreply@hf-lan.fr' => 'hf.lan'),
      $player->getEmail(),
      'Vous êtes inscrit à la hf-lan / You are registered to the hf.lan',
      <<<EOF
Votre inscription à la hf.lan a bien été enregistré.

Vous pouvez modifier votre inscription ou vous désinscrire avec le lien suivant :
$editUrl

Pour toute information complémentaire, n'hésitez pas à contecter le staff hf.lan.
infos@hf-lan.fr

--------------------

Your registration to the hf.lan is now complete !

You can modify your registration at the following URL:
$editUrl

For any additional information, make sure to contact the hf.lan staff :
infos@hf-lan.fr
EOF
    );
    $this->getMailer()->send($message);
  }
}

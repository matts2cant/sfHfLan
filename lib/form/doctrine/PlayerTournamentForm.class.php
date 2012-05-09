<?php

/**
 * Player form.
 *
 * @package    sfHfLan
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PlayerTournamentForm extends PlayerForm
{
  public function configure()
  {
    parent::configure();

    unset($this['token']);

    $this->widgetSchema->setLabels(array(
      'firstname'    => 'Prénom<br/><span class="small">First name</span>',
      'lastname'   => 'Nom<br/><span class="small">Last Name</span>',
      'nickname' => 'Pseudo<br/><span class="small">Nickname</span>',
      'email'    => 'email',
      'team'   => 'Nom d\'quipe<br/><span class="small">Team name</span>',
      'team_tag' => 'Tag d\'équipe<br/><span class="small">Team tag</span>',
      'pc_type'    => 'Type de PC<br/><span class="small">PC type</span>',
      'wants_cable'   => 'Cable réseau ? (+7€)<br/><span class="small">Network cable ?(+7€)</span>',
      'bnet_email'    => 'email Battle.net<br/><span class="small">Battle.net email</span>',
      'bnet_ccode'   => 'Character Code',
      'tournament_id' => 'Tournoi<br/><span class="small">Tournament</span>',
      'subtournament'    => 'Sous-tournoi<br/><span class="small">Sub-tournament</span>',
    ));

    $tournament = $this->getOption('tournament');
    unset($this['tournament_id'], $this['team'], $this['team_tag']);
    if(!$tournament->hasGame() OR !$tournament->getGame()->getRequiresBnetId())
    {
      unset($this['bnet_email'], $this['bnet_ccode']);
    }
    else
    {
      $this->setValidator('bnet_email', new sfValidatorEmail(array("required" => true)));
      $this->setValidator('bnet_ccode', new sfValidatorInteger(array("required" => true)));
    }

    if(!$tournament->getIsSubtournamentEnabled())
    {
      unset($this['subtournament']);
    }
    else
    {
      $stName = $tournament->getSubtournamentName();
      if($tournament->getSubtournamentInscriptionPrice() > 0)
      {
        $stName .= " (+".$tournament->getSubtournamentInscriptionPrice()."€)";
      }
      else
      {
        $stName .= " (Gratuit)";
      }
      $this->widgetSchema->setLabel('subtournament', $stName);
    }
  }
}

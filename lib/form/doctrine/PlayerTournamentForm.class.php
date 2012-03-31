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

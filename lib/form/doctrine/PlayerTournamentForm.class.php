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
    if(!$tournament->getGame()->getRequiresBnetId())
    {
      unset($this['bnet_email'], $this['bnet_ccode']);
    }

    if(!$tournament->getIsSubtournamentEnabled())
    {
      unset($this['subtournament']);
    }
    else
    {
      $stName = $tournament->getSubtournamentName();
      if($tournament->getSubtournamentPrice() > 0)
      {
        $stName .= " (+".$tournament->getSubtournamentPrice()."€)";
      }
      else
      {
        $stName .= " (Gratuit)";
      }
      $this->widgetSchema->setLabel('subtournament', $stName);
    }
  }
}

<?php

/**
 * Player form.
 *
 * @package    sfHfLan
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PlayerForm extends BasePlayerForm
{
  public function configure()
  {
    unset($this['created_at'], $this['updated_at'], $this['token']);

    $this->setWidget('email', new sfWidgetFormInput());
    $this->setValidator('email', new sfValidatorEmail());

    $this->setWidget('bnet_email', new sfWidgetFormInput());
    $this->setValidator('bnet_email', new sfValidatorEmail(array("required" => false)));

    $this->setWidget('bnet_ccode', new sfWidgetFormInput());
    $this->setValidator('bnet_ccode', new sfValidatorInteger(array("required" => false)));

    if(!$this->isNew())
    {
      $tournament = $this->getObject()->getTournament();
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
}

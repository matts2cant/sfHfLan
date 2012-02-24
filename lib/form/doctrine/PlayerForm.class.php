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
    unset($this['created_at'], $this['updated_at'], $this['slug'], $this['token']);

    $this->widgetSchema->setLabels(array(
      'firstname'    => 'Prénom',
      'lastname'   => 'Nom',
      'nickname' => 'Pseudo',
      'email'    => 'email',
      'team'   => 'Team',
      'team_tag' => 'Tag de team',
      'pc_type'    => 'Type de PC',
      'wants_cable'   => 'Achat d\'un cable réseau',
      'bnet_email'    => 'email Battle.net',
      'bnet_ccode'   => 'Character Code',
      'tournament_id' => 'Tournoi',
      'subtournament'    => 'Sous-tournoi',
    ));

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
}

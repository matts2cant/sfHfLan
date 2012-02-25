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
  public function executeListBooking(sfWebRequest $request)
  {

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
      $this->emails = implode(",", $emails);
    }
    else
    {
      $this->emails = false;
    }

  }

  protected function getPlayersFromFilter()
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

    return $query->execute();
  }
}

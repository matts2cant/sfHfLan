<?php

/**
 * live actions.
 *
 * @package    sfHfLan
 * @subpackage live
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class liveActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->tournaments = EventTable::getInstance()->findUpComingEvent()->getTournaments();

    foreach($this->tournaments as $id => $tournament)
    {
      if($tournament->getEmbeddedPlayer() == '' && $tournament->getBracketImage() == '')
      {
        $this->tournaments->remove($id);
      }
    }
  }
}

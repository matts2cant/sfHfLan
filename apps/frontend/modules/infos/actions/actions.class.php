<?php

/**
 * infos actions.
 *
 * @package    sfHfLan
 * @subpackage infos
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class infosActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $event = EventTable::getInstance()->findUpComingEvent();
    $this->event = $event;

    if($event)
    {
      $this->isUpComing = true;
    }
    else
    {
      $this->isUpComing = false;
    }

  }
}

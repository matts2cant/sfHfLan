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
    $this->isUpComing = false;

    if($event)
    {
      $this->isUpComing = true;

      // Start & end date
      $start = strtotime($event->getStartsAt());
      $finish = strtotime($event->getFinishesAt());
      $monthList = array(1=>'janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre');
      setlocale(LC_TIME, 'fr_FR');
      if (strftime("%Y", $start) == strftime("%Y", $finish))
      {
        if (strftime("%m", $start) == strftime("%m", $finish))
        {
          $this->startDate = strftime("%d", $start);
        }
        else
        {
          $this->startDate = strftime("%d ", $start).$monthList[strftime("%m", $start)];
        }
      }
      else
      {
        $this->startDate = strftime("%d ".$monthList[strftime("%m", $start)]." %Y", $start);
      }
      $this->endDate = strftime("%d ".$monthList[strftime("%m", $finish)]." %Y", $finish);

      // Start & end time
      $this->startTime = strftime("%H:%M", $start);
      $this->endTime = strftime("%H:%M", $finish);

      // Prize-pool
      $this->sum = 0;
      foreach ($event->getTournaments() as $tournament)
      {
        $this->sum += $tournament->getPrizePool();
        if ($tournament->getIsSubtournamentEnabled())
        {
          $this->sum += $tournament->getSubtournamentPrizePool();
        }
      }
    }

  }
}

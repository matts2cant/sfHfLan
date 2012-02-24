<?php
 
class boxesComponents extends sfComponents
{
  public function executeCountbox()
  {
    $this->event = EventTable::getInstance()->findUpComingEvent();
  }
}
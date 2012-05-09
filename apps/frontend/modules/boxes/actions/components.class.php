<?php
 
class boxesComponents extends sfComponents
{
  public function executeCountbox()
  {
    $this->event = EventTable::getInstance()->findUpComingEvent();
  }

  public function executePartnersbox()
  {
    $this->partners = PartnerTable::getInstance()->getAll();
  }
}
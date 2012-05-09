<?php
 
class rulesComponents extends sfComponents
{
  public function executeList()
  {
    $this->games = GameTable::getInstance()->findAll();
  }
}
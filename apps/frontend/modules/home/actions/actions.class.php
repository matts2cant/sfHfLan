<?php

/**
 * home actions.
 *
 * @package    sfHfLan
 * @subpackage home
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class homeActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->blogArticles = ArticleTable::getInstance()->getFourLastArticles();
    $this->sliderArticles = ArticleTable::getInstance()->getFourLastSliderArticles();
    
    $this->games = GameTable::getInstance()->findAll();
  }
}

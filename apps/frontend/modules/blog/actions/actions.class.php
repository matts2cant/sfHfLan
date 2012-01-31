<?php

/**
 * blog actions.
 *
 * @package    sfHfLan
 * @subpackage blog
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class blogActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeList(sfWebRequest $request)
  {
    $this->pager = new sfDoctrinePager(
        'Article',
        10 //a corriger
    );
    
    $this->pager->setQuery(ArticleTable::getInstance()->getBlogsQuery());
    $this->pager->setPage($request->getParameter('page', 1));
    $this->pager->init();
  }
  
  public function executeShow(sfWebRequest $request)
  {
    $this->article = $this->getRoute()->getObject();
  }
}

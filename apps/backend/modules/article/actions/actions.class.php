<?php

require_once dirname(__FILE__).'/../lib/articleGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/articleGeneratorHelper.class.php';

/**
 * article actions.
 *
 * @package    sfHfLan
 * @subpackage article
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class articleActions extends autoArticleActions
{
  public function executeBatchShow(sfWebRequest $request)
  {
    $ids = $request->getParameter('ids');
 
    $q = Doctrine_Query::create()
      ->from('Article a')
      ->whereIn('a.id', $ids);
 
    foreach ($q->execute() as $article)
    {
      $article->setIsShown(true);
      $article->save();
    }
 
    $this->getUser()->setFlash('notice', 'Les articles séléctionnés on été publiés');
 
    $this->redirect('article');
  }
  
  public function executeBatchMask(sfWebRequest $request)
  {
    $ids = $request->getParameter('ids');
 
    $q = Doctrine_Query::create()
      ->from('Article a')
      ->whereIn('a.id', $ids);
 
    foreach ($q->execute() as $article)
    {
      $article->setIsShown(false);
      $article->save();
    }
 
    $this->getUser()->setFlash('notice', 'Les articles séléctionnés on été masqués');
 
    $this->redirect('article');
  }
  
  public function executeListShow(sfWebRequest $request)
  {
    $article = $this->getRoute()->getObject();
    $article->setIsShown(true);
    $article->save();
    
    $this->getUser()->setFlash('notice', 'L\'article séléctionné à été publié.');
 
    $this->redirect('article');
  }
  
  public function executeListMask(sfWebRequest $request)
  {
    $article = $this->getRoute()->getObject();
    $article->setIsShown(false);
    $article->save();
    
    $this->getUser()->setFlash('notice', 'L\'article séléctionné à été masqué.');
 
    $this->redirect('article');
  }
}

<?php

/**
 * ArticleIndex filter form base class.
 *
 * @package    sfHfLan
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseArticleIndexFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
    ));

    $this->setValidators(array(
    ));

    $this->widgetSchema->setNameFormat('article_index_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ArticleIndex';
  }

  public function getFields()
  {
    return array(
      'keyword'  => 'Text',
      'field'    => 'Text',
      'position' => 'Number',
      'id'       => 'Number',
    );
  }
}

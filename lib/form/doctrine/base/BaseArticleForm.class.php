<?php

/**
 * Article form base class.
 *
 * @method Article getObject() Returns the current form's model object
 *
 * @package    sfHfLan
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseArticleForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'image'      => new sfWidgetFormInputText(),
      'url'        => new sfWidgetFormInputText(),
      'title'      => new sfWidgetFormInputText(),
      'content'    => new sfWidgetFormTextarea(),
      'is_shown'   => new sfWidgetFormInputCheckbox(),
      'type'       => new sfWidgetFormChoice(array('choices' => array('blog' => 'blog', 'slider' => 'slider'))),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
      'slug'       => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'image'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'url'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'title'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'content'    => new sfValidatorString(array('max_length' => 4000)),
      'is_shown'   => new sfValidatorBoolean(array('required' => false)),
      'type'       => new sfValidatorChoice(array('choices' => array(0 => 'blog', 1 => 'slider'), 'required' => false)),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
      'slug'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Article', 'column' => array('slug')))
    );

    $this->widgetSchema->setNameFormat('article[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Article';
  }

}

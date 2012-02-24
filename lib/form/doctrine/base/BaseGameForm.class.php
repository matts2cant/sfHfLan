<?php

/**
 * Game form base class.
 *
 * @method Game getObject() Returns the current form's model object
 *
 * @package    sfHfLan
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseGameForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'name'             => new sfWidgetFormInputText(),
      'rules'            => new sfWidgetFormInputText(),
      'players_per_team' => new sfWidgetFormInputText(),
      'requires_bnet_id' => new sfWidgetFormInputCheckbox(),
      'icon'             => new sfWidgetFormInputText(),
      'slug'             => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'             => new sfValidatorString(array('max_length' => 255)),
      'rules'            => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'players_per_team' => new sfValidatorInteger(),
      'requires_bnet_id' => new sfValidatorBoolean(),
      'icon'             => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'slug'             => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Game', 'column' => array('slug')))
    );

    $this->widgetSchema->setNameFormat('game[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Game';
  }

}

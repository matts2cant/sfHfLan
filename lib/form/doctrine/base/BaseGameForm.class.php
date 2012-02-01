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
      'rules_file'       => new sfWidgetFormInputText(),
      'players_per_team' => new sfWidgetFormInputText(),
      'icon'             => new sfWidgetFormInputText(),
      'slug'             => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'             => new sfValidatorString(array('max_length' => 255)),
      'rules_file'       => new sfValidatorString(array('max_length' => 255)),
      'players_per_team' => new sfValidatorString(array('max_length' => 255)),
      'icon'             => new sfValidatorString(array('max_length' => 255)),
      'slug'             => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorDoctrineUnique(array('model' => 'Game', 'column' => array('name'))),
        new sfValidatorDoctrineUnique(array('model' => 'Game', 'column' => array('rules_file'))),
        new sfValidatorDoctrineUnique(array('model' => 'Game', 'column' => array('players_per_team'))),
        new sfValidatorDoctrineUnique(array('model' => 'Game', 'column' => array('icon'))),
        new sfValidatorDoctrineUnique(array('model' => 'Game', 'column' => array('slug'))),
      ))
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

<?php

/**
 * Tournament form base class.
 *
 * @method Tournament getObject() Returns the current form's model object
 *
 * @package    sfHfLan
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTournamentForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                       => new sfWidgetFormInputHidden(),
      'name'                     => new sfWidgetFormInputText(),
      'number_of_teams'          => new sfWidgetFormInputText(),
      'prize_pool'               => new sfWidgetFormInputText(),
      'inscription_prize'        => new sfWidgetFormInputText(),
      'event_id'                 => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Event'), 'add_empty' => false)),
      'game_id'                  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Game'), 'add_empty' => true)),
      'is_subtournament_enabled' => new sfWidgetFormInputCheckbox(),
      'subtournament_price'      => new sfWidgetFormInputText(),
      'subtournament_name'       => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                       => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'                     => new sfValidatorString(array('max_length' => 255)),
      'number_of_teams'          => new sfValidatorInteger(),
      'prize_pool'               => new sfValidatorInteger(),
      'inscription_prize'        => new sfValidatorInteger(array('required' => false)),
      'event_id'                 => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Event'))),
      'game_id'                  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Game'), 'required' => false)),
      'is_subtournament_enabled' => new sfValidatorBoolean(array('required' => false)),
      'subtournament_price'      => new sfValidatorInteger(array('required' => false)),
      'subtournament_name'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tournament[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tournament';
  }

}

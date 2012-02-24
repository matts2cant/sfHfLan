<?php

/**
 * Game filter form base class.
 *
 * @package    sfHfLan
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseGameFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'rules'            => new sfWidgetFormFilterInput(),
      'players_per_team' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'requires_bnet_id' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'icon'             => new sfWidgetFormFilterInput(),
      'slug'             => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'name'             => new sfValidatorPass(array('required' => false)),
      'rules'            => new sfValidatorPass(array('required' => false)),
      'players_per_team' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'requires_bnet_id' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'icon'             => new sfValidatorPass(array('required' => false)),
      'slug'             => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('game_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Game';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'name'             => 'Text',
      'rules'            => 'Text',
      'players_per_team' => 'Number',
      'requires_bnet_id' => 'Boolean',
      'icon'             => 'Text',
      'slug'             => 'Text',
    );
  }
}

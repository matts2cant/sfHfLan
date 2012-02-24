<?php

/**
 * Tournament filter form base class.
 *
 * @package    sfHfLan
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTournamentFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'                     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'number_of_teams'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'prize_pool'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'inscription_prize'        => new sfWidgetFormFilterInput(),
      'event_id'                 => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Event'), 'add_empty' => true)),
      'game_id'                  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Game'), 'add_empty' => true)),
      'is_subtournament_enabled' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'subtournament_price'      => new sfWidgetFormFilterInput(),
      'subtournament_name'       => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'name'                     => new sfValidatorPass(array('required' => false)),
      'number_of_teams'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'prize_pool'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'inscription_prize'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'event_id'                 => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Event'), 'column' => 'id')),
      'game_id'                  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Game'), 'column' => 'id')),
      'is_subtournament_enabled' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'subtournament_price'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'subtournament_name'       => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tournament_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tournament';
  }

  public function getFields()
  {
    return array(
      'id'                       => 'Number',
      'name'                     => 'Text',
      'number_of_teams'          => 'Number',
      'prize_pool'               => 'Number',
      'inscription_prize'        => 'Number',
      'event_id'                 => 'ForeignKey',
      'game_id'                  => 'ForeignKey',
      'is_subtournament_enabled' => 'Boolean',
      'subtournament_price'      => 'Number',
      'subtournament_name'       => 'Text',
    );
  }
}

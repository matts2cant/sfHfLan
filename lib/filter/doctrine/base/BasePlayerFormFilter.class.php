<?php

/**
 * Player filter form base class.
 *
 * @package    sfHfLan
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePlayerFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'firstname'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'lastname'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'nickname'      => new sfWidgetFormFilterInput(),
      'email'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'team'          => new sfWidgetFormFilterInput(),
      'team_tag'      => new sfWidgetFormFilterInput(),
      'pc_type'       => new sfWidgetFormChoice(array('choices' => array('' => '', 'none' => 'none', 'laptop' => 'laptop', 'desktop' => 'desktop'))),
      'wants_cable'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'token'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'bnet_email'    => new sfWidgetFormFilterInput(),
      'bnet_ccode'    => new sfWidgetFormFilterInput(),
      'tournament_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Tournament'), 'add_empty' => true)),
      'subtournament' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'created_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'firstname'     => new sfValidatorPass(array('required' => false)),
      'lastname'      => new sfValidatorPass(array('required' => false)),
      'nickname'      => new sfValidatorPass(array('required' => false)),
      'email'         => new sfValidatorPass(array('required' => false)),
      'team'          => new sfValidatorPass(array('required' => false)),
      'team_tag'      => new sfValidatorPass(array('required' => false)),
      'pc_type'       => new sfValidatorChoice(array('required' => false, 'choices' => array('none' => 'none', 'laptop' => 'laptop', 'desktop' => 'desktop'))),
      'wants_cable'   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'token'         => new sfValidatorPass(array('required' => false)),
      'bnet_email'    => new sfValidatorPass(array('required' => false)),
      'bnet_ccode'    => new sfValidatorPass(array('required' => false)),
      'tournament_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Tournament'), 'column' => 'id')),
      'subtournament' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'created_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('player_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Player';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'firstname'     => 'Text',
      'lastname'      => 'Text',
      'nickname'      => 'Text',
      'email'         => 'Text',
      'team'          => 'Text',
      'team_tag'      => 'Text',
      'pc_type'       => 'Enum',
      'wants_cable'   => 'Boolean',
      'token'         => 'Text',
      'bnet_email'    => 'Text',
      'bnet_ccode'    => 'Text',
      'tournament_id' => 'ForeignKey',
      'subtournament' => 'Boolean',
      'created_at'    => 'Date',
      'updated_at'    => 'Date',
    );
  }
}

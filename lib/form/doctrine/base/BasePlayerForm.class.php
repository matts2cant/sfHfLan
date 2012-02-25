<?php

/**
 * Player form base class.
 *
 * @method Player getObject() Returns the current form's model object
 *
 * @package    sfHfLan
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePlayerForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'firstname'     => new sfWidgetFormInputText(),
      'lastname'      => new sfWidgetFormInputText(),
      'nickname'      => new sfWidgetFormInputText(),
      'email'         => new sfWidgetFormInputText(),
      'team'          => new sfWidgetFormInputText(),
      'team_tag'      => new sfWidgetFormInputText(),
      'pc_type'       => new sfWidgetFormChoice(array('choices' => array('none' => 'none', 'laptop' => 'laptop', 'desktop' => 'desktop'))),
      'wants_cable'   => new sfWidgetFormInputCheckbox(),
      'token'         => new sfWidgetFormInputText(),
      'bnet_email'    => new sfWidgetFormInputText(),
      'bnet_ccode'    => new sfWidgetFormInputText(),
      'tournament_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Tournament'), 'add_empty' => false)),
      'subtournament' => new sfWidgetFormInputCheckbox(),
      'created_at'    => new sfWidgetFormDateTime(),
      'updated_at'    => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'firstname'     => new sfValidatorString(array('max_length' => 255)),
      'lastname'      => new sfValidatorString(array('max_length' => 255)),
      'nickname'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'email'         => new sfValidatorString(array('max_length' => 255)),
      'team'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'team_tag'      => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'pc_type'       => new sfValidatorChoice(array('choices' => array(0 => 'none', 1 => 'laptop', 2 => 'desktop'))),
      'wants_cable'   => new sfValidatorBoolean(),
      'token'         => new sfValidatorString(array('max_length' => 255)),
      'bnet_email'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'bnet_ccode'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'tournament_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Tournament'))),
      'subtournament' => new sfValidatorBoolean(array('required' => false)),
      'created_at'    => new sfValidatorDateTime(),
      'updated_at'    => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorDoctrineUnique(array('model' => 'Player', 'column' => array('email'))),
        new sfValidatorDoctrineUnique(array('model' => 'Player', 'column' => array('token'))),
      ))
    );

    $this->widgetSchema->setNameFormat('player[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Player';
  }

}

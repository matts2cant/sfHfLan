<?php

/**
 * Game form.
 *
 * @package    sfHfLan
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class GameForm extends BaseGameForm
{
  public function configure()
  {
    unset($this['created_at'], $this['updated_at'], $this['slug']);
      
    $this->widgetSchema['rules'] = new sfWidgetFormInputFileEditable(array(
      'label'     => 'Fichier de règles (PDF)',
      'file_src'  => '/uploads/games/rules/'.$this->getObject()->getRules(),
      'is_image'  => false,
      'edit_mode' => !$this->isNew(),
      'template'  => '<div><a href="%file%">Fichier</a><br />%input%<br />%delete% %delete_label%</div>',
      'delete_label' => 'supprimer'
    ));
    
    $this->validatorSchema['rules_delete'] = new sfValidatorBoolean(); 
    
    $this->validatorSchema['rules'] = new sfValidatorFile(array(
      'required'   => false,
      'path'       => sfConfig::get('sf_upload_dir').'/games/rules',
      'mime_types' => array('application/pdf'),
    ));
  }
}

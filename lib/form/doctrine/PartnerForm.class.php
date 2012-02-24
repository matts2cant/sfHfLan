<?php

/**
 * Partner form.
 *
 * @package    sfHfLan
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PartnerForm extends BasePartnerForm
{
  public function configure()
  {
      unset($this['created_at'], $this['updated_at'], $this['slug']);
    
    $this->widgetSchema['logo'] = new sfWidgetFormInputFileEditable(array(
      'label'     => 'Logo',
      'file_src'  => '/uploads/partners/'.$this->getObject()->getLogo(),
      'is_image'  => true,
      'edit_mode' => !$this->isNew(),
      'template'  => '<div>%file%<br />%input%<br />%delete% %delete_label%</div>',
      'delete_label' => 'supprimer'
    ));
    
    $this->widgetSchema['description'] = new sfWidgetFormTextarea();
    
    $this->validatorSchema['logo_delete'] = new sfValidatorBoolean(); 
    
    $this->validatorSchema['logo'] = new sfValidatorFile(array(
      'required'   => false,
      'path'       => sfConfig::get('sf_upload_dir').'/partners',
      'mime_types' => 'web_images',
    ));
  }
}

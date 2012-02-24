<?php

/**
 * Article form.
 *
 * @package    sfHfLan
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ArticleForm extends BaseArticleForm
{
  public function configure()
  {
    unset($this['created_at'], $this['updated_at'], $this['slug']);
    
    $this->widgetSchema['image'] = new sfWidgetFormInputFileEditable(array(
      'label'     => 'Image de l\'article (710x319)',
      'file_src'  => '/uploads/articles/'.$this->getObject()->getImage(),
      'is_image'  => true,
      'edit_mode' => !$this->isNew(),
      'template'  => '<div>%file%<br />%input%<br />%delete% %delete_label%</div>',
      'delete_label' => 'supprimer'
    ));
    
    $this->widgetSchema['content'] = new sfWidgetFormTextareaTinyMCE(array(
      'width'  => 550,
      'height' => 350,
      'config' => 'theme_advanced_disable: "anchor,image,cleanup,help"',
    ));
    
    $this->validatorSchema['image_delete'] = new sfValidatorBoolean(); 
    
    $this->validatorSchema['image'] = new sfValidatorFile(array(
      'required'   => false,
      'path'       => sfConfig::get('sf_upload_dir').'/articles',
      'mime_types' => 'web_images',
    ));
  }
}

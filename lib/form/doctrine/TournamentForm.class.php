<?php

/**
 * Tournament form.
 *
 * @package    sfHfLan
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TournamentForm extends BaseTournamentForm
{
  public function configure()
  {
    unset($this['created_at'], $this['updated_at'], $this['slug']);

    $this->widgetSchema['bracket_image'] = new sfWidgetFormInputFileEditable(array(
      'label'     => 'Arbre du tournoi',
      'file_src'  => '/uploads/tournaments/brackets/'.$this->getObject()->getBracketImage(),
      'is_image'  => false,
      'edit_mode' => !$this->isNew(),
      'template'  => $this->getObject()->getBracketImage() != '' ? '<div><a href=%file% >Fichier</a><br/>%input%<br />%delete% %delete_label%</div>' : '<div>%input%<br />%delete% %delete_label%</div>',
      'delete_label' => 'supprimer'
    ));

    $this->validatorSchema['bracket_image_delete'] = new sfValidatorBoolean();

    $this->validatorSchema['bracket_image'] = new sfValidatorFile(array(
      'required'   => false,
      'path'       => sfConfig::get('sf_upload_dir').'/tournaments/brackets',
      'mime_types' => array('application/pdf', 'image/gif', 'image/jpeg', 'image/png', 'image/svg+xml'),
    ));
  }
}

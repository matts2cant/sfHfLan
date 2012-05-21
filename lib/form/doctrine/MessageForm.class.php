<?php

/**
 * Message form.
 *
 * @package    sfHfLan
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class MessageForm extends BaseMessageForm
{
  public function configure()
  {
    $this->setValidator("email", new sfValidatorEmail(array("required" => false)));
    $this->setValidator("note", new sfValidatorInteger(array("min" => 0, "max" => 20, "required" => false)));
  }
}

<?php

abstract class sfTwitterModelGeneratorConfiguration extends sfModelGeneratorConfiguration
{
  /**
   * Gets a new form object.
   *
   * @param  mixed $object
   * @param  array $options An array of options to merge with the options returned by getFormOptions()
   *
   * @return sfForm
   */
  public function getForm($object = null, $options = array())
  {
    $class = $this->getFormClass();
    $formObject = new $class($object, array_merge($this->getFormOptions(), $options));

    $formatterObj = $formObject->getWidgetSchema()->getFormFormatter();
    $formatterObj->setValidatorSchema($formObject->getValidatorSchema());

    return $formObject;
  }
}
<?php

class sfValidatorBooking extends sfValidatorBase
{
  protected function configure($options = array(), $messages = array())
  {
    parent::configure($options, $messages);

    // your validator configuration here
  }

  protected function doClean($value)
  {
    if (!is_string($value))
    {
      throw new sfValidatorError($this, 'The value is not a string');
    }
    $lines = explode("\n", $value);
    $players = array();
    $validator = new sfValidatorEmail();
    foreach($lines as $line)
    {
      $parts = explode(":", $line);
      if(count($parts) != 2)
      {
        throw new sfValidatorError($this, 'Invalid format');
      }

      $email = $validator->clean($parts[1]);

      $players[$email] = $parts[0];
    }
    return $players;
  }
}
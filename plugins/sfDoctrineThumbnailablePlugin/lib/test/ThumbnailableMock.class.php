<?php

/**
 * Mock Thumbnailable to use our InvokerMock
 *
 * We also need to make guessArguments public
 * to be able to test it
 */

class ThumbnailableMock extends Thumbnailable
{
  private $invoker;

  public function getInvoker()
  {
    if (is_null($this->invoker))
    {
      $this->invoker = new InvokerMock();
    }

    return $this->invoker;
  }

  public function setInvokerMock(InvokerMock $mock)
  {
    $this->invoker = $mock;
  }

  public function guessArguments($arguments)
  {
    return parent::guessArguments($arguments);
  }

  public function getFilePath($field)
  {
    return parent::getFilePath($field);
  }

  public function getThumbnailPath($field, $format, $absolute = false)
  {
    return parent::getThumbnailPath($field, $format, $absolute);
  }
}


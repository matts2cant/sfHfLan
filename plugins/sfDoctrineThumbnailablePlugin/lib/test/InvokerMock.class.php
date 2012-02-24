<?php

/**
 * Mock Invoker
 */

class InvokerMock
{
  public $data;

  private $testDir;

  public function __construct(array $data = array())
  {
    $this->data = $data;
  }

  public function setTestDir($testDir)
  {
    $this->testDir = $testDir;

    if (!file_exists($testDir))
    {
      mkdir($testDir);
    }
  }

  public function getData()
  {
    return $this->data;
  }

  public function get($name)
  {
    return $this->data[$name];
  }

  public function getCoverPath()
  {
    return $this->testDir.'/'.$this->data['cover'];
  }
}

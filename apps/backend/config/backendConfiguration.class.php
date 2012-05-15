<?php

class backendConfiguration extends sfApplicationConfiguration
{
  public function configure()
  {
    sfWidgetFormSchema::setDefaultFormFormatterName('TwitterBootstrap');
  }
}

<?php


class PluginSfTwitterBootstrapActions extends sfActions
{
  /**
  * Executes the index action, which shows a list of all available modules
  *
  */
  public function executeDashboard()
  {
    $this->items = sfTwitterBootstrap::getItems();
    $this->categories = sfTwitterBootstrap::getCategories();
  }
}

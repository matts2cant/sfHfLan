<?php

class sfTwitterBootstrapCompileLessTask extends sfBaseTask
{
  protected function configure()
  {
    // // add your own arguments here
    // $this->addArguments(array(
    //   new sfCommandArgument('my_arg', sfCommandArgument::REQUIRED, 'My argument'),
    // ));

    $this->addOptions(array(
      new sfCommandOption('application', null, sfCommandOption::PARAMETER_OPTIONAL, 'The application name'),
      new sfCommandOption('env', null, sfCommandOption::PARAMETER_OPTIONAL, 'The environment', 'dev'),
      new sfCommandOption('connection', null, sfCommandOption::PARAMETER_OPTIONAL, 'The connection name', 'doctrine'),
      // add your own options here
    ));

    $this->namespace        = 'tb';
    $this->name             = 'compile-less';
    $this->briefDescription = '';
    $this->detailedDescription = <<<EOF
The [sfTwitterBootstrapCompileLess|INFO] task does things.
Call it with:

  [php symfony sfTwitterBootstrapCompileLess|INFO]
EOF;
  }

  protected function execute($arguments = array(), $options = array())
  {
    system("lessc www/less/bootstrap.less > www/css/bootstrap.css");
    system("lessc www/less/responsive.less > www/css/bootstrap-responsive.css");
  }
}

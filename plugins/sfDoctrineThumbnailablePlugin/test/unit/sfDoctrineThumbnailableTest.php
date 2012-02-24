<?php

/**
 * @todo
 *    - add sfThumbnail->__constructor() mock
 *    - add sfThumbnail->loadFile() mock
 *    - add sfThumbnail->save() mock
 */

require_once dirname(__FILE__).'/../bootstrap/unit.php';

// unfortunately, we have to load all this crap for Doctrine_Template to be happy :-/
require_once $_SERVER['SYMFONY'].'/plugins/sfDoctrinePlugin/lib/vendor/doctrine/Doctrine/Locator/Injectable.php';
require_once $_SERVER['SYMFONY'].'/plugins/sfDoctrinePlugin/lib/vendor/doctrine/Doctrine/Access.php';
require_once $_SERVER['SYMFONY'].'/plugins/sfDoctrinePlugin/lib/vendor/doctrine/Doctrine/Record/Abstract.php';
require_once $_SERVER['SYMFONY'].'/plugins/sfDoctrinePlugin/lib/vendor/doctrine/Doctrine/Template.php';
require_once $_SERVER['SYMFONY'].'/plugins/sfDoctrinePlugin/lib/vendor/doctrine/Doctrine/Lib.php';
require_once $_SERVER['SYMFONY'].'/plugins/sfDoctrinePlugin/lib/vendor/doctrine/Doctrine/Inflector.php';

require_once dirname(__FILE__).'/../../lib/test/ThumbnailableMock.class.php';
require_once dirname(__FILE__).'/../../lib/test/InvokerMock.class.php';

$invokerMock = new InvokerMock(array(
  'cover' => 'cover.jpg',
  'side'  => 'side.jpg',
));
$invokerMock->setTestDir($testDir = '/tmp/sfDoctrineThumbnailable');

$t = new lime_test(22, new lime_output_color());

/**
 * Mock sfThumbnail
 *
 * We can't put it in its own file since it'd conflict
 * in autoload with the true sfThumbnail
 *
 * Anyway, this will be removed as soon as the sfThumbnail injection
 * mechanism is ready
 */

class sfThumbnail
{
  private $width;
  private $height;
  private $filePath;

  public function __construct()
  {
  }

  public function loadFile()
  {
  }

  public function save($fileDest)
  {
    return $fileDest;
  }
}

// prepare some test data

$config_source = array(
  'config_key'    => null,
  'thumb_dir'     => '%s/thumbnails',
  'path_method'   => null,
  'keep_original' => true,
  'on_demand'     => true,
  'on_save'       => true,
  'strict'        => false,
  'default'       => 'cover',
  'path_method'   => 'get%sPath',
  'fields'        => array(
    'cover' => array(
      'formats' => array(
        'homepage'  => '50x50',
        'full'      => '500x500',
        'default'   => 'homepage',
      ),
      'thumb_dir' => '%s/coverThumbnails',
    ),
    'side' => array(
      'formats' => array(
        'homepage'  => '50x150',
      ),
      'thumb_dir' => '%s/myThumbnails',
    ),
  ),
);

$t->diag('configuration handling');

sfConfig::set('app_thumbnailable', $config_source);
$thumbnailable = new Thumbnailable(array('config_key' => 'thumbnailable'));
$t->is($thumbnailable->getOptions(), $config_source, '__construct() fetches config from config_key');

$t->is($thumbnailable->getOption('thumb_dir'), '%s/thumbnails', 'getOption() retrieves top-level option when no field is given');
$t->is($thumbnailable->getOption('thumb_dir', 'cover'), '%s/coverThumbnails', 'getOption() retrieves field-level option when exists');
$t->is($thumbnailable->getOption('foo'), null, 'getOption() returns null for non-existent option');

$t->is($thumbnailable->hasFormat('homepage', 'cover'), true, 'hasFormat() detects format existence');
$t->is($thumbnailable->hasFormat('foo', 'cover'), false, 'hasFormat() detects format inexistence');

$t->is($thumbnailable->getFormat('homepage', 'cover'), '50x50', 'getFormat() retrieves the right format for the right field');
$t->is($thumbnailable->getFormat('foo', 'cover'), null, 'getFormat() returns null for non-existent formats');

$config_one_field = $config_source;
unset($config_one_field['fields']['side'], $config_one_field['default']);

$thumbnailable = new ThumbnailableMock($config_one_field);
$thumbnailable->setInvokerMock($invokerMock);

$t->is($thumbnailable->guessArguments(array()), array('cover', '50x50'), 'guessArguments() detects a field if it\'s the only one');

unset($config_one_field);

$thumbnailable = new ThumbnailableMock($config_source);
$thumbnailable->setInvokerMock($invokerMock);

$t->is($thumbnailable->guessArguments(array('cover', '50x50')), array('cover', '50x50'), 'guessArguments() is ok when both arguments are given');
$t->is($thumbnailable->guessArguments(array('cover', 'homepage')), array('cover', '50x50'), 'guessArguments() even when giving a format alias');
$t->is($thumbnailable->guessArguments(array('cover')), array('cover', '50x50'), 'guessArguments() detects explicit default format');
$t->is($thumbnailable->guessArguments(array('homepage')), array('cover', '50x50'), 'guessArguments() detects explicit default field');
$t->is($thumbnailable->guessArguments(array()), array('cover', '50x50'), 'guessArguments() with no arguments detects both explicit default field and formats');
$t->is($thumbnailable->guessArguments(array('side')), array('side', '50x150'), 'guessArguments() detects default format if it\'s the only one');


try
{
  $thumbnailable->getFilePath('side');
  $t->fail('getFilePath() throws an exception for a non existent path_method');
}
catch (sfException $e)
{
  $t->pass('getFilePath() throws an exception for a non existent path_method');
}

$t->is($thumbnailable->getFilePath('cover'), $testDir.'/cover.jpg', 'getFilePath() detects the right file path');

$config_no_path_method = $config_source;
unset($config_no_path_method['path_method']);
$thumbnailable_no_path_method = new ThumbnailableMock($config_no_path_method);
$thumbnailable_no_path_method->setInvokerMock($invokerMock);

$t->is($thumbnailable_no_path_method->getFilePath('cover'), '/web/uploads/cover.jpg', 'getFilePath() has a default path');

unset($config_no_path_method, $thumbnailable_no_path_method);

$thumbnailPath = $testDir.'/coverThumbnails/50x50_cover.jpg';
$t->is($thumbnailable->getThumbnailPath('cover', '50x50', true), $thumbnailPath, 'getThumbnailPath() builds the right absolute path');

$t->is($thumbnailable->createThumbnail('cover', '50x50'), $thumbnailPath, 'createThumbnail() creates a thumbnail');
$t->ok(file_exists(dirname($thumbnailPath)) && is_dir(dirname($thumbnailPath)), 'createThumbnail() creates the thumbnail\'s directory');

rmdir(dirname($thumbnailPath));
rmdir($testDir);

try
{
  $thumbnailable->getThumbnail('cover', '50x50');
  $t->fail('getThumbnail() throws an exception for non-existent files');
}
catch (sfException $e)
{
  $t->pass('getThumbnail() throws an exception for non-existent files');
}

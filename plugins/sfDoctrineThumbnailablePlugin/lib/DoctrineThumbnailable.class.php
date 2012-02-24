<?php

/**
 * Thumbnailable template for doctrine
 *
 * @package sfDoctrineThumbnailablePlugin
 * @author  Geoffrey Bachelet <geoffrey.bachelet@sensio.com>
 *
 * @todo unit tests
 * @todo move logic to a separate class to ease unit testing ?
 * @todo add a setOption($option, $value, $field = null) method
 * @todo add a setOptions($options) method
 */

class Thumbnailable extends Doctrine_Template
{
  /**
   * @see README
   */

  protected $options = array(
    'config_key'         => null,
    'thumb_dir'          => '%s/thumbnails',
    'path_method'        => null,
    'keep_original'      => true,
    'on_demand'          => true,
    'on_save'            => true,
    'strict'             => false,
    'fail_silently'      => false,
    'path_to_url_method' => array('Thumbnailable', 'pathToUrl'),
    'fields'             => array(),
  );

  /**
   * Converts an absolute path to an url based
   * on default symfony directories
   *
   * @param string $string
   * @return string
   */
  public static function pathToUrl($string)
  {
    return str_replace(sfConfig::get('sf_web_dir'), '', $string);
  }

  /**
   * @param array $options
   *
   * options can contain:
   *
   *  - string   thumb_dir    The directory to create the thumbnails in (relative to the file's dirname)
   *  - boolean  on_demand    Whether to create or not thumbnails on demand
   *  - boolean  on_save      Whether to create or not thumbnails on save
   *  - boolean  strict       Whether to allow other formats than those in 'formats'
   *  - array    formats      Default formats to create for on_save
   *
   *  the 'formats' array should contain a list of formats per-field:
   *
   *  array(
   *    'media_id'    => array('50x50')
   *    'cover_image' => array('100x50')
   *  )
   */

  public function __construct(array $options = array())
  {
    if (!class_exists('sfThumbnail'))
    {
      throw new sfException('You need the sfThumbnailPlugin installed to use this template');
    }

    $app_config = array();

    if (isset($options['config_key']))
    {
      if (null === $app_config = sfConfig::get('app_'.$options['config_key'], null))
      {
        throw new sfException(sprintf('Could not find configuration in key "%s", maybe you forget a ".plugins" in your app.yml ?', $options['config_key']));
      }
    }

    $this->options = Doctrine_Lib::arrayDeepMerge($this->options, $options, $app_config);
  }

  /**
   * Returns the array of options
   *
   * @return array
   */

  public function getOptions()
  {
    return $this->options;
  }

  /**
   * Returns a option, checking for a specific field-level value
   *
   * Note: ->guessArguments() is dependant on options formats
   *
   * @param string $name
   * @param string $field
   * @return string
   */

  public function getOption($name, $field = null)
  {
    if (!is_null($field) && isset($this->options['fields'][$field][$name]))
    {
      return $this->options['fields'][$field][$name];
    }

    return isset($this->options[$name]) ? $this->options[$name] : null;
  }

  /**
   * Retrieves a format for the given field
   *
   * @param string $format
   * @param string $field
   * @return string
   */

  public function getFormat($format, $field)
  {
    if (isset($this->options['fields'][$field]['formats'][$format]))
    {
      return $this->options['fields'][$field]['formats'][$format];
    }
    elseif (in_array($format, $this->options['fields'][$field]['formats']))
    {
      return $format;
    }

    return null;
  }

  /**
   * Tells whether a format exists or not for a given field
   *
   * @param string $format
   * @param string $field
   * @return boolean
   */

  public function hasFormat($format, $field)
  {
    return isset($this->options['fields'][$field]['formats'][$format]) || in_array($format, $this->options['fields'][$field]['formats']);
  }

  /**
   * Tells whether a field as any format at all or not
   *
   * @param string $field
   * @return boolean
   */

  public function hasFormats($field)
  {
    return isset($this->options['fields'][$field]['formats']);
  }

  /**
   * Setup the Thumbnailable behavior for the template
   */

  public function setUp()
  {
    $this->addListener(new ThumbnailableListener($this));
  }

  /**
   * Computes the thumbnail path according to format
   *
   * @param string $field the fieldname from which to take the file name
   * @param string $format the format of the thumbnail (${width}x${height})
   * @param boolean $absolute whether or not to return an absolute path
   *
   * @todo test when $absolute = true
   *
   * @return string the thumbnail path
   */

  protected function getThumbnailPath($field, $format)
  {
    $image_path = $this->getFilePath($field);
    $thumb_dir  = sprintf($this->getOption('thumb_dir', $field), dirname($image_path));
    $thumb_path = sprintf('%s/%s_%s', $thumb_dir, $format, basename($image_path));

    return $thumb_path;
  }

  /**
   * Get the thumbnail's web path, creating it on demand
   *
   * You can ommit either arguments, or both, it will try its best to
   * guess what you meant
   *
   * Note that if you pass both arguments, you must respect the field, format order
   *
   * @see self::guessArguments()
   * @param string $field The fieldname
   * @param string $format The format (${width}x${height})
   *
   * @todo test
   *
   * @return string
   */

  public function getThumbnail()
  {
    list($field, $format) = $this->guessArguments(func_get_args());

    $abs_file_path = $this->getFilePath($field);

    if (!file_exists($abs_file_path) || is_dir($abs_file_path))
    {
      if ($this->getOption('fail_silently', $field))
      {
        return '#';
      }

      throw new sfException(sprintf('Cannot create thumbnail for non-existent file "%s"', $abs_file_path));
    }

    if (!file_exists($this->getThumbnailPath($field, $format)))
    {
      if (!$this->getOption('on_demand', $field))
      {
        throw new sfException(sprintf('Could not find "%s" thumbnail for "%s"', $format, $field));
      }

      /**
       * If we are in strict mode and
       *    no formats are defined for current field
       *    or
       *    formats are defined for current field but current format is not in them
       */
      if ($this->getOption('strict', $field) && (!$this->hasFormats($field) || !$this->hasFormat($format, $field)))
      {
        throw new sfException(sprintf('Format "%s" is not allowed in formats list', $format));
      }

      $this->createThumbnail($field, $format);
    }

    return call_user_func($this->getOption('path_to_url_method', $field), $this->getThumbnailPath($field, $format));
  }

  /**
   * Actually creates the thumbnail
   *
   * @param string $field
   * @param string $format ${width}x${height}x${quality}
   *
   * @see sfThumbnail::save
   *
   * @todo test
   *
   * @return boolean
   * @since 2011-05-30 cyrillej (add support for quality)
   */
  public function createThumbnail($field, $format)
  {
    $format_info = explode('x', $format);
    if (3 == count($format_info))
    {
      list($width, $height, $quality) = $format_info;
    }
    else
    {
      list($width, $height) = $format_info;
      $quality = $this->getOption('quality', $field);
    }
    $thumbnail = is_integer($quality)
      ? new sfThumbnail($width, $height, true, true, $quality)
      : new sfThumbnail($width, $height, true, true);
    $thumbnail->loadFile($this->getFilePath($field));

    $thumbnail_path = $this->getThumbnailPath($field, $format);
    $thumbnail_dir  = dirname($thumbnail_path);

    if (!file_exists($thumbnail_dir))
    {
      if (!mkdir($thumbnail_dir, 0777, true))
      {
        throw new sfException(sprintf('Could not create directory "%s"', $thumbnail_dir));
      }
    }
    return $thumbnail->save($thumbnail_path);
  }

  /**
   * Creates all thumbnails registered for on_save
   *
   * @todo delete obsolete thumbnails
   * @todo test
   */

  public function createOnSaveThumbnails()
  {
    foreach($this->getOptions('fields') as $field => $config)
    {
      if ($this->getOption('on_save', $field) && $this->hasFormats($field))
      {
        foreach($config['formats'] as $format)
        {
          if (!strstr($format, 'x'))
          {
            continue;
          }
          
          $this->createThumbnail($field, $format);
        }
      }
    }
  }

  /**
   * Guess field and format from a list of arguments
   *
   * @todo remove dependance on options formats ?
   * @todo refactor (move field detection to guessField, etc)
   *
   * @param array $arguments
   * @return array
   */

  protected function guessArguments($arguments)
  {
    // if we have more than 1 arguments
    // argument 2 should be the format
    // check if this is a label and convert it
    if (count($arguments) > 1)
    {
      if ($this->hasFormat($arguments[1], $arguments[0]))
      {
        $arguments[1] = $this->getFormat($arguments[1], $arguments[0]);
      }
      return $arguments;
    }

    // if we have only one argument, it is either field or format
    // if the model has a field named like it, it must be the field
    if (count($arguments) == 1)
    {
      $name = array_key_exists($arguments[0], $this->getInvoker()->getData()) ? 'field' : 'format';
      $$name = $arguments[0];
    }

    // look for a default field
    if (!isset($field))
    {
      // if we have only one field, use it
      if (count($this->options['fields']) == 1)
      {
        $field = key($this->options['fields']);
      }
      // if we have a default field, use it
      elseif (isset($this->options['default']))
      {
        $field = $this->options['default'];
      }

      if (!isset($field))
      {
        throw new sfException(sprintf('Could not determine default field from args list: %s', var_export($arguments, true)));
      }
    }

    // look for a default format
    if (!isset($format))
    {
      // if there is only one format for the current field, use it
      if (count($this->options['fields'][$field]['formats']) == 1)
      {
        $format = key($this->options['fields'][$field]['formats']);
      }
      // if there is a default format for the current field, use it
      elseif (isset($this->options['fields'][$field]['formats']['default']))
      {
        $format = $this->options['fields'][$field]['formats']['default'];
      }

      if (!isset($format))
      {
        throw new sfException(sprintf('Could not determine default format from args list: %s', var_export($arguments, true)));
      }
    }

    // we expect a format in the form \d+x\d+
    // if it is not the case, check if it is a named format
    if (!preg_match('/(?:\d+x\d+)|(?:\d+x)|(?:x\d+)/', $format))
    {
      if (!$this->hasFormat($format, $field))
      {
        throw new sfException(sprintf('Unknown format "%s" for field "%s"', $format, $field));
      }

      $format = $this->getFormat($format, $field);
    }

    return array($field, $format);
  }
  
  /**
   * Convenience method until thumbs delete on object delete
   * is ready
   *
   * @deprecated
   * @return array
   */

  public function getThumbnailsList()
  {
    list($field) = $this->guessArguments(func_get_args());
    $filePath    = $this->getFilePath($field); 
    $thumbsDir   = dirname($filePath);

    if (substr($thumbsDir, strlen($thumbsDir) - 1, 1) != DIRECTORY_SEPARATOR)
    {
      $thumbsDir .= DIRECTORY_SEPARATOR;;
    }

    $thumbsDir .= $this->getOption('thumb_dir', $field);

    return glob($thumbsDir.'/*_'.basename($filePath));
  }

  /**
   * Returns the absolute file path
   *
   * @param string $field
   * @return string
   * @todo remove sfConfig dependency ?
   * @todo remove Doctrine_Inflector dependency ?
   */
  protected function getFilePath($field)
  {
    $object = $this->getInvoker();

    if (null === $path_method = $this->getOption('path_method', $field))
    {
      return sfConfig::get('sf_upload_dir').'/'.$this->getInvoker()->get($field);
    }
    
    $method = sprintf($path_method, Doctrine_Inflector::classify($field));

    if (!method_exists($object, $method))
    {
      throw new sfException(sprintf('Object of class "%s" does not implement a "%s()" method', get_class($object), $method));
    }
      
    return $object->$method(); 
  }
}

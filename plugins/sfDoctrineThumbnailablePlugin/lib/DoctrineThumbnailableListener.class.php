<?php

/**
 * Thumbnailable template for doctrine
 *
 * @package sfDoctrineThumbnailablePlugin
 * @author  Geoffrey Bachelet <geoffrey.bachelet@sensio.com>
 *
 * @todo unit tests
 */

class ThumbnailableListener extends Doctrine_Record_Listener
{
  /**
   * Launches thumbnails creation on save
   */

  public function postSave(Doctrine_Event $event)
  {
    $event->getInvoker()->createOnSaveThumbnails();
  }
}

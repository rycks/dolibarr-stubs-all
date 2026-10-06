<?php

namespace Webklex\PHPIMAP\Events;

/**
 * Class FolderMovedEvent
 *
 * @package Webklex\PHPIMAP\Events
 */
class FolderMovedEvent extends \Webklex\PHPIMAP\Events\Event
{
    /** @var Folder $old_folder */
    public $old_folder;
    /** @var Folder $new_folder */
    public $new_folder;
    /**
     * Create a new event instance.
     * @var Folder[] $folders
     * @return void
     */
    public function __construct($folders)
    {
    }
}
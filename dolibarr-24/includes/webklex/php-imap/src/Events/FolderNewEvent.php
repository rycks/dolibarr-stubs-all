<?php

namespace Webklex\PHPIMAP\Events;

/**
 * Class FolderNewEvent
 *
 * @package Webklex\PHPIMAP\Events
 */
class FolderNewEvent extends \Webklex\PHPIMAP\Events\Event
{
    /** @var Folder $folder */
    public $folder;
    /**
     * Create a new event instance.
     * @var Folder[] $folders
     * @return void
     */
    public function __construct($folders)
    {
    }
}
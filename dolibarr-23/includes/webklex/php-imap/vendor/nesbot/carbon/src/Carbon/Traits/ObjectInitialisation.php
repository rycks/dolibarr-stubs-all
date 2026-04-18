<?php

namespace Carbon\Traits;

trait ObjectInitialisation
{
    /**
     * True when parent::__construct has been called.
     *
     * @var string
     */
    protected $constructedObjectId;
}
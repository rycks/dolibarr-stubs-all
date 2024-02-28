<?php

namespace Sabre\DAV\Locks\Backend;

abstract class PDOTest extends \Sabre\DAV\Locks\Backend\AbstractTest
{
    use \Sabre\DAV\DbTestHelperTrait;
    function getBackend()
    {
    }
}
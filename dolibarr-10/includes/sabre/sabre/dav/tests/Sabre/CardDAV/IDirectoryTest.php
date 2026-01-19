<?php

namespace Sabre\CardDAV;

class IDirectoryTest extends \PHPUnit_Framework_TestCase
{
    function testResourceType()
    {
    }
}
class DirectoryMock extends \Sabre\DAV\SimpleCollection implements \Sabre\CardDAV\IDirectory
{
}
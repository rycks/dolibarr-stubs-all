<?php

namespace Sabre\CardDAV;

class VCFExportTest extends \Sabre\DAVServerTest
{
    protected $setupCardDAV = true;
    protected $autoLogin = 'user1';
    protected $setupACL = true;
    protected $carddavAddressBooks = [['id' => 'book1', 'uri' => 'book1', 'principaluri' => 'principals/user1']];
    protected $carddavCards = ['book1' => ["card1" => "BEGIN:VCARD\r\nFN:Person1\r\nEND:VCARD\r\n", "card2" => "BEGIN:VCARD\r\nFN:Person2\r\nEND:VCARD", "card3" => "BEGIN:VCARD\r\nFN:Person3\r\nEND:VCARD\r\n", "card4" => "BEGIN:VCARD\nFN:Person4\nEND:VCARD\n"]];
    function setUp()
    {
    }
    function testSimple()
    {
    }
    function testExport()
    {
    }
    function testBrowserIntegration()
    {
    }
    function testContentDisposition()
    {
    }
    function testContentDispositionBadChars()
    {
    }
}
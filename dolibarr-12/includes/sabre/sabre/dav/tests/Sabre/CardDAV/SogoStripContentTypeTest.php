<?php

namespace Sabre\CardDAV;

class SogoStripContentTypeTest extends \Sabre\DAVServerTest
{
    protected $setupCardDAV = true;
    protected $carddavAddressBooks = [['id' => 1, 'uri' => 'book1', 'principaluri' => 'principals/user1']];
    protected $carddavCards = [1 => ['card1.vcf' => "BEGIN:VCARD\nVERSION:3.0\nUID:12345\nEND:VCARD"]];
    function testDontStrip()
    {
    }
    function testStrip()
    {
    }
    function testDontTouchOtherMimeTypes()
    {
    }
}
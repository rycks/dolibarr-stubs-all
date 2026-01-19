<?php

namespace Sabre\CalDAV\Schedule;

class FreeBusyRequestTest extends \PHPUnit_Framework_TestCase
{
    protected $plugin;
    protected $server;
    protected $aclPlugin;
    protected $request;
    protected $authPlugin;
    protected $caldavBackend;
    function setUp()
    {
    }
    function testWrongContentType()
    {
    }
    function testNotFound()
    {
    }
    function testNotOutbox()
    {
    }
    /**
     * @expectedException Sabre\DAV\Exception\BadRequest
     */
    function testNoItipMethod()
    {
    }
    /**
     * @expectedException \Sabre\DAV\Exception\NotImplemented
     */
    function testNoVFreeBusy()
    {
    }
    /**
     * @expectedException Sabre\DAV\Exception\Forbidden
     */
    function testIncorrectOrganizer()
    {
    }
    /**
     * @expectedException Sabre\DAV\Exception\BadRequest
     */
    function testNoAttendees()
    {
    }
    /**
     * @expectedException Sabre\DAV\Exception\BadRequest
     */
    function testNoDTStart()
    {
    }
    function testSucceed()
    {
    }
    /**
     * Testing if the freebusy request still works, even if there are no
     * calendars in the target users' account.
     */
    function testSucceedNoCalendars()
    {
    }
    function testNoCalendarHomeFound()
    {
    }
    function testNoInboxFound()
    {
    }
    function testSucceedUseVAVAILABILITY()
    {
    }
    /*
        function testNoPrivilege() {
    
            $this->markTestIncomplete('Currently there\'s no "no privilege" situation');
    
            $this->server->httpRequest = HTTP\Sapi::createFromServerArray(array(
                'CONTENT_TYPE' => 'text/calendar',
                'REQUEST_METHOD' => 'POST',
                'REQUEST_URI' => '/calendars/user1/outbox',
            ));
    
            $body = <<<ICS
    BEGIN:VCALENDAR
    METHOD:REQUEST
    BEGIN:VFREEBUSY
    ORGANIZER:mailto:user1.sabredav@sabredav.org
    ATTENDEE:mailto:user2.sabredav@sabredav.org
    DTSTART:20110101T080000Z
    DTEND:20110101T180000Z
    END:VFREEBUSY
    END:VCALENDAR
    ICS;
    
            $this->server->httpRequest->setBody($body);
    
            $this->assertFalse(
                $this->plugin->httpPost($this->server->httpRequest, $this->response)
            );
    
            $this->assertEquals(200, $this->response->status);
            $this->assertEquals([
                'Content-Type' => 'application/xml',
            ], $this->response->getHeaders());
    
            $strings = [
                '<d:href>mailto:user2.sabredav@sabredav.org</d:href>',
                '<cal:request-status>3.7;No calendar-home-set property found</cal:request-status>',
            ];
    
            foreach($strings as $string) {
                $this->assertTrue(
                    strpos($this->response->body, $string)!==false,
                    'The response body did not contain: ' . $string .'Full response: ' . $this->response->body
                );
            }
    
    
        }*/
}
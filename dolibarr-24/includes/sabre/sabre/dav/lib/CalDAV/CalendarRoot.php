<?php

namespace Sabre\CalDAV;

/**
 * Calendars collection.
 *
 * This object is responsible for generating a list of calendar-homes for each
 * user.
 *
 * This is the top-most node for the calendars tree. In most servers this class
 * represents the "/calendars" path.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class CalendarRoot extends \Sabre\DAVACL\AbstractPrincipalCollection
{
    /**
     * CalDAV backend.
     *
     * @var Backend\BackendInterface
     */
    protected $caldavBackend;
    /**
     * Constructor.
     *
     * This constructor needs both an authentication and a caldav backend.
     *
     * By default this class will show a list of calendar collections for
     * principals in the 'principals' collection. If your main principals are
     * actually located in a different path, use the $principalPrefix argument
     * to override this.
     *
     * @param string $principalPrefix
     */
    public function __construct(\Sabre\DAVACL\PrincipalBackend\BackendInterface $principalBackend, \Sabre\CalDAV\Backend\BackendInterface $caldavBackend, $principalPrefix = 'principals')
    {
    }
    /**
     * Returns the nodename.
     *
     * We're overriding this, because the default will be the 'principalPrefix',
     * and we want it to be Sabre\CalDAV\Plugin::CALENDAR_ROOT
     *
     * @return string
     */
    public function getName()
    {
    }
    /**
     * This method returns a node for a principal.
     *
     * The passed array contains principal information, and is guaranteed to
     * at least contain a uri item. Other properties may or may not be
     * supplied by the authentication backend.
     *
     * @return \Sabre\DAV\INode
     */
    public function getChildForPrincipal(array $principal)
    {
    }
}
<?php

namespace Sabre\DAV\Auth\Backend;

/**
 * This is an authentication backend that uses imap.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Michael Niewöhner (foss@mniewoehner.de)
 * @author rosali (https://github.com/rosali)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class IMAP extends \Sabre\DAV\Auth\Backend\AbstractBasic
{
    /**
     * IMAP server in the form {host[:port][/flag1/flag2...]}.
     *
     * @see http://php.net/manual/en/function.imap-open.php
     *
     * @var string
     */
    protected $mailbox;
    /**
     * Creates the backend object.
     *
     * @param string $mailbox
     */
    public function __construct($mailbox)
    {
    }
    /**
     * Connects to an IMAP server and tries to authenticate.
     *
     * @param string $username
     * @param string $password
     *
     * @return bool
     */
    protected function imapOpen($username, $password)
    {
    }
    /**
     * Validates a username and password by trying to authenticate against IMAP.
     *
     * @param string $username
     * @param string $password
     *
     * @return bool
     */
    protected function validateUserPass($username, $password)
    {
    }
}
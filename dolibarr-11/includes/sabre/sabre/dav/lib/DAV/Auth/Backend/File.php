<?php

namespace Sabre\DAV\Auth\Backend;

/**
 * This is an authentication backend that uses a file to manage passwords.
 *
 * The backend file must conform to Apache's htdigest format
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class File extends \Sabre\DAV\Auth\Backend\AbstractDigest
{
    /**
     * List of users
     *
     * @var array
     */
    protected $users = [];
    /**
     * Creates the backend object.
     *
     * If the filename argument is passed in, it will parse out the specified file first.
     *
     * @param string|null $filename
     */
    function __construct($filename = null)
    {
    }
    /**
     * Loads an htdigest-formatted file. This method can be called multiple times if
     * more than 1 file is used.
     *
     * @param string $filename
     * @return void
     */
    function loadFile($filename)
    {
    }
    /**
     * Returns a users' information
     *
     * @param string $realm
     * @param string $username
     * @return string
     */
    function getDigestHash($realm, $username)
    {
    }
}
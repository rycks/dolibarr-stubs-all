<?php

namespace Sabre\DAV\Auth\Backend;

/**
 * This is an authentication backend that uses a database to manage passwords.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class PDO extends \Sabre\DAV\Auth\Backend\AbstractDigest
{
    /**
     * Reference to PDO connection.
     *
     * @var PDO
     */
    protected $pdo;
    /**
     * PDO table name we'll be using.
     *
     * @var string
     */
    public $tableName = 'users';
    /**
     * Creates the backend object.
     *
     * If the filename argument is passed in, it will parse out the specified file fist.
     */
    public function __construct(\PDO $pdo)
    {
    }
    /**
     * Returns the digest hash for a user.
     *
     * @param string $realm
     * @param string $username
     *
     * @return string|null
     */
    public function getDigestHash($realm, $username)
    {
    }
}
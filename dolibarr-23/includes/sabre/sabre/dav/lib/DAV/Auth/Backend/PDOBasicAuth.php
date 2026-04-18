<?php

namespace Sabre\DAV\Auth\Backend;

/**
 * This is an authentication backend that uses a database to manage passwords.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class PDOBasicAuth extends \Sabre\DAV\Auth\Backend\AbstractBasic
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
    protected $tableName;
    /**
     * PDO digest column name we'll be using
     * (i.e. digest, password, password_hash).
     *
     * @var string
     */
    protected $digestColumn;
    /**
     * PDO uuid(unique user identifier) column name we'll be using
     * (i.e. username, email).
     *
     * @var string
     */
    protected $uuidColumn;
    /**
     * Digest prefix:
     * if the backend you are using for is prefixing
     * your password hashes set this option to your prefix to
     * cut it off before verfiying.
     *
     * @var string
     */
    protected $digestPrefix;
    /**
     * Creates the backend object.
     *
     * If the filename argument is passed in, it will parse out the specified file fist.
     */
    public function __construct(\PDO $pdo, array $options = [])
    {
    }
    /**
     * Validates a username and password.
     *
     * This method should return true or false depending on if login
     * succeeded.
     *
     * @param string $username
     * @param string $password
     *
     * @return bool
     */
    public function validateUserPass($username, $password)
    {
    }
}
<?php

namespace Webklex\PHPIMAP;

/**
 * Class Address
 *
 * @package Webklex\PHPIMAP
 */
class Address
{
    /**
     * Address attributes
     * @var string $personal
     * @var string $mailbox
     * @var string $host
     * @var string $mail
     * @var string $full
     */
    public $personal = "";
    public $mailbox = "";
    public $host = "";
    public $mail = "";
    public $full = "";
    /**
     * Address constructor.
     * @param object   $object
     */
    public function __construct($object)
    {
    }
    /**
     * Return the stringified address
     *
     * @return string
     */
    public function __toString()
    {
    }
    /**
     * Return the serialized address
     *
     * @return array
     */
    public function __serialize()
    {
    }
    /**
     * Convert instance to array
     *
     * @return array
     */
    public function toArray()
    {
    }
    /**
     * Return the stringified attribute
     *
     * @return string
     */
    public function toString()
    {
    }
}
<?php

/*
 * This file is part of SwiftMailer.
 * (c) 2004-2009 Chris Corbyn
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
/**
 * A collection of MIME headers.
 *
 * @author Chris Corbyn
 */
class Swift_Mime_SimpleHeaderSet implements \Swift_Mime_CharsetObserver
{
    /** HeaderFactory */
    private $factory;
    /** Collection of set Headers */
    private $headers = [];
    /** Field ordering details */
    private $order = [];
    /** List of fields which are required to be displayed */
    private $required = [];
    /** The charset used by Headers */
    private $charset;
    /**
     * Create a new SimpleHeaderSet with the given $factory.
     *
     * @param string $charset
     */
    public function __construct(\Swift_Mime_SimpleHeaderFactory $factory, $charset = \null)
    {
    }
    public function newInstance()
    {
    }
    /**
     * Set the charset used by these headers.
     *
     * @param string $charset
     */
    public function setCharset($charset)
    {
    }
    /**
     * Add a new Mailbox Header with a list of $addresses.
     *
     * @param string       $name
     * @param array|string $addresses
     */
    public function addMailboxHeader($name, $addresses = \null)
    {
    }
    /**
     * Add a new Date header using $dateTime.
     *
     * @param string $name
     */
    public function addDateHeader($name, \DateTimeInterface $dateTime = \null)
    {
    }
    /**
     * Add a new basic text header with $name and $value.
     *
     * @param string $name
     * @param string $value
     */
    public function addTextHeader($name, $value = \null)
    {
    }
    /**
     * Add a new ParameterizedHeader with $name, $value and $params.
     *
     * @param string $name
     * @param string $value
     * @param array  $params
     */
    public function addParameterizedHeader($name, $value = \null, $params = [])
    {
    }
    /**
     * Add a new ID header for Message-ID or Content-ID.
     *
     * @param string       $name
     * @param string|array $ids
     */
    public function addIdHeader($name, $ids = \null)
    {
    }
    /**
     * Add a new Path header with an address (path) in it.
     *
     * @param string $name
     * @param string $path
     */
    public function addPathHeader($name, $path = \null)
    {
    }
    /**
     * Returns true if at least one header with the given $name exists.
     *
     * If multiple headers match, the actual one may be specified by $index.
     *
     * @param string $name
     * @param int    $index
     *
     * @return bool
     */
    public function has($name, $index = 0)
    {
    }
    /**
     * Set a header in the HeaderSet.
     *
     * The header may be a previously fetched header via {@link get()} or it may
     * be one that has been created separately.
     *
     * If $index is specified, the header will be inserted into the set at this
     * offset.
     *
     * @param int $index
     */
    public function set(\Swift_Mime_Header $header, $index = 0)
    {
    }
    /**
     * Get the header with the given $name.
     *
     * If multiple headers match, the actual one may be specified by $index.
     * Returns NULL if none present.
     *
     * @param string $name
     * @param int    $index
     *
     * @return Swift_Mime_Header|null
     */
    public function get($name, $index = 0)
    {
    }
    /**
     * Get all headers with the given $name.
     *
     * @param string $name
     *
     * @return array
     */
    public function getAll($name = \null)
    {
    }
    /**
     * Return the name of all Headers.
     *
     * @return array
     */
    public function listAll()
    {
    }
    /**
     * Remove the header with the given $name if it's set.
     *
     * If multiple headers match, the actual one may be specified by $index.
     *
     * @param string $name
     * @param int    $index
     */
    public function remove($name, $index = 0)
    {
    }
    /**
     * Remove all headers with the given $name.
     *
     * @param string $name
     */
    public function removeAll($name)
    {
    }
    /**
     * Define a list of Header names as an array in the correct order.
     *
     * These Headers will be output in the given order where present.
     */
    public function defineOrdering(array $sequence)
    {
    }
    /**
     * Set a list of header names which must always be displayed when set.
     *
     * Usually headers without a field value won't be output unless set here.
     */
    public function setAlwaysDisplayed(array $names)
    {
    }
    /**
     * Notify this observer that the entity's charset has changed.
     *
     * @param string $charset
     */
    public function charsetChanged($charset)
    {
    }
    /**
     * Returns a string with a representation of all headers.
     *
     * @return string
     */
    public function toString()
    {
    }
    /**
     * Returns a string representation of this object.
     *
     * @return string
     *
     * @see toString()
     */
    public function __toString()
    {
    }
    /** Save a Header to the internal collection */
    private function storeHeader($name, \Swift_Mime_Header $header, $offset = \null)
    {
    }
    /** Test if the headers can be sorted */
    private function canSort()
    {
    }
    /** uksort() algorithm for Header ordering */
    private function sortHeaders($a, $b)
    {
    }
    /** Test if the given Header is always displayed */
    private function isDisplayed(\Swift_Mime_Header $header)
    {
    }
    /** Notify all Headers of the new charset */
    private function notifyHeadersOfCharset($charset)
    {
    }
    /**
     * Make a deep copy of object.
     */
    public function __clone()
    {
    }
}
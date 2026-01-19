<?php

/**
 * Creates MIME headers.
 *
 * @author Chris Corbyn
 */
class Swift_Mime_SimpleHeaderFactory implements \Swift_Mime_CharsetObserver
{
    /** The HeaderEncoder used by these headers */
    private $encoder;
    /** The Encoder used by parameters */
    private $paramEncoder;
    /** The Grammar */
    private $grammar;
    /** Strict EmailValidator */
    private $emailValidator;
    /** The charset of created Headers */
    private $charset;
    /**
     * Creates a new SimpleHeaderFactory using $encoder and $paramEncoder.
     *
     * @param Swift_Mime_HeaderEncoder $encoder
     * @param Swift_Encoder            $paramEncoder
     * @param EmailValidator           $emailValidator
     * @param string|null              $charset
     */
    public function __construct(\Swift_Mime_HeaderEncoder $encoder, \Swift_Encoder $paramEncoder, \Egulias\EmailValidator\EmailValidator $emailValidator, $charset = \null)
    {
    }
    /**
     * Create a new Mailbox Header with a list of $addresses.
     *
     * @param string            $name
     * @param array|string|null $addresses
     *
     * @return Swift_Mime_Header
     */
    public function createMailboxHeader($name, $addresses = \null)
    {
    }
    /**
     * Create a new Date header using $dateTime.
     *
     * @param string                 $name
     * @param DateTimeInterface|null $dateTime
     *
     * @return Swift_Mime_Header
     */
    public function createDateHeader($name, \DateTimeInterface $dateTime = \null)
    {
    }
    /**
     * Create a new basic text header with $name and $value.
     *
     * @param string $name
     * @param string $value
     *
     * @return Swift_Mime_Header
     */
    public function createTextHeader($name, $value = \null)
    {
    }
    /**
     * Create a new ParameterizedHeader with $name, $value and $params.
     *
     * @param string $name
     * @param string $value
     * @param array  $params
     *
     * @return Swift_Mime_Headers_ParameterizedHeader
     */
    public function createParameterizedHeader($name, $value = \null, $params = array())
    {
    }
    /**
     * Create a new ID header for Message-ID or Content-ID.
     *
     * @param string       $name
     * @param string|array $ids
     *
     * @return Swift_Mime_Header
     */
    public function createIdHeader($name, $ids = \null)
    {
    }
    /**
     * Create a new Path header with an address (path) in it.
     *
     * @param string $name
     * @param string $path
     *
     * @return Swift_Mime_Header
     */
    public function createPathHeader($name, $path = \null)
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
     * Make a deep copy of object.
     */
    public function __clone()
    {
    }
    /** Apply the charset to the Header */
    private function setHeaderCharset(\Swift_Mime_Header $header)
    {
    }
}
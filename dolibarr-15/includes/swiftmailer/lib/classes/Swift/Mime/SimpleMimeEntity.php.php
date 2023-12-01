<?php

/*
 * This file is part of SwiftMailer.
 * (c) 2004-2009 Chris Corbyn
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
/**
 * A MIME entity, in a multipart message.
 *
 * @author Chris Corbyn
 */
class Swift_Mime_SimpleMimeEntity implements \Swift_Mime_CharsetObserver, \Swift_Mime_EncodingObserver
{
    /** Main message document; there can only be one of these */
    const LEVEL_TOP = 16;
    /** An entity which nests with the same precedence as an attachment */
    const LEVEL_MIXED = 256;
    /** An entity which nests with the same precedence as a mime part */
    const LEVEL_ALTERNATIVE = 4096;
    /** An entity which nests with the same precedence as embedded content */
    const LEVEL_RELATED = 65536;
    /** A collection of Headers for this mime entity */
    private $headers;
    /** The body as a string, or a stream */
    private $body;
    /** The encoder that encodes the body into a streamable format */
    private $encoder;
    /** Message ID generator */
    private $idGenerator;
    /** A mime boundary, if any is used */
    private $boundary;
    /** Mime types to be used based on the nesting level */
    private $compositeRanges = array('multipart/mixed' => array(self::LEVEL_TOP, self::LEVEL_MIXED), 'multipart/alternative' => array(self::LEVEL_MIXED, self::LEVEL_ALTERNATIVE), 'multipart/related' => array(self::LEVEL_ALTERNATIVE, self::LEVEL_RELATED));
    /** A set of filter rules to define what level an entity should be nested at */
    private $compoundLevelFilters = array();
    /** The nesting level of this entity */
    private $nestingLevel = self::LEVEL_ALTERNATIVE;
    /** A KeyCache instance used during encoding and streaming */
    private $cache;
    /** Direct descendants of this entity */
    private $immediateChildren = array();
    /** All descendants of this entity */
    private $children = array();
    /** The maximum line length of the body of this entity */
    private $maxLineLength = 78;
    /** The order in which alternative mime types should appear */
    private $alternativePartOrder = array('text/plain' => 1, 'text/html' => 2, 'multipart/related' => 3);
    /** The CID of this entity */
    private $id;
    /** The key used for accessing the cache */
    private $cacheKey;
    protected $userContentType;
    /**
     * Create a new SimpleMimeEntity with $headers, $encoder and $cache.
     *
     * @param Swift_Mime_SimpleHeaderSet $headers
     * @param Swift_Mime_ContentEncoder  $encoder
     * @param Swift_KeyCache             $cache
     * @param Swift_IdGenerator          $idGenerator
     */
    public function __construct(\Swift_Mime_SimpleHeaderSet $headers, \Swift_Mime_ContentEncoder $encoder, \Swift_KeyCache $cache, \Swift_IdGenerator $idGenerator)
    {
    }
    /**
     * Generate a new Content-ID or Message-ID for this MIME entity.
     *
     * @return string
     */
    public function generateId()
    {
    }
    /**
     * Get the {@link Swift_Mime_SimpleHeaderSet} for this entity.
     *
     * @return Swift_Mime_SimpleHeaderSet
     */
    public function getHeaders()
    {
    }
    /**
     * Get the nesting level of this entity.
     *
     * @see LEVEL_TOP, LEVEL_MIXED, LEVEL_RELATED, LEVEL_ALTERNATIVE
     *
     * @return int
     */
    public function getNestingLevel()
    {
    }
    /**
     * Get the Content-type of this entity.
     *
     * @return string
     */
    public function getContentType()
    {
    }
    /**
     * Set the Content-type of this entity.
     *
     * @param string $type
     *
     * @return $this
     */
    public function setContentType($type)
    {
    }
    /**
     * Get the CID of this entity.
     *
     * The CID will only be present in headers if a Content-ID header is present.
     *
     * @return string
     */
    public function getId()
    {
    }
    /**
     * Set the CID of this entity.
     *
     * @param string $id
     *
     * @return $this
     */
    public function setId($id)
    {
    }
    /**
     * Get the description of this entity.
     *
     * This value comes from the Content-Description header if set.
     *
     * @return string
     */
    public function getDescription()
    {
    }
    /**
     * Set the description of this entity.
     *
     * This method sets a value in the Content-ID header.
     *
     * @param string $description
     *
     * @return $this
     */
    public function setDescription($description)
    {
    }
    /**
     * Get the maximum line length of the body of this entity.
     *
     * @return int
     */
    public function getMaxLineLength()
    {
    }
    /**
     * Set the maximum line length of lines in this body.
     *
     * Though not enforced by the library, lines should not exceed 1000 chars.
     *
     * @param int $length
     *
     * @return $this
     */
    public function setMaxLineLength($length)
    {
    }
    /**
     * Get all children added to this entity.
     *
     * @return Swift_Mime_SimpleMimeEntity[]
     */
    public function getChildren()
    {
    }
    /**
     * Set all children of this entity.
     *
     * @param Swift_Mime_SimpleMimeEntity[] $children
     * @param int                           $compoundLevel For internal use only
     *
     * @return $this
     */
    public function setChildren(array $children, $compoundLevel = \null)
    {
    }
    /**
     * Get the body of this entity as a string.
     *
     * @return string
     */
    public function getBody()
    {
    }
    /**
     * Set the body of this entity, either as a string, or as an instance of
     * {@link Swift_OutputByteStream}.
     *
     * @param mixed  $body
     * @param string $contentType optional
     *
     * @return $this
     */
    public function setBody($body, $contentType = \null)
    {
    }
    /**
     * Get the encoder used for the body of this entity.
     *
     * @return Swift_Mime_ContentEncoder
     */
    public function getEncoder()
    {
    }
    /**
     * Set the encoder used for the body of this entity.
     *
     * @param Swift_Mime_ContentEncoder $encoder
     *
     * @return $this
     */
    public function setEncoder(\Swift_Mime_ContentEncoder $encoder)
    {
    }
    /**
     * Get the boundary used to separate children in this entity.
     *
     * @return string
     */
    public function getBoundary()
    {
    }
    /**
     * Set the boundary used to separate children in this entity.
     *
     * @param string $boundary
     *
     * @throws Swift_RfcComplianceException
     *
     * @return $this
     */
    public function setBoundary($boundary)
    {
    }
    /**
     * Receive notification that the charset of this entity, or a parent entity
     * has changed.
     *
     * @param string $charset
     */
    public function charsetChanged($charset)
    {
    }
    /**
     * Receive notification that the encoder of this entity or a parent entity
     * has changed.
     *
     * @param Swift_Mime_ContentEncoder $encoder
     */
    public function encoderChanged(\Swift_Mime_ContentEncoder $encoder)
    {
    }
    /**
     * Get this entire entity as a string.
     *
     * @return string
     */
    public function toString()
    {
    }
    /**
     * Get this entire entity as a string.
     *
     * @return string
     */
    protected function bodyToString()
    {
    }
    /**
     * Returns a string representation of this object.
     *
     * @see toString()
     *
     * @return string
     */
    public function __toString()
    {
    }
    /**
     * Write this entire entity to a {@see Swift_InputByteStream}.
     *
     * @param Swift_InputByteStream
     */
    public function toByteStream(\Swift_InputByteStream $is)
    {
    }
    /**
     * Write this entire entity to a {@link Swift_InputByteStream}.
     *
     * @param Swift_InputByteStream
     */
    protected function bodyToByteStream(\Swift_InputByteStream $is)
    {
    }
    /**
     * Get the name of the header that provides the ID of this entity.
     */
    protected function getIdField()
    {
    }
    /**
     * Get the model data (usually an array or a string) for $field.
     */
    protected function getHeaderFieldModel($field)
    {
    }
    /**
     * Set the model data for $field.
     */
    protected function setHeaderFieldModel($field, $model)
    {
    }
    /**
     * Get the parameter value of $parameter on $field header.
     */
    protected function getHeaderParameter($field, $parameter)
    {
    }
    /**
     * Set the parameter value of $parameter on $field header.
     */
    protected function setHeaderParameter($field, $parameter, $value)
    {
    }
    /**
     * Re-evaluate what content type and encoding should be used on this entity.
     */
    protected function fixHeaders()
    {
    }
    /**
     * Get the KeyCache used in this entity.
     *
     * @return Swift_KeyCache
     */
    protected function getCache()
    {
    }
    /**
     * Get the ID generator.
     *
     * @return Swift_IdGenerator
     */
    protected function getIdGenerator()
    {
    }
    /**
     * Empty the KeyCache for this entity.
     */
    protected function clearCache()
    {
    }
    private function readStream(\Swift_OutputByteStream $os)
    {
    }
    private function setEncoding($encoding)
    {
    }
    private function assertValidBoundary($boundary)
    {
    }
    private function setContentTypeInHeaders($type)
    {
    }
    private function setNestingLevel($level)
    {
    }
    private function getCompoundLevel($children)
    {
    }
    private function getNeededChildLevel($child, $compoundLevel)
    {
    }
    private function createChild()
    {
    }
    private function notifyEncoderChanged(\Swift_Mime_ContentEncoder $encoder)
    {
    }
    private function notifyCharsetChanged($charset)
    {
    }
    private function sortChildren()
    {
    }
    /**
     * Empties it's own contents from the cache.
     */
    public function __destruct()
    {
    }
    /**
     * Make a deep copy of object.
     */
    public function __clone()
    {
    }
}
<?php

namespace Webklex\PHPIMAP;

/**
 * Class Attachment
 *
 * @package Webklex\PHPIMAP
 *
 * @property integer part_number
 * @property integer size
 * @property string content
 * @property string type
 * @property string content_type
 * @property string id
 * @property string name
 * @property string disposition
 * @property string img_src
 *
 * @method integer getPartNumber()
 * @method integer setPartNumber(integer $part_number)
 * @method string  getContent()
 * @method string  setContent(string $content)
 * @method string  getType()
 * @method string  setType(string $type)
 * @method string  getContentType()
 * @method string  setContentType(string $content_type)
 * @method string  getId()
 * @method string  setId(string $id)
 * @method string  getSize()
 * @method string  setSize(integer $size)
 * @method string  getName()
 * @method string  getDisposition()
 * @method string  setDisposition(string $disposition)
 * @method string  setImgSrc(string $img_src)
 */
class Attachment
{
    /**
     * @var Message $oMessage
     */
    protected $oMessage;
    /**
     * Used config
     *
     * @var array $config
     */
    protected $config = [];
    /** @var Part $part */
    protected $part;
    /**
     * Attribute holder
     *
     * @var array $attributes
     */
    protected $attributes = ['content' => null, 'type' => null, 'part_number' => 0, 'content_type' => null, 'id' => null, 'name' => null, 'disposition' => null, 'img_src' => null, 'size' => null];
    /**
     * Default mask
     *
     * @var string $mask
     */
    protected $mask = \Webklex\PHPIMAP\Support\Masks\AttachmentMask::class;
    /**
     * Attachment constructor.
     * @param Message   $oMessage
     * @param Part      $part
     */
    public function __construct(\Webklex\PHPIMAP\Message $oMessage, \Webklex\PHPIMAP\Part $part)
    {
    }
    /**
     * Call dynamic attribute setter and getter methods
     * @param string $method
     * @param array $arguments
     *
     * @return mixed
     * @throws MethodNotFoundException
     */
    public function __call($method, $arguments)
    {
    }
    /**
     * Magic setter
     * @param $name
     * @param $value
     *
     * @return mixed
     */
    public function __set($name, $value)
    {
    }
    /**
     * magic getter
     * @param $name
     *
     * @return mixed|null
     */
    public function __get($name)
    {
    }
    /**
     * Determine the structure type
     */
    protected function findType()
    {
    }
    /**
     * Fetch the given attachment
     */
    protected function fetch()
    {
    }
    /**
     * Save the attachment content to your filesystem
     * @param string $path
     * @param string|null $filename
     *
     * @return boolean
     */
    public function save($path, $filename = null)
    {
    }
    /**
     * Set the attachment name and try to decode it
     * @param $name
     */
    public function setName($name)
    {
    }
    /**
     * Get the attachment mime type
     *
     * @return string|null
     */
    public function getMimeType()
    {
    }
    /**
     * Try to guess the attachment file extension
     *
     * @return string|null
     */
    public function getExtension()
    {
    }
    /**
     * Get all attributes
     *
     * @return array
     */
    public function getAttributes()
    {
    }
    /**
     * @return Message
     */
    public function getMessage()
    {
    }
    /**
     * Set the default mask
     * @param $mask
     *
     * @return $this
     */
    public function setMask($mask)
    {
    }
    /**
     * Get the used default mask
     *
     * @return string
     */
    public function getMask()
    {
    }
    /**
     * Get a masked instance by providing a mask name
     * @param string|null $mask
     *
     * @return mixed
     * @throws MaskNotFoundException
     */
    public function mask($mask = null)
    {
    }
}
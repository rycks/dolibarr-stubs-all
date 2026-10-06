<?php

namespace Webklex\PHPIMAP\Support\Masks;

/**
 * Class MessageMask
 *
 * @package Webklex\PHPIMAP\Support\Masks
 */
class MessageMask extends \Webklex\PHPIMAP\Support\Masks\Mask
{
    /** @var Message $parent */
    protected $parent;
    /**
     * Get the message html body
     *
     * @return null
     */
    public function getHtmlBody()
    {
    }
    /**
     * Get the Message html body filtered by an optional callback
     * @param callable|bool $callback
     *
     * @return string|null
     */
    public function getCustomHTMLBody($callback = false)
    {
    }
    /**
     * Get the Message html body with embedded base64 images
     * the resulting $body.
     *
     * @return string|null
     */
    public function getHTMLBodyWithEmbeddedBase64Images()
    {
    }
}
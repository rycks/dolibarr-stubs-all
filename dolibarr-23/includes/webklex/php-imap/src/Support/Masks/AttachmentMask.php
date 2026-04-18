<?php

namespace Webklex\PHPIMAP\Support\Masks;

/**
 * Class AttachmentMask
 *
 * @package Webklex\PHPIMAP\Support\Masks
 */
class AttachmentMask extends \Webklex\PHPIMAP\Support\Masks\Mask
{
    /** @var Attachment $parent */
    protected $parent;
    /**
     * Get the attachment content base64 encoded
     *
     * @return string|null
     */
    public function getContentBase64Encoded()
    {
    }
    /**
     * Get an base64 image src string
     *
     * @return string|null
     */
    public function getImageSrc()
    {
    }
}
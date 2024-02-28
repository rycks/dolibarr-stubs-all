<?php

/*
 * This file is part of SwiftMailer.
 * (c) 2004-2009 Chris Corbyn
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
/**
 * An attachment, in a multipart message.
 *
 * @author Chris Corbyn
 */
class Swift_Mime_Attachment extends \Swift_Mime_SimpleMimeEntity
{
    /** Recognized MIME types */
    private $mimeTypes = array();
    /**
     * Create a new Attachment with $headers, $encoder and $cache.
     *
     * @param Swift_Mime_SimpleHeaderSet $headers
     * @param Swift_Mime_ContentEncoder  $encoder
     * @param Swift_KeyCache             $cache
     * @param Swift_IdGenerator          $idGenerator
     * @param array                      $mimeTypes
     */
    public function __construct(\Swift_Mime_SimpleHeaderSet $headers, \Swift_Mime_ContentEncoder $encoder, \Swift_KeyCache $cache, \Swift_IdGenerator $idGenerator, $mimeTypes = array())
    {
    }
    /**
     * Get the nesting level used for this attachment.
     *
     * Always returns {@link LEVEL_MIXED}.
     *
     * @return int
     */
    public function getNestingLevel()
    {
    }
    /**
     * Get the Content-Disposition of this attachment.
     *
     * By default attachments have a disposition of "attachment".
     *
     * @return string
     */
    public function getDisposition()
    {
    }
    /**
     * Set the Content-Disposition of this attachment.
     *
     * @param string $disposition
     *
     * @return $this
     */
    public function setDisposition($disposition)
    {
    }
    /**
     * Get the filename of this attachment when downloaded.
     *
     * @return string
     */
    public function getFilename()
    {
    }
    /**
     * Set the filename of this attachment.
     *
     * @param string $filename
     *
     * @return $this
     */
    public function setFilename($filename)
    {
    }
    /**
     * Get the file size of this attachment.
     *
     * @return int
     */
    public function getSize()
    {
    }
    /**
     * Set the file size of this attachment.
     *
     * @param int $size
     *
     * @return $this
     */
    public function setSize($size)
    {
    }
    /**
     * Set the file that this attachment is for.
     *
     * @param Swift_FileStream $file
     * @param string           $contentType optional
     *
     * @return $this
     */
    public function setFile(\Swift_FileStream $file, $contentType = \null)
    {
    }
}
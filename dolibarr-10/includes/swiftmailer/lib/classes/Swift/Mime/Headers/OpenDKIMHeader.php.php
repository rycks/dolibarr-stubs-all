<?php

/*
 * This file is part of SwiftMailer.
 * (c) 2004-2009 Chris Corbyn
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
/**
 * An OpenDKIM Specific Header using only raw header datas without encoding.
 *
 * @author De Cock Xavier <xdecock@gmail.com>
 */
class Swift_Mime_Headers_OpenDKIMHeader implements \Swift_Mime_Header
{
    /**
     * The value of this Header.
     *
     * @var string
     */
    private $value;
    /**
     * The name of this Header.
     *
     * @var string
     */
    private $fieldName;
    /**
     * @param string $name
     */
    public function __construct($name)
    {
    }
    /**
     * Get the type of Header that this instance represents.
     *
     * @see TYPE_TEXT, TYPE_PARAMETERIZED, TYPE_MAILBOX
     * @see TYPE_DATE, TYPE_ID, TYPE_PATH
     *
     * @return int
     */
    public function getFieldType()
    {
    }
    /**
     * Set the model for the field body.
     *
     * This method takes a string for the field value.
     *
     * @param string $model
     */
    public function setFieldBodyModel($model)
    {
    }
    /**
     * Get the model for the field body.
     *
     * This method returns a string.
     *
     * @return string
     */
    public function getFieldBodyModel()
    {
    }
    /**
     * Get the (unencoded) value of this header.
     *
     * @return string
     */
    public function getValue()
    {
    }
    /**
     * Set the (unencoded) value of this header.
     *
     * @param string $value
     */
    public function setValue($value)
    {
    }
    /**
     * Get the value of this header prepared for rendering.
     *
     * @return string
     */
    public function getFieldBody()
    {
    }
    /**
     * Get this Header rendered as a RFC 2822 compliant string.
     *
     * @return string
     */
    public function toString()
    {
    }
    /**
     * Set the Header FieldName.
     *
     * @see Swift_Mime_Header::getFieldName()
     */
    public function getFieldName()
    {
    }
    /**
     * Ignored.
     */
    public function setCharset($charset)
    {
    }
}
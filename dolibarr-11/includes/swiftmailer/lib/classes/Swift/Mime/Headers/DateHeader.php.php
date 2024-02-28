<?php

/*
 * This file is part of SwiftMailer.
 * (c) 2004-2009 Chris Corbyn
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
/**
 * A Date MIME Header for Swift Mailer.
 *
 * @author Chris Corbyn
 */
class Swift_Mime_Headers_DateHeader extends \Swift_Mime_Headers_AbstractHeader
{
    /**
     * Date-time value of this Header.
     *
     * @var DateTimeImmutable
     */
    private $dateTime;
    /**
     * Creates a new DateHeader with $name.
     *
     * @param string $name of Header
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
     * @param DateTimeInterface $model
     */
    public function setFieldBodyModel($model)
    {
    }
    /**
     * Get the model for the field body.
     *
     * @return DateTimeImmutable
     */
    public function getFieldBodyModel()
    {
    }
    /**
     * Get the date-time representing the Date in this Header.
     *
     * @return DateTimeImmutable
     */
    public function getDateTime()
    {
    }
    /**
     * Set the date-time of the Date in this Header.
     *
     * If a DateTime instance is provided, it is converted to DateTimeImmutable.
     *
     * @param DateTimeInterface $dateTime
     */
    public function setDateTime(\DateTimeInterface $dateTime)
    {
    }
    /**
     * Get the string value of the body in this Header.
     *
     * This is not necessarily RFC 2822 compliant since folding white space will
     * not be added at this stage (see {@link toString()} for that).
     *
     * @see toString()
     *
     * @return string
     */
    public function getFieldBody()
    {
    }
}
<?php

/**
 * A Path Header in Swift Mailer, such a Return-Path.
 *
 * @author Chris Corbyn
 */
class Swift_Mime_Headers_PathHeader extends \Swift_Mime_Headers_AbstractHeader
{
    /**
     * The address in this Header (if specified).
     *
     * @var string
     */
    private $address;
    /**
     * The strict EmailValidator.
     *
     * @var EmailValidator
     */
    private $emailValidator;
    /**
     * Creates a new PathHeader with the given $name.
     *
     * @param string         $name
     * @param EmailValidator $emailValidator
     */
    public function __construct($name, \Egulias\EmailValidator\EmailValidator $emailValidator)
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
     * This method takes a string for an address.
     *
     * @param string $model
     *
     * @throws Swift_RfcComplianceException
     */
    public function setFieldBodyModel($model)
    {
    }
    /**
     * Get the model for the field body.
     * This method returns a string email address.
     *
     * @return mixed
     */
    public function getFieldBodyModel()
    {
    }
    /**
     * Set the Address which should appear in this Header.
     *
     * @param string $address
     *
     * @throws Swift_RfcComplianceException
     */
    public function setAddress($address)
    {
    }
    /**
     * Get the address which is used in this Header (if any).
     *
     * Null is returned if no address is set.
     *
     * @return string
     */
    public function getAddress()
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
    /**
     * Throws an Exception if the address passed does not comply with RFC 2822.
     *
     * @param string $address
     *
     * @throws Swift_RfcComplianceException If address is invalid
     */
    private function assertValidAddress($address)
    {
    }
}
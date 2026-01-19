<?php

/**
 * An ID MIME Header for something like Message-ID or Content-ID.
 *
 * @author Chris Corbyn
 */
class Swift_Mime_Headers_IdentificationHeader extends \Swift_Mime_Headers_AbstractHeader
{
    /**
     * The IDs used in the value of this Header.
     *
     * This may hold multiple IDs or just a single ID.
     *
     * @var string[]
     */
    private $ids = [];
    /**
     * The strict EmailValidator.
     *
     * @var EmailValidator
     */
    private $emailValidator;
    private $addressEncoder;
    /**
     * Creates a new IdentificationHeader with the given $name and $id.
     *
     * @param string $name
     */
    public function __construct($name, \Egulias\EmailValidator\EmailValidator $emailValidator, \Swift_AddressEncoder $addressEncoder = \null)
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
     * This method takes a string ID, or an array of IDs.
     *
     * @param mixed $model
     *
     * @throws Swift_RfcComplianceException
     */
    public function setFieldBodyModel($model)
    {
    }
    /**
     * Get the model for the field body.
     *
     * This method returns an array of IDs
     *
     * @return array
     */
    public function getFieldBodyModel()
    {
    }
    /**
     * Set the ID used in the value of this header.
     *
     * @param string|array $id
     *
     * @throws Swift_RfcComplianceException
     */
    public function setId($id)
    {
    }
    /**
     * Get the ID used in the value of this Header.
     *
     * If multiple IDs are set only the first is returned.
     *
     * @return string
     */
    public function getId()
    {
    }
    /**
     * Set a collection of IDs to use in the value of this Header.
     *
     * @param string[] $ids
     *
     * @throws Swift_RfcComplianceException
     */
    public function setIds(array $ids)
    {
    }
    /**
     * Get the list of IDs used in this Header.
     *
     * @return string[]
     */
    public function getIds()
    {
    }
    /**
     * Get the string value of the body in this Header.
     *
     * This is not necessarily RFC 2822 compliant since folding white space will
     * not be added at this stage (see {@see toString()} for that).
     *
     * @see toString()
     *
     * @throws Swift_RfcComplianceException
     *
     * @return string
     */
    public function getFieldBody()
    {
    }
    /**
     * Throws an Exception if the id passed does not comply with RFC 2822.
     *
     * @param string $id
     *
     * @throws Swift_RfcComplianceException
     */
    private function assertValidId($id)
    {
    }
}
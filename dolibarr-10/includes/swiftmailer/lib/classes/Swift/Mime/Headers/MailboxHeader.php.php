<?php

/**
 * A Mailbox Address MIME Header for something like From or Sender.
 *
 * @author Chris Corbyn
 */
class Swift_Mime_Headers_MailboxHeader extends \Swift_Mime_Headers_AbstractHeader
{
    /**
     * The mailboxes used in this Header.
     *
     * @var string[]
     */
    private $mailboxes = array();
    /**
     * The strict EmailValidator.
     *
     * @var EmailValidator
     */
    private $emailValidator;
    /**
     * Creates a new MailboxHeader with $name.
     *
     * @param string                   $name           of Header
     * @param Swift_Mime_HeaderEncoder $encoder
     * @param EmailValidator           $emailValidator
     */
    public function __construct($name, \Swift_Mime_HeaderEncoder $encoder, \Egulias\EmailValidator\EmailValidator $emailValidator)
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
     * This method takes a string, or an array of addresses.
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
     * This method returns an associative array like {@link getNameAddresses()}
     *
     * @throws Swift_RfcComplianceException
     *
     * @return array
     */
    public function getFieldBodyModel()
    {
    }
    /**
     * Set a list of mailboxes to be shown in this Header.
     *
     * The mailboxes can be a simple array of addresses, or an array of
     * key=>value pairs where (email => personalName).
     * Example:
     * <code>
     * <?php
     * //Sets two mailboxes in the Header, one with a personal name
     * $header->setNameAddresses(array(
     *  'chris@swiftmailer.org' => 'Chris Corbyn',
     *  'mark@swiftmailer.org' //No associated personal name
     *  ));
     * ?>
     * </code>
     *
     * @see __construct()
     * @see setAddresses()
     * @see setValue()
     *
     * @param string|string[] $mailboxes
     *
     * @throws Swift_RfcComplianceException
     */
    public function setNameAddresses($mailboxes)
    {
    }
    /**
     * Get the full mailbox list of this Header as an array of valid RFC 2822 strings.
     *
     * Example:
     * <code>
     * <?php
     * $header = new Swift_Mime_Headers_MailboxHeader('From',
     *  array('chris@swiftmailer.org' => 'Chris Corbyn',
     *  'mark@swiftmailer.org' => 'Mark Corbyn')
     *  );
     * print_r($header->getNameAddressStrings());
     * // array (
     * // 0 => Chris Corbyn <chris@swiftmailer.org>,
     * // 1 => Mark Corbyn <mark@swiftmailer.org>
     * // )
     * ?>
     * </code>
     *
     * @see getNameAddresses()
     * @see toString()
     *
     * @throws Swift_RfcComplianceException
     *
     * @return string[]
     */
    public function getNameAddressStrings()
    {
    }
    /**
     * Get all mailboxes in this Header as key=>value pairs.
     *
     * The key is the address and the value is the name (or null if none set).
     * Example:
     * <code>
     * <?php
     * $header = new Swift_Mime_Headers_MailboxHeader('From',
     *  array('chris@swiftmailer.org' => 'Chris Corbyn',
     *  'mark@swiftmailer.org' => 'Mark Corbyn')
     *  );
     * print_r($header->getNameAddresses());
     * // array (
     * // chris@swiftmailer.org => Chris Corbyn,
     * // mark@swiftmailer.org => Mark Corbyn
     * // )
     * ?>
     * </code>
     *
     * @see getAddresses()
     * @see getNameAddressStrings()
     *
     * @return string[]
     */
    public function getNameAddresses()
    {
    }
    /**
     * Makes this Header represent a list of plain email addresses with no names.
     *
     * Example:
     * <code>
     * <?php
     * //Sets three email addresses as the Header data
     * $header->setAddresses(
     *  array('one@domain.tld', 'two@domain.tld', 'three@domain.tld')
     *  );
     * ?>
     * </code>
     *
     * @see setNameAddresses()
     * @see setValue()
     *
     * @param string[] $addresses
     *
     * @throws Swift_RfcComplianceException
     */
    public function setAddresses($addresses)
    {
    }
    /**
     * Get all email addresses in this Header.
     *
     * @see getNameAddresses()
     *
     * @return string[]
     */
    public function getAddresses()
    {
    }
    /**
     * Remove one or more addresses from this Header.
     *
     * @param string|string[] $addresses
     */
    public function removeAddresses($addresses)
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
     * @throws Swift_RfcComplianceException
     *
     * @return string
     */
    public function getFieldBody()
    {
    }
    /**
     * Normalizes a user-input list of mailboxes into consistent key=>value pairs.
     *
     * @param string[] $mailboxes
     *
     * @return string[]
     */
    protected function normalizeMailboxes(array $mailboxes)
    {
    }
    /**
     * Produces a compliant, formatted display-name based on the string given.
     *
     * @param string $displayName as displayed
     * @param bool   $shorten     the first line to make remove for header name
     *
     * @return string
     */
    protected function createDisplayNameString($displayName, $shorten = \false)
    {
    }
    /**
     * Creates a string form of all the mailboxes in the passed array.
     *
     * @param string[] $mailboxes
     *
     * @throws Swift_RfcComplianceException
     *
     * @return string
     */
    protected function createMailboxListString(array $mailboxes)
    {
    }
    /**
     * Redefine the encoding requirements for mailboxes.
     *
     * All "specials" must be encoded as the full header value will not be quoted
     *
     * @see RFC 2822 3.2.1
     *
     * @param string $token
     *
     * @return bool
     */
    protected function tokenNeedsEncoding($token)
    {
    }
    /**
     * Return an array of strings conforming the the name-addr spec of RFC 2822.
     *
     * @param string[] $mailboxes
     *
     * @return string[]
     */
    private function createNameAddressStrings(array $mailboxes)
    {
    }
    /**
     * Throws an Exception if the address passed does not comply with RFC 2822.
     *
     * @param string $address
     *
     * @throws Swift_RfcComplianceException If invalid.
     */
    private function assertValidAddress($address)
    {
    }
}
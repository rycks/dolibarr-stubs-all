<?php

namespace Sabre\VObject\Component;

/**
 * The VCard component.
 *
 * This component represents the BEGIN:VCARD and END:VCARD found in every
 * vcard.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class VCard extends \Sabre\VObject\Document
{
    /**
     * The default name for this component.
     *
     * This should be 'VCALENDAR' or 'VCARD'.
     *
     * @var string
     */
    public static $defaultName = 'VCARD';
    /**
     * Caching the version number.
     *
     * @var int
     */
    private $version = null;
    /**
     * This is a list of components, and which classes they should map to.
     *
     * @var array
     */
    public static $componentMap = ['VCARD' => \Sabre\VObject\Component\VCard::class];
    /**
     * List of value-types, and which classes they map to.
     *
     * @var array
     */
    public static $valueMap = [
        'BINARY' => \Sabre\VObject\Property\Binary::class,
        'BOOLEAN' => \Sabre\VObject\Property\Boolean::class,
        'CONTENT-ID' => \Sabre\VObject\Property\FlatText::class,
        // vCard 2.1 only
        'DATE' => \Sabre\VObject\Property\VCard\Date::class,
        'DATE-TIME' => \Sabre\VObject\Property\VCard\DateTime::class,
        'DATE-AND-OR-TIME' => \Sabre\VObject\Property\VCard\DateAndOrTime::class,
        // vCard only
        'FLOAT' => \Sabre\VObject\Property\FloatValue::class,
        'INTEGER' => \Sabre\VObject\Property\IntegerValue::class,
        'LANGUAGE-TAG' => \Sabre\VObject\Property\VCard\LanguageTag::class,
        'PHONE-NUMBER' => \Sabre\VObject\Property\VCard\PhoneNumber::class,
        // vCard 3.0 only
        'TIMESTAMP' => \Sabre\VObject\Property\VCard\TimeStamp::class,
        'TEXT' => \Sabre\VObject\Property\Text::class,
        'TIME' => \Sabre\VObject\Property\Time::class,
        'UNKNOWN' => \Sabre\VObject\Property\Unknown::class,
        // jCard / jCal-only.
        'URI' => \Sabre\VObject\Property\Uri::class,
        'URL' => \Sabre\VObject\Property\Uri::class,
        // vCard 2.1 only
        'UTC-OFFSET' => \Sabre\VObject\Property\UtcOffset::class,
    ];
    /**
     * List of properties, and which classes they map to.
     *
     * @var array
     */
    public static $propertyMap = [
        // vCard 2.1 properties and up
        'N' => \Sabre\VObject\Property\Text::class,
        'FN' => \Sabre\VObject\Property\FlatText::class,
        'PHOTO' => \Sabre\VObject\Property\Binary::class,
        'BDAY' => \Sabre\VObject\Property\VCard\DateAndOrTime::class,
        'ADR' => \Sabre\VObject\Property\Text::class,
        'LABEL' => \Sabre\VObject\Property\FlatText::class,
        // Removed in vCard 4.0
        'TEL' => \Sabre\VObject\Property\FlatText::class,
        'EMAIL' => \Sabre\VObject\Property\FlatText::class,
        'MAILER' => \Sabre\VObject\Property\FlatText::class,
        // Removed in vCard 4.0
        'GEO' => \Sabre\VObject\Property\FlatText::class,
        'TITLE' => \Sabre\VObject\Property\FlatText::class,
        'ROLE' => \Sabre\VObject\Property\FlatText::class,
        'LOGO' => \Sabre\VObject\Property\Binary::class,
        // 'AGENT'   => 'Sabre\\VObject\\Property\\',      // Todo: is an embedded vCard. Probably rare, so
        // not supported at the moment
        'ORG' => \Sabre\VObject\Property\Text::class,
        'NOTE' => \Sabre\VObject\Property\FlatText::class,
        'REV' => \Sabre\VObject\Property\VCard\TimeStamp::class,
        'SOUND' => \Sabre\VObject\Property\FlatText::class,
        'URL' => \Sabre\VObject\Property\Uri::class,
        'UID' => \Sabre\VObject\Property\FlatText::class,
        'VERSION' => \Sabre\VObject\Property\FlatText::class,
        'KEY' => \Sabre\VObject\Property\FlatText::class,
        'TZ' => \Sabre\VObject\Property\Text::class,
        // vCard 3.0 properties
        'CATEGORIES' => \Sabre\VObject\Property\Text::class,
        'SORT-STRING' => \Sabre\VObject\Property\FlatText::class,
        'PRODID' => \Sabre\VObject\Property\FlatText::class,
        'NICKNAME' => \Sabre\VObject\Property\Text::class,
        'CLASS' => \Sabre\VObject\Property\FlatText::class,
        // Removed in vCard 4.0
        // rfc2739 properties
        'FBURL' => \Sabre\VObject\Property\Uri::class,
        'CAPURI' => \Sabre\VObject\Property\Uri::class,
        'CALURI' => \Sabre\VObject\Property\Uri::class,
        'CALADRURI' => \Sabre\VObject\Property\Uri::class,
        // rfc4770 properties
        'IMPP' => \Sabre\VObject\Property\Uri::class,
        // vCard 4.0 properties
        'SOURCE' => \Sabre\VObject\Property\Uri::class,
        'XML' => \Sabre\VObject\Property\FlatText::class,
        'ANNIVERSARY' => \Sabre\VObject\Property\VCard\DateAndOrTime::class,
        'CLIENTPIDMAP' => \Sabre\VObject\Property\Text::class,
        'LANG' => \Sabre\VObject\Property\VCard\LanguageTag::class,
        'GENDER' => \Sabre\VObject\Property\Text::class,
        'KIND' => \Sabre\VObject\Property\FlatText::class,
        'MEMBER' => \Sabre\VObject\Property\Uri::class,
        'RELATED' => \Sabre\VObject\Property\Uri::class,
        // rfc6474 properties
        'BIRTHPLACE' => \Sabre\VObject\Property\FlatText::class,
        'DEATHPLACE' => \Sabre\VObject\Property\FlatText::class,
        'DEATHDATE' => \Sabre\VObject\Property\VCard\DateAndOrTime::class,
        // rfc6715 properties
        'EXPERTISE' => \Sabre\VObject\Property\FlatText::class,
        'HOBBY' => \Sabre\VObject\Property\FlatText::class,
        'INTEREST' => \Sabre\VObject\Property\FlatText::class,
        'ORG-DIRECTORY' => \Sabre\VObject\Property\FlatText::class,
    ];
    /**
     * Returns the current document type.
     *
     * @return int
     */
    public function getDocumentType()
    {
    }
    /**
     * Converts the document to a different vcard version.
     *
     * Use one of the VCARD constants for the target. This method will return
     * a copy of the vcard in the new version.
     *
     * At the moment the only supported conversion is from 3.0 to 4.0.
     *
     * If input and output version are identical, a clone is returned.
     *
     * @param int $target
     *
     * @return VCard
     */
    public function convert($target)
    {
    }
    /**
     * VCards with version 2.1, 3.0 and 4.0 are found.
     *
     * If the VCARD doesn't know its version, 2.1 is assumed.
     */
    const DEFAULT_VERSION = self::VCARD21;
    /**
     * Validates the node for correctness.
     *
     * The following options are supported:
     *   Node::REPAIR - May attempt to automatically repair the problem.
     *
     * This method returns an array with detected problems.
     * Every element has the following properties:
     *
     *  * level - problem level.
     *  * message - A human-readable string describing the issue.
     *  * node - A reference to the problematic node.
     *
     * The level means:
     *   1 - The issue was repaired (only happens if REPAIR was turned on)
     *   2 - An inconsequential issue
     *   3 - A severe issue.
     *
     * @param int $options
     *
     * @return array
     */
    public function validate($options = 0)
    {
    }
    /**
     * A simple list of validation rules.
     *
     * This is simply a list of properties, and how many times they either
     * must or must not appear.
     *
     * Possible values per property:
     *   * 0 - Must not appear.
     *   * 1 - Must appear exactly once.
     *   * + - Must appear at least once.
     *   * * - Can appear any number of times.
     *   * ? - May appear, but not more than once.
     *
     * @var array
     */
    public function getValidationRules()
    {
    }
    /**
     * Returns a preferred field.
     *
     * VCards can indicate whether a field such as ADR, TEL or EMAIL is
     * preferred by specifying TYPE=PREF (vcard 2.1, 3) or PREF=x (vcard 4, x
     * being a number between 1 and 100).
     *
     * If neither of those parameters are specified, the first is returned, if
     * a field with that name does not exist, null is returned.
     *
     * @param string $fieldName
     *
     * @return VObject\Property|null
     */
    public function preferred($propertyName)
    {
    }
    /**
     * Returns a property with a specific TYPE value (ADR, TEL, or EMAIL).
     *
     * This function will return null if the property does not exist. If there are
     * multiple properties with the same TYPE value, only one will be returned.
     *
     * @param string $propertyName
     * @param string $type
     *
     * @return VObject\Property|null
     */
    public function getByType($propertyName, $type)
    {
    }
    /**
     * This method should return a list of default property values.
     *
     * @return array
     */
    protected function getDefaults()
    {
    }
    /**
     * This method returns an array, with the representation as it should be
     * encoded in json. This is used to create jCard or jCal documents.
     *
     * @return array
     */
    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
    }
    /**
     * This method serializes the data into XML. This is used to create xCard or
     * xCal documents.
     *
     * @param Xml\Writer $writer XML writer
     */
    public function xmlSerialize(\Sabre\Xml\Writer $writer) : void
    {
    }
    /**
     * Returns the default class for a property name.
     *
     * @param string $propertyName
     *
     * @return string
     */
    public function getClassNameForPropertyName($propertyName)
    {
    }
}
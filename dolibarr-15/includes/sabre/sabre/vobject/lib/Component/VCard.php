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
    static $defaultName = 'VCARD';
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
    static $componentMap = ['VCARD' => 'Sabre\\VObject\\Component\\VCard'];
    /**
     * List of value-types, and which classes they map to.
     *
     * @var array
     */
    static $valueMap = [
        'BINARY' => 'Sabre\\VObject\\Property\\Binary',
        'BOOLEAN' => 'Sabre\\VObject\\Property\\Boolean',
        'CONTENT-ID' => 'Sabre\\VObject\\Property\\FlatText',
        // vCard 2.1 only
        'DATE' => 'Sabre\\VObject\\Property\\VCard\\Date',
        'DATE-TIME' => 'Sabre\\VObject\\Property\\VCard\\DateTime',
        'DATE-AND-OR-TIME' => 'Sabre\\VObject\\Property\\VCard\\DateAndOrTime',
        // vCard only
        'FLOAT' => 'Sabre\\VObject\\Property\\FloatValue',
        'INTEGER' => 'Sabre\\VObject\\Property\\IntegerValue',
        'LANGUAGE-TAG' => 'Sabre\\VObject\\Property\\VCard\\LanguageTag',
        'TIMESTAMP' => 'Sabre\\VObject\\Property\\VCard\\TimeStamp',
        'TEXT' => 'Sabre\\VObject\\Property\\Text',
        'TIME' => 'Sabre\\VObject\\Property\\Time',
        'UNKNOWN' => 'Sabre\\VObject\\Property\\Unknown',
        // jCard / jCal-only.
        'URI' => 'Sabre\\VObject\\Property\\Uri',
        'URL' => 'Sabre\\VObject\\Property\\Uri',
        // vCard 2.1 only
        'UTC-OFFSET' => 'Sabre\\VObject\\Property\\UtcOffset',
    ];
    /**
     * List of properties, and which classes they map to.
     *
     * @var array
     */
    static $propertyMap = [
        // vCard 2.1 properties and up
        'N' => 'Sabre\\VObject\\Property\\Text',
        'FN' => 'Sabre\\VObject\\Property\\FlatText',
        'PHOTO' => 'Sabre\\VObject\\Property\\Binary',
        'BDAY' => 'Sabre\\VObject\\Property\\VCard\\DateAndOrTime',
        'ADR' => 'Sabre\\VObject\\Property\\Text',
        'LABEL' => 'Sabre\\VObject\\Property\\FlatText',
        // Removed in vCard 4.0
        'TEL' => 'Sabre\\VObject\\Property\\FlatText',
        'EMAIL' => 'Sabre\\VObject\\Property\\FlatText',
        'MAILER' => 'Sabre\\VObject\\Property\\FlatText',
        // Removed in vCard 4.0
        'GEO' => 'Sabre\\VObject\\Property\\FlatText',
        'TITLE' => 'Sabre\\VObject\\Property\\FlatText',
        'ROLE' => 'Sabre\\VObject\\Property\\FlatText',
        'LOGO' => 'Sabre\\VObject\\Property\\Binary',
        // 'AGENT'   => 'Sabre\\VObject\\Property\\',      // Todo: is an embedded vCard. Probably rare, so
        // not supported at the moment
        'ORG' => 'Sabre\\VObject\\Property\\Text',
        'NOTE' => 'Sabre\\VObject\\Property\\FlatText',
        'REV' => 'Sabre\\VObject\\Property\\VCard\\TimeStamp',
        'SOUND' => 'Sabre\\VObject\\Property\\FlatText',
        'URL' => 'Sabre\\VObject\\Property\\Uri',
        'UID' => 'Sabre\\VObject\\Property\\FlatText',
        'VERSION' => 'Sabre\\VObject\\Property\\FlatText',
        'KEY' => 'Sabre\\VObject\\Property\\FlatText',
        'TZ' => 'Sabre\\VObject\\Property\\Text',
        // vCard 3.0 properties
        'CATEGORIES' => 'Sabre\\VObject\\Property\\Text',
        'SORT-STRING' => 'Sabre\\VObject\\Property\\FlatText',
        'PRODID' => 'Sabre\\VObject\\Property\\FlatText',
        'NICKNAME' => 'Sabre\\VObject\\Property\\Text',
        'CLASS' => 'Sabre\\VObject\\Property\\FlatText',
        // Removed in vCard 4.0
        // rfc2739 properties
        'FBURL' => 'Sabre\\VObject\\Property\\Uri',
        'CAPURI' => 'Sabre\\VObject\\Property\\Uri',
        'CALURI' => 'Sabre\\VObject\\Property\\Uri',
        'CALADRURI' => 'Sabre\\VObject\\Property\\Uri',
        // rfc4770 properties
        'IMPP' => 'Sabre\\VObject\\Property\\Uri',
        // vCard 4.0 properties
        'SOURCE' => 'Sabre\\VObject\\Property\\Uri',
        'XML' => 'Sabre\\VObject\\Property\\FlatText',
        'ANNIVERSARY' => 'Sabre\\VObject\\Property\\VCard\\DateAndOrTime',
        'CLIENTPIDMAP' => 'Sabre\\VObject\\Property\\Text',
        'LANG' => 'Sabre\\VObject\\Property\\VCard\\LanguageTag',
        'GENDER' => 'Sabre\\VObject\\Property\\Text',
        'KIND' => 'Sabre\\VObject\\Property\\FlatText',
        'MEMBER' => 'Sabre\\VObject\\Property\\Uri',
        'RELATED' => 'Sabre\\VObject\\Property\\Uri',
        // rfc6474 properties
        'BIRTHPLACE' => 'Sabre\\VObject\\Property\\FlatText',
        'DEATHPLACE' => 'Sabre\\VObject\\Property\\FlatText',
        'DEATHDATE' => 'Sabre\\VObject\\Property\\VCard\\DateAndOrTime',
        // rfc6715 properties
        'EXPERTISE' => 'Sabre\\VObject\\Property\\FlatText',
        'HOBBY' => 'Sabre\\VObject\\Property\\FlatText',
        'INTEREST' => 'Sabre\\VObject\\Property\\FlatText',
        'ORG-DIRECTORY' => 'Sabre\\VObject\\Property\\FlatText',
    ];
    /**
     * Returns the current document type.
     *
     * @return int
     */
    function getDocumentType()
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
    function convert($target)
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
    function validate($options = 0)
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
    function getValidationRules()
    {
    }
    /**
     * Returns a preferred field.
     *
     * VCards can indicate wether a field such as ADR, TEL or EMAIL is
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
    function preferred($propertyName)
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
    function getByType($propertyName, $type)
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
    function jsonSerialize()
    {
    }
    /**
     * This method serializes the data into XML. This is used to create xCard or
     * xCal documents.
     *
     * @param Xml\Writer $writer  XML writer.
     *
     * @return void
     */
    function xmlSerialize(\Sabre\Xml\Writer $writer)
    {
    }
    /**
     * Returns the default class for a property name.
     *
     * @param string $propertyName
     *
     * @return string
     */
    function getClassNameForPropertyName($propertyName)
    {
    }
}
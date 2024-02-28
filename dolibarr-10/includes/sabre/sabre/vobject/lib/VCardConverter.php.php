<?php

namespace Sabre\VObject;

/**
 * This utility converts vcards from one version to another.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class VCardConverter
{
    /**
     * Converts a vCard object to a new version.
     *
     * targetVersion must be one of:
     *   Document::VCARD21
     *   Document::VCARD30
     *   Document::VCARD40
     *
     * Currently only 3.0 and 4.0 as input and output versions.
     *
     * 2.1 has some minor support for the input version, it's incomplete at the
     * moment though.
     *
     * If input and output version are identical, a clone is returned.
     *
     * @param Component\VCard $input
     * @param int $targetVersion
     */
    function convert(\Sabre\VObject\Component\VCard $input, $targetVersion)
    {
    }
    /**
     * Handles conversion of a single property.
     *
     * @param Component\VCard $input
     * @param Component\VCard $output
     * @param Property $property
     * @param int $targetVersion
     *
     * @return void
     */
    protected function convertProperty(\Sabre\VObject\Component\VCard $input, \Sabre\VObject\Component\VCard $output, \Sabre\VObject\Property $property, $targetVersion)
    {
    }
    /**
     * Converts a BINARY property to a URI property.
     *
     * vCard 4.0 no longer supports BINARY properties.
     *
     * @param Component\VCard $output
     * @param Property\Uri $property The input property.
     * @param $parameters List of parameters that will eventually be added to
     *                    the new property.
     *
     * @return Property\Uri
     */
    protected function convertBinaryToUri(\Sabre\VObject\Component\VCard $output, \Sabre\VObject\Property\Binary $newProperty, array &$parameters)
    {
    }
    /**
     * Converts a URI property to a BINARY property.
     *
     * In vCard 4.0 attachments are encoded as data: uri. Even though these may
     * be valid in vCard 3.0 as well, we should convert those to BINARY if
     * possible, to improve compatibility.
     *
     * @param Component\VCard $output
     * @param Property\Uri $property The input property.
     *
     * @return Property\Binary|null
     */
    protected function convertUriToBinary(\Sabre\VObject\Component\VCard $output, \Sabre\VObject\Property\Uri $newProperty)
    {
    }
    /**
     * Adds parameters to a new property for vCard 4.0.
     *
     * @param Property $newProperty
     * @param array $parameters
     *
     * @return void
     */
    protected function convertParameters40(\Sabre\VObject\Property $newProperty, array $parameters)
    {
    }
    /**
     * Adds parameters to a new property for vCard 3.0.
     *
     * @param Property $newProperty
     * @param array $parameters
     *
     * @return void
     */
    protected function convertParameters30(\Sabre\VObject\Property $newProperty, array $parameters)
    {
    }
}
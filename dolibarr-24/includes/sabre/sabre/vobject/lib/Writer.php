<?php

namespace Sabre\VObject;

/**
 * iCalendar/vCard/jCal/jCard/xCal/xCard writer object.
 *
 * This object provides a few (static) convenience methods to quickly access
 * the serializers.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Ivan Enderlin
 * @license http://sabre.io/license/ Modified BSD License
 */
class Writer
{
    /**
     * Serializes a vCard or iCalendar object.
     *
     * @return string
     */
    public static function write(\Sabre\VObject\Component $component)
    {
    }
    /**
     * Serializes a jCal or jCard object.
     *
     * @param int $options
     *
     * @return string
     */
    public static function writeJson(\Sabre\VObject\Component $component, $options = 0)
    {
    }
    /**
     * Serializes a xCal or xCard object.
     *
     * @return string
     */
    public static function writeXml(\Sabre\VObject\Component $component)
    {
    }
}
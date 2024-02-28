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
     * @param Component $component
     *
     * @return string
     */
    static function write(\Sabre\VObject\Component $component)
    {
    }
    /**
     * Serializes a jCal or jCard object.
     *
     * @param Component $component
     * @param int $options
     *
     * @return string
     */
    static function writeJson(\Sabre\VObject\Component $component, $options = 0)
    {
    }
    /**
     * Serializes a xCal or xCard object.
     *
     * @param Component $component
     *
     * @return string
     */
    static function writeXml(\Sabre\VObject\Component $component)
    {
    }
}
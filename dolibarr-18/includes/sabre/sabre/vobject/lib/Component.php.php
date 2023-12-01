<?php

namespace Sabre\VObject;

/**
 * Component.
 *
 * A component represents a group of properties, such as VCALENDAR, VEVENT, or
 * VCARD.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class Component extends \Sabre\VObject\Node
{
    /**
     * Component name.
     *
     * This will contain a string such as VEVENT, VTODO, VCALENDAR, VCARD.
     *
     * @var string
     */
    public $name;
    /**
     * A list of properties and/or sub-components.
     *
     * @var array<string, Component|Property>
     */
    protected $children = [];
    /**
     * Creates a new component.
     *
     * You can specify the children either in key=>value syntax, in which case
     * properties will automatically be created, or you can just pass a list of
     * Component and Property object.
     *
     * By default, a set of sensible values will be added to the component. For
     * an iCalendar object, this may be something like CALSCALE:GREGORIAN. To
     * ensure that this does not happen, set $defaults to false.
     *
     * @param string|null $name     such as VCALENDAR, VEVENT
     * @param bool        $defaults
     */
    public function __construct(\Sabre\VObject\Document $root, $name, array $children = [], $defaults = true)
    {
    }
    /**
     * Adds a new property or component, and returns the new item.
     *
     * This method has 3 possible signatures:
     *
     * add(Component $comp) // Adds a new component
     * add(Property $prop)  // Adds a new property
     * add($name, $value, array $parameters = []) // Adds a new property
     * add($name, array $children = []) // Adds a new component
     * by name.
     *
     * @return Node
     */
    public function add()
    {
    }
    /**
     * This method removes a component or property from this component.
     *
     * You can either specify the item by name (like DTSTART), in which case
     * all properties/components with that name will be removed, or you can
     * pass an instance of a property or component, in which case only that
     * exact item will be removed.
     *
     * @param string|Property|Component $item
     */
    public function remove($item)
    {
    }
    /**
     * Returns a flat list of all the properties and components in this
     * component.
     *
     * @return array
     */
    public function children()
    {
    }
    /**
     * This method only returns a list of sub-components. Properties are
     * ignored.
     *
     * @return array
     */
    public function getComponents()
    {
    }
    /**
     * Returns an array with elements that match the specified name.
     *
     * This function is also aware of MIME-Directory groups (as they appear in
     * vcards). This means that if a property is grouped as "HOME.EMAIL", it
     * will also be returned when searching for just "EMAIL". If you want to
     * search for a property in a specific group, you can select on the entire
     * string ("HOME.EMAIL"). If you want to search on a specific property that
     * has not been assigned a group, specify ".EMAIL".
     *
     * @param string $name
     *
     * @return array
     */
    public function select($name)
    {
    }
    /**
     * Turns the object back into a serialized blob.
     *
     * @return string
     */
    public function serialize()
    {
    }
    /**
     * This method returns an array, with the representation as it should be
     * encoded in JSON. This is used to create jCard or jCal documents.
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
    public function xmlSerialize(\Sabre\Xml\Writer $writer)
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
    /* Magic property accessors {{{ */
    /**
     * Using 'get' you will either get a property or component.
     *
     * If there were no child-elements found with the specified name,
     * null is returned.
     *
     * To use this, this may look something like this:
     *
     * $event = $calendar->VEVENT;
     *
     * @param string $name
     *
     * @return Property|null
     */
    public function __get($name)
    {
    }
    /**
     * This method checks if a sub-element with the specified name exists.
     *
     * @param string $name
     *
     * @return bool
     */
    public function __isset($name)
    {
    }
    /**
     * Using the setter method you can add properties or subcomponents.
     *
     * You can either pass a Component, Property
     * object, or a string to automatically create a Property.
     *
     * If the item already exists, it will be removed. If you want to add
     * a new item with the same name, always use the add() method.
     *
     * @param string $name
     * @param mixed  $value
     */
    public function __set($name, $value)
    {
    }
    /**
     * Removes all properties and components within this component with the
     * specified name.
     *
     * @param string $name
     */
    public function __unset($name)
    {
    }
    /* }}} */
    /**
     * This method is automatically called when the object is cloned.
     * Specifically, this will ensure all child elements are also cloned.
     */
    public function __clone()
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
     * It is also possible to specify defaults and severity levels for
     * violating the rule.
     *
     * See the VEVENT implementation for getValidationRules for a more complex
     * example.
     *
     * @var array
     */
    public function getValidationRules()
    {
    }
    /**
     * Validates the node for correctness.
     *
     * The following options are supported:
     *   Node::REPAIR - May attempt to automatically repair the problem.
     *   Node::PROFILE_CARDDAV - Validate the vCard for CardDAV purposes.
     *   Node::PROFILE_CALDAV - Validate the iCalendar for CalDAV purposes.
     *
     * This method returns an array with detected problems.
     * Every element has the following properties:
     *
     *  * level - problem level.
     *  * message - A human-readable string describing the issue.
     *  * node - A reference to the problematic node.
     *
     * The level means:
     *   1 - The issue was repaired (only happens if REPAIR was turned on).
     *   2 - A warning.
     *   3 - An error.
     *
     * @param int $options
     *
     * @return array
     */
    public function validate($options = 0)
    {
    }
    /**
     * Call this method on a document if you're done using it.
     *
     * It's intended to remove all circular references, so PHP can easily clean
     * it up.
     */
    public function destroy()
    {
    }
}
<?php

// The class name should start with a lower case mod for Dolibarr to pick it up
// so we ignore the Squiz.Classes.ValidClassName.NotCamelCaps rule.
// @codingStandardsIgnoreStart
/**
 *  Description and activation class for module datapolicy
 */
class modDataPolicy extends \DolibarrModules
{
    // @codingStandardsIgnoreEnd
    /**
     * Constructor. Define names, constants, directories, boxes, permissions
     *
     * @param DoliDB $db Database handler
     */
    public function __construct($db)
    {
    }
    /**
     * 	Function called when module is enabled.
     * 	The init function add constants, boxes, permissions and menus (defined in constructor) into Dolibarr database.
     * 	It also creates data directories
     *
     * 	@param      string	$options    Options when enabling module ('', 'noboxes')
     * 	@return     int             	1 if OK, 0 if KO
     */
    public function init($options = '')
    {
    }
    /**
     * 	Function called when module is disabled.
     * 	Remove from database constants, boxes and permissions from Dolibarr database.
     * 	Data directories are not deleted
     *
     * 	@param      string	$options    Options when enabling module ('', 'noboxes')
     * 	@return     int             	1 if OK, 0 if KO
     */
    public function remove($options = '')
    {
    }
}
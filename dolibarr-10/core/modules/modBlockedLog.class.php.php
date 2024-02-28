<?php

/**
 *	Class to describe a BlockedLog module
 */
class modBlockedLog extends \DolibarrModules
{
    /**
     *   Constructor. Define names, constants, directories, boxes, permissions
     *
     *   @param      DoliDB		$db      Database handler
     */
    public function __construct($db)
    {
    }
    /**
     * Check if module was already used before unactivation linked to warnings_unactivation property
     *
     * @return	boolean		True if already used, otherwise False
     */
    public function alreadyUsed()
    {
    }
    /**
     *      Function called when module is enabled.
     *      The init function add constants, boxes, permissions and menus (defined in constructor) into Dolibarr database.
     *      It also creates data directories.
     *
     *      @param      string	$options    Options when enabling module ('', 'noboxes')
     *      @return     int             	1 if OK, 0 if KO
     */
    public function init($options = '')
    {
    }
    /**
     * Function called when module is disabled.
     * The remove function removes tabs, constants, boxes, permissions and menus from Dolibarr database.
     * Data directories are not deleted
     *
     * @param      string	$options    Options when enabling module ('', 'noboxes')
     * @return     int             		1 if OK, 0 if KO
     */
    public function remove($options = '')
    {
    }
}
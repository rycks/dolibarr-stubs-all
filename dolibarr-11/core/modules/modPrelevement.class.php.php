<?php

/**
 *	Class to describe and enable module Prelevement
 */
class modPrelevement extends \DolibarrModules
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
     *  Function called when module is enabled.
     *  The init function add constants, boxes, permissions and menus (defined in constructor) into Dolibarr database.
     *  It also creates data directories
     *
     *  @param      string	$options    Options when enabling module ('', 'noboxes')
     *  @return     int             	1 if OK, 0 if KO
     */
    public function init($options = '')
    {
    }
}
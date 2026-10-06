<?php

/**
 *	Class to describe and enable module Categorie
 */
class modCategorie extends \DolibarrModules
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
     * Configure a tag link export
     *
     * @param int									$r				Index of import tables
     * @param string								$categcode		Categorie code
     * @param string								$elementtype	Element type of the linked object
     * @param string								$enabled		Condition to enable this export
     * @param array<int,string>						$permission		Permission to export the linked object
     * @param array<string,array<string,string>>	$fields_list	Additional fields of the linked object to export
     *
     * @return void
     */
    protected function exportTagLinks(int $r, string $categcode, string $elementtype, string $enabled, array $permission, array $fields_list)
    {
    }
    /**
     * Configure a tag link import
     *
     * @param int		$r				Index of import tables
     * @param string	$categcode		Category code
     * @param string	$class_file		Class file of the linked object
     * @param string	$elementtype	Element type of the linked object
     * @param string	$element		Name of the linked object
     *
     * @return void
     */
    protected function importTagLinks(int $r, string $categcode, string $class_file, string $elementtype, string $element)
    {
    }
    /**
     *		Function called when module is enabled.
     *		The init function add constants, boxes, permissions and menus (defined in constructor) into Dolibarr database.
     *		It also creates data directories
     *
     *      @param      string	$options    Options when enabling module ('', 'noboxes')
     *      @return     int             	1 if OK, 0 if KO
     */
    public function init($options = '')
    {
    }
}
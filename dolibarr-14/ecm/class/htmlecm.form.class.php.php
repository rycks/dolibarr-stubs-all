<?php

/**
 * Class to manage HTML component for ECM and generic filemanager
 */
class FormEcm
{
    /**
     * @var DoliDB Database handler.
     */
    public $db;
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    /**
     * 	Constructor
     *
     * 	@param	DoliDB	$db		Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *	Return list of sections
     *
     *  @param	int		$selected    		Id of preselected section
     *  @param  string	$select_name		Name of HTML select component
     *  @param	string	$module				Module ('ecm', 'medias', ...)
     *  @return	string						String with HTML select
     */
    public function selectAllSections($selected = 0, $select_name = '', $module = 'ecm')
    {
    }
}
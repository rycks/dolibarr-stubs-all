<?php

/**
 * Class to manage the box to show user birthdays
 */
class box_birthdays extends \ModeleBoxes
{
    public $boxcode = "birthdays";
    public $boximg = "object_user";
    public $boxlabel = "BoxBirthdays";
    public $depends = array("user");
    /**
     * @var DoliDB Database handler.
     */
    public $db;
    public $enabled = 1;
    public $info_box_head = array();
    public $info_box_contents = array();
    /**
     *  Constructor
     *
     *  @param  DoliDB	$db      	Database handler
     *  @param	string	$param		More parameters
     */
    public function __construct($db, $param = '')
    {
    }
    /**
     *  Load data for box to show them later
     *
     *  @param	int		$max        Maximum number of records to load
     *  @return	void
     */
    public function loadBox($max = 20)
    {
    }
    /**
     *	Method to show box
     *
     *	@param	array	$head       Array with properties of box title
     *	@param  array	$contents   Array with properties of box lines
     *  @param	int		$nooutput	No print, only return string
     *	@return	string
     */
    public function showBox($head = \null, $contents = \null, $nooutput = 0)
    {
    }
}
<?php

/**
 * Class to manage the box to show last task
 */
class box_task extends \ModeleBoxes
{
    public $boxcode = "projet";
    public $boximg = "object_projecttask";
    public $boxlabel;
    //public $depends = array("projet");
    /**
     * @var DoliDB Database handler.
     */
    public $db;
    public $param;
    public $enabled = 0;
    // Disabled because bugged.
    public $info_box_head = array();
    public $info_box_contents = array();
    /**
     *  Constructor
     *
     *  @param  DoliDB  $db         Database handler
     *  @param  string  $param      More parameters
     */
    public function __construct($db, $param = '')
    {
    }
    /**
     *  Load data for box to show them later
     *
     *  @param  int     $max        Maximum number of records to load
     *  @return void
     */
    public function loadBox($max = 5)
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
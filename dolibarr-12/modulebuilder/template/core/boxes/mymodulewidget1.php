<?php

/**
 * Class to manage the box
 *
 * Warning: for the box to be detected correctly by dolibarr,
 * the filename should be the lowercase classname
 */
class mymodulewidget1 extends \ModeleBoxes
{
    /**
     * @var string Alphanumeric ID. Populated by the constructor.
     */
    public $boxcode = "mymodulebox";
    /**
     * @var string Box icon (in configuration page)
     * Automatically calls the icon named with the corresponding "object_" prefix
     */
    public $boximg = "mymodule@mymodule";
    /**
     * @var string Box label (in configuration page)
     */
    public $boxlabel;
    /**
     * @var string[] Module dependencies
     */
    public $depends = array('mymodule');
    /**
     * @var DoliDb Database handler
     */
    public $db;
    /**
     * @var mixed More parameters
     */
    public $param;
    /**
     * @var array Header informations. Usually created at runtime by loadBox().
     */
    public $info_box_head = array();
    /**
     * @var array Contents informations. Usually created at runtime by loadBox().
     */
    public $info_box_contents = array();
    /**
     * Constructor
     *
     * @param DoliDB $db Database handler
     * @param string $param More parameters
     */
    public function __construct(\DoliDB $db, $param = '')
    {
    }
    /**
     * Load data into info_box_contents array to show array later. Called by Dolibarr before displaying the box.
     *
     * @param int $max Maximum number of records to load
     * @return void
     */
    public function loadBox($max = 5)
    {
    }
    /**
     * Method to show box. Called by Dolibarr eatch time it wants to display the box.
     *
     * @param array $head       Array with properties of box title
     * @param array $contents   Array with properties of box lines
     * @param int   $nooutput   No print, only return string
     * @return void
     */
    public function showBox($head = \null, $contents = \null, $nooutput = 0)
    {
    }
}
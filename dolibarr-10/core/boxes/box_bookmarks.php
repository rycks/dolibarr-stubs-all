<?php

/**
 * Class to manage the box to show bookmarks
 */
class box_bookmarks extends \ModeleBoxes
{
    public $boxcode = "bookmarks";
    public $boximg = "object_bookmark";
    public $boxlabel = "BoxMyLastBookmarks";
    public $depends = array("bookmark");
    /**
     * @var DoliDB Database handler.
     */
    public $db;
    public $param;
    public $info_box_head = array();
    public $info_box_contents = array();
    /**
     *  Constructor
     *
     *  @param  DoliDB  $db         Database handler
     *  @param  string  $param      More parameters
     */
    public function __construct($db, $param)
    {
    }
    /**
     *  Load data for box to show them later
     *
     *  @param	int		$max        Maximum number of records to load
     *  @return	void
     */
    public function loadBox($max = 5)
    {
    }
    /**
     *  Method to show box
     *
     *  @param	array	$head       Array with properties of box title
     *  @param  array	$contents   Array with properties of box lines
     *  @param	int		$nooutput	No print, only return string
     *  @return	string
     */
    public function showBox($head = \null, $contents = \null, $nooutput = 0)
    {
    }
}
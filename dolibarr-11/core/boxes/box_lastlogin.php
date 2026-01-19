<?php

/**
 * Class to manage the box of last login
 */
class box_lastlogin extends \ModeleBoxes
{
    public $boxcode = "lastlogin";
    public $boximg = "object_user";
    public $boxlabel = 'BoxLoginInformation';
    public $depends = array("user");
    /**
     * @var DoliDB Database handler.
     */
    public $db;
    public $param;
    public $enabled = 1;
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
     *  Charge les donnees en memoire pour affichage ulterieur
     *
     *  @param  int     $max        Maximum number of records to load
     *  @return void
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
     *  @return	void
     */
    public function showBox($head = \null, $contents = \null, $nooutput = 0)
    {
    }
}
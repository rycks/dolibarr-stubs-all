<?php

/**
 * Class to manage the box
 */
class box_last_ticket extends \ModeleBoxes
{
    public $boxcode = "box_last_ticket";
    public $boximg = "ticket";
    public $boxlabel;
    public $depends = array("ticket");
    /**
     * @var DoliDB Database handler.
     */
    public $db;
    public $param;
    public $info_box_head = array();
    public $info_box_contents = array();
    /**
     * Constructor
     */
    public function __construct()
    {
    }
    /**
     * Load data into info_box_contents array to show array later.
     *
     *     @param  int $max Maximum number of records to load
     *     @return void
     */
    public function loadBox($max = 5)
    {
    }
    /**
     *     Method to show box
     *
     *     @param  array $head     Array with properties of box title
     *     @param  array $contents Array with properties of box lines
     *     @param  int   $nooutput No print, only return string
     *     @return string
     */
    public function showBox($head = \null, $contents = \null, $nooutput = 0)
    {
    }
}
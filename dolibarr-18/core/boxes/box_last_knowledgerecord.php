<?php

/**
 * Class to manage the box
 */
class box_last_knowledgerecord extends \ModeleBoxes
{
    /**
     * @var string boxcode
     */
    public $boxcode = "box_last_knowledgerecord";
    /**
     * @var string box img
     */
    public $boximg = "knowledgemanagement";
    /**
     * @var string boc label
     */
    public $boxlabel;
    /**
     * @var array box dependancies
     */
    public $depends = array("knowledgemanagement");
    /**
     * @var DoliDB Database handler.
     */
    public $db;
    /**
     * @var string param
     */
    public $param;
    /**
     * @var array box info heads
     */
    public $info_box_head = array();
    /**
     * @var array box info content
     */
    public $info_box_contents = array();
    /**
     * Constructor
     *  @param  DoliDB  $db         Database handler
     *  @param  string  $param      More parameters
     */
    public function __construct($db, $param = '')
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
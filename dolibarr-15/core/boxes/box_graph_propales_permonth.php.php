<?php

/**
 * Class to manage the box to show last propals
 */
class box_graph_propales_permonth extends \ModeleBoxes
{
    public $boxcode = "propalpermonth";
    public $boximg = "object_propal";
    public $boxlabel = "BoxProposalsPerMonth";
    public $depends = array("propal");
    /**
     * @var DoliDB Database handler.
     */
    public $db;
    public $info_box_head = array();
    public $info_box_contents = array();
    public $widgettype = 'graph';
    /**
     *  Constructor
     *
     * 	@param	DoliDB	$db			Database handler
     *  @param	string	$param		More parameters
     */
    public function __construct($db, $param)
    {
    }
    /**
     *  Load data into info_box_contents array to show array later.
     *
     *  @param	int		$max        Maximum number of records to load
     *  @return	void
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
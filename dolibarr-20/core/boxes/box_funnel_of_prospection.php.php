<?php

/**
 * Class to manage the box to show funnel of prospections
 */
class box_funnel_of_prospection extends \ModeleBoxes
{
    public $boxcode = "FunnelOfProspection";
    public $boximg = "object_projectpub";
    public $boxlabel = "BoxTitleFunnelOfProspection";
    public $depends = array("projet");
    public $version = 'development';
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
     *  @param   int		$max        Maximum number of records to load
     *  @return  void
     */
    public function loadBox($max = 5)
    {
    }
    /**
     *	Method to show box
     *
     *	@param	array	$head       Array with properties of box title
     *	@param  array	$contents   Array with properties of box lines
     *  @param	int		$nooutput	No $stringtoprint .=, only return string
     *	@return	string
     */
    public function showBox($head = \null, $contents = \null, $nooutput = 0)
    {
    }
}
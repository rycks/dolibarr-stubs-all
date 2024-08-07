<?php

/**
 * Class to manage the box to show RSS feeds
 */
class box_external_rss extends \ModeleBoxes
{
    public $boxcode = "lastrssinfos";
    public $boximg = "object_rss";
    public $boxlabel = "BoxLastRssInfos";
    public $depends = array("externalrss");
    public $paramdef;
    // Params of box definition (not user params)
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
     *  @param	int		$max        	Maximum number of records to load
     *  @param	int		$cachedelay		Delay we accept for cache file
     *  @return	void
     */
    public function loadBox($max = 5, $cachedelay = 3600)
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
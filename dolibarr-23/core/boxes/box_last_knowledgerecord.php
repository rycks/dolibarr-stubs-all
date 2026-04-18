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
     * @var string box label
     */
    public $boxlabel;
    /**
     * @var string[] box dependencies
     */
    public $depends = array("knowledgemanagement");
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
     *	Method to show box.  Called when the box needs to be displayed.
     *
     *	@param	?array<array{text?:string,sublink?:string,subtext?:string,subpicto?:?string,picto?:string,nbcol?:int,limit?:int,subclass?:string,graph?:int<0,1>,target?:string}>   $head       Array with properties of box title
     *	@param	?array<array{tr?:string,td?:string,target?:string,text?:string,text2?:string,textnoformat?:string,tooltip?:string,logo?:string,url?:string,maxlength?:int,asis?:int<0,1>}>   $contents   Array with properties of box lines
     *	@param	int<0,1>	$nooutput	No print, only return string
     *	@return	string
     */
    public function showBox($head = \null, $contents = \null, $nooutput = 0)
    {
    }
}
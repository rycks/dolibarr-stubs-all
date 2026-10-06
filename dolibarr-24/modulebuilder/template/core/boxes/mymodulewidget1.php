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
    public $boxlabel = 'MyWidget';
    /**
     * @var string Box language file if it needs a specific language file.
     */
    public $lang = 'mymodule@mymodule';
    /**
     * @var string[] Module dependencies
     */
    public $depends = array('mymodule');
    /**
     * @var string 	Widget type ('graph' means the widget is a graph widget)
     */
    public $widgettype = 'graph';
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
     * @param	int<0,max>	$max	Maximum number of records to load
     * @return	void
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
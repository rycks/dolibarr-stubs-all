<?php

/**
 * Class to manage the box to show suspense account
 */
class box_accountancy_suspense_account extends \ModeleBoxes
{
    public $boxcode = "accountancy_suspense_account";
    public $boximg = "accountancy";
    public $boxlabel = "BoxSuspenseAccount";
    public $depends = array("accounting");
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
     *  @return	void
     */
    public function loadBox()
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
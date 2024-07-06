<?php

/**
 * Class to manage the box to show bank accounts
 */
class box_comptes extends \ModeleBoxes
{
    public $boxcode = "currentaccounts";
    public $boximg = "bank_account";
    public $boxlabel = "BoxCurrentAccounts";
    public $depends = array("banque");
    // Box active if module banque active
    public $enabled = 1;
    /**
     *  Constructor
     *
     *  @param  DoliDB	$db      	Database handler
     *  @param	string	$param		More parameters
     */
    public function __construct($db, $param = '')
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
     *  Method to show box
     *
     *  @param  array   $head       Array with properties of box title
     *  @param  array   $contents   Array with properties of box lines
     *  @param  int     $nooutput   No print, only return string
     *  @return string
     */
    public function showBox($head = \null, $contents = \null, $nooutput = 0)
    {
    }
}
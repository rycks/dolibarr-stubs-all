<?php

/**
 * Class to manage the box to show last invoices
 */
class box_graph_invoices_peryear extends \ModeleBoxes
{
    public $boxcode = "invoicesperyear";
    public $boximg = "object_bill";
    public $boxlabel = "BoxCustomersInvoicesPerYear";
    public $depends = array("facture");
    /**
     * @var DoliDB Database handler.
     */
    public $db;
    public $info_box_head = array();
    public $info_box_contents = array();
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
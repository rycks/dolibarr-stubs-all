<?php

/**
 *  Parent Class of the models to number the cash register receipts
 */
abstract class ModeleNumRefTakepos extends \CommonNumRefGenerator
{
    /**
     * Return next free value
     *
     * @param	?Societe	$objsoc		Object third party
     * @param	?Facture	$invoice	Object invoice
     * @param	string		$mode		'next' for next value or 'last' for last value
     * @return	string|int<-1,0>		Next ref value or last ref if $mode is 'last'
     */
    public abstract function getNextValue($objsoc = \null, $invoice = \null, $mode = 'next');
    /**
     *  Return an example of numbering
     *
     *  @return     string      Example
     */
    public abstract function getExample();
}
<?php

/**
 * Payment numbering references mother class
 */
abstract class ModeleNumRefPayments extends \CommonNumRefGenerator
{
    /**
     * 	Return next free value
     *
     *  @param	Societe			$objsoc     Object thirdparty
     *  @param  ?Paiement		$object		Object we need next value for
     *  @return string|int<-1,0>			Value if OK, <=0 if KO
     */
    public abstract function getNextValue($objsoc, $object);
    /**
     *  Return an example of numbering
     *
     *  @return     string      Example
     */
    public abstract function getExample();
}
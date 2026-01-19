<?php

/**
 *	Parent class of subscription templates
 */
abstract class ModeleDon extends \CommonDocGenerator
{
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return list of active generation modules
     *
     *  @param  DoliDB  	$db                 Database handler
     *  @param  int<0,max>	$maxfilenamelength  Max length of value to show
     *  @return string[]|int<-1,0>				List of templates
     */
    public static function liste_modeles($db, $maxfilenamelength = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Write the object to document file to disk
     *
     *  @param	Don			$don			Donation object
     *  @param	Translate	$outputlangs	Lang object for output language
     *  @param	string		$currency		Currency code
     *  @return	int<-1,1>					>0 if OK, <0 if KO
     */
    public abstract function write_file($don, $outputlangs, $currency = '');
}
/**
 *	Parent class of donation numbering templates
 */
abstract class ModeleNumRefDons extends \CommonNumRefGenerator
{
    // No overload code
}
<?php

/**
 *	\class      ModeleAction
 *	\brief      Parent class for product models of doc generators
 */
abstract class ModeleAction extends \CommonDocGenerator
{
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return list of active generation modules
     *
     * 	@param	DoliDB		$db					Database handler
     *  @param	integer		$maxfilenamelength  Max length of value to show
     * 	@return	array							List of templates
     */
    public static function liste_modeles($db, $maxfilenamelength = 0)
    {
    }
}
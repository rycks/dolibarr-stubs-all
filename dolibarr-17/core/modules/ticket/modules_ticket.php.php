<?php

/**
 *	Parent class for documents models
 */
abstract class ModelePDFTicket extends \CommonDocGenerator
{
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return list of active generation modules
     *
     *  @param	DoliDB	$db     			Database handler
     *  @param  integer	$maxfilenamelength  Max length of value to show
     *  @return	array						List of templates
     */
    public static function liste_modeles($db, $maxfilenamelength = 0)
    {
    }
}
/**
 *  Classe mere des modeles de numerotation des references de projets
 */
abstract class ModeleNumRefTicket
{
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    /**
     *  Return if a module can be used or not
     *
     *  @return boolean     true if module can be used
     */
    public function isEnabled()
    {
    }
    /**
     *  Renvoi la description par defaut du modele de numerotation
     *
     *  @return string      Texte descripif
     */
    public function info()
    {
    }
    /**
     *  Return an example of numbering
     *
     *  @return string      Example
     */
    public function getExample()
    {
    }
    /**
     *  Checks if the numbers already in the database do not
     *  cause conflicts that would prevent this numbering working.
     *
     *  @return boolean     false if conflict, true if ok
     */
    public function canBeActivated()
    {
    }
    /**
     *  Renvoi prochaine valeur attribuee
     *
     *    @param  Societe 	$objsoc  	Object third party
     *    @param  Ticket 	$ticket		Object ticket
     *    @return string                Valeur
     */
    public function getNextValue($objsoc, $ticket)
    {
    }
    /**
     *  Renvoi version du module numerotation
     *
     *  @return string      Valeur
     */
    public function getVersion()
    {
    }
}
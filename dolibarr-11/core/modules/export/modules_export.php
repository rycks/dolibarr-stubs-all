<?php

/**
 *	Parent class for export modules
 */
class ModeleExports extends \CommonDocGenerator
{
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    public $driverlabel = array();
    public $driverversion = array();
    public $liblabel = array();
    public $libversion = array();
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Load into memory list of available export format
     *
     *  @param	DoliDB	$db     			Database handler
     *  @param  integer	$maxfilenamelength  Max length of value to show
     *  @return	array						List of templates (same content than array this->driverlabel)
     */
    public function liste_modeles($db, $maxfilenamelength = 0)
    {
    }
    /**
     *  Return picto of export driver
     *
     *  @param	string	$key	Key of driver
     *  @return	string			Picto string
     */
    public function getPictoForKey($key)
    {
    }
    /**
     *  Renvoi libelle d'un driver export
     *
     *  @param	string	$key	Key of driver
     *  @return	string			Label
     */
    public function getDriverLabelForKey($key)
    {
    }
    /**
     *  Renvoi le descriptif d'un driver export
     *
     *  @param	string	$key	Key of driver
     *  @return	string			Description
     */
    public function getDriverDescForKey($key)
    {
    }
    /**
     *  Renvoi version d'un driver export
     *
     *  @param	string	$key	Key of driver
     *  @return	string			Driver version
     */
    public function getDriverVersionForKey($key)
    {
    }
    /**
     *  Renvoi libelle de librairie externe du driver
     *
     *  @param	string	$key	Key of driver
     *  @return	string			Label of library
     */
    public function getLibLabelForKey($key)
    {
    }
    /**
     *  Renvoi version de librairie externe du driver
     *
     *  @param	string	$key	Key of driver
     *  @return	string			Version of library
     */
    public function getLibVersionForKey($key)
    {
    }
}
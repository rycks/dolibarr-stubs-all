<?php

/**
 *	Parent class for import file readers
 */
class ModeleImports
{
    /**
     * @var DoliDB Database handler.
     */
    public $db;
    public $datatoimport;
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    /**
     * @var int id of driver
     */
    public $id;
    /**
     * @var string label
     */
    public $label;
    public $extension;
    // Extension of files imported by driver
    /**
     * Dolibarr version of driver
     * @var string
     */
    public $version = 'dolibarr';
    public $label_lib;
    // Label of external lib used by driver
    public $version_lib;
    // Version of external lib used by driver
    // Array of all drivers
    public $driverlabel = array();
    public $driverdesc = array();
    public $driverversion = array();
    public $liblabel = array();
    public $libversion = array();
    /**
     *  Constructor
     */
    public function __construct()
    {
    }
    /**
     * getDriverId
     *
     * @return string		Id
     */
    public function getDriverId()
    {
    }
    /**
     *	getDriverLabel
     *
     *	@return string	Label
     */
    public function getDriverLabel()
    {
    }
    /**
     *	getDriverDesc
     *
     *	@return string	Description
     */
    public function getDriverDesc()
    {
    }
    /**
     * getDriverExtension
     *
     * @return string	Driver suffix
     */
    public function getDriverExtension()
    {
    }
    /**
     *	getDriverVersion
     *
     *	@return string	Driver version
     */
    public function getDriverVersion()
    {
    }
    /**
     *	getDriverLabel
     *
     *	@return string	Label of external lib
     */
    public function getLibLabel()
    {
    }
    /**
     * getLibVersion
     *
     *	@return string	Version of external lib
     */
    public function getLibVersion()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Charge en memoire et renvoie la liste des modeles actifs
     *
     *  @param	DoliDB	$db     			Database handler
     *  @param  integer	$maxfilenamelength  Max length of value to show
     *  @return	array						List of templates
     */
    public function liste_modeles($db, $maxfilenamelength = 0)
    {
    }
    /**
     *  Return picto of import driver
     *
     *	@param	string	$key	Key
     *	@return	string
     */
    public function getPictoForKey($key)
    {
    }
    /**
     *  Renvoi libelle d'un driver import
     *
     *	@param	string	$key	Key
     *	@return	string
     */
    public function getDriverLabelForKey($key)
    {
    }
    /**
     *  Renvoi la description d'un driver import
     *
     *	@param	string	$key	Key
     *	@return	string
     */
    public function getDriverDescForKey($key)
    {
    }
    /**
     *  Renvoi version d'un driver import
     *
     *	@param	string	$key	Key
     *	@return	string
     */
    public function getDriverVersionForKey($key)
    {
    }
    /**
     *  Renvoi libelle de librairie externe du driver
     *
     *	@param	string	$key	Key
     *	@return	string
     */
    public function getLibLabelForKey($key)
    {
    }
    /**
     *  Renvoi version de librairie externe du driver
     *
     *	@param	string	$key	Key
     *	@return	string
     */
    public function getLibVersionForKey($key)
    {
    }
}
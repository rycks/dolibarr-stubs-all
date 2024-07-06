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
    public $driverdesc = array();
    public $driverversion = array();
    public $liblabel = array();
    public $libversion = array();
    /**
     * @var string picto
     */
    public $picto;
    /**
     * @var string description
     */
    public $desc;
    /**
     * @var string escape
     */
    public $escape;
    /**
     * @var string enclosure
     */
    public $enclosure;
    /**
     * @var int col
     */
    public $col;
    /**
     * @var int disabled
     */
    public $disabled;
    /**
     *  Load into memory list of available export format
     *
     *  @param	DoliDB	$db     			Database handler
     *  @param  integer	$maxfilenamelength  Max length of value to show
     *  @return	array						List of templates (same content than array this->driverlabel)
     */
    public function listOfAvailableExportFormat($db, $maxfilenamelength = 0)
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
     *  Return label of driver export
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
     *  Renvoi label of driver lib
     *
     *  @param	string	$key	Key of driver
     *  @return	string			Label of library
     */
    public function getLibLabelForKey($key)
    {
    }
    /**
     *  Return version of driver lib
     *
     *  @param	string	$key	Key of driver
     *  @return	string			Version of library
     */
    public function getLibVersionForKey($key)
    {
    }
}
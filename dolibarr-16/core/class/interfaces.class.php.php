<?php

/**
 *   Class to manage triggers
 */
class Interfaces
{
    /**
     * @var DoliDB Database handler.
     */
    public $db;
    public $dir;
    // Directory with all core and external triggers files
    /**
     * @var string[] Error codes (or messages)
     */
    public $errors = array();
    /**
     *	Constructor
     *
     *  @param		DoliDB		$db      Database handler
     */
    public function __construct($db)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *   Function called when a Dolibarr business event occurs
     *   This function call all qualified triggers.
     *
     *   @param		string		$action     Trigger event code
     *   @param     object		$object     Objet concerned. Some context information may also be provided into array property object->context.
     *   @param     User		$user       Objet user
     *   @param     Translate	$langs      Objet lang
     *   @param     Conf		$conf       Objet conf
     *   @return    int         			Nb of triggers ran if no error, -Nb of triggers with errors otherwise.
     */
    public function run_triggers($action, $object, $user, $langs, $conf)
    {
    }
    /**
     *  Return list of triggers. Function used by admin page htdoc/admin/triggers.
     *  List is sorted by trigger filename so by priority to run.
     *
     *  @param	array		$forcedirtriggers		null=All default directories. This parameter is used by modulebuilder module only.
     * 	@return	array								Array list of triggers
     */
    public function getTriggersList($forcedirtriggers = \null)
    {
    }
}
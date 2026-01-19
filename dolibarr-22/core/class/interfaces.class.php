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
    /**
     * @var string
     */
    public $dir;
    // Directory with all core and external triggers files
    /**
     * @var string		Last module name in error
     */
    public $lastmoduleerror;
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
     *   @param     Object		$object     Object concerned. Some context information may also be provided into array property object->context.
     *   @param     User		$user       Object user
     *   @param     Translate	$langs      Object lang
     *   @param     Conf		$conf       Object conf
     *   @return    int         			Nb of triggers ran if no error, -Nb of triggers with errors otherwise.
     */
    public function run_triggers($action, $object, $user, $langs, $conf)
    {
    }
    /**
     *  Return list of triggers. Function used by admin page htdoc/admin/triggers.
     *  List is sorted by trigger filename so by priority to run.
     *
     *  @param	?array<int,string>	$forcedirtriggers	null=All default directories. This parameter is used by modulebuilder module only.
     *	@return array<array{picto:string,file:string,fullpath:string,relpath:string,iscoreorexternal?:'internal'|'external',version?:string,status?:string,module?:string,info:string}>		Array list of triggers
     */
    public function getTriggersList($forcedirtriggers = \null)
    {
    }
}
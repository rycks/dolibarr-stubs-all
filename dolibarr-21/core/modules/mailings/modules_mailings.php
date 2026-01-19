<?php

/**
 *		Parent class of emailing target selectors modules
 */
class MailingTargets
{
    /**
     * @var DoliDB		Database handler (result of a new DoliDB)
     */
    public $db;
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    /**
     * @var string[] of errors
     */
    public $errors;
    /**
     * @var string	Condition to be enabled
     */
    public $enabled;
    /**
     * @var string Name of the module
     */
    public $name;
    /**
     * @var string Description of the module
     */
    public $desc;
    /**
     * @var string Tooltip to show after description of the module
     */
    public $tooltip = '';
    /**
     * @var string To store the SQL string used to find the recipients
     */
    public $sql;
    /**
     * @var int<0,1>	Set this to 1 if you want to flag you also want to include email in target that has opt-out.
     */
    public $evenunsubscribe = 0;
    /**
     *	Constructor
     *
     *  @param		DoliDB		$db      Database handler
     */
    public function __construct($db)
    {
    }
    /**
     * Return description of email selector
     *
     * @return     string      Return translation of module label. Try translation of $this->name then translation of 'MailingModuleDesc'.$this->name, or $this->desc if not found
     */
    public function getDesc()
    {
    }
    /**
     *	Return number of records for email selector
     *
     *  @return     integer      Example
     */
    public function getNbOfRecords()
    {
    }
    /**
     * Retourne nombre de destinataires
     *
     * @param      string		$sql        Sql request to count
     * @return     int|string      			Nb of recipient, or <0 if error, or '' if NA
     */
    public function getNbOfRecipients($sql)
    {
    }
    /**
     * Affiche formulaire de filtre qui apparait dans page de selection
     * des destinataires de mailings
     *
     * @return     string      Retourne zone select
     */
    public function formFilter()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Met a jour nombre de destinataires
     *
     * @param	int		$mailing_id          Id of emailing
     * @return  int			                 Return integer < 0 si erreur, nb destinataires si ok
     */
    public function update_nb($mailing_id)
    {
    }
    /**
     * Add a list of targets into the database
     *
     * @param	int		$mailing_id    Id of emailing
     * @param	array<array{fk_contact?:int,lastname:string,firstname:string,email:string,other:string,source_url:string,source_id?:int,source_type:string,id?:int}>		$cibles		Array with targets
     * @return  int      			   Return integer < 0 if error, nb added if OK
     */
    public function addTargetsToDatabase($mailing_id, $cibles)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Supprime tous les destinataires de la table des cibles
     *
     *  @param  int		$mailing_id        Id of emailing
     *  @return	void
     */
    public function clear_target($mailing_id)
    {
    }
    /**
     *  Return list of widget. Function used by admin page htdoc/admin/widget.
     *  List is sorted by widget filename so by priority to run.
     *
     *  @param	?array<string>	$forcedir	null=All default directories. This parameter is used by modulebuilder module only.
     *  @return array<array{picto:string,file:string,fullpath:string,relpath:string,iscoreorexternal:'external'|'internal',version:string,status:string,info:string}>	Array list of widgets
     */
    public static function getEmailingSelectorsList($forcedir = \null)
    {
    }
    /**
     *  On the main mailing area, there is a box with statistics.
     *  If you want to add a line in this report you must provide an
     *  array of SQL request that returns two field:
     *  One called "label", One called "nb".
     *
     *	@return		string[]		Array with SQL requests
     */
    public function getSqlArrayForStats()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Add destinations in the targets table
     *
     *  @param  int     $mailing_id     Id of emailing
     *  @return int                     Return integer < 0 on error, count of added when ok
     */
    public function add_to_target($mailing_id)
    {
    }
}
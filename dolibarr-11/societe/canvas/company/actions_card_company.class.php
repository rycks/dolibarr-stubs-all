<?php

/**
 *	ActionsCardCompany
 *
 *	Class with controller methods for thirdparty canvas
 */
class ActionsCardCompany extends \ActionsCardCommon
{
    /**
     *    Constructor
     *
     *    @param	DoliDB	$db				Handler acces base de donnees
     *    @param	string	$dirmodule		Name of directory of module
     *    @param	string	$targetmodule	Name of directory of module where canvas is stored
     *    @param	string	$canvas			Name of canvas
     *    @param	string	$card			Name of tab (sub-canvas)
     */
    public function __construct($db, $dirmodule, $targetmodule, $canvas, $card)
    {
    }
    /**
     *  Return the title of card
     *
     *  @param	string	$action		Action code
     *  @return	string				Title
     */
    private function getTitle($action)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Assign custom values for canvas (for example into this->tpl to be used by templates)
     *
     *    @param	string	$action    Type of action
     *    @param	integer	$id			Id of object
     *    @param	string	$ref		Ref of object
     *    @return	void
     */
    public function assign_values(&$action, $id = 0, $ref = '')
    {
    }
    /**
     * 	Check permissions of a user to show a page and an object. Check read permission
     * 	If $_REQUEST['action'] defined, we also check write permission.
     *
     * 	@param      User	$user      	  	User to check
     * 	@param      string	$features	    Features to check (in most cases, it's module name)
     * 	@param      int		$objectid      	Object ID if we want to check permission on a particular record (optional)
     *  @param      string	$dbtablename    Table name where object is stored. Not used if objectid is null (optional)
     *  @param      string	$feature2		Feature to check (second level of permission)
     *  @param      string	$dbt_keyfield   Field name for socid foreign key if not fk_soc. (optional)
     *  @param      string	$dbt_select		Field name for select if not rowid. (optional)
     *  @return		int						1
     */
    public function restrictedArea($user, $features = 'societe', $objectid = 0, $dbtablename = '', $feature2 = '', $dbt_keyfield = 'fk_soc', $dbt_select = 'rowid')
    {
    }
}
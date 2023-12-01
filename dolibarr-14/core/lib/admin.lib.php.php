<?php

/**
 *  Renvoi une version en chaine depuis une version en tableau
 *
 *  @param		array		$versionarray		Tableau de version (vermajeur,vermineur,autre)
 *  @return     string        			      	Chaine version
 *  @see versioncompare()
 */
function versiontostring($versionarray)
{
}
/**
 *	Compare 2 versions (stored into 2 arrays).
 *  To check if Dolibarr version is lower than (x,y,z), do "if versioncompare(versiondolibarrarray(), array(x.y.z)) <= 0"
 *  For example: if (versioncompare(versiondolibarrarray(),array(4,0,-5)) >= 0) is true if version is 4.0 alpha or higher.
 *  For example: if (versioncompare(versiondolibarrarray(),array(4,0,0)) >= 0) is true if version is 4.0 final or higher.
 *  For example: if (versioncompare(versiondolibarrarray(),array(4,0,1)) >= 0) is true if version is 4.0.1 or higher.
 *  Alternative way to compare: if ((float) DOL_VERSION >= 4.0) is true if version is 4.0 alpha or higher (works only to compare first and second level)
 *
 *	@param      array		$versionarray1      Array of version (vermajor,verminor,patch)
 *	@param      array		$versionarray2		Array of version (vermajor,verminor,patch)
 *	@return     int          			       	-4,-3,-2,-1 if versionarray1<versionarray2 (value depends on level of difference)
 * 												0 if same
 * 												1,2,3,4 if versionarray1>versionarray2 (value depends on level of difference)
 *  @see versiontostring()
 */
function versioncompare($versionarray1, $versionarray2)
{
}
/**
 *	Return version PHP
 *
 *	@return     array               Tableau de version (vermajeur,vermineur,autre)
 */
function versionphparray()
{
}
/**
 *	Return version Dolibarr
 *
 *	@return     array               Tableau de version (vermajeur,vermineur,autre)
 */
function versiondolibarrarray()
{
}
/**
 *	Launch a sql file. Function is used by:
 *  - Migrate process (dolibarr-xyz-abc.sql)
 *  - Loading sql menus (auguria)
 *  - Running specific Sql by a module init
 *  - Loading sql file of website import package
 *  Install process however does not use it.
 *  Note that Sql files must have all comments at start of line. Also this function take ';' as the char to detect end of sql request
 *
 *	@param		string	$sqlfile			Full path to sql file
 * 	@param		int		$silent				1=Do not output anything, 0=Output line for update page
 * 	@param		int		$entity				Entity targeted for multicompany module
 *	@param		int		$usesavepoint		1=Run a savepoint before each request and a rollback to savepoint if error (this allow to have some request with errors inside global transactions).
 *	@param		string	$handler			Handler targeted for menu (replace __HANDLER__ with this value)
 *	@param 		string	$okerror			Family of errors we accept ('default', 'none')
 *  @param		int		$linelengthlimit	Limit for length of each line (Use 0 if unknown, may be faster if defined)
 *  @param		int		$nocommentremoval	Do no try to remove comments (in such a case, we consider that each line is a request, so use also $linelengthlimit=0)
 *  @param		int		$offsetforchartofaccount	Offset to use to load chart of account table to update sql on the fly to add offset to rowid and account_parent value
 * 	@return		int							<=0 if KO, >0 if OK
 */
function run_sql($sqlfile, $silent = 1, $entity = '', $usesavepoint = 1, $handler = '', $okerror = 'default', $linelengthlimit = 32768, $nocommentremoval = 0, $offsetforchartofaccount = 0)
{
}
/**
 *	Effacement d'une constante dans la base de donnees
 *
 *	@param	    DoliDB		$db         Database handler
 *	@param	    string		$name		Name of constant or rowid of line
 *	@param	    int			$entity		Multi company id, -1 for all entities
 *	@return     int         			<0 if KO, >0 if OK
 *
 *	@see		dolibarr_get_const(), dolibarr_set_const(), dol_set_user_param()
 */
function dolibarr_del_const($db, $name, $entity = 1)
{
}
/**
 *	Get the value of a setup constant from database
 *
 *	@param	    DoliDB		$db         Database handler
 *	@param	    string		$name		Name of constant
 *	@param	    int			$entity		Multi company id
 *	@return     string      			Value of constant
 *
 *	@see		dolibarr_del_const(), dolibarr_set_const(), dol_set_user_param()
 */
function dolibarr_get_const($db, $name, $entity = 1)
{
}
/**
 *	Insert a parameter (key,value) into database (delete old key then insert it again).
 *
 *	@param	    DoliDB		$db         Database handler
 *	@param	    string		$name		Name of constant
 *	@param	    string		$value		Value of constant
 *	@param	    string		$type		Type of constant. Deprecated, only strings are allowed for $value. Caller must json encode/decode to store other type of data.
 *	@param	    int			$visible	Is constant visible in Setup->Other page (0 by default)
 *	@param	    string		$note		Note on parameter
 *	@param	    int			$entity		Multi company id (0 means all entities)
 *	@return     int         			-1 if KO, 1 if OK
 *
 *	@see		dolibarr_del_const(), dolibarr_get_const(), dol_set_user_param()
 */
function dolibarr_set_const($db, $name, $value, $type = 'chaine', $visible = 0, $note = '', $entity = 1)
{
}
/**
 * Prepare array with list of tabs
 *
 * @param	int		$nbofactivatedmodules	Number f oactivated modules
 * @param	int		$nboftotalmodules		Nb of total modules
 * @return  array							Array of tabs to show
 */
function modules_prepare_head($nbofactivatedmodules, $nboftotalmodules)
{
}
/**
 * Prepare array with list of tabs
 *
 * @return  array				Array of tabs to show
 */
function security_prepare_head()
{
}
/**
 * Prepare array with list of tabs
 * @param object $object descriptor class
 * @return  array				Array of tabs to show
 */
function modulehelp_prepare_head($object)
{
}
/**
 * Prepare array with list of tabs
 *
 * @return  array				Array of tabs to show
 */
function translation_prepare_head()
{
}
/**
 * Prepare array with list of tabs
 *
 * @return  array				Array of tabs to show
 */
function defaultvalues_prepare_head()
{
}
/**
 * 	Return list of session
 *
 *	@return		array			Array list of sessions
 */
function listOfSessions()
{
}
/**
 * 	Purge existing sessions
 *
 * 	@param		int		$mysessionid		To avoid to try to delete my own session
 * 	@return		int							>0 if OK, <0 if KO
 */
function purgeSessions($mysessionid)
{
}
/**
 *  Enable a module
 *
 *  @param      string		$value      Name of module to activate
 *  @param      int			$withdeps   Activate/Disable also all dependencies
 *  @return     array      			    array('nbmodules'=>nb modules activated with success, 'errors=>array of error messages, 'nbperms'=>Nb permission added);
 */
function activateModule($value, $withdeps = 1)
{
}
/**
 *  Disable a module
 *
 *  @param      string		$value               Nom du module a desactiver
 *  @param      int			$requiredby          1=Desactive aussi modules dependants
 *  @return     string     				         Error message or '';
 */
function unActivateModule($value, $requiredby = 1)
{
}
/**
 *  Add external modules to list of dictionaries.
 *  Addition is done into var $taborder, $tabname, etc... that are passed with pointers.
 *
 * 	@param		array		$taborder			Taborder
 * 	@param		array		$tabname			Tabname
 * 	@param		array		$tablib				Tablib
 * 	@param		array		$tabsql				Tabsql
 * 	@param		array		$tabsqlsort			Tabsqlsort
 * 	@param		array		$tabfield			Tabfield
 * 	@param		array		$tabfieldvalue		Tabfieldvalue
 * 	@param		array		$tabfieldinsert		Tabfieldinsert
 * 	@param		array		$tabrowid			Tabrowid
 * 	@param		array		$tabcond			Tabcond
 * 	@param		array		$tabhelp			Tabhelp
 *  @param		array		$tabcomplete   		Tab complete (will replace all other in future). Key is table name.
 * 	@return		int			1
 */
function complete_dictionary_with_modules(&$taborder, &$tabname, &$tablib, &$tabsql, &$tabsqlsort, &$tabfield, &$tabfieldvalue, &$tabfieldinsert, &$tabrowid, &$tabcond, &$tabhelp, &$tabcomplete)
{
}
/**
 *  Activate external modules mandatory when country is country_code
 *
 * 	@param		string		$country_code	CountryCode
 * 	@return		int			1
 */
function activateModulesRequiredByCountry($country_code)
{
}
/**
 *  Search external modules to complete the list of contact element
 *
 * 	@param		array		$elementList			elementList
 * 	@return		int			1
 */
function complete_elementList_with_modules(&$elementList)
{
}
/**
 *	Show array with constants to edit
 *
 *	@param	array	$tableau		Array of constants array('key'=>array('type'=>type, 'label'=>label)
 *									where type can be 'string', 'text', 'textarea', 'html', 'yesno', 'emailtemplate:xxx', ...
 *	@param	int		$strictw3c		0=Include form into table (deprecated), 1=Form is outside table to respect W3C (deprecated), 2=No form nor button at all, 3=No form nor button at all and each field has a unique name (form is output by caller, recommended)
 *  @param  string  $helptext       Tooltip help to use for the column name of values
 *  @param	string	$text			Text to use for the column name of values
 *	@return	void
 */
function form_constantes($tableau, $strictw3c = 0, $helptext = '', $text = 'Value')
{
}
/**
 *	Show array with constants to edit
 *
 *	@param	array	$modules		Array of all modules
 *	@return	string					HTML string with warning
 */
function showModulesExludedForExternal($modules)
{
}
/**
 *	Add document model used by doc generator
 *
 *	@param		string	$name			Model name
 *	@param		string	$type			Model type
 *	@param		string	$label			Model label
 *	@param		string	$description	Model description
 *	@return		int						<0 if KO, >0 if OK
 */
function addDocumentModel($name, $type, $label = '', $description = '')
{
}
/**
 *	Delete document model used by doc generator
 *
 *	@param		string	$name			Model name
 *	@param		string	$type			Model type
 *	@return		int						<0 if KO, >0 if OK
 */
function delDocumentModel($name, $type)
{
}
/**
 *	Return the php_info into an array
 *
 *	@return		array		Array with PHP infos
 */
function phpinfo_array()
{
}
/**
 *  Return array head with list of tabs to view object informations.
 *
 *  @return	array   	    		    head array with tabs
 */
function company_admin_prepare_head()
{
}
/**
 *  Return array head with list of tabs to view object informations.
 *
 *  @return	array   	    		    head array with tabs
 */
function email_admin_prepare_head()
{
}
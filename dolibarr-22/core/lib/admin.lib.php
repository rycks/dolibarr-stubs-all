<?php

/**
 *  Renvoi une version en chaine depuis une version en tableau
 *
 *  @param		array<int<0,2>,int|string>		$versionarray		Tableau de version (vermajeur,vermineur,autre)
 *  @return     string        			      	Chaine version
 *  @see versioncompare()
 */
function versiontostring($versionarray)
{
}
/**
 *	Compare 2 versions (stored into 2 arrays), to know if a version (a,b,c) is lower than (x,y,z)
 *  To check using a string version do a preg_split('/[\.\-]/', strinversion) to convert the string into an array.
 *  To check with Dolibarr version use versiondolibarrarray() to get the array of Dolibarr current version
 *
 *  For example: if (versioncompare(versiondolibarrarray(),array(4,0,-5)) >= 0) is true if version is 4.0 alpha or higher.
 *  For example: if (versioncompare(versiondolibarrarray(),array(4,0,0)) >= 0) is true if version is 4.0 final or higher.
 *  For example: if (versioncompare(versiondolibarrarray(),array(4,0,1)) >= 0) is true if version is 4.0.1 or higher.
 *  Alternative way to compare: if ((float) DOL_VERSION >= 4.0) is true if version is 4.0 alpha or higher (works only to compare first and second level)
 *
 *	@param      array<int|string>	$versionarray1	Array of version (vermajor,verminor,patch)
 *	@param      array<int|string>	$versionarray2	Array of version (vermajor,verminor,patch)
 *	@return     int<-4,4>			      			-4,-3,-2,-1 if versionarray1<versionarray2 (value depends on level of difference)
 * 													0 if same
 * 													1,2,3,4 if versionarray1>versionarray2 (value depends on level of difference)
 *  @see versiontostring()
 */
function versioncompare($versionarray1, $versionarray2)
{
}
/**
 *	Return version PHP
 *
 *	@return     array<int<0,2>,string>	Tableau de version (vermajeur,vermineur,autre)
 *  @see versioncompare()
 */
function versionphparray()
{
}
/**
 *	Return version Dolibarr
 *
 *	@return     array<int<0,2>,string>	Array of version (vermajor,verminor,vermaintenance,other)
 *  @see versioncompare()
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
 *  Note that SQL files must have all comments at start of line. Also this function take ';' as the char to detect end of sql request
 *
 *	@param		string		$sqlfile					Full path to sql file
 * 	@param		int			$silent						1=Do not output anything, 0=Output line for update page
 * 	@param		int			$entity						Entity targeted for multicompany module
 *	@param		int			$usesavepoint				1=Run a savepoint before each request and a rollback to savepoint if error (this allow to have some request with errors inside global transactions).
 *	@param		string		$handler					Handler targeted for menu (replace __HANDLER__ with this value between quotes)
 *	@param 		string		$okerror					Family of errors we accept ('default', 'none')
 *  @param		int			$linelengthlimit			Limit for length of each line (Use 0 if unknown, may be faster if defined)
 *  @param		int			$nocommentremoval			Do no try to remove comments (in such a case, we consider that each line is a request, so use also $linelengthlimit=0)
 *  @param		int			$offsetforchartofaccount	Offset to use to load chart of account table to update sql on the fly to add offset to rowid and account_parent value
 *  @param		int			$colspan					2=Add a colspan=2 on td
 *  @param		int			$onlysqltoimportwebsite		Only sql requests used to import a website template are allowed. This is a security feature to disallow SQL injection when loading a template.
 *  @param		string		$database					Database (replace __DATABASE__ with this value)
 * 	@return		int										Return integer <=0 if KO, >0 if OK
 */
function run_sql($sqlfile, $silent = 1, $entity = 0, $usesavepoint = 1, $handler = '', $okerror = 'default', $linelengthlimit = 32768, $nocommentremoval = 0, $offsetforchartofaccount = 0, $colspan = 0, $onlysqltoimportwebsite = 0, $database = '')
{
}
/**
 *	Delete a constant
 *
 *	@param	    DoliDB		$db         Database handler
 *	@param	    int|string	$name		Name of constant or rowid of line
 *	@param	    int			$entity		Multi company id, -1 for all entities
 *	@return     int         			Return integer <0 if KO, >0 if OK
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
 *	@param	    int|string	$value		Value of constant
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
 * @param	int		$nbofactivatedmodules		Number if activated modules
 * @param	int		$nboftotalmodules			Nb of total modules
 * @param	int		$nbmodulesnotautoenabled	Nb of modules not auto enabled that are activated
 * @return	array<array{0:string,1:string,2:string}>	Array of tabs to show
 */
function modules_prepare_head($nbofactivatedmodules, $nboftotalmodules, $nbmodulesnotautoenabled)
{
}
/**
 * Prepare array with list of tabs
 *
 * @return	array<array{0:string,1:string,2:string}>	Array of tabs to show
 */
function ihm_prepare_head()
{
}
/**
 * Prepare array with list of tabs
 *
 * @return	array<array{0:string,1:string,2:string}>	Array of tabs to show
 */
function security_prepare_head()
{
}
/**
 * Prepare array with list of tabs
 *
 * @param 	DolibarrModules		$object 	Descriptor class
 * @return	array<array{0:string,1:string,2:string}>	Array of tabs to show
 */
function modulehelp_prepare_head($object)
{
}
/**
 * Prepare array with list of tabs
 *
 * @return	array<array{0:string,1:string,2:string}>	Array of tabs to show
 */
function translation_prepare_head()
{
}
/**
 * Prepare array with list of tabs
 *
 * @return	array<array{0:string,1:string,2:string}>	Array of tabs to show
 */
function defaultvalues_prepare_head()
{
}
/**
 * 	Return list of session
 *
 *  @return array<string,array{login:string,age:int,creation:null|int|false,modification:int|false,raw:string,remote_ip:?string,user_agent:?string}>	Array list of sessions
 */
function listOfSessions()
{
}
/**
 * 	Purge existing sessions
 *
 * 	@param		string	$mysessionid		To avoid to try to delete my own session
 * 	@return		int							>0 if OK, <0 if KO
 */
function purgeSessions($mysessionid)
{
}
/**
 *  Enable a module
 *
 *  @param      string		$value      			Name of module to activate
 *  @param      int			$withdeps  				Activate/Disable also all dependencies
 * 	@param		int			$noconfverification		Remove verification of $conf variable for module
 *  @return     array{nbmodules?:int,errors:string[],nbperms?:int}	array('nbmodules'=>nb modules activated with success, 'errors=>array of error messages, 'nbperms'=>Nb permission added);
 */
function activateModule($value, $withdeps = 1, $noconfverification = 0)
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
 * 	@param		int[]		$taborder			Taborder
 * 	@param		string[]	$tabname			Tabname
 * 	@param		string[]	$tablib				Tablib
 * 	@param		string[]	$tabsql				Tabsql
 * 	@param		string[]	$tabsqlsort			Tabsqlsort
 * 	@param		string[]	$tabfield			Tabfield
 * 	@param		string[]	$tabfieldvalue		Tabfieldvalue
 * 	@param		string[]	$tabfieldinsert		Tabfieldinsert
 * 	@param		string[]	$tabrowid			Tabrowid
 * 	@param		bool[]		$tabcond			Tabcond
 * 	@param		array<array<string,string>>	$tabhelp	Tabhelp
 *  @param		array<string|int,array<int|string,string|array<string,string>>>	$tabcomplete   		Tab complete (will replace all other in future). Key is table name.
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
 * 	@param		array<string,string>	$elementList			elementList
 * 	@return		int			1
 */
function complete_elementList_with_modules(&$elementList)
{
}
/**
 *	Show array with constants to edit
 *
 *	@param	array<string,array{type:string,label:string,tooltip?:string}>|array<int,string>	$tableau		Array of constants array('key'=>array('type'=>type, 'label'=>label, 'tooltip'=>tooltip)
 *                                                                                          				where type can be 'string', 'text', 'textarea', 'html', 'yesno', 'emailtemplate:xxx', ...
 *	@param	int<2,3>	$strictw3c		0=Include form into table (deprecated), 1=Form is outside table to respect W3C (deprecated), 2=No form nor button at all, 3=No form nor button at all and each field has a unique name (form is output by caller, recommended)  (typed as int<2,3> to highlight the deprecated values)
 *  @param  string  	$helptext       Tooltip help to use for the column name of values
 *  @param	string		$text			Text to use for the column name of values
 *	@return	void
 */
function form_constantes($tableau, $strictw3c = 2, $helptext = '', $text = 'Value')
{
}
/**
 *	Show array with constants to edit
 *
 *	@param	DolibarrModules[]	$modules	Array of all modules
 *	@return	string							HTML string with warning
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
 *	@return		int						Return integer <0 if KO, >0 if OK
 */
function addDocumentModel($name, $type, $label = '', $description = '')
{
}
/**
 *	Delete document model used by doc generator
 *
 *	@param		string	$name			Model name
 *	@param		string	$type			Model type
 *	@return		int						Return integer <0 if KO, >0 if OK
 */
function delDocumentModel($name, $type)
{
}
/**
 *	Return the php_info into an array
 *
 *	@return	array<string,array<string,string|array{local:string,master:string}>>	Array with PHP info
 */
function phpinfo_array()
{
}
/**
 *  Return array head with list of tabs to view object information.
 *
 * @return	array<array{0:string,1:string,2:string}>	Array of tabs to show
 */
function company_admin_prepare_head()
{
}
/**
 *  Return array head with list of tabs to view object information.
 *
 * @return	array<array{0:string,1:string,2:string}>	Array of tabs to show
 */
function email_admin_prepare_head()
{
}
<?php

$action = \GETPOST('action', 'alpha') ? \GETPOST('action', 'alpha') : 'view';
$confirm = \GETPOST('confirm', 'alpha');
$backtopage = \GETPOST('backtopage', 'alpha');
$rowid = \GETPOST('rowid', 'alpha');
$id = 1;
// Load variable for pagination
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
// If $page is not defined, or '' or -1
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
// Name of SQL tables of dictionaries
$tabname = array();
// Dictionary labels
$tablib = array();
// Requests to extract data
$tabsql = array();
// Criteria to sort dictionaries
$tabsqlsort = array();
// Nom des champs en resultat de select pour affichage du dictionnaire
$tabfield = array();
// Nom des champs d'edition pour modification d'un enregistrement
$tabfieldvalue = array();
// Nom des champs dans la table pour insertion d'un enregistrement
$tabfieldinsert = array();
// Nom du rowid si le champ n'est pas de type autoincrement
// Example: "" if id field is "rowid" and has autoincrement on
//          "nameoffield" if id field is not "rowid" or has not autoincrement on
$tabrowid = array();
// Condition to show dictionary in setup page
$tabcond = array();
// List of help for fields
$tabhelp = array();
// List of check for fields (NOT USED YET)
$tabfieldcheck = array();
// Define elementList and sourceList (used for dictionary type of contacts "llx_c_type_contact")
$elementList = array();
$sourceList = array();
/*
 * Actions
 */
$error = 0;
$listfield = \explode(',', $tabfield[$id]);
$listfieldinsert = \explode(',', $tabfieldinsert[$id]);
$listfieldmodify = \explode(',', $tabfieldinsert[$id]);
$listfieldvalue = \explode(',', $tabfieldvalue[$id]);
// Check that all fields are filled
$ok = 1;
$newid = 0;
$website = new \Website($db);
/*
 * View
 */
$form = new \Form($db);
$formadmin = new \FormAdmin($db);
$titre = $langs->trans("WebsiteSetup");
$linkback = '<a href="' . ($backtopage ? $backtopage : \DOL_URL_ROOT . '/admin/modules.php?restore_lastsearch_values=1') . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
// Onglets
$head = array();
$h = 0;
// Complete requete recherche valeurs avec critere de tri
$sql = $tabsql[$id];
//print $sql;
$fieldlist = \explode(',', $tabfield[$id]);
// List of websites in database
$resql = $db->query($sql);
/**
 *	Show fields in insert/edit mode
 *
 * 	@param		string[]	$fieldlist		Array of fields
 * 	@param		?Object	$obj			If we show a particular record, obj is filled with record fields
 *  @param		string	$tabname		Name of SQL table
 *  @param		string	$context		'add'=Output field for the "add form", 'edit'=Output field for the "edit form", 'hide'=Output field for the "add form" but we don't want it to be rendered
 *	@return		void
 */
function fieldListWebsites($fieldlist, $obj = \null, $tabname = '', $context = '')
{
}
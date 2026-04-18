<?php

$action = \GETPOST('action', 'aZ09') ? \GETPOST('action', 'aZ09') : 'view';
$confirm = \GETPOST('confirm', 'alpha');
$id = 31;
$rowid = \GETPOST('rowid', 'alpha');
$code = \GETPOST('code', 'alpha');
$acts = array();
$actl = array();
$listoffset = \GETPOST('listoffset', 'alpha');
$listlimit = \GETPOSTINT('listlimit') > 0 ? \GETPOSTINT('listlimit') : 1000;
$active = 1;
$sortfield = \GETPOST("sortfield", 'aZ09comma');
$sortorder = \GETPOST("sortorder", 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT('page');
$offset = $listlimit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$search_country_id = \GETPOST('search_country_id', 'int');
$permissiontoeditchart = $user->hasRight('accounting', 'chartofaccount');
// This page is a generic page to edit dictionaries
// Put here declaration of dictionaries properties
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
// List of help for fields
$tabhelp = array();
$listfield = \explode(',', \str_replace(' ', '', $tabfield[$id]));
$listfieldinsert = \explode(',', $tabfieldinsert[$id]);
$listfieldmodify = \explode(',', $tabfieldinsert[$id]);
$listfieldvalue = \explode(',', $tabfieldvalue[$id]);
// Check that all fields are filled
$ok = 1;
$sql = "DELETE from " . $db->sanitize($tabname[$id]) . " WHERE rowid = " . (int) $rowid;
$result = $db->query($sql);
$sql = "UPDATE " . $db->sanitize($tabname[$id]) . " SET active = 1 WHERE rowid = " . (int) $rowid;
$result = $db->query($sql);
$sql = "UPDATE " . $db->sanitize($tabname[$id]) . " SET active = 0 WHERE rowid = " . (int) $rowid;
$result = $db->query($sql);
/*
 * View
 */
$form = new \Form($db);
$formadmin = new \FormAdmin($db);
$help_url = 'EN:Module_Double_Entry_Accounting#Setup|FR:Module_Comptabilit&eacute;_en_Partie_Double#Configuration';
$titre = $langs->trans($tablib[$id]);
$linkback = '';
// Complete requete recherche valeurs avec critere de tri
$sql = $tabsql[$id];
//print $sql;
$fieldlist = \explode(',', $tabfield[$id]);
// Form to add a new line
$fieldlist = \explode(',', $tabfield[$id]);
$obj = new \stdClass();
$tmpaction = 'create';
$parameters = array('fieldlist' => $fieldlist, 'tabname' => $tabname[$id]);
$reshook = $hookmanager->executeHooks('createDictionaryFieldlist', $parameters, $obj, $tmpaction);
// Note that $action and $object may have been modified by some hooks
$error = $hookmanager->error;
$errors = $hookmanager->errors;
$colspan = \count($fieldlist) + 3;
$resql = $db->query($sql);
$num = $db->num_rows($resql);
$i = 0;
$param = '&id=' . \urlencode((string) $id);
$paramwithsearch = $param;
$searchpicto = $form->showFilterAndCheckAddButtons(0);
/**
 *	Show fields in insert/edit mode
 *
 * 	@param		string[]	$fieldlist		Array of fields
 * 	@param		?stdClass	$obj			If we show a particular record, obj is filled with record fields
 *  @param		string		$tabname		Name of SQL table
 *  @param		string		$context		'add'=Output field for the "add form", 'edit'=Output field for the "edit form", 'hide'=Output field for the "add form" but we don't want it to be rendered
 *	@return		void
 */
function fieldListAccountModel($fieldlist, $obj = \null, $tabname = '', $context = '')
{
}
<?php

// Get Parameters
$action = \GETPOST('action', 'aZ09');
$massaction = \GETPOST('massaction', 'alpha');
$show_files = \GETPOSTINT('show_files');
$confirm = \GETPOST('confirm', 'alpha');
$cancel = \GETPOST('cancel', 'alpha');
$toselect = \GETPOST('toselect', 'array:int');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'bookmarklist';
// To manage different context of search
$backtopage = \GETPOST('backtopage', 'alpha');
$optioncss = \GETPOST('optioncss', 'alpha');
$mode = \GETPOST('mode', 'aZ');
$id = \GETPOSTINT("id");
$search_title = \GETPOST('search_title', 'alpha');
// Load variable for pagination
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
// Initialize Objects
$object = new \Bookmark($db);
$extrafields = new \ExtraFields($db);
$arrayfields = array();
$arrayfields = \dol_sort_array($arrayfields, 'position');
// Permissions
$permissiontoread = $user->hasRight('bookmark', 'lire');
$permissiontoadd = $user->hasRight('bookmark', 'creer');
$permissiontodelete = $user->hasRight('bookmark', 'supprimer') || $permissiontoadd && $object->fk_user == $user->id;
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
// Mass actions
$objectclass = 'Bookmark';
$objectlabel = 'Bookmark';
$uploaddir = $conf->bookmark->dir_output;
/*
 * View
 */
$form = new \Form($db);
$now = \dol_now();
//$help_url = "EN:Module_MyObject|FR:Module_MyObject_FR|ES:Módulo_MyObject";
$help_url = '';
$title = $langs->trans("Bookmarks");
$morejs = array();
$morecss = array();
// Build and execute select
// --------------------------------------------------------------------
$sql = "SELECT b.rowid, b.dateb, b.fk_user, b.url, b.target, b.title, b.favicon, b.position,";
// Add fields from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListSelect', $parameters, $object);
$sql = \preg_replace('/,\\s*$/', '', $sql);
$sqlfields = $sql;
// Count total nb of records
$nbtotalofrecords = '';
/* The fast and low memory method to get and count full list converts the sql into a sql count */
$sqlforcount = \preg_replace('/^' . \preg_quote($sqlfields, '/') . '/', 'SELECT COUNT(*) as nbtotalofrecords', $sql);
$sqlforcount = \preg_replace('/GROUP BY .*$/', '', $sqlforcount);
$resql = $db->query($sqlforcount);
$resql = $db->query($sql);
$num = $db->num_rows($resql);
$arrayofselected = \is_array($toselect) ? $toselect : array();
$param = '';
// Add $param from hooks
$parameters = array('param' => &$param);
$reshook = $hookmanager->executeHooks('printFieldListSearchParam', $parameters, $object);
// List of mass actions available
$arrayofmassactions = array();
$massactionbutton = $form->selectMassAction('', $arrayofmassactions);
$newcardbutton = '';
// Add code for pre mass action (confirmation or email presend form)
$topicmail = "SendBookmarkRef";
$modelmail = "bookmark";
$objecttmp = new \Bookmark($db);
$trackid = 'bookmark' . $object->id;
$moreforfilter = '';
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldPreListTitle', $parameters, $object, $action);
$varpage = empty($contextpage) ? $_SERVER["PHP_SELF"] : $contextpage;
$selectedfields = $form->multiSelectArrayWithCheckbox('selectedfields', $arrayfields, $varpage, \getDolGlobalString('MAIN_CHECKBOX_LEFT_COLUMN'));
// Fields title search
// --------------------------------------------------------------------
// TODO
$totalarray = array();
// Loop on record
// --------------------------------------------------------------------
$i = 0;
$savnbfield = $totalarray['nbfield'];
$totalarray = array();
$imaxinloop = $limit ? \min($num, $limit) : $num;
$parameters = array('arrayfields' => $arrayfields, 'sql' => $sql);
$reshook = $hookmanager->executeHooks('printFieldListFooter', $parameters, $object, $action);
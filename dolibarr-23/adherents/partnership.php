<?php

// Get parameters
$id = \GETPOSTINT('rowid') ? \GETPOSTINT('rowid') : \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm', 'alpha');
$cancel = \GETPOST('cancel', 'alpha');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'partnershipcard';
// To manage different context of search
$backtopage = \GETPOST('backtopage', 'alpha');
$backtopageforcancel = \GETPOST('backtopageforcancel', 'alpha');
//$lineid   = GETPOST('lineid', 'int');
$object = new \Adherent($db);
// Initialize a technical objects
$object = new \Partnership($db);
$extrafields = new \ExtraFields($db);
$adht = new \AdherentType($db);
$diroutputmassaction = $conf->partnership->dir_output . '/temp/massgeneration/' . $user->id;
$search_array_options = $extrafields->getOptionalsFromPost($object->table_element, '', 'search_');
// Initialize array of search criteria
$search_all = \GETPOST("search_all", 'alpha');
$search = array();
// Must be 'include', not 'include_once'.
$permissiontoread = $user->hasRight('partnership', 'read');
$permissiontoadd = $user->hasRight('partnership', 'write');
// Used by the include of actions_addupdatedelete.inc.php and actions_lineupdown.inc.php
$permissiontodelete = $user->hasRight('partnership', 'delete') || $permissiontoadd && isset($object->status) && $object->status == $object::STATUS_DRAFT;
$permissionnote = $user->hasRight('partnership', 'write');
// Used by the include of actions_setnotes.inc.php
$permissiondellink = $user->hasRight('partnership', 'write');
// Used by the include of actions_dellink.inc.php
$usercanclose = $user->hasRight('partnership', 'write');
// Used by the include of actions_addupdatedelete.inc.php and actions_lineupdown.inc.php
$upload_dir = $conf->partnership->multidir_output[isset($object->entity) ? $object->entity : 1];
/*
 * Actions
 */
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$date_start = \dol_mktime(0, 0, 0, \GETPOSTINT('date_partnership_startmonth'), \GETPOSTINT('date_partnership_startday'), \GETPOSTINT('date_partnership_startyear'));
$date_end = \dol_mktime(0, 0, 0, \GETPOSTINT('date_partnership_endmonth'), \GETPOSTINT('date_partnership_endday'), \GETPOSTINT('date_partnership_endyear'));
/*
 * View
 */
$form = new \Form($db);
$formfile = new \FormFile($db);
$title = $langs->trans("Partnership");
$help_url = "EN:Module_Foundations|FR:Module_Adh&eacute;rents|ES:M&oacute;dulo_Miembros|DE:Modul_Mitglieder";
$form = new \Form($db);
$object = new \Adherent($db);
$result = $object->fetch($id);
$head = \member_prepare_head($object);
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/adherents/list.php', ['restore_lastsearch_values' => 1]) . '">' . $langs->trans("BackToList") . '</a>';
//$morehtmlright = 'partnership/partnership_card.php?action=create&backtopage=%2Fdolibarr%2Fhtdocs%2Fpartnership%2Fpartnership_list.php';
$morehtmlright = '';
$memberid = $object->id;
// TODO Replace this card with the list of all partnerships.
$object = new \Partnership($db);
$partnershipid = $object->fetch(0, "", $memberid);
<?php

// Defini si peux lire/modifier permissions
$canreaduser = $user->admin || $user->hasRight("user", "user", "read");
$caneditfield = \false;
$id = \GETPOSTINT('id');
$action = \GETPOST('action', 'aZ09');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'userihm';
// $user est le user qui edite, $id est l'id de l'utilisateur edite
$caneditfield = $user->id == $id && $user->hasRight("user", "self", "write") || $user->id != $id && $user->hasRight("user", "user", "write");
// Security check
$socid = 0;
$feature2 = $socid && $user->hasRight("user", "self", "write") ? '' : 'user';
$result = \restrictedArea($user, 'user', $id, 'user&user', $feature2);
$dirtop = "../core/menus/standard";
$dirleft = "../core/menus/standard";
// Charge utilisateur edite
$object = new \User($db);
// Liste des zone de recherche permanentes supportees
/* deprecated
$searchform=array("main_searchform_societe","main_searchform_contact","main_searchform_produitservice");
$searchformconst=array($conf->global->MAIN_SEARCHFORM_SOCIETE,$conf->global->MAIN_SEARCHFORM_CONTACT,$conf->global->MAIN_SEARCHFORM_PRODUITSERVICE);
$searchformtitle=array($langs->trans("Companies"),$langs->trans("Contacts"),$langs->trans("ProductsAndServices"));
*/
$form = new \Form($db);
$formadmin = new \FormAdmin($db);
/*
 * Actions
 */
$parameters = array('id' => $socid);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 * View
 */
$person_name = !empty($object->firstname) ? $object->lastname . ", " . $object->firstname : $object->lastname;
$title = $person_name . " - " . $langs->trans('Card');
$help_url = '';
// List of possible landing pages
$tmparray = array();
$sql = "SELECT b.rowid, b.fk_user, b.url, b.title";
$resql = $db->query($sql);
// Hook for insertion new items in the List of possible landing pages
$reshook = $hookmanager->executeHooks('addToLandingPageList', $tmparray, $object);
$head = \user_prepare_head($object);
$title = $langs->trans("User");
$linkback = '';
$s = \picto_from_langcode(\getDolGlobalString('MAIN_LANG_DEFAULT'));
$tmplist = array('' => '&nbsp;', 'show_list' => $langs->trans("ViewList"), 'show_month' => $langs->trans("ViewCal"), 'show_week' => $langs->trans("ViewWeek"), 'show_day' => $langs->trans("ViewDay"), 'show_peruser' => $langs->trans("ViewPerUser"));
$mainsizelistelimit = \getDolGlobalInt('MAIN_SIZE_LISTE_LIMIT');
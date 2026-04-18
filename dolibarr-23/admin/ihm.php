<?php

$action = \GETPOST('action', 'aZ09');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'adminihm';
// To manage different context of search
$mode = \GETPOST('mode', 'aZ09') ? \GETPOST('mode', 'aZ09') : 'other';
\define("MAIN_MOTD", "");
$object = new \stdClass();
/*
 * Action
 */
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
// Convert action set_XXX and del_XXX to set var (this is used when no javascript on for ajax_constantonoff)
$regs = array();
$error = 0;
/*
 * View
 */
$wikihelp = 'EN:First_setup|FR:Premiers_param&eacute;trages|ES:Primeras_configuraciones';
$form = new \Form($db);
$formother = new \FormOther($db);
$formadmin = new \FormAdmin($db);
$head = \ihm_prepare_head();
// Hide wiki link on login page
$pictohelp = '<span class="fa fa-question-circle"></span>';
$array = array(0 => $langs->trans("Firstname") . ' ' . $langs->trans("Lastname"), 1 => $langs->trans("Lastname") . ' ' . $langs->trans("Firstname"));
// Message of the day on home page
$substitutionarray = \getCommonSubstitutionArray($langs, 0, array('object', 'objectamount'));
$texthelp = $langs->trans("FollowingConstantsWillBeSubstituted") . '<br>';
$doleditor = new \DolEditor('main_motd', \getDolGlobalString('MAIN_MOTD'), '', 142, 'dolibarr_notes', 'In', \false, \true, \true, \ROWS_4, '90%');
// Message on login page
$substitutionarray = \getCommonSubstitutionArray($langs, 0, array('object', 'objectamount', 'user'));
$texthelp = $langs->trans("FollowingConstantsWillBeSubstituted") . '<br>';
$doleditor = new \DolEditor('main_home', \getDolGlobalString('MAIN_HOME'), '', 142, 'dolibarr_notes', 'In', \false, \true, \true, \ROWS_4, '90%');
$disabled = '';
$maxfilesizearray = \getMaxFileSizeArray();
$maxmin = $maxfilesizearray['maxmin'];
<?php

$action = \GETPOST('action', 'aZ09');
$toselect = \GETPOST('toselect', 'array:int');
// Array of ids of elements selected into a list
// Load variable for pagination
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
// If $page is not defined, or '' or -1
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$id = \GETPOSTINT('id');
$rowid = \GETPOSTINT('rowid');
$search_nom = \GETPOST("search_nom");
$search_prenom = \GETPOST("search_prenom");
$search_email = \GETPOST("search_email");
$template_id = \GETPOSTINT('template_id');
$array_query = array();
$object = new \Mailing($db);
$result = $object->fetch($id);
$advTarget = new \AdvanceTargetingMailing($db);
// List of sending methods
$listofmethods = array();
$permissiontoread = $user->hasRight('mailing', 'lire');
$permissiontoadd = $user->hasRight('mailing', 'creer');
$permissiontovalidatesend = $user->hasRight('mailing', 'valider');
$permissiontodelete = $user->hasRight('mailing', 'supprimer');
// Add recipients
$user_contact_query = \false;
$array_query = array();
// if ($array_query ['type_of_target'] == 1 || $array_query ['type_of_target'] == 3) {
$result = $advTarget->query_thirdparty($array_query);
$mailingadvthirdparties = \null;
$template_name = \GETPOST('template_name');
$error = 0;
$result = $advTarget->delete($user);
// Ici, rowid indique le destinataire et id le mailing
$sql = "DELETE FROM " . \MAIN_DB_PREFIX . "mailing_cibles WHERE rowid = " . (int) $rowid;
$resql = $db->query($sql);
/*
 * View
 */
$form = new \Form($db);
$formmailing = new \FormMailing($db);
$formadvtargetemaling = new \FormAdvTargetEmailing($db);
$formcompany = new \FormCompany($db);
$formother = new \FormOther($db);
$help_url = 'EN:Module_EMailing|FR:Module_Mailing|ES:M&oacute;dulo_Mailing';
$arrayofselected = \is_array($toselect) ? $toselect : array();
$totalarray = ['nbfield' => 0];
$head = \emailing_prepare_head($object);
$linkback = '<a href="' . \DOL_URL_ROOT . '/comm/mailing/list.php?restore_lastsearch_values=1">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<div class="refidno">';
$morehtmlstatus = '';
$nbtry = $nbok = 0;
$emailarray = \CMailFile::getArrayAddress($object->email_from);
$nbemail = $object->nbemail ? $object->nbemail : 0;
<?php

$action = \GETPOST('action', 'aZ09');
$toselect = \GETPOST('toselect', 'array:int');
// Array of ids of elements selected into a list
$contextpage = \GETPOST('contextpage', 'aZ');
$massaction = \GETPOST('massaction', 'alpha');
// The bulk action (combo box choice into lists)
$mode = \GETPOST('mode', 'aZ');
// The display mode ('list', 'kanban', 'hierarchy', 'calendar', 'gantt', ...)
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
$search_lastname = \GETPOST("search_lastname", 'alphanohtml');
$search_firstname = \GETPOST("search_firstname", 'alphanohtml');
$search_email = \GETPOST("search_email", 'alphanohtml');
$search_other = \GETPOST("search_other", 'alphanohtml');
$search_dest_status = \GETPOST('search_dest_status', 'int');
// Search modules dirs
$modulesdir = \dolGetModulesDirs('/mailings');
$object = new \Mailing($db);
$result = $object->fetch($id);
$sqlmessage = '';
$mesgs = array();
// List of sending methods
$listofmethods = array();
$permissiontoread = $user->hasRight('mailing', 'lire');
$permissiontocreate = $user->hasRight('mailing', 'creer');
$permissiontovalidatesend = $user->hasRight('mailing', 'valider');
$permissiontodelete = $user->hasRight('mailing', 'supprimer');
// Add recipients
$module = \GETPOST("module", 'alpha');
$result = -1;
$obj = \null;
// @phpstan-ignore-line
$completefilename = 'targets_emailing' . $object->id . '_' . \dol_print_date(\dol_now(), 'dayhourlog') . '.csv';
// List of selected targets
$sql = "SELECT mc.rowid, mc.lastname, mc.firstname, mc.email, mc.other, mc.statut as status, mc.date_envoi, mc.tms,";
$resql = $db->query($sql);
// Ici, rowid indique le destinataire et id le mailing
$sql = "DELETE FROM " . \MAIN_DB_PREFIX . "mailing_cibles WHERE rowid = " . (int) $rowid;
$resql = $db->query($sql);
$upload_dir = $conf->mailing->dir_output . "/" . \get_exdir($object->id, \getDolGlobalInt('MAILING_USE_NEW_PATH_FOR_FILES') ? 0 : 2, 0, 1, $object, 'mailing');
$action = "";
/*
 * View
 */
$form = new \Form($db);
$formmailing = new \FormMailing($db);
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
$newcardbutton = '';
$allowaddtarget = $object->status == $object::STATUS_DRAFT;
// List of selected targets
$sql = "SELECT mc.rowid, mc.lastname, mc.firstname, mc.email, mc.other, mc.statut as status, mc.date_envoi, mc.tms,";
$asearchcriteriahasbeenset = 0;
// Count total nb of records
$nbtotalofrecords = '';
$resql = $db->query($sql);
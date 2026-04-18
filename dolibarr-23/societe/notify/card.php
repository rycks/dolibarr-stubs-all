<?php

$socid = \GETPOSTINT("socid");
$action = \GETPOST('action', 'aZ09');
$contactid = \GETPOST('contactid', 'alpha');
// May be an int or 'thirdparty'
$actionid = \GETPOSTINT('actionid');
$optioncss = \GETPOST('optioncss', 'aZ');
$result = \restrictedArea($user, 'societe', '', '');
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$now = \dol_now();
// Security check
$object = new \Societe($db);
$permissiontoadd = $user->hasRight('societe', 'lire');
$parameters = array('id' => $socid);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$error = 0;
/*
 *	View
 */
$form = new \Form($db);
$object = new \Societe($db);
$result = $object->fetch($socid);
$title = $langs->trans("ThirdParty") . ' - ' . $langs->trans("Notification");
$help_url = 'EN:Module_Third_Parties|FR:Module_Tiers|ES:Empresas';
$head = \societe_prepare_head($object);
$linkback = '<a href="' . \DOL_URL_ROOT . '/societe/list.php?restore_lastsearch_values=1">' . $langs->trans("BackToList") . '</a>';
$nbtotalofrecords = '';
// List of notifications enabled for contacts of the thirdparty
$sql = "SELECT n.rowid, n.type,";
$resql = $db->query($sql);
$param = "&socid=" . $socid;
$newcardbutton = '';
$titlelist = $form->textwithpicto($langs->trans("ListOfActiveNotifications"), $langs->trans("ListOfActiveNotificationsHelp", $langs->transnoentitiesnoconv("Target"), $langs->transnoentitiesnoconv("Event")));
$num = $nbtotalofrecords;
$limitforsubscription = 0;
// List
$sql = "SELECT n.rowid, n.daten, n.email, n.objet_type as object_type, n.objet_id as object_id, n.type,";
// Count total nb of records
$nbtotalofrecords = '';
$resql = $db->query($sql);
$param = '&socid=' . $object->id;
$titlelist = $form->textwithpicto($langs->trans("ListOfNotificationsDone"), $langs->trans("ListOfNotificationsDoneHelp"));
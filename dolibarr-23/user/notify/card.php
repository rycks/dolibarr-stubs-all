<?php

$id = \GETPOSTINT("id");
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$actionid = \GETPOSTINT('actionid');
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$now = \dol_now();
// Security check
$object = new \User($db);
$permissiontoadd = $object->id == $user->id || $user->hasRight('user', 'user', 'lire');
$result = \restrictedArea($user, 'user', '', '', 'user');
$error = 0;
/*
 *	View
 */
$form = new \Form($db);
$object = new \User($db);
$result = $object->fetch($id, '', '', 1);
$title = $langs->trans("ThirdParty") . ' - ' . $langs->trans("Notification");
$help_url = 'EN:Module_Third_Parties|FR:Module_Tiers|ES:Empresas';
$head = \user_prepare_head($object);
$linkback = '<a href="' . \DOL_URL_ROOT . '/user/list.php?restore_lastsearch_values=1">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<a href="' . \DOL_URL_ROOT . '/user/vcard.php?id=' . $object->id . '&output=file&file=' . \urlencode(\dol_sanitizeFileName($object->getFullName($langs) . '.vcf')) . '" class="refid valignmiddle" rel="noopener">';
$urltovirtualcard = '/user/virtualcard.php?id=' . (int) $object->id;
$param = "&id=" . \urlencode((string) $id);
// Line with titles
// List of notifications enabled for contacts
$sql = "SELECT n.rowid, n.type,";
$resql = $db->query($sql);
$newcardbutton = '';
$titlelist = $form->textwithpicto($langs->trans("ListOfActiveNotifications"), $langs->trans("ListOfActiveNotificationsHelp", $langs->transnoentitiesnoconv("Target"), $langs->transnoentitiesnoconv("Event")));
$limitforsubscription = 0;
// List
$sql = "SELECT n.rowid, n.daten, n.email, n.objet_type as object_type, n.objet_id as object_id, n.type,";
// Count total nb of records
$nbtotalofrecords = '';
$resql = $db->query($sql);
$param = '&id=' . $object->id;
$titlelist = $form->textwithpicto($langs->trans("ListOfNotificationsDone"), $langs->trans("ListOfNotificationsDoneHelp"));
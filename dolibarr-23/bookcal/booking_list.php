<?php

$id = \GETPOSTINT('id') ? \GETPOSTINT('id') : \GETPOSTINT('facid');
// For backward compatibility
$ref = \GETPOST('ref', 'alpha');
$socid = \GETPOSTINT('socid');
$action = \GETPOST('action', 'aZ09');
$type = \GETPOST('type', 'aZ09');
$fieldid = !empty($ref) ? 'ref' : 'rowid';
$moreparam = '';
$object = new \Calendar($db);
$ret = $object->fetch($id, $ref);
$isdraft = $object->status == \Calendar::STATUS_DRAFT ? 1 : 0;
// There is several ways to check permission.
// Set $enablepermissioncheck to 1 to enable a minimum low level of checks
$enablepermissioncheck = 0;
/*
 * Actions
 */
$parameters = array();
$helpurl = '';
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 * View
 */
$form = new \Form($db);
$now = \dol_now();
$title = $langs->trans('Calendar') . " - " . $langs->trans('Bookings');
$head = \calendarPrepareHead($object);
$formconfirm = '';
// Call Hook formConfirm
$parameters = array('formConfirm' => $formconfirm, 'lineid' => $lineid);
$reshook = $hookmanager->executeHooks('formConfirm', $parameters, $object, $action);
// Object card
// ------------------------------------------------------------
$linkback = '<a href="' . \dol_buildpath('/bookcal/calendar_list.php', 1) . '?restore_lastsearch_values=1' . (!empty($socid) ? '&socid=' . $socid : '') . '">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<div class="refidno">';
$sql = "SELECT ac.id, ac.ref, ac.datep as date_start, ac.datep2 as date_end, ac.label, acr.fk_element as elementid";
$resql = $db->query($sql);
$num = 0;
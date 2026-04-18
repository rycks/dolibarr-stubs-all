<?php

// Get parameters
$id = \GETPOSTINT('id');
$socid = \GETPOSTINT('socid');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$cancel = \GETPOST('cancel');
$backtopage = \GETPOST('backtopage', 'alpha');
$actioncode = \GETPOST('actioncode', 'array', 3);
$search_rowid = \GETPOST('search_rowid');
$search_agenda_label = \GETPOST('search_agenda_label');
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
// If $page is not defined, or '' or -1
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
// Initialize a technical objects
$object = new \Partnership($db);
$extrafields = new \ExtraFields($db);
$diroutputmassaction = $conf->partnership->dir_output . '/temp/massgeneration/' . $user->id;
$permissiontoread = $user->hasRight('partnership', 'read');
$permissiontoadd = $user->hasRight('partnership', 'write');
// Used by the include of actions_addupdatedelete.inc.php
$managedfor = \getDolGlobalString('PARTNERSHIP_IS_MANAGED_FOR', 'thirdparty');
/*
 *  Actions
 */
$parameters = array('id' => $id);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 *	View
 */
$form = new \Form($db);
$title = $langs->trans("Agenda");
$help_url = '';
$head = \partnershipPrepareHead($object);
// Object card
// ------------------------------------------------------------
$linkback = '<a href="' . \dol_buildpath('/partnership/partnership_list.php', 1) . '?restore_lastsearch_values=1' . (!empty($socid) ? '&socid=' . $socid : '') . '">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<div class="refidno">';
// Actions buttons
$objthirdparty = $object;
$objcon = new \stdClass();
$out = '&origin=' . \urlencode((string) ($object->element . '@' . $object->module)) . '&originid=' . \urlencode((string) $object->id);
$urlbacktopage = $_SERVER['PHP_SELF'] . '?id=' . $object->id;
$permok = $user->hasRight('agenda', 'myactions', 'create');
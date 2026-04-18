<?php

// Get parameters
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$cancel = \GETPOST('cancel');
$backtopage = \GETPOST('backtopage', 'alpha');
$actioncode = \GETPOST('actioncode', 'array', 3);
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
$object = new \Establishment($db);
$extrafields = new \ExtraFields($db);
$diroutputmassaction = $conf->hrm->dir_output . '/temp/massgeneration/' . $user->id;
$permissiontoread = $user->admin;
$permissiontoadd = $user->hasRight('hrm', 'write');
// Used by the include of actions_addupdatedelete.inc.php
$upload_dir = $conf->hrm->multidir_output[isset($object->entity) ? $object->entity : 1];
/*
 *  Actions
 */
$parameters = array('id' => $id);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 * View
 */
$form = new \Form($db);
$title = $langs->trans("Agenda");
$help_url = '';
$head = \establishment_prepare_head($object);
// Object card
// ------------------------------------------------------------
$linkback = '<a href="' . \DOL_URL_ROOT . '/hrm/admin/admin_establishment.php?restore_lastsearch_values=1' . (!empty($socid) ? '&socid=' . $socid : '') . '">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<div class="refidno">';
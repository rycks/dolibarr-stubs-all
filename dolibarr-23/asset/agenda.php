<?php

// Get parameters
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$cancel = \GETPOST('cancel', 'alpha');
$backtopage = \GETPOST('backtopage', 'alpha');
$actioncode = \GETPOST('actioncode', 'array', 3);
$search_rowid = \GETPOST('search_rowid');
$search_agenda_label = \GETPOST('search_agenda_label');
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST("sortfield", 'alpha');
$sortorder = \GETPOST("sortorder", 'alpha');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
// If $page is not defined, or '' or -1
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
// Initialize a technical objects
$object = new \Asset($db);
$extrafields = new \ExtraFields($db);
$diroutputmassaction = $conf->asset->dir_output . '/temp/massgeneration/' . $user->id;
$permissiontoadd = $user->hasRight('asset', 'write');
$isdraft = $object->status == $object::STATUS_DRAFT ? 1 : 0;
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
$help_url = 'EN:Module_Agenda_En|FR:Module_Agenda|ES:Módulo_Agenda|DE:Modul_Agenda';
$head = \assetPrepareHead($object);
// Object card
// ------------------------------------------------------------
$linkback = '<a href="' . \DOL_URL_ROOT . '/asset/list.php?restore_lastsearch_values=1' . (!empty($socid) ? '&socid=' . $socid : '') . '">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<div class="refidno">';
// Actions buttons
$objthirdparty = $object;
$objcon = new \stdClass();
$out = '&origin=' . \urlencode((string) ($object->element . '@' . $object->module)) . '&originid=' . \urlencode((string) $object->id);
$urlbacktopage = $_SERVER['PHP_SELF'] . '?id=' . $object->id;
$permok = $user->hasRight('agenda', 'myactions', 'create');
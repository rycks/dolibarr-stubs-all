<?php

// Get parameters
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'alpha');
$cancel = \GETPOST('cancel');
$backtopage = \GETPOST('backtopage', 'alpha');
$actioncode = \GETPOST('actioncode', 'array', 3);
$search_rowid = \GETPOST('search_rowid');
$search_agenda_label = \GETPOST('search_agenda_label');
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST("sortfield", 'alpha');
$sortorder = \GETPOST("sortorder", 'alpha');
$socid = \GETPOSTINT('socid');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
// If $page is not defined, or '' or -1
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
// Initialize a technical objects
$object = new \StockTransfer($db);
$extrafields = new \ExtraFields($db);
$diroutputmassaction = $conf->stocktransfer->dir_output . '/temp/massgeneration/' . $user->id;
$permissiontoread = $user->hasRight('stocktransfer', 'stocktransfer', 'read');
$permissiontoadd = $user->hasRight('stocktransfer', 'stocktransfer', 'write');
// Used by the include of actions_addupdatedelete.inc.php and actions_lineupdown.inc.php
$permissionnote = $user->hasRight('stocktransfer', 'stocktransfer', 'write');
// Used by the include of actions_setnotes.inc.php
$permissiontodelete = $user->rights->stocktransfer->stocktransfer->delete || $permissiontoadd && isset($object->status) && $object->status < $object::STATUS_TRANSFERED;
$permissiondellink = $user->hasRight('stocktransfer', 'stocktransfer', 'write');
// Used by the include of actions_dellink.inc.php
$upload_dir = $conf->stocktransfer->multidir_output[isset($object->entity) ? $object->entity : 1];
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
$head = \stocktransferPrepareHead($object);
// Object card
// ------------------------------------------------------------
$linkback = '<a href="' . \dol_buildpath('/stocktransfer/stocktransfer_list.php', 1) . '?restore_lastsearch_values=1' . (!empty($socid) ? '&socid=' . $socid : '') . '">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<div class="refidno">';
// Actions buttons
$objthirdparty = $object;
$objcon = new \stdClass();
$out = '&origin=' . $object->element . '&originid=' . $object->id;
$permok = $user->hasRight('agenda', 'myactions', 'create');
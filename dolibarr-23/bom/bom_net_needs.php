<?php

// Get parameters
$id = \GETPOSTINT('id');
$lineid = \GETPOSTINT('lineid');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm', 'alpha');
$cancel = \GETPOST('cancel', 'alpha');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'bomnet_needs';
// To manage different context of search
$backtopage = \GETPOST('backtopage', 'alpha');
// Initialize a technical objects
$object = new \BOM($db);
$extrafields = new \ExtraFields($db);
// Note that conf->hooks_modules contains array
// Massaction
$diroutputmassaction = \getMultidirOutput($object) . '/temp/massgeneration/' . $user->id;
$search_array_options = $extrafields->getOptionalsFromPost($object->table_element, '', 'search_');
// Initialize array of search criteria
$search_all = \GETPOST("search_all", 'alpha');
$search = array();
// Security check - Protection if external user
//if ($user->socid > 0) accessforbidden();
//if ($user->socid > 0) $socid = $user->socid;
$isdraft = $object->status == $object::STATUS_DRAFT ? 1 : 0;
// Permissions
$permissionnote = $user->hasRight('bom', 'write');
// Used by the include of actions_setnotes.inc.php
$permissiondellink = $user->hasRight('bom', 'write');
// Used by the include of actions_dellink.inc.php
$permissiontoadd = $user->hasRight('bom', 'write');
// Used by the include of actions_addupdatedelete.inc.php and actions_lineupdown.inc.php
$permissiontodelete = $user->hasRight('bom', 'delete') || $permissiontoadd && isset($object->status) && $object->status == $object::STATUS_DRAFT;
$upload_dir = $conf->bom->multidir_output[isset($object->entity) ? $object->entity : 1];
/*
 * Actions
 */
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$error = 0;
$backurlforlist = \DOL_URL_ROOT . '/bom/bom_list.php';
/*
 * View
 */
$form = new \Form($db);
$formfile = new \FormFile($db);
$title = $langs->trans('BOM');
$help_url = 'EN:Module_BOM';
$TChildBom = array();
$head = \bomPrepareHead($object);
$formconfirm = '';
// Call Hook formConfirm
$parameters = array('formConfirm' => $formconfirm, 'lineid' => $lineid);
$reshook = $hookmanager->executeHooks('formConfirm', $parameters, $object, $action);
// Object card
// ------------------------------------------------------------
$linkback = '<a href="' . \DOL_URL_ROOT . '/bom/bom_list.php?restore_lastsearch_values=1">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<div class="refidno">';
// Common attributes
$keyforbreak = 'duration';
// Find sell price of generated product. We suppose we sell it to a company like ours (same country...).
$res = $object->fetch_product();
$manufacturedvalued = '';
$viewlink = \dolGetButtonTitle($langs->trans('GroupByX', $langs->transnoentitiesnoconv("Products")), '', 'fa fa-bars imgforviewmode', $_SERVER['PHP_SELF'] . '?id=' . $object->id . '&token=' . \newToken(), '', 1, array('morecss' => 'reposition ' . ($action !== 'treeview' ? 'btnTitleSelected' : '')));
/*
 * Lines
 */
$text_stock_options = $langs->trans("RealStockDesc") . '<br>';
$parameters = array();
$reshook = $hookmanager->executeHooks('addMoreActionsButtons', $parameters, $object, $action);
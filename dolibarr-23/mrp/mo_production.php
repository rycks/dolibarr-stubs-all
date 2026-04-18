<?php

// Get parameters
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm', 'alpha');
$cancel = \GETPOST('cancel');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'mocard';
// To manage different context of search
$backtopage = \GETPOST('backtopage', 'alpha');
$lineid = \GETPOSTINT('lineid');
$fk_movement = \GETPOSTINT('fk_movement');
$fk_default_warehouse = \GETPOSTINT('fk_default_warehouse');
$collapse = \GETPOST('collapse', 'aZ09comma');
// Initialize a technical objects
$object = new \Mo($db);
$extrafields = new \ExtraFields($db);
$diroutputmassaction = $conf->mrp->dir_output . '/temp/massgeneration/' . $user->id;
$objectline = new \MoLine($db);
$search_array_options = $extrafields->getOptionalsFromPost($object->table_element, '', 'search_');
// Initialize array of search criteria
$search_all = \GETPOST("search_all", 'alpha');
$search = array();
// Must be 'include', not 'include_once'.
// Security check - Protection if external user
//if ($user->socid > 0) accessforbidden();
//if ($user->socid > 0) $socid = $user->socid;
$isdraft = $object->status == $object::STATUS_DRAFT ? 1 : 0;
$result = \restrictedArea($user, 'mrp', $object->id, 'mrp_mo', '', 'fk_soc', 'rowid', $isdraft);
// Permissions
$permissionnote = $user->hasRight('mrp', 'write');
// Used by the include of actions_setnotes.inc.php
$permissiondellink = $user->hasRight('mrp', 'write');
// Used by the include of actions_dellink.inc.php
$permissiontoadd = $user->hasRight('mrp', 'write');
// Used by the include of actions_addupdatedelete.inc.php and actions_lineupdown.inc.php
$permissiontodelete = $user->hasRight('mrp', 'delete') || $permissiontoadd && isset($object->status) && $object->status == $object::STATUS_DRAFT;
$permissiontoproduce = $permissiontoadd;
$permissiontoupdatecost = $user->hasRight('bom', 'read');
// User who can define cost must have knowledge of pricing
$upload_dir = $conf->mrp->multidir_output[isset($object->entity) ? $object->entity : 1];
/*
 * Actions
 */
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$error = 0;
$backurlforlist = \DOL_URL_ROOT . '/mrp/mo_list.php';
$triggermodname = 'MO_MODIFY';
// Actions to send emails
$triggersendname = 'MO_SENTBYMAIL';
$autocopy = 'MAIN_MAIL_AUTOCOPY_MO_TO';
$trackid = 'mo' . $object->id;
/*
 * View
 */
$form = new \Form($db);
$formproject = new \FormProjets($db);
$formproduct = new \FormProduct($db);
$tmpwarehouse = new \Entrepot($db);
$tmpbatch = new \Productlot($db);
$tmpstockmovement = new \MouvementStock($db);
$title = $langs->trans('Mo');
$help_url = 'EN:Module_Manufacturing_Orders|FR:Module_Ordres_de_Fabrication|DE:Modul_Fertigungsauftrag';
$morejs = array('/mrp/js/lib_dispatch.js.php');
$newToken = \newToken();
$res = $object->fetch_thirdparty();
$res = $object->fetch_optionals();
$head = \moPrepareHead($object);
$formconfirm = '';
// Call Hook formConfirm
$parameters = array('formConfirm' => $formconfirm, 'lineid' => $lineid);
$reshook = $hookmanager->executeHooks('formConfirm', $parameters, $object, $action);
// MO file
// ------------------------------------------------------------
$linkback = '<a href="' . \DOL_URL_ROOT . '/mrp/mo_list.php?restore_lastsearch_values=1' . (!empty($socid) ? '&socid=' . $socid : '') . '">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<div class="refidno">';
// Common attributes
$keyforbreak = 'fk_warehouse';
/*
 * Lines
 */
$collapse = 1;
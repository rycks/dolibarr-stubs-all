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
$backtopageforcancel = \GETPOST('backtopageforcancel', 'alpha');
$TBomLineId = \GETPOST('bomlineid', 'array:int');
$lineid = \GETPOSTINT('lineid');
$socid = \GETPOSTINT("socid");
// Initialize a technical objects
$object = new \Mo($db);
$objectbom = new \BOM($db);
$extrafields = new \ExtraFields($db);
$diroutputmassaction = $conf->mrp->dir_output . '/temp/massgeneration/' . $user->id;
$search_array_options = $extrafields->getOptionalsFromPost($object->table_element, '', 'search_');
// Initialize array of search criteria
$search_all = \GETPOST("search_all", 'alpha');
$search = array();
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
$upload_dir = $conf->mrp->multidir_output[isset($object->entity) ? $object->entity : 1];
/*
 * Actions
 */
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$error = 0;
$backurlforlist = \dol_buildpath('/mrp/mo_list.php', 1);
$triggermodname = 'MO_MODIFY';
// Actions to send emails
$triggersendname = 'MO_SENTBYMAIL';
$autocopy = 'MAIN_MAIL_AUTOCOPY_MO_TO';
$trackid = 'mo' . $object->id;
/*
 * View
 */
$form = new \Form($db);
$formfile = new \FormFile($db);
$formproject = new \FormProjets($db);
$title = $langs->trans('ManufacturingOrder') . " - " . $langs->trans("Card");
$help_url = 'EN:Module_Manufacturing_Orders|FR:Module_Ordres_de_Fabrication|DE:Modul_Fertigungsauftrag';
$titlelist = \null;
$res = $object->fetch_thirdparty();
$head = \moPrepareHead($object);
$formconfirm = '';
// Call Hook formConfirm
$parameters = array('formConfirm' => $formconfirm, 'lineid' => $lineid);
$reshook = $hookmanager->executeHooks('formConfirm', $parameters, $object, $action);
// Object card
// ------------------------------------------------------------
$linkback = '<a href="' . \dol_buildpath('/mrp/mo_list.php', 1) . '?restore_lastsearch_values=1' . (!empty($socid) ? '&socid=' . $socid : '') . '">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<div class="refidno">';
//Mo Parent
$mo_parent = $object->getMoParent();
// Common attributes
$keyforbreak = 'fk_warehouse';
// Presend form
$modelmail = 'mo';
$defaulttopic = 'InformationMessage';
$diroutput = $conf->mrp->dir_output;
$trackid = 'mo' . $object->id;
<?php

// Get parameters
$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm', 'alpha');
$cancel = \GETPOST('cancel');
$backtopage = \GETPOST('backtopage', 'alpha');
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$socid = 0;
// Initialize a technical objects
$object = new \SocieteAccount($db);
$extrafields = new \ExtraFields($db);
$search_array_options = $extrafields->getOptionalsFromPost($object->table_element, '', 'search_');
// Initialize array of search criteria
$search_all = \GETPOST("search_all", 'alpha');
$search = array();
// Must be 'include', not 'include_once'.
// Security check
//if ($user->socid > 0) accessforbidden();
//if ($user->socid > 0) $socid = $user->socid;
//restrictedArea($user, 'website', $id);
$permissiontoaccess = \isModEnabled('website') && $user->hasRight('website', 'read') || \isModEnabled('webportal');
// Permissions
$permissiontocreate = 0;
$permissiontodelete = 0;
$permissionnote = $permissiontocreate;
//  Used by the include of actions_setnotes.inc.php
$permissiondellink = $permissiontocreate;
//  Used by the include of actions_dellink.inc.php
$permissiontoadd = $permissiontocreate;
//  Used by the include of actions_addupdatedelete.inc.php and actions_lineupdown.inc.php
// check access from type of site on create, edit, delete (other than view)
$site_type_js = '';
$error = 0;
/*
 * Actions
 */
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$backurlforlist = \dol_buildpath('/societe/website.php', 1) . '?id=' . $object->fk_soc;
// Actions to send emails
$triggersendname = 'WEBSITEACCOUNT_SENTBYMAIL';
$autocopy = 'MAIN_MAIL_AUTOCOPY_WEBSITEACCOUNT_TO';
$trackid = 'websiteaccount' . $object->id;
/*
 * View
 */
$form = new \Form($db);
$formfile = new \FormFile($db);
$title = $langs->trans("WebsiteAccount");
$help_url = '';
// prepare output js
$out_js = '';
//$res = $object->fetch_optionals();
$head = \websiteaccountPrepareHead($object);
$formconfirm = '';
// Call Hook formConfirm
$parameters = array('formConfirm' => $formconfirm);
$reshook = $hookmanager->executeHooks('formConfirm', $parameters, $object, $action);
// Object card
// ------------------------------------------------------------
$linkback = '';
//if ($fk_website) {
//	$linkback = '<a href="'.DOL_URL_ROOT.'/website/website_card.php?fk_website='.$fk_website.'&restore_lastsearch_values=1'.(!empty($socid) ? '&socid='.$socid : '').'">'.$langs->trans("BackToList").'</a>';
//}
$morehtmlref = '<div class="refidno">';
// Common attributes
$keyforbreak = 'note_private';
// Presend form
$modelmail = 'websiteaccount';
$defaulttopic = 'Information';
$diroutput = \isModEnabled('website') ? $conf->website->dir_output : '';
$trackid = 'websiteaccount' . $object->id;
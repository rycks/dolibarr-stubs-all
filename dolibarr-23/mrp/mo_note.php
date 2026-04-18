<?php

// Get parameters
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$cancel = \GETPOST('cancel');
$backtopage = \GETPOST('backtopage', 'alpha');
// Initialize a technical objects
$object = new \Mo($db);
$extrafields = new \ExtraFields($db);
$diroutputmassaction = $conf->mrp->dir_output . '/temp/massgeneration/' . $user->id;
// Security check - Protection if external user
//if ($user->socid > 0) accessforbidden();
//if ($user->socid > 0) $socid = $user->socid;
$isdraft = $object->status == $object::STATUS_DRAFT ? 1 : 0;
$result = \restrictedArea($user, 'mrp', $object->id, 'mrp_mo', '', 'fk_soc', 'rowid', $isdraft);
$permissionnote = $user->hasRight('mrp', 'write');
// Used by the include of actions_setnotes.inc.php
/*
 * Actions
 */
$reshook = $hookmanager->executeHooks('doActions', array(), $object, $action);
/*
 * View
 */
$form = new \Form($db);
$formproject = new \FormProjets($db);
$title = $langs->trans('Mo');
$help_url = 'EN:Module_Manufacturing_Orders|FR:Module_Ordres_de_Fabrication|DE:Modul_Fertigungsauftrag';
$head = \moPrepareHead($object);
// Object card
// ------------------------------------------------------------
$linkback = '<a href="' . \dol_buildpath('/mrp/mo_list.php', 1) . '?restore_lastsearch_values=1' . (!empty($socid) ? '&socid=' . $socid : '') . '">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<div class="refidno">';
$cssclass = "titlefield";
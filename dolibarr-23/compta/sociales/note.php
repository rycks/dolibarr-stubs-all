<?php

// Get parameters
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$cancel = \GETPOST('cancel', 'alpha');
$backtopage = \GETPOST('backtopage', 'alpha');
$object = new \ChargeSociales($db);
// Security check
$socid = \GETPOSTINT('socid');
$result = \restrictedArea($user, 'tax', $object->id, 'chargesociales', 'charges');
$permissiontoread = $user->hasRight('tax', 'charges', 'lire');
$permissiontoadd = $user->hasRight('tax', 'charges', 'creer');
$permissionnote = $user->hasRight('tax', 'charges', 'creer');
// Used by the include of actions_setnotes.inc.php
/*
 * Actions
 */
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 * View
 */
$form = new \Form($db);
$title = $langs->trans("SocialContribution") . ' - ' . $langs->trans("Note");
$help_url = 'EN:Module_Taxes_and_social_contributions|FR:Module Taxes et dividendes|ES:M&oacute;dulo Impuestos y cargas sociales (IVA, impuestos)';
$head = \tax_prepare_head($object);
$morehtmlref = '<div class="refidno">';
// Object card
// ------------------------------------------------------------
$linkback = '<a href="' . \DOL_URL_ROOT . '/compta/sociales/list.php?restore_lastsearch_values=1">' . $langs->trans("BackToList") . '</a>';
//$object->totalpaid = $totalpaid; // To give a chance to dol_banner_tab to use already paid amount to show correct status
$morehtmlstatus = '';
$cssclass = "titlefield";
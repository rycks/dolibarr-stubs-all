<?php

$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm', 'alpha');
$cancel = \GETPOST('cancel', 'alpha');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'myobjectcard';
// To manage different context of search
$backtopage = \GETPOST('backtopage', 'alpha');
$backtopageforcancel = \GETPOST('backtopageforcancel', 'alpha');
$lineid = \GETPOSTINT('lineid');
$fk_project = \GETPOST('fk_project') ? \GETPOSTINT('fk_project') : 0;
$dateech = \dol_mktime(\GETPOSTINT('echhour'), \GETPOSTINT('echmin'), \GETPOSTINT('echsec'), \GETPOSTINT('echmonth'), \GETPOSTINT('echday'), \GETPOSTINT('echyear'));
$dateperiod = \dol_mktime(\GETPOSTINT('periodhour'), \GETPOSTINT('periodmin'), \GETPOSTINT('periodsec'), \GETPOSTINT('periodmonth'), \GETPOSTINT('periodday'), \GETPOSTINT('periodyear'));
$label = \GETPOST('label', 'alpha');
$actioncode = \GETPOSTINT('actioncode');
$fk_user = \GETPOSTINT('userid') > 0 ? \GETPOSTINT('userid') : 0;
// Initialize a technical objects
$object = new \ChargeSociales($db);
$extrafields = new \ExtraFields($db);
$diroutputmassaction = $conf->tax->dir_output . '/temp/massgeneration/' . $user->id;
$permissiontoread = $user->hasRight('tax', 'charges', 'lire');
$permissiontoadd = $user->hasRight('tax', 'charges', 'creer');
// Used by the include of actions_addupdatedelete.inc.php and actions_lineupdown.inc.php
$permissiontodelete = $user->rights->tax->charges->supprimer || $permissiontoadd && isset($object->status) && $object->status == $object::STATUS_UNPAID;
$permissionnote = $user->hasRight('tax', 'charges', 'creer');
// Used by the include of actions_setnotes.inc.php
$permissiondellink = $user->hasRight('tax', 'charges', 'creer');
// Used by the include of actions_dellink.inc.php
$upload_dir = $conf->tax->multidir_output[isset($object->entity) ? $object->entity : 1];
// Security check
$socid = \GETPOSTINT('socid');
$result = \restrictedArea($user, 'tax', $object->id, 'chargesociales', 'charges');
/*
 * Actions
 */
$parameters = array('socid' => $socid);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 * View
 */
$form = new \Form($db);
$formfile = new \FormFile($db);
$formsocialcontrib = new \FormSocialContrib($db);
$bankaccountstatic = new \Account($db);
$title = $langs->trans("SocialContribution") . ' - ' . $langs->trans("Card");
$help_url = 'EN:Module_Taxes_and_social_contributions|FR:Module_Taxes_et_charges_spéciales|ES:M&oacute;dulo Impuestos y cargas sociales (IVA, impuestos)';
$resteapayer = 0;
$formconfirm = '';
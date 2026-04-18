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
$refund = \GETPOSTINT("refund");
$datev = \dol_mktime(12, 0, 0, \GETPOSTINT("datevmonth"), \GETPOSTINT("datevday"), \GETPOSTINT("datevyear"));
$datep = \dol_mktime(12, 0, 0, \GETPOSTINT("datepmonth"), \GETPOSTINT("datepday"), \GETPOSTINT("datepyear"));
// Initialize a technical objects
$object = new \Tva($db);
$extrafields = new \ExtraFields($db);
$diroutputmassaction = $conf->tax->dir_output . '/temp/massgeneration/' . $user->id;
// Must be 'include', not 'include_once'.
$permissiontoread = $user->hasRight('tax', 'charges', 'lire');
$permissiontoadd = $user->hasRight('tax', 'charges', 'creer');
// Used by the include of actions_addupdatedelete.inc.php and actions_lineupdown.inc.php
$permissiontodelete = $user->rights->tax->charges->supprimer || $permissiontoadd && isset($object->status) && $object->status == $object::STATUS_UNPAID;
$permissionnote = $user->hasRight('tax', 'charges', 'creer');
// Used by the include of actions_setnotes.inc.php
$permissiondellink = $user->hasRight('tax', 'charges', 'creer');
// Used by the include of actions_dellink.inc.php
$upload_dir = $conf->tax->multidir_output[isset($object->entity) ? $object->entity : 1] . '/vat';
// Security check
$socid = \GETPOSTINT('socid');
$result = \restrictedArea($user, 'tax', $object->id, 'tva', 'charges');
$resteapayer = 0;
/*
 * Actions
 */
$parameters = array('socid' => $socid);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 *	View
 */
$form = new \Form($db);
$formfile = new \FormFile($db);
$formproject = new \FormProjets($db);
$title = $langs->trans("VAT") . " - " . $langs->trans("Card");
$help_url = '';
// Other attributes
$parameters = array();
$reshook = $hookmanager->executeHooks('formObjectOptions', $parameters, $object, $action);
$formconfirm = '';
$head = \vat_prepare_head($object);
$totalpaid = $object->getSommePaiement();
// Call Hook formConfirm
$parameters = array('formConfirm' => $formconfirm);
$reshook = $hookmanager->executeHooks('formConfirm', $parameters, $object, $action);
$morehtmlref = '<div class="refidno">';
$linkback = '<a href="' . \DOL_URL_ROOT . '/compta/tva/list.php?restore_lastsearch_values=1">' . $langs->trans("BackToList") . '</a>';
// Other attributes
$parameters = array();
$reshook = $hookmanager->executeHooks('formObjectOptions', $parameters, $object, $action);
$nbcols = 3;
/*
 * Payments
 */
$sql = "SELECT p.rowid, p.num_paiement as num_payment, p.datep as dp, p.amount,";
//print $sql;
$resql = $db->query($sql);
// Presend form
$modelmail = 'vat';
$defaulttopic = 'InformationMessage';
$diroutput = $conf->tax->dir_output;
$trackid = 'vat' . $object->id;
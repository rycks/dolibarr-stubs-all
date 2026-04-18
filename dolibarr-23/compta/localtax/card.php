<?php

$id = \GETPOSTINT("id");
$action = \GETPOST("action", "aZ09");
$cancel = \GETPOST('cancel', 'alpha');
$refund = \GETPOSTINT("refund");
$lttype = \GETPOSTINT('localTaxType');
// Security check
$socid = \GETPOSTINT('socid');
$result = \restrictedArea($user, 'tax', '', '', 'charges');
$object = new \Localtax($db);
$permissiontoadd = $user->hasRight('tax', 'charges', 'creer');
$permissiontodelete = $user->hasRight('tax', 'charges', 'supprimer');
$datev = \dol_mktime(12, 0, 0, \GETPOSTINT("datevmonth"), \GETPOSTINT("datevday"), \GETPOSTINT("datevyear"));
$datep = \dol_mktime(12, 0, 0, \GETPOSTINT("datepmonth"), \GETPOSTINT("datepday"), \GETPOSTINT("datepyear"));
$ret = $object->addPayment($user);
$result = $object->fetch($id);
/*
 *	View
 */
$form = new \Form($db);
$result = $object->fetch($id);
$title = $langs->trans("LT" . $object->ltt) . " - " . $langs->trans("Card");
$help_url = '';
$datev = \dol_mktime(12, 0, 0, \GETPOSTINT("datevmonth"), \GETPOSTINT("datevday"), \GETPOSTINT("datevyear"));
$datep = \dol_mktime(12, 0, 0, \GETPOSTINT("datepmonth"), \GETPOSTINT("datepday"), \GETPOSTINT("datepyear"));
// Other attributes
$parameters = array();
$reshook = $hookmanager->executeHooks('formObjectOptions', $parameters, $object, $action);
$h = 0;
$head = array();
$linkback = '<a href="' . \DOL_URL_ROOT . '/compta/localtax/list.php?restore_lastsearch_values=1">' . $langs->trans("BackToList") . '</a>';
// Other attributes
$parameters = array();
$reshook = $hookmanager->executeHooks('formObjectOptions', $parameters, $object, $action);
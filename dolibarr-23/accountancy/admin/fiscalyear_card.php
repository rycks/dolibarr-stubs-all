<?php

// Get parameters
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha') ? \GETPOST('ref', 'alpha') : \GETPOST('label', 'alpha');
$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm', 'alpha');
$cancel = \GETPOST('cancel', 'alpha');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : \str_replace('_', '', \basename(\dirname(__FILE__)) . \basename(__FILE__, '.php'));
// To manage different context of search
$backtopage = \GETPOST('backtopage', 'alpha');
// if not set, a default page will be used
$backtopageforcancel = \GETPOST('backtopageforcancel', 'alpha');
// if not set, $backtopage will be used
$dol_openinpopup = \GETPOST('dol_openinpopup', 'aZ09');
$error = 0;
// Initialize a technical objects
$object = new \Fiscalyear($db);
$extrafields = new \ExtraFields($db);
// Must be 'include', not 'include_once'.
// List of status
/*
static $tmpstatus2label = array(
	'0' => 'OpenFiscalYear',
	'1' => 'CloseFiscalYear'
);
$status2label = array('' => '');
foreach ($tmpstatus2label as $key => $val) {
	$status2label[$key] = $langs->trans($val);
}
*/
$date_start = \dol_mktime(0, 0, 0, \GETPOSTINT('fiscalyearmonth'), \GETPOSTINT('fiscalyearday'), \GETPOSTINT('fiscalyearyear'));
$date_end = \dol_mktime(0, 0, 0, \GETPOSTINT('fiscalyearendmonth'), \GETPOSTINT('fiscalyearendday'), \GETPOSTINT('fiscalyearendyear'));
$permissiontoadd = $user->hasRight('accounting', 'fiscalyear', 'write');
/*
 * Actions
 */
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$result = $object->delete($user);
/*
 * View
 */
$form = new \Form($db);
$title = $langs->trans("Fiscalyear") . " - " . $langs->trans("Card");
$help_url = 'EN:Module_Double_Entry_Accounting#Setup|FR:Module_Comptabilit&eacute;_en_Partie_Double#Configuration';
$head = \fiscalyear_prepare_head($object);
$morehtmlref = '';
//$morehtmlref .= '<div class="refidno">';
//$morehtmlref .= '</div>';
$formconfirm = '';
// Object card
// ------------------------------------------------------------
$linkback = '<a href="' . \DOL_URL_ROOT . '/accountancy/admin/fiscalyear.php?restore_lastsearch_values=1">' . $langs->trans("BackToList") . '</a>';
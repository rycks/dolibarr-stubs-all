<?php

$action = \GETPOST('action', 'aZ09');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'adminsubcontractors';
$object = new \stdClass();
/*
 * Actions
 */
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 * View
 */
$help_url = '';
$head = \company_admin_prepare_head();
$form = new \Form($db);
$formother = new \FormOther($db);
$formcompany = new \FormCompany($db);
$countrynotdefined = '<span class="error">' . $langs->trans("ErrorSetACountryFirst") . ' (' . $langs->trans("SeeAbove") . ')</span>';
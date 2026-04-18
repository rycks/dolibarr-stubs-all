<?php

$action = \GETPOST('action', 'aZ09');
$value = \GETPOST('value', 'alpha');
$modulepart = \GETPOST('modulepart', 'aZ09');
// Used by actions_setmoduleoptions.inc.php
$label = \GETPOST('label', 'alpha');
$scandir = \GETPOST('scan_dir', 'alpha');
$type = 'order';
/*
 * Actions
 */
$error = 0;
$maskconstorder = \GETPOST('maskconstorder', 'aZ09');
$maskorder = \GETPOST('maskorder', 'alpha');
$res = 0;
/*elseif ($action == 'set_BANK_ASK_PAYMENT_BANK_DURING_ORDER') {
	// Activate ask for payment bank
	$res = dolibarr_set_const($db, "BANK_ASK_PAYMENT_BANK_DURING_ORDER", $value, 'chaine', 0, '', $conf->entity);

	if (!($res > 0)) {
		$error++;
	}

	if (!$error) {
		setEventMessages($langs->trans("SetupSaved"), null, 'mesgs');
	} else {
		setEventMessages($langs->trans("Error"), null, 'errors');
	}
} */
/*
 * View
 */
$form = new \Form($db);
$dirmodels = \array_merge(array('/'), (array) $conf->modules_parts['models']);
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
$head = \order_admin_prepare_head();
$arrayofmodules = array();
$arrayofmodules = \dol_sort_array($arrayofmodules, 'position');
// Load array def with activated templates
$def = array();
$sql = "SELECT nom";
$resql = $db->query($sql);
$sql = "SELECT rowid, label";
$resql = $db->query($sql);
$substitutionarray = \pdf_getSubstitutionArray($langs, \null, \null, 2);
$htmltext = '<i>' . $langs->trans("AvailableVariables") . ':<br>';
$variablename = 'ORDER_FREE_TEXT';
<?php

// Parameters
$action = \GETPOST('action', 'aZ09');
$multicurrency = new \MultiCurrency($db);
/*
 * Actions
 */
$reg = array();
$code = $reg[1];
$value = \GETPOST($code, 'alpha');
$code = $reg[1];
// Manual insertion of a rate
$error = 0;
$code = \GETPOST('code', 'alpha');
$rate = \price2num(\GETPOST('rate', 'alpha'));
$currency = new \MultiCurrency($db);
$TAvailableCurrency = array();
$sql = "SELECT code_iso, label, unicode, active FROM " . \MAIN_DB_PREFIX . "c_currencies";
$resql = $db->query($sql);
$TCurrency = array();
$sql = "SELECT rowid FROM " . \MAIN_DB_PREFIX . "multicurrency WHERE entity = " . (int) $conf->entity;
$resql = $db->query($sql);
/*
 * View
 */
$form = new \Form($db);
$page_name = "MultiCurrencySetup";
$help_url = '';
// Subheader
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
// Configuration header
$head = \multicurrencyAdminPrepareHead();
$tooltip = $langs->trans("multicurrency_useOriginTxHelp");
$urlforapilayer = 'https://currencylayer.com';
//https://apilayer.net
$endpointdefault = 'https://api.currencylayer.com/live?access_key=__MULTICURRENCY_APP_KEY__&source=__MULTICURRENCY_APP_SOURCE__';
$endpointdefault2 = 'https://api.apilayer.com/currency_data/live?base=__MULTICURRENCY_APP_SOURCE__';
$tooltiptext = $langs->trans("CurrencyLayerAccount_help_to_synchronize", $urlforapilayer) . '<br><span class="small">';
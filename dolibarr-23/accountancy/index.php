<?php

$pcgver = \getDolGlobalInt('CHARTOFACCOUNTS');
$zone = \GETPOSTINT('areacode');
$userid = \GETPOSTINT('userid');
$boxorder = \GETPOST('boxorder', 'aZ09');
$result = \InfoBox::saveboxorder($db, $zone, $boxorder, $userid);
/*
 * View
 */
$help_url = 'EN:Module_Double_Entry_Accounting#Setup|FR:Module_Comptabilit&eacute;_en_Partie_Double#Configuration';
$resultboxes = \FormOther::getBoxesArea($user, "27");
// Load $resultboxes (selectboxlist + boxactivated + boxlista + boxlistb)
$boxlist = '';
$step = 0;
$helpisexpanded = \GETPOSTINT('showtuto');
$showtutorial = '';
$step = 0;
$s = \img_picto('', 'puce') . ' ' . $langs->trans("AccountancyAreaDescBind", \chr(64 + $step), $langs->transnoentitiesnoconv("BillsCustomers"), '{s}') . "\n";
$s = \str_replace('{s}', '<a href="' . \DOL_URL_ROOT . '/accountancy/customer/index.php" target="setupaccountancy"><strong>' . $langs->transnoentitiesnoconv("TransferInAccounting") . ' - ' . $langs->transnoentitiesnoconv("CustomersVentilation") . '</strong></a>', $s);
$s = \img_picto('', 'puce') . ' ' . $langs->trans("AccountancyAreaDescBind", \chr(64 + $step), $langs->transnoentitiesnoconv("BillsSuppliers"), '{s}') . "\n";
$s = \str_replace('{s}', '<a href="' . \DOL_URL_ROOT . '/accountancy/supplier/index.php" target="setupaccountancy"><strong>' . $langs->transnoentitiesnoconv("TransferInAccounting") . ' - ' . $langs->transnoentitiesnoconv("SuppliersVentilation") . '</strong></a>', $s);
$s = \img_picto('', 'puce') . ' ' . $langs->trans("AccountancyAreaDescWriteRecords", \chr(64 + $step), $langs->transnoentitiesnoconv("TransferInAccounting") . ' - ' . $langs->transnoentitiesnoconv("RegistrationInAccounting"), $langs->transnoentitiesnoconv("WriteBookKeeping")) . "\n";
$s = \img_picto('', 'puce') . ' ' . $langs->trans("AccountancyAreaDescAnalyze", \chr(64 + $step)) . "<br>\n";
$s = \img_picto('', 'puce') . ' ' . $langs->trans("AccountancyAreaDescClosePeriod", \chr(64 + $step)) . "<br>\n";
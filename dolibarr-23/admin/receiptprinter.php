<?php

$action = \GETPOST('action', 'aZ09');
$mode = \GETPOST('mode', 'alpha');
$printername = \GETPOST('printername', 'alpha');
$printerid = \GETPOSTINT('printerid');
$printertypeid = \GETPOSTINT('printertypeid');
$parameter = \GETPOST('parameter', 'alpha');
$template = \GETPOST('template', 'alphanohtml');
$templatename = \GETPOST('templatename', 'alpha');
$templateid = \GETPOSTINT('templateid');
$printer = new \dolReceiptPrinter($db);
$error = 0;
$action = '';
$error = 0;
$action = '';
$error = 0;
$action = '';
$error = 0;
$action = '';
$error = 0;
$action = '';
$error = 0;
$object = new \Facture($db);
//$object->fetch(18);
//var_dump($object->lines);
$ret = $printer->sendToPrinter($object, $templateid, 1);
//}
$action = '';
$error = 0;
$action = '';
$error = 0;
$action = '';
$error = 0;
$action = '';
/*
 * View
 */
$form = new \Form($db);
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
$head = \receiptprinteradmin_prepare_head($mode);
$line = -1;
$ret = $printer->listprinters();
$nbofprinters = \count($printer->listprinters);
$ret = $printer->listPrintersTemplates();
$reshook = $hookmanager->executeHooks('listReceiptPrinterTags', array(), $printer, $action);
<?php

// Get parameters
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm', 'alpha');
$cancel = \GETPOST('cancel');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'inventorycard';
// To manage different context of search
$backtopage = \GETPOST('backtopage', 'alpha');
$include_sub_warehouse = !empty(\GETPOST('include_sub_warehouse')) ? \GETPOST('include_sub_warehouse') : 0;
// Initialize a technical objects
$object = new \Inventory($db);
$extrafields = new \ExtraFields($db);
// no inventory docs yet
$includedocgeneration = \false;
$diroutputmassaction = \null;
$search_array_options = $extrafields->getOptionalsFromPost($object->table_element, '', 'search_');
// Initialize array of search criteria
$search_all = \GETPOST("search_all", 'alpha');
$search = array();
/*
 * Actions
 */
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$savaction = $action;
$error = 0;
$backurlforlist = \DOL_URL_ROOT . '/product/inventory/list.php';
$triggermodname = 'STOCK_INVENTORY_MODIFY';
// Actions to send emails
$triggersendname = 'INVENTORY_SENTBYMAIL';
$autocopy = 'MAIN_MAIL_AUTOCOPY_INVENTORY_TO';
$trackid = 'stockinv' . $object->id;
/*
 * View
 */
$form = new \Form($db);
$formfile = new \FormFile($db);
$formproject = new \FormProjets($db);
$title = $langs->trans("Inventory");
$help_url = 'EN:Module_Stocks_En|FR:Module_Stock|ES:Módulo_Stocks|DE:Modul_Bestände';
$res = $object->fetch_optionals();
$head = \inventoryPrepareHead($object);
$formconfirm = '';
$text = '';
// Call Hook formConfirm
$parameters = array('formConfirm' => $formconfirm);
$reshook = $hookmanager->executeHooks('formConfirm', $parameters, $object, $action);
// Object card
// ------------------------------------------------------------
$linkback = '<a href="' . \DOL_URL_ROOT . '/product/inventory/list.php' . (!empty($socid) ? '?socid=' . $socid : '') . '">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<div class="refidno">';
// Presend form
$modelmail = 'inventory';
$defaulttopic = 'InformationMessage';
$diroutput = $conf->product->dir_output . '/inventory';
$trackid = 'stockinv' . $object->id;
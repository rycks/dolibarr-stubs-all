<?php

// Get parameters
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm', 'alpha');
$cancel = \GETPOST('cancel');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : \str_replace('_', '', \basename(\dirname(__FILE__)) . \basename(__FILE__, '.php'));
// To manage different context of search
$backtopage = \GETPOST('backtopage', 'alpha');
// if not set, a default page will be used
$backtopageforcancel = \GETPOST('backtopageforcancel', 'alpha');
// if not set, $backtopage will be used
$qty = \GETPOSTINT('qty');
$fk_product = \GETPOSTINT('fk_product');
$fk_warehouse_source = \GETPOSTINT('fk_warehouse_source');
$fk_warehouse_destination = \GETPOSTINT('fk_warehouse_destination');
$lineid = \GETPOSTINT('lineid');
$label = \GETPOST('label', 'alpha');
$batch = \GETPOST('batch', 'alpha');
$code_inv = \GETPOST('inventorycode', 'alphanohtml');
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
// Initialize a technical objects
$object = new \StockTransfer($db);
$extrafields = new \ExtraFields($db);
$diroutputmassaction = $conf->stocktransfer->dir_output . '/temp/massgeneration/' . $user->id;
$search_array_options = $extrafields->getOptionalsFromPost($object->table_element, '', 'search_');
// Initialize array of search criteria
$search_all = \trim(\GETPOST("search_all", 'alpha'));
$search = array();
// Must be 'include', not 'include_once'.
$permissiontoread = $user->hasRight('stocktransfer', 'stocktransfer', 'read');
$permissiontoadd = $user->hasRight('stocktransfer', 'stocktransfer', 'write');
// Used by the include of actions_addupdatedelete.inc.php and actions_lineupdown.inc.php
$permissionnote = $user->hasRight('stocktransfer', 'stocktransfer', 'write');
// Used by the include of actions_setnotes.inc.php
$permissiontodelete = $user->rights->stocktransfer->stocktransfer->delete || $permissiontoadd && isset($object->status) && $object->status < $object::STATUS_TRANSFERED;
$permissiondellink = $user->hasRight('stocktransfer', 'stocktransfer', 'write');
// Used by the include of actions_dellink.inc.php
$upload_dir = $conf->stocktransfer->multidir_output[isset($object->entity) ? $object->entity : 1];
/*
 * Actions
 */
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$error = 0;
$backurlforlist = \dolBuildUrl(\DOL_URL_ROOT . '/product/stock/stocktransfer/stocktransfer_list.php');
$triggermodname = 'STOCKTRANSFER_MODIFY';
// On remet cette lecture de permission ici car nécessaire d'avoir le nouveau statut de l'objet après toute action exécutée dessus (après incrémentation par example, le bouton supprimer doit disparaître)
$permissiontodelete = $user->rights->stocktransfer->stocktransfer->delete || $permissiontoadd && isset($object->status) && $object->status == $object::STATUS_DRAFT;
// Actions to send emails
$triggersendname = 'STOCKTRANSFER_SENTBYMAIL';
$autocopy = 'MAIN_MAIL_AUTOCOPY_STOCKTRANSFER_TO';
$trackid = 'stocktransfer' . $object->id;
/*
 * View
 */
$form = new \Form($db);
$formfile = new \FormFile($db);
$formproject = new \FormProjets($db);
$title = $langs->trans("StockTransfer");
$help_url = '';
// Show alert for planned departure date if the transfer is related
$date_prevue_depart = $object->date_prevue_depart;
$date_prevue_depart_plus_delai = $date_prevue_depart;
$liste = \ModelePDFStockTransfer::liste_modeles($db);
$preselected = \getDolGlobalString('STOCKTRANSFER_ADDON_PDF');
$res = $object->fetch_optionals();
$head = \stocktransferPrepareHead($object);
$formconfirm = '';
$formquestion = array();
// Call Hook formConfirm
$parameters = array('formConfirm' => $formconfirm, 'lineid' => $lineid);
$reshook = $hookmanager->executeHooks('formConfirm', $parameters, $object, $action);
// Object card
// ------------------------------------------------------------
$linkback = '<a href="' . \dol_buildpath('/product/stock/stocktransfer/stocktransfer_list.php', 1) . '?restore_lastsearch_values=1' . (!empty($socid) ? '&socid=' . $socid : '') . '">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<div class="refidno">';
$formproduct = new \FormProduct($db);
//print '<div class="tagtable centpercent">';
$param = '';
$listofdata = $object->getLinesArray();
$productstatic = new \Product($db);
$warehousestatics = new \Entrepot($db);
$warehousestatict = new \Entrepot($db);
$i = 0;
// Presend form
$modelmail = 'stocktransfer';
$defaulttopic = 'InformationMessage';
$diroutput = $conf->stocktransfer->dir_output;
$trackid = 'stocktransfer' . $object->id;
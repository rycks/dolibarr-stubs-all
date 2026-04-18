<?php

$backtopageforcancel = \GETPOST('backtopageforcancel');
$mesg = '';
$error = 0;
$errors = array();
$refalreadyexists = 0;
$formbarcode = \null;
// Get parameters
$id = \GETPOSTINT('id');
$type = \GETPOSTISSET('type') ? \GETPOSTINT('type') : \Product::TYPE_PRODUCT;
$action = \GETPOST('action', 'alpha') ? \GETPOST('action', 'alpha') : 'view';
$cancel = \GETPOST('cancel', 'alpha');
$backtopage = \GETPOST('backtopage', 'alpha');
$confirm = \GETPOST('confirm', 'alpha');
$socid = \GETPOSTINT('socid');
$duration_value = \GETPOST('duration_value') === '' ? \null : \GETPOSTINT('duration_value');
// duration value can be an empty string
$duration_unit = \GETPOST('duration_unit', 'alpha');
$accountancy_code_sell = \GETPOST('accountancy_code_sell', 'alpha');
$accountancy_code_sell_intra = \GETPOST('accountancy_code_sell_intra', 'alpha');
$accountancy_code_sell_export = \GETPOST('accountancy_code_sell_export', 'alpha');
$accountancy_code_buy = \GETPOST('accountancy_code_buy', 'alpha');
$accountancy_code_buy_intra = \GETPOST('accountancy_code_buy_intra', 'alpha');
$accountancy_code_buy_export = \GETPOST('accountancy_code_buy_export', 'alpha');
$checkmandatory = \GETPOST('accountancy_code_buy_export', 'alpha');
// Load object modCodeProduct
$module = \getDolGlobalString('PRODUCT_CODEPRODUCT_ADDON', 'mod_codeproduct_leopard');
$result = \dol_include_once('/core/modules/product/' . $module . '.php');
$object = new \Product($db);
// so test later to fill $usercancxxx is correct
$extrafields = new \ExtraFields($db);
$result = $object->fetch($id, (string) $ref);
$entity = empty($object->entity) ? $conf->entity : $object->entity;
$modulepart = 'product';
// Get object canvas (By default, this is not defined, so standard usage of dolibarr)
$canvas = !empty($object->canvas) ? $object->canvas : \GETPOST("canvas");
$objcanvas = \null;
// Security check
$fieldvalue = !empty($id) ? $id : (!empty($ref) ? $ref : '');
$fieldtype = !empty($id) ? 'rowid' : 'ref';
// Permissions
$usercanread = $object->type == \Product::TYPE_PRODUCT && $user->hasRight('produit', 'lire') || $object->type == \Product::TYPE_SERVICE && $user->hasRight('service', 'lire');
$usercancreate = $object->type == \Product::TYPE_PRODUCT && $user->hasRight('produit', 'creer') || $object->type == \Product::TYPE_SERVICE && $user->hasRight('service', 'creer');
$usercandelete = $object->type == \Product::TYPE_PRODUCT && $user->hasRight('produit', 'supprimer') || $object->type == \Product::TYPE_SERVICE && $user->hasRight('service', 'supprimer');
$permissiontoeditextra = $usercancreate;
$createbarcode = \isModEnabled('barcode') && \getDolGlobalString('BARCODE_USE_ON_PRODUCT');
$parameters = array('id' => $id, 'ref' => $ref, 'objcanvas' => $objcanvas);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$backurlforlist = \DOL_URL_ROOT . '/product/list.php?type=' . $type;
// Actions to build doc
$upload_dir = $conf->product->dir_output;
$permissiontoadd = $usercancreate;
// Actions to send emails
$triggersendname = 'PRODUCT_SENTBYMAIL';
$paramname = 'id';
$autocopy = 'MAIN_MAIL_AUTOCOPY_PRODUCT_TO';
$trackid = 'prod' . $object->id;
/*
 * View
 */
$form = new \Form($db);
$formfile = new \FormFile($db);
$formproduct = new \FormProduct($db);
$formcompany = new \FormCompany($db);
$sellOrEatByMandatoryList = \null;
$sellOrEatByMandatoryList = \Product::getSellOrEatByMandatoryList();
$disableSellBy = \getDolGlobalString('PRODUCT_DISABLE_SELLBY');
$disableEatBy = \getDolGlobalString('PRODUCT_DISABLE_EATBY');
$title = $langs->trans('ProductServiceCard');
$help_url = '';
$shortlabel = \dol_trunc($object->label, 16);
// Load object modBarCodeProduct
$res = 0;
$modBarCodeProduct = \null;
$module = \strtolower(\getDolGlobalString('BARCODE_PRODUCT_ADDON_NUM'));
$dirbarcode = \array_merge(array('/core/modules/barcode/'), $conf->modules_parts['barcode']);
$canvasdisplayaction = $action;
$tmpcode = '';
$formconfirm = '';
// Always output when not jmobile nor js
// Define confirmation messages
$formquestionclone = array('text' => $langs->trans("ConfirmClone"), 0 => array('type' => 'text', 'name' => 'clone_ref', 'label' => $langs->trans("NewRefForClone"), 'value' => empty($tmpcode) ? $langs->trans("CopyOf") . ' ' . $object->ref : $tmpcode, 'morecss' => 'width150'), 1 => array('type' => 'checkbox', 'name' => 'clone_content', 'label' => $langs->trans("CloneContentProduct"), 'value' => 1), 2 => array('type' => 'checkbox', 'name' => 'clone_categories', 'label' => $langs->trans("CloneCategoriesProduct"), 'value' => 1));
// Call Hook formConfirm
$parameters = array('formConfirm' => $formconfirm, 'object' => $object);
$reshook = $hookmanager->executeHooks('formConfirm', $parameters, $object, $action);
$cloneProductUrl = $_SERVER["PHP_SELF"] . '?action=clone&token=' . \newToken();
$cloneButtonId = 'action-clone-no-ajax';
$parameters = array();
$reshook = $hookmanager->executeHooks('addMoreActionsButtons', $parameters, $object, $action);
//Variable used to check if any text is going to be printed
$html = '';
// ancre
// Documents
$objectref = \dol_sanitizeFileName($object->ref);
$urlsource = $_SERVER["PHP_SELF"] . "?id=" . $object->id;
$genallowed = $usercanread;
$delallowed = $usercancreate;
$somethingshown = $formfile->numoffiles;
$MAXEVENT = 10;
$morehtmlcenter = '<div class="nowraponall">';
$formactions = new \FormActions($db);
$somethingshown = $formactions->showactions($object, 'product', 0, 1, '', $MAXEVENT, '', $morehtmlcenter);
// Presend form
$modelmail = 'product_send';
$defaulttopic = $object->label;
$diroutput = $conf->product->multidir_output[$object->entity ?? $conf->entity];
$trackid = 'prod' . $object->id;
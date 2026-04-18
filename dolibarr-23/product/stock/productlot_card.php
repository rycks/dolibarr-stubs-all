<?php

// Get parameters
$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm', 'alpha');
$cancel = \GETPOST('cancel');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'myobjectcard';
// To manage different context of search
$backtopage = \GETPOST('backtopage', 'alpha');
$backtopageforcancel = \GETPOST('backtopageforcancel', 'alpha');
$id = \GETPOSTINT('id');
$lineid = \GETPOSTINT('lineid');
$batch = \GETPOST('batch', 'alpha');
$productid = \GETPOSTINT('productid');
$ref = \GETPOST('ref', 'alpha');
// ref is productid_batch
$modulepart = 'product_batch';
// Initialize a technical objects
$object = new \Productlot($db);
$extrafields = new \ExtraFields($db);
$search_array_options = $extrafields->getOptionalsFromPost($object->table_element, '', 'search_');
// Initialize array of search criteria
$search_all = \GETPOST("search_all", 'alpha');
$search = array();
$search_entity = \GETPOSTINT('search_entity');
$search_fk_product = \GETPOSTINT('search_fk_product');
$search_batch = \GETPOST('search_batch', 'alpha');
$search_fk_user_creat = \GETPOSTINT('search_fk_user_creat');
$search_fk_user_modif = \GETPOSTINT('search_fk_user_modif');
$search_import_key = \GETPOSTINT('search_import_key');
$upload_dir = $conf->productbatch->multidir_output[$object->entity ?? $conf->entity] . '/' . \get_exdir(0, 0, 0, 1, $object, $modulepart);
$filearray = \dol_dir_list($upload_dir, "files");
$upload_dir = $conf->productbatch->multidir_output[$conf->entity];
$usercanread = $user->hasRight('produit', 'lire');
$usercancreate = $user->hasRight('produit', 'creer');
$usercandelete = $user->hasRight('produit', 'supprimer');
$permissiontoread = $usercanread;
$permissiontoadd = $usercancreate;
$permissiontodelete = $usercandelete;
$permissionnote = $user->hasRight('produit', 'creer');
// Used by the include of actions_setnotes.inc.php
$permissiondellink = $user->hasRight('produit', 'creer');
$socid = 0;
/*
 * Actions
 */
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$error = 0;
$backurlforlist = \dol_buildpath('/product/stock/productlot_list.php', 1);
$triggermodname = 'PRODUCT_LOT_MODIFY';
// Actions to send emails
$triggersendname = 'PRODUCT_LOT_SENTBYMAIL';
$autocopy = 'MAIN_MAIL_AUTOCOPY_PRODUCT_LOT_TO';
$trackid = 'productlot' . $object->id;
/*
 * View
 */
$form = new \Form($db);
$formfile = new \FormFile($db);
$help_url = '';
$shortlabel = \dol_trunc($object->batch, 16);
$title = $langs->trans('Batch') . " " . $shortlabel . " - " . $langs->trans('Card');
$help_url = 'EN:Module_Products|FR:Module_Produits|ES:M&oacute;dulo_Productos';
$res = $object->fetch_product();
$res = $object->fetch_optionals();
$head = \productlot_prepare_head($object);
$formconfirm = '';
// Call Hook formConfirm
$parameters = array('formConfirm' => $formconfirm, 'lineid' => $lineid);
$reshook = $hookmanager->executeHooks('formConfirm', $parameters, $object, $action);
// Object card
// ------------------------------------------------------------
$linkback = '<a href="' . \DOL_URL_ROOT . '/product/stock/productlot_list.php?restore_lastsearch_values=1">' . $langs->trans("BackToList") . '</a>';
$shownav = 1;
$morehtmlref = '';
$producttmp = new \Product($db);
// ancre
$includedocgeneration = 1;
$MAXEVENT = 10;
$formactions = new \FormActions($db);
$somethingshown = $formactions->showactions($object, 'productlot', 0, 1, '', $MAXEVENT);
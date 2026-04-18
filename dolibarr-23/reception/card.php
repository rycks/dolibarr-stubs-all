<?php

$origin = \GETPOST('origin', 'alpha');
// Example: commande, propal
$origin_id = \GETPOSTINT('origin_id') ? \GETPOSTINT('id') : '';
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$line_id = \GETPOSTINT('lineid') ? \GETPOSTINT('lineid') : 0;
$facid = \GETPOSTINT('facid');
$socid = \GETPOSTINT('socid');
$action = \GETPOST('action', 'alpha');
$confirm = \GETPOST('confirm', 'alpha');
$cancel = \GETPOST('cancel', 'alpha');
$backtopage = \GETPOST('backtopage', 'alpha');
$backtopageforcancel = \GETPOST('backtopageforcancel', 'alpha');
$contactid = \GETPOSTINT('contactid');
$projectid = \GETPOSTINT('projectid');
$cancel = \GETPOST('cancel', 'alpha');
$rank = \GETPOSTINT('rank') > 0 ? \GETPOSTINT('rank') : -1;
$lineid = \GETPOSTINT('lineid');
$backtopage = \GETPOST('backtopage', 'alpha');
//PDF
$hidedetails = \GETPOSTINT('hidedetails') ? \GETPOSTINT('hidedetails') : (\getDolGlobalString('MAIN_GENERATE_DOCUMENTS_HIDE_DETAILS') ? 1 : 0);
$hidedesc = \GETPOSTINT('hidedesc') ? \GETPOSTINT('hidedesc') : (\getDolGlobalString('MAIN_GENERATE_DOCUMENTS_HIDE_DESC') ? 1 : 0);
$hideref = \GETPOSTINT('hideref') ? \GETPOSTINT('hideref') : (\getDolGlobalString('MAIN_GENERATE_DOCUMENTS_HIDE_REF') ? 1 : 0);
$object = new \Reception($db);
$objectorder = new \CommandeFournisseur($db);
$extrafields = new \ExtraFields($db);
$date_delivery = \dol_mktime(\GETPOSTINT('date_deliveryhour'), \GETPOSTINT('date_deliverymin'), 0, \GETPOSTINT('date_deliverymonth'), \GETPOSTINT('date_deliveryday'), \GETPOSTINT('date_deliveryyear'));
$date_reception = \dol_mktime(\GETPOSTINT('date_receptionhour'), \GETPOSTINT('date_receptionmin'), 0, \GETPOSTINT('date_receptionmonth'), \GETPOSTINT('date_receptionday'), \GETPOSTINT('date_receptionyear'));
$result = \restrictedArea($user, 'reception', $object->id, '');
$permissiontoeditextra = $permissiontoadd;
$editColspan = 0;
$objectsrc = \null;
$typeobject = \null;
$ref_customer = \null;
$shipping_method_id = \null;
$warehouse_id = \null;
$note_public = \null;
$note_private = \null;
/*
 * Actions
 */
$error = 0;
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$backurlforlist = \DOL_URL_ROOT . '/reception/list.php';
$triggersendname = 'RECEPTION_SENTBYMAIL';
$paramname = 'id';
$mode = 'emailfromreception';
$autocopy = 'MAIN_MAIL_AUTOCOPY_RECEPTION_TO';
$trackid = 'rec' . $object->id;
/*
 * View
 */
$title = $object->ref . ' - ' . $langs->trans('Reception');
$form = new \Form($db);
$formfile = new \FormFile($db);
$formproduct = new \FormProduct($db);
$formproject = \null;
$product_static = new \Product($db);
$reception_static = new \Reception($db);
$warehousestatic = new \Entrepot($db);
$recept = new \Reception($db);
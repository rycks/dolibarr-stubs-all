<?php

// General $Variables
$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm', 'alpha');
$cancel = \GETPOST('cancel', 'alpha');
$backtopage = \GETPOST('backtopage', 'alpha');
// if not set, a default page will be used
$backtopageforcancel = \GETPOST('backtopageforcancel', 'alpha');
// if not set, $backtopage will be used
$id = \GETPOSTINT('id') ? \GETPOSTINT('id') : \GETPOSTINT('facid');
// For backward compatibility
$ref = \GETPOST('ref', 'alpha');
$socid = \GETPOSTINT('socid');
$lineid = \GETPOSTINT('lineid');
$origin = \GETPOST('origin', 'alpha');
$originid = \GETPOSTINT('originid') ? \GETPOSTINT('originid') : \GETPOSTINT('origin_id');
// For backward compatibility
$fac_rec = \GETPOSTINT('fac_rec');
$facid = \GETPOSTINT('facid');
$ref_client = \GETPOST('ref_client', 'alpha');
$inputReasonId = \GETPOSTINT('input_reason_id');
$rank = \GETPOSTINT('rank') > 0 ? \GETPOSTINT('rank') : -1;
$projectid = \GETPOSTINT('projectid') ? \GETPOSTINT('projectid') : 0;
$selectedLines = \GETPOST('toselect', 'array:int');
// PDF
$hidedetails = \GETPOSTINT('hidedetails') ? \GETPOSTINT('hidedetails') : (\getDolGlobalString('MAIN_GENERATE_DOCUMENTS_HIDE_DETAILS') ? 1 : 0);
$hidedesc = \GETPOSTINT('hidedesc') ? \GETPOSTINT('hidedesc') : (\getDolGlobalString('MAIN_GENERATE_DOCUMENTS_HIDE_DESC') ? 1 : 0);
$hideref = \GETPOSTINT('hideref') ? \GETPOSTINT('hideref') : (\getDolGlobalString('MAIN_GENERATE_DOCUMENTS_HIDE_REF') ? 1 : 0);
// Number of lines for predefined product/service choices
$NBLINES = 4;
$object = new \Facture($db);
$extrafields = new \ExtraFields($db);
$objectidnext = 0;
$total_global_ttc = 0;
$displayWarranty = \false;
$statusreplacement = 0;
$type_fac = 0;
$price_base_type = '';
$array_options = array();
// Permissions
$usercanread = $user->hasRight("facture", "lire");
$usercancreate = $user->hasRight("facture", "creer");
$usercanissuepayment = $user->hasRight("facture", "paiement");
$usercandelete = $user->hasRight("facture", "supprimer") || $usercancreate && isset($object->status) && $object->status == $object::STATUS_DRAFT;
$usercancreatecontract = $user->hasRight("contrat", "creer");
// Advanced Permissions
$usercanvalidate = !\getDolGlobalString('MAIN_USE_ADVANCED_PERMS') && $usercancreate || \getDolGlobalString('MAIN_USE_ADVANCED_PERMS') && $user->hasRight('facture', 'invoice_advance', 'validate');
$usercansend = !\getDolGlobalString('MAIN_USE_ADVANCED_PERMS') && $usercanread || \getDolGlobalString('MAIN_USE_ADVANCED_PERMS') && $user->hasRight('facture', 'invoice_advance', 'send');
$usercanreopen = !\getDolGlobalString('MAIN_USE_ADVANCED_PERMS') && $usercancreate || \getDolGlobalString('MAIN_USE_ADVANCED_PERMS') && $user->hasRight('facture', 'invoice_advance', 'reopen');
$usercanunvalidate = !\getDolGlobalString('MAIN_USE_ADVANCED_PERMS') && !empty($usercancreate) || \getDolGlobalString('MAIN_USE_ADVANCED_PERMS') && $user->hasRight('facture', 'invoice_advance', 'unvalidate');
$usermustrespectpricemin = \getDolGlobalString('MAIN_USE_ADVANCED_PERMS') && !$user->hasRight('produit', 'ignore_price_min_advance') || !\getDolGlobalString('MAIN_USE_ADVANCED_PERMS');
// Other permissions
$usercancreatemargin = $user->hasRight('margins', 'creer');
$usercanreadallmargin = $user->hasRight('margins', 'liretous');
$usercancreatewithdrarequest = $user->hasRight('prelevement', 'bons', 'creer');
$permissionnote = $usercancreate;
// Used by the include of actions_setnotes.inc.php
$permissiondellink = $usercancreate;
// Used by the include of actions_dellink.inc.php
$permissiontoedit = $usercancreate;
// Used by the include of actions_lineupdonw.inc.php
$permissiontoadd = $usercancreate;
// Used by the include of actions_addupdatedelete.inc.php
$permissiontoeditextra = $usercancreate;
// retained warranty invoice available type
$retainedWarrantyInvoiceAvailableType = array();
$isdraft = $object->status == \Facture::STATUS_DRAFT ? 1 : 0;
$result = \restrictedArea($user, 'facture', $object->id, '', '', 'fk_soc', 'rowid', $isdraft);
/*
 * Actions
 */
$error = 0;
$parameters = array('socid' => $socid);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$backurlforlist = \DOL_URL_ROOT . '/compta/facture/list.php';
$triggersendname = 'BILL_SENTBYMAIL';
$paramname = 'id';
$autocopy = 'MAIN_MAIL_AUTOCOPY_INVOICE_TO';
$trackid = 'inv' . $object->id;
// Actions to build doc
$upload_dir = $conf->invoice->multidir_output[!empty($object->entity) ? $object->entity : $conf->entity];
$permissiontoadd = $usercancreate;
/*
 * View
 */
$form = new \Form($db);
$formother = new \FormOther($db);
$formfile = new \FormFile($db);
$formmargin = new \FormMargin($db);
$soc = new \Societe($db);
$paymentstatic = new \Paiement($db);
$bankaccountstatic = new \Account($db);
$formproject = \null;
$now = \dol_now();
$title = $object->ref . " - " . $langs->trans('Card');
$help_url = "EN:Customers_Invoices|FR:Factures_Clients|ES:Facturas_a_clientes";
$facturestatic = new \Facture($db);
$currency_code = $conf->currency;
$cond_reglement_id = \GETPOSTINT('cond_reglement_id');
$mode_reglement_id = \GETPOSTINT('mode_reglement_id');
$fk_account = \GETPOSTINT('fk_account');
$dateinvoice = \dol_mktime(0, 0, 0, \GETPOSTINT('remonth'), \GETPOSTINT('reday'), \GETPOSTINT('reyear'), 'tzserver');
// Load objectsrc
$objectsrc = \null;
$note_public = $object->getDefaultCreateValueFor('note_public', !empty($origin) && !empty($originid) && \is_object($objectsrc) && \getDolGlobalString('FACTURE_REUSE_NOTES_ON_CREATE_FROM') ? $objectsrc->note_public : \null);
$note_private = $object->getDefaultCreateValueFor('note_private', !empty($origin) && !empty($originid) && \is_object($objectsrc) && \getDolGlobalString('FACTURE_REUSE_NOTES_ON_CREATE_FROM') ? $objectsrc->note_private : \null);
// Call Hook tabContentCreateInvoice
$parameters = array();
// Note that $action and $object may be modified by hook
$reshook = $hookmanager->executeHooks('tabContentCreateInvoice', $parameters, $object, $action);
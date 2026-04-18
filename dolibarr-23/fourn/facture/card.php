<?php

$id = \GETPOSTINT('facid') ? \GETPOSTINT('facid') : \GETPOSTINT('id');
$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST("confirm");
$ref = \GETPOST('ref', 'alpha');
$cancel = \GETPOST('cancel', 'alpha');
$backtopage = \GETPOST('backtopage', 'alpha');
$backtopageforcancel = '';
$lineid = \GETPOSTINT('lineid');
$projectid = \GETPOSTINT('projectid');
$origin = \GETPOST('origin', 'alpha');
$originid = \GETPOSTINT('originid');
$fac_recid = \GETPOSTINT('fac_rec');
$rank = \GETPOSTINT('rank') > 0 ? \GETPOSTINT('rank') : -1;
// PDF
$hidedetails = \GETPOSTINT('hidedetails') ? \GETPOSTINT('hidedetails') : (\getDolGlobalString('MAIN_GENERATE_DOCUMENTS_HIDE_DETAILS') ? 1 : 0);
$hidedesc = \GETPOSTINT('hidedesc') ? \GETPOSTINT('hidedesc') : (\getDolGlobalString('MAIN_GENERATE_DOCUMENTS_HIDE_DESC') ? 1 : 0);
$hideref = \GETPOSTINT('hideref') ? \GETPOSTINT('hideref') : (\getDolGlobalString('MAIN_GENERATE_DOCUMENTS_HIDE_REF') ? 1 : 0);
$object = new \FactureFournisseur($db);
$extrafields = new \ExtraFields($db);
$ret = $object->fetch($id, $ref);
$ret = $object->fetch_thirdparty();
// Security check
$socid = \GETPOSTINT('socid');
$isdraft = $object->status == \FactureFournisseur::STATUS_DRAFT ? 1 : 0;
$result = \restrictedArea($user, 'fournisseur', $id, 'facture_fourn', 'facture', 'fk_soc', 'rowid', $isdraft);
// Common permissions
$usercanread = $user->hasRight("fournisseur", "facture", "lire") || $user->hasRight("supplier_invoice", "lire");
$usercancreate = $user->hasRight("fournisseur", "facture", "creer") || $user->hasRight("supplier_invoice", "creer");
$usercandelete = $user->hasRight("fournisseur", "facture", "supprimer") || $user->hasRight("supplier_invoice", "supprimer") || $usercancreate && $object->is_erasable() == 1;
$usercancreatecontract = $user->hasRight("contrat", "creer");
// Advanced permissions
$usercanvalidate = !\getDolGlobalString('MAIN_USE_ADVANCED_PERMS') && !empty($usercancreate) || \getDolGlobalString('MAIN_USE_ADVANCED_PERMS') && $user->hasRight("fournisseur", "supplier_invoice_advance", "validate");
$usercansend = !\getDolGlobalString('MAIN_USE_ADVANCED_PERMS') || $user->hasRight("fournisseur", "supplier_invoice_advance", "send");
$usercancreatecreditransfer = $user->hasRight('paymentbybanktransfer', 'create');
// Permissions for includes
$permissionnote = $usercancreate;
// Used by the include of actions_setnotes.inc.php
$permissiondellink = $usercancreate;
// Used by the include of actions_dellink.inc.php
$permissiontoedit = $usercancreate;
// Used by the include of actions_lineupdown.inc.php
$permissiontoadd = $usercancreate;
// Used by the include of actions_addupdatedelete.inc.php and actions_lineupdown.inc.php
$permissiontodelete = $usercandelete;
$permissiontoeditextra = $permissiontoadd;
$error = 0;
/*
 * Actions
 */
$parameters = array('socid' => $socid);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$backurlforlist = \DOL_URL_ROOT . '/fourn/facture/list.php';
// Actions to send emails
$triggersendname = 'BILL_SUPPLIER_SENTBYMAIL';
$paramname = 'id';
$autocopy = 'MAIN_MAIL_AUTOCOPY_SUPPLIER_INVOICE_TO';
$trackid = 'sinv' . $object->id;
// Actions to build doc
$upload_dir = $conf->fournisseur->facture->dir_output;
$permissiontoadd = $usercancreate;
/*
 * View
 */
$form = new \Form($db);
$formfile = new \FormFile($db);
$bankaccountstatic = new \Account($db);
$paymentstatic = new \PaiementFourn($db);
$now = \dol_now();
$title = $object->ref . " - " . $langs->trans('Card');
$help_url = 'EN:Module_Suppliers_Invoices|FR:Module_Fournisseurs_Factures|ES:Módulo_Facturas_de_proveedores|DE:Modul_Lieferantenrechnungen';
$facturestatic = new \FactureFournisseur($db);
$selectedLines = array();
$currency_code = $conf->currency;
$vat_reverse_charge = 0;
$societe = '';
$objectsrc = \null;
$note_public = $object->getDefaultCreateValueFor('note_public', !empty($origin) && !empty($originid) && \is_object($objectsrc) && \getDolGlobalString('FACTUREFOURN_REUSE_NOTES_ON_CREATE_FROM') ? $objectsrc->note_public : \null);
$note_private = $object->getDefaultCreateValueFor('note_private', !empty($origin) && !empty($originid) && \is_object($objectsrc) && \getDolGlobalString('FACTUREFOURN_REUSE_NOTES_ON_CREATE_FROM') ? $objectsrc->note_private : \null);
// Call Hook tabContentCreateSupplierInvoice
$parameters = array();
// Note that $action and $object may be modified by hook
$reshook = $hookmanager->executeHooks('tabContentCreateSupplierInvoice', $parameters, $object, $action);
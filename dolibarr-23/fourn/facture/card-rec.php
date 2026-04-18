<?php

$action = \GETPOST('action', 'alpha');
$massaction = \GETPOST('massaction', 'alpha');
$show_files = \GETPOSTINT('show_files');
$confirm = \GETPOST('confirm', 'alpha');
$cancel = \GETPOST('cancel', 'alpha');
$toselect = \GETPOST('toselect', 'array:int');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'supplierinvoicetemplatelist';
// To manage different context of search
$backtopage = \GETPOST('backtopage', 'alpha');
// if not set, a default page will be used
$backtopageforcancel = \GETPOST('backtopageforcancel', 'alpha');
// if not set, $backtopage will be used
$id = \GETPOSTINT('facid') ? \GETPOSTINT('facid') : \GETPOSTINT('id');
$lineid = \GETPOSTINT('lineid');
$ref = \GETPOST('title', 'alphanohtml') ? \GETPOST('title', 'alphanohtml') : \GETPOST('ref', 'alphanohtml');
$label = \GETPOST('label', 'alphanohtml');
$ref_supplier = \GETPOST('ref_supplier', 'alphanohtml');
$projectid = \GETPOSTINT('projectid');
$year_date_when = \GETPOST('year_date_when');
$month_date_when = \GETPOST('month_date_when');
// Security check
$socid = \GETPOSTINT('socid');
$objecttype = 'facture_fourn_rec';
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST("sortfield", 'aZ09comma');
$sortorder = \GETPOST("sortorder", 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
// If $page is not defined, or '' or -1
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$object = new \FactureFournisseurRec($db);
$ret = $object->fetch($id, $ref);
$extrafields = new \ExtraFields($db);
$search_array_options = $extrafields->getOptionalsFromPost($object->table_element, '', 'search_');
$permissionnote = $user->hasRight("fournisseur", "facture", "creer") || $user->hasRight("supplier_invoice", "creer");
// Used by the include of actions_setnotes.inc.php
$permissiondellink = $user->hasRight("fournisseur", "facture", "creer") || $user->hasRight("supplier_invoice", "creer");
// Used by the include of actions_dellink.inc.php
$permissiontoedit = $user->hasRight("fournisseur", "facture", "creer") || $user->hasRight("supplier_invoice", "creer");
// Used by the include of actions_lineupdonw.inc.php
$permissiontoadd = $user->hasRight("fournisseur", "facture", "creer") || $user->hasRight("supplier_invoice", "creer");
$permissiontodelete = $user->hasRight("fournisseur", "facture", "supprimer") || $user->hasRight("supplier_invoice", "supprimer");
$permissiontoeditextra = $permissiontoadd;
$usercanread = $user->hasRight("fournisseur", "facture", "lire") || $user->hasRight("supplier_invoice", "lire");
$usercancreate = $user->hasRight("fournisseur", "facture", "creer") || $user->hasRight("supplier_invoice", "creer");
$usercandelete = $user->hasRight("fournisseur", "facture", "supprimer") || $user->hasRight("supplier_invoice", "supprimer");
$usercanvalidate = !\getDolGlobalString('MAIN_USE_ADVANCED_PERMS') && !empty($usercancreate) || \getDolGlobalString('MAIN_USE_ADVANCED_PERMS') && $user->hasRight("fournisseur", "supplier_invoice_advance", "validate");
$usercansend = !\getDolGlobalString('MAIN_USE_ADVANCED_PERMS') || $user->hasRight("fournisseur", "supplier_invoice_advance", "send");
$usercanproductignorepricemin = \getDolGlobalString('MAIN_USE_ADVANCED_PERMS') && !$user->hasRight("produit", "ignore_price_min_advance") || !\getDolGlobalString('MAIN_USE_ADVANCED_PERMS');
$usercancreatemargin = $user->hasRight("margins", "creer");
$usercanreadallmargin = $user->hasRight("margins", "liretous");
$usercancreatewithdrarequest = $user->hasRight("prelevement", "bons", "creer");
$now = \dol_now();
$error = 0;
$predef = '';
// Legacy?  Used in several cards, always ''
// Security check
$result = \restrictedArea($user, 'supplier_invoicerec', $object->id, $objecttype);
$parameters = array('socid' => $socid);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 * View
 */
$title = $langs->trans("RepeatableSupplierInvoice");
$help_url = '';
$form = new \Form($db);
$formother = new \FormOther($db);
$companystatic = new \Societe($db);
$invoicerectmp = new \FactureFournisseurRec($db);
$now = \dol_now();
$nowlasthour = \dol_get_last_hour($now);
$object = new \FactureFournisseur($db);
// Source invoice
$product_static = new \Product($db);
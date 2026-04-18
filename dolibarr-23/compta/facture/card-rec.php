<?php

$action = \GETPOST('action', 'aZ09');
$massaction = \GETPOST('massaction', 'alpha');
$show_files = \GETPOSTINT('show_files');
$confirm = \GETPOST('confirm', 'alpha');
$cancel = \GETPOST('cancel', 'alpha');
$toselect = \GETPOST('toselect', 'array:int');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'invoicetemplatelist';
// To manage different context of search
$backtopage = \GETPOST('backtopage', 'alpha');
// if not set, a default page will be used
$backtopageforcancel = \GETPOST('backtopageforcancel', 'alpha');
// if not set, $backtopage will be used
$id = \GETPOSTINT('facid') ? \GETPOSTINT('facid') : \GETPOSTINT('id');
$lineid = \GETPOSTINT('lineid');
$ref = \GETPOST('ref', 'alpha');
$socid = 0;
$objecttype = 'facture_rec';
$projectid = \GETPOSTINT('projectid');
$year_date_when = \GETPOST('year_date_when');
$month_date_when = \GETPOST('month_date_when');
$selectedLines = \GETPOST('toselect', 'array:int');
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
// If $page is not defined, or '' or -1
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$object = new \FactureRec($db);
$ret = $object->fetch($id, $ref);
$extrafields = new \ExtraFields($db);
$search_array_options = $extrafields->getOptionalsFromPost($object->table_element, '', 'search_');
$permissiontoadd = $user->hasRight('facture', 'creer');
$permissionnote = $user->hasRight('facture', 'creer');
// Used by the include of actions_setnotes.inc.php
$permissiondellink = $user->hasRight('facture', 'creer');
// Used by the include of actions_dellink.inc.php
$permissiontoedit = $user->hasRight('facture', 'creer');
// Used by the include of actions_lineupdonw.inc.php
$permissiontoeditextra = $permissiontoadd;
$usercanread = $user->hasRight('facture', 'lire');
$usercancreate = $user->hasRight('facture', 'creer');
$usercanissuepayment = $user->hasRight('facture', 'paiement');
$usercandelete = $user->hasRight('facture', 'supprimer');
// Advanced permissions
$usercanvalidate = !\getDolGlobalString('MAIN_USE_ADVANCED_PERMS') && $usercancreate || \getDolGlobalString('MAIN_USE_ADVANCED_PERMS') && $user->hasRight('facture', 'invoice_advance', 'validate');
$usercansend = !\getDolGlobalString('MAIN_USE_ADVANCED_PERMS') || $user->hasRight('facture', 'invoice_advance', 'send');
$usercanreopen = !\getDolGlobalString('MAIN_USE_ADVANCED_PERMS') || $user->hasRight('facture', 'invoice_advance', 'reopen');
$usercanunvalidate = !\getDolGlobalString('MAIN_USE_ADVANCED_PERMS') && !empty($usercancreate) || \getDolGlobalString('MAIN_USE_ADVANCED_PERMS') && $user->hasRight('facture', 'invoice_advance', 'unvalidate');
$usermustrespectpricemin = \getDolGlobalString('MAIN_USE_ADVANCED_PERMS') && !$user->hasRight('produit', 'ignore_price_min_advance') || !\getDolGlobalString('MAIN_USE_ADVANCED_PERMS');
// Other permissions
$usercanproductignorepricemin = \getDolGlobalString('MAIN_USE_ADVANCED_PERMS') && !$user->hasRight('produit', 'ignore_price_min_advance') || !\getDolGlobalString('MAIN_USE_ADVANCED_PERMS');
$usercancreatemargin = $user->hasRight("margins", "creer");
$usercanreadallmargin = $user->hasRight("margins", "liretous");
$usercancreatewithdrarequest = $user->hasRight("prelevement", "bons", "creer");
$now = \dol_now();
$error = 0;
// Security check
$result = \restrictedArea($user, 'facture', $object->id, $objecttype);
$parameters = array('socid' => $socid);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$backurlforlist = \DOL_URL_ROOT . '/compta/facture/invoicetemplate_list.php';
/*
 *	View
 */
$title = $object->ref . " - " . $langs->trans('Card');
$help_url = '';
$form = new \Form($db);
$formother = new \FormOther($db);
$companystatic = new \Societe($db);
$invoicerectmp = new \FactureRec($db);
$now = \dol_now();
$nowlasthour = \dol_get_last_hour($now);
$sourceInvoice = new \Facture($db);
// Source invoice
$factureRec = new \FactureRec($db);
$product_static = new \Product($db);
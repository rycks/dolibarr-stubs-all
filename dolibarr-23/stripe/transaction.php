<?php

// Security check
$socid = \GETPOSTINT("socid");
//restrictedArea($user, 'salaries', '', '', '');
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$rowid = \GETPOST("rowid", 'alpha');
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
// If $page is not defined, or '' or -1
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$optioncss = \GETPOST('optioncss', 'alpha');
$param = "";
$num = 0;
$totalnboflines = 0;
$result = \restrictedArea($user, 'banque');
/*
 * View
 */
$stripe = new \Stripe($db);
$stripeacc = $stripe->getStripeAccount($service);
$title = $langs->trans("StripeTransactionList");
$moreforfilter = '';
$connect = "";
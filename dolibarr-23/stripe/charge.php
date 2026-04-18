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
$result = \restrictedArea($user, 'banque');
$optioncss = \GETPOST('optioncss', 'alpha');
/*
 * View
 */
$form = new \Form($db);
$societestatic = new \Societe($db);
$memberstatic = new \Adherent($db);
$acc = new \Account($db);
$stripe = new \Stripe($db);
$stripeacc = $stripe->getStripeAccount($service);
$option = array('limit' => $limit + 1);
$num = 0;
$param = '';
$totalnboflines = '';
$moreforfilter = '';
$list = \null;
$title = $langs->trans("StripeChargeList");
//print $list;
$i = 0;
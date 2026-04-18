<?php

$year = \GETPOSTINT("year");
$search_sc_type = \GETPOST('search_sc_type', 'intcomma');
$optioncss = \GETPOST('optioncss', 'alpha');
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
// If $page is not defined, or '' or -1
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$result = \restrictedArea($user, 'tax', '', 'chargesociales', 'charges');
/*
 * View
 */
$tva_static = new \Tva($db);
$socialcontrib = new \ChargeSociales($db);
$payment_sc_static = new \PaymentSocialContribution($db);
$userstatic = new \User($db);
$sal_static = new \Salary($db);
$accountstatic = new \Account($db);
$accountlinestatic = new \AccountLine($db);
$formsocialcontrib = new \FormSocialContrib($db);
$title = $langs->trans("SocialContributionsPayments");
$help_url = '';
$param = '';
$num = 0;
$sql = "SELECT c.id, c.libelle as type_label,";
// Count total nb of records
$nbtotalofrecords = '';
$resql = \null;
$resql = $db->query($sql);
$nbtotalofrecords = $db->num_rows($resql);
//$sql.= $db->plimit($limit+1,$offset);
//print $sql;
$nav = '';
$searchpicto = $form->showFilterButtons();
$i = 0;
$total = 0;
$totalnb = 0;
$totalpaid = 0;
$parameters = array('user' => $user);
$reshook = $hookmanager->executeHooks('dashboardSpecialBills', $parameters, $object);
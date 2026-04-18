<?php

/**
 * @var Conf $conf
 * @var DoliDB $db
 * @var HookManager $hookmanager
 * @var Societe $mysoc
 * @var Translate $langs
 * @var User $user
 */
$hookmanager = new \HookManager($db);
$result = \restrictedArea($user, 'tax|salaries', '', '', 'charges|');
$mode = \GETPOST("mode", 'alpha');
$year = \GETPOSTINT("year");
$filtre = \GETPOST("filtre", 'alpha');
$optioncss = \GETPOST('optioncss', 'aZ');
// Option for the css output (always '' except when 'print')
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
// If $page is not defined, or '' or -1
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
/*
 * View
 */
$tva_static = new \Tva($db);
$ptva_static = new \PaymentVAT($db);
$socialcontrib = new \ChargeSociales($db);
$payment_sc_static = new \PaymentSocialContribution($db);
$sal_static = new \Salary($db);
$accountstatic = new \Account($db);
$title = $langs->trans("SpecialExpensesArea");
$param = '';
$totalnboflines = '';
$num = 0;
$nav = $year ? '<a href="index.php?year=' . ($year - 1) . $param . '">' . \img_previous($langs->trans("Previous"), 'class="valignbottom"') . "</a> " . $langs->trans("Year") . ' ' . $year . ' <a href="index.php?year=' . ($year + 1) . $param . '">' . \img_next($langs->trans("Next"), 'class="valignbottom"') . "</a>" : "";
$sql = "SELECT c.id, c.libelle as type_label,";
$resql = $db->query($sql);
$sql = "SELECT ptva.rowid, pv.rowid as id_tva, pv.amount as amount_tva, ptva.amount, pv.label, pv.datev as dm, ptva.datep as date_payment, ptva.fk_bank, ptva.num_paiement as num_payment,";
$result = $db->query($sql);
$parameters = array('user' => $user);
$reshook = $hookmanager->executeHooks('dashboardSpecialBills', $parameters, $object);
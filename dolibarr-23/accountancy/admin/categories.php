<?php

/**
 * @var Conf $conf
 * @var DoliDB $db
 * @var HookManager $hookmanager
 * @var Translate $langs
 * @var User $user
 */
$error = 0;
$id = \GETPOSTINT('id');
$cancel = \GETPOST('cancel', 'alpha');
$action = \GETPOST('action', 'aZ09');
$cat_id = \GETPOSTINT('account_category');
$selectcpt = \GETPOST('cpt_bk', 'array');
$cpt_id = \GETPOSTINT('cptid');
// Load variable for pagination
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$accountingcategory = new \AccountancyCategory($db);
$cpts = array();
$return = $accountingcategory->updateAccAcc((int) $cat_id, $cpts);
/*
 * View
 */
$form = new \Form($db);
$formaccounting = new \FormAccounting($db);
$title = $langs->trans('AccountingCategory');
$help_url = 'EN:Module_Double_Entry_Accounting#Setup|FR:Module_Comptabilit&eacute;_en_Partie_Double#Configuration';
$linkback = '<a href="' . \DOL_URL_ROOT . '/accountancy/admin/categories_list.php?restore_lastsearch_values=1">' . $langs->trans("BackToList") . '</a>';
$titlepicto = 'setup';
$s = $formaccounting->select_accounting_category((int) $cat_id, 'account_category', 1, 0, 0, 0);
$return = $accountingcategory->getAccountsWithNoCategory($cat_id);
$arraykeyvalue = array();
$param = 'account_category=' . (int) $cat_id;
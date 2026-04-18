<?php

$action = \GETPOST('action', 'aZ09');
$cancel = \GETPOST('cancel', 'alpha');
$massaction = \GETPOST('massaction', 'aZ09');
$optioncss = \GETPOST('optioncss', 'alpha');
$mode = \GETPOST('mode', 'aZ');
// The output mode ('list', 'kanban', 'hierarchy', 'calendar', ...)
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : \str_replace('_', '', \basename(\dirname(__FILE__)) . \basename(__FILE__, '.php'));
// To manage different context of search
$id = \GETPOSTINT('id');
$rowid = \GETPOSTINT('rowid');
$search_subaccount = \GETPOST('search_subaccount', 'alpha');
$search_label = \GETPOST('search_label', 'alpha');
$search_type = \GETPOST('search_type', 'intcomma');
// Load variable for pagination
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT('page');
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$arrayfields = array('subaccount' => array('label' => $langs->trans("AccountNumber"), 'checked' => '1'), 'label' => array('label' => $langs->trans("Label"), 'checked' => '1'), 'type' => array('label' => $langs->trans("Type"), 'checked' => '1'), 'reconcilable' => array('label' => $langs->trans("Reconcilable"), 'checked' => '1'));
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 * View
 */
$form = new \Form($db);
// Page Header
$help_url = 'EN:Module_Double_Entry_Accounting#Setup|FR:Module_Comptabilit&eacute;_en_Partie_Double#Configuration';
$title = $langs->trans('ChartOfIndividualAccountsOfSubsidiaryLedger');
// Customer
$sql = "SELECT sa.rowid, sa.nom as label, sa.code_compta as subaccount, '1' as type, sa.entity, sa.client as nature, sa.fournisseur as nature2";
$lengthpaddingaccount = 0;
$search_subaccount_tmp = $search_subaccount;
$weremovedsomezero = 0;
$lengthpaddingaccount = 0;
$search_subaccount_tmp = $search_subaccount;
$weremovedsomezero = 0;
$lengthpaddingaccount = 0;
$search_subaccount_tmp = $search_subaccount;
$weremovedsomezero = 0;
// Count total nb of records
$nbtotalofrecords = '';
$resql = $db->query($sql);
$nbtotalofrecords = $db->num_rows($resql);
$resql = $db->query($sql);
$num = $db->num_rows($resql);
$param = '';
// List of mass actions available
$arrayofmassactions = array();
$varpage = empty($contextpage) ? $_SERVER["PHP_SELF"] : $contextpage;
$htmlofselectarray = $form->multiSelectArrayWithCheckbox('selectedfields', $arrayfields, $varpage, \getDolGlobalString('MAIN_CHECKBOX_LEFT_COLUMN'));
// This also change content of $arrayfields with user setup
$selectedfields = $mode != 'kanban' ? $htmlofselectarray : '';
$moreforfilter = '';
$massactionbutton = '';
$companystatic = new \Societe($db);
$totalarray = array();
$i = 0;
$parameters = array('arrayfields' => $arrayfields, 'sql' => $sql);
$reshook = $hookmanager->executeHooks('printFieldListFooter', $parameters);
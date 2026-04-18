<?php

$action = \GETPOST('action', 'aZ09') ? \GETPOST('action', 'aZ09') : 'view';
$massaction = \GETPOST('massaction', 'alpha');
$contextpage = \GETPOST('contextpage', 'aZ');
$optioncss = \GETPOST('optioncss', 'aZ');
$id = \GETPOSTINT('id');
$search_ref = \GETPOST('search_ref', 'alphanohtml');
$search_employee = \GETPOST('search_employee', "intcomma");
$search_type = \GETPOST('search_type', "intcomma");
$search_description = \GETPOST('search_description', 'alphanohtml');
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
$arrayfields = array();
$arrayofmassactions = array();
$result = \restrictedArea($user, 'holiday', $id);
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$arrayfields = array('cp.ref' => array('label' => 'Ref', 'checked' => '1', 'position' => 5), 'cp.fk_type' => array('label' => 'Type', 'checked' => '1', 'position' => 10), 'cp.fk_user' => array('label' => 'Employee', 'checked' => '1', 'position' => 20), 'cp.date_debut' => array('label' => 'DateDebCP', 'checked' => '-1', 'position' => 30), 'cp.date_fin' => array('label' => 'DateFinCP', 'checked' => '-1', 'position' => 32), 'used_days' => array('label' => 'NbUseDaysCPShort', 'checked' => '-1', 'position' => 34), 'date_start_month' => array('label' => 'DateStartInMonth', 'checked' => '1', 'position' => 50), 'date_end_month' => array('label' => 'DateEndInMonth', 'checked' => '1', 'position' => 52), 'used_days_month' => array('label' => 'NbUseDaysCPShortInMonth', 'checked' => '1', 'position' => 54), 'cp.description' => array('label' => 'DescCP', 'checked' => '-1', 'position' => 800));
/*
 * View
 */
$form = new \Form($db);
$formother = new \FormOther($db);
$holidaystatic = new \Holiday($db);
$listhalfday = array('morning' => $langs->trans("Morning"), "afternoon" => $langs->trans("Afternoon"));
$title = $langs->trans('CPTitreMenu');
$help_url = 'EN:Module_Holiday';
$search_month = \GETPOSTINT("search_month") ? \GETPOSTINT("search_month") : (int) \dol_print_date(\dol_now(), "%m");
$search_year = \GETPOSTINT("search_year") ? \GETPOSTINT("search_year") : (int) \dol_print_date(\dol_now(), "%Y");
$year_month = \sprintf("%04d", $search_year) . '-' . \sprintf("%02d", $search_month);
$sql = "SELECT cp.rowid, cp.ref, cp.fk_user, cp.date_debut, cp.date_fin, cp.fk_type, cp.description, cp.halfday, cp.statut as status";
$resql = $db->query($sql);
$num = $db->num_rows($resql);
$param = '';
//$moreforfilter = '';
$varpage = empty($contextpage) ? $_SERVER["PHP_SELF"] : $contextpage;
$selectedfields = $form->multiSelectArrayWithCheckbox('selectedfields', $arrayfields, $varpage, \getDolGlobalString('MAIN_CHECKBOX_LEFT_COLUMN'));
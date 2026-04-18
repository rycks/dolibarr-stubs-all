<?php

$action = \GETPOST('action', 'aZ09');
$massaction = \GETPOST('massaction', 'alpha');
$confirm = \GETPOST('confirm', 'alpha');
$toselect = \GETPOST('toselect', 'array:int');
// Array of ids of elements selected into a list
$optioncss = \GETPOST('optioncss', 'alpha');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'sclist';
$mode = \GETPOST('mode', 'alpha');
$search_ref = \GETPOST('search_ref', 'alpha');
$search_label = \GETPOST('search_label', 'alpha');
$search_typeid = \GETPOST('search_typeid', 'int');
$search_amount = \GETPOST('search_amount', 'alpha');
$search_status = \GETPOST('search_status', 'intcomma');
$search_date_startday = \GETPOSTINT('search_date_startday');
$search_date_startmonth = \GETPOSTINT('search_date_startmonth');
$search_date_startyear = \GETPOSTINT('search_date_startyear');
$search_date_endday = \GETPOSTINT('search_date_endday');
$search_date_endmonth = \GETPOSTINT('search_date_endmonth');
$search_date_endyear = \GETPOSTINT('search_date_endyear');
$search_date_start = \dol_mktime(0, 0, 0, $search_date_startmonth, $search_date_startday, $search_date_startyear);
// Use tzserver
$search_date_end = \dol_mktime(23, 59, 59, $search_date_endmonth, $search_date_endday, $search_date_endyear);
$search_date_limit_startday = \GETPOSTINT('search_date_limit_startday');
$search_date_limit_startmonth = \GETPOSTINT('search_date_limit_startmonth');
$search_date_limit_startyear = \GETPOSTINT('search_date_limit_startyear');
$search_date_limit_endday = \GETPOSTINT('search_date_limit_endday');
$search_date_limit_endmonth = \GETPOSTINT('search_date_limit_endmonth');
$search_date_limit_endyear = \GETPOSTINT('search_date_limit_endyear');
$search_date_limit_start = \dol_mktime(0, 0, 0, $search_date_limit_startmonth, $search_date_limit_startday, $search_date_limit_startyear);
$search_date_limit_end = \dol_mktime(23, 59, 59, $search_date_limit_endmonth, $search_date_limit_endday, $search_date_limit_endyear);
$search_project_ref = \GETPOST('search_project_ref', 'alpha');
$search_users = \GETPOST('search_users', 'array:int');
$search_type = \GETPOST('search_type', 'alpha');
$search_account = \GETPOST('search_account', 'alpha');
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST("sortorder", 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$arrayfields = array('cs.rowid' => array('label' => "Ref", 'checked' => '1', 'position' => 10), 'cs.libelle' => array('label' => "Label", 'checked' => '1', 'position' => 20), 'cs.fk_type' => array('label' => "Type", 'checked' => '1', 'position' => 30), 'cs.date_ech' => array('label' => "Date", 'checked' => '1', 'position' => 40), 'cs.periode' => array('label' => "PeriodEndDate", 'checked' => '1', 'position' => 50), 'p.ref' => array('label' => "ProjectRef", 'checked' => '-1', 'position' => 60, 'enabled' => (string) (int) \isModEnabled('project')), 'cs.fk_user' => array('label' => "Employee", 'checked' => '1', 'position' => 70), 'cs.fk_mode_reglement' => array('checked' => '-1', 'position' => 80, 'label' => "DefaultPaymentMode"), 'cs.amount' => array('label' => "Amount", 'checked' => '1', 'position' => 100), 'cs.paye' => array('label' => "Status", 'checked' => '1', 'position' => 110));
$arrayfields = \dol_sort_array($arrayfields, 'position');
$object = new \ChargeSociales($db);
$permissiontoadd = $user->hasRight('tax', 'charges', 'creer');
$permissiontodelete = $user->hasRight('tax', 'charges', 'supprimer');
// Security check
$socid = \GETPOSTINT("socid");
$result = \restrictedArea($user, 'tax', '', 'chargesociales', 'charges');
/*
 * Actions
 */
$parameters = array('socid' => $socid);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
// Mass actions
$objectclass = 'ChargeSociales';
$objectlabel = 'ChargeSociales';
$uploaddir = $conf->tax->dir_output;
/*
 *	View
 */
$form = new \Form($db);
$formother = new \FormOther($db);
$bankstatic = new \Account($db);
$formsocialcontrib = new \FormSocialContrib($db);
$chargesociale_static = new \ChargeSociales($db);
$projectstatic = new \Project($db);
$title = $langs->trans("SocialContributions");
$arrayofselected = \is_array($toselect) ? $toselect : array();
$sql = "SELECT cs.rowid, cs.fk_type as type, cs.fk_user,";
$sqlfields = $sql;
// Count total nb of records
$nbtotalofrecords = '';
/* The fast and low memory method to get and count full list converts the sql into a sql count */
$sqlforcount = \preg_replace('/^' . \preg_quote($sqlfields, '/') . '/', 'SELECT COUNT(DISTINCT cs.rowid) as nbtotalofrecords', $sql);
$sqlforcount = \preg_replace('/GROUP BY .*$/', '', $sqlforcount);
$resql = $db->query($sqlforcount);
$resql = $db->query($sql);
$num = $db->num_rows($resql);
$i = 0;
$param = '';
$url = \DOL_URL_ROOT . '/compta/sociales/card.php?action=create';
$newcardbutton = '';
// List of mass actions available
$arrayofmassactions = array();
$massactionbutton = $form->selectMassAction('', $arrayofmassactions);
$moreforfilter = '';
$varpage = empty($contextpage) ? $_SERVER["PHP_SELF"] : $contextpage;
$selectedfields = $form->multiSelectArrayWithCheckbox('selectedfields', $arrayfields, $varpage, \getDolGlobalString('MAIN_CHECKBOX_LEFT_COLUMN'));
$objecttmp = new \ChargeSociales($db);
$trackid = 'sc' . $object->id;
// Fields from hook
$parameters = array('arrayfields' => $arrayfields);
$reshook = $hookmanager->executeHooks('printFieldListOption', $parameters);
$totalarray = array();
// Hook fields
$parameters = array('arrayfields' => $arrayfields, 'param' => $param, 'sortfield' => $sortfield, 'sortorder' => $sortorder, 'totalarray' => &$totalarray);
$reshook = $hookmanager->executeHooks('printFieldListTitle', $parameters);
// Loop on record
// --------------------------------------------------------------------
$i = 0;
$savnbfield = $totalarray['nbfield'];
$totalarray = array();
$imaxinloop = $limit ? \min($num, $limit) : $num;
$TLoadedUsers = array();
$parameters = array('arrayfields' => $arrayfields, 'sql' => $sql);
$reshook = $hookmanager->executeHooks('printFieldListFooter', $parameters, $object);
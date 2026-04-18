<?php

// Get parameters
$massaction = \GETPOST('massaction', 'alpha');
$toselect = \GETPOST('toselect', 'array:int');
// Array of ids of elements selected into a list
$optioncss = \GETPOST('optioncss', 'aZ');
// Option for the css output (always '' except when 'print')
$mode = \GETPOST('mode', 'aZ');
// The output mode ('list', 'kanban', 'hierarchy', 'calendar', ...)
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : \str_replace('_', '', \basename(\dirname(__FILE__)) . \basename(__FILE__, '.php')) . $mode;
// To manage different context of search
// Load variable for pagination
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$search_name = \GETPOST("search_name", 'alpha');
$search_subprice = \GETPOST("search_subprice", 'alpha');
$search_qty = \GETPOST("search_qty", 'alpha');
$search_total_ht = \GETPOST("search_total_ht", 'alpha');
$search_total_tva = \GETPOST("search_total_tva", 'alpha');
$search_total_ttc = \GETPOST("search_total_ttc", 'alpha');
$search_contract = \GETPOST("search_contract", 'alpha');
$search_service = \GETPOST("search_service", 'alpha');
$search_status = \GETPOST("search_status", 'alpha');
$search_option = \GETPOST('search_option', 'alpha');
$search_product_category = \GETPOSTINT('search_product_category');
// To support selection into combo list of status with detailed status '4&filter'
$filter = '';
$socid = \GETPOSTINT('socid');
$opouvertureprevuemonth = \GETPOST('opouvertureprevuemonth');
$opouvertureprevueday = \GETPOST('opouvertureprevueday');
$opouvertureprevueyear = \GETPOST('opouvertureprevueyear');
$filter_opouvertureprevue = \GETPOST('filter_opouvertureprevue', 'alphawithlgt');
$op1month = \GETPOSTINT('op1month');
$op1day = \GETPOSTINT('op1day');
$op1year = \GETPOSTINT('op1year');
$filter_op1 = \GETPOST('filter_op1', 'alphawithlgt');
$op2month = \GETPOSTINT('op2month');
$op2day = \GETPOSTINT('op2day');
$op2year = \GETPOSTINT('op2year');
$filter_op2 = \GETPOST('filter_op2', 'alphawithlgt');
$opcloturemonth = \GETPOSTINT('opcloturemonth');
$opclotureday = \GETPOSTINT('opclotureday');
$opclotureyear = \GETPOSTINT('opclotureyear');
$filter_opcloture = \GETPOST('filter_opcloture', 'alphawithlgt');
// Initialize a technical object to manage hooks of page. Note that conf->hooks_modules contains an array of hook context
$object = new \ContratLigne($db);
$extrafields = new \ExtraFields($db);
$search_array_options = $extrafields->getOptionalsFromPost($object->table_element, '', 'search_');
// Security check
$contratid = \GETPOSTINT('id');
$result = \restrictedArea($user, 'contrat', $contratid);
$staticcontrat = new \Contrat($db);
$staticcontratligne = new \ContratLigne($db);
$companystatic = new \Societe($db);
$arrayfields = array(
    'c.ref' => array('label' => "Contract", 'checked' => '1', 'position' => 80),
    'p.description' => array('label' => "Service", 'checked' => '1', 'position' => 80),
    's.nom' => array('label' => "ThirdParty", 'checked' => '1', 'position' => 90),
    'cd.tva_tx' => array('label' => "VATRate", 'checked' => '-1', 'position' => 100),
    'cd.subprice' => array('label' => "PriceUHT", 'checked' => '-1', 'position' => 105),
    'cd.qty' => array('label' => "Qty", 'checked' => '1', 'position' => 108),
    'cd.total_ht' => array('label' => "TotalHT", 'checked' => '-1', 'position' => 109, 'isameasure' => 1),
    'cd.total_tva' => array('label' => "TotalVAT", 'checked' => '-1', 'position' => 110),
    'cd.date_ouverture_prevue' => array('label' => "DateStartPlannedShort", 'checked' => '1', 'position' => 150),
    'cd.date_ouverture' => array('label' => "DateStartRealShort", 'checked' => '1', 'position' => 160),
    'cd.date_fin_validite' => array('label' => "DateEndPlannedShort", 'checked' => '1', 'position' => 170),
    'cd.date_cloture' => array('label' => "DateEndRealShort", 'checked' => '1', 'position' => 180),
    //'cd.datec'=>array('label'=>$langs->trans("DateCreation"), 'checked'=>0, 'position'=>500),
    'cd.tms' => array('label' => "DateModificationShort", 'checked' => '0', 'position' => 500),
    'status' => array('label' => "Status", 'checked' => '1', 'position' => 1000),
);
$arrayfields = \dol_sort_array($arrayfields, 'position');
$permissiontoread = $user->hasRight('contrat', 'lire');
$permissiontoadd = $user->hasRight('contrat', 'creer');
$permissiontodelete = $user->hasRight('contrat', 'supprimer');
$result = \restrictedArea($user, 'contrat', 0);
$parameters = array('socid' => $socid);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 * View
 */
$form = new \Form($db);
$now = \dol_now();
$title = $langs->trans("ListOfServices");
$help_url = 'EN:Module_Contracts|FR:Module_Contrat|ES:Contratos_de_servicio';
// Build and execute select
// --------------------------------------------------------------------
$sql = "SELECT c.rowid as cid, c.ref, c.statut as cstatut, c.ref_customer, c.ref_supplier,";
// Add fields from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListSelect', $parameters, $object, $action);
$filter_dateouvertureprevue = '';
$filter_date1 = '';
$filter_date2 = '';
$filter_opcloture = '';
$filter_dateouvertureprevue_start = \dol_mktime(0, 0, 0, (int) $opouvertureprevuemonth, (int) $opouvertureprevueday, (int) $opouvertureprevueyear);
$filter_dateouvertureprevue_end = \dol_mktime(23, 59, 59, (int) $opouvertureprevuemonth, (int) $opouvertureprevueday, (int) $opouvertureprevueyear);
$filter_date1_start = \dol_mktime(0, 0, 0, (int) $op1month, (int) $op1day, (int) $op1year);
$filter_date1_end = \dol_mktime(23, 59, 59, (int) $op1month, (int) $op1day, (int) $op1year);
$filter_date2_start = \dol_mktime(0, 0, 0, (int) $op2month, (int) $op2day, (int) $op2year);
$filter_date2_end = \dol_mktime(23, 59, 59, (int) $op2month, (int) $op2day, (int) $op2year);
$filter_datecloture_start = \dol_mktime(0, 0, 0, (int) $opcloturemonth, (int) $opclotureday, (int) $opclotureyear);
$filter_datecloture_end = \dol_mktime(23, 59, 59, (int) $opcloturemonth, (int) $opclotureday, (int) $opclotureyear);
// Add where from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListWhere', $parameters, $object, $action);
// Count total nb of records
$nbtotalofrecords = '';
$result = $db->query($sql);
$nbtotalofrecords = $db->num_rows($result);
$resql = $db->query($sql);
$num = $db->num_rows($resql);
$arrayofselected = \is_array($toselect) ? $toselect : array();
$param = '';
// Add $param from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListSearchParam', $parameters, $object, $action);
// List of mass actions available
$arrayofmassactions = array();
//if ($user->hasRight('contrat', 'supprimer')) $arrayofmassactions['predelete'] = img_picto('', 'delete', 'class="pictofixedwidth"').$langs->trans("Delete");
//if (in_array($massaction, array('presend','predelete'))) $arrayofmassactions=array();
$massactionbutton = $form->selectMassAction('', $arrayofmassactions);
$newcardbutton = '';
$morefilter = '';
$moreforfilter = '';
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldPreListTitle', $parameters, $object, $action);
$varpage = empty($contextpage) ? $_SERVER["PHP_SELF"] : $contextpage;
$htmlofselectarray = $form->multiSelectArrayWithCheckbox('selectedfields', $arrayfields, $varpage, \getDolGlobalString('MAIN_CHECKBOX_LEFT_COLUMN'));
// This also change content of $arrayfields with user setup
$selectedfields = $mode != 'kanban' ? $htmlofselectarray : '';
// Fields from hook
$parameters = array('arrayfields' => $arrayfields);
$reshook = $hookmanager->executeHooks('printFieldListOption', $parameters, $object, $action);
$arrayofstatus = array('0' => $langs->trans("ServiceStatusInitial"), '4' => $langs->trans("ServiceStatusRunning"), '4&filter=notexpired' => $langs->trans("ServiceStatusNotLate"), '4&filter=expired' => $langs->trans("ServiceStatusLate"), '5' => $langs->trans("ServiceStatusClosed"));
$search_status_new = \GETPOST('search_status', 'alpha');
$totalarray = array();
// Hook fields
$parameters = array('arrayfields' => $arrayfields, 'param' => $param, 'sortfield' => $sortfield, 'sortorder' => $sortorder);
$reshook = $hookmanager->executeHooks('printFieldListTitle', $parameters, $object, $action);
// Loop on record
// --------------------------------------------------------------------
$contractstatic = new \Contrat($db);
$productstatic = new \Product($db);
$i = 0;
$savnbfield = $totalarray['nbfield'];
$totalarray = array('nbfield' => 0, 'val' => array('cd.qty' => 0, 'cd.total_ht' => 0, 'cd.total_tva' => 0));
$imaxinloop = $limit ? \min($num, $limit) : $num;
$parameters = array('arrayfields' => $arrayfields, 'sql' => $sql);
$reshook = $hookmanager->executeHooks('printFieldListFooter', $parameters, $object, $action);
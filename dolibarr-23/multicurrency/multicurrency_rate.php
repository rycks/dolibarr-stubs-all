<?php

// Get Parameters
$action = \GETPOST('action', 'alpha');
$massaction = \GETPOST('massaction', 'alpha');
$show_files = \GETPOSTINT('show_files');
$confirm = \GETPOST('confirm', 'alpha');
$toselect = \GETPOST('toselect', 'array:int');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : \str_replace('_', '', \basename(\dirname(__FILE__)) . \basename(__FILE__, '.php'));
// To manage different context of search
$optioncss = \GETPOST('optioncss', 'alpha');
$mode = \GETPOST('mode', 'aZ');
// The display mode ('list', 'kanban', 'hierarchy', 'calendar', 'gantt', ...)
// Load variable for pagination
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT('page');
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$id_rate_selected = \GETPOSTINT('id_rate');
$search_all = \trim(\GETPOST('search_all', 'alphanohtml'));
$search_date_sync = \dol_mktime(0, 0, 0, \GETPOSTINT('search_date_syncmonth'), \GETPOSTINT('search_date_syncday'), \GETPOSTINT('search_date_syncyear'));
$search_date_sync_end = \dol_mktime(0, 0, 0, \GETPOSTINT('search_date_sync_endmonth'), \GETPOSTINT('search_date_sync_endday'), \GETPOSTINT('search_date_sync_endyear'));
$search_rate = \GETPOST('search_rate', 'alpha');
$search_rate_indirect = \GETPOST('search_rate_indirect', 'alpha');
$search_code = \GETPOST('search_code', 'alpha');
$multicurrency_code = \GETPOST('multicurrency_code', 'alpha');
$dateinput = \dol_mktime(0, 0, 0, \GETPOSTINT('dateinputmonth'), \GETPOSTINT('dateinputday'), \GETPOSTINT('dateinputyear'));
$rateinput = (float) \price2num(\GETPOST('rateinput', 'alpha'));
$rateindirectinput = (float) \price2num(\GETPOST('rateinidirectinput', 'alpha'));
$type = '';
$texte = '';
$newcardbutton = '';
// Initialize technical objects
$object = new \CurrencyRate($db);
$form = new \Form($db);
$extrafields = new \ExtraFields($db);
// List of fields to search into when doing a "search in all"
$fieldstosearchall = array('cr.date_sync' => "date_sync", 'cr.rate' => "rate", 'cr.rate_indirect' => "rate_indirect", 'm.code' => "code");
// Definition of fields for lists
$arrayfields = array('cr.date_sync' => array('label' => 'Date', 'checked' => '1'), 'cr.rate' => array('label' => 'Rate', 'checked' => '1'), 'cr.rate_indirect' => array('label' => 'RateIndirect', 'checked' => '0', 'enabled' => !\getDolGlobalString('MULTICURRENCY_USE_RATE_INDIRECT') ? '0' : '1'), 'm.code' => array('label' => 'Code', 'checked' => '1'));
$arrayfields = \dol_sort_array($arrayfields, 'position');
$error = 0;
$currencyRate = new \CurrencyRate($db);
$result = $currencyRate->fetch($id_rate_selected);
$current_rate = new \CurrencyRate($db);
$current_rate = new \CurrencyRate($db);
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
// Mass actions
$objectclass = "CurrencyRate";
$uploaddir = $conf->multicurrency->multidir_output;
// define only because core/actions_massactions.inc.php want it
$permissiontoread = $user->admin;
$permissiontodelete = $user->admin;
/*
 * View
 */
$form = new \Form($db);
$title = $langs->trans("CurrencyRate");
$page_name = "MultiCurrencySetup";
$help_url = '';
// Subheader
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
// Configuration header
$head = \multicurrencyAdminPrepareHead();
$sql = 'SELECT cr.rowid, cr.date_sync, cr.rate, cr.rate_indirect, cr.entity, m.code, m.name';
// Add fields from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListSelect', $parameters);
// Add where from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListWhere', $parameters);
// Add fields from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldSelect', $parameters);
$nbtotalofrecords = '';
$result = $db->query($sql);
$resql = $db->query($sql);
$num = $db->num_rows($resql);
$arrayofselected = \is_array($toselect) ? $toselect : array();
$param = '';
$massactionbutton = $form->selectMassAction('', $arrayofmassactions);
$moreforfilter = '';
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldPreListTitle', $parameters, $object, $action);
$parameters = array('arrayfields' => &$arrayfields);
$varpage = empty($contextpage) ? $_SERVER["PHP_SELF"] : $contextpage;
$htmlofselectarray = $form->multiSelectArrayWithCheckbox('selectedfields', $arrayfields, $varpage, $conf->main_checkbox_left_column);
// This also change content of $arrayfields with user setup
$selectedfields = $mode != 'kanban' && $mode != 'kanbangroupby' ? $htmlofselectarray : '';
// Fields from hook
$parameters = array('arrayfields' => $arrayfields);
$reshook = $hookmanager->executeHooks('printFieldListOption', $parameters);
// Hook fields
$parameters = array('arrayfields' => $arrayfields, 'param' => $param, 'sortfield' => $sortfield, 'sortorder' => $sortorder);
$reshook = $hookmanager->executeHooks('printFieldListTitle', $parameters);
$i = 0;
$totalarray = array();
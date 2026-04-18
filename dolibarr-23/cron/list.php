<?php

$action = \GETPOST('action', 'aZ09');
$massaction = \GETPOST('massaction', 'alpha');
// The bulk action (combo box choice into lists)
$confirm = \GETPOST('confirm', 'alpha');
$toselect = \GETPOST('toselect', 'array:int');
// Array of ids of elements selected into a list
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'cronjoblist';
// To manage different context of search
$optioncss = \GETPOST('optioncss', 'alpha');
$mode = \GETPOST('mode', 'aZ09');
//Search criteria
$search_status = \GETPOST('search_status', 'intcomma');
$search_label = \GETPOST("search_label", 'alpha');
$search_module_name = \GETPOST("search_module_name", 'alpha');
$search_lastresult = \GETPOST("search_lastresult", "alphawithlgt");
$search_processing = \GETPOST("search_processing", 'int');
$securitykey = \GETPOST('securitykey', 'alpha');
$id = \GETPOSTINT('id');
// Load variable for pagination
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT('page');
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$outputdir = $conf->cron->dir_output;
// Initialize technical objects
$object = new \Cronjob($db);
$extrafields = new \ExtraFields($db);
$diroutputmassaction = $outputdir . '/temp/massgeneration/' . $user->id;
$search_array_options = $extrafields->getOptionalsFromPost($object->table_element, '', 'search_');
// List of fields to search into when doing a "search in all"
$fieldstosearchall = array();
// foreach ($object->fields as $key => $val) {
// 	if (!empty($val['searchall'])) {
// 		$fieldstosearchall['t.'.$key] = $val['label'];
// 	}
// }
// $parameters = array('fieldstosearchall'=>$fieldstosearchall);
// $reshook = $hookmanager->executeHooks('completeFieldsToSearchAll', $parameters, $object, $action); // Note that $action and $object may have been modified by some hooks
// if ($reshook > 0) {
// 	$fieldstosearchall = empty($hookmanager->resArray['fieldstosearchall']) ? array() : $hookmanager->resArray['fieldstosearchall'];
// } elseif ($reshook == 0) {
// 	$fieldstosearchall = array_merge($fieldstosearchall, empty($hookmanager->resArray['fieldstosearchall']) ? array() : $hookmanager->resArray['fieldstosearchall']);
// }
// Definition of array of fields for columns from ->fields
$tableprefix = 't';
$arrayfields = array();
$arrayfields = \dol_sort_array($arrayfields, 'position');
$permissiontoread = $user->hasRight('cron', 'read');
$permissiontoadd = $user->hasRight('cron', 'create') ? $user->hasRight('cron', 'create') : $user->hasRight('cron', 'write');
$permissiontodelete = $user->hasRight('cron', 'delete');
$permissiontoexecute = $user->hasRight('cron', 'execute');
// after this test $permissiontoread is always true and never can't be false
$error = 0;
$parameters = array('arrayfields' => &$arrayfields);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$filter = array();
// Mass actions
$objectclass = 'CronJob';
$objectlabel = 'CronJob';
$uploaddir = $conf->cron->dir_output;
/*
 * View
 */
$now = \dol_now();
$form = new \Form($db);
$cronjob = new \Cronjob($db);
$title = $langs->trans("CronList");
$TTestNotAllowed = array();
$sqlTest = 'SELECT rowid, test FROM ' . \MAIN_DB_PREFIX . 'cronjob';
$resultTest = $db->query($sqlTest);
// Build and execute select
// --------------------------------------------------------------------
$sql = "SELECT";
// Add where from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListWhere', $parameters, $object, $action);
// Count total nb of records
$nbtotalofrecords = '';
$sqlforcount = $sql;
$resql = $db->query($sqlforcount);
$resql = $db->query($sql);
$num = $db->num_rows($resql);
$arrayofselected = \is_array($toselect) ? $toselect : array();
$param = '';
$stringcurrentdate = $langs->trans("CurrentHour") . ': ' . \dol_print_date(\dol_now(), 'dayhour');
// List of mass actions available
$arrayofmassactions = array(
    //'presend'=>img_picto('', 'email', 'class="pictofixedwidth"').$langs->trans("SendByMail"),
    //'builddoc'=>img_picto('', 'pdf', 'class="pictofixedwidth"').$langs->trans("PDFMerge"),
    'enable' => \img_picto('', 'check', 'class="pictofixedwidth"') . $langs->trans("CronStatusActiveBtn"),
    'disable' => \img_picto('', 'uncheck', 'class="pictofixedwidth"') . $langs->trans("CronStatusInactiveBtn"),
);
$massactionbutton = $form->selectMassAction('', $arrayofmassactions);
$head = [];
// Line with explanation and button new
$newcardbutton = \dolGetButtonTitle($langs->trans('New'), $langs->trans('CronCreateJob'), 'fa fa-plus-circle', \DOL_URL_ROOT . '/cron/card.php?action=create&backtopage=' . \urlencode($_SERVER['PHP_SELF'] . '?mode=modulesetup'), '', $user->hasRight('cron', 'create'));
// Add code for pre mass action (confirmation or email presend form)
$topicmail = "SendCronRef";
$modelmail = "cron";
$objecttmp = new \Cronjob($db);
$trackid = 'cron' . $object->id;
$text = $langs->trans("HoursOnThisPageAreOnServerTZ") . ' ' . $stringcurrentdate . '<br>';
//print '<br>';
$moreforfilter = '';
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldPreListTitle', $parameters, $object, $action);
$parameters = array('arrayfields' => &$arrayfields);
$varpage = empty($contextpage) ? $_SERVER["PHP_SELF"] : $contextpage;
$htmlofselectarray = $form->multiSelectArrayWithCheckbox('selectedfields', $arrayfields, $varpage, $conf->main_checkbox_left_column);
// This also change content of $arrayfields with user setup
$selectedfields = $mode != 'kanban' && $mode != 'kanbangroupby' ? $htmlofselectarray : '';
$totalarray = array();
// Loop on record
// --------------------------------------------------------------------
$i = 0;
$savnbfield = $totalarray['nbfield'];
$totalarray = array();
$imaxinloop = $limit ? \min($num, $limit) : $num;
$parameters = array('arrayfields' => $arrayfields, 'sql' => $sql);
$reshook = $hookmanager->executeHooks('printFieldListFooter', $parameters, $object, $action);
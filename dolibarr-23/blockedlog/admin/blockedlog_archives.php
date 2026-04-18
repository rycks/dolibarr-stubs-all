<?php

// Get Parameters
$action = \GETPOST('action', 'aZ09');
//$confirm     = GETPOST('confirm', 'aZ09');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : \getDolDefaultContextPage(__FILE__);
// To manage different context of search
$backtopage = \GETPOST('backtopage', 'alpha');
// Go back to a dedicated page
$optioncss = \GETPOST('optioncss', 'aZ');
// Option for the css output (always '' except when 'print')
//$hmacexportkey = GETPOST('hmacexportkey', 'password');
$search_showonlyerrors = \GETPOSTINT('search_showonlyerrors');
$search_startyear = \GETPOSTINT('search_startyear');
$search_startmonth = \GETPOSTINT('search_startmonth');
$search_startday = \GETPOSTINT('search_startday');
$search_endyear = \GETPOSTINT('search_endyear');
$search_endmonth = \GETPOSTINT('search_endmonth');
$search_endday = \GETPOSTINT('search_endday');
$search_id = \GETPOST('search_id', 'alpha');
$search_fk_user = \GETPOST('search_fk_user', 'intcomma');
$search_start = -1;
$search_end = -1;
$search_code = \GETPOST('search_code', 'array:alpha');
$search_ref = \GETPOST('search_ref', 'alpha');
$search_amount = \GETPOST('search_amount', 'alpha');
$search_signature = \GETPOST('search_signature', 'alpha');
// Load variable for pagination
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
// If $page is not defined, or '' or -1
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$block_static = new \BlockedLog($db);
$result = \restrictedArea($user, 'blockedlog', 0, '');
// Execution Time
$max_execution_time_for_importexport = \getDolGlobalInt('EXPORT_MAX_EXECUTION_TIME', 300);
// 5mn if not defined
$max_time = @\ini_get("max_execution_time");
$MAXLINES = \getDolGlobalInt('BLOCKEDLOG_MAX_LINES', 10000);
$permission = $user->hasRight('blockedlog', 'read');
$permissiontoadd = $user->hasRight('blockedlog', 'read');
// Permission is to upload new files to scan them
$permtoedit = $permissiontoadd;
$upload_dir = \getMultidirOutput($block_static, 'blockedlog') . '/archives';
$fh = \null;
// read is read/export for blockedlog
$error = 0;
$previoushash = '';
$firstid = '';
$periodnotcomplete = 0;
/*
if (empty($hmacexportkey)) {
	setEventMessages($langs->trans("ErrorFieldRequired", $langs->transnoentitiesnoconv("Password")), null, "errors");
	$error++;
}
*/
$dates = \dol_get_first_day(\GETPOSTINT('yeartoexport'), \GETPOSTINT('monthtoexport') > 0 ? \GETPOSTINT('monthtoexport') : 1);
$datee = \dol_get_last_day(\GETPOSTINT('yeartoexport'), \GETPOSTINT('monthtoexport') > 0 ? \GETPOSTINT('monthtoexport') : 12);
$suffixperiod = $periodnotcomplete ? 'INCOMPLETE' : 'DONOTMODIFY';
// Define file name
$registrationnumber = \getHashUniqueIdOfRegistration();
$secretkey = $registrationnumber;
$yearmonthtoexport = \GETPOSTINT('yeartoexport') . '-' . (\GETPOSTINT('monthtoexport') > 0 ? \sprintf("%02d", \GETPOSTINT('monthtoexport')) : '');
$yearmonthdateofexport = \dol_print_date(\dol_now(), 'dayhourrfc', 'gmt');
$yearmonthdateofexportstandard = \dol_print_date(\dol_now(), 'dayhourlog', 'gmt');
$nameofdownoadedfile = "unalterable-log-archive-" . $dolibarr_main_db_name . "-" . \str_replace('-', '', $yearmonthtoexport) . '-' . $yearmonthdateofexportstandard . 'UTC-' . $suffixperiod . '.csv';
//$tmpfile = $conf->admin->dir_temp.'/unalterable-log-archive-tmp-'.$user->id.'.csv';
$tmpfile = \getMultidirOutput($block_static, 'blockedlog') . '/archives/' . $nameofdownoadedfile;
$formatexport = 'VE1';
/*
 *	View
 */
$form = new \Form($db);
$formother = new \FormOther($db);
$help_url = "EN:Module_Unalterable_Archives_-_Logs|FR:Module_Archives_-_Logs_Inaltérable";
$blocks = $block_static->getLog('all', (int) $search_id, $MAXLINES, $sortfield, $sortorder, (int) $search_fk_user, $search_start, $search_end, $search_ref, $search_amount, $search_code, $search_signature);
$linkback = '';
$morehtmlcenter = '';
$registrationnumber = \getHashUniqueIdOfRegistration();
$texttop = '<small class="opacitymedium">' . $langs->trans("RegistrationNumber") . ':</small> <small>' . \dol_trunc($registrationnumber, 10) . '</small>';
$head = \blockedlogadmin_prepare_head(\GETPOST('withtab', 'alpha'));
$htmltext = '';
$param = '';
/*
print '<form method="POST" id="searchFormList" action="'.dolBuildUrl($_SERVER["PHP_SELF"]).'">';

if ($optioncss != '') {
	print '<input type="hidden" name="optioncss" value="'.$optioncss.'">';
}
print '<input type="hidden" name="token" value="'.newToken().'">';
print '<input type="hidden" name="formfilteraction" id="formfilteraction" value="list">';
print '<input type="hidden" name="action" value="list">';
print '<input type="hidden" name="sortfield" value="'.$sortfield.'">';
print '<input type="hidden" name="sortorder" value="'.$sortorder.'">';
print '<input type="hidden" name="page" value="'.$page.'">';
print '<input type="hidden" name="contextpage" value="'.$contextpage.'">';
print '<input type="hidden" name="withtab" value="'.GETPOST('withtab', 'alpha').'">';

print '<div class="div-table-responsive">'; // You can use div-table-responsive-no-min if you don't need reserved height for your table
*/
$filearray = \dol_dir_list($upload_dir, 'files', 0, '', \null, 'name', \SORT_ASC, 1);
$modulepart = 'blockedlog';
$relativepathwithnofile = 'archives/';
$disablemove = 1;
$formfile = new \FormFile($db);
$savingdocmask = '';
$object = $block_static;
// Get the form to add files (upload and links)
$tmparray = $formfile->form_attach_new_file($_SERVER["PHP_SELF"], '', 0, 0, $permission, $conf->browser->layout == 'phone' ? 40 : 60, $object, '', 1, $savingdocmask, 1, 'formuserfile', '', '', 0, 0, 0, 2);
$formToUploadAFile = '';
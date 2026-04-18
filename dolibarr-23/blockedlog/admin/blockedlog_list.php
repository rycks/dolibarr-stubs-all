<?php

// Get Parameters
$action = \GETPOST('action', 'aZ09');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : \getDolDefaultContextPage(__FILE__);
// To manage different context of search
$backtopage = \GETPOST('backtopage', 'alpha');
// Go back to a dedicated page
$optioncss = \GETPOST('optioncss', 'aZ');
// Option for the css output (always '' except when 'print')
$search_showonlyerrors = \GETPOSTINT('search_showonlyerrors');
$search_startyear = \GETPOSTINT('search_startyear');
$search_startmonth = \GETPOSTINT('search_startmonth');
$search_startday = \GETPOSTINT('search_startday');
$search_endyear = \GETPOSTINT('search_endyear');
$search_endmonth = \GETPOSTINT('search_endmonth');
$search_endday = \GETPOSTINT('search_endday');
$search_id = \GETPOST('search_id', 'alpha');
// Can be a USF search string
$search_fk_user = \GETPOST('search_fk_user', 'intcomma');
$search_start = -1;
$search_end = -1;
$search_code = \GETPOST('search_code', 'array:alpha');
$search_module_source = \GETPOST('search_module_source', 'array:alpha');
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
$MAXFORSHOWNLINKS = \getDolGlobalInt('BLOCKEDLOG_MAX_FOR_SHOWN_LINKS', 100);
/*
 *	View
 */
$form = new \Form($db);
$help_url = "EN:Module_Unalterable_Archives_-_Logs|FR:Module_Archives_-_Logs_Inaltérable";
$blocks = $block_static->getLog('all', (string) $search_id, $MAXLINES, $sortfield, $sortorder, (int) $search_fk_user, $search_start, $search_end, $search_ref, $search_amount, $search_code, $search_signature, $search_module_source);
$linkback = '';
$morehtmlcenter = '';
$registrationnumber = \getHashUniqueIdOfRegistration();
$texttop = '<small class="opacitymedium">' . $langs->trans("RegistrationNumber") . ':</small> <small>' . \dol_trunc($registrationnumber, 10) . '</small>';
$head = \blockedlogadmin_prepare_head(\GETPOST('withtab', 'alpha'));
$s = $langs->trans("FilesIntegrityDesc", '{s}');
$s = \str_replace('{s}', \DOL_URL_ROOT . '/blockedlog/admin/filecheck.php', $s);
$htmltext = '';
$param = '';
$array = array("1" => "OnlyNonValid");
$checkresult = array();
$checkdetail = array();
$loweridinerror = 0;
$refinvoicefound = array();
$totalhtamount = array();
$totalvatamount = array();
$totalamount = array();
$nbshown = 0;
$object_link = '';
$object_link_title = '';
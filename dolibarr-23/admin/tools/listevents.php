<?php

/**
 * @var Conf $conf
 * @var DoliDB $db
 * @var HookManager $hookmanager
 * @var Translate $langs
 * @var User $user
 */
$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm', 'alpha');
$optioncss = \GETPOST("optioncss", "aZ");
// Option for the css output (always '' except when 'print')
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : \str_replace('_', '', \basename(\dirname(__FILE__)) . \basename(__FILE__, '.php'));
// Load variable for pagination
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
// If $page is not defined, or '' or -1
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$search_rowid = \GETPOST("search_rowid", "intcomma");
$search_code = \GETPOST("search_code", "alpha");
$search_ip = \GETPOST("search_ip", "alpha");
$search_user = \GETPOST("search_user", "alpha");
$search_desc = \GETPOST("search_desc", "alpha");
$search_ua = \GETPOST("search_ua", "restricthtml");
$search_prefix_session = \GETPOST("search_prefix_session", "restricthtml");
$search_entity = $user->entity > 0 ? $user->entity : \GETPOSTINT('search_entity');
// TODO Replace with $search_entity = GETPOSTINT('search_entity') when the filter is available on screen for this page
$now = \dol_now();
$nowarray = \dol_getdate($now);
// Set $date_startmonth...
$date_startday = '';
$date_startmonth = '';
$date_startyear = '';
$date_endday = '';
$date_endmonth = '';
$date_endyear = '';
// Add prefix session
$arrayfields = array('e.prefix_session' => array('label' => 'UserAgent', 'checked' => \getDolGlobalInt('AUDIT_ENABLE_PREFIX_SESSION'), 'enabled' => \getDolGlobalInt('AUDIT_ENABLE_PREFIX_SESSION'), 'position' => 110));
/*
 * Actions
 */
$now = \dol_now();
$error = 0;
// Delete events
$sql = "DELETE FROM " . \MAIN_DB_PREFIX . "events";
$resql = $db->query($sql);
// Add event purge
$text = $langs->trans("SecurityEventsPurged");
$securityevent = new \Events($db);
$result = $securityevent->create($user);
/*
 *	View
 */
$title = $langs->trans("Audit");
$form = new \Form($db);
$userstatic = new \User($db);
$usefilter = 0;
$sql = "SELECT e.rowid, e.type, e.ip, e.user_agent, e.dateevent,";
// Count total nb of records
$nbtotalofrecords = '';
$result = $db->query($sql);
$num = $db->num_rows($result);
$i = 0;
$param = '';
$center = '';
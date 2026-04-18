<?php

// Get parameters
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$lineid = \GETPOSTINT('lineid');
$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm', 'alpha');
$cancel = \GETPOST('cancel', 'alpha');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : \str_replace('_', '', \basename(\dirname(__FILE__)) . \basename(__FILE__, '.php'));
// To manage different context of search
$backtopage = \GETPOST('backtopage', 'alpha');
// if not set, a default page will be used
$backtopageforcancel = \GETPOST('backtopageforcancel', 'alpha');
// if not set, $backtopage will be used
$dol_openinpopup = \GETPOST('dol_openinpopup', 'aZ09');
// Initialize a technical objects
$object = new \Calendar($db);
$extrafields = new \ExtraFields($db);
$diroutputmassaction = $conf->bookcal->dir_output . '/temp/massgeneration/' . $user->id;
$search_array_options = $extrafields->getOptionalsFromPost($object->table_element, '', 'search_');
// Initialize array of search criteria
$search_all = \GETPOST("search_all", 'alpha');
$search = array();
// There is several ways to check permission.
// Set $enablepermissioncheck to 1 to enable a minimum low level of checks
$enablepermissioncheck = 0;
$upload_dir = $conf->bookcal->multidir_output[isset($object->entity) ? $object->entity : 1] . '/calendar';
$error = 0;
/*
 * Actions
 */
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$backurlforlist = \dol_buildpath('/bookcal/calendar_list.php', 1);
$triggermodname = 'BOOKCAL_MYOBJECT_MODIFY';
// Actions to send emails
$triggersendname = 'BOOKCAL_MYOBJECT_SENTBYMAIL';
$autocopy = 'MAIN_MAIL_AUTOCOPY_MYOBJECT_TO';
$trackid = 'calendar' . $object->id;
/*
 * View
 */
$form = new \Form($db);
$formfile = new \FormFile($db);
$formproject = new \FormProjets($db);
$title = $langs->trans("Calendar");
$help_url = '';
$head = \calendarPrepareHead($object);
$formconfirm = '';
// Call Hook formConfirm
$parameters = array('formConfirm' => $formconfirm, 'lineid' => $lineid);
$reshook = $hookmanager->executeHooks('formConfirm', $parameters, $object, $action);
// Object card
// ------------------------------------------------------------
$linkback = '<a href="' . \dol_buildpath('/bookcal/calendar_list.php', 1) . '?restore_lastsearch_values=1">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<div class="refidno">';
// Define $urlwithroot
$urlwithouturlroot = \preg_replace('/' . \preg_quote(\DOL_URL_ROOT, '/') . '$/i', '', \trim($dolibarr_main_url_root));
$urlwithroot = $urlwithouturlroot . \DOL_URL_ROOT;
$linktobook = $urlwithroot . '/public/bookcal/index.php?id=' . $object->id;
$encodedsecurekey = \dol_hash(\getDolGlobalString('BOOKCAL_SECUREKEY') . 'bookcal' . (int) $object->id, 'md5');
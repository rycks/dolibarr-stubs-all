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
$optioncss = \GETPOST('optioncss', 'aZ');
// Option for the css output (always '' except when 'print')
$dol_openinpopup = \GETPOST('dol_openinpopup', 'aZ09');
// Initialize a technical objects
$object = new \TriggerHistory($db);
$extrafields = new \ExtraFields($db);
$diroutputmassaction = $conf->webhook->dir_output . '/temp/massgeneration/' . $user->id;
// Note that conf->hooks_modules contains array
$soc = \null;
$search_array_options = $extrafields->getOptionalsFromPost($object->table_element, '', 'search_');
// Initialize array of search criteria
$search_all = \trim(\GETPOST("search_all", 'alpha'));
$search = array();
// Must be 'include', not 'include_once'.
// There is several ways to check permission.
// Set $enablepermissioncheck to 1 to enable a minimum low level of checks
$permissiontoread = $permissiontoadd = $permissiontodelete = $permissionnote = $permissiondellink = !empty($user->admin) ? 1 : 0;
$upload_dir = $conf->webhook->multidir_output[!empty($object->entity) ? $object->entity : 1] . '/triggerhistory';
$error = 0;
/*
 * Actions
 */
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$backurlforlist = \dol_buildpath('/webhook/history_list.php', 1);
$triggermodname = 'WEBHOOK_MYOBJECT_MODIFY';
// Actions to send emails
$triggersendname = 'WEBHOOK_MYOBJECT_SENTBYMAIL';
$autocopy = 'MAIN_MAIL_AUTOCOPY_MYOBJECT_TO';
$trackid = 'triggerhistory' . $object->id;
/*
 * View
 */
$form = new \Form($db);
$formfile = new \FormFile($db);
$formproject = new \FormProjets($db);
$title = $langs->trans("TriggerHistory") . " - " . $langs->trans('Card');
$help_url = '';
$head = \triggerhistoryPrepareHead($object);
$formconfirm = '';
// Confirmation of action xxxx (You can use it for xxx = 'close', xxx = 'reopen', ...)
// if ($action == 'xxx') {
// 	$text = $langs->trans('ConfirmActionXxx', $object->ref);
// 	if (isModEnabled('notification')) {
// 		require_once DOL_DOCUMENT_ROOT . '/core/class/notify.class.php';
// 		$notify = new Notify($db);
// 		$text .= '<br>';
// 		$text .= $notify->confirmMessage('MYOBJECT_CLOSE', $object->socid, $object);
// 	}
// 	$formquestion = array();
// 	$forcecombo=0;
// 	if ($conf->browser->name == 'ie') $forcecombo = 1;	// There is a bug in IE10 that make combo inside popup crazy
// 	$formquestion = array(
// 		// 'text' => $langs->trans("ConfirmClone"),
// 		// array('type' => 'checkbox', 'name' => 'clone_content', 'label' => $langs->trans("CloneMainAttributes"), 'value' => 1),
// 		// array('type' => 'checkbox', 'name' => 'update_prices', 'label' => $langs->trans("PuttingPricesUpToDate"), 'value' => 1),
// 		// array('type' => 'other',    'name' => 'idwarehouse',   'label' => $langs->trans("SelectWarehouseForStockDecrease"), 'value' => $formproduct->selectWarehouses(GETPOST('idwarehouse')?GETPOST('idwarehouse'):'ifone', 'idwarehouse', '', 1, 0, 0, '', 0, $forcecombo))
// 	);
// 	$formconfirm = $form->formconfirm($_SERVER["PHP_SELF"].'?id='.$object->id, $langs->trans('XXX'), $text, 'confirm_xxx', $formquestion, 0, 1, 220);
// }
// Call Hook formConfirm
$parameters = array('formConfirm' => $formconfirm, 'lineid' => $lineid);
$reshook = $hookmanager->executeHooks('formConfirm', $parameters, $object, $action);
// Object card
// ------------------------------------------------------------
$linkback = '<a href="' . \dol_buildpath('/webhook/triggerhistory_list.php', 1) . '?restore_lastsearch_values=1&mode=modulesetup' . (!empty($socid) ? '&socid=' . $socid : '') . '">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<div class="refidno">';
// Presend form
$modelmail = 'triggerhistory';
$defaulttopic = 'InformationMessage';
$diroutput = $conf->webhook->dir_output;
$trackid = 'triggerhistory' . $object->id;
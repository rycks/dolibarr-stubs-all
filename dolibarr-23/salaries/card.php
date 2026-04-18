<?php

$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$cancel = \GETPOST('cancel', 'alpha');
$backtopage = \GETPOST('backtopage', 'alpha');
$backtopageforcancel = \GETPOST('backtopageforcancel', 'alpha');
$confirm = \GETPOST('confirm');
$label = \GETPOST('label', 'alphanohtml');
$projectid = \GETPOSTINT('projectid') ? \GETPOSTINT('projectid') : \GETPOSTINT('fk_project');
$accountid = \GETPOSTINT('accountid') > 0 ? \GETPOSTINT('accountid') : 0;
$datep = \dol_mktime(12, 0, 0, \GETPOSTINT("datepmonth"), \GETPOSTINT("datepday"), \GETPOSTINT("datepyear"));
$datev = \dol_mktime(12, 0, 0, \GETPOSTINT("datevmonth"), \GETPOSTINT("datevday"), \GETPOSTINT("datevyear"));
$datesp = \dol_mktime(12, 0, 0, \GETPOSTINT("datespmonth"), \GETPOSTINT("datespday"), \GETPOSTINT("datespyear"));
$dateep = \dol_mktime(12, 0, 0, \GETPOSTINT("dateepmonth"), \GETPOSTINT("dateepday"), \GETPOSTINT("dateepyear"));
$fk_user = \GETPOSTINT('userid');
$object = new \Salary($db);
$extrafields = new \ExtraFields($db);
$childids = $user->getAllChildIds(1);
// Check current user can read this salary
$canread = 0;
// Security check
$socid = \GETPOSTINT('socid');
$permissiontoread = $user->hasRight('salaries', 'read');
$permissiontoadd = $user->hasRight('salaries', 'write');
// Used by the include of actions_addupdatedelete.inc.php and actions_lineupdown.inc.php
$permissiontodelete = $user->hasRight('salaries', 'delete') || $permissiontoadd && isset($object->status) && $object->status == $object::STATUS_UNPAID;
$permissiontoeditextra = $permissiontoadd;
$upload_dir = $conf->salaries->multidir_output[$conf->entity];
$error = 0;
/*
 * Actions
 */
$parameters = array();
// Note that $action and $object may be modified by some hooks
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$error = 0;
$backurlforlist = \dolBuildUrl(\DOL_URL_ROOT . '/salaries/list.php');
// Actions to send emails
$triggersendname = 'COMPANY_SENTBYMAIL';
$paramname = 'id';
$mode = 'emailfromthirdparty';
$trackid = 'sal' . $object->id;
$result = $object->fetch($id);
$result = $object->fetch($id);
$result = $object->setPaymentMethods(\GETPOSTINT('mode_reglement_id'));
$result = $object->setBankAccount(\GETPOSTINT('fk_account'));
$error = 0;
$type_payment = \GETPOSTINT("paymenttype");
$amount = \price2num(\GETPOST("amount", 'alpha'), 'MT', 2);
// Set user current salary as ref salary for the payment
$fuser = new \User($db);
// Fill array 'array_options' with data from add form
$ret = $extrafields->setOptionalsFromPost(\null, $object);
$action = 'create';
$result = $object->fetch($id);
$totalpaid = $object->getSommePaiement();
$amount = \price2num(\GETPOST('amount'), 'MT', 2);
$originalId = $id;
// @phan-suppress-current-line PhanTypeMismatchProperty
$attribute = \GETPOST('attribute', 'aZ09');
// Fill array 'array_options' with data from update form
$ret = $extrafields->setOptionalsFromPost(\null, $object, $attribute);
/*
 *	View
 */
$form = new \Form($db);
$formfile = new \FormFile($db);
$title = $langs->trans('Salary') . " - " . $object->ref;
$help_url = "";
$result = $object->fetch($id);
$year_current = (int) \dol_print_date(\dol_now('gmt'), "%Y", 'gmt');
$pastmonth = (int) \dol_print_date(\dol_now(), "%m") - 1;
$pastmonthyear = $year_current;
$datespmonth = \GETPOSTINT('datespmonth');
$datespday = \GETPOSTINT('datespday');
$datespyear = \GETPOSTINT('datespyear');
$dateepmonth = \GETPOSTINT('dateepmonth');
$dateepday = \GETPOSTINT('dateepday');
$dateepyear = \GETPOSTINT('dateepyear');
$datesp = \dol_mktime(0, 0, 0, $datespmonth, $datespday, $datespyear);
$dateep = \dol_mktime(23, 59, 59, $dateepmonth, $dateepday, $dateepyear);
$noactive = 0;
// Other attributes
$parameters = array();
$reshook = $hookmanager->executeHooks('formObjectOptions', $parameters, $object, $action);
$addition_button = array('name' => 'saveandnew', 'label_key' => 'SaveAndNew');
$head = \salaries_prepare_head($object);
$formconfirm = '';
$pageurl = \dolBuildUrl($_SERVER['PHP_SELF'], ['id' => $object->id]);
// Call Hook formConfirm
$parameters = array('formConfirm' => $formconfirm);
$reshook = $hookmanager->executeHooks('formConfirm', $parameters, $object, $action);
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/salaries/list.php', ['restore_lastsearch_values' => 1]) . (!empty($socid) ? '&socid=' . $socid : '') . '">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<div class="refidno">';
$usercancreate = $permissiontoadd;
$totalpaid = $object->getSommePaiement();
$nbcols = 3;
/*
 * Payments
 */
$sql = "SELECT p.rowid, p.num_payment as num_payment, p.datep as dp, p.amount,";
//print $sql;
$resql = $db->query($sql);
$resteapayer = \price2num($resteapayer, 'MT');
// Presend form
$modelmail = 'salary';
$defaulttopic = 'InformationMessage';
$diroutput = $conf->salaries->dir_output;
$trackid = 'salary' . $object->id;
// Hook to add more things on page
$parameters = array();
$reshook = $hookmanager->executeHooks('salaryCardTabAddMore', $parameters, $object, $action);
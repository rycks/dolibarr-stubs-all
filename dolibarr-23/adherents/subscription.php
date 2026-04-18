<?php

$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm', 'alpha');
$contextpage = \GETPOST('contextpage', 'aZ09');
$optioncss = \GETPOST('optioncss', 'aZ');
// Option for the css output (always '' except when 'print')
$id = \GETPOSTINT('rowid') ? \GETPOSTINT('rowid') : \GETPOSTINT('id');
$rowid = $id;
$ref = \GETPOST('ref', 'alphanohtml');
$typeid = \GETPOSTINT('typeid');
$cancel = \GETPOST('cancel', 'alpha');
// Load variable for pagination
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT('page');
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$object = new \Adherent($db);
$extrafields = new \ExtraFields($db);
$adht = new \AdherentType($db);
$errmsg = '';
// PDF
$hidedetails = \GETPOSTINT('hidedetails') ? \GETPOSTINT('hidedetails') : (\getDolGlobalString('MAIN_GENERATE_DOCUMENTS_HIDE_DETAILS') ? 1 : 0);
$hidedesc = \GETPOSTINT('hidedesc') ? \GETPOSTINT('hidedesc') : (\getDolGlobalString('MAIN_GENERATE_DOCUMENTS_HIDE_DESC') ? 1 : 0);
$hideref = \GETPOSTINT('hideref') ? \GETPOSTINT('hideref') : (\getDolGlobalString('MAIN_GENERATE_DOCUMENTS_HIDE_REF') ? 1 : 0);
$datefrom = 0;
$dateto = 0;
$paymentdate = -1;
// Load member
$result = $object->fetch($id, $ref);
// Define variables to know what current user can do on users
$canadduser = $user->admin || $user->hasRight("user", "user", "creer");
// Define variables to determine what the current user can do on the members
$permissiontoaddmember = $user->hasRight('adherent', 'creer');
// Security check
$result = \restrictedArea($user, 'adherent', $object->id, '', '', 'socid', 'rowid', 0);
/*
 * 	Actions
 */
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$error = 0;
$error = 0;
$error = 0;
$result = $object->fetch($rowid);
$result = $adht->fetch($object->typeid);
// Subscription information
$datesubscription = 0;
$datesubend = 0;
$defaultdelay = !empty($adht->duration_value) ? $adht->duration_value : 1;
$defaultdelayunit = !empty($adht->duration_unit) ? $adht->duration_unit : 'y';
$paymentdate = '';
$amount = \price2num(\GETPOST("subscription", 'alpha'));
// Amount of subscription
$label = \GETPOST("label");
// Payment information
$accountid = \GETPOSTINT("accountid");
$operation = \GETPOST("operation", "alphanohtml");
// Payment mode
$num_chq = \GETPOST("num_chq", "alphanohtml");
$emetteur_nom = \GETPOST("chqemetteur");
$emetteur_banque = \GETPOST("chqbank");
$option = \GETPOST("paymentsave");
$sendalsoemail = \GETPOST("sendmail", 'alpha');
/*
 * View
 */
$form = new \Form($db);
$now = \dol_now();
$title = $langs->trans("Member") . " - " . $langs->trans("Subscriptions");
$help_url = "EN:Module_Foundations|FR:Module_Adh&eacute;rents|ES:M&oacute;dulo_Miembros|DE:Modul_Mitglieder";
$param = '';
$defaultdelay = !empty($adht->duration_value) ? $adht->duration_value : 1;
$defaultdelayunit = !empty($adht->duration_unit) ? $adht->duration_unit : 'y';
$head = \member_prepare_head($object);
$rowspan = 10;
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/adherents/list.php', ['restore_lastsearch_values' => 1]) . '">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<a href="' . \DOL_URL_ROOT . '/adherents/vcard.php?id=' . $object->id . '" class="refid">';
// Public
$linkofpubliclist = \DOL_MAIN_URL_ROOT . '/public/members/public_list.php' . (\isModEnabled('multicompany') ? '?entity=' . $conf->entity : '');
// Other attributes
$cols = 2;
$sql = "SELECT d.rowid, d.firstname, d.lastname, d.societe, d.fk_adherent_type as type,";
$result = $db->query($sql);
$validpaymentmethod = \getValidOnlinePaymentMethods('');
$useonlinepayment = \count($validpaymentmethod);
// Define default choice for complementary actions
$bankdirect = 0;
// 1 means option by default is write to bank direct with no invoice
$invoiceonly = 0;
// 1 means option by default is invoice only
$bankviainvoice = 0;
$currentyear = \dol_print_date($now, "%Y");
$currentmonth = \dol_print_date($now, "%m");
$parameters = array();
$reshook = $hookmanager->executeHooks('addMoreActionsButtons', $parameters, $object, $action);
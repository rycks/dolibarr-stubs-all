<?php

$action = \GETPOST('action', 'aZ09');
$backtopage = \GETPOST('backtopage', 'aZ09');
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$label = \GETPOST("label");
$now = \dol_now();
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
// If $page is not defined, or '' or -1
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'thirdpartylist';
$arrayofpaymentmode = array('cash' => 'Cash', 'cheque' => 'Cheque', 'card' => 'CreditCard');
$arrayofposavailable = array();
// TODO Add hook here to allow other POS to add themself
$object = new \CashControl($db);
$extrafields = new \ExtraFields($db);
$permissiontoadd = $user->hasRight("cashdesk", "run") || $user->hasRight("takepos", "run");
$permissiontodelete = $user->hasRight("cashdesk", "run") || $user->hasRight("takepos", "run") || $permissiontoadd && $object->status == 0;
$sqlfilteronopdate = '';
// Must be after the fetch
$datestart = \null;
$dateend = \null;
$syear = \GETPOSTISSET('closeyear') ? \GETPOSTINT('closeyear') : \dol_print_date($now, "%Y", 'tzuserrel');
$smonth = \GETPOSTISSET('closemonth') ? \GETPOSTINT('closemonth') : \dol_print_date($now, "%m", 'tzuserrel');
$sday = \GETPOSTISSET('closeday') ? \GETPOSTINT('closeday') : \dol_print_date($now, "%d", 'tzuserrel');
// TODO Add a global option to define the end hours when doing a cash control
$shour = 0;
$smin = 0;
$ssec = 0;
//var_dump(dol_print_date($datestart, 'dayhour', 'gmt'), dol_print_date($dateend, 'dayhour', 'gmt'));
// Define dates and terminal
$posmodule = '';
$terminalid = '';
$terminaltouse = '';
/*
 * Actions
 */
$error = 0;
$backurlforlist = \DOL_URL_ROOT . '/compta/cashcontrol/cashcontrol_list.php';
$triggermodname = 'CACHCONTROL_MODIFY';
// Add also perpetual amount into cash_lifetime, card_lifetime, cheque_lifetime
$cash_lifetime = $card_lifetime = $cheque_lifetime = 0;
//$dates = $datestart;
$datee = $dateend;
$datefilter = 'p.datep';
$modulesourcefilter = 'f.module_source';
$amountfield = 'pf.amount';
$joinleft = 'LEFT ';
$lifetimeamount = array();
$lifetimenb = array();
$cash_lifetime = $lifetimeamount[$terminalid]['cash'];
$card_lifetime = $lifetimeamount[$terminalid]['card'];
$cheque_lifetime = $lifetimeamount[$terminalid]['cheque'];
// Get the date of first record for the lifetime calculation
$sql = "SELECT action, module_source, object_format, date_creation";
$firstrecorddate = 0;
$resql = $db->query($sql);
$result = $object->update($user);
$result2 = $object->close($user);
$action = "view";
$result = $object->delete($user);
/*
 * View
 */
$form = new \Form($db);
$initialbalanceforterminal = array();
$theoricalamountforterminal = array();
$theoricalnbofinvoiceforterminal = array();
$disabled = 0;
$prefix = 'close';
$arrayofpos = array();
$numterminals = \max(1, \getDolGlobalString('TAKEPOS_NUM_TERMINALS'));
$selectedposnumber = 0;
$showempty = 1;
$retstring = '<select' . ($disabled ? ' disabled' : '') . ' class="flat valignmiddle maxwidth75imp" id="' . $prefix . 'year" name="' . $prefix . 'year">';
$retstring = '<select' . ($disabled ? ' disabled' : '') . ' class="flat valignmiddle maxwidth75imp" id="' . $prefix . 'month" name="' . $prefix . 'month">';
$retstring = '<select' . ($disabled ? ' disabled' : '') . ' class="flat valignmiddle maxwidth50imp" id="' . $prefix . 'day" name="' . $prefix . 'day">';
$result = $object->fetch($id);
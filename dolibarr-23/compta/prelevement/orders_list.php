<?php

$action = \GETPOST('action', 'aZ09') ? \GETPOST('action', 'aZ09') : 'view';
// The action 'add', 'create', 'edit', 'update', 'view', ...
$massaction = \GETPOST('massaction', 'alpha');
// The bulk action (combo box choice into lists)
$confirm = \GETPOST('confirm', 'alpha');
// Result of a confirmation
$cancel = \GETPOST('cancel', 'alpha');
// We click on a Cancel button
$toselect = \GETPOST('toselect', 'array:int');
// Array of ids of elements selected into a list
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'directdebitcredittransferlist';
// To manage different context of search
$backtopage = \GETPOST('backtopage', 'alpha');
// Go back to a dedicated page
$optioncss = \GETPOST('optioncss', 'alpha');
$mode = \GETPOST('mode', 'alpha');
$type = \GETPOST('type', 'aZ09');
// Load variable for pagination
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
// Get supervariables
$statut = \GETPOSTINT('statut');
$search_ref = \GETPOST('search_ref', 'alpha');
$search_amount = \GETPOST('search_amount', 'alpha');
$bon = new \BonPrelevement($db);
$usercancreate = $user->hasRight('prelevement', 'bons', 'creer');
$permissiontodelete = $user->hasRight('prelevement', 'creer');
// Security check
$socid = \GETPOSTINT('socid');
/*
 * Actions
 */
$error = 0;
$TMsg = array();
$objecttmp = new \BonPrelevement($db);
$nbignored = 0;
$nbok = 0;
$massaction = '';
$objectclass = 'BonPrelevement';
$objectlabel = 'BonPrelevement';
/*
 * View
 */
$form = new \Form($db);
$directdebitorder = new \BonPrelevement($db);
$titlekey = "WithdrawalsReceipts";
$title = $langs->trans("WithdrawalsReceipts");
$help_url = '';
$sql = "SELECT p.rowid, p.ref, p.amount, p.statut, p.datec";
$sqlfields = $sql;
// Count total nb of records
$nbtotalofrecords = '';
/* The fast and low memory method to get and count full list converts the sql into a sql count */
$sqlforcount = \preg_replace('/^' . \preg_quote($sqlfields, '/') . '/', 'SELECT COUNT(*) as nbtotalofrecords', $sql);
$sqlforcount = \preg_replace('/GROUP BY .*$/', '', $sqlforcount);
$resql = $db->query($sqlforcount);
$resql = $db->query($sql);
$num = $db->num_rows($resql);
$arrayofselected = \is_array($toselect) ? $toselect : array();
$param = '';
$arrayofmassactions = array();
$massactionbutton = $form->selectMassAction('', $arrayofmassactions);
$newcardbutton = '';
$moreforfilter = '';
/*$moreforfilter.='<div class="divsearchfield">';
 $moreforfilter.= $langs->trans('MyFilter') . ': <input type="text" name="search_myfield" value="'.dol_escape_htmltag($search_myfield).'">';
 $moreforfilter.= '</div>';*/
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldPreListTitle', $parameters, $object, $action);
$varpage = empty($contextpage) ? $_SERVER["PHP_SELF"] : $contextpage;
$htmlofselectarray = $form->multiSelectArrayWithCheckbox('selectedfields', $arrayfields, $varpage, \getDolGlobalString('MAIN_CHECKBOX_LEFT_COLUMN'));
// This also change content of $arrayfields with user setup
$selectedfields = $mode != 'kanban' ? $htmlofselectarray : '';
$totalarray = array();
// Loop on record
// --------------------------------------------------------------------
$i = 0;
$savnbfield = $totalarray['nbfield'];
$totalarray = array();
$imaxinloop = $limit ? \min($num, $limit) : $num;
$parameters = array('arrayfields' => $arrayfields, 'sql' => $sql);
$reshook = $hookmanager->executeHooks('printFieldListFooter', $parameters, $object, $action);
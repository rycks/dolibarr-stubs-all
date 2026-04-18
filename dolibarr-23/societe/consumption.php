<?php

$action = \GETPOST('action', 'aZ09');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'thirdpartylist';
$optioncss = \GETPOST('optioncss', 'alpha');
// Security check
$socid = \GETPOSTINT('socid');
$result = \restrictedArea($user, 'societe', $socid, '&societe');
$object = new \Societe($db);
// Sort & Order fields
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
// Search fields
$sref = \GETPOST("sref");
$sprod_fulldescr = \GETPOST("sprod_fulldescr");
$month = \GETPOSTINT('month');
$year = \GETPOSTINT('year');
// Customer or supplier selected in drop box
$thirdTypeSelect = \GETPOST("third_select_id", 'aZ09');
$type_element = \GETPOST('type_element') ? \GETPOST('type_element') : '';
/*
 * Actions
 */
$parameters = array('id' => $socid);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 * View
 */
$form = new \Form($db);
$formother = new \FormOther($db);
$productstatic = new \Product($db);
$title = $langs->trans("Referers", $object->name);
$help_url = 'EN:Module_Third_Parties|FR:Module_Tiers|ES:Empresas';
$head = \societe_prepare_head($object);
$linkback = '<a href="' . \DOL_URL_ROOT . '/societe/list.php?restore_lastsearch_values=1">' . $langs->trans("BackToList") . '</a>';
//if (isModEnabled('agenda') && $user->hasRight('agenda', 'myactions', 'read')) $elementTypeArray['action']=$langs->transnoentitiesnoconv('Events');
$elementTypeArray = array();
$tmpcheck = $object->check_codeclient();
$sql = "SELECT count(*) as nb from " . \MAIN_DB_PREFIX . "facture where fk_soc = " . (int) $socid;
$resql = $db->query($sql);
$obj = $db->fetch_object($resql);
$nbFactsClient = $obj->nb;
$thirdTypeArray = array();
$tmpcheck = $object->check_codefournisseur();
$sql = "SELECT count(*) as nb from " . \MAIN_DB_PREFIX . "commande_fournisseur where fk_soc = " . (int) $socid;
$resql = $db->query($sql);
$obj = $db->fetch_object($resql);
$nbCmdsFourn = $obj->nb;
$sql_select = '';
$documentstaticline = '';
$tables_from = '';
$dateprint = '';
$doc_number = '';
/*if ($type_element == 'action')
{ 	// Customer : show products from invoices
	require_once DOL_DOCUMENT_ROOT.'/comm/action/class/actioncomm.class.php';
	$documentstatic=new ActionComm($db);
	$sql_select = 'SELECT f.id as doc_id, f.id as doc_number, \'1\' as doc_type, f.datep as dateprint, ';
	$tables_from = MAIN_DB_PREFIX."actioncomm as f";
	$where = " WHERE rbl.parentid = f.id AND f.entity = ".$conf->entity;
	$dateprint = 'f.datep';
	$doc_number='f.id';
}*/
$documentstatic = \null;
$totalnboflines = 0;
$sql = $sql_select;
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListSelect', $parameters, $object, $action);
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListFrom', $parameters, $object, $action);
$parameters = array('type_element' => $type_element);
$reshook = $hookmanager->executeHooks('printFieldListWhere', $parameters, $object, $action);
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListGroupBy', $parameters, $object, $action);
$resql = $db->query($sql);
$totalnboflines = $db->num_rows($resql);
$disabled = 0;
$showempty = 2;
// Define type of elements
$typeElementString = $form->selectarray("type_element", $elementTypeArray, \GETPOST('type_element'), $showempty, 0, 0, '', 0, 0, $disabled, '', 'maxwidth150onsmartphone');
$button = '<input type="submit" class="button buttonform small" name="button_third" value="' . \dol_escape_htmltag($langs->trans("Search")) . '" title="' . \dol_escape_htmltag($langs->trans("Search")) . '">';
$total_qty = 0;
$total_ht = 0;
$param = '';
$num = 0;
$resql = $db->query($sql);
$num = $db->num_rows($resql);
$param = "&socid=" . \urlencode((string) $socid) . "&type_element=" . \urlencode((string) $type_element);
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListOption', $parameters, $object, $action);
$searchpicto = $form->showFilterAndCheckAddButtons(0);
$parameters = array('param' => $param, 'sortfield' => $sortfield, 'sortorder' => $sortorder);
$reshook = $hookmanager->executeHooks('printFieldListTitle', $parameters, $object, $action);
$i = 0;
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListTotal', $parameters, $object, $action);
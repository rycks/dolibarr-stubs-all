<?php

$action = \GETPOST('action', 'alpha');
$confirm = \GETPOST('confirm', 'alpha');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'contratagenda';
$actioncode = \GETPOST('actioncode', 'array', 3);
$search_rowid = \GETPOST('search_rowid');
$search_agenda_label = \GETPOST('search_agenda_label');
$search_complete = \GETPOST('search_complete');
$search_filtert = \GETPOSTINT('search_filtert');
$search_dateevent_start = \GETPOSTDATE('dateevent_start');
$search_dateevent_end = \GETPOSTDATE('dateevent_end');
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
// Security check
$fieldvalue = !empty($id) ? $id : (!empty($ref) ? $ref : '');
$fieldtype = !empty($id) ? 'rowid' : 'ref';
$result = \restrictedArea($user, 'contrat', $fieldvalue, '', '', '', $fieldtype);
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT('page');
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$object = new \Contrat($db);
$permissiontoadd = $user->hasRight('contrat', 'creer');
//  Used by the include of actions_addupdatedelete.inc.php and actions_lineupdown.inc.php
$result = \restrictedArea($user, 'contrat', $object->id);
/*
 * Actions
 */
$parameters = array('id' => $id, 'ref' => $ref);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 * View
 */
$form = new \Form($db);
$formfile = new \FormFile($db);
// Load object modContract
$module = \getDolGlobalString('CONTRACT_ADDON', 'mod_contract_serpis');
$result = \dol_include_once('/core/modules/contract/' . $module . '.php');
$title = $langs->trans("Agenda");
$help_url = 'EN:Module_Contracts|FR:Module_Contrat|ES:Contratos_de_servicio';
$head = \contract_prepare_head($object);
$linkback = '<a href="' . \DOL_URL_ROOT . '/contrat/list.php?restore_lastsearch_values=1">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '';
$permtoedit = 0;
// Actions buttons
/*$objthirdparty=$object;
	$objcon=new stdClass();

	$out='';
	$permok=$user->rights->agenda->myactions->create;
	if ((!empty($objthirdparty->id) || !empty($objcon->id)) && $permok)
	{
		//$out.='<a href="'.DOL_URL_ROOT.'/comm/action/card.php?action=create';
		if (get_class($objthirdparty) == 'Societe') $out.='&amp;socid='.$objthirdparty->id;
		$out.=(!empty($objcon->id)?'&amp;contactid='.$objcon->id:'').'&amp;backtopage=1';
		//$out.=$langs->trans("AddAnAction").' ';
		//$out.=img_picto($langs->trans("AddAnAction"),'filenew');
		//$out.="</a>";
	}*/
//print '<div class="tabsAction">';
//print '</div>';
$newcardbutton = '';
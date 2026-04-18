<?php

$action = \GETPOST('action', 'alpha');
$confirm = \GETPOST('confirm', 'alpha');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'contratagenda';
$actioncode = \GETPOST('actioncode', 'array', 3);
$search_rowid = \GETPOST('search_rowid');
$search_agenda_label = \GETPOST('search_agenda_label');
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT('page');
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
// Initialize a technical objects
$object = new \Contrat($db);
// Security check
$id = \GETPOSTINT("id");
$socid = 0;
$result = $object->fetch($id);
$result = \restrictedArea($user, 'contrat', $id, '&contrat');
/*
 *	Actions
 */
$parameters = array('id' => $id);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 *	View
 */
$form = new \Form($db);
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
$morehtmlright = '';
$param = '&id=' . \urlencode((string) $id);
$cachekey = 'count_events_thirdparty_' . $object->id;
$nbEvent = \dol_getcache($cachekey);
$titlelist = $langs->trans("ActionsOnCompany") . (\is_numeric($nbEvent) ? '<span class="opacitymedium colorblack paddingleft">(' . $nbEvent . ')</span>' : '');
// List of all actions
$filters = array();
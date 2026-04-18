<?php

// Get parameters
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$cancel = \GETPOST('cancel', 'alpha');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : \str_replace('_', '', \basename(\dirname(__FILE__)) . \basename(__FILE__, '.php'));
// To manage different context of search
$backtopage = \GETPOST('backtopage', 'alpha');
$actioncode = \GETPOST('actioncode', 'array', 3);
$search_rowid = \GETPOST('search_rowid');
$search_agenda_label = \GETPOST('search_agenda_label');
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT('page');
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
// Initialize a technical objects
$object = new \Propal($db);
$extrafields = new \ExtraFields($db);
$diroutputmassaction = $conf->propal->multidir_output[$conf->entity] . '/temp/massgeneration/' . $user->id;
$permissiontoread = $user->hasRight("propal", "lire");
$permissiontoadd = $user->hasRight("propal", "creer");
$isdraft = $object->status == $object::STATUS_DRAFT ? 1 : 0;
/*
 *  Actions
 */
$parameters = array('id' => $id);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 *	View
 */
$form = new \Form($db);
$title = $langs->trans("Agenda");
$help_url = 'EN:Module_Agenda_En|DE:Modul_Terminplanung';
$head = \propal_prepare_head($object);
// Object card
// ------------------------------------------------------------
$linkback = '<a href="' . \DOL_URL_ROOT . '/comm/propal/list.php?restore_lastsearch_values=1' . (!empty($socid) ? '&socid=' . $socid : '') . '">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<div class="refidno">';
// Actions buttons
$objthirdparty = $object;
$objcon = new \stdClass();
$query = ['action' => 'create', 'origin' => $object->element . (\property_exists($object, 'module') && !empty($object->module) ? '@' . $object->module : ''), 'originid' => $object->id, 'backtopage' => \dolBuildUrl($_SERVER['PHP_SELF'], ['id' => $object->id])];
$permok = $user->hasRight('agenda', 'myactions', 'create');
$url = \dolBuildUrl(\DOL_URL_ROOT . '/comm/action/card.php', $query);
$morehtmlright = '';
//$messagingUrl = DOL_URL_ROOT.'/societe/messaging.php?socid='.$object->id;
//$morehtmlright .= dolGetButtonTitle($langs->trans('ShowAsConversation'), '', 'fa fa-comments imgforviewmode', $messagingUrl, '', 1);
//$messagingUrl = DOL_URL_ROOT.'/societe/agenda.php?socid='.$object->id;
//$morehtmlright .= dolGetButtonTitle($langs->trans('MessageListViewType'), '', 'fa fa-bars imgforviewmode', $messagingUrl, '', 2);
$messagingUrl = \dolBuildUrl(\DOL_URL_ROOT . '/comm/propal/messaging.php', ['id' => $object->id]);
$messagingUrl = \dolBuildUrl(\DOL_URL_ROOT . '/comm/propal/agenda.php', ['id' => $object->id]);
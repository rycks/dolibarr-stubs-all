<?php

// Get Parameters
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTINT("page");
// If $page is not defined, or '' or -1
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$actioncode = \GETPOST('actioncode', 'array', 3);
$search_rowid = \GETPOST('search_rowid');
$search_agenda_label = \GETPOST('search_agenda_label');
// Security check
$socid = 0;
$result = \restrictedArea($user, 'fournisseur', $id, 'commande_fournisseur', 'commande');
$usercancreate = $user->hasRight("fournisseur", "commande", "creer") || $user->hasRight("supplier_order", "creer");
$permissiontoadd = $usercancreate;
// Used by the include of actions_addupdatedelete.inc.php
$caneditproject = \false;
/*
 *	Actions
 */
$parameters = array('id' => $id);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 * View
 */
$form = new \Form($db);
$object = new \CommandeFournisseur($db);
$title = $object->ref . ' - ' . $langs->trans('Info') . ' - ' . $object->ref . ' ' . $object->name;
$help_url = 'EN:Module_Suppliers_Orders|FR:CommandeFournisseur|ES:Módulo_Pedidos_a_proveedores';
$now = \dol_now();
$head = \ordersupplier_prepare_head($object);
// Supplier order card
$linkback = '<a href="' . \DOL_URL_ROOT . '/fourn/commande/list.php' . (!empty($socid) ? '?socid=' . $socid : '') . '">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<div class="refidno">';
// Actions buttons
$out = '';
$permok = $user->hasRight('agenda', 'myactions', 'create');
$morehtmlright = '';
// Show link to change view in message
$messagingUrl = \DOL_URL_ROOT . '/fourn/commande/messaging.php?id=' . $object->id;
// Status 1 for "not current page"
// Show link to change view in agenda
$messagingUrl = \DOL_URL_ROOT . '/fourn/commande/info.php?id=' . $object->id;
$param = '&id=' . $object->id;
$cachekey = 'count_events_commande_' . $object->id;
$nbEvent = \dol_getcache($cachekey);
$titlelist = $langs->trans("ActionsOnOrder") . (\is_numeric($nbEvent) ? '<span class="opacitymedium colorblack paddingleft">(' . $nbEvent . ')</span>' : '');
$filters = array();
<?php

$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$lineid = \GETPOSTINT('lineid');
$action = \GETPOST('action', 'aZ09');
$object = new \Propal($db);
$error = 0;
$ret = $object->fetch($id, $ref);
// Security check
$socid = '';
$result = \restrictedArea($user, 'propal', $object->id);
$usercancreate = $user->hasRight("propal", "creer");
/*
 * Actions
 */
$parameters = array('id' => $id);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 * View
 */
$title = $object->ref . " - " . $langs->trans('ContactsAddresses');
$help_url = "EN:Commercial_Proposals|FR:Proposition_commerciale|ES:Presupuestos";
$form = new \Form($db);
$formcompany = new \FormCompany($db);
$formother = new \FormOther($db);
$head = \propal_prepare_head($object);
// Proposal card
$linkback = '<a href="' . \DOL_URL_ROOT . '/comm/propal/list.php?restore_lastsearch_values=1' . (!empty($socid) ? '&socid=' . $socid : '') . '">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<div class="refidno">';
// Contacts lines (modules that overwrite templates must declare this into descriptor)
$dirtpls = \array_merge($conf->modules_parts['tpl'], array('/core/tpl'));
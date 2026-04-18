<?php

$action = \GETPOST('action', 'aZ09');
// Security check
$id = \GETPOSTINT('id');
$object = new \Project($db);
/*
 *	Actions
 */
$parameters = array('id' => $id);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 *	View
 */
$form = new \Form($db);
$object = new \Contact($db);
$result = $object->fetch($id);
$socid = !empty($object->thirdparty->id) ? $object->thirdparty->id : \null;
$title = $langs->trans("Projects");
$help_url = 'EN:Module_Third_Parties|FR:Module_Tiers|ES:Empresas';
$head = \contact_prepare_head($object);
$linkback = '<a href="' . \DOL_URL_ROOT . '/contact/list.php?restore_lastsearch_values=1">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<a href="' . \DOL_URL_ROOT . '/contact/vcard.php?id=' . $object->id . '" class="refid">';
// Projects list
$result = \show_contacts_projects($conf, $langs, $db, $object, $_SERVER["PHP_SELF"] . '?id=' . $object->id, 1);
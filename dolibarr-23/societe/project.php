<?php

$form = new \Form($db);
$action = \GETPOST('action', 'aZ09');
$massaction = \GETPOST('massaction', 'alpha');
$confirm = \GETPOST('confirm', 'alpha');
$toselect = \GETPOST('toselect', 'array:int');
// Security check
$socid = \GETPOSTINT('socid');
$result = \restrictedArea($user, 'societe', $socid, '&societe');
$object = new \Societe($db);
$permissiontodelete = $user->hasRight('societe', 'supprimer');
$parameters = array('id' => $socid);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
// List of mass actions available
$arrayofmassactions = array();
// Mass actions
$objectclass = 'Project';
$objectlabel = 'Project';
$uploaddir = $conf->societe->dir_output;
$massactionbutton = $form->selectMassAction('', $arrayofmassactions);
$result = $object->fetch($socid);
$title = $langs->trans("Projects");
$head = \societe_prepare_head($object);
$linkback = '<a href="' . \DOL_URL_ROOT . '/societe/list.php?restore_lastsearch_values=1">' . $langs->trans("BackToList") . '</a>';
$params = array();
$backtopage = $_SERVER['PHP_SELF'] . '?socid=' . $object->id;
$newcardbutton = \dolGetButtonTitle($langs->trans("NewProject"), '', 'fa fa-plus-circle', \DOL_URL_ROOT . '/projet/card.php?action=create&socid=' . $object->id . '&backtopageforcancel=' . \urlencode($backtopage), '', 1, $params);
$arrayofselected = \is_array($toselect) ? $toselect : array();
$result = \show_projects($conf, $langs, $db, $object, $_SERVER["PHP_SELF"] . '?socid=' . $object->id, 1, $newcardbutton, $massactionbutton);
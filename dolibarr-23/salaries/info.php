<?php

$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$label = \GETPOST('label', 'alphanohtml');
$projectid = \GETPOSTINT('projectid') ? \GETPOSTINT('projectid') : \GETPOSTINT('fk_project');
// Security check
$socid = \GETPOSTINT('socid');
$object = new \Salary($db);
$extrafields = new \ExtraFields($db);
$childids = $user->getAllChildIds(1);
$object = new \Salary($db);
// Check current user can read this salary
$canread = 0;
$permissiontoread = $user->hasRight('salaries', 'read');
$permissiontoadd = $user->hasRight('salaries', 'write');
// Used by the include of actions_addupdatedelete.inc.php and actions_lineupdown.inc.php
$permissiontodelete = $user->hasRight('salaries', 'delete') || $permissiontoadd && isset($object->status) && $object->status == $object::STATUS_UNPAID;
/*
 * View
 */
$form = new \Form($db);
$title = $langs->trans('Salary') . " - " . $langs->trans('Info');
$help_url = "";
$head = \salaries_prepare_head($object);
$linkback = '<a href="' . \DOL_URL_ROOT . '/salaries/list.php?restore_lastsearch_values=1' . (!empty($socid) ? '&socid=' . $socid : '') . '">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<div class="refidno">';
$userstatic = new \User($db);
$usercancreate = $permissiontoadd;
$totalpaid = $object->getSommePaiement();
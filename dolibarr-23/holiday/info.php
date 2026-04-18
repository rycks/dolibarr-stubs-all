<?php

$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$childids = $user->getAllChildIds(1);
$morefilter = '';
$object = new \Holiday($db);
$extrafields = new \ExtraFields($db);
$permissiontoapprove = $user->hasRight('holiday', 'approve');
// Check current user can read this leave request
$canread = 0;
$result = \restrictedArea($user, 'holiday', $object->id, 'holiday');
/*
 * View
 */
$form = new \Form($db);
$title = $langs->trans("Leave") . " - " . $langs->trans("Info");
$help_url = 'EN:Module_Holiday';
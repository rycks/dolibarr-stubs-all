<?php

$error = 0;
// Security check
$id = \GETPOSTINT('id');
$action = \GETPOST('action', 'aZ09');
$socid = 0;
$feature2 = $socid && $user->hasRight("user", "self", "write") ? '' : 'user';
// Retrieve needed GETPOSTS for this file
$toselect = \GETPOST('toselect', 'array');
$tokenid = \GETPOST('tokenid', 'aZ09');
$confirm = \GETPOST('confirm', 'alpha');
$module = \GETPOST('module', 'alpha');
$rights = \GETPOSTINT('rights');
$cancel = \GETPOST('cancel', 'alpha');
$backtopage = \GETPOST('backtopage', 'alpha');
// SQL query to retrieve the selected token
$sql = "SELECT oat.rowid as token_id, oat.token, oat.entity, oat.state as rights, oat.datec as date_creation, oat.tms as date_modification";
$resql = $db->query($sql);
$object = new \User($db);
$form = new \Form($db);
$token = $db->fetch_object($resql);
$entity = $conf->entity;
$result = \restrictedArea($user, 'user', $id, 'user&user', $feature2);
// $user is current user, $id is id of edited user
$canreaduser = $user->admin || $user->id == $id;
$canedittoken = $user->admin || $user->id == $id && $user->hasRight("user", "self", "write");
/*
 * Actions
 */
$parameters = array('id' => $socid);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$help_url = '';
$formconfirm = '';
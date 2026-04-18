<?php

$id = \GETPOST('id') ? \GETPOSTINT('id') : \GETPOSTINT('facid');
// For backward compatibility
$ref = \GETPOST('ref', 'alpha');
$lineid = \GETPOSTINT('lineid');
$socid = \GETPOSTINT('socid');
$action = \GETPOST('action', 'aZ09');
// Initialize a technical objects
$object = new \Availabilities($db);
$extrafields = new \ExtraFields($db);
$diroutputmassaction = $conf->bookcal->dir_output . '/temp/massgeneration/' . $user->id;
// Must be 'include', not 'include_once'. Include fetch and fetch_thirdparty but not fetch_optionals
$permissiontoread = $user->hasRight('bookcal', 'availabilities', 'read');
$permission = $user->hasRight('bookcal', 'availabilities', 'write');
$contactid = \GETPOST('userid') ? \GETPOSTINT('userid') : \GETPOSTINT('contactid');
$typeid = \GETPOST('typecontact') ? \GETPOST('typecontact') : \GETPOST('type');
$result = $object->add_contact($contactid, $typeid, \GETPOST("source", 'aZ09'));
/*
 * View
 */
$title = $langs->trans('Availabilities') . " - " . $langs->trans('ContactsAddresses');
$help_url = '';
$form = new \Form($db);
$formcompany = new \FormCompany($db);
$contactstatic = new \Contact($db);
$userstatic = new \User($db);
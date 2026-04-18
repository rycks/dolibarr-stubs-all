<?php

$id = \GETPOST('id') ? \GETPOSTINT('id') : \GETPOSTINT('facid');
// For backward compatibility
$ref = \GETPOST('ref', 'alpha');
$lineid = \GETPOSTINT('lineid');
$socid = \GETPOSTINT('socid');
$action = \GETPOST('action', 'aZ09');
// Initialize a technical objects
$object = new \Calendar($db);
$extrafields = new \ExtraFields($db);
$diroutputmassaction = $conf->bookcal->dir_output . '/temp/massgeneration/' . $user->id;
// Must be 'include', not 'include_once'. Include fetch and fetch_thirdparty but not fetch_optionals
// There is several ways to check permission.
// Set $enablepermissioncheck to 1 to enable a minimum low level of checks
$enablepermissioncheck = 0;
$contactid = \GETPOST('userid') ? \GETPOSTINT('userid') : \GETPOSTINT('contactid');
$typeid = \GETPOST('typecontact') ? \GETPOST('typecontact') : \GETPOST('type');
$result = $object->add_contact($contactid, $typeid, \GETPOST("source", 'aZ09'));
/*
 * View
 */
$title = $langs->trans('Calendar') . " - " . $langs->trans('ContactsAddresses');
$help_url = '';
$form = new \Form($db);
$formcompany = new \FormCompany($db);
$contactstatic = new \Contact($db);
$userstatic = new \User($db);
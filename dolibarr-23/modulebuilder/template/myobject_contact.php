<?php

/* Copyright (C) 2007-2017  Laurent Destailleur     <eldy@users.sourceforge.net>
 * Copyright (C) 2024-2025  Frédéric France         <frederic.france@free.fr>
 * Copyright (C) ---Replace with your own copyright and developer email---
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <https://www.gnu.org/licenses/>.
 */
/**
 *  \file       htdocs/modulebuilder/template/myobject_contact.php
 *  \ingroup    mymodule
 *  \brief      Tab for contacts linked to MyObject
 */
// Load Dolibarr environment
$res = 0;
// Try main.inc.php into web root detected using web root calculated from SCRIPT_FILENAME
$tmp = empty($_SERVER['SCRIPT_FILENAME']) ? '' : $_SERVER['SCRIPT_FILENAME'];
$tmp2 = \realpath(__FILE__);
$i = \strlen($tmp) - 1;
$j = \strlen($tmp2) - 1;
$id = \GETPOST('id') ? \GETPOSTINT('id') : \GETPOSTINT('facid');
// For backward compatibility
$ref = \GETPOST('ref', 'alpha');
$lineid = \GETPOSTINT('lineid');
$socid = \GETPOSTINT('socid');
$action = \GETPOST('action', 'aZ09');
// Initialize a technical objects
$object = new \MyObject($db);
$extrafields = new \ExtraFields($db);
$diroutputmassaction = $conf->mymodule->dir_output . '/temp/massgeneration/' . $user->id;
// Must be 'include', not 'include_once'. Include fetch and fetch_thirdparty but not fetch_optionals
// There is several ways to check permission.
// Set $enablepermissioncheck to 1 to enable a minimum low level of checks
$enablepermissioncheck = \getDolGlobalInt('MYMODULE_ENABLE_PERMISSION_CHECK');
$contactid = \GETPOST('userid') ? \GETPOSTINT('userid') : \GETPOSTINT('contactid');
$typeid = \GETPOST('typecontact') ? \GETPOST('typecontact') : \GETPOST('type');
$result = $object->add_contact($contactid, $typeid, \GETPOST("source", 'aZ09'));
/*
 * View
 */
$title = $langs->trans("MyObject") . " - " . $langs->trans('ContactsAddresses');
//$title = $object->ref." - ".$langs->trans('ContactsAddresses');
$help_url = '';
$form = new \Form($db);
$formcompany = new \FormCompany($db);
$contactstatic = new \Contact($db);
$userstatic = new \User($db);
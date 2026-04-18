<?php

/* Copyright (C) 2001-2002	Rodolphe Quiedeville	<rodolphe@quiedeville.org>
 * Copyright (C) 2003		Jean-Louis Bergamo		<jlb@j1b.org>
 * Copyright (C) 2004-2011	Laurent Destailleur		<eldy@users.sourceforge.net>
 * Copyright (C) 2012		Regis Houssin			<regis.houssin@inodbox.com>
 * Copyright (C) 2014		Florian Henry			<florian.henry@open-concept.pro>
 * Copyright (C) 2015		Jean-François Ferry		<jfefe@aternatik.fr>
 * Copyright (C) 2024       Frédéric France         <frederic.france@free.fr>
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
 *      \file       htdocs/modulebuilder/template/admin/myobject_extrafields.php
 *		\ingroup    mymodule
 *		\brief      Page to setup extra fields of myobject
 */
// Load Dolibarr environment
$res = 0;
// Try main.inc.php into web root detected using web root calculated from SCRIPT_FILENAME
$tmp = empty($_SERVER['SCRIPT_FILENAME']) ? '' : $_SERVER['SCRIPT_FILENAME'];
$tmp2 = \realpath(__FILE__);
$i = \strlen($tmp) - 1;
$j = \strlen($tmp2) - 1;
$extrafields = new \ExtraFields($db);
$form = new \Form($db);
// List of supported format
$type2label = \ExtraFields::getListOfTypesLabels();
$action = \GETPOST('action', 'aZ09');
$attrname = \GETPOST('attrname', 'alpha');
$elementtype = 'mymodule_myobject';
/*
 * View
 */
$textobject = $langs->transnoentitiesnoconv("MyObject");
$help_url = '';
$page_name = "MyModuleSetup";
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
$head = \mymoduleAdminPrepareHead();
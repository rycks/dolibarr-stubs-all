<?php

/* Copyright (C) 2004-2017  Laurent Destailleur     <eldy@users.sourceforge.net>
 * Copyright (C) 2024       Frédéric France         <frederic.france@free.fr>
 * Copyright (C) ---Replace with your own copyright and developer email---
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <https://www.gnu.org/licenses/>.
 */
/**
 * \file    htdocs/modulebuilder/template/admin/setup.php
 * \ingroup mymodule
 * \brief   MyModule setup page.
 */
// Load Dolibarr environment
$res = 0;
// Try main.inc.php into web root detected using web root calculated from SCRIPT_FILENAME
$tmp = empty($_SERVER['SCRIPT_FILENAME']) ? '' : $_SERVER['SCRIPT_FILENAME'];
$tmp2 = \realpath(__FILE__);
$i = \strlen($tmp) - 1;
$j = \strlen($tmp2) - 1;
// Parameters
$action = \GETPOST('action', 'aZ09');
$backtopage = \GETPOST('backtopage', 'alpha');
$modulepart = \GETPOST('modulepart', 'aZ09');
// Used by actions_setmoduleoptions.inc.php
$value = \GETPOST('value', 'alpha');
$label = \GETPOST('label', 'alpha');
$scandir = \GETPOST('scan_dir', 'alpha');
$type = 'myobject';
$error = 0;
$setupnotempty = 0;
// Set this to 1 to use the factory to manage constants. Warning, the generated module will be compatible with version v15+ only
$useFormSetup = 1;
$formSetup = new \FormSetup($db);
// Enter here all parameters in your setup page
// Setup conf for selection of an URL
$item = $formSetup->newItem('MYMODULE_MYPARAM1');
// Setup conf for selection of a simple string input
$item = $formSetup->newItem('MYMODULE_MYPARAM2');
// Setup conf for selection of a simple textarea input but we replace the text of field title
$item = $formSetup->newItem('MYMODULE_MYPARAM3');
// Setup conf for a selection of a Thirdparty
$item = $formSetup->newItem('MYMODULE_MYPARAM4');
$TField = array('test01' => $langs->trans('test01'), 'test02' => $langs->trans('test02'), 'test03' => $langs->trans('test03'), 'test04' => $langs->trans('test04'), 'test05' => $langs->trans('test05'), 'test06' => $langs->trans('test06'));
// Setup conf for a multiselect combo list
$item = $formSetup->newItem('MYMODULE_MYPARAM10');
// Setup conf MYMODULE_MYPARAM10
$item = $formSetup->newItem('MYMODULE_MYPARAM10');
//$item->fieldValue = '';
//$item->fieldAttr = array() ; // fields attribute only for compatible fields like input text
//$item->fieldOverride = false; // set this var to override field output will override $fieldInputOverride and $fieldOutputOverride too
//$item->fieldInputOverride = false; // set this var to override field input
//$item->fieldOutputOverride = false; // set this var to override field output
$item = $formSetup->newItem('MYMODULE_MYPARAM11')->setAsHtml();
$item = $formSetup->newItem('MYMODULE_MYPARAM12');
$dirmodels = \array_merge(array('/'), (array) $conf->modules_parts['models']);
$moduledir = 'mymodule';
$myTmpObjects = array();
$tmpobjectkey = \GETPOST('object', 'aZ09');
$maskconst = \GETPOST('maskconst', 'aZ09');
$maskvalue = \GETPOST('maskvalue', 'alpha');
$action = 'edit';
/*
 * View
 */
$form = new \Form($db);
$help_url = '';
$title = "MyModuleSetup";
// Subheader
$linkback = '<a href="' . ($backtopage ? $backtopage : \DOL_URL_ROOT . '/admin/modules.php?restore_lastsearch_values=1') . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
// Configuration header
$head = \mymoduleAdminPrepareHead();
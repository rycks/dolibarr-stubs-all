<?php

$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm', 'alpha');
$cancel = \GETPOST('cancel', 'alpha');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'productattribute';
// To manage different context of search
$backtopage = \GETPOST('backtopage', 'alpha');
$backtopageforcancel = \GETPOST('backtopageforcancel', 'alpha');
$lineid = \GETPOSTINT('lineid');
$result = \restrictedArea($user, 'variants');
$object = new \ProductAttribute($db);
$extrafields = new \ExtraFields($db);
// Must be 'include', not 'include_once'
$permissiontoread = $user->hasRight('variants', 'read');
$permissiontoadd = $user->hasRight('variants', 'write');
// Used by the include of actions_addupdatedelete.inc.php and actions_lineupdown.inc.php
$permissiontoedit = $user->hasRight('variants', 'write');
// Used by the include of actions_addupdatedelete.inc.php and actions_lineupdown.inc.php
$permissiontodelete = $user->hasRight('variants', 'delete');
$error = 0;
/*
 * Actions
 */
$parameters = array();
// Note that $action and $object may be modified by some hooks
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$error = 0;
$backurlforlist = \dolBuildUrl(\DOL_URL_ROOT . '/variants/list.php');
/*
 * View
 */
$title = $langs->trans('ProductAttributeName', \dol_htmlentities($object->label));
$help_url = 'EN:Module_Products#Variants';
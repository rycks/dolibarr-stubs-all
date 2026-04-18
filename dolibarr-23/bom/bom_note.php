<?php

// Get parameters
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$cancel = \GETPOST('cancel', 'alpha');
$backtopage = \GETPOST('backtopage', 'alpha');
// Initialize a technical objects
$object = new \BOM($db);
$extrafields = new \ExtraFields($db);
// Note that conf->hooks_modules contains array
// Massactions
$diroutputmassaction = \getMultidirOutput($object) . '/temp/massgeneration/' . $user->id;
$permissionnote = $user->hasRight('bom', 'write');
// Used by the include of actions_setnotes.inc.php
// Security check - Protection if external user
//if ($user->socid > 0) accessforbidden();
//if ($user->socid > 0) $socid = $user->socid;
$isdraft = $object->status == $object::STATUS_DRAFT ? 1 : 0;
/*
 * Actions
 */
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 * View
 */
$form = new \Form($db);
$title = $langs->trans('BillOfMaterials');
$help_url = 'EN:Module_BOM';
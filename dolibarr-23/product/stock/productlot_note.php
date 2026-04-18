<?php

// Get parameters
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
// Initialize a technical objects
$object = new \Productlot($db);
$extrafields = new \ExtraFields($db);
$diroutputmassaction = $conf->productbatch->dir_output . '/temp/massgeneration/' . $user->id;
$permissionnote = $user->hasRight('produit', 'lire');
// Used by the include of actions_setnotes.inc.php
// Security check (enable the most restrictive one)
//if ($user->socid > 0) accessforbidden();
//if ($user->socid > 0) $socid = $user->socid;
//$isdraft = (($object->status == $object::STATUS_DRAFT) ? 1 : 0);
//restrictedArea($user, $object->element, $object->id, $object->table_element, '', 'fk_soc', 'rowid', $isdraft);
//if (empty($conf->calibration->enabled)) accessforbidden();
//if (!$permissiontoread) accessforbidden();
/*
 * Actions
 */
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 * View
 */
$form = new \Form($db);
$shortlabel = \dol_trunc($object->batch, 16);
$title = $langs->trans('Batch') . " " . $shortlabel . " - " . $langs->trans('Notes');
$help_url = 'EN:Module_Products|FR:Module_Produits|ES:M&oacute;dulo_Productos';
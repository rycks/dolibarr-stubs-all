<?php

$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alphanohtml');
$action = \GETPOST('action', 'aZ09') ? \GETPOST('action', 'aZ09') : 'edit';
$confirm = \GETPOST('confirm');
$cancel = \GETPOST('cancel', 'alpha');
$backtopage = \GETPOST('backtopage', 'alpha');
$dol_openinpopup = \GETPOST('dol_openinpopup', 'aZ');
$socid = \GETPOSTINT('socid');
$label = (string) \GETPOST('label', 'alphanohtml');
$description = (string) \GETPOST('description', 'restricthtml');
$color = \preg_replace('/[^0-9a-f]/i', '', (string) \GETPOST('color', 'alphanohtml'));
$position = \GETPOSTINT('position');
$visible = \GETPOSTINT('visible');
$parent = \GETPOSTINT('parent');
// Security check
$result = \restrictedArea($user, 'categorie', $id, '&category');
$object = new \Categorie($db);
$result = $object->fetch($id, $label);
$type = $object->type;
$extrafields = new \ExtraFields($db);
$error = 0;
/*
 * Actions
 */
$parameters = array('id' => $id, 'ref' => $ref, 'cancel' => $cancel, 'backtopage' => $backtopage, 'socid' => $socid, 'label' => $label, 'description' => $description, 'color' => $color, 'position' => $position, 'visible' => $visible, 'parent' => $parent);
// Note that $action and $object may be modified by some hooks
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 * View
 */
$form = new \Form($db);
$formother = new \FormOther($db);
$doleditor = new \DolEditor('description', $object->description, '', 200, 'dolibarr_notes', '', \false, \true, \isModEnabled('fckeditor'), \ROWS_6, '90%');
$parameters = array();
$reshook = $hookmanager->executeHooks('formObjectOptions', $parameters, $object, $action);
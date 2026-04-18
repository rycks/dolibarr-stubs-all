<?php

// Security check
$socid = \GETPOSTINT('socid');
$action = \GETPOST('action', 'alpha');
$cancel = \GETPOST('cancel', 'alpha');
$origin = \GETPOST('origin', 'alpha');
$catorigin = \GETPOSTINT('catorigin');
$type = \GETPOST('type', 'aZ09');
$urlfrom = \GETPOST('urlfrom', 'alpha');
$backtopage = \GETPOST('backtopage', 'alpha');
$label = (string) \GETPOST('label', 'alphanohtml');
$description = (string) \GETPOST('description', 'restricthtml');
$color = \preg_replace('/[^0-9a-f#]/i', '', (string) \GETPOST('color', 'alphanohtml'));
$position = \GETPOSTISSET('position') ? \GETPOSTINT('position') : 1;
$visible = \GETPOSTINT('visible');
$parent = \GETPOSTINT('parent');
$idProdOrigin = 0;
$idSupplierOrigin = 0;
$idCompanyOrigin = 0;
$idMemberOrigin = 0;
$idContactOrigin = 0;
$idProjectOrigin = 0;
$idProdOrigin = 0;
$object = new \Categorie($db);
$extrafields = new \ExtraFields($db);
$error = 0;
/*
 *	Actions
 */
$parameters = array('socid' => $socid, 'origin' => $origin, 'catorigin' => $catorigin, 'type' => $type, 'urlfrom' => $urlfrom, 'backtopage' => $backtopage, 'label' => $label, 'description' => $description, 'color' => $color, 'position' => $position, 'visible' => $visible, 'parent' => $parent);
// Note that $action and $object may be modified by some hooks
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 * View
 */
$form = new \Form($db);
$formother = new \FormOther($db);
$help_url = 'EN:Module_Categories|FR:Module_Catégories|DE:Modul_Kategorien';
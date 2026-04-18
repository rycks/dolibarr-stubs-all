<?php

$error = 0;
$errors = array();
// Get parameters
$action = \GETPOST('action', 'aZ09') ? \GETPOST('action', 'aZ09') : 'view';
$cancel = \GETPOST('cancel', 'alpha');
$backtopage = \GETPOST('backtopage', 'alpha');
$confirm = \GETPOST('confirm');
$socid = \GETPOSTINT('socid') ? \GETPOSTINT('socid') : \GETPOSTINT('id');
$selectedfields = \GETPOST('selectedfields', 'alpha');
// Initialize objects
$object = new \Societe($db);
$extrafields = new \ExtraFields($db);
// Get object canvas (By default, this is not defined, so standard usage of dolibarr)
$canvas = $object->canvas ? $object->canvas : \GETPOST("canvas");
$objcanvas = \null;
// Security check
$result = \restrictedArea($user, 'societe', $socid, '&societe', '', 'fk_soc', 'rowid', 0);
/*
 * Actions
 */
$parameters = array('id' => $socid, 'objcanvas' => $objcanvas);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$id = \GETPOSTINT('id');
/*
 *  View
 */
$form = new \Form($db);
$formfile = new \FormFile($db);
$formadmin = new \FormAdmin($db);
$formcompany = new \FormCompany($db);
$result = $object->fetch($socid);
$title = $langs->trans("ThirdParty");
$help_url = 'EN:Module_Third_Parties|FR:Module_Tiers|ES:Empresas';
$countrynotdefined = $langs->trans("ErrorSetACountryFirst") . ' (' . $langs->trans("SeeAbove") . ')';
//if ($res < 0) { dol_print_error($db); exit; }
$head = \societe_prepare_head($object);
$linkback = '<a href="' . \DOL_URL_ROOT . '/societe/list.php?restore_lastsearch_values=1">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<a href="' . \DOL_URL_ROOT . '/societe/vcard.php?id=' . $socid . '" class="refid">';
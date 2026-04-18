<?php

$socid = \GETPOSTINT('socid');
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'alpha');
// Security check
$socid = 0;
$result = \restrictedArea($user, 'contrat', $id);
/*
 *	View
 */
$title = $langs->trans("Contract") . ' - ' . $langs->trans("Tickets");
$help_url = 'EN:Module_Contracts|FR:Module_Contrat|ES:Contratos_de_servicio';
$form = new \Form($db);
$userstatic = new \User($db);
$object = new \Contrat($db);
$result = $object->fetch($id, $ref);
$ret = $object->fetch_thirdparty();
$head = \contract_prepare_head($object);
$linkback = '<a href="' . \DOL_URL_ROOT . '/contrat/list.php' . (!empty($socid) ? '?socid=' . $socid : '') . '">';
$morehtmlref = '';
/*
 * Referrers types
 */
$title = $langs->trans("ListTicketsLinkToContract");
// on récupère la totalité des tickets liés au contrat
$allticketarray = $object->getTicketsArray();
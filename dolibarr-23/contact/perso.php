<?php

$id = \GETPOSTINT('id');
$action = \GETPOST('action', 'aZ09');
$result = \restrictedArea($user, 'contact', $id, 'socpeople&societe');
$object = new \Contact($db);
$errors = array();
$ret = $object->fetch($id);
$result = $object->update_perso($id, $user);
/*
 *	View
 */
$now = \dol_now();
$title = $langs->trans("ContactPersonalData");
$help_url = 'EN:Module_Third_Parties|FR:Module_Tiers|ES:Empresas';
$form = new \Form($db);
$formcompany = new \FormCompany($db);
$head = \contact_prepare_head($object);
$caneditfield = 1;
$form = new \Form($db);
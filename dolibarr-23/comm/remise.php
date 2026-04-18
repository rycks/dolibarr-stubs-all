<?php

$id = \GETPOSTINT("id");
$socid = \GETPOSTINT('id') ? \GETPOSTINT('id') : \GETPOSTINT('socid');
$backtopage = \GETPOST('backtopage', 'alpha');
$cancel = \GETPOST('cancel', 'alpha');
$action = \GETPOST('action', 'aZ09');
$result = \restrictedArea($user, 'societe', $id, '&societe', '', 'fk_soc', 'rowid', 0);
$object = new \Societe($db);
$discount_type = \GETPOSTINT('discount_type');
/*
 * View
 */
$form = new \Form($db);
// On recupere les donnees societes par l'objet
$object = new \Societe($db);
$title = $object->name;
$head = \societe_prepare_head($object);
$isCustomer = $object->client == 1 || $object->client == 3;
$isSupplier = $object->fournisseur == 1;
/*
 * List log of all customer percent discounts
 */
$sql = "SELECT rc.rowid, rc.remise_client as remise_percent, rc.note, rc.datec as dc,";
$resql = $db->query($sql);
/*
 * List log of all supplier percent discounts
 */
$sql = "SELECT rc.rowid, rc.remise_supplier as remise_percent, rc.note, rc.datec as dc,";
$resql = $db->query($sql);
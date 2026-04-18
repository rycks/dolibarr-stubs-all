<?php

$action = \GETPOST('action', 'alpha');
$cancel = \GETPOST('cancel', 'alpha');
$id = \GETPOSTINT('id');
$_socid = \GETPOSTINT("id");
// Security check
$socid = \GETPOSTINT("socid");
$result = \restrictedArea($user, 'societe', $id, '&societe', '', 'fk_soc', 'rowid', 0);
$userstatic = new \User($db);
// We load data of thirdparty
$objsoc = new \Societe($db);
$head = \societe_prepare_head($objsoc);
$tabchoice = '';
/*
 * List historic of multiprices
 */
$sql = "SELECT rc.rowid,rc.price_level, rc.datec as dc, u.rowid as uid, u.login";
$resql = $db->query($sql);
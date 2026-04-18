<?php

// Security check
$result = \restrictedArea($user, 'bom|mrp');
$max = \getDolGlobalInt('MAIN_SIZE_SHORTLIST_LIMIT', 5);
/*
 * View
 */
$staticbom = new \BOM($db);
$staticmo = new \Mo($db);
$title = $langs->trans('MRP');
$help_url = 'EN:Module_Manufacturing_Orders|FR:Module_Ordres_de_Fabrication|DE:Modul_Fertigungsauftrag';
$sql = "SELECT COUNT(t.rowid) as nb, status";
$resql = $db->query($sql);
$sql = "SELECT a.rowid, a.status, a.ref, a.tms as datem, a.status, a.fk_product";
$resql = $db->query($sql);
$sql = "SELECT a.rowid, a.status, a.ref, a.tms as datem, a.status";
$sql = "SELECT a.rowid, a.status, a.ref, a.tms as datem, a.status";
$resql = $db->query($sql);
$object = new \stdClass();
$parameters = array(
    //'type' => $type,
    'user' => $user,
);
$reshook = $hookmanager->executeHooks('dashboardMRP', $parameters, $object);
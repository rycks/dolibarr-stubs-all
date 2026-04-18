<?php

$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm');
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref');
// Get parameters
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT('page');
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$object = new \Commande($db);
$usercancreate = $user->hasRight("commande", "creer");
$permissiontoadd = $usercancreate;
$result = \restrictedArea($user, 'commande', $id, '');
/*
 * View
 */
$title = $object->ref . " - " . $langs->trans('Documents');
$help_url = 'EN:Customers_Orders|FR:Commandes_Clients|ES:Pedidos de clientes|DE:Modul_Kundenaufträge';
$form = new \Form($db);
<?php

$action = \GETPOST('action', 'aZ09');
$entity = $conf->entity;
/*
 * View
 */
$form = new \Form($db);
$wikihelp = 'EN:Setup_Security|FR:Paramétrage_Sécurité|ES:Configuración_Seguridad';
// Search all modules with permission and reload permissions def.
$modules = array();
$modulesdir = \dolGetModulesDirs();
$head = \security_prepare_head();
//print "xx".$conf->global->MAIN_USE_ADVANCED_PERMS;
$sql = "SELECT r.id, r.libelle as label, r.module, r.perms, r.subperms, r.module_position, r.bydefault";
$result = $db->query($sql);
$parameters = array();
$reshook = $hookmanager->executeHooks('insertExtraFooter', $parameters, $object, $action);
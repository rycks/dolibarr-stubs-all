<?php

$mode = \GETPOST('mode', 'aZ09');
$categstatic = new \Categorie($db);
$permissiontoread = $user->hasRight('categorie', 'read');
$permissiontoadd = $user->hasRight('categorie', 'write');
/*
 * View
 */
$title = $langs->trans("Categories");
// Get number of tags per category type
$countobjects = [];
$sql = "SELECT type as idtype, COUNT(rowid) as nb";
$resql = $db->query($sql);
// Get list of category type
$arrayofcateg = array();
$arrayofcateg = \dol_sort_array($arrayofcateg, 'labelwithoutaccent', 'asc', 1, 0, 1);
// Define $nbmodulesnotautoenabled - TODO This code is at different places
$nbmodulesnotautoenabled = \count($conf->modules);
$listofmodulesautoenabled = array('user', 'agenda', 'fckeditor', 'export', 'import');
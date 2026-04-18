<?php

$object = $GLOBALS['objcanvas']->control->object;
$head = \societe_prepare_head($object);
/*
 * Generated documents
 */
$filedir = $conf->societe->multidir_output[$this->control->tpl['entity']] . '/' . $socid;
$urlsource = $_SERVER["PHP_SELF"] . "?socid=" . $socid;
$genallowed = $user->hasRight('societe', 'lire');
$delallowed = $user->hasRight('societe', 'creer');
// Subsidiaries list
$result = \show_subsidiaries($conf, $langs, $db, $object);
// Contacts list
$result = \show_contacts($conf, $langs, $db, $object);
// Projects list
$result = \show_projects($conf, $langs, $db, $object, $_SERVER["PHP_SELF"] . '?socid=' . $object->id, 1, '', '');
<?php

$soc = $GLOBALS['objcanvas']->control->object;
$head = \societe_prepare_head($soc);
/*
 * Generated documents
 */
$filedir = $conf->societe->multidir_output[$this->control->tpl['entity']] . '/' . $socid;
$urlsource = $_SERVER["PHP_SELF"] . "?socid=" . $socid;
$genallowed = $user->hasRight('societe', 'lire');
$delallowed = $user->hasRight('societe', 'creer');
// Subsidiaries list
$result = \show_subsidiaries($conf, $langs, $db, $soc);
// Contacts list
$result = \show_contacts($conf, $langs, $db, $soc);
// Projects list
$result = \show_projects($conf, $langs, $db, $soc, $_SERVER["PHP_SELF"] . '?socid=' . $socid, 1, '', '');
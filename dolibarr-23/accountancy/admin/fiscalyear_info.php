<?php

$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha') ? \GETPOST('ref', 'alpha') : \GETPOST('label', 'alpha');
$object = new \Fiscalyear($db);
/*
 * Actions
 */
// None
/*
 * View
 */
$title = $langs->trans("Fiscalyear") . " - " . $langs->trans("Info");
$help_url = 'EN:Module_Double_Entry_Accounting#Setup|FR:Module_Comptabilit&eacute;_en_Partie_Double#Configuration';
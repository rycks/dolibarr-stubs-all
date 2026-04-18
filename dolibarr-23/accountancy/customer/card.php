<?php

$action = \GETPOST('action', 'aZ09');
$cancel = \GETPOST('cancel', 'alpha');
$backtopage = \GETPOST('backtopage', 'alpha');
$codeventil = \GETPOSTINT('codeventil');
$id = \GETPOSTINT('id');
/*
 * View
 */
$help_url = 'EN:Module_Double_Entry_Accounting|FR:Module_Comptabilit&eacute;_en_Partie_Double#Liaisons_comptables';
/*
 * Create
 */
$form = new \Form($db);
$facture_static = new \Facture($db);
$formaccounting = new \FormAccounting($db);
$sql = "SELECT f.ref, f.rowid as facid, l.fk_product, l.description, l.price,";
$result = $db->query($sql);
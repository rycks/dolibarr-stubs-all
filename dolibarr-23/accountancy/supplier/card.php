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
// Create
$form = new \Form($db);
$facturefournisseur_static = new \FactureFournisseur($db);
$formaccounting = new \FormAccounting($db);
$sql = "SELECT f.ref as ref, f.rowid as facid, l.fk_product, l.description, l.rowid, l.fk_code_ventilation, ";
$result = $db->query($sql);
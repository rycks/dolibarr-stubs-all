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
$expensereport_static = new \ExpenseReport($db);
$formaccounting = new \FormAccounting($db);
$sql = "SELECT er.ref, er.rowid as facid, erd.fk_c_type_fees, erd.comments, erd.rowid, erd.fk_code_ventilation,";
$result = $db->query($sql);
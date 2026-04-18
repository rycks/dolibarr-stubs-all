<?php

$action = \GETPOST('action', 'aZ09');
$socid = 0;
$MAXLINESFORTRANSFERT = 20;
$error = 0;
/*
 * Actions
 */
$parameters = array('socid' => $socid);
$dateo = array();
$label = array();
$amount = array();
$amountto = array();
$accountfrom = array();
$accountto = array();
$type = array();
$number = array();
$tabnum = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$i = 1;
$n = 1;
/*
 * View
 */
$form = new \Form($db);
$help_url = 'EN:Module_Banks_and_Cash|FR:Module_Banques_et_Caisses|ES:M&oacute;dulo_Bancos_y_Cajas';
$title = $langs->trans('MenuBankInternalTransfer');
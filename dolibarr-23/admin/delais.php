<?php

$action = \GETPOST('action', 'aZ09');
// Define list of managed delays
$modules = array('agenda' => array(array('code' => 'MAIN_DELAY_ACTIONS_TODO', 'img' => 'action')), 'projet' => array(array('code' => 'MAIN_DELAY_PROJECT_TO_CLOSE', 'img' => 'project'), array('code' => 'MAIN_DELAY_TASKS_TODO', 'img' => 'projecttask')), 'propal' => array(array('code' => 'MAIN_DELAY_PROPALS_TO_CLOSE', 'img' => 'propal'), array('code' => 'MAIN_DELAY_PROPALS_TO_BILL', 'img' => 'propal')), 'commande' => array(array('code' => 'MAIN_DELAY_ORDERS_TO_PROCESS', 'img' => 'order')), 'facture' => array(array('code' => 'MAIN_DELAY_CUSTOMER_BILLS_UNPAYED', 'img' => 'bill')), 'fournisseur' => array(array('code' => 'MAIN_DELAY_SUPPLIER_ORDERS_TO_PROCESS', 'img' => 'order'), array('code' => 'MAIN_DELAY_SUPPLIER_BILLS_TO_PAY', 'img' => 'bill'), array('code' => 'MAIN_DELAY_SUPPLIER_PROPALS_TO_CLOSE', 'img' => 'propal'), array('code' => 'MAIN_DELAY_SUPPLIER_PROPALS_TO_BILL', 'img' => 'propal')), 'service' => array(array('code' => 'MAIN_DELAY_NOT_ACTIVATED_SERVICES', 'img' => 'service'), array('code' => 'MAIN_DELAY_RUNNING_SERVICES', 'img' => 'service')), 'banque' => array(array('code' => 'MAIN_DELAY_TRANSACTIONS_TO_CONCILIATE', 'img' => 'account'), array('code' => 'MAIN_DELAY_CHEQUES_TO_DEPOSIT', 'img' => 'account')), 'adherent' => array(array('code' => 'MAIN_DELAY_MEMBERS', 'img' => 'user')), 'expensereport' => array(array('code' => 'MAIN_DELAY_EXPENSEREPORTS', 'img' => 'trip')), 'holiday' => array(array('code' => 'MAIN_DELAY_HOLIDAYS', 'img' => 'holiday')), 'mrp' => array(array('code' => 'MAIN_DELAY_MRP', 'img' => 'mrp')));
$labelmeteo = array(0 => $langs->trans("No"), 1 => $langs->trans("Yes"), 2 => $langs->trans("OnMobileOnly"));
// For update value with percentage
$plus = '';
$action = 'edit';
/*
 * View
 */
$form = new \Form($db);
$str_mode_std = \null;
$str_mode_percentage = \null;
$offset = 0;
$cursor = 10;
// By default
$level0 = $offset;
$level1 = $offset + $cursor;
$level2 = $offset + 2 * $cursor;
$level3 = $offset + 3 * $cursor;
$text = '';
$options = 'class="valignmiddle" height="60px"';
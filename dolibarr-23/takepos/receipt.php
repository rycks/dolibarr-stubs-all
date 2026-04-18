<?php

$place = \GETPOST('place', 'aZ09') ? \GETPOST('place', 'aZ09') : 0;
// $place is id of table for Bar or Restaurant
$facid = \GETPOSTINT('facid');
$action = \GETPOST('action', 'aZ09');
$gift = \GETPOSTINT('gift');
$sql = "SELECT rowid FROM " . \MAIN_DB_PREFIX . "facture";
$resql = $db->query($sql);
$obj = $db->fetch_object($resql);
$object = new \Facture($db);
$constFreeText = 'TAKEPOS_HEADER' . (empty($_SESSION['takeposterminal']) ? '0' : $_SESSION['takeposterminal']);
$newfreetext = '';
$substitutionarray = \getCommonSubstitutionArray($langs);
$canprintifnotvalidate = \true;
// Show if it is a duplicata
$isADuplicata = $object->pos_print_counter >= 2;
$qty = \GETPOSTINT('qty') > 0 ? \GETPOSTINT('qty') : 1;
$multicurrency = new \MultiCurrency($db);
$constFreeText = 'TAKEPOS_FOOTER' . (empty($_SESSION['takeposterminal']) ? '0' : $_SESSION['takeposterminal']);
$newfreetext = '';
$substitutionarray = \getCommonSubstitutionArray($langs);
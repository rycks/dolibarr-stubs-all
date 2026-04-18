<?php

\define('NOTOKENRENEWAL', '1');
\define('NOREQUIREMENU', '1');
\define('NOREQUIREAJAX', '1');
/**
 * @var Conf $conf
 * @var DoliDB $db
 * @var HookManager $hookmanager
 * @var Societe $mysoc
 * @var Translate $langs
 * @var User $user
 */
$id = \GETPOSTINT('id');
$action = \GETPOST('action', 'aZ09');
// 'getSellerVATRates' or 'getBuyerVATRates'
$htmlname = \GETPOST('htmlname', 'alpha');
$selected = \GETPOST('selected') ? \GETPOST('selected') : '-1';
$productid = \GETPOSTINT('productid') ? \GETPOSTINT('productid') : 0;
// Security check
$result = \restrictedArea($user, 'societe', $id, '&societe', '', 'fk_soc', 'rowid', 0);
$form = new \Form($db);
$soc = new \Societe($db);
$return = array();
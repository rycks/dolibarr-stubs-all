<?php

$limit = \GETPOSTINT('limit');
// Security check
$socid = \GETPOSTINT('socid');
$result = \restrictedArea($user, 'tax', '', '', 'charges');
$ltt = \GETPOSTINT("localTaxType");
$mode = \GETPOST('mode', 'alpha');
$localtax_static = new \Localtax($db);
$url = \DOL_URL_ROOT . '/compta/localtax/card.php?action=create&localTaxType=' . $ltt;
$param = '';
$newcardbutton = '';
$sql = "SELECT rowid, amount, label, f.datev, f.datep";
$result = $db->query($sql);
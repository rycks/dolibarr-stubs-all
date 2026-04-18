<?php

$productref = '';
$pdluoid = \GETPOSTINT('pdluoid');
$pdluo = new \Productbatch($db);
$result = $pdluo->fetch($pdluoid);
// Label
$valformovementlabel = \GETPOST("label") ? \GETPOST("label") : $langs->trans("MovementTransferStock", $productref);
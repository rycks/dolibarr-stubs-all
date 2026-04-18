<?php

\define('NOTOKENRENEWAL', '1');
\define('NOREQUIREMENU', '1');
\define('NOREQUIREHTML', '1');
\define('NOREQUIREAJAX', '1');
\define('NOREQUIRESOC', '1');
$result = \restrictedArea($user, 'variants');
$id = \GETPOSTINT('id');
$prodattr = new \ProductAttribute($db);
$prodattrval = new \ProductAttributeValue($db);
$res = $prodattrval->fetchAllByProductAttribute($id, \false, 1);
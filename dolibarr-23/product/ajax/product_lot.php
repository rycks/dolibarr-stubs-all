<?php

\define('NOTOKENRENEWAL', '1');
\define('NOREQUIREMENU', '1');
\define('NOREQUIREHTML', '1');
\define('NOREQUIREAJAX', '1');
\define('NOBROWSERNOTIF', '1');
/**
 * @var Conf $conf
 * @var DoliDB $db
 * @var HookManager $hookmanager
 * @var Translate $langs
 * @var User $user
 */
$action = \GETPOST('action', 'aZ09');
$productId = \GETPOSTINT('product_id');
$batch = \GETPOST('batch', 'alphanohtml');
$permissiontoread = $user->hasRight('stock', 'lire');
$rows = array();
$productLot = new \Productlot($db);
$result = $productLot->fetch(0, $productId, $batch);
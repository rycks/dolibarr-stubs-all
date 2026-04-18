<?php

\define('NOREQUIRESOC', '1');
\define('NOCSRFCHECK', '1');
\define('NOTOKENRENEWAL', '1');
\define('NOREQUIREMENU', '1');
\define('NOREQUIREHTML', '1');
\define('NOREQUIREAJAX', '1');
// Load $user and permissions
/**
 * @var DoliDB $db
 * @var Translate $langs
 * @var User $user
 */
$warehouse_id = \GETPOSTINT('warehouse_id');
$batch = \GETPOST('batch', 'alphanohtml');
$product_id = \GETPOSTINT('product_id');
$action = \GETPOST('action', 'alphanohtml');
$result = \restrictedArea($user, 'expedition');
$permissiontowrite = $user->hasRight('expedition', 'write');
$is_eat_by_enabled = !\getDolGlobalInt('PRODUCT_DISABLE_EATBY');
$is_sell_by_enabled = !\getDolGlobalInt('PRODUCT_DISABLE_SELLBY');
$resArr = array();
$sql = "SELECT pb.batch, pb.rowid, ps.fk_entrepot, pb.qty, e.ref as label, ps.fk_product";
$resql = $db->query($sql);
<?php

\define('NOREQUIRESOC', '1');
\define('NOCSRFCHECK', '1');
\define('NOTOKENRENEWAL', '1');
\define('NOREQUIREMENU', '1');
\define('NOREQUIREHTML', '1');
\define('NOREQUIREAJAX', '1');
// Load $user and permissions
/**
 * @var Conf $conf
 * @var DoliDB $db
 * @var HookManager $hookmanager
 * @var Translate $langs
 * @var User $user
 */
$warehouse_id = \GETPOSTINT('warehouse_id');
$batch = \GETPOST('batch', 'alphanohtml');
$fk_product = \GETPOSTINT('product_id');
$action = \GETPOST('action', 'alphanohtml');
$result = \restrictedArea($user, 'mrp');
$permissiontoproduce = $user->hasRight('mrp', 'write');
$TRes = array();
$sql = "SELECT pb.batch, pb.rowid, ps.fk_entrepot, pb.qty, e.ref as label, ps.fk_product";
$resql = $db->query($sql);
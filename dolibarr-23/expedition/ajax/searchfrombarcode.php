<?php

\define('NOTOKENRENEWAL', 1);
\define('NOREQUIREMENU', '1');
\define('NOREQUIREHTML', '1');
\define('NOREQUIREAJAX', '1');
\define('NOREQUIRESOC', '1');
/**
 * @var Conf $conf
 * @var DoliDB $db
 * @var HookManager $hookmanager
 * @var Translate $langs
 * @var User $user
 */
$action = \GETPOST("action", "alpha");
$barcode = \GETPOST("barcode", "aZ09");
$response = "";
$fk_entrepot = \GETPOSTINT("fk_entrepot");
$fk_inventory = \GETPOSTINT("fk_inventory");
$fk_product = \GETPOSTINT("fk_product");
$reelqty = \GETPOSTINT("reelqty");
$batch = \GETPOST("batch", "aZ09");
$mode = \GETPOST("mode", "aZ");
$warehousefound = 0;
$warehouseid = 0;
$objectreturn = array();
$usesublevelpermission = '';
$object = new \Product($db);
$result = \restrictedArea($user, $object->module, $object, $object->table_element, $usesublevelpermission, 'fk_soc', 'rowid', 0, 1);
$result = $db->query($sql);
$response = \json_encode($response);
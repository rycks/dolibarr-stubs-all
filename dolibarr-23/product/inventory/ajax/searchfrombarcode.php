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
$warehouse = new \Entrepot($db);
$action = \GETPOST("action", "alpha");
$barcode = \GETPOST("barcode", "aZ09");
$product = \GETPOST("product");
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
$result = $db->query($sql);
$inventoryline = new \InventoryLine($db);
$response = \json_encode($response);
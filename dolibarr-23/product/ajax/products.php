<?php

\define('NOTOKENRENEWAL', 1);
\define('NOREQUIREMENU', '1');
\define('NOREQUIREHTML', '1');
\define('NOREQUIREAJAX', '1');
/**
 * @var Conf $conf
 * @var DoliDB $db
 * @var HookManager $hookmanager
 * @var Societe $mysoc
 * @var Translate $langs
 * @var User $user
 */
$htmlname = \GETPOST('htmlname', 'aZ09');
$socid = \GETPOSTINT('socid');
// type can be empty string or 0 or 1
$type = \GETPOST('type', 'int');
$mode = \GETPOSTINT('mode');
$status = \GETPOSTINT('status') >= 0 ? \GETPOSTINT('status') : -1;
// status buy when mode = customer , status purchase when mode = supplier
$status_purchase = \GETPOSTINT('status_purchase') >= 0 ? \GETPOSTINT('status_purchase') : -1;
// status purchase when mode = customer
$outjson = \GETPOSTINT('outjson') ? \GETPOSTINT('outjson') : 0;
$price_level = \GETPOSTINT('price_level');
$action = \GETPOST('action', 'aZ09');
$id = \GETPOSTINT('id');
$price_by_qty_rowid = \GETPOSTINT('pbq');
$finished = \GETPOSTINT('finished');
$alsoproductwithnosupplierprice = \GETPOSTINT('alsoproductwithnosupplierprice');
$warehouseStatus = \GETPOST('warehousestatus', 'alpha');
$hidepriceinlabel = \GETPOSTINT('hidepriceinlabel');
$warehouseId = \GETPOSTINT('warehouseid');
$outjson = array();
$object = new \Product($db);
$ret = $object->fetch($id);
<?php

\define('NOTOKENRENEWAL', '1');
\define('NOREQUIREMENU', '1');
\define('NOREQUIREAJAX', '1');
\define('NOREQUIRESOC', '1');
/**
 * @var Conf $conf
 * @var DoliDB $db
 * @var HookManager $hookmanager
 * @var Translate $langs
 * @var User $user
 */
$idprod = \GETPOSTINT('idprod');
$prices = array();
$object = new \ProductFournisseur($db);
$sorttouse = 's.nom, pfp.quantity, pfp.price';
$productSupplierArray = $object->list_product_fournisseur_price($idprod, $sorttouse);
// Add price for costprice (at end)
$price = $object->cost_price;
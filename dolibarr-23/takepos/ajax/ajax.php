<?php

\define('NOTOKENRENEWAL', '1');
\define('NOREQUIREMENU', '1');
\define('NOREQUIREHTML', '1');
\define('NOREQUIREAJAX', '1');
\define('NOBROWSERNOTIF', '1');
$category = \GETPOST('category', 'alphanohtml');
// Can be id of category or 'supplements'
$action = \GETPOST('action', 'aZ09');
$term = \GETPOST('term', 'alpha');
$search_term = \GETPOST('search_term', 'alpha');
$id = \GETPOSTINT('id');
$search_start = \GETPOSTINT('search_start');
$search_limit = \GETPOSTINT('search_limit');
// new context for product search hooks
$pricelevel = 1;
// default price level if PRODUIT_MULTIPRICES. TODO Get price level from thirdparty.
/*
 * View
 */
$thirdparty = new \Societe($db);
$tosell = \GETPOSTISSET('tosell') ? \GETPOSTINT('tosell') : '';
$limit = \GETPOSTISSET('limit') ? \GETPOSTINT('limit') : 0;
$offset = \GETPOSTISSET('offset') ? \GETPOSTINT('offset') : 0;
$object = new \Categorie($db);
$result = $object->fetch($category);
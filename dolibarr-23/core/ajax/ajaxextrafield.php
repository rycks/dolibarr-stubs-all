<?php

// Disables token renewal
\define('NOTOKENRENEWAL', 1);
\define('NOREQUIREMENU', '1');
\define('NOREQUIREHTML', '1');
\define('NOREQUIREAJAX', '1');
\define('NOHEADERNOFOOTER', '1');
/**
 * @var Conf $conf
 * @var DoliDB $db
 * @var Translate $langs
 * @var User $user
 */
// object id
$objectid = \GETPOST('objectid', 'aZ09');
// 'module' or 'myobject@mymodule', 'mymodule_myobject'
$objecttype = \GETPOST('objecttype', 'aZ09arobase');
$objectkey = \GETPOST('objectkey', 'restricthtml');
$search = \GETPOST('search', 'restricthtml');
$page = \GETPOSTINT('page');
$mode = \GETPOST('mode', 'aZ09');
$value = \GETPOST('value', 'alphanohtml');
$limit = 10;
$offset = ($page - 1) * $limit;
$element_ref = '';
// Load object according to $element
$object = \fetchObjectByElement($objectid, $objecttype, $element_ref);
$module = $object->module;
$element = $object->element;
$usesublevelpermission = $module != $element ? $element : '';
$data = ['results' => [], 'pagination' => ['more' => \true]];
$i = 0;
$extrafields = new \ExtraFields($db);
$options = $extrafields->attributes[$element]['param'][$objectkey]['options'];
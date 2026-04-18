<?php

// Disables token renewal
\define('NOTOKENRENEWAL', 1);
\define('NOREQUIREMENU', '1');
\define('NOREQUIREHTML', '1');
\define('NOREQUIREAJAX', '1');
\define('NOHEADERNOFOOTER', '1');
// object id
$objectid = \GETPOST('objectid', 'aZ09');
// 'module' or 'myobject@mymodule', 'mymodule_myobject'
$objecttype = \GETPOST('objecttype', 'aZ09arobase');
$objectkey = \GETPOST('objectkey', 'restricthtml');
$search = \GETPOST('search', 'restricthtml');
$page = \GETPOSTINT('page');
$mode = \GETPOST('mode', 'aZ09');
$value = \GETPOST('value', 'alphanohtml');
$dependencyvalue = \GETPOST('dependencyvalue', 'alphanohtml');
$limit = 10;
$element_ref = '';
// Load object according to $element
$object = \fetchObjectByElement($objectid, $objecttype, $element_ref);
$module = $object->module;
$element = $object->element;
$usesublevelpermission = $module != $element ? $element : '';
$data = ['results' => [], 'pagination' => ['more' => \true]];
$nbResult = 0;
$extrafields = new \ExtraFields($db);
$fieldManager = new \FieldsManager($db);
$fieldInfos = $fieldManager->getFieldsInfos($objectkey, $object, $extrafields, $mode);
$field = $fieldManager->getFieldClass($fieldInfos->type);
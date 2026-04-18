<?php

\define('NOTOKENRENEWAL', 1);
\define('NOREQUIREMENU', '1');
\define('NOREQUIREHTML', '1');
\define('NOREQUIREAJAX', '1');
\define('NOHEADERNOFOOTER', '1');
/**
 * @var Conf $conf
 * @var DoliDB $db
 * @var HookManager $hookmanager
 * @var Translate $langs
 * @var User $user
 */
$id = \GETPOST('id', 'aZ09');
$objecttype = \GETPOST('objecttype', 'aZ09arobase');
// 'module' or 'myobject@mymodule', 'mymodule_myobject'
$params = array('fromajaxtooltip' => 1);
$element_ref = '';
// Load object according to $element
$object = \fetchObjectByElement($id, $objecttype, $element_ref);
$module = $object->module;
$element = $object->element;
$usesublevelpermission = $module != $element ? $element : '';
$html = '';
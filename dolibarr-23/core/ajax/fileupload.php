<?php

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
$id = \GETPOSTINT('fk_element');
$element = \GETPOST('element', 'alpha');
// 'myobject' (myobject=mymodule) or 'myobject@mymodule' or 'myobject_mysubobject' (myobject=mymodule)
$elementupload = $element;
// Load object according to $id and $element
$object = \fetchObjectByElement($id, $element);
$module = $object->module;
$element = $object->element;
$usesublevelpermission = $module != $element ? $element : '';
$socid = $user->socid;
$result = \restrictedArea($user, $object->module, $object, $object->table_element, $usesublevelpermission, 'fk_soc', 'rowid', 0, 1);
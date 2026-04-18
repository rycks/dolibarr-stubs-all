<?php

\define('NOTOKENRENEWAL', '1');
\define('NOREQUIREMENU', '1');
\define('NOREQUIREHTML', '1');
\define('NOREQUIREAJAX', '1');
\define('NOREQUIRESOC', '1');
$action = \GETPOST('action', 'aZ09');
$backtopage = \GETPOST('backtopage');
$id = \GETPOSTINT('id');
$element = \GETPOST('element', 'alpha');
// 'myobject' (myobject=mymodule) or 'myobject@mymodule' or 'myobject_mysubobject' (myobject=mymodule)
$field = \GETPOST('field', 'alpha');
$value = \GETPOSTINT('value');
$format = 'int';
// Load object according to $id and $element
$object = \fetchObjectByElement($id, $element);
$module = $object->module;
$element = $object->element;
$usesublevelpermission = $module != $element ? $element : '';
$socid = $user->socid;
// Test on permission already done in header according to object and field.
$triggerkey = \strtoupper(($module != $element ? $module . '_' : '') . $element) . '_UPDATE';
$result = $object->setValueFrom($field, $value, $object->table_element, $id, $format, '', $user, $triggerkey);
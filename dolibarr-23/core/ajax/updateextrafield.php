<?php

\define('NOTOKENRENEWAL', 1);
\define('NOREQUIREMENU', '1');
\define('NOREQUIREHTML', '1');
\define('NOREQUIREAJAX', '1');
\define('NOREQUIRESOC', '1');
/**
 * @var Conf $conf
 * @var DoliDB $db
 * @var ExtraFields $extrafields
 * @var HookManager $hookmanager
 * @var Translate $langs
 * @var User $user
 */
$objectType = \GETPOST('objectType', 'aZ09');
// modulepart
$objectId = \GETPOST('objectId', 'aZ09');
$field = \GETPOST('field', 'aZ09');
$value = \GETPOST('value', 'alpha');
$module = \getElementProperties($objectType)['module'];
$element_ref = '';
$object = \fetchObjectByElement($objectId, $objectType, $element_ref);
$module = $object->module;
$element = $object->element;
// Security check
$usesublevelpermission = $module != $element ? $element : '';
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
$field = \GETPOST('field', 'alpha');
$element = \GETPOST('element', 'alpha');
$table_element = \GETPOST('table_element', 'alpha');
$fk_element = \GETPOST('fk_element', 'alpha');
// Load object according to $id and $element
$element_ref = '';
$object = \fetchObjectByElement($id, $element, $element_ref);
$module = $object->module;
$element = $object->element;
$usesublevelpermission = $module != $element ? $element : '';
//print $object->id.' - '.$object->module.' - '.$object->element.' - '.$object->table_element.' - '.$usesublevelpermission."\n";
// Security check
$result = \restrictedArea($user, $object->module, $object, $object->table_element, $usesublevelpermission, 'fk_soc', 'rowid', 0, 1);
$ext_element = \GETPOST('ext_element', 'alpha');
$field = \substr($field, 8);
// remove prefix val_
$type = \GETPOST('type', 'alpha');
$loadmethod = \GETPOST('loadmethod', 'alpha') ? \GETPOST('loadmethod', 'alpha') : 'getValueFrom';
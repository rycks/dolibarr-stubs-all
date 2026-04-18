<?php

\define('NOTOKENRENEWAL', '1');
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
$id = \GETPOSTINT('id');
$element = \GETPOST('element', 'aZ09arobase');
$htmlelement = \GETPOST('htmlelement', 'alpha');
$type = \GETPOST('type', 'alpha');
// Load object according to $id and $element
$object = \fetchObjectByElement($id, $element);
$module = $object->module;
$element = $object->element;
$usesublevelpermission = $module != $element ? $element : '';
//print $object->id.' - '.$object->module.' - '.$object->element.' - '.$object->table_element.' - '.$usesublevelpermission."\n";
// Security check
$result = \restrictedArea($user, $object->module, $object, $object->table_element, $usesublevelpermission, 'fk_soc', 'rowid', 0, 1);
$value = \GETPOST('value', 'alpha');
$params = array();
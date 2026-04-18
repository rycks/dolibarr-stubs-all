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
$field = \GETPOST('field', 'alpha', 2);
$element = \GETPOST('element', 'alpha', 2);
$table_element = \GETPOST('table_element', 'alpha', 2);
$fk_element = \GETPOST('fk_element', 'alpha', 2);
$id = $fk_element;
// Load object according to $id and $element
$element_ref = '';
$object = \fetchObjectByElement($id, $element, $element_ref);
$module = $object->module;
$element = $object->element;
$usesublevelpermission = $module != $element ? $element : '';
// Security check
$result = \restrictedArea($user, $object->module, $object, $object->table_element, $usesublevelpermission, 'fk_soc', 'rowid', 0, 1);
$field = \preg_replace('/^editval_/', '', $field);
// remove prefix "editval_"
$type = \GETPOST('type', 'alpha', 2);
// type string by default
$value = $type == 'ckeditor' ? \GETPOST('value', '', 2) : \GETPOST('value', 'alpha', 2);
//$ext_element = GETPOST('ext_element', 'alpha', 2);
$ext_element = 'notused';
//$savemethod = GETPOST('savemethod', 'alpha', 2);
//$savemethodname = (!empty($savemethod) ? $savemethod : 'setValueFrom');
$newelement = $element;
$subelement = \null;
$format = 'text';
$return = array();
$error = 0;
$regs = array();
// Keep this. It is a hack so restrictarea will test permissions on write too
$feature = $newelement;
$feature2 = $subelement;
$object_id = $fk_element;
//var_dump(GETPOST('action','aZ09'));
//var_dump($newelement.'-'.$subelement."-".$feature."-".$object_id);
$check_access = \restrictedArea($user, $feature, $object_id, '', (string) $feature2);
<?php

\define('NOTOKENRENEWAL', 1);
\define('NOREQUIREMENU', '1');
\define('NOREQUIREHTML', '1');
\define('NOREQUIREAJAX', '1');
\define('NOREQUIRESOC', '1');
$extrafields = new \ExtraFields($db);
$objectdesc = \GETPOST('objectdesc', 'alphanohtml', 0, \null, \null, 1);
// Deprecated. Do not use this anymore. Use param 'objectfield' instead.
$htmlname = \GETPOST('htmlname', 'aZ09');
$outjson = \GETPOSTINT('outjson') ? \GETPOSTINT('outjson') : 0;
$id = \GETPOSTINT('id');
$objectfield = \GETPOST('objectfield', 'alpha');
// Recommended method to call selectobject.
// $objectfield is Object:Field that contains the definition (in table $fields or extrafield). Example: 'Societe:t.ddd' or 'Societe:options_xxx'
$tmparray = \explode(':', $objectfield);
$objectdesc = '';
// Load object according to $id and $element
$objectforfieldstmp = \fetchObjectByElement(0, \strtolower($tmparray[0]));
$reg = array();
$objecttmp = \null;
// Example of value for $objectdesc:
// Bom:bom/class/bom.class.php:0:t.status=1
// Bom:bom/class/bom.class.php:0:t.status=1:ref
// Bom:bom/class/bom.class.php:0:(t.status:=:1) OR (t.field2:=:2):ref
$InfoFieldList = \explode(":", $objectdesc, 4);
$vartmp = empty($InfoFieldList[3]) ? '' : $InfoFieldList[3];
$reg = array();
// take the filter field
$classname = $InfoFieldList[0];
$classpath = \dol_sanitizePathName($InfoFieldList[1]);
//$addcreatebuttonornot = empty($InfoFieldList[2]) ? 0 : $InfoFieldList[2];
$filter = empty($InfoFieldList[3]) ? '' : $InfoFieldList[3];
$sortfield = empty($InfoFieldList[4]) ? '' : $InfoFieldList[4];
// Load object according to $id and $element
$objecttmp = \fetchObjectByElement(0, \strtolower($InfoFieldList[0]));
// Make some replacement
$sharedentities = \getEntity(\strtolower($objecttmp->element));
$filter = \str_replace(array('__ENTITY__', '__SHARED_ENTITIES__', '__USER_ID__', '$ID$'), array($conf->entity, $sharedentities, $user->id, $id), $filter);
/*
$module = $object->module;
$element = $object->element;
$usesublevelpermission = ($module != $element ? $element : '');
if ($usesublevelpermission && !isset($user->rights->$module->$element)) {	// There is no permission on object defined, we will check permission on module directly
	$usesublevelpermission = '';
}
*/
// When used from jQuery, the search term is added as GET param "term".
$searchkey = $id && \GETPOST((string) $id, 'alpha') ? \GETPOST((string) $id, 'alpha') : ($htmlname && \GETPOST($htmlname, 'alpha') ? \GETPOST($htmlname, 'alpha') : '');
// Add a security test to avoid to get content of all tables
$allowModules = ['bom'];
/*
 * View
 */
$form = new \Form($db);
//print '<!-- Ajax page called with url '.dol_escape_htmltag($_SERVER["PHP_SELF"]).'?'.dol_escape_htmltag($_SERVER["QUERY_STRING"]).' -->'."\n";
$arrayresult = $form->selectForFormsList($objecttmp, (string) $htmlname, 0, 0, $searchkey, '', '', '', 0, 1, 0, '', $filter);
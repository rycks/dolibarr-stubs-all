<?php

$optioncss = \GETPOST('optioncsss', 'alpha');
/*
 * View
 */
$form = new \Form($db);
// 1 = Test inside a dolibarr page, 0 = Use hard coded header
// Using a dolibarr constant avoid phpstan hardcoded value always true or false
$usedolheader = \getDolGlobalInt('MAIN_TEST_UI_IN_DOLIBARR_PAGE', 1);
$productspecimen = new \Product($db);
$object = $productspecimen;
$param = '';
$actioncode = \getDolGlobalString('MAIN_TEST_UI_ACTION_CODE');
// '' by default
$status = \getDolGlobalString('MAIN_TEST_UI_STATUS');
// '' by default;
$filter = \getDolGlobalString('MAIN_TEST_UI_FILTER');
// '' by default;
$filtert = \getDolGlobalString('MAIN_TEST_UI_FILTERT');
// '' by default;
$socid = \getDolGlobalInt('MAIN_TEST_UI_SOCID', 0);
// 0 by default;
$type = \getDolGlobalInt('MAIN_TEST_UI_TYPE', 0);
// 0 by default;
$usergroup = \getDolGlobalInt('MAIN_TEST_UI_USERGROUP', 0);
// 0 by default;
$sortfield = \getDolGlobalString('MAIN_TEST_UI_SORTFIELD', 'aaa');
// 'aaa' by default;
$sortorder = 'ASC';
$tasksarray = array(1, 2, 3);
// To force having several lines
$tagidfortablednd = 'tablelines3';
$nav = '';
$limit = 10;
$cate_arbo = array('field1' => 'value1a into the select list A', 'field2' => 'value2a');
$cate_arbo = array('field1' => 'value1b into the select list B', 'field2' => 'value2b');
$cate_arbo = array('field1' => 'value1c into the select list C', 'field2' => 'value2c');
$cate_arbo = array('field1' => 'value1d into the select list D', 'field2' => 'value2d');
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldPreListTitle', $parameters, $object);
$tasksarray = array(1, 2, 3);
// To force having several lines
$tagidfortablednd = 'tablelines';
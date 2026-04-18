<?php

\define('NOREQUIRESOC', '1');
\define('NOSTYLECHECK', '1');
\define("NOLOGIN", '1');
$optioncss = \GETPOST('optioncss', 'alpha');
/*
 * View
 */
$form = new \Form($db);
$usedolheader = 1;
$productspecimen = new \Product($db);
$object = $productspecimen;
$sortfield = 'aaa';
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
$tasksarray = array(1, 2, 3);
// To force having several lines
$tagidfortablednd = 'tablelines';
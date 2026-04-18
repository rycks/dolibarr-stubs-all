<?php

\define("NOLOGIN", 1);
\define("NOCSRFCHECK", 1);
\define('NOIPCHECK', '1');
\define('NOBROWSERNOTIF', '1');
// For MultiCompany module.
// Do not use GETPOST here, function is not defined and define must be done before including main.inc.php
// Because 2 entities can have the same ref.
$entity = !empty($_GET['entity']) ? (int) $_GET['entity'] : (!empty($_POST['entity']) ? (int) $_POST['entity'] : 1);
// if (is_numeric($entity)) { // $entity is casted to int
\define("DOLENTITY", $entity);
$id = \GETPOSTINT('id');
$object = new \Adherent($db);
$extrafields = new \ExtraFields($db);
/*
 * Actions
 */
// None
/*
 * View
 */
$morehead = '';
$res = $object->fetch($id);
$res = $object->fetch_optionals();
/**
 * Show header for card member
 *
 * Note: also called by functions.lib:recordNotFound
 *
 * @param 	string		$title				Title
 * @param 	string		$head				Head array
 * @param 	int    		$disablejs			More content into html header
 * @param 	int    		$disablehead		More content into html header
 * @param 	string[]|string	$arrayofjs			Array of complementary js files
 * @param 	string[]|string	$arrayofcss			Array of complementary css files
 * @return	void
 */
function llxHeaderVierge($title, $head = "", $disablejs = 0, $disablehead = 0, $arrayofjs = [], $arrayofcss = [])
{
}
/**
 * Show footer for card member
 *
 * Note: also called by functions.lib:recordNotFound
 *
 * @return	void
 */
function llxFooterVierge()
{
}
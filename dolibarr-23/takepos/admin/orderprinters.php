<?php

$id = \GETPOSTINT('id');
$type = \GETPOST('type', 'aZ09') ? \GETPOST('type', 'aZ09') : \Categorie::TYPE_PRODUCT;
$action = \GETPOST('action', 'aZ09');
$printer1 = \GETPOST('printer1', 'alpha');
$printer2 = \GETPOST('printer2', 'alpha');
$printer3 = \GETPOST('printer3', 'alpha');
$categstatic = new \Categorie($db);
$printedcategories = ";";
$printedcategories = ";";
$printedcategories = ";";
/*
 * View
 */
$categstatic = new \Categorie($db);
$form = new \Form($db);
$title = $langs->trans("Categories");
$arrayofjs = array('/includes/jquery/plugins/jquerytreeview/jquery.treeview.js', '/includes/jquery/plugins/jquerytreeview/lib/jquery.cookie.js');
$arrayofcss = array('/includes/jquery/plugins/jquerytreeview/jquery.treeview.css');
// Charge tableau des categories
$cate_arbo = $categstatic->get_full_arbo($type);
// Define fulltree array
$fulltree = $cate_arbo;
// Define data (format for treeview)
$data = array();
$nbofentries = \count($data) - 1;
$nbofentries = \count($data) - 1;
$nbofentries = \count($data) - 1;
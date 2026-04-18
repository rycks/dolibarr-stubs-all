<?php

$permtoadd = 0;
$permtoupload = 0;
$showroot = 0;
$error = 0;
// Start "Add new file" area
$nameforformuserfile = 'formuserfileecm';
$sectiondir = \GETPOST('file', 'alpha') ? \GETPOST('file', 'alpha') : \GETPOST('section_dir', 'alpha');
$formfile = new \FormFile($db);
$section_dir = \GETPOST('section_dir', 'alpha');
$section = \GETPOST('section', 'alpha');
$file = \GETPOST('filetoregenerate', 'alpha');
$form = new \Form($db);
$formquestion = array();
$param = '';
$action = 'file_manager';
$file = \GETPOST('filetoregenerate', 'alpha');
$nbconverted = 0;
$action = 'file_manager';
$showonrightsize = '';
// Manual section
$htmltooltip = $langs->trans("ECMAreaDesc2a");
// Start right panel - List of content of a directory
$mode = 'noajax';
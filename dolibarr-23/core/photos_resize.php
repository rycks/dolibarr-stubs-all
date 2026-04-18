<?php

$id = \GETPOSTINT('id');
$action = \GETPOST('action', 'aZ09');
$modulepart = \GETPOST('modulepart', 'alpha') ? \GETPOST('modulepart', 'alpha') : 'produit|service';
$original_file = \GETPOST("file");
$backtourl = \GETPOST('backtourl');
$cancel = \GETPOST('cancel', 'alpha');
$file = \GETPOST('file', 'alpha');
$num = \GETPOST('num', 'alpha');
// Used for document on bank statement
$website = \GETPOST('website', 'alpha');
$accessallowed = 0;
$result = \restrictedArea($user, 'produit|service', $id, 'product&product');
$accessallowed = 1;
// Define dir according to modulepart
$dir = '';
$object = new \Product($db);
$regs = array();
$fullpath = $dir . "/" . $original_file;
$result = \dol_imageResizeOrCrop($fullpath, 0, \GETPOSTINT('sizex'), \GETPOSTINT('sizey'));
$fullpath = $dir . "/" . $original_file;
$result = \dol_imageResizeOrCrop($fullpath, 1, \GETPOSTINT('w'), \GETPOSTINT('h'), \GETPOSTINT('x'), \GETPOSTINT('y'));
/*
 * View
 */
$head = '';
$title = $langs->trans("ImageEditor");
$morejs = array('/includes/jquery/plugins/jcrop/js/jquery.Jcrop.min.js', '/core/js/lib_photosresize.js');
$morecss = array('/includes/jquery/plugins/jcrop/css/jquery.Jcrop.css');
$infoarray = \dol_getImageSize($dir . "/" . \GETPOST("file", 'alpha'));
$height = $infoarray['height'];
$width = $infoarray['width'];
$infoarray = \dol_getImageSize($dir . "/" . \GETPOST("file"));
$height = $infoarray['height'];
$width = $infoarray['width'];
$widthforcrop = $width;
$refsizeforcrop = 'orig';
$ratioforcrop = 1;
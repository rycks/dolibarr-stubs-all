<?php

// BEGIN PHP File wrapper.php used to download rss, logo, shared files - DO NOT MODIFY - It is just a copy of file website/samples/wrapper.php
$websitekey = \basename(__DIR__);
$encoding = '';
// Parameters to download files
$hashp = \GETPOST('hashp', 'aZ09');
$modulepart = \GETPOST('modulepart', 'aZ09');
$entity = \GETPOSTINT('entity') ? \GETPOSTINT('entity') : $conf->entity;
$original_file = \GETPOST("file", "alpha");
$l = \GETPOST('l', 'aZ09');
$limit = \GETPOSTINT('limit');
// Parameters for RSS
$rss = \GETPOST('rss', 'aZ09');
$ecmfile = new \EcmFiles($db);
$result = $ecmfile->fetch(0, '', '', '', $hashp);
// Define attachment (attachment=true to force choice popup 'open'/'save as')
$attachment = \true;
// Define mime type
$type = 'application/octet-stream';
// Security: Delete string ../ into $original_file
$original_file = \str_replace("../", "/", $original_file);
$refname = \basename(\dirname($original_file) . "/");
$format = 'rss';
$type = '';
$cachedelay = 0;
$filename = $original_file;
$dir_temp = $conf->website->dir_temp;
$website = new \Website($db);
$websitepage = new \WebsitePage($db);
$filters = array('type_container' => 'blogpost', 'status' => 1);
$MAXNEWS = $limit ? $limit : 20;
$arrayofblogs = $websitepage->fetchAll($website->id, 'DESC', 'date_creation', $MAXNEWS, 0, $filters);
$eventarray = array();
// Create dir and define output file (definitive and temporary)
$result = \dol_mkdir($dir_temp);
$outputfile = $dir_temp . '/' . $filename;
$result = 0;
$buildfile = \true;
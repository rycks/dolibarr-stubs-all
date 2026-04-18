<?php

/* Copyright (C) 2024-2025  Frédéric France			<frederic.france@free.fr>
 * Copyright (C) 2025		MDW						<mdeweerd@users.noreply.github.com>
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <https://www.gnu.org/licenses/>.
 */
// BEGIN PHP File wrapper.php used to download rss, logo, shared files - DO NOT MODIFY - It is just a copy of file website/samples/wrapper.php
$websitekey = \basename(__DIR__);
$encoding = '';
// Parameters to download files
$hashp = \GETPOST('hashp', 'aZ09');
$extname = \GETPOST('extname', 'alpha', 1);
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
// Cache or not
$cachestring = \GETPOST("cache", 'aZ09');
// May be 1, or an int (delay in second of the cache if < 999999, or a timestamp), or a hash
$cachedelay = \GETPOSTINT('cachedelay') ? \GETPOSTINT('cachedelay') : (\is_numeric($cachestring) && (int) $cachestring > 1 && (int) $cachestring < 999999 ? $cachestring : '3600');
$refname = \basename(\dirname($original_file) . "/");
$format = 'rss';
$type = '';
$filename = $original_file;
$dir_temp = (string) $conf->website->dir_temp;
$website = new \Website($db);
$websitepage = new \WebsitePage($db);
$filters = array('type_container' => 'blogpost', 'status' => '1');
$MAXNEWS = $limit;
$arrayofblogs = $websitepage->fetchAll($website->id, 'DESC', 'date_creation', $MAXNEWS, 0, $filters);
$eventarray = array();
// Create dir and define output file (definitive and temporary)
$result = \dol_mkdir($dir_temp);
$outputfile = $dir_temp . '/' . $filename;
$result = 0;
$buildfile = \true;
$attachment = \false;
//$attachment = false;
$contenttype = 'application/rss+xml';
//$contenttype='text/plain';
$outputencoding = 'UTF-8';
// Clean parameters
$outputfile = $dir_temp . '/' . $filename;
$result = \readfile($outputfile);
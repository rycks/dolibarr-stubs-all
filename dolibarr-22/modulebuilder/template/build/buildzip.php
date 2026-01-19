<?php

/**
 * buildzip.php
 *
 * Copyright (c) 2023-2025 Eric Seigne <eric.seigne@cap-rel.fr>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <https://www.gnu.org/licenses/>.
 */
/*
   The goal of that php CLI script is to make zip package of your module
   as an alternative to web "build zip" or "perl script makepack"
*/
// ============================================= configuration
/**
 * list of files & dirs of your module
 *
 * @var string[]
 */
$listOfModuleContent = ['admin', 'ajax', 'backport', 'class', 'css', 'COPYING', 'core', 'img', 'js', 'langs', 'lib', 'sql', 'tpl', '*.md', '*.json', '*.php', 'modulebuilder.txt'];
/**
 * if you want to exclude some files from your zip
 *
 * @var string[]
 */
$exclude_list = ['/^.git$/', '/.*js.map/', '/DEV.md/'];
// ============================================= end of configuration
/**
 * auto detect module name and version from file name
 *
 * @return  (string|string)[] module name and module version
 */
function detectModule()
{
}
/**
 * delete recursively a directory
 *
 * @param   string  $dir  dir path to delete
 *
 * @return bool true on success or false on failure.
 */
function delTree($dir)
{
}
/**
 * do a secure delete file/dir with double check
 * (don't trust unlink return)
 *
 * @param   string  $path  full path to delete
 *
 * @return bool true on success ($path does not exists at the end of process), else exit
 */
function secureUnlink($path)
{
}
/**
 * create a directory and check if dir exists
 *
 * @param   string  $path  path to make
 *
 * @return bool true on success ($path exists at the end of process), else exit
 */
function mkdirAndCheck($path)
{
}
/**
 * check if that filename is concerned by exclude filter
 *
 * @param   string  $filename  file name to check
 *
 * @return bool true if file is in excluded list
 */
function is_excluded($filename)
{
}
/**
 * recursive copy files & dirs
 *
 * @param   string  $src  source dir
 * @param   string  $dst  target dir
 *
 * @return bool true on success or false on failure.
 */
function rcopy($src, $dst)
{
}
/**
 * build a zip file with only php code and no external depends
 * on "zip" exec for example
 *
 * @param   string  	$folder  folder to use as zip root
 * @param   ZipArchive  $zip     zip object (ZipArchive)
 * @param   string  	$root    relative root path into the zip
 *
 * @return bool true on success or false on failure.
 */
function zipDir($folder, &$zip, $root = "")
{
}
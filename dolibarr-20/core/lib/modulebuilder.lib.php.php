<?php

/* Copyright (C) 2009-2010 Laurent Destailleur  <eldy@users.sourceforge.net>
 * Copyright (C) 2024		MDW							<mdeweerd@users.noreply.github.com>
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
 * or see https://www.gnu.org/
 */
/**
 *  \file		htdocs/core/lib/modulebuilder.lib.php
 *  \brief		Set of function for modulebuilder management
 */
/**
 * 	Regenerate files .class.php
 *
 *  @param	string      $destdir		Directory
 * 	@param	string		$module			Module name
 *  @param	string      $objectname		Name of object
 * 	@param	string		$newmask		New mask
 *  @param	string      $readdir		Directory source (use $destdir when not defined)
 *  @param	array{}|array{name:string,key:string,type:string,label:string,picot?:string,enabled:int<0,1>,notnull:int<0,1>,position:int,visible:int,noteditable?:int<0,1>,alwayseditable?:int<0,1>,default?:string,index?:int,foreignkey?:string,searchall?:int,isameasure?:int<0,1>,css?:string,cssview?:string,csslist?:string,help?:string,showoncombobox?:int<0,1>,disabled?:int<0,1>,autofocusoncreate?:int<0,1>,arrayofkeyval?:array<string,string>,validate?:int<0,1>,comment?:string}	$addfieldentry	Array of 1 field entry to add
 *  @param	string		$delfieldentry	Id of field to remove
 * 	@return	int<-7,-1>|CommonObject		Return integer <=0 if KO, Object if OK
 *  @see rebuildObjectSql()
 */
function rebuildObjectClass($destdir, $module, $objectname, $newmask, $readdir = '', $addfieldentry = array(), $delfieldentry = '')
{
}
/**
 * 	Save data into a memory area shared by all users, all sessions on server
 *
 *  @param	string      $destdir		Directory
 * 	@param	string		$module			Module name
 *  @param	string      $objectname		Name of object
 * 	@param	string		$newmask		New mask
 *  @param	string      $readdir		Directory source (use $destdir when not defined)
 *  @param	Object		$object			If object was already loaded/known, it is pass to avoid another include and new.
 *  @param	string		$moduletype		'external' or 'internal'
 * 	@return	int							Return integer <=0 if KO, >0 if OK
 *  @see rebuildObjectClass()
 */
function rebuildObjectSql($destdir, $module, $objectname, $newmask, $readdir = '', $object = \null, $moduletype = 'external')
{
}
/**
 * Get list of existing objects from a directory
 *
 * @param	string      $destdir		Directory
 * @return 	array|int                   Return integer <=0 if KO, array if OK
 */
function dolGetListOfObjectClasses($destdir)
{
}
/**
 * Function to check if comment BEGIN and END exists in modMyModule class
 *
 * @param  string  $file    	Filename or path
 * @param  int     $number   	0 = For Menus, 1 = For permissions, 2 = For Dictionaries
 * @return int     				1 if OK , -1 if KO
 */
function checkExistComment($file, $number)
{
}
/**
 * Delete all permissions
 *
 * @param string         $file         file with path
 * @return void
 */
function deletePerms($file)
{
}
/**
 *  Compare two value
 * @param int|string  $a value 1
 * @param int|string  $b value 2
 * @return int      less 0 if str1 is less than str2; > 0 if str1 is greater than str2, and 0 if they are equal.
*/
function compareFirstValue($a, $b)
{
}
/**
 * Rewriting all permissions after any actions
 * @param string      $file            filename or path
 * @param array<int,string[]> $permissions permissions existing in file
 * @param int|null    $key             key for permission needed
 * @param array{0:string,1:string}|null  $right           $right to update or add
 * @param string|null $objectname      name of object
 * @param string|null $module          name of module
 * @param int<-2,2>   $action          0 for delete, 1 for add, 2 for update, -1 when delete object completely, -2 for generate rights after add
 * @return int<-1,1>                   1 if OK,-1 if KO
 */
function reWriteAllPermissions($file, $permissions, $key, $right, $objectname, $module, $action)
{
}
/**
 * Converts a formatted properties string into an associative array.
 *
 * @param string $string The formatted properties string.
 * @return array<string,bool|int|float|string|mixed[]> The resulting associative array.
 */
function parsePropertyString($string)
{
}
/**
 * Write all properties of the object in AsciiDoc format
 * @param  string   $file           path of the class
 * @param  string   $objectname     name of the objectClass
 * @param  string   $destfile       file where write table of properties
 * @return int                      1 if OK, -1 if KO
 */
function writePropsInAsciiDoc($file, $objectname, $destfile)
{
}
/**
 * Delete property and permissions from documentation ascii file if we delete an object
 *
 * @param  string  $file         file or path
 * @param  string  $objectname   name of object wants to deleted
 * @return void
 */
function deletePropsAndPermsFromDoc($file, $objectname)
{
}
/**
 * Search a string and return all lines needed from file. Does not include line $start nor $end
 *
 * @param  	string  $file    		file for searching
 * @param  	string  $start   		start line if exist
 * @param  	string  $end     		end line if exist
 * @param	string	$excludestart 	Ignore if start line is $excludestart
 * @param	int  	$includese		Include start and end line
 * @return 	string           		Return the lines between first line with $start and $end. "" if not found.
 */
function getFromFile($file, $start, $end, $excludestart = '', $includese = 0)
{
}
/**
 * Write all permissions of each object in AsciiDoc format
 * @param  string   $file           path of the class
 * @param  string   $destfile       file where write table of permissions
 * @return int<-1,1>				1 if OK, -1 if KO
 */
function writePermsInAsciiDoc($file, $destfile)
{
}
/**
 * Add Object in ModuleApi File
 *
 * @param	string	$srcfile		Source file to use as example
 * @param  	string 	$file           Path of modified file
 * @param  	string[]	$objects	Array of objects in the module
 * @param  	string 	$modulename     Name of module
 * @return 	int<-1,1>              	Return 1 if OK, -1 if KO
 */
function addObjectsToApiFile($srcfile, $file, $objects, $modulename)
{
}
/**
 * Remove 	Object variables and methods from API_Module File
 *
 * @param 	string   	$file         	File api module
 * @param  	string[] 	$objects        Array of objects in the module
 * @param 	string   	$objectname   	Name of object want to remove
 * @return 	int<-1,1> 					1 if OK, -1 if KO
 */
function removeObjectFromApiFile($file, $objects, $objectname)
{
}
/**
 * @param	string         $file       path of filename
 * @param	array<int,array{commentgroup:string,fk_menu:string,type:string,titre:string,mainmenu:string,leftmenu:string,url:string,langs:string,position:int,enabled:int,perms:string,target:string,user:int}>		$menus      all menus for module
 * @param	mixed|null     $menuWantTo  menu get for do actions
 * @param	int|null       $key        key for the concerned menu
 * @param	int<-1,2>      $action     for specify what action (0 = delete perm, 1 = add perm, 2 = update perm, -1 = when we delete object)
 * @return	int<-1,1>					1 if OK, -1 if KO
 */
function reWriteAllMenus($file, $menus, $menuWantTo, $key, $action)
{
}
/**
 * Updates a dictionary in a module descriptor file.
 *
 * @param string $module The name of the module.
 * @param string $file The path to the module descriptor file.
 * @param array<string,string|array<string,int|string>> $dicts The dictionary data to be updated.
 * @return int Returns the number of replacements made in the file.
 */
function updateDictionaryInFile($module, $file, $dicts)
{
}
/**
 * Creates a new dictionary table.
 *
 * for creating a new dictionary table in Dolibarr. It generates the necessary SQL code to define the table structure,
 * including columns such as 'rowid', 'code', 'label', 'position', 'use_default', 'active', etc. The table name is constructed based on the provided $namedic parameter.
 *
 * @param 	string 		$modulename 	The lowercase name of the module for which the dictionary table is being created.
 * @param 	string 		$file 			The file path to the Dolibarr module builder file where the dictionaries are defined.
 * @param 	string 		$namedic 		The name of the dictionary, which will also be used as the base for the table name.
 * @param 	array<string,string|array<string,int|string>>	$dictionnaires An optional array containing pre-existing dictionary data, including 'tabname', 'tablib', 'tabsql', etc.
 * @return 	int<-1,-1> 					Return int < 0 if error, return nothing on success
 */
function createNewDictionnary($modulename, $file, $namedic, $dictionnaires = \null)
{
}
/**
 * Generate Urls and add them to documentation module
 *
 * @param string $file_api   filename or path of api
 * @param string $file_doc   filename or path of documentation
 * @return int<-1,1>         -1 if KO, 1 if OK, 0 if nothing change
 */
function writeApiUrlsInDoc($file_api, $file_doc)
{
}
/**
 * count directories or files in modulebuilder folder
 * @param  string $path  path of directory
 * @param  int    $type  type of file 1= file,2=directory
 * @return int|bool
 */
function countItemsInDirectory($path, $type = 1)
{
}
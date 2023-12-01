<?php

/* Copyright (C) 2009-2010 Laurent Destailleur  <eldy@users.sourceforge.net>
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
 *  @param	string		$addfieldentry	Array of 1 field entry to add array('key'=>,'type'=>,''label'=>,'visible'=>,'enabled'=>,'position'=>,'notnull'=>','index'=>,'searchall'=>,'comment'=>,'help'=>,'isameasure')
 *  @param	string		$delfieldentry	Id of field to remove
 * 	@return	int|object					<=0 if KO, Object if OK
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
 * 	@return	int							<=0 if KO, >0 if OK
 *  @see rebuildObjectClass()
 */
function rebuildObjectSql($destdir, $module, $objectname, $newmask, $readdir = '', $object = \null, $moduletype = 'external')
{
}
/**
 * Get list of existing objects from directory
 *
 * @param	string      $destdir		Directory
 * @return 	array|int                    <=0 if KO, array if OK
 */
function dolGetListOfObjectClasses($destdir)
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
 * @param array       $permissions     permissions existing in file
 * @param int|null    $key             key for permission needed
 * @param array|null  $right           $right to update or add
 * @param string|null $objectname      name of object
 * @param string|null $module          name of module
 * @param int         $action          0 for delete, 1 for add, 2 for update, -1 when delete object completly, -2 for generate rights after add
 * @return int                         1 if OK,-1 if KO
 */
function reWriteAllPermissions($file, $permissions, $key, $right, $objectname, $module, $action)
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
 * Delete property from documentation if we delete object
 * @param  string  $file         file or path
 * @param  string  $objectname   name of object wants to deleted
 * @return void
 */
function deletePropsFromDoc($file, $objectname)
{
}
/**
 * Search a string and return all lines needed from file
 * @param  string  $file    file for searching
 * @param  string  $start   start line if exist
 * @param  string  $end     end line if exist
 * @return string           return the content needed
 */
function getFromFile($file, $start, $end)
{
}
/**
 * Write all permissions of each object in AsciiDoc format
 * @param  string   $file           path of the class
 * @param  string   $destfile       file where write table of permissions
 * @return int                      1 if OK, -1 if KO
 */
function writePermsInAsciiDoc($file, $destfile)
{
}
/**
 * Add Object in ModuleApi File
 * @param  string $file           path of file
 * @param  array  $objects        array of objects in the module
 * @param  string $modulename     name of module
 * @return int                    1 if OK, -1 if KO
 */
function addObjectsToApiFile($file, $objects, $modulename)
{
}
/**
 * Remove Object variables and methods from API_Module File
 * @param string   $file         file api module
 * @param string   $objectname   name of object whant to remove
 * @param string   $modulename   name of module
 * @return int                    1 if OK, -1 if KO
 */
function removeObjectFromApiFile($file, $objectname, $modulename)
{
}
/**
 * @param    string         $file       path of filename
 * @param    mixed          $menus      all menus for module
 * @param    mixed|null     $menuWantTo  menu get for do actions
 * @param    int|null       $key        key for the concerned menu
 * @param    int            $action     for specify what action (0 = delete, 1 = add, 2 = update, -1 = when delete object)
 * @return   int            1 if OK, -1 if KO
 */
function reWriteAllMenus($file, $menus, $menuWantTo, $key, $action)
{
}
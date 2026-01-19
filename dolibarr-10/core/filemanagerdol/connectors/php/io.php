<?php

/*
 * FCKeditor - The text editor for Internet - http://www.fckeditor.net
 * Copyright (C) 2003-2010 Frederico Caldeira Knabben
 *
 * == BEGIN LICENSE ==
 *
 * Licensed under the terms of any of the following licenses at your
 * choice:
 *
 *  - GNU General Public License Version 2 or later (the "GPL")
 *    http://www.gnu.org/licenses/gpl.html
 *
 *  - GNU Lesser General Public License Version 2.1 or later (the "LGPL")
 *    http://www.gnu.org/licenses/lgpl.html
 *
 *  - Mozilla Public License Version 1.1 or later (the "MPL")
 *    http://www.mozilla.org/MPL/MPL-1.1.html
 *
 * == END LICENSE ==
 *
 * This is the File Manager Connector for PHP.
 */
/**
 * CombinePaths
 *
 * @param   string $sBasePath     sBasePath
 * @param   string $sFolder       sFolder
 * @return  string                Combined path
 */
function CombinePaths($sBasePath, $sFolder)
{
}
/**
 * GetResourceTypePath
 *
 * @param 	string		$resourceType	Resource type
 * @param 	string		$sCommand		Command
 * @return	string						Config
 */
function GetResourceTypePath($resourceType, $sCommand)
{
}
/**
 * GetResourceTypeDirectory
 *
 * @param string $resourceType	Resource type
 * @param string $sCommand		Command
 * @return string
 */
function GetResourceTypeDirectory($resourceType, $sCommand)
{
}
/**
 * GetUrlFromPath
 *
 * @param	string 	$resourceType	Resource type
 * @param 	string 	$folderPath		Path
 * @param	string	$sCommand		Command
 * @return	string					Full url
 */
function GetUrlFromPath($resourceType, $folderPath, $sCommand)
{
}
/**
 * RemoveExtension
 *
 * @param 	string		$fileName	Filename
 * @return	string					String without extension
 */
function RemoveExtension($fileName)
{
}
/**
 * ServerMapFolder
 *
 * @param 	string	$resourceType	Resource type
 * @param 	string	$folderPath		Folder
 * @param 	string	$sCommand		Command
 * @return	string
 */
function ServerMapFolder($resourceType, $folderPath, $sCommand)
{
}
/**
 * GetParentFolder
 *
 * @param	string	$folderPath		Folder path
 * @return 	string					Parent folder
 */
function GetParentFolder($folderPath)
{
}
/**
 * CreateServerFolder
 *
 * @param 	string	$folderPath		Folder
 * @param 	string	$lastFolder		Folder
 * @return	string					''=success, error message otherwise
 */
function CreateServerFolder($folderPath, $lastFolder = \null)
{
}
/**
 * Get Root Path
 *
 * @return  string              real path
 */
function GetRootPath()
{
}
// Emulate the asp Server.mapPath function.
// given an url path return the physical directory that it corresponds to
function Server_MapPath($path)
{
}
/**
 * Is Allowed Extension
 *
 * @param   string $sExtension      File extension
 * @param   string $resourceType    ressource type
 * @return  boolean                 true or false
 */
function IsAllowedExt($sExtension, $resourceType)
{
}
/**
 * Is Allowed Type
 *
 * @param   string $resourceType    ressource type
 * @return  boolean                 true or false
 */
function IsAllowedType($resourceType)
{
}
/**
 * IsAllowedCommand
 *
 * @param   string		$sCommand		Command
 * @return  boolean						True or false
 */
function IsAllowedCommand($sCommand)
{
}
/**
 * GetCurrentFolder
 *
 * @return	string		current folder
 */
function GetCurrentFolder()
{
}
// Do a cleanup of the folder name to avoid possible problems
function SanitizeFolderName($sNewFolderName)
{
}
// Do a cleanup of the file name to avoid possible problems
function SanitizeFileName($sNewFileName)
{
}
// This is the function that sends the results of the uploading process.
function SendUploadResults($errorNumber, $fileUrl = '', $fileName = '', $customMsg = '')
{
}
// @CHANGE
// This is the function that sends the results of the uploading process to CKE.
/**
 * SendCKEditorResults
 *
 * @param   string  $callback       callback
 * @param   string  $sFileUrl       sFileUrl
 * @param   string  $customMsg      customMsg
 * @return  void
 */
function SendCKEditorResults($callback, $sFileUrl, $customMsg = '')
{
}
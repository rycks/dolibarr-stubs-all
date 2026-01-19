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
 *    https://www.gnu.org/licenses/gpl.html
 *
 *  - GNU Lesser General Public License Version 2.1 or later (the "LGPL")
 *    https://www.gnu.org/licenses/lgpl.html
 *
 *  - Mozilla Public License Version 1.1 or later (the "MPL")
 *    http://www.mozilla.org/MPL/MPL-1.1.html
 *
 * == END LICENSE ==
 *
 * These functions are used by the connector.php script.
 */
/**
 * SetXmlHeaders
 *
 * @return	void
 */
function SetXmlHeaders()
{
}
/**
 * CreateXmlHeader
 *
 * @param string	$command		Command
 * @param string	$resourceType	Resource type
 * @param string	$currentFolder	Current folder
 * @return void
 */
function CreateXmlHeader($command, $resourceType, $currentFolder)
{
}
/**
 * CreateXmlFooter
 *
 * @return void
 */
function CreateXmlFooter()
{
}
/**
 * SendError
 *
 * @param 	integer $number		Number
 * @param 	string 	$text		Text
 * @return	void
 */
function SendError($number, $text)
{
}
/**
 * SendErrorNode
 *
 * @param 	integer $number		Number
 * @param	string	$text		Text of error
 * @return 	string				Error node
 */
function SendErrorNode($number, $text)
{
}
/**
 * GetFolders
 *
 * @param	string	$resourceType		Resource type
 * @param 	string 	$currentFolder		Current folder
 * @return 	void
 */
function GetFolders($resourceType, $currentFolder)
{
}
/**
 * GetFoldersAndFiles
 *
 * @param	string	$resourceType	Resource type
 * @param	string	$currentFolder	Current folder
 * @return void
 */
function GetFoldersAndFiles($resourceType, $currentFolder)
{
}
/**
 * Create folder
 *
 * @param   string $resourceType    Resource type
 * @param   string $currentFolder   Current folder
 * @return void
 */
function CreateFolder($resourceType, $currentFolder)
{
}
/**
 * FileUpload
 *
 * @param	string	$resourceType	Resource type
 * @param 	string 	$currentFolder	Current folder
 * @param	string	$sCommand		Command
 * @param	string	$CKEcallback	Callback
 * @return	null
 */
function FileUpload($resourceType, $currentFolder, $sCommand, $CKEcallback = '')
{
}
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
/**
 *  Emulate the asp Server.mapPath function.
 *  @param	string		$path		given an url path return the physical directory that it corresponds to
 *  @return	string					Path
 */
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
/**
 * Do a cleanup of the folder name to avoid possible problems
 *
 * @param	string	$sNewFolderName		Folder
 * @return	string						Folder sanitized
 */
function SanitizeFolderName($sNewFolderName)
{
}
/**
 * Do a cleanup of the file name to avoid possible problems
 *
 * @param	string	$sNewFileName		Folder
 * @return	string						Folder sanitized
 */
function SanitizeFileName($sNewFileName)
{
}
/**
 * This is the function that sends the results of the uploading process.
 *
 * @param	string		$errorNumber	errorNumber
 * @param	string		$fileUrl		fileUrl
 * @param	string		$fileName		fileName
 * @param	string		$customMsg		customMsg
 * @return	void
 */
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
/**
 * RemoveFromStart
 *
 * @param 	string		$sourceString	Source
 * @param 	string		$charToRemove	Char to remove
 * @return	string		Result
 */
function RemoveFromStart($sourceString, $charToRemove)
{
}
/**
 * RemoveFromEnd
 *
 * @param 	string		$sourceString	Source
 * @param 	string		$charToRemove	Rhar to remove
 * @return	string		Result
 */
function RemoveFromEnd($sourceString, $charToRemove)
{
}
/**
 * FindBadUtf8
 *
 * @param 	string $string		String
 * @return	boolean
 */
function FindBadUtf8($string)
{
}
/**
 * ConvertToXmlAttribute
 *
 * @param 	string		$value		Value
 * @return	string
 */
function ConvertToXmlAttribute($value)
{
}
/**
 * Check whether given extension is in html etensions list
 *
 * @param 	string 		$ext				Extension
 * @param 	array 		$formExtensions		Array of extensions
 * @return 	boolean
 */
function IsHtmlExtension($ext, $formExtensions)
{
}
/**
 * Detect HTML in the first KB to prevent against potential security issue with
 * IE/Safari/Opera file type auto detection bug.
 * Returns true if file contain insecure HTML code at the beginning.
 *
 * @param string $filePath absolute path to file
 * @return boolean
 */
function DetectHtml($filePath)
{
}
/**
 * Check file content.
 * Currently this function validates only image files.
 * Returns false if file is invalid.
 *
 * @param 	string 	$filePath 		Absolute path to file
 * @param 	string 	$extension 		File extension
 * @return 	boolean					True or false
 */
function IsImageValid($filePath, $extension)
{
}
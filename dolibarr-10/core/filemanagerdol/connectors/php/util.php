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
 * Utility functions for the File Manager Connector for PHP.
 */
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
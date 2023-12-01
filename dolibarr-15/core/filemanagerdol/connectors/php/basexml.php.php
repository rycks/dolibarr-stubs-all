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
 * These functions define the base of the XML response sent by the PHP
 * connector.
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
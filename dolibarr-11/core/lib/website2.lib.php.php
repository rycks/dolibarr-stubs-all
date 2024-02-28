<?php

/* Copyright (C) 2017 Laurent Destailleur	<eldy@users.sourceforge.net>
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
/**
 *      \file       htdocs/core/lib/website2.lib.php
 *      \ingroup    website
 *      \brief      Library for website module (rare functions not required for execution of website)
 */
/**
 * Save content of a page on disk
 *
 * @param	string		$filemaster			Full path of filename master.inc.php for website to generate
 * @return	boolean							True if OK
 */
function dolSaveMasterFile($filemaster)
{
}
/**
 * Save content of a page on disk
 *
 * @param	string		$filealias			Full path of filename to generate
 * @param	Website		$object				Object website
 * @param	WebsitePage	$objectpage			Object websitepage
 * @return	boolean							True if OK
 */
function dolSavePageAlias($filealias, $object, $objectpage)
{
}
/**
 * Save content of a page on disk
 *
 * @param	string		$filetpl			Full path of filename to generate
 * @param	Website		$object				Object website
 * @param	WebsitePage	$objectpage			Object websitepage
 * @return	boolean							True if OK
 */
function dolSavePageContent($filetpl, \Website $object, \WebsitePage $objectpage)
{
}
/**
 * Save content of the index.php and wrapper.php page
 *
 * @param	string		$pathofwebsite			Path of website root
 * @param	string		$fileindex				Full path of file index.php
 * @param	string		$filetpl				File tpl to index.php page redirect to
 * @param	string		$filewrapper			Full path of file wrapper.php
 * @return	boolean								True if OK
 */
function dolSaveIndexPage($pathofwebsite, $fileindex, $filetpl, $filewrapper)
{
}
/**
 * Save content of a page on disk
 *
 * @param	string		$filehtmlheader		Full path of filename to generate
 * @param	string		$htmlheadercontent	Content of file
 * @return	boolean							True if OK
 */
function dolSaveHtmlHeader($filehtmlheader, $htmlheadercontent)
{
}
/**
 * Save content of a page on disk
 *
 * @param	string		$filecss			Full path of filename to generate
 * @param	string		$csscontent			Content of file
 * @return	boolean							True if OK
 */
function dolSaveCssFile($filecss, $csscontent)
{
}
/**
 * Save content of a page on disk
 *
 * @param	string		$filejs				Full path of filename to generate
 * @param	string		$jscontent			Content of file
 * @return	boolean							True if OK
 */
function dolSaveJsFile($filejs, $jscontent)
{
}
/**
 * Save content of a page on disk
 *
 * @param	string		$filerobot			Full path of filename to generate
 * @param	string		$robotcontent		Content of file
 * @return	boolean							True if OK
 */
function dolSaveRobotFile($filerobot, $robotcontent)
{
}
/**
 * Save content of a page on disk
 *
 * @param	string		$filehtaccess		Full path of filename to generate
 * @param	string		$htaccess			Content of file
 * @return	boolean							True if OK
 */
function dolSaveHtaccessFile($filehtaccess, $htaccess)
{
}
/**
 * Save content of a page on disk
 *
 * @param	string		$file				Full path of filename to generate
 * @param	string		$content			Content of file
 * @return	boolean							True if OK
 */
function dolSaveManifestJson($file, $content)
{
}
/**
 * Save content of a page on disk
 *
 * @param	string		$file				Full path of filename to generate
 * @param	string		$content			Content of file
 * @return	boolean							True if OK
 */
function dolSaveReadme($file, $content)
{
}
/**
 * 	Show list of themes. Show all thumbs of themes/skins
 *
 *	@param	Website		$website		Object website to load the tempalte into
 * 	@return	void
 */
function showWebsiteTemplates(\Website $website)
{
}
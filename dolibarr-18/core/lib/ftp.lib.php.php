<?php

/* Copyright (C) 2022-2023	Laurent Destailleur 	<eldy@users.sourceforge.net>
 * Copyright (C) 2022	    Anthony Berton       	<bertonanthony@gmail.com>
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
 *	\file       htdocs/core/lib/ftp.lib.php
 *	\brief      Set of functions used for FTP
 *	\ingroup    core
 */
/**
 * Connect to FTP server
 *
 * @param 	string	$ftp_server		Server name
 * @param 	string	$ftp_port		Server port
 * @param 	string	$ftp_user		FTP user
 * @param 	string	$ftp_password	FTP password
 * @param 	string	$section		Directory
 * @param	integer	$ftp_passive	Use a passive mode
 * @return	array					Result of connect
 */
function dol_ftp_connect($ftp_server, $ftp_port, $ftp_user, $ftp_password, $section, $ftp_passive = 0)
{
}
/**
 * Tell if an entry is a FTP directory
 *
 * @param 		resource	$connect_id		Connection handler
 * @param 		string		$dir			Directory
 * @return		int			1=directory, 0=not a directory
 */
function ftp_isdir($connect_id, $dir)
{
}
/**
 * Tell if an entry is a FTP directory
 *
 * @param 		resource	$connect_id		Connection handler
 * @return		boolean						Result of closing
 */
function dol_ftp_close($connect_id)
{
}
/**
 * Delete a FTP file
 *
 * @param 		resource	$connect_id		Connection handler
 * @param 		string		$file			File
 * @param 		string		$newsection			$newsection
 * @return		bool
 */
function dol_ftp_delete($connect_id, $file, $newsection)
{
}
/**
 * Download a FTP file
 *
 * @param 		resource	$connect_id		Connection handler
 * @param 		string		$localfile		The local file path
 * @param 		string		$file					The remote file path
 * @param 		string		$newsection			$newsection
 * @return		bool|resource
 */
function dol_ftp_get($connect_id, $localfile, $file, $newsection)
{
}
/**
 * Upload a FTP file
 *
 * @param 		resource	$connect_id		Connection handler
 * @param 		string		$file			File name
 * @param 		string		$localfile		The path to the local file
 * @param 		string		$newsection		$newsection
 * @return		bool
 */
function dol_ftp_put($connect_id, $file, $localfile, $newsection)
{
}
/**
 * Remove FTP directory
 *
 * @param 		resource	$connect_id		Connection handler
 * @param 		string		$file			File
 * @param 		string		$newsection			$newsection
 * @return		bool
 */
function dol_ftp_rmdir($connect_id, $file, $newsection)
{
}
/**
 * Remove FTP directory
 *
 * @param 		resource	$connect_id		Connection handler
 * @param 		string		$newdir			Dir create
 * @param 		string		$newsection		$newsection
 * @return		bool|string
 */
function dol_ftp_mkdir($connect_id, $newdir, $newsection)
{
}
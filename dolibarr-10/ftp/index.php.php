<?php

/**
 * Connect to FTP server
 *
 * @param 	string	$ftp_server		Server name
 * @param 	string	$ftp_port		Server port
 * @param 	string	$ftp_user		FTP user
 * @param 	string	$ftp_password	FTP password
 * @param 	string	$section		Directory
 * @param	integer	$ftp_passive	Use a passive mode
 * @return	int 	<0 if OK, >0 if KO
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
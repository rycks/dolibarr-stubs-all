<?php

// Max number of entries found into a language file. If too low, some entries will be overwritten.
/**
 * 	Save data into a memory area shared by all users, all sessions on server
 *
 *  @param	string      $memoryid		Memory id of shared area
 * 	@param	string		$data			Data to save
 * 	@return	int							<0 if KO, Nb of bytes written if OK
 */
function dol_setcache($memoryid, $data)
{
}
/**
 * 	Read a memory area shared by all users, all sessions on server
 *
 *  @param	string	$memoryid		Memory id of shared area
 * 	@return	int						<0 if KO, data if OK
 */
function dol_getcache($memoryid)
{
}
/**
 * 	Return shared memory address used to store dataset with key memoryid
 *
 *  @param	string	$memoryid		Memory id of shared area ('main', 'agenda', ...)
 * 	@return	int						<0 if KO, Memoy address of shared memory for key
 */
function dol_getshmopaddress($memoryid)
{
}
/**
 * 	Return list of contents of all memory area shared
 *
 * 	@return	array
 */
function dol_listshmop()
{
}
/**
 * 	Save data into a memory area shared by all users, all sessions on server
 *
 *  @param	int		$memoryid		Memory id of shared area ('main', 'agenda', ...)
 * 	@param	string	$data			Data to save
 * 	@return	int						<0 if KO, Nb of bytes written if OK
 */
function dol_setshmop($memoryid, $data)
{
}
/**
 * 	Read a memory area shared by all users, all sessions on server
 *
 *  @param	string	$memoryid		Memory id of shared area ('main', 'agenda', ...)
 * 	@return	int						<0 if KO, data if OK
 */
function dol_getshmop($memoryid)
{
}
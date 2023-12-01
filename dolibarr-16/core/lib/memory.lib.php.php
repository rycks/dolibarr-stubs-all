<?php

// Max number of entries found into a language file. If too low, some entries will be overwritten.
/**
 * 	Save data into a memory area shared by all users, all sessions on server
 *
 *  @param	string      $memoryid		Memory id of shared area
 * 	@param	mixed		$data			Data to save. It must not be a null value.
 *  @param 	int			$expire			ttl in seconds, 0 never expire
 * 	@return	int							<0 if KO, 0 if nothing is done, Nb of bytes written if OK
 *  @see dol_getcache()
 */
function dol_setcache($memoryid, $data, $expire = 0)
{
}
/**
 * 	Read a memory area shared by all users, all sessions on server
 *
 *  @param	string	$memoryid		Memory id of shared area
 * 	@return	int|mixed				<0 if KO, data if OK, null if not found into cache or no caching feature enabled
 *  @see dol_setcache()
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
 * 	@param	string	$data			Data to save. Must be a not null value.
 *  @param 	int		$expire			ttl in seconds, 0 never expire
 * 	@return	int						<0 if KO, 0=Caching not available, Nb of bytes written if OK
 */
function dol_setshmop($memoryid, $data, $expire)
{
}
/**
 * 	Read a memory area shared by all users, all sessions on server
 *
 *  @param	string	$memoryid		Memory id of shared area ('main', 'agenda', ...)
 * 	@return	int						<0 if KO, data if OK, Null if no cache enabled or not found
 */
function dol_getshmop($memoryid)
{
}
<?php

// Max number of entries found into a language file. If too low, some entries will be overwritten.
/**
 * 	Save data into a memory area shared by all users, all sessions on server. Note: MAIN_CACHE_COUNT must be set.
 *
 *  @param	string      $memoryid		Memory id of shared area
 * 	@param	mixed		$data			Data to save. It must not be a null value.
 *  @param 	int			$expire			ttl in seconds, 0 never expire
 *  @param 	int			$filecache		1 Enable file cache if no other session cache available, 0 Disabled (default)
 * 	@return	int							Return integer <0 if KO, 0 if nothing is done, Nb of bytes written if OK
 *  @see dol_getcache()
 */
function dol_setcache($memoryid, $data, $expire = 0, $filecache = 0)
{
}
/**
 * 	Read a memory area shared by all users, all sessions on server
 *
 *  @param	string	$memoryid		Memory id of shared area
 *  @param	int		$filecache		1 Enable file cache if no other session cache available, 0 Disabled (default)
 * 	@return	int|mixed				Return integer <0 if KO, data if OK, null if not found into cache or no caching feature enabled
 *  @see dol_setcache()
 */
function dol_getcache($memoryid, $filecache = 0)
{
}
/**
 * 	Return shared memory address used to store dataset with key memoryid
 *
 *  @param	string	$memoryid		Memory id of shared area ('main', 'agenda', ...)
 * 	@return	int						Return integer <0 if KO, Memoy address of shared memory for key
 */
function dol_getshmopaddress($memoryid)
{
}
/**
 * 	Return list of contents of all memory area shared
 *
 * 	@return	array<string,mixed|mixed[]>
 */
function dol_listshmop()
{
}
/**
 * 	Save data into a memory area shared by all users, all sessions on server
 *
 *  @param	string	$memoryid		Memory id of shared area ('main', 'agenda', ...)
 * 	@param	mixed|mixed[]	$data	Data to save. Must be a not null value.
 *  @param 	int		$expire			ttl in seconds, 0 never expire
 * 	@return	int						Return integer <0 if KO, 0=Caching not available, Nb of bytes written if OK
 */
function dol_setshmop($memoryid, $data, $expire)
{
}
/**
 * 	Read a memory area shared by all users, all sessions on server
 *
 *  @param	string	$memoryid		Memory id of shared area ('main', 'agenda', ...)
 * 	@return	int<-1,-1>|null|mixed|mixed[]	 integer <0 if KO, data if OK, null if no cache enabled or not found
 */
function dol_getshmop($memoryid)
{
}
<?php

/* Copyright (C) 2024  Laurent Destailleur     <eldy@users.sourceforge.net>
 * Copyright (C) 2026		MDW						<mdeweerd@users.noreply.github.com>
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
 *  \file		htdocs/blockedlog/lib/securitycore.lib.php
 *  \ingroup    core
 *  \brief		Set of function used for dolibarr security (not common functions).
 *  			Warning, this file must not depends on other library files, except function.lib.php
 *  			because it is used at low code level.
 */
\define('MAIN_SECURITY_REVERSIBLE_ALGO', 'AES-256-CTR');
/**
 * Return if we are using a HTTPS connection
 * Check HTTPS (no way to be modified by user but may be empty or wrong if user is using a proxy)
 * Take HTTP_X_FORWARDED_PROTO (defined when using proxy)
 * Then HTTP_X_FORWARDED_SSL
 *
 * @return	boolean		True if user is using HTTPS
 */
function isHTTPS()
{
}
/**
 *	Encode a string with a symmetric encryption. Used to encrypt sensitive data into database.
 *  Note: If a backup is restored onto another instance with a different $conf->file->instance_unique_id, then decoded value will differ.
 *  This function is called for example by dol_set_const() when saving a sensible data into database, like into configuration table llx_const, or societe_rib, ...
 *
 *	@param   string		$chain				String to encode
 *	@param   string		$key				Key to use to decode. It can be a list of keys separated by ','.
 *  @param	 string		$ciphering			Default ciphering algorithm
 *  @param	 string		$forceseed			To force the seed. Keep always empty on new versions.
 *  @param	 string		$obfuscationmode	'dolcrypt' or 'dolobfuscatev1'
 *	@return  string							Encoded string, with format 'dolcrypt:CIPHERING:seed:cryptedpass'
 *  @since v17
 *  @see dolDecrypt(), dol_hash()
 */
function dolEncrypt($chain, $key = '', $ciphering = '', $forceseed = '', $obfuscationmode = 'dolcrypt')
{
}
/**
 *	Decode a string with a symmetric encryption. Used to decrypt sensitive data saved into database.
 *  Note: If a backup is restored onto another instance with a different $conf->file->instance_unique_id, then decoded value will differ.
 *
 *	@param   string			$chain			Encrypted string to decode
 *	@param   string			$key			Key to use to decode. It can be a list of keys separated by ','.
 *  @param	 string			$patterntotest	Pattern to test if decoing is ok.
 *	@return  string							Decrypted string
 *  @since v17
 *  @see dolEncrypt(), dol_hash()
 */
function dolDecrypt($chain, $key = '', $patterntotest = '')
{
}
/**
 * 	Returns a hash (non reversible encryption) of a string.
 *  If constant MAIN_SECURITY_HASH_ALGO is defined, we use this function as hashing function (recommended value is 'password_hash')
 *  If constant MAIN_SECURITY_SALT is defined, we use it as a salt (used only if hashing algorithm is something else than 'password_hash').
 *
 * 	@param 		string		$chain		String to hash
 * 	@param		'auto'|'0'|'sha1'|'1'|'sha1md5'|'2'|'md5'|'3'|'openldap'|'4'|'sha256'|'5'|'password_hash'|'6'|'hash'	$type		Type of hash:
 *                                                                                                                  		        'auto' or '0': will use MAIN_SECURITY_HASH_ALGO else md5
 *                                                                                                                          		'sha1' or '1': sha1
 *  		                                                                                                                        'sha1md5' or '2': sha1md5
 *      		                                                                                                                    'md5' or '3': md5
 *              		                                                                                                            'openldapxxx' or '4': for OpenLdap
 *                      		                                                                                                    'sha256' or '5': sha256
 *                              		                                                                                            'password_hash' or '6': password_hash
 *                                      		                                                                                    Use 'md5' if hash is not needed for security purpose. For security need, prefer 'auto'.
 * 	@param 		int 		$nosalt		Do not include any salt
 *  @param		int			$mode		0=Return encoded password, 1=Return array with encoding password + encoding algorithm
 * 	@return		string|array{pass_encrypted:string,pass_encoding:string}	Hash of string or array with pass_encrypted and pass_encoding
 *  @see getRandomPassword(), dol_verifyHash()
 */
function dol_hash($chain, $type = '0', $nosalt = 0, $mode = 0)
{
}
/**
 * 	Compute a hash and compare it to the given one
 *  For backward compatibility reasons, if the hash is not in the password_hash format, we will try to match against md5 and sha1md5
 *  If constant MAIN_SECURITY_HASH_ALGO is defined, we use this function as hashing function.
 *  If constant MAIN_SECURITY_SALT is defined, we use it as a salt.
 *
 * 	@param 		string		$chain		String to hash (not hashed string)
 * 	@param 		string		$hash		hash to compare
 * 	@param		'auto'|'0'|'sha1'|'1'|'sha1md5'|'2'|'md5'|'3'|'openldap'|'4'|'sha256'|'5'|'password_hash'|'6'|'hash'	$type		Type of hash ('0':auto, '1':sha1, '2':sha1+md5, '3':md5, '4': for OpenLdap, '5':sha256, 'hash'). Use '3' here, if hash is not needed for security purpose, for security need, prefer '0'.
 * 	@return		bool					True if the computed hash is the same as the given one
 *  @see dol_hash()
 */
function dol_verifyHash($chain, $hash, $type = '0')
{
}
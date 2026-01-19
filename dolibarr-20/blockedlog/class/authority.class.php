<?php

/* Copyright (C) 2017 ATM Consulting <contact@atm-consulting.fr>
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
 *	Class to manage certif authority
 */
class BlockedLogAuthority
{
    /**
     * DoliDB
     * @var DoliDB
     */
    public $db;
    /**
     * Id of the authority
     * @var int
     */
    public $id;
    /**
     * @var string	Ref of the authority
     */
    public $ref;
    /**
     * Unique fingerprint of the blockchain to store
     * @var string
     */
    public $signature = '';
    /**
     * Entire fingerprints blockchain
     * @var string
     */
    public $blockchain = '';
    /**
     * timestamp
     * @var int
     */
    public $tms = 0;
    /**
     * Error message
     * @var string
     */
    public $error;
    /**
     *      Constructor
     *
     *      @param		DoliDB		$db      Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *	Get the blockchain
     *
     *	@return     string         			blockchain
     */
    public function getLocalBlockChain()
    {
    }
    /**
     *	Get hash of the block chain to check
     *
     *	@return     string         			hash md5 of blockchain
     */
    public function getBlockchainHash()
    {
    }
    /**
     *	Get hash of the block chain to check
     *
     *	@param      string		$hash		hash md5 of blockchain to test
     *	@return     boolean
     */
    public function checkBlockchain($hash)
    {
    }
    /**
     *	Add a new block to the chain
     *
     *	@param      string		$block		new block to chain
     *  @return void
     */
    public function addBlock($block)
    {
    }
    /**
     *	hash already exist into chain ?
     *
     *	@param      string		$block		new block to chain
     *	@return     boolean
     */
    public function checkBlock($block)
    {
    }
    /**
     *	Get object from database
     *
     *	@param      int			$id		       	Id of object to load
     *	@param      string		$signature		Signature of object to load
     *	@return     int         				>0 if OK, <0 if KO, 0 if not found
     */
    public function fetch($id, $signature = '')
    {
    }
    /**
     *	Create authority in database.
     *
     *	@param	User	$user      		Object user that create
     *	@return	int						Return integer <0 if KO, >0 if OK
     */
    public function create($user)
    {
    }
    /**
     *	Create authority in database.
     *
     *	@param	User	$user      		Object user that create
     *	@return	int						Return integer <0 if KO, >0 if OK
     */
    public function update($user)
    {
    }
    /**
     *	For cron to sync to authority.
     *
     *	@return	int						Return integer <0 if KO, >0 if OK
     */
    public function syncSignatureWithAuthority()
    {
    }
}
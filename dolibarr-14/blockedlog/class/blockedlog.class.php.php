<?php

/* Copyright (C) 2017      ATM Consulting      <contact@atm-consulting.fr>
 * Copyright (C) 2017-2020 Laurent Destailleur <eldy@destailleur.fr>
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
 *
 * See https://medium.com/@lhartikk/a-blockchain-in-200-lines-of-code-963cc1cc0e54
 */
/**
 *	Class to manage Blocked Log
 */
class BlockedLog
{
    /**
     * Id of the log
     * @var int
     */
    public $id;
    /**
     * Entity
     * @var int
     */
    public $entity;
    /**
     * @var string Error message
     */
    public $error = '';
    /**
     * @var string[] Error codes (or messages)
     */
    public $errors = array();
    /**
     * Unique fingerprint of the log
     * @var string
     */
    public $signature = '';
    /**
     * Unique fingerprint of the line log content
     * @var string
     */
    public $signature_line = '';
    public $amounts = \null;
    /**
     * trigger action
     * @var string
     */
    public $action = '';
    /**
     * Object element
     * @var string
     */
    public $element = '';
    /**
     * Object id
     * @var int
     */
    public $fk_object = 0;
    /**
     * Log certified by remote authority or not
     * @var boolean
     */
    public $certified = \false;
    /**
     * Author
     * @var int
     */
    public $fk_user = 0;
    /**
     * @var integer|string date_creation
     */
    public $date_creation;
    /**
     * @var integer|string $date_modification;
     */
    public $date_modification;
    public $date_object = 0;
    public $ref_object = '';
    public $object_data = \null;
    public $object_version = '';
    public $user_fullname = '';
    /**
     * Array of tracked event codes
     * @var string[]
     */
    public $trackedevents = array();
    /**
     *      Constructor
     *
     *      @param		DoliDB		$db      Database handler
     */
    public function __construct(\DoliDB $db)
    {
    }
    /**
     * Load list of tracked events into $this->trackedevents.
     *
     * @return int			Always 1
     */
    public function loadTrackedEvents()
    {
    }
    /**
     * Try to retrieve source object (it it still exists).
     *
     * @return string		URL string of source object
     */
    public function getObjectLink()
    {
    }
    /**
     *      try to retrieve user author
     * @return string
     */
    public function getUser()
    {
    }
    /**
     *      Populate properties of log from object data
     *
     *      @param		Object		$object     object to store
     *      @param		string		$action     action
     *      @param		string		$amounts    amounts
     *      @param		User		$fuser		User object (forced)
     *      @return		int						>0 if OK, <0 if KO
     */
    public function setObjectData(&$object, $action, $amounts, $fuser = \null)
    {
    }
    /**
     *	Get object from database
     *
     *	@param      int		$id       	Id of object to load
     *	@return     int         			>0 if OK, <0 if KO, 0 if not found
     */
    public function fetch($id)
    {
    }
    /**
     * Decode data
     *
     * @param	string	$data	Data to unserialize
     * @param	string	$mode	0=unserialize, 1=json_decode
     * @return 	string			Value unserialized
     */
    public function dolDecodeBlockedData($data, $mode = 0)
    {
    }
    /**
     *	Set block certified by authority
     *
     *	@return	boolean
     */
    public function setCertified()
    {
    }
    /**
     *	Create blocked log in database.
     *
     *	@param	User	$user      			Object user that create
     *  @param	int		$forcesignature		Force signature (for example '0000000000' when we disabled the module)
     *	@return	int							<0 if KO, >0 if OK
     */
    public function create($user, $forcesignature = '')
    {
    }
    /**
     *	Check if current signature still correct compared to the value in chain
     *
     *	@param	string			$previoushash		If previous signature hash is known, we can provide it to avoid to make a search of it in database.
     *  @param	int				$returnarray		1=Return array of details, 2=Return array of details including keyforsignature, 0=Boolean
     *	@return	boolean|array						True if OK, False if KO
     */
    public function checkSignature($previoushash = '', $returnarray = 0)
    {
    }
    /**
     * Return a string for signature.
     * Note: rowid of line not included as it is not a business data and this allow to make backup of a year
     * and restore it into another database with different id wihtout comprimising checksums
     *
     * @return string		Key for signature
     */
    private function buildKeyForSignature()
    {
    }
    /**
     *	Get previous signature/hash in chain
     *
     *	@param int	$withlock		1=With a lock
     *	@param int	$beforeid		ID of a record
     *  @return	string				Hash of previous record (if beforeid is defined) or hash of last record (if beforeid is 0)
     */
    public function getPreviousHash($withlock = 0, $beforeid = 0)
    {
    }
    /**
     *	Return array of log objects (with criterias)
     *
     *	@param	string 	$element      	element to search
     *	@param	int 	$fk_object		id of object to search
     *	@param	int 	$limit      	max number of element, 0 for all
     *	@param	string 	$sortfield     	sort field
     *	@param	string 	$sortorder     	sort order
     *	@param	int 	$search_fk_user id of user(s)
     *	@param	int 	$search_start   start time limit
     *	@param	int 	$search_end     end time limit
     *  @param	string	$search_ref		search ref
     *  @param	string	$search_amount	search amount
     *  @param	string	$search_code	search code
     *	@return	array|int				Array of object log or <0 if error
     */
    public function getLog($element, $fk_object, $limit = 0, $sortfield = '', $sortorder = '', $search_fk_user = -1, $search_start = -1, $search_end = -1, $search_ref = '', $search_amount = '', $search_code = '')
    {
    }
    /**
     *	Return the signature (hash) of the "genesis-block" (Block 0).
     *
     *	@return	string					Signature of genesis-block for current conf->entity
     */
    public function getSignature()
    {
    }
    /**
     * Check if module was already used or not for at least one recording.
     *
     * @param   int     $ignoresystem       Ignore system events for the test
     * @return  bool
     */
    public function alreadyUsed($ignoresystem = 0)
    {
    }
}
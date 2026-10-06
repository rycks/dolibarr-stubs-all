<?php

/**
 *	Class to manage Blocked Log
 */
class BlockedLog
{
    /**
     * @var DoliDB	Database handler
     */
    public $db;
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
     * Picto
     * @var string
     */
    public $picto = 'blockedlog';
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
     * @var float|string|null
     */
    public $amounts = \null;
    /**
     * @var float|string|null
     */
    public $amounts_taxexcl = \null;
    /**
     * trigger action
     * @var string
     */
    public $action = '';
    /**
     * @var string		Module source
     */
    public $module_source = '';
    /**
     * @var string		Terminal nb
     */
    public $pos_source = '';
    /**
     * @var string Example 'paymentofinvoice'
     */
    public $linktype = '';
    /**
     * @var string
     */
    public $linktoref = '';
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
     * @var int|string		Note we store in database in gmt time, not in server timezone time
     */
    public $date_creation;
    /**
     * @var int|string
     */
    public $date_modification;
    /**
     * @var int
     */
    public $date_object = 0;
    /**
     * @var string
     */
    public $ref_object = '';
    /**
     * @var string
     */
    public $type_code = '';
    /**
     * @var ?stdClass
     */
    public $object_data = \null;
    /**
     * @var string	Version of application
     */
    public $object_version = '';
    /**
     * @var string	Version of format of line ('', 'V1', ...).
     */
    public $object_format = '';
    /**
     * @var string
     */
    public $user_fullname = '';
    /**
     * @var string
     */
    public $debuginfo;
    /**
     * @var string
     */
    public $note;
    /**
     * Array of tracked event codes. They are event codes that triggers a record in the unalterable log (and you can filter in list of events).
     * @var array<string,string|mixed>
     */
    public $trackedevents = array();
    /**
     * Array of controlled event codes. They are event the execute a control when they occurs. An error return will cancel the action.
     * @var array<string,string|mixed>
     */
    public $controlledevents = array();
    /**
     * Array of tracked modules (key => label). List of modules we can see in module_pos.
     * @var array<int|string,string>
     */
    public $trackedmodules = array();
    /**
     *      Constructor
     *
     *      @param		DoliDB		$db      Database handler
     */
    public function __construct(\DoliDB $db)
    {
    }
    /**
     * Load list of tracked and controlled events into $this->controlled, $this->trackedevents and $this->trackedmodules
     *
     * @return int<1,1>		Always 1
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
     * Try to retrieve user author
     *
     * @return string
     */
    public function getUser()
    {
    }
    /**
     *	Populate properties of an unalterable log entry from object data.
     *  This populates ->object_data but also other fields like ->action, ->module_source, ->amounts_taxexcl, ->amounts and ->linktoref and ->linktype
     *  It also populates some debug info like ->element and ->fk_object
     *
     *	@param	CommonObject|stdClass		$object				Object to store
     *	@param	string						$action				Action code ('BILL_VALIDATE', 'BILL_SENTBYMAIL', ...)
     *	@param	float|int					$amounts			amounts (incl tax)
     *	@param	?User						$fuser				User object (forced)
     *	@param	float|int|null				$amounts_taxexcl	amounts (excl tax or null if not relevant)
     *	@return	int<-1,-1>|int<1,1>								Return >0 if OK, <0 if KO
     */
    public function setObjectData(&$object, $action, $amounts, $fuser = \null, $amounts_taxexcl = \null)
    {
    }
    /**
     *	Get object from database
     *
     *	@param      int		$id       	Id of object to load
     *	@return     int<-1,1>			>0 if OK, <0 if KO, 0 if not found
     */
    public function fetch($id)
    {
    }
    /**
     * Encode data
     *
     * @param	?stdClass	$data	Data to serialize
     * @param	int<0,1>	$mode	0=serialize, 1=json_encode
     * @return 	string				Value serialized, an object (stdClass).
     */
    public function dolEncodeBlockedData($data, $mode = 1)
    {
    }
    /**
     * Decode data
     *
     * @param	string	$data	Data to unserialize
     * @param	int		$mode	0=unserialize, 1=json_decode
     * @return 	Object			Value unserialized, an object (stdClass)
     */
    public function dolDecodeBlockedData($data, $mode = 0)
    {
    }
    /**
     *	Set block certified by an external authority
     *
     *	@return	boolean
     */
    public function setCertified()
    {
    }
    /**
     *	Create blocked log in database.
     *
     *	@param	User					$user      			Object user that create
     *  @param	string					$forcesignature		Force signature (for example '0000000000' when we disabled the module, to force a non valid record, for test purpose for example)
     *	@return	int<-3,-1>|int<1,1>							Return integer <0 if KO, >0 if OK
     */
    public function create($user, $forcesignature = '')
    {
    }
    /**
     * Return path of end of chain flag file.
     *
     * @return string
     */
    public function getEndOfChainFlagFile()
    {
    }
    /**
     *	Check if calculated signature still correct compared to the value in the chain
     *
     *	@param	string			$previoushash		If previous signature hash is known, we can provide it to avoid to make a search of it in database.
     *  @param	int<0,2>		$returnarray		1=Return array of details, 2=Return array of details including keyforsignature, 0=Return a boolean
     *	@return	boolean|array{checkresult:bool,calculatedsignature:string,previoushash:string,keyforsignature?:string}	Array or true if OK, false if KO
     */
    public function checkSignature($previoushash = '', $returnarray = 0)
    {
    }
    /**
     * Return first part of string for signature (clear data)
     * Note: rowid of line not included as it is not a business data and this allow to make backup of a year
     * and restore it into another database with different ids without comprimising checksums
     *
     * @param	string	$format		Force format to use
     * @return string				First part of key for signature
     */
    private function buildFirstPartOfKeyForSignature($format = '')
    {
    }
    /**
     * Return the string for signature (clear data).
     *
     * @param	string	$format		Force format to use
     * @return 	string				Key for signature
     */
    public function buildKeyForSignature($format = '')
    {
    }
    /**
     * Return a hash that is the signature of a line data $clearstring (hash_hmac SHA256 of data + secret key)
     *
     * @param 	string $clearstring		Data string to sign
     * @param	string	$format			Force encryption format version to use ('V1', 'V2', ...)
     * @return 	string					Signature string
     */
    private function buildFinalSignatureHash($clearstring, $format = '')
    {
    }
    /**
     * Save the HMAC secret key into database.
     *
     * @param	string		$hmac_secret_key		HMAC secret key ('BLOCKEDLOG_HMAC_KEY...')
     * @param	string		$obfuscationmode		Obfuscation mode ('dolcrypt', 'dolobfuscationv1-SIREN')
     * @param	string		$obfuscationkey			Obfuscation key
     * @return	int									Return <0 if KO, >0 if OK
     */
    public function saveHMACSecretKey($hmac_secret_key, $obfuscationmode, $obfuscationkey = '')
    {
    }
    /**
     * Return the remote obfuscation key from ping.dolibarr.org (used later to decode HMAC secret key).
     * Use a memory cache to avoid repeated db access.
     * This function can also be called just to store the remote obfuscation key into the cache so all next call will not depends on the obfuscation key server availability.
     * Note: Avoid to call this function if you are not in acontext that need remote obfuscation key.
     *
     * @return 	string					Obfuscation key or a coma-separated list of obfuscation keys, or "" if not found.
     */
    public function getObfuscationKey()
    {
    }
    /**
     * Get the encoded HMAC secret key.
     * Use a memory cache to avoid repeated db access.
     *
     * @param	int 	$nocache		Use 1 to force to not use cache.
     * @param 	int		$noentity		Use 1 to search without entity.
     * @return 	string					Encoded HMAC secret key.
     */
    public function getEncodedHMACSecretKey($nocache = 0, $noentity = 0)
    {
    }
    /**
     * Get the HMAC secret key.
     *
     * @param 	string	$hmac_encoded_secret_key	HMAC encode string retrieved with getEncodedHMACSecretKey()
     * @return 	string								Encoded HMAC secret key.
     */
    public function getClearHMACSecretKey($hmac_encoded_secret_key)
    {
    }
    /**
     *	Get previous signature/hash in chain. If there is no previous line, return the init hash.
     *
     *	@param int<0,1>	$withlock			1=With a lock (Used in the ->create() transaction)
     *	@param int		$beforeid			ID of a record
     *  @return	array<string, int|string>	Hash of previous record (if beforeid is defined) or hash of last record (if beforeid is 0)
     */
    public function getPreviousHash($withlock = 0, $beforeid = 0)
    {
    }
    /**
     * Return the last record in blocked log
     *
     * @param 	int							$rowidafter		Search record after this one
     * @return 	array<string, int|string>					Last record (id, date, signature)
     */
    public function getNextRecord($rowidafter = 0)
    {
    }
    /**
     * Return the last record in blocked log
     *
     * @return array<string, int|string>	Last record (id, date, signature)
     */
    public function getLastRecord()
    {
    }
    /**
     *	Return array of unalterable log objects (filtered with criteria)
     *
     *	@param	string 					$element      			Element to search
     *	@param	string|int				$fk_object				Id of object to search. Can be a UFS search criteria.
     *	@param	int<0,max> 				$limit      			Max number of element, 0 for all
     *	@param	string 					$sortfield     			Sort field
     *	@param	string 					$sortorder     			Sort order
     *	@param	int 					$search_fk_user 		Id of user(s)
     *	@param	int 					$search_start   		Start time limit
     *	@param	int 					$search_end     		End time limit
     *  @param	string					$search_ref				Search ref
     *  @param	string					$search_amount			Search amount
     *  @param	string|string[]	        $search_code			Search code
     *  @param	string			        $search_signature		Search signature
     *  @param	string			        $search_module_source	Search on module source
     *  @param	string			        $search_pos_source		Search on terminal
     *  @param	string					$search_type_code		Search on type code
     *	@return	BlockedLog[]|int<-2,-1>							Array of object log or <0 if error
     */
    public function getLog($element, $fk_object, $limit = 0, $sortfield = '', $sortorder = '', $search_fk_user = -1, $search_start = -1, $search_end = -1, $search_ref = '', $search_amount = '', $search_code = '', $search_signature = '', $search_module_source = '', $search_pos_source = '', $search_type_code = '')
    {
    }
    /**
     *	Return the signature (hash) of the "genesis-block" (Block 0).
     *
     *	@return	string					Signature of genesis-block for current conf->entity
     */
    public function getOrInitFirstSignature()
    {
    }
    /**
     * Check if module was already used or not for at least one recording.
     *
     * @param   int<0,1>	$ignoresystem       Ignore system events for the test
     * @return  bool
     */
    public function alreadyUsed($ignoresystem = 0)
    {
    }
    /**
     * Check if module can be enabled.
     *
     * @return  string			'' if ok, error message if not possible
     */
    public function canBeEnabled()
    {
    }
    /**
     * Check if module can be disabled.
     *
     * @return  int<0,1>		0=Can't be disabled, 1=Can be disabled
     */
    public function canBeDisabled()
    {
    }
    /**
     * Return current number of records.
     *
     * @return  int		Number of recor for all instances
     */
    public function countRecord()
    {
    }
}
<?php

/**
 * Class Currency
 *
 * Put here description of your class
 * @see CommonObject
 */
class MultiCurrency extends \CommonObject
{
    /**
     * @var string 			Id to identify managed objects
     */
    public $element = 'multicurrency';
    /**
     * @var string 			Name of table without prefix where object is stored
     */
    public $table_element = 'multicurrency';
    /**
     * @var string 			Name of table without prefix where object is stored
     */
    public $table_element_line = "multicurrency_rate";
    /**
     * @var CurrencyRate[]	Currency rates
     */
    public $rates = array();
    /**
     * @var int 			The environment ID when using a multicompany module
     */
    public $id;
    /**
     * @var string 			The currency code
     */
    public $code;
    /**
     * @var string 			The currency name
     */
    public $name;
    /**
     * @var int 			The environment ID when using a multicompany module
     */
    public $entity;
    /**
     * @var mixed Sample property 2
     */
    public $date_create;
    /**
     * @var mixed Sample property 2
     */
    public $fk_user;
    /**
     * @var ?CurrencyRate 	The currency rate
     */
    public $rate;
    /**
     * Constructor
     *
     * @param DoliDB $db Database handler
     */
    public function __construct(\DoliDB $db)
    {
    }
    /**
     * Create object into database
     *
     * @param  User $user      	User that creates
     * @param  int 	$notrigger 	0=launch triggers after, 1=disable triggers
     * @return int 				Return integer <0 if KO, Id of created object if OK
     */
    public function create(\User $user, $notrigger = 0)
    {
    }
    /**
     * Load object in memory from the database
     *
     * @param int    $id  		Id object
     * @param string $code 		code
     * @return int 				Return integer <0 if KO, 0 if not found, >0 if OK
     */
    public function fetch($id, $code = \null)
    {
    }
    /**
     * Load all rates in object from the database
     *
     * @return int Return integer <0 if KO, >=0 if OK
     */
    public function fetchAllCurrencyRate()
    {
    }
    /**
     * Update object into database
     *
     * @param  User $user      	User that modifies
     * @param  int 	$notrigger 	0=launch triggers after, 1=disable triggers
     * @return int 				Return integer <0 if KO, >0 if OK
     */
    public function update(\User $user, $notrigger = 0)
    {
    }
    /**
     * Delete object in database
     *
     * @param	User	$user		User making the deletion
     * @param  	int 	$notrigger 	0=launch triggers after, 1=disable triggers
     * @return 	int 				Return integer <0 if KO, >0 if OK
     */
    public function delete(\User $user, $notrigger = 0)
    {
    }
    /**
     * Delete rates in database
     *
     * @return bool false if KO, true if OK
     */
    public function deleteRates()
    {
    }
    /**
     * Add a Rate into database
     *
     * @param double	$rate	rate value
     * @return int 				-1 if KO, 1 if OK
     */
    public function addRate($rate)
    {
    }
    /**
     * Try get label of code in llx_currency then add rate.
     *
     * @param	string	$code	currency code
     * @param	double	$rate	new rate
     * @return 	int 			-1 if KO, 1 if OK, 2 if label found and OK
     */
    public function addRateFromDolibarr($code, $rate)
    {
    }
    /**
     * Add new entry into llx_multicurrency_rate
     *
     * @param double	$rate	rate value
     * @return int Return integer <0 if KO, >0 if OK
     */
    public function updateRate($rate)
    {
    }
    /**
     * Fetch CurrencyRate object in $this->rate
     *
     * @return int Return integer <0 if KO, 0 if not found, >0 if OK
     */
    public function getRate()
    {
    }
    /**
     * Get id of currency from code
     *
     * @param  DoliDB	$dbs	    object db
     * @param  string	$code	    code value search
     *
     * @return int                 0 if not found, >0 if OK
     */
    public static function getIdFromCode($dbs, $code)
    {
    }
    /**
     * Get id and rate of currency from code
     *
     * @param DoliDB			$dbs	        Object db
     * @param string			$code	        Code value search
     * @param integer|string	$date_document	Date from document (propal, order, invoice, ...)
     *
     * @return 	array			[0] => id currency
     *							[1] => rate
     */
    public static function getIdAndTxFromCode($dbs, $code, $date_document = '')
    {
    }
    /**
     * Get the conversion of amount with invoice rate
     *
     * @param	int				$fk_facture				Id of invoice
     * @param	double			$amount					amount to convert
     * @param	string			$way					'dolibarr' mean the amount is in dolibarr currency
     * @param	string			$table					'facture' or 'facture_fourn'
     * @param	float|null		$invoice_rate			Invoice rate if known (to avoid to make the getInvoiceRate call)
     * @return	float|false 							amount converted or false if conversion fails
     */
    public static function getAmountConversionFromInvoiceRate($fk_facture, $amount, $way = 'dolibarr', $table = 'facture', $invoice_rate = \null)
    {
    }
    /**
     *  Get current invoite rate
     *
     *  @param	int 		$fk_facture 	id of facture
     *  @param 	string 		$table 			facture or facture_fourn
     *  @return float|bool					Rate of currency or false if error
     */
    public static function getInvoiceRate($fk_facture, $table = 'facture')
    {
    }
    /**
     * With free account we can't set source then recalcul all rates to force another source.
     * This modify the array &$TRate.
     *
     * @param   stdClass	$TRate	Object containing all currencies rates
     * @return	int					-1 if KO, 0 if nothing, 1 if OK
     */
    public function recalculRates(&$TRate)
    {
    }
    /**
     * Sync rates from API
     *
     * @param 	string  $key                Key to use. Come from getDolGlobalString("MULTICURRENCY_APP_ID")
     * @param   int     $addifnotfound      Add if not found
     * @param   string  $mode				"" for standard use, "cron" to use it in a cronjob
     * @return  int							Return integer <0 if KO, >0 if OK, if mode = "cron" OK is 0
     */
    public function syncRates($key, $addifnotfound = 0, $mode = "")
    {
    }
    /**
     * Check in database if the current code already exists
     *
     * @param	string	$code 	current code to search
     * @return	boolean         True if exists, false if not exists
     */
    public function checkCodeAlreadyExists($code)
    {
    }
}
/**
 * Class CurrencyRate
 */
class CurrencyRate extends \CommonObjectLine
{
    /**
     * @var string Id to identify managed objects
     */
    public $element = 'multicurrency_rate';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'multicurrency_rate';
    /**
     * @var int ID
     */
    public $id;
    /**
     * @var double Rate
     */
    public $rate;
    /**
     * @var double Rate Indirect
     */
    public $rate_indirect;
    /**
     * @var integer    Date synchronisation
     */
    public $date_sync;
    /**
     * @var int Id of currency
     */
    public $fk_multicurrency;
    /**
     * @var int Id of entity
     */
    public $entity;
    /**
     * Constructor
     *
     * @param DoliDB $db Database handler
     */
    public function __construct(\DoliDB $db)
    {
    }
    /**
     * Create object into database
     *
     * @param	User	$user				User making the deletion
     * @param  	int		$fk_multicurrency	Id of currency
     * @param  	int 	$notrigger 			0=launch triggers after, 1=disable triggers
     * @return 	int 						Return integer <0 if KO, Id of created object if OK
     */
    public function create(\User $user, int $fk_multicurrency, $notrigger = 0)
    {
    }
    /**
     * Load object in memory from the database
     *
     * @param 	int    $id  Id object
     * @return 	int 		Return integer <0 if KO, 0 if not found, >0 if OK
     */
    public function fetch($id)
    {
    }
    /**
     * Update object into database
     *
     * @param	User	$user		User making the deletion
     * @param  	int 	$notrigger 	0=launch triggers after, 1=disable triggers
     * @return 	int 				Return integer <0 if KO, >0 if OK
     */
    public function update(\User $user, $notrigger = 0)
    {
    }
    /**
     * Delete object in database
     *
     * @param	User	$user		User making the deletion
     * @param  	int 	$notrigger 	0=launch triggers after, 1=disable triggers
     * @return 	int 				Return integer <0 if KO, >0 if OK
     */
    public function delete(\User $user, $notrigger = 0)
    {
    }
}
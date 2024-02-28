<?php

/**
 * Class to manage Dolibarr database access
 */
abstract class DoliDB implements \Database
{
    /** @var bool|resource|mysqli|SQLite3|PgSql\Connection Database handler */
    public $db;
    /** @var string Database type */
    public $type;
    /** @var string Charset used to force charset when creating database */
    public $forcecharset = 'utf8';
    /** @var string Collate used to force collate when creating database */
    public $forcecollate = 'utf8_unicode_ci';
    /** @var resource Resultset of last query */
    private $_results;
    /** @var bool true if connected, else false */
    public $connected;
    /** @var bool true if database selected, else false */
    public $database_selected;
    /** @var string Selected database name */
    public $database_name;
    /** @var string Database username */
    public $database_user;
    /** @var string Database host */
    public $database_host;
    /** @var int Database port */
    public $database_port;
    /** @var int >=1 if a transaction is opened, 0 otherwise */
    public $transaction_opened;
    /** @var string Last successful query */
    public $lastquery;
    /** @var string Last failed query */
    public $lastqueryerror;
    /** @var string Last error message */
    public $lasterror;
    /** @var string Last error number. For example: 'DB_ERROR_RECORD_ALREADY_EXISTS', '12345', ... */
    public $lasterrno;
    /** @var string If we need to set a prefix specific to the database so it can be reused (when defined instead of MAIN_DB_PREFIX) to forge requests */
    public $prefix_db;
    /** @var bool Status */
    public $ok;
    /** @var string */
    public $error;
    /**
     *	Return the DB prefix found into prefix_db (if it was set manually by doing $dbhandler->prefix_db=...).
     *  Otherwise return MAIN_DB_PREFIX (common use).
     *
     *	@return string		The DB prefix
     */
    public function prefix()
    {
    }
    /**
     *	Format a SQL IF
     *
     *	@param	string	$test           Test string (example: 'cd.statut=0', 'field IS NULL')
     *	@param	string	$resok          resultat si test egal
     *	@param	string	$resko          resultat si test non egal
     *	@return	string          		SQL string
     */
    public function ifsql($test, $resok, $resko)
    {
    }
    /**
     * Return SQL string to force an index
     *
     * @param	string	$nameofindex	Name of index
     * @return	string					SQL string
     */
    public function hintindex($nameofindex)
    {
    }
    /**
     *	Format a SQL REGEXP
     *
     *	@param	string	$subject        string tested
     *	@param	string  $pattern        SQL pattern to match
     *	@param	int		$sqlstring      whether or not the string being tested is an SQL expression
     *	@return	string          		SQL string
     */
    public function regexpsql($subject, $pattern, $sqlstring = 0)
    {
    }
    /**
     *   Convert (by PHP) a GM Timestamp date into a string date with PHP server TZ to insert into a date field.
     *   Function to use to build INSERT, UPDATE or WHERE predica
     *
     *   @param	    int		$param      Date TMS to convert
     *	 @param		mixed	$gm			'gmt'=Input informations are GMT values, 'tzserver'=Local to server TZ
     *   @return	string      		Date in a string YYYY-MM-DD HH:MM:SS
     */
    public function idate($param, $gm = 'tzserver')
    {
    }
    /**
     *	Return last error code
     *
     *	@return	    string	lasterrno
     */
    public function lasterrno()
    {
    }
    /**
     * Sanitize a string for SQL forging
     *
     * @param   string 	$stringtosanitize 	String to escape
     * @param   int		$allowsimplequote 	1=Allow simple quotes in string. When string is used as a list of SQL string ('aa', 'bb', ...)
     * @param	int		$allowsequals		1=Allow equals sign
     * @param	int		$allowsspace		1=Allow space char
     * @return  string                      String escaped
     */
    public function sanitize($stringtosanitize, $allowsimplequote = 0, $allowsequals = 0, $allowsspace = 0)
    {
    }
    /**
     * Start transaction
     *
     * @param	string	$textinlog		Add a small text into log. '' by default.
     * @return	int         			1 if transaction successfuly opened or already opened, 0 if error
     */
    public function begin($textinlog = '')
    {
    }
    /**
     * Validate a database transaction
     *
     * @param	string	$log		Add more log to default log line
     * @return	int         		1 if validation is OK or transaction level no started, 0 if ERROR
     */
    public function commit($log = '')
    {
    }
    /**
     *	Cancel a transaction and go back to initial data values
     *
     * 	@param	string			$log		Add more log to default log line
     * 	@return	resource|int         		1 if cancelation is ok or transaction not open, 0 if error
     */
    public function rollback($log = '')
    {
    }
    /**
     *	Define limits and offset of request
     *
     *	@param	int		$limit      Maximum number of lines returned (-1=conf->liste_limit, 0=no limit)
     *	@param	int		$offset     Numero of line from where starting fetch
     *	@return	string      		String with SQL syntax to add a limit and offset
     */
    public function plimit($limit = 0, $offset = 0)
    {
    }
    /**
     *	Return version of database server into an array
     *
     *	@return	        array  		Version array
     */
    public function getVersionArray()
    {
    }
    /**
     *	Return last request executed with query()
     *
     *	@return	string					Last query
     */
    public function lastquery()
    {
    }
    /**
     * Define sort criteria of request
     *
     * @param	string		$sortfield		List of sort fields, separated by comma. Example: 't1.fielda,t2.fieldb'
     * @param	string		$sortorder		Sort order, separated by comma. Example: 'ASC,DESC'. Note: If the quantity fo sortorder values is lower than sortfield, we used the last value for missing values.
     * @return	string						String to provide syntax of a sort sql string
     */
    public function order($sortfield = '', $sortorder = '')
    {
    }
    /**
     *	Return last error label
     *
     *	@return	    string		Last error
     */
    public function lasterror()
    {
    }
    /**
     *	Convert (by PHP) a PHP server TZ string date into a Timestamps date (GMT if gm=true)
     * 	19700101020000 -> 3600 with server TZ = +1 and $gm='tzserver'
     * 	19700101020000 -> 7200 whaterver is server TZ if $gm='gmt'
     *
     * 	@param	string				$string		Date in a string (YYYYMMDDHHMMSS, YYYYMMDD, YYYY-MM-DD HH:MM:SS)
     *	@param	mixed				$gm			'gmt'=Input informations are GMT values, 'tzserver'=Local to server TZ
     *	@return	int|string						Date TMS or ''
     */
    public function jdate($string, $gm = 'tzserver')
    {
    }
    /**
     *	Return last query in error
     *
     *	@return	    string	lastqueryerror
     */
    public function lastqueryerror()
    {
    }
    /**
     * Return first result from query as object
     * Note : This method executes a given SQL query and retrieves the first row of results as an object. It should only be used with SELECT queries
     * Dont add LIMIT to your query, it will be added by this method
     *
     * @param 	string 				$sql 	The sql query string
     * @return 	bool|int|object    			False on failure, 0 on empty, object on success
     */
    public function getRow($sql)
    {
    }
    /**
     * Return all results from query as an array of objects
     * Note : This method executes a given SQL query and retrieves all row of results as an array of objects. It should only be used with SELECT queries
     * be carefull with this method use it only with some limit of results to avoid performences loss.
     *
     * @param 	string 		$sql 		The sql query string
     * @return 	bool|array				Result
     * @deprecated
     */
    public function getRows($sql)
    {
    }
}
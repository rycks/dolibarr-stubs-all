<?php

/**
 *	Class to manage Dolibarr database access for a MySQL database using the MySQLi extension
 */
class DoliDBMysqli extends \DoliDB
{
    /** @var mysqli Database object */
    public $db;
    //! Database type
    public $type = 'mysqli';
    //! Database label
    const LABEL = 'MySQL or MariaDB';
    //! Version min database
    const VERSIONMIN = '5.0.3';
    /** @var bool|mysqli_result Resultset of last query */
    private $_results;
    /**
     *	Constructor.
     *	This create an opened connection to a database server and eventually to a database
     *
     *	@param      string	$type		Type of database (mysql, pgsql...). Not used.
     *	@param	    string	$host		Address of database server
     *	@param	    string	$user		Name of database user
     *	@param	    string	$pass		Password of database user
     *	@param	    string	$name		Name of database
     *	@param	    int		$port		Port of database server
     */
    public function __construct($type, $host, $user, $pass, $name = '', $port = 0)
    {
    }
    /**
     * Return SQL string to force an index
     *
     * @param	string	$nameofindex	Name of index
     * @param	int		$mode			0=Use, 1=Force
     * @return	string					SQL string
     */
    public function hintindex($nameofindex, $mode = 1)
    {
    }
    /**
     *  Convert a SQL request in Mysql syntax to native syntax
     *
     *  @param     string	$line   SQL request line to convert
     *  @param     string	$type	Type of SQL order ('ddl' for insert, update, select, delete or 'dml' for create, alter...)
     *  @return    string   		SQL request line converted
     */
    public function convertSQLFromMysql($line, $type = 'ddl')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Select a database
     *
     *  @param	    string	$database	Name of database
     *  @return	    boolean  		    true if OK, false if KO
     */
    public function select_db($database)
    {
    }
    /**
     * Connect to server
     *
     * @param   string          $host           Database server host
     * @param   string          $login          Login
     * @param   string          $passwd         Password
     * @param   string          $name           Name of database (not used for mysql, used for pgsql)
     * @param   integer         $port           Port of database server
     * @return  mysqli|mysqliDoli|false         Database access object
     * @see close()
     */
    public function connect($host, $login, $passwd, $name, $port = 0)
    {
    }
    /**
     *	Return version of database server
     *
     *	@return	        string      Version string
     */
    public function getVersion()
    {
    }
    /**
     *	Return version of database client driver
     *
     *	@return	        string      Version string
     */
    public function getDriverInfo()
    {
    }
    /**
     *  Close database connection
     *
     *  @return     bool     True if disconnect successful, false otherwise
     *  @see        connect()
     */
    public function close()
    {
    }
    /**
     * 	Execute a SQL request and return the resultset
     *
     * 	@param	string	$query			SQL query string
     * 	@param	int		$usesavepoint	0=Default mode, 1=Run a savepoint before and a rollback to savepoint if error (this allow to have some request with errors inside global transactions).
     * 									Note that with Mysql, this parameter is not used as Myssql can already commit a transaction even if one request is in error, without using savepoints.
     *  @param  string	$type           Type of SQL order ('ddl' for insert, update, select, delete or 'dml' for create, alter...)
     * 	@param	int		$result_mode	Result mode (Using 1=MYSQLI_USE_RESULT instead of 0=MYSQLI_STORE_RESULT will not buffer the result and save memory)
     *	@return	false|mysqli_result		Resultset of answer
     */
    public function query($query, $usesavepoint = 0, $type = 'auto', $result_mode = 0)
    {
    }
    /**
     * Get caller info
     *
     * @return string
     */
    protected static final function getCallerInfoString()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * 	Returns the current line (as an object) for the resultset cursor
     *
     *	@param	mysqli_result	$resultset	Curseur de la requete voulue
     *	@return	object|null					Object result line or null if KO or end of cursor
     */
    public function fetch_object($resultset)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Return data as an array
     *
     *	@param	mysqli_result	$resultset	Resultset of request
     *	@return	array<int|string,mixed>|null|false	Array or null if KO or end of cursor
     */
    public function fetch_array($resultset)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Return data as an array
     *
     *	@param	mysqli_result	$resultset	Resultset of request
     *	@return	array<int,mixed>|null|int<0,0>	Array or null if KO or end of cursor or 0 if resultset is bool
     */
    public function fetch_row($resultset)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Return number of lines for result of a SELECT
     *
     *	@param	mysqli_result	$resultset  Resulset of requests
     *	@return	int				Nb of lines
     *	@see    affected_rows()
     */
    public function num_rows($resultset)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Return the number of lines in the result of a request INSERT, DELETE or UPDATE
     *
     *	@param	mysqli_result	$resultset	Curseur de la requete voulue
     *	@return int							Number of lines
     *	@see    num_rows()
     */
    public function affected_rows($resultset)
    {
    }
    /**
     *	Libere le dernier resultset utilise sur cette connection
     *
     *	@param  mysqli_result	$resultset	Curseur de la requete voulue
     *	@return	void
     */
    public function free($resultset = \null)
    {
    }
    /**
     *	Escape a string to insert data
     *
     *	@param	string	$stringtoencode		String to escape
     *	@return	string						String escaped
     */
    public function escape($stringtoencode)
    {
    }
    /**
     *	Escape a string to insert data into a like
     *
     *	@param	string	$stringtoencode		String to escape
     *	@return	string						String escaped
     */
    public function escapeforlike($stringtoencode)
    {
    }
    /**
     *	Return generic error code of last operation.
     *
     *	@return	string		Error code (Examples: DB_ERROR_TABLE_ALREADY_EXISTS, DB_ERROR_RECORD_ALREADY_EXISTS...)
     */
    public function errno()
    {
    }
    /**
     *	Return description of last error
     *
     *	@return	string		Error text
     */
    public function error()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Get last ID after an insert INSERT
     *
     * @param   string	$tab    	Table name concerned by insert. Ne sert pas sous MySql mais requis pour compatibilite avec Postgresql
     * @param	string	$fieldid	Field name
     * @return  int|string			Id of row
     */
    public function last_insert_id($tab, $fieldid = 'rowid')
    {
    }
    /**
     * Encrypt sensitive data in database
     * Warning: This function includes the escape and add the SQL simple quotes on strings.
     *
     * @param	string	$fieldorvalue	Field name or value to encrypt
     * @param	int		$withQuotes		Return string including the SQL simple quotes. This param must always be 1 (Value 0 is bugged and deprecated).
     * @return	string					XXX(field) or XXX('value') or field or 'value'
     */
    public function encrypt($fieldorvalue, $withQuotes = 1)
    {
    }
    /**
     *	Decrypt sensitive data in database
     *
     *	@param	string	$value			Value to decrypt
     * 	@return	string					Decrypted value if used
     */
    public function decrypt($value)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Return connection ID
     *
     * @return	        string      Id connection
     */
    public function DDLGetConnectId()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Create a new database
     *	Do not use function xxx_create_db (xxx=mysql, ...) as they are deprecated
     *	We force to create database with charset this->forcecharset and collate this->forcecollate
     *
     *	@param	string	$database		Database name to create
     * 	@param	string	$charset		Charset used to store data
     * 	@param	string	$collation		Charset used to sort data
     * 	@param	string	$owner			Username of database owner
     * 	@return	null|mysqli_result		Resource defined if OK, null if KO
     */
    public function DDLCreateDb($database, $charset = '', $collation = '', $owner = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  List tables into a database
     *
     *  @param	string		$database	Name of database
     *  @param	string		$table		Name of table filter ('xxx%')
     *  @return	string[]				List of tables in an array
     */
    public function DDLListTables($database, $table = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  List tables into a database
     *
     *  @param	string		$database	Name of database
     *  @param	string		$table		Name of table filter ('xxx%')
     *  @return	array<array{0:string,1:string}>		List of tables in an array
     */
    public function DDLListTablesFull($database, $table = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	List information of columns in a table.
     *
     *	@param	string	$table		Name of table
     *	@return	array<array<mixed>>		Table with information of columns in the table
     */
    public function DDLInfoTable($table)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Create a table into database
     *
     *	@param	    string	$table 			Name of table
     *	@param	    array<string,array{type:string,label?:string,enabled?:int<0,2>|string,position?:int,notnull?:int,visible?:int<-2,5>|string,alwayseditable?:int<0,1>,noteditable?:int<0,1>,default?:string,index?:int,foreignkey?:string,searchall?:int<0,1>,isameasure?:int<0,1>,css?:string,csslist?:string,help?:string,showoncombobox?:int<0,2>,disabled?:int<0,1>,arrayofkeyval?:array<int,string>,autofocusoncreate?:int<0,1>,comment?:string,copytoclipboard?:int<1,2>,validate?:int<0,1>}>	$fields 		Tableau associatif [nom champ][tableau des descriptions]
     *	@param	    string	$primary_key 	Nom du champ qui sera la clef primaire
     *	@param	    string	$type 			Type de la table
     *	@param	    ?array<string,mixed>	$unique_keys 	Tableau associatifs Nom de champs qui seront clef unique => valeur
     *	@param	    string[]	$fulltext_keys	Tableau des Nom de champs qui seront indexes en fulltext
     *	@param	    array<string,mixed>	$keys 	Tableau des champs cles noms => valeur
     *	@return	    int						Return integer <0 if KO, >=0 if OK
     */
    public function DDLCreateTable($table, $fields, $primary_key, $type, $unique_keys = \null, $fulltext_keys = \null, $keys = \null)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Drop a table into database
     *
     *	@param	    string	$table 			Name of table
     *	@return	    int						Return integer <0 if KO, >=0 if OK
     */
    public function DDLDropTable($table)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Return a pointer of line with description of a table or field
     *
     *	@param	string		$table	Name of table
     *	@param	string		$field	Optionnel : Name of field if we want description of field
     *	@return	bool|mysqli_result	Resultset x (x->Field, x->Type, ...)
     */
    public function DDLDescTable($table, $field = "")
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Create a new field into table
     *
     *	@param	string	$table 				Name of table
     *	@param	string	$field_name 		Name of field to add
     *	@param	array{type:string,label?:string,enabled?:int<0,2>|string,position?:int,notnull?:int,visible?:int,noteditable?:int,default?:string,extra?:string,null?:string,index?:int,foreignkey?:string,searchall?:int,isameasure?:int,css?:string,csslist?:string,help?:string,showoncombobox?:int,disabled?:int,arrayofkeyval?:array<int,string>,comment?:string} $field_desc 		Associative array of description of the field to insert [parameter name][parameter value]
     *	@param	string	$field_position 	Optional e.g.: "after some_field"
     *	@return	int							Return integer <0 if KO, >0 if OK
     */
    public function DDLAddField($table, $field_name, $field_desc, $field_position = "")
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Update format of a field into a table
     *
     *	@param	string	$table 				Name of table
     *	@param	string	$field_name 		Name of field to modify
     *	@param	array{type:string,label:string,enabled:int<0,2>|string,position:int,notnull?:int,visible:int,noteditable?:int,default?:string,index?:int,foreignkey?:string,searchall?:int,isameasure?:int,css?:string,csslist?:string,help?:string,showoncombobox?:int,disabled?:int,arrayofkeyval?:array<int,string>,comment?:string,value?:string,null?:string}	$field_desc 		Array with description of field format
     *	@return	int							Return integer <0 if KO, >0 if OK
     */
    public function DDLUpdateField($table, $field_name, $field_desc)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Drop a field from table
     *
     *	@param	string	$table 			Name of table
     *	@param	string	$field_name 	Name of field to drop
     *	@return	int						Return integer <0 if KO, >0 if OK
     */
    public function DDLDropField($table, $field_name)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * 	Create a user and privileges to connect to database (even if database does not exists yet)
     *
     *	@param	string	$dolibarr_main_db_host 		Ip server or '%'
     *	@param	string	$dolibarr_main_db_user 		Nom new user
     *	@param	string	$dolibarr_main_db_pass 		Password for the new user
     *	@param	string	$dolibarr_main_db_name		Database name where user must be granted
     *	@return	int									Return integer <0 if KO, >=0 if OK
     */
    public function DDLCreateUser($dolibarr_main_db_host, $dolibarr_main_db_user, $dolibarr_main_db_pass, $dolibarr_main_db_name)
    {
    }
    /**
     *	Return charset used to store data in current database
     *  Note: if we are connected to databasename, it is same result than using SELECT default_character_set_name FROM information_schema.SCHEMATA WHERE schema_name = "databasename";)
     *
     *	@return		string		Charset
     *  @see getDefaultCollationDatabase()
     */
    public function getDefaultCharacterSetDatabase()
    {
    }
    /**
     *	Return list of available charset that can be used to store data in database
     *
     *	@return	?array<int,array{charset:string,description:string}>		List of Charset
     */
    public function getListOfCharacterSet()
    {
    }
    /**
     *	Return collation used in current database
     *
     *	@return		string		Collation value
     *  @see getDefaultCharacterSetDatabase()
     */
    public function getDefaultCollationDatabase()
    {
    }
    /**
     *	Return list of available collation that can be used for database
     *
     *	@return		?array<int,array{collation:string}>		List of Collations
     */
    public function getListOfCollation()
    {
    }
    /**
     *	Return full path of dump program
     *
     *	@return		string		Full path of dump program
     */
    public function getPathOfDump()
    {
    }
    /**
     *	Return full path of restore program
     *
     *	@return		string		Full path of restore program
     */
    public function getPathOfRestore()
    {
    }
    /**
     * Return value of server parameters
     *
     * @param	string	$filter			Filter list on a particular value
     * @return	array<string,string>	Array of key-values (key=>value)
     */
    public function getServerParametersValues($filter = '')
    {
    }
    /**
     * Return value of server status (current indicators on memory, cache...)
     *
     * @param	string	$filter			Filter list on a particular value
     * @return  array<string,string>	Array of key-values (key=>value)
     */
    public function getServerStatusValues($filter = '')
    {
    }
}
/**
 * Class to make SSL connection
 */
class mysqliDoli extends \mysqli
{
    /**
     *	Constructor.
     *	This create an opened connection to a database server and eventually to a database
     *
     *	@param	    string	$host		Address of database server
     *	@param	    string	$user		Name of database user
     *	@param	    string	$pass		Password of database user
     *	@param	    string	$name		Name of database
     *	@param	    int		$port		Port of database server
     *	@param	    string	$socket		Socket
     */
    public function __construct($host, $user, $pass, $name, $port = 0, $socket = "")
    {
    }
}
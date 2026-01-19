<?php

/**
 *	Class to manage Dolibarr database access for a SQLite database
 */
class DoliDBSqlite3 extends \DoliDB
{
    //! Database type
    public $type = 'sqlite3';
    //! Database label
    const LABEL = 'Sqlite3';
    //! Version min database
    const VERSIONMIN = '3.0.0';
    /**
     * @var SQLite3Result|boolean 	Resultset of last query
     */
    private $_results;
    const WEEK_MONDAY_FIRST = 1;
    const WEEK_YEAR = 2;
    const WEEK_FIRST_WEEKDAY = 4;
    /**
     *  Constructor.
     *  This create an opened connexion to a database server and eventually to a database
     *
     *  @param      string	$type		Type of database (mysql, pgsql...). Not used.
     *  @param	    string	$host		Address of database server
     *  @param	    string	$user		Nom de l'utilisateur autorise
     *  @param	    string	$pass		Mot de passe
     *  @param	    string	$name		Nom de la database
     *  @param	    int		$port		Port of database server
     */
    public function __construct($type, $host, $user, $pass, $name = '', $port = 0)
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
     *	Select a database
     *
     *	@param	    string	$database	Name of database
     *	@return	    boolean  		    true if OK, false if KO
     */
    public function select_db($database)
    {
    }
    /**
     *	Connexion to server
     *
     *	@param	    string	$host		database server host
     *	@param	    string	$login		login
     *	@param	    string	$passwd		password
     *	@param		string	$name		name of database (not used for mysql, used for pgsql)
     *	@param		integer	$port		Port of database server
     *	@return		SQLite3|string				Database access handler
     *	@see		close()
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
     *  Close database connexion
     *
     *  @return     bool     True if disconnect successfull, false otherwise
     *  @see        connect()
     */
    public function close()
    {
    }
    /**
     *  Execute a SQL request and return the resultset
     *
     * 	@param	string	$query			SQL query string
     * 	@param	int		$usesavepoint	0=Default mode, 1=Run a savepoint before and a rollbock to savepoint if error (this allow to have some request with errors inside global transactions).
     * 									Note that with Mysql, this parameter is not used as Myssql can already commit a transaction even if one request is in error, without using savepoints.
     *  @param  string	$type           Type of SQL order ('ddl' for insert, update, select, delete or 'dml' for create, alter...)
     * @param	int		$result_mode	Result mode (not used with sqlite)
     *	@return	bool|SQLite3Result		Resultset of answer
     */
    public function query($query, $usesavepoint = 0, $type = 'auto', $result_mode = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * 	Returns the current line (as an object) for the resultset cursor
     *
     *	@param	SQLite3Result	$resultset  Curseur de la requete voulue
     *	@return	false|object				Object result line or false if KO or end of cursor
     */
    public function fetch_object($resultset)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Return datas as an array
     *
     *	@param	SQLite3Result	$resultset  Resultset of request
     *	@return	false|array					Array or false if KO or end of cursor
     */
    public function fetch_array($resultset)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Return datas as an array
     *
     *	@param	SQLite3Result	$resultset  Resultset of request
     *	@return	false|array					Array or false if KO or end of cursor
     */
    public function fetch_row($resultset)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Return number of lines for result of a SELECT
     *
     *	@param	SQLite3Result	$resultset  Resulset of requests
     *	@return int		    			Nb of lines
     *	@see    affected_rows()
     */
    public function num_rows($resultset)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Return number of lines for result of a SELECT
     *
     *	@param	SQLite3Result	$resultset  Resulset of requests
     *	@return int		    			Nb of lines
     *	@see    affected_rows()
     */
    public function affected_rows($resultset)
    {
    }
    /**
     *	Free last resultset used.
     *
     *	@param  SQLite3Result	$resultset   Curseur de la requete voulue
     *	@return	void
     */
    public function free($resultset = \null)
    {
    }
    /**
     *	Escape a string to insert data
     *
     *  @param	string	$stringtoencode		String to escape
     *  @return	string						String escaped
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
     *	Renvoie le code erreur generique de l'operation precedente.
     *
     *	@return	string		Error code (Exemples: DB_ERROR_TABLE_ALREADY_EXISTS, DB_ERROR_RECORD_ALREADY_EXISTS...)
     */
    public function errno()
    {
    }
    /**
     *	Renvoie le texte de l'erreur mysql de l'operation precedente.
     *
     *	@return	string	Error text
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
     * @return  int     			Id of row
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
     * Return connexion ID
     *
     * @return	        string      Id connexion
     */
    public function DDLGetConnectId()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Create a new database
     *	Do not use function xxx_create_db (xxx=mysql, ...) as they are deprecated
     *	We force to create database with charset this->forcecharset and collate this->forcecollate
     *
     *	@param	string	$database		Database name to create
     * 	@param	string	$charset		Charset used to store data
     * 	@param	string	$collation		Charset used to sort data
     * 	@param	string	$owner			Username of database owner
     * 	@return	SQLite3Result   		resource defined if OK, null if KO
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
     *  @return	array					List of tables in an array
     */
    public function DDLListTables($database, $table = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  List tables into a database with table type
     *
     *  @param	string		$database	Name of database
     *  @param	string		$table		Name of table filter ('xxx%')
     *  @return	array					List of tables in an array
     */
    public function DDLListTablesFull($database, $table = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  List information of columns into a table.
     *
     *	@param	string	$table		Name of table
     *	@return	array				Tableau des informations des champs de la table
     *	TODO modify for sqlite
     */
    public function DDLInfoTable($table)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Create a table into database
     *
     *	@param	    string	$table 			Nom de la table
     *	@param	    array	$fields 		Tableau associatif [nom champ][tableau des descriptions]
     *	@param	    string	$primary_key 	Nom du champ qui sera la clef primaire
     *	@param	    string	$type 			Type de la table
     *	@param	    array	$unique_keys 	Tableau associatifs Nom de champs qui seront clef unique => valeur
     *	@param	    array	$fulltext_keys	Tableau des Nom de champs qui seront indexes en fulltext
     *	@param	    array	$keys 			Tableau des champs cles noms => valeur
     *	@return	    int						Return integer <0 if KO, >=0 if OK
     */
    public function DDLCreateTable($table, $fields, $primary_key, $type, $unique_keys = \null, $fulltext_keys = \null, $keys = \null)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Drop a table into database
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
     *	@return	bool|SQLite3Result		Resource
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
     *	@param	string	$field_desc 		Tableau associatif de description du champ a inserer[nom du parametre][valeur du parametre]
     *	@param	string	$field_position 	Optionnel ex.: "after champtruc"
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
     *	@param	string	$field_desc 		Array with description of field format
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
     *	@param	string	$dolibarr_main_db_host 		Ip serveur
     *	@param	string	$dolibarr_main_db_user 		Nom user a creer
     *	@param	string	$dolibarr_main_db_pass 		Mot de passe user a creer
     *	@param	string	$dolibarr_main_db_name		Database name where user must be granted
     *	@return	int									Return integer <0 if KO, >=0 if OK
     */
    public function DDLCreateUser($dolibarr_main_db_host, $dolibarr_main_db_user, $dolibarr_main_db_pass, $dolibarr_main_db_name)
    {
    }
    /**
     *	Return charset used to store data in database
     *
     *	@return		string		Charset
     */
    public function getDefaultCharacterSetDatabase()
    {
    }
    /**
     *	Return list of available charset that can be used to store data in database
     *
     *	@return		array		List of Charset
     */
    public function getListOfCharacterSet()
    {
    }
    /**
     *	Return collation used in database
     *
     *	@return		string		Collation value
     */
    public function getDefaultCollationDatabase()
    {
    }
    /**
     *	Return list of available collation that can be used for database
     *
     *	@return		array		List of Collation
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
     * @param	string	$filter		Filter list on a particular value
     * @return	array				Array of key-values (key=>value)
     */
    public function getServerParametersValues($filter = '')
    {
    }
    /**
     * Return value of server status
     *
     * @param	string	$filter		Filter list on a particular value
     * @return  array				Array of key-values (key=>value)
     */
    public function getServerStatusValues($filter = '')
    {
    }
    /**
     * Permet le chargement d'une fonction personnalisee dans le moteur de base de donnees.
     * Note: le nom de la fonction personnalisee est prefixee par 'db'. La fonction doit être
     * statique et publique. Le nombre de parametres est determine automatiquement.
     *
     * @param 	string 	$name 			Le nom de la fonction a definir dans Sqlite
     * @param	int		$arg_count		Arg count
     * @return	void
     */
    private function addCustomFunction($name, $arg_count = -1)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * calc_daynr
     *
     * @param 	int 	$year		Year
     * @param 	int 	$month		Month
     * @param	int     $day 		Day
     * @return int Formatted date
     */
    private static function calc_daynr($year, $month, $day)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * calc_weekday
     *
     * @param int	$daynr							???
     * @param bool	$sunday_first_day_of_week		???
     * @return int
     */
    private static function calc_weekday($daynr, $sunday_first_day_of_week)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * calc_days_in_year
     *
     * @param 	string	$year		Year
     * @return	int					Nb of days in year
     */
    private static function calc_days_in_year($year)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * calc_week
     *
     * @param 	string	$year				Year
     * @param 	string	$month				Month
     * @param 	string	$day				Day
     * @param 	string	$week_behaviour		Week behaviour
     * @param 	string	$calc_year			???
     * @return	string						???
     */
    private static function calc_week($year, $month, $day, $week_behaviour, &$calc_year)
    {
    }
}
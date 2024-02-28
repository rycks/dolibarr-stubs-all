<?php

/**
 *	Class to import CSV files
 */
class ImportCsv extends \ModeleImports
{
    /**
     * @var DoliDB Database handler.
     */
    public $db;
    public $datatoimport;
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    /**
     * @var string[] Error codes (or messages)
     */
    public $errors = array();
    /**
     * @var int ID
     */
    public $id;
    /**
     * @var string label
     */
    public $label;
    public $extension;
    // Extension of files imported by driver
    /**
     * Dolibarr version of driver
     * @var string
     */
    public $version = 'dolibarr';
    public $label_lib;
    // Label of external lib used by driver
    public $version_lib;
    // Version of external lib used by driver
    public $separator;
    public $file;
    // Path of file
    public $handle;
    // Handle fichier
    public $cacheconvert = array();
    // Array to cache list of value found after a convertion
    public $cachefieldtable = array();
    // Array to cache list of value found into fields@tables
    public $nbinsert = 0;
    // # of insert done during the import
    public $nbupdate = 0;
    // # of update done during the import
    /**
     *	Constructor
     *
     *	@param	DoliDB		$db				Database handler
     *	@param	string		$datatoimport	String code describing import set (ex: 'societe_1')
     */
    public function __construct($db, $datatoimport)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * 	Output header of an example file for this format
     *
     * 	@param	Translate	$outputlangs		Output language
     *  @return	string							Empty string
     */
    public function write_header_example($outputlangs)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * 	Output title line of an example file for this format
     *
     * 	@param	Translate	$outputlangs		Output language
     *  @param	array		$headerlinefields	Array of fields name
     * 	@return	string							String output
     */
    public function write_title_example($outputlangs, $headerlinefields)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * 	Output record of an example file for this format
     *
     * 	@param	Translate	$outputlangs		Output language
     * 	@param	array		$contentlinevalues	Array of lines
     * 	@return	string							String output
     */
    public function write_record_example($outputlangs, $contentlinevalues)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * 	Output footer of an example file for this format
     *
     * 	@param	Translate	$outputlangs		Output language
     *  @return	string							Empty string
     */
    public function write_footer_example($outputlangs)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Open input file
     *
     *	@param	string	$file		Path of filename
     *	@return	int					<0 if KO, >=0 if OK
     */
    public function import_open_file($file)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * 	Return nb of records. File must be closed.
     *
     *	@param	string	$file		Path of filename
     * 	@return		int		<0 if KO, >=0 if OK
     */
    public function import_get_nb_of_lines($file)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * 	Input header line from file
     *
     * 	@return		int		<0 if KO, >=0 if OK
     */
    public function import_read_header()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * 	Return array of next record in input file.
     *
     * 	@return		Array		Array of field values. Data are UTF8 encoded. [fieldpos] => (['val']=>val, ['type']=>-1=null,0=blank,1=not empty string)
     */
    public function import_read_record()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * 	Close file handle
     *
     *  @return	integer
     */
    public function import_close_file()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Insert a record into database
     *
     * @param	array	$arrayrecord					Array of read values: [fieldpos] => (['val']=>val, ['type']=>-1=null,0=blank,1=string), [fieldpos+1]...
     * @param	array	$array_match_file_to_database	Array of target fields where to insert data: [fieldpos] => 's.fieldname', [fieldpos+1]...
     * @param 	Object	$objimport						Object import (contains objimport->array_import_tables, objimport->array_import_fields, objimport->array_import_convertvalue, ...)
     * @param	int		$maxfields						Max number of fields to use
     * @param	string	$importid						Import key
     * @param	array	$updatekeys						Array of keys to use to try to do an update first before insert. This field are defined into the module descriptor.
     * @return	int										<0 if KO, >0 if OK
     */
    public function import_insert($arrayrecord, $array_match_file_to_database, $objimport, $maxfields, $importid, $updatekeys)
    {
    }
}
/**
 *	Clean a string from separator
 *
 *	@param	string	$value	Remove standard separators
 *	@return	string			String without separators
 */
function cleansep($value)
{
}
<?php

/**
 * Class to manage intracomm report
 */
class IntracommReport extends \CommonObject
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'intracommreport';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'intracommreport';
    /**
     * @var string Field with ID of parent key if this field has a parent
     */
    public $fk_element = 'fk_intracommreport';
    public $picto = 'intracommreport';
    /**
     * @var string ref ???
     */
    public $label;
    public $period;
    public $declaration;
    /**
     * @var string declaration number
     */
    public $declaration_number;
    /**
     * @var string
     */
    public $exporttype;
    // deb or des
    /**
     * @var string
     */
    public $type_declaration;
    // 'introduction' or 'expedition'
    public $numero_declaration;
    /**
     * DEB - Product
     */
    const TYPE_DEB = 0;
    /**
     * DES - Service
     */
    const TYPE_DES = 1;
    public static $type = array('introduction' => 'Introduction', 'expedition' => 'Expédition');
    /**
     * Constructor
     *
     * @param DoliDB $db Database handle
     */
    public function __construct(\DoliDB $db)
    {
    }
    /**
     * Function create
     *
     * @param 	User 	$user 		User
     * @param 	int 	$notrigger 	notrigger
     * @return 	int
     */
    public function create($user, $notrigger = 0)
    {
    }
    /**
     * Function fetch
     *
     * @param 	int 	$id 	object ID
     * @return 	int
     */
    public function fetch($id)
    {
    }
    /**
     * Function delete
     *
     * @param 	User 	$user 		User
     * @param 	int 	$notrigger 	notrigger
     * @return 	int
     */
    public function delete($user, $notrigger = 0)
    {
    }
    /**
     * Generate XML file
     *
     * @param string		$mode 				'O' for create, R for regenerate (Look always 0 meant toujours 0 within the framework of XML exchanges according to documentation)
     * @param string		$type 				Declaration type by default - introduction or expedition (always 'expedition' for Des)
     * @param string		$period_reference	Period of reference
     * @return string|false						Return a well-formed XML string based on SimpleXML element, false or 0 if error
     */
    public function getXML($mode = 'O', $type = 'introduction', $period_reference = '')
    {
    }
    /**
     * Generate XMLDes file
     *
     * @param int		$period_year		Year of declaration
     * @param int		$period_month		Month of declaration
     * @param string	$type_declaration	Declaration type by default - 'introduction' or 'expedition' (always 'expedition' for Des)
     * @return string|false					Return a well-formed XML string based on SimpleXML element, false or 0 if error
     */
    public function getXMLDes($period_year, $period_month, $type_declaration = 'expedition')
    {
    }
    /**
     *  Add line from invoice
     *
     *  @param	SimpleXMLElement	$declaration		Reference declaration
     *  @param	string				$type				Declaration type by default - 'introduction' or 'expedition' (always 'expedition' for Des)
     *  @param	int					$period_reference	Reference period
     *  @param	string				$exporttype	    	'deb' for DEB, 'des' for DES
     *  @return	int       			  					Return integer <0 if KO, >0 if OK
     */
    public function addItemsFact(&$declaration, $type, $period_reference, $exporttype = 'deb')
    {
    }
    /**
     *  Add invoice line
     *
     *  @param      string	$type				Declaration type by default - introduction or expedition (always 'expedition' for Des)
     *  @param      int		$period_reference	Reference declaration
     *  @param      string	$exporttype	    	deb=DEB, des=DES
     *  @return     string       			  	Return integer <0 if KO, >0 if OK
     */
    public function getSQLFactLines($type, $period_reference, $exporttype = 'deb')
    {
    }
    /**
     *	Add item for DEB
     *
     * 	@param	SimpleXMLElement	$declaration		Reference declaration
     * 	@param	stdClass			$res				Result of request SQL
     *  @param	int					$i					Line Id
     * 	@param	string				$code_douane_spe	Specific customs authorities code
     *  @return	void
     */
    public function addItemXMl(&$declaration, &$res, $i, $code_douane_spe = '')
    {
    }
    /**
     *	Add item for DES
     *
     * 	@param	SimpleXMLElement	$declaration		Reference declaration
     * 	@param	stdClass			$res				Result of request SQL
     *  @param	int					$i					Line Id
     *  @return	void
     */
    public function addItemXMlDes($declaration, &$res, $i)
    {
    }
    /**
     *	This function adds an item by retrieving the customs code of the product with the highest amount in the invoice
     *
     * 	@param	SimpleXMLElement	$declaration		Reference declaration
     * 	@param	array				$TLinesFraisDePort	Data of shipping costs line
     *  @param	string	    		$type				Declaration type by default - introduction or expedition (always 'expedition' for Des)
     *  @param	Categorie			$categ_fraisdeport	category of shipping costs
     *  @param	int		    		$i					Line Id
     *  @return	void
     */
    public function addItemFraisDePort(&$declaration, &$TLinesFraisDePort, $type, &$categ_fraisdeport, $i)
    {
    }
    /**
     *	Return next reference of declaration not already used (or last reference)
     *
     *	@return    string					free ref or last ref
     */
    public function getNextDeclarationNumber()
    {
    }
    /**
     *	Verify declaration number. Positive integer of a maximum of 6 characters recommended by the documentation
     *
     *	@param     	string		$number		Number to verify / convert
     *	@return		string 				Number
     */
    public static function getDeclarationNumber($number)
    {
    }
    /**
     *	Generate XML file
     *
     *  @param		string		$content_xml	Content
     *	@return		void
     */
    public function generateXMLFile($content_xml)
    {
    }
}
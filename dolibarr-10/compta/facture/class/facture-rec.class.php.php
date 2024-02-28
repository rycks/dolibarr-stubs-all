<?php

/**
 *	Class to manage invoice templates
 */
class FactureRec extends \CommonInvoice
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'facturerec';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'facture_rec';
    /**
     * @var int    Name of subtable line
     */
    public $table_element_line = 'facturedet_rec';
    /**
     * @var int Field with ID of parent key if this field has a parent
     */
    public $fk_element = 'fk_facture';
    /**
     * @var string String with name of icon for myobject. Must be the part after the 'object_' into object_myobject.png
     */
    public $picto = 'bill';
    /**
     * @var int Entity
     */
    public $entity;
    public $number;
    public $date;
    public $amount;
    public $remise;
    public $tva;
    public $total;
    public $db_table;
    public $propalid;
    public $date_last_gen;
    public $date_when;
    public $nb_gen_done;
    public $nb_gen_max;
    public $frequency;
    public $unit_frequency;
    public $rang;
    public $special_code;
    public $usenewprice = 0;
    public $suspended;
    // status
    const STATUS_NOTSUSPENDED = 0;
    const STATUS_SUSPENDED = 1;
    /**
     *	Constructor
     *
     * 	@param		DoliDB		$db		Database handler
     */
    public function __construct($db)
    {
    }
    /**
     * 	Create a predefined invoice
     *
     * 	@param		User	$user		User object
     * 	@param		int		$facid		Id of source invoice
     *	@return		int					<0 if KO, id of invoice created if OK
     */
    public function create($user, $facid)
    {
    }
    /**
     * 	Update a line to invoice_rec.
     *
     *  @param		User	$user					User
     *  @param		int		$notrigger				No trigger
     *	@return    	int             				<0 if KO, Id of line if OK
     */
    public function update(\User $user, $notrigger = 0)
    {
    }
    /**
     *	Load object and lines
     *
     *	@param      int		$rowid       	Id of object to load
     * 	@param		string	$ref			Reference of recurring invoice
     * 	@param		string	$ref_ext		External reference of invoice
     * 	@param		int		$ref_int		Internal reference of other object
     *	@return     int         			>0 if OK, <0 if KO, 0 if not found
     */
    public function fetch($rowid, $ref = '', $ref_ext = '', $ref_int = '')
    {
    }
    /**
     * 	Create an array of invoice lines
     *
     * 	@return int		>0 if OK, <0 if KO
     */
    public function getLinesArray()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Recupere les lignes de factures predefinies dans this->lines
     *
     *  @return     int         1 if OK, < 0 if KO
     */
    public function fetch_lines()
    {
    }
    /**
     * 	Delete template invoice
     *
     *	@param     	User	$user          	User that delete.
     *	@param		int		$notrigger		1=Does not execute triggers, 0= execute triggers
     *	@param		int		$idwarehouse	Id warehouse to use for stock change.
     *	@return		int						<0 if KO, >0 if OK
     */
    public function delete(\User $user, $notrigger = 0, $idwarehouse = -1)
    {
    }
    /**
     * 	Add a line to invoice
     *
     *	@param    	string		$desc            	Description de la ligne
     *	@param    	double		$pu_ht              Prix unitaire HT (> 0 even for credit note)
     *	@param    	double		$qty             	Quantite
     *	@param    	double		$txtva           	Taux de tva force, sinon -1
     * 	@param		double		$txlocaltax1		Local tax 1 rate (deprecated)
     *  @param		double		$txlocaltax2		Local tax 2 rate (deprecated)
     *	@param    	int			$fk_product      	Product/Service ID predefined
     *	@param    	double		$remise_percent  	Percentage discount of the line
     *	@param		string		$price_base_type	HT or TTC
     *	@param    	int			$info_bits			VAT npr or not ?
     *	@param    	int			$fk_remise_except	Id remise
     *	@param    	double		$pu_ttc             Prix unitaire TTC (> 0 even for credit note)
     *	@param		int			$type				Type of line (0=product, 1=service)
     *	@param      int			$rang               Position of line
     *	@param		int			$special_code		Special code
     *	@param		string		$label				Label of the line
     *	@param		string		$fk_unit			Unit
     * 	@param		double		$pu_ht_devise		Unit price in currency
     *  @param		int			$date_start_fill	1=Flag to fill start date when generating invoice
     *  @param		int			$date_end_fill		1=Flag to fill end date when generating invoice
     * 	@param		int			$fk_fournprice		Supplier price id (to calculate margin) or ''
     * 	@param		int			$pa_ht				Buying price of line (to calculate margin) or ''
     *	@return    	int             				<0 if KO, Id of line if OK
     */
    public function addline($desc, $pu_ht, $qty, $txtva, $txlocaltax1 = 0, $txlocaltax2 = 0, $fk_product = 0, $remise_percent = 0, $price_base_type = 'HT', $info_bits = 0, $fk_remise_except = '', $pu_ttc = 0, $type = 0, $rang = -1, $special_code = 0, $label = '', $fk_unit = \null, $pu_ht_devise = 0, $date_start_fill = 0, $date_end_fill = 0, $fk_fournprice = \null, $pa_ht = 0)
    {
    }
    /**
     * 	Update a line to invoice
     *
     *  @param     	int			$rowid           	Id of line to update
     *	@param    	string		$desc            	Description de la ligne
     *	@param    	double		$pu_ht              Prix unitaire HT (> 0 even for credit note)
     *	@param    	double		$qty             	Quantite
     *	@param    	double		$txtva           	Taux de tva force, sinon -1
     * 	@param		double		$txlocaltax1		Local tax 1 rate (deprecated)
     *  @param		double		$txlocaltax2		Local tax 2 rate (deprecated)
     *	@param    	int			$fk_product      	Product/Service ID predefined
     *	@param    	double		$remise_percent  	Percentage discount of the line
     *	@param		string		$price_base_type	HT or TTC
     *	@param    	int			$info_bits			Bits de type de lignes
     *	@param    	int			$fk_remise_except	Id remise
     *	@param    	double		$pu_ttc             Prix unitaire TTC (> 0 even for credit note)
     *	@param		int			$type				Type of line (0=product, 1=service)
     *	@param      int			$rang               Position of line
     *	@param		int			$special_code		Special code
     *	@param		string		$label				Label of the line
     *	@param		string		$fk_unit			Unit
     * 	@param		double		$pu_ht_devise		Unit price in currency
     * 	@param		int			$notrigger			disable line update trigger
     *  @param		int			$date_start_fill	1=Flag to fill start date when generating invoice
     *  @param		int			$date_end_fill		1=Flag to fill end date when generating invoice
     * 	@param		int			$fk_fournprice		Id of origin supplier price
     * 	@param		int			$pa_ht				Price (without tax) of product when it was bought
     *	@return    	int             				<0 if KO, Id of line if OK
     */
    public function updateline($rowid, $desc, $pu_ht, $qty, $txtva, $txlocaltax1 = 0, $txlocaltax2 = 0, $fk_product = 0, $remise_percent = 0, $price_base_type = 'HT', $info_bits = 0, $fk_remise_except = '', $pu_ttc = 0, $type = 0, $rang = -1, $special_code = 0, $label = '', $fk_unit = \null, $pu_ht_devise = 0, $notrigger = 0, $date_start_fill = 0, $date_end_fill = 0, $fk_fournprice = \null, $pa_ht = 0)
    {
    }
    /**
     * Return the next date of
     *
     * @return  int|false   false if KO, timestamp if OK
     */
    public function getNextDate()
    {
    }
    /**
     * Return if maximum number of generation is reached
     *
     * @return	boolean			False by default, True if maximum number of generation is reached
     */
    public function isMaxNbGenReached()
    {
    }
    /**
     * Format string to output with by striking the string if max number of generation was reached
     *
     * @param	string		$ret	Default value to output
     * @return	boolean				False by default, True if maximum number of generation is reached
     */
    public function strikeIfMaxNbGenReached($ret)
    {
    }
    /**
     *  Create all recurrents invoices (for all entities if multicompany is used).
     *  A result may also be provided into this->output.
     *
     *  WARNING: This method change temporarly context $conf->entity to be in correct context for each recurring invoice found.
     *
     *  @param	int		$restrictioninvoiceid		0=All qualified template invoices found. > 0 = restrict action on invoice ID
     *  @param	int		$forcevalidation		1=Force validation of invoice whatever is template auto_validate flag.
     *  @return	int								0 if OK, < 0 if KO (this function is used also by cron so only 0 is OK)
     */
    public function createRecurringInvoices($restrictioninvoiceid = 0, $forcevalidation = 0)
    {
    }
    /**
     *	Return clicable name (with picto eventually)
     *
     * @param	int		$withpicto       			Add picto into link
     * @param  string	$option          			Where point the link
     * @param  int		$max             			Maxlength of ref
     * @param  int		$short           			1=Return just URL
     * @param  string   $moretitle       			Add more text to title tooltip
     * @param	int  	$notooltip		 			1=Disable tooltip
     * @param  int		$save_lastsearch_value    	-1=Auto, 0=No save of lastsearch_values when clicking, 1=Save lastsearch_values whenclicking
     * @return string 			         			String with URL
     */
    public function getNomUrl($withpicto = 0, $option = '', $max = 0, $short = 0, $moretitle = '', $notooltip = '', $save_lastsearch_value = -1)
    {
    }
    /**
     *  Return label of object status
     *
     *  @param      int		$mode			0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=short label + picto, 6=Long label + picto
     *  @param      integer	$alreadypaid    Not used on recurring invoices
     *  @return     string			        Label of status
     */
    public function getLibStatut($mode = 0, $alreadypaid = -1)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Return label of a status
     *
     *	@param    	int  	$recur         	Is it a recurring invoice ?
     *	@param      int		$status        	Id status (suspended or not)
     *	@param      int		$mode          	0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=short label + picto, 6=long label + picto
     *	@param		integer	$alreadypaid	Not used for recurring invoices
     *	@param		int		$type			Type invoice
     *	@return     string        			Label of status
     */
    public function LibStatut($recur, $status, $mode = 0, $alreadypaid = -1, $type = 0)
    {
    }
    /**
     *  Initialise an instance with random values.
     *  Used to build previews or test instances.
     *	id must be 0 if object instance is a specimen.
     *
     *	@param	string		$option		''=Create a specimen invoice with lines, 'nolines'=No lines
     *  @return	void
     */
    public function initAsSpecimen($option = '')
    {
    }
    /**
     * Function used to replace a thirdparty id with another one.
     *
     * @param DoliDB $db Database handler
     * @param int $origin_id Old thirdparty id
     * @param int $dest_id New thirdparty id
     * @return bool
     */
    public static function replaceThirdparty(\DoliDB $db, $origin_id, $dest_id)
    {
    }
    /**
     *	Update frequency and unit
     *
     *	@param     	int		$frequency		value of frequency
     *	@param     	string	$unit 			unit of frequency  (d, m, y)
     *	@return		int						<0 if KO, >0 if OK
     */
    public function setFrequencyAndUnit($frequency, $unit)
    {
    }
    /**
     *	Update the next date of execution
     *
     *	@param     	datetime	$date					date of execution
     *	@param     	int			$increment_nb_gen_done	0 do nothing more, >0 increment nb_gen_done
     *	@return		int									<0 if KO, >0 if OK
     */
    public function setNextDate($date, $increment_nb_gen_done = 0)
    {
    }
    /**
     *	Update the maximum period
     *
     *	@param     	int		$nb		number of maximum period
     *	@return		int				<0 if KO, >0 if OK
     */
    public function setMaxPeriod($nb)
    {
    }
    /**
     *	Update the auto validate flag of invoice
     *
     *	@param     	int		$validate		0 to create in draft, 1 to create and validate invoice
     *	@return		int						<0 if KO, >0 if OK
     */
    public function setAutoValidate($validate)
    {
    }
    /**
     *	Update the auto generate documents
     *
     *	@param     	int		$validate		0 no document, 1 to generate document
     *	@return		int						<0 if KO, >0 if OK
     */
    public function setGeneratePdf($validate)
    {
    }
    /**
     *  Update the model for documents
     *
     *  @param     	string		$model		model of document generator
     *  @return		int						<0 if KO, >0 if OK
     */
    public function setModelPdf($model)
    {
    }
}
/**
 *	Class to manage invoice lines of templates.
 *  Saved into database table llx_facturedet_rec
 */
class FactureLigneRec extends \CommonInvoiceLine
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'facturedetrec';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'facturedet_rec';
    public $date_start_fill;
    public $date_end_fill;
    /**
     * 	Delete line in database
     *
     *  @param		User	$user		Object user
     *  @param		int		$notrigger	Disable triggers
     *	@return		int					<0 if KO, >0 if OK
     */
    public function delete(\User $user, $notrigger = \false)
    {
    }
    /**
     *	Recupere les lignes de factures predefinies dans this->lines
     *
     *	@param		int 	$rowid		Id of invoice
     *	@return     int         		1 if OK, < 0 if KO
     */
    public function fetch($rowid)
    {
    }
    /**
     * 	Update a line to invoice_rec.
     *
     *  @param		User	$user					User
     *  @param		int		$notrigger				No trigger
     *	@return    	int             				<0 if KO, Id of line if OK
     */
    public function update(\User $user, $notrigger = 0)
    {
    }
}
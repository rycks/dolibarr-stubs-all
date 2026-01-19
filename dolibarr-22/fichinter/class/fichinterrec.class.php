<?php

/**
 * Class to manage recurring interventions
 */
class FichinterRec extends \Fichinter
{
    public $element = 'fichinterrec';
    public $table_element = 'fichinter_rec';
    public $table_element_line = 'fichinterdet_rec';
    /**
     * {@inheritdoc}
     */
    protected $table_ref_field = 'title';
    /**
     * @var string String with name of icon for myobject. Must be the part after the 'object_' into object_myobject.png
     */
    public $picto = 'intervention';
    /**
     * @var string title
     */
    public $title;
    /**
     * @var int
     */
    public $auto_validate;
    /**
     * @var ?int Frequency
     */
    public $frequency;
    /**
     * @var int
     */
    public $id_origin;
    /**
     * @var string Unit frequency
     */
    public $unit_frequency;
    /**
     * @var int Proposal Id
     */
    public $propalid;
    /**
     * @var int|string
     */
    public $date_last_gen;
    /**
     * @var int|string
     */
    public $date_when;
    /**
     * @var int number of generation done
     */
    public $nb_gen_done;
    /**
     * @var int number of maximum generation
     */
    public $nb_gen_max;
    /**
     * @var int rank
     */
    public $rang;
    /**
     * @var int special code
     */
    public $special_code;
    /**
     * @var int
     */
    public $usenewprice = 0;
    /**
     *	Constructor
     *
     * 	@param		DoliDB		$db		Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *	Returns the label status
     *
     *	@param      int		$mode       0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto
     *	@return     string              Label
     */
    public function getLibStatut($mode = 0)
    {
    }
    /**
     *  Create a predefined fichinter
     *
     *  @param      User    $user       User object
     *  @param      int     $notrigger  no trigger
     *  @return     int                 Return integer <0 if KO, id of fichinter if OK
     */
    public function create($user, $notrigger = 0)
    {
    }
    /**
     *	Get the template of intervention object and lines
     *
     *	@param	  int		$rowid	   	Id of object to load
     * 	@param		string	$ref			Reference of fichinter
     * 	@param		string	$ref_ext		External reference of fichinter
     *	@return	 int		 			>0 if OK, <0 if KO, 0 if not found
     */
    public function fetch($rowid = 0, $ref = '', $ref_ext = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Load all lines of template of intervention into this->lines
     *
     *  @param   int	$sall   sall
     *  @return	 int            1 if OK, < 0 if KO
     */
    public function fetch_lines($sall = 0)
    {
    }
    /**
     * 	Delete template fichinter rec
     *
     *	@param      User	$user			Object user who delete
     *	@param		int		$notrigger		Disable trigger
     *	@return		int						Return integer <0 if KO, >0 if OK
     */
    public function delete(\User $user, $notrigger = 0)
    {
    }
    /**
     *  Add line to a recurring intervention
     *
     *  @param		string		$desc				Line description
     *  @param		integer		$duration			Duration
     *  @param		int			$date				Date
     *  @param		int			$rang				Position of line
     *  @param		double		$pu_ht				Unit price without tax (> 0 even for credit note)
     *  @param		double		$qty				Quantity
     *  @param		double		$txtva				Forced VAT rate, otherwise -1
     *  @param		int			$fk_product			Id of predefined product/service
     *  @param		double		$remise_percent		Percentage of discount for line
     *  @param		string		$price_base_type	HT or TTC
     *  @param		int			$info_bits			Bits for type of lines
     *  @param		int			$fk_remise_except	Id discount (not used)
     *  @param		double		$pu_ttc				Unit price with tax (> 0 even for credit note)
     *  @param		int			$type				Type of line (0=product, 1=service)
     *  @param		int			$special_code		Special code
     *  @param		string		$label				Label of the line
     *  @param		string		$fk_unit			Unit
     *  @return		int			 					if KO: <0 || if OK: Id of line
     */
    public function addLineRec($desc, $duration, $date, $rang = -1, $pu_ht = 0, $qty = 0, $txtva = 0, $fk_product = 0, $remise_percent = 0, $price_base_type = 'HT', $info_bits = 0, $fk_remise_except = 0, $pu_ttc = 0, $type = 0, $special_code = 0, $label = '', $fk_unit = \null)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Rend la fichinter automatique
     *
     *	@param		User	$user		User object
     *	@param		int		$freq		Freq
     *	@param		string	$courant	Courant
     *	@return		int					0 if OK, <0 if KO
     */
    public function set_auto($user, $freq, $courant)
    {
    }
    /**
     *  Return clickable name (with picto eventually)
     *
     *  @param	int		$withpicto      Add picto into link
     *  @param  string	$option		    Where point the link
     *  @param  int		$max			Maxlength of ref
     *  @param  int		$short		    1=Return just URL
     *  @param  string   $moretitle     Add more text to title tooltip
     *  @return string 					String with URL
     */
    public function getNomUrl($withpicto = 0, $option = '', $max = 0, $short = 0, $moretitle = '')
    {
    }
    /**
     *  Initialise an instance with random values.
     *  Used to build previews or test instances.
     *	id must be 0 if object instance is a specimen.
     *
     *  @return int
     */
    public function initAsSpecimen()
    {
    }
    /**
     * Function used to replace a thirdparty id with another one.
     *
     * @param 	DoliDB 	$dbs 		Database handler, because function is static we name it $dbs not $db to avoid breaking coding test
     * @param 	int 	$origin_id 	Old thirdparty id
     * @param 	int 	$dest_id 	New thirdparty id
     * @return 	bool
     */
    public static function replaceThirdparty(\DoliDB $dbs, $origin_id, $dest_id)
    {
    }
    /**
     * Function used to replace a product id with another one.
     *
     * @param DoliDB $db Database handler
     * @param int $origin_id Old product id
     * @param int $dest_id New product id
     * @return bool
     */
    public static function replaceProduct(\DoliDB $db, $origin_id, $dest_id)
    {
    }
    /**
     *	Update frequency and unit
     *
     *	@param	 	?int	$frequency		value of frequency
     *	@param	 	string	$unit 			unit of frequency  (d, m, y)
     *	@return		int						Return integer <0 if KO, >0 if OK
     */
    public function setFrequencyAndUnit($frequency, $unit)
    {
    }
    /**
     *	Update the next date of execution
     *
     *	@param	 	int			$date					date of execution
     *	@param	 	int<0,max>	$increment_nb_gen_done	0 do nothing more, >0 increment nb_gen_done
     *	@return		int									Return integer <0 if KO, >0 if OK
     */
    public function setNextDate($date, $increment_nb_gen_done = 0)
    {
    }
    /**
     *	Update the maximum period
     *
     *	@param	 	int		$nb		number of maximum period
     *	@return		int				Return integer <0 if KO, >0 if OK
     */
    public function setMaxPeriod($nb)
    {
    }
    /**
     *	Update the auto validate fichinter
     *
     *	@param	 	int		$validate		0 to create in draft, 1 to create and validate fichinter
     *	@return		int						Return integer <0 if KO, >0 if OK
     */
    public function setAutoValidate($validate)
    {
    }
    /**
     *	Update the Number of Generation Done
     *
     *	@return		int						Return integer <0 if KO, >0 if OK
     */
    public function updateNbGenDone()
    {
    }
}
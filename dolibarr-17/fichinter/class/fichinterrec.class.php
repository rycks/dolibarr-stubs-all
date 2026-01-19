<?php

/**
 *	Classe de gestion des factures recurrentes/Modeles
 */
class FichinterRec extends \Fichinter
{
    public $element = 'fichinterrec';
    public $table_element = 'fichinter_rec';
    public $table_element_line = 'fichinterdet_rec';
    /**
     * @var string Fieldname with ID of parent key if this field has a parent
     */
    public $fk_element = 'fk_fichinter';
    /**
     * {@inheritdoc}
     */
    protected $table_ref_field = 'titre';
    /**
     * @var string String with name of icon for myobject. Must be the part after the 'object_' into object_myobject.png
     */
    public $picto = 'intervention';
    /**
     * @var string title
     */
    public $title;
    public $number;
    public $date;
    public $amount;
    public $tva;
    public $total;
    /**
     * @var int Proposal Id
     */
    public $propalid;
    public $date_last_gen;
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
     * int rank
     */
    public $rang;
    public $special_code;
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
     *  @return     int                 <0 if KO, id of fichinter if OK
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
     *	@param	 	int		$rowid	  	    Id of fichinter rec to delete. If empty, we delete current instance of fichinter rec
     *	@param		int		$notrigger	    1=Does not execute triggers, 0= execute triggers
     *	@param		int		$idwarehouse    Id warehouse to use for stock change.
     *	@return		int						<0 if KO, >0 if OK
     */
    public function delete($rowid = 0, $notrigger = 0, $idwarehouse = -1)
    {
    }
    /**
     *  Add a line to fichinter rec
     *
     *  @param		string		$desc               Description de la ligne
     *  @param		integer		$duration           Durée
     *  @param		string	    $date				Date
     *  @param	    int			$rang			    Position of line
     *  @param		double		$pu_ht			    Unit price without tax (> 0 even for credit note)
     *  @param		double		$qty			 	Quantity
     *  @param		double		$txtva		   	    Forced VAT rate, otherwise -1
     *  @param		int			$fk_product	  	    Id of predefined product/service
     *  @param		double		$remise_percent  	Percentage of discount on line
     *  @param		string		$price_base_type	HT or TTC
     *  @param		int			$info_bits			Bits for type of lines
     *  @param		int			$fk_remise_except   Id discount
     *  @param		double		$pu_ttc			    Unit price with tax (> 0 even for credit note)
     *  @param		int			$type				Type of line (0=product, 1=service)
     *  @param		int			$special_code		Special code
     *  @param		string		$label				Label of the line
     *  @param		string		$fk_unit			Unit
     *  @return		int			 				    <0 if KO, Id of line if OK
     */
    public function addline($desc, $duration, $date, $rang = -1, $pu_ht = 0, $qty = 0, $txtva = 0, $fk_product = 0, $remise_percent = 0, $price_base_type = 'HT', $info_bits = 0, $fk_remise_except = '', $pu_ttc = 0, $type = 0, $special_code = 0, $label = '', $fk_unit = \null)
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
     *  Return clicable name (with picto eventually)
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
     *	@param	string		$option		''=Create a specimen fichinter with lines, 'nolines'=No lines
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
     *	@param	 	int		$frequency		value of frequency
     *	@param	 	string	$unit 			unit of frequency  (d, m, y)
     *	@return		int						<0 if KO, >0 if OK
     */
    public function setFrequencyAndUnit($frequency, $unit)
    {
    }
    /**
     *	Update the next date of execution
     *
     *	@param	 	datetime	$date					date of execution
     *	@param	 	int			$increment_nb_gen_done	0 do nothing more, >0 increment nb_gen_done
     *	@return		int									<0 if KO, >0 if OK
     */
    public function setNextDate($date, $increment_nb_gen_done = 0)
    {
    }
    /**
     *	Update the maximum period
     *
     *	@param	 	int		$nb		number of maximum period
     *	@return		int				<0 if KO, >0 if OK
     */
    public function setMaxPeriod($nb)
    {
    }
    /**
     *	Update the auto validate fichinter
     *
     *	@param	 	int		$validate		0 to create in draft, 1 to create and validate fichinter
     *	@return		int						<0 if KO, >0 if OK
     */
    public function setAutoValidate($validate)
    {
    }
    /**
     *	Update the Number of Generation Done
     *
     *	@return		int						<0 if KO, >0 if OK
     */
    public function updateNbGenDone()
    {
    }
}
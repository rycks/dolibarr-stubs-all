<?php

/**
 *  Class to manage line orders
 */
class CommandeFournisseurLigne extends \CommonOrderLine
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'commande_fournisseurdet';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'commande_fournisseurdet';
    /**
     * @see CommonObjectLine
     */
    public $parent_element = 'commande_fournisseur';
    /**
     * @see CommonObjectLine
     */
    public $fk_parent_attribute = 'fk_commande_fournisseur';
    /**
     * @var CommandeFournisseurLigne
     */
    public $oldline;
    /**
     * Id of parent order
     * @var int
     */
    public $fk_commande;
    // From llx_commande_fournisseurdet
    /**
     * @var int ID
     */
    public $fk_parent_line;
    /**
     * @var int ID
     */
    public $fk_facture;
    /**
     * @var int rank
     */
    public $rang = 0;
    /**
     * @var int special code
     */
    public $special_code = 0;
    /**
     * Unit price without taxes
     * @var float
     */
    public $pu_ht;
    /**
     * @var int|string|null
     */
    public $date_start;
    /**
     * @var int|string|null
     */
    public $date_end;
    /**
     * @var int
     */
    public $fk_fournprice;
    /**
     * @var float
     */
    public $packaging;
    /**
     * @var int
     */
    public $pa_ht;
    // From llx_product_fournisseur_price
    /**
     * Supplier reference of price when we added the line. May have been changed after line was added.
     * @var string
     */
    public $ref_supplier;
    /**
     * @var string ref supplier
     * @deprecated
     * @see $ref_supplier
     */
    public $ref_fourn;
    /**
     * @var float|string
     */
    public $remise;
    /**
     *	Constructor
     *
     *  @param		DoliDB		$db      Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *  Load line order
     *
     *  @param  int		$rowid      Id line order
     *	@return	int					Return integer <0 if KO, >0 if OK
     */
    public function fetch($rowid)
    {
    }
    /**
     *	Insert line into database
     *
     *	@param      int		$notrigger		1 = disable triggers
     *	@return		int						Return integer <0 if KO, >0 if OK
     */
    public function insert($notrigger = 0)
    {
    }
    /**
     *	Update the line object into db
     *
     *	@param      int		$notrigger		1 = disable triggers
     *	@return		int		Return integer <0 si ko, >0 si ok
     */
    public function update($notrigger = 0)
    {
    }
    /**
     * 	Delete line in database
     *
     *  @param		User	$user		User making the change
     *	@param      int     $notrigger  1=Disable call to triggers
     *	@return     int                 Return integer <0 if KO, >0 if OK
     */
    public function delete($user, $notrigger = 0)
    {
    }
}
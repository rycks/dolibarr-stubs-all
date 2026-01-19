<?php

/**
 *  Class to manage order lines
 */
class OrderLine extends \CommonOrderLine
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'commandedet';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'commandedet';
    /**
     * @var OrderLine
     */
    public $oldline;
    /**
     * Id of parent order
     * @var int
     */
    public $fk_commande;
    /**
     * Id of parent order
     * @var int
     * @deprecated Use fk_commande
     * @see $fk_commande
     */
    public $commande_id;
    /**
     * @var int
     */
    public $fk_parent_line;
    /**
     * @var int Id of invoice
     */
    public $fk_facture;
    /**
     * @var string External ref
     */
    public $ref_ext;
    /**
     * @var int
     */
    public $fk_remise_except;
    /**
     * @var int line rank
     */
    public $rang = 0;
    /**
     * @var int
     */
    public $fk_fournprice;
    /**
     * Buy price without taxes
     * @var int|float|string
     */
    public $pa_ht;
    /**
     * @var int|float|string
     */
    public $marge_tx;
    /**
     * @var float|string
     */
    public $marque_tx;
    /**
     * @var float|string
     * @deprecated
     * @see $remise_percent, $fk_remise_except
     */
    public $remise;
    /**
     * Start date of line
     * @var int|string
     */
    public $date_start;
    /**
     * End date of line
     * @var int|string
     */
    public $date_end;
    /**
     * Skip update price total for special lines
     * @var int
     */
    public $skip_update_total;
    /**
     *      Constructor
     *
     *      @param     DoliDB	$db      handler d'acces base de donnee
     */
    public function __construct($db)
    {
    }
    /**
     *  Load line order
     *
     *  @param  int		$rowid          Id line order
     *  @return	int						Return integer <0 if KO, >0 if OK
     */
    public function fetch($rowid)
    {
    }
    /**
     * 	Delete line in database
     *
     *	@param      User	$user        	User that modify
     *  @param      int		$notrigger	    0=launch triggers after, 1=disable triggers
     *	@return	 int  Return integer <0 si ko, >0 si ok
     */
    public function delete(\User $user, $notrigger = 0)
    {
    }
    /**
     *	Insert line into database. This also set $this->id.
     *
     *	@param      User	$user        	User that modify
     *	@param      int		$notrigger		1 = disable triggers
     *	@return		int						Return integer <0 if KO, >0 if OK
     */
    public function insert($user = \null, $notrigger = 0)
    {
    }
    /**
     *	Update the line object into db
     *
     *	@param      User	$user        	User that modify
     *	@param      int		$notrigger		1 = disable triggers
     *	@return		int		Return integer <0 si ko, >0 si ok
     */
    public function update(\User $user, $notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Update DB line fields total_xxx
     *	Used by migration
     *
     *	@return		int		Return integer <0 if KO, >0 if OK
     */
    public function update_total()
    {
    }
}
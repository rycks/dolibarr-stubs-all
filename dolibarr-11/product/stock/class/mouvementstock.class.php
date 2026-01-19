<?php

/* Copyright (C) 2003-2006 Rodolphe Quiedeville <rodolphe@quiedeville.org>
 * Copyright (C) 2005-2015 Laurent Destailleur  <eldy@users.sourceforge.net>
 * Copyright (C) 2011      Jean Heimburger      <jean@tiaris.info>
 * Copyright (C) 2014	   Cedric GROSS	        <c.gross@kreiz-it.fr>
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <https://www.gnu.org/licenses/>.
 */
/**
 *	\file       htdocs/product/stock/class/mouvementstock.class.php
 *	\ingroup    stock
 *	\brief      File of class to manage stock movement (input or output)
 */
/**
 *	Class to manage stock movements
 */
class MouvementStock extends \CommonObject
{
    /**
     * @var string Id to identify managed objects
     */
    public $element = 'stockmouvement';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'stock_mouvement';
    public $product_id;
    public $warehouse_id;
    public $qty;
    /**
     * @var int Type of movement
     * 0=input (stock increase by a stock transfer), 1=output (stock decrease after by a stock transfer),
     * 2=output (stock decrease), 3=input (stock increase)
     * Note that qty should be > 0 with 0 or 3, < 0 with 1 or 2.
     */
    public $type;
    public $tms = '';
    public $datem = '';
    public $price;
    /**
     * @var int ID
     */
    public $fk_user_author;
    /**
     * @var string stock movements label
     */
    public $label;
    /**
     * @var int ID
     */
    public $fk_origin;
    public $origintype;
    public $inventorycode;
    public $batch;
    /**
     *  Constructor
     *
     *  @param      DoliDB		$db      Database handler
     */
    public function __construct($db)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     *	Add a movement of stock (in one direction only)
     *
     *	@param		User	$user			User object
     *	@param		int		$fk_product		Id of product
     *	@param		int		$entrepot_id	Id of warehouse
     *	@param		int		$qty			Qty of movement (can be <0 or >0 depending on parameter type)
     *	@param		int		$type			Direction of movement:
     *										0=input (stock increase by a stock transfer), 1=output (stock decrease by a stock transfer),
     *										2=output (stock decrease), 3=input (stock increase)
     *                                      Note that qty should be > 0 with 0 or 3, < 0 with 1 or 2.
     *	@param		int		$price			Unit price HT of product, used to calculate average weighted price (PMP in french). If 0, average weighted price is not changed.
     *	@param		string	$label			Label of stock movement
     *	@param		string	$inventorycode	Inventory code
     *	@param		string	$datem			Force date of movement
     *	@param		integer	$eatby			eat-by date. Will be used if lot does not exists yet and will be created.
     *	@param		integer	$sellby			sell-by date. Will be used if lot does not exists yet and will be created.
     *	@param		string	$batch			batch number
     *	@param		boolean	$skip_batch		If set to true, stock movement is done without impacting batch record
     * 	@param		int		$id_product_batch	Id product_batch (when skip_batch is false and we already know which record of product_batch to use)
     *	@return		int						<0 if KO, 0 if fk_product is null or product id does not exists, >0 if OK
     */
    public function _create($user, $fk_product, $entrepot_id, $qty, $type, $price = 0, $label = '', $inventorycode = '', $datem = '', $eatby = '', $sellby = '', $batch = '', $skip_batch = \false, $id_product_batch = 0)
    {
    }
    /**
     * Load object in memory from the database
     *
     * @param int    $id  Id object
     *
     * @return int <0 if KO, 0 if not found, >0 if OK
     */
    public function fetch($id)
    {
    }
    /**
     *  Create movement in database for all subproducts
     *
     * 	@param 		User	$user			Object user
     * 	@param		int		$idProduct		Id product
     * 	@param		int		$entrepot_id	Warehouse id
     * 	@param		int		$qty			Quantity
     * 	@param		int		$type			Type
     * 	@param		int		$price			Price
     * 	@param		string	$label			Label of movement
     *  @param		string	$inventorycode	Inventory code
     * 	@return 	int     				<0 if KO, 0 if OK
     */
    private function _createSubProduct($user, $idProduct, $entrepot_id, $qty, $type, $price = 0, $label = '', $inventorycode = '')
    {
    }
    /**
     *	Decrease stock for product and subproducts
     *
     * 	@param 		User	$user			    Object user
     * 	@param		int		$fk_product		    Id product
     * 	@param		int		$entrepot_id	    Warehouse id
     * 	@param		int		$qty			    Quantity
     * 	@param		int		$price			    Price
     * 	@param		string	$label			    Label of stock movement
     * 	@param		string	$datem			    Force date of movement
     *	@param		integer	$eatby			    eat-by date
     *	@param		integer	$sellby			    sell-by date
     *	@param		string	$batch			    batch number
     * 	@param		int		$id_product_batch	Id product_batch
     *  @param      string  $inventorycode      Inventory code
     * 	@return		int						    <0 if KO, >0 if OK
     */
    public function livraison($user, $fk_product, $entrepot_id, $qty, $price = 0, $label = '', $datem = '', $eatby = '', $sellby = '', $batch = '', $id_product_batch = 0, $inventorycode = '')
    {
    }
    /**
     *	Increase stock for product and subproducts
     *
     * 	@param 		User	$user			     Object user
     * 	@param		int		$fk_product		     Id product
     * 	@param		int		$entrepot_id	     Warehouse id
     * 	@param		int		$qty			     Quantity
     * 	@param		int		$price			     Price
     * 	@param		string	$label			     Label of stock movement
     *	@param		integer	$eatby			     eat-by date
     *	@param		integer	$sellby			     sell-by date
     *	@param		string	$batch			     batch number
     * 	@param		string	$datem			     Force date of movement
     * 	@param		int		$id_product_batch    Id product_batch
     *  @param      string  $inventorycode       Inventory code
     *	@return		int						     <0 if KO, >0 if OK
     */
    public function reception($user, $fk_product, $entrepot_id, $qty, $price = 0, $label = '', $eatby = '', $sellby = '', $batch = '', $datem = '', $id_product_batch = 0, $inventorycode = '')
    {
    }
    /**
     * Return nb of subproducts lines for a product
     *
     * @param      int		$id				Id of product
     * @return     int						<0 if KO, nb of subproducts if OK
     * @deprecated A count($product->getChildsArbo($id,1)) is same. No reason to have this in this class.
     */
    /*
    	public function nbOfSubProducts($id)
    	{
    		$nbSP=0;
    
    		$resql = "SELECT count(*) as nb FROM ".MAIN_DB_PREFIX."product_association";
    		$resql.= " WHERE fk_product_pere = ".$id;
    		if ($this->db->query($resql))
    		{
    			$obj=$this->db->fetch_object($resql);
    			$nbSP=$obj->nb;
    		}
    		return $nbSP;
    	}*/
    /**
     * Count number of product in stock before a specific date
     *
     * @param 	int			$productidselected		Id of product to count
     * @param 	integer 	$datebefore				Date limit
     * @return	int			Number
     */
    public function calculateBalanceForProductBefore($productidselected, $datebefore)
    {
    }
    /**
     * Create or update batch record (update table llx_product_batch). No check is done here, done by parent.
     *
     * @param	array|int	$dluo	      Could be either
     *                                    - int if row id of product_batch table
     *                                    - or complete array('fk_product_stock'=>, 'batchnumber'=>)
     * @param	int			$qty	      Quantity of product with batch number. May be a negative amount.
     * @return 	int   				      <0 if KO, else return productbatch id
     */
    private function createBatch($dluo, $qty)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Return Url link of origin object
     *
     * @param  int     $fk_origin      Id origin
     * @param  int     $origintype     Type origin
     * @return string
     */
    public function get_origin($fk_origin, $origintype)
    {
    }
    /**
     * Set attribute origin to object
     *
     * @param	string	$origin_element	type of element
     * @param	int		$origin_id		id of element
     *
     * @return	void
     */
    public function setOrigin($origin_element, $origin_id)
    {
    }
    /**
     *  Initialise an instance with random values.
     *  Used to build previews or test instances.
     *	id must be 0 if object instance is a specimen.
     *
     *  @return	void
     */
    public function initAsSpecimen()
    {
    }
    /**
     *  Return a link (with optionaly the picto)
     * 	Use this->id,this->lastname, this->firstname
     *
     *	@param	int		$withpicto			Include picto in link (0=No picto, 1=Include picto into link, 2=Only picto)
     *	@param	string	$option				On what the link point to
     *  @param	integer	$notooltip			1=Disable tooltip
     *  @param	int		$maxlen				Max length of visible user name
     *  @param  string  $morecss            Add more css on link
     *	@return	string						String with URL
     */
    public function getNomUrl($withpicto = 0, $option = '', $notooltip = 0, $maxlen = 24, $morecss = '')
    {
    }
    /**
     *  Return label statut
     *
     *  @param	int		$mode          0=libelle long, 1=libelle court, 2=Picto + Libelle court, 3=Picto, 4=Picto + Libelle long, 5=Libelle court + Picto
     *  @return	string 			       Label of status
     */
    public function getLibStatut($mode = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Renvoi le libelle d'un status donne
     *
     *  @param  int		$mode          	0=libelle long, 1=libelle court, 2=Picto + Libelle court, 3=Picto, 4=Picto + Libelle long, 5=Libelle court + Picto
     *  @return string 			       	Label of status
     */
    public function LibStatut($mode = 0)
    {
    }
    /**
     *	Create object on disk
     *
     *	@param     string		$modele			force le modele a utiliser ('' to not force)
     * 	@param     Translate	$outputlangs	Object langs to use for output
     *  @param     int			$hidedetails    Hide details of lines
     *  @param     int			$hidedesc       Hide description
     *  @param     int			$hideref        Hide ref
     *  @return    int             				0 if KO, 1 if OK
     */
    public function generateDocument($modele, $outputlangs = '', $hidedetails = 0, $hidedesc = 0, $hideref = 0)
    {
    }
    /**
     * Delete object in database
     *
     * @param User $user       User that deletes
     * @param bool $notrigger  false=launch triggers after, true=disable triggers
     * @return int             <0 if KO, >0 if OK
     */
    public function delete(\User $user, $notrigger = \false)
    {
    }
}
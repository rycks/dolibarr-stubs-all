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
    /**
     * @var int ID product
     */
    public $product_id;
    /**
     * @var int ID warehouse
     * @deprecated
     * @see $warehouse_id
     */
    public $entrepot_id;
    /**
     * @var int ID warehouse
     */
    public $warehouse_id;
    public $qty;
    /**
     * @var int Type of movement
     * 0=input (stock increase by a manual/direct stock transfer, correction or inventory),
     * 1=output (stock decrease after by a manual/direct stock transfer, correction or inventory),
     * 2=output (stock decrease after a business event like sale, shipment or manufacturing, ...),
     * 3=input (stock increase after a business event like purchase, reception or manufacturing, ...)
     * Note that qty should be > 0 with 0 or 3, < 0 with 1 or 2.
     */
    public $type;
    public $tms = '';
    public $datem = '';
    public $price;
    /**
     * @var int ID user author
     */
    public $fk_user_author;
    /**
     * @var string stock movements label
     */
    public $label;
    /**
     * @var int ID
     * @deprecated
     * @see $origin_id
     */
    public $fk_origin;
    /**
     * @var int		Origin id
     */
    public $origin_id;
    /**
     * @var	string	origintype
     * @deprecated
     * see $origin_type
     */
    public $origintype;
    /**
     * @var string Origin type ('project', ...)
     */
    public $origin_type;
    public $line_id_oject_src;
    public $line_id_oject_origin;
    public $inventorycode;
    public $batch;
    public $line_id_object_src;
    public $line_id_object_origin;
    public $eatby;
    public $sellby;
    public $fields = array('rowid' => array('type' => 'integer', 'label' => 'TechnicalID', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 10, 'showoncombobox' => 1), 'tms' => array('type' => 'timestamp', 'label' => 'DateModification', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 15), 'datem' => array('type' => 'datetime', 'label' => 'Datem', 'enabled' => 1, 'visible' => -1, 'position' => 20), 'fk_product' => array('type' => 'integer:Product:product/class/product.class.php:1', 'label' => 'Product', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 25), 'fk_entrepot' => array('type' => 'integer:Entrepot:product/stock/class/entrepot.class.php', 'label' => 'Warehouse', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 30), 'value' => array('type' => 'double', 'label' => 'Value', 'enabled' => 1, 'visible' => -1, 'position' => 35), 'price' => array('type' => 'double(24,8)', 'label' => 'Price', 'enabled' => 1, 'visible' => -1, 'position' => 40), 'type_mouvement' => array('type' => 'smallint(6)', 'label' => 'Type mouvement', 'enabled' => 1, 'visible' => -1, 'position' => 45), 'fk_user_author' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'Fk user author', 'enabled' => 1, 'visible' => -1, 'position' => 50), 'label' => array('type' => 'varchar(255)', 'label' => 'Label', 'enabled' => 1, 'visible' => -1, 'position' => 55), 'fk_origin' => array('type' => 'integer', 'label' => 'Fk origin', 'enabled' => 1, 'visible' => -1, 'position' => 60), 'origintype' => array('type' => 'varchar(32)', 'label' => 'Origintype', 'enabled' => 1, 'visible' => -1, 'position' => 65), 'model_pdf' => array('type' => 'varchar(255)', 'label' => 'Model pdf', 'enabled' => 1, 'visible' => 0, 'position' => 70), 'fk_projet' => array('type' => 'integer:Project:projet/class/project.class.php:1:(fk_statut:=:1)', 'label' => 'Project', 'enabled' => '$conf->project->enabled', 'visible' => -1, 'notnull' => 1, 'position' => 75), 'inventorycode' => array('type' => 'varchar(128)', 'label' => 'InventoryCode', 'enabled' => 1, 'visible' => -1, 'position' => 80), 'batch' => array('type' => 'varchar(30)', 'label' => 'Batch', 'enabled' => 1, 'visible' => -1, 'position' => 85), 'eatby' => array('type' => 'date', 'label' => 'Eatby', 'enabled' => 1, 'visible' => -1, 'position' => 90), 'sellby' => array('type' => 'date', 'label' => 'Sellby', 'enabled' => 1, 'visible' => -1, 'position' => 95), 'fk_project' => array('type' => 'integer:Project:projet/class/project.class.php:1:(fk_statut:=:1)', 'label' => 'Fk project', 'enabled' => 1, 'visible' => -1, 'position' => 100));
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
     *	Add a movement of stock (in one direction only).
     *  This is the lowest level method to record a stock change. There is no control if warehouse is open or not.
     *  $this->origin_type and $this->origin_id can be also be set to save the source object of movement.
     *
     *	@param		User			$user				User object
     *	@param		int				$fk_product			Id of product
     *	@param		int				$entrepot_id		Id of warehouse
     *	@param		int				$qty				Qty of movement (can be <0 or >0 depending on parameter type)
     *	@param		int				$type				Direction of movement:
     *													0=input (stock increase by a stock transfer), 1=output (stock decrease by a stock transfer),
     *													2=output (stock decrease), 3=input (stock increase)
     *                          		            	Note that qty should be > 0 with 0 or 3, < 0 with 1 or 2.
     *	@param		int				$price				Unit price HT of product, used to calculate average weighted price (AWP or PMP in french). If 0, average weighted price is not changed.
     *	@param		string			$label				Label of stock movement
     *	@param		string			$inventorycode		Inventory code
     *	@param		integer|string	$datem				Force date of movement
     *	@param		integer|string	$eatby				eat-by date. Will be used if lot does not exists yet and will be created.
     *	@param		integer|string	$sellby				sell-by date. Will be used if lot does not exists yet and will be created.
     *	@param		string			$batch				batch number
     *	@param		boolean			$skip_batch			If set to true, stock movement is done without impacting batch record
     * 	@param		int				$id_product_batch	Id product_batch (when skip_batch is false and we already know which record of product_batch to use)
     *  @param		int				$disablestockchangeforsubproduct	Disable stock change for sub-products of kit (usefull only if product is a subproduct)
     *  @param		int				$donotcleanemptylines				Do not clean lines in stock table with qty=0 (because we want to have this done by the caller)
     * 	@param		boolean			$force_update_batch	Allows to add batch stock movement even if $product doesn't use batch anymore
     *	@return		int									Return integer <0 if KO, 0 if fk_product is null or product id does not exists, >0 if OK
     */
    public function _create($user, $fk_product, $entrepot_id, $qty, $type, $price = 0, $label = '', $inventorycode = '', $datem = '', $eatby = '', $sellby = '', $batch = '', $skip_batch = \false, $id_product_batch = 0, $disablestockchangeforsubproduct = 0, $donotcleanemptylines = 0, $force_update_batch = \false)
    {
    }
    /**
     * Load object in memory from the database
     *
     * @param int    $id  Id object
     *
     * @return int Return integer <0 if KO, 0 if not found, >0 if OK
     */
    public function fetch($id)
    {
    }
    /**
     *  Create movement in database for all subproducts
     *
     * 	@param 		User			$user			Object user
     * 	@param		int				$idProduct		Id product
     * 	@param		int				$entrepot_id	Warehouse id
     * 	@param		int				$qty			Quantity
     * 	@param		int				$type			Type
     * 	@param		int				$price			Price
     * 	@param		string			$label			Label of movement
     *  @param		string			$inventorycode	Inventory code
     *  @param		integer|string	$datem			Force date of movement
     * 	@return 	int     		Return integer <0 if KO, 0 if OK
     */
    private function _createSubProduct($user, $idProduct, $entrepot_id, $qty, $type, $price = 0, $label = '', $inventorycode = '', $datem = '')
    {
    }
    /**
     *	Decrease stock for product and subproducts
     *
     * 	@param 		User			$user			    	Object user
     * 	@param		int				$fk_product		    	Id product
     * 	@param		int				$entrepot_id	    	Warehouse id
     * 	@param		int				$qty			    	Quantity
     * 	@param		int				$price			    	Price
     * 	@param		string			$label			    	Label of stock movement
     * 	@param		integer|string	$datem			    	Force date of movement
     *	@param		integer			$eatby			    	eat-by date
     *	@param		integer			$sellby			    	sell-by date
     *	@param		string			$batch			    	batch number
     * 	@param		int				$id_product_batch		Id product_batch
     *  @param      string  		$inventorycode      	Inventory code
     *  @param		int				$donotcleanemptylines	Do not clean lines that remains in stock table with qty=0 (because we want to have this done by the caller)
     * 	@return		int								    	Return integer <0 if KO, >0 if OK
     */
    public function livraison($user, $fk_product, $entrepot_id, $qty, $price = 0, $label = '', $datem = '', $eatby = '', $sellby = '', $batch = '', $id_product_batch = 0, $inventorycode = '', $donotcleanemptylines = 0)
    {
    }
    /**
     *	Increase stock for product and subproducts
     *
     * 	@param 		User			$user			     	Object user
     * 	@param		int				$fk_product		     	Id product
     * 	@param		int				$entrepot_id	     	Warehouse id
     * 	@param		int				$qty			     	Quantity
     * 	@param		int				$price			     	Price
     * 	@param		string			$label			     	Label of stock movement
     *	@param		integer|string	$eatby			     	eat-by date
     *	@param		integer|string	$sellby			     	sell-by date
     *	@param		string			$batch			     	batch number
     * 	@param		integer|string	$datem			     	Force date of movement
     * 	@param		int				$id_product_batch    	Id product_batch
     *  @param      string			$inventorycode       	Inventory code
     *  @param		int				$donotcleanemptylines	Do not clean lines that remains in stock table with qty=0 (because we want to have this done by the caller)
     *	@return		int								     	Return integer <0 if KO, >0 if OK
     */
    public function reception($user, $fk_product, $entrepot_id, $qty, $price = 0, $label = '', $eatby = '', $sellby = '', $batch = '', $datem = '', $id_product_batch = 0, $inventorycode = '', $donotcleanemptylines = 0)
    {
    }
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
     *                                    - int if row id of product_batch table (for update)
     *                                    - or complete array('fk_product_stock'=>, 'batchnumber'=>)
     * @param	int			$qty	      Quantity of product with batch number. May be a negative amount.
     * @return 	int   				      Return integer <0 if KO, -2 if we try to update a product_batchid that does not exist, else return productbatch id
     */
    private function createBatch($dluo, $qty)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Return Url link of origin object
     *
     * @param  int     $origin_id      Id origin
     * @param  int     $origin_type     Type origin
     * @return string
     */
    public function get_origin($origin_id, $origin_type)
    {
    }
    /**
     * Set attribute origin_type and fk_origin to object
     *
     * @param	string	$origin_element		Type of element
     * @param	int		$origin_id			Id of element
     * @param	int		$line_id_object_src	Id line of element Source
     * @param	int		$line_id_object_origin	Id line of element Origin
     *
     * @return	void
     */
    public function setOrigin($origin_element, $origin_id, $line_id_object_src = 0, $line_id_object_origin = 0)
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
     *  Return html string with picto for type of movement
     *
     *	@param	int		$withlabel			With label
     *	@return	string					    String with URL
     */
    public function getTypeMovement($withlabel = 0)
    {
    }
    /**
     *  Return a link (with optionaly the picto)
     * 	Use this->id,this->lastname, this->firstname
     *
     *	@param	int		$withpicto			Include picto in link (0=No picto, 1=Include picto into link, 2=Only picto)
     *	@param	string	$option				On what the link point to ('' = Tab of stock movement of warehouse, 'movements' = list of movements)
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
     *  Return the label of the status
     *
     *  @param  int		$mode          0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 6=Long label + Picto
     *  @return	string 			       Label of status
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
    public function generateDocument($modele, $outputlangs, $hidedetails = 0, $hidedesc = 0, $hideref = 0)
    {
    }
    /**
     * Delete object in database
     *
     * @param User $user       User that deletes
     * @param bool $notrigger  false=launch triggers after, true=disable triggers
     * @return int             Return integer <0 if KO, >0 if OK
     */
    public function delete(\User $user, $notrigger = \false)
    {
    }
    /**
     * Retrieve number of equipments for a product lot/serial
     *
     * @param 	int 		$fk_product 	Product id
     * @param 	string 		$batch  		batch number
     * @return 	int            				Return integer <0 if KO, number of equipments found if OK
     */
    private function getBatchCount($fk_product, $batch)
    {
    }
    /**
     * reverse mouvement for object by updating infos
     * @return int    1 if OK,-1 if KO
     */
    public function reverseMouvement()
    {
    }
}
<?php

/**
 * Class to manage lines of shipment
 */
class ExpeditionLigne extends \CommonObjectLine
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'expeditiondet';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'expeditiondet';
    /**
     * @see CommonObjectLine
     */
    public $parent_element = 'expedition';
    /**
     * @see CommonObjectLine
     */
    public $fk_parent_attribute = 'fk_expedition';
    /**
     * Id of the line. Duplicate of $id.
     *
     * @var int
     * @deprecated
     */
    public $line_id;
    // deprecated
    /**
     * @var int ID	Duplicate of origin_id (using origin_id is better)
     */
    public $fk_element;
    /**
     * @var int ID	Duplicate of fk_element
     */
    public $origin_id;
    /**
     * @var int ID	Duplicate of origin_line_id
     */
    public $fk_elementdet;
    /**
     * @var int ID	Duplicate of fk_elementdet
     */
    public $origin_line_id;
    /**
     * @var string		Type of object the fk_element refers to. Example: 'order'.
     */
    public $element_type;
    /**
     * Code of object line that is origin of the shipment line.
     *
     * @var string
     * @deprecated	Use instead origin_type = element_type to guess the line of origin of the shipment line.
     */
    public $fk_origin;
    // Example: 'orderline'
    /**
     * @var int Id of shipment
     */
    public $fk_expedition;
    /**
     * @var DoliDB Database handler.
     */
    public $db;
    /**
     * @var float qty asked From llx_expeditiondet
     */
    public $qty;
    /**
     * @var float qty shipped
     */
    public $qty_shipped;
    /**
     * @var int Id of product
     */
    public $fk_product;
    /**
     * Detail of lot and qty = array(id in llx_expeditiondet_batch, fk_expeditiondet, batch, qty, fk_origin_stock)
     * We can use this to know warehouse planned to be used for each lot.
     * @var stdClass|ExpeditionLineBatch[]
     */
    public $detail_batch;
    /** detail of warehouses and qty
     * We can use this to know warehouse when there is no lot.
     * @var stdClass[]
     */
    public $details_entrepot;
    /**
     * @var int Id of warehouse
     */
    public $entrepot_id;
    /**
     * @var float qty asked From llx_commandedet or llx_propaldet
     */
    public $qty_asked;
    /**
     * @var string
     * @deprecated
     * @see $product_ref
     */
    public $ref;
    /**
     * @var string product ref
     */
    public $product_ref;
    /**
     * @var string
     * @deprecated
     * @see $product_label
     */
    public $libelle;
    /**
     * @var string product label
     */
    public $product_label;
    /**
     * @var string product description
     * @deprecated
     * @see $product_desc
     */
    public $desc;
    /**
     * @var string product description
     */
    public $product_desc;
    /**
     * Type of the product. 0 for product, 1 for service
     * @var int
     */
    public $product_type = 0;
    /**
     * @var int rang of line
     */
    public $rang;
    /**
     * @var float weight
     */
    public $weight;
    /**
     * @var string|int
     */
    public $weight_units;
    /**
     * @var float length
     */
    public $length;
    /**
     * @var string|int
     */
    public $length_units;
    /**
     * @var float width
     */
    public $width;
    /**
     * @var string|int
     */
    public $width_units;
    /**
     * @var float height
     */
    public $height;
    /**
     * @var string|int
     */
    public $height_units;
    /**
     * @var float surface
     */
    public $surface;
    /**
     * @var string|int
     */
    public $surface_units;
    /**
     * @var float volume
     */
    public $volume;
    /**
     * @var string|int
     */
    public $volume_units;
    /**
     * @var float|string
     */
    public $remise_percent;
    /**
     * @var float|string
     */
    public $tva_tx;
    /**
     * @var float total without tax
     */
    public $total_ht;
    /**
     * @var float total with tax
     */
    public $total_ttc;
    /**
     * @var float total vat
     */
    public $total_tva;
    /**
     * @var float total localtax 1
     */
    public $total_localtax1;
    /**
     * @var float total localtax 2
     */
    public $total_localtax2;
    /**
     *	Constructor
     *
     *  @param		DoliDB		$db      Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *  Load line expedition
     *
     *  @param  int		$rowid          Id line order
     *  @return	int						Return integer <0 if KO, >0 if OK
     */
    public function fetch($rowid)
    {
    }
    /**
     *	Insert line into database
     *
     *	@param      User	$user			User that modify
     *	@param      int		$notrigger		1 = disable triggers
     *	@return     int						Return integer <0 if KO, line id >0 if OK
     */
    public function insert($user, $notrigger = 0)
    {
    }
    /**
     * 	Delete shipment line.
     *
     *	@param		User	$user			User that modify
     *	@param		int		$notrigger		0=launch triggers after, 1=disable triggers
     * 	@return		int		>0 if OK, <0 if KO
     */
    public function delete($user = \null, $notrigger = 0)
    {
    }
    /**
     *  Update a line in database
     *
     *	@param		User	$user			User that modify
     *	@param		int		$notrigger		1 = disable triggers
     *  @return		int					Return integer < 0 if KO, > 0 if OK
     */
    public function update($user = \null, $notrigger = 0)
    {
    }
}
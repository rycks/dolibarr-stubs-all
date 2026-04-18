<?php

/**
 *  Parent class for class inheritance lines of business objects
 *  This class is useless for the moment so no inherit are done on it
 *
 *  TODO For the moment we use the extends on CommonObject until PHP min is 5.4 so we can use Traits.
 */
abstract class CommonObjectLine extends \CommonObject
{
    /**
     * @var string ID to identify parent CommonObject type (element name)
     */
    public $parent_element = '';
    /**
     * @var string Attribute related to parent CommonObject rowid (many2one)
     */
    public $fk_parent_attribute = '';
    /**
     * Id of the line
     * @var int
     */
    public $id;
    /**
     * Id of the line
     * @var int
     * @deprecated Try to use id property as possible (even if field into database is still rowid)
     * @see $id
     */
    public $rowid;
    /**
     * @var string String with name of icon for myobject. Must be the part after the 'object_' into object_myobject.png
     */
    public $picto = 'line';
    /**
     * @var ?int		ID of the unit of measurement (rowid in llx_c_units table)
     * @see measuringUnitString()
     * @see getLabelOfUnit()
     */
    public $fk_unit;
    /**
     * @var int|''
     */
    public $date_debut_prevue;
    /**
     * @var int|''
     */
    public $date_debut_reel;
    /**
     * @var int|''
     */
    public $date_fin_prevue;
    /**
     * @var int|''
     */
    public $date_fin_reel;
    /**
     * @var float|string
     */
    public $weight;
    /**
     * @var int|string
     */
    public $weight_units;
    // scale -3, 0, 3, 6
    /**
     * @var float|string
     */
    public $length;
    /**
     * @var int|string
     */
    public $length_units;
    // scale -3, 0, 3, 6
    /**
     * @var float|string
     */
    public $width;
    /**
     * @var int|string
     */
    public $width_units;
    // scale -3, 0, 3, 6
    /**
     * @var float|string|null
     */
    public $height;
    /**
     * @var int|string|null
     */
    public $height_units;
    // scale -3, 0, 3, 6
    /**
     * @var float|string|null
     */
    public $surface;
    /**
     * @var int|string|null
     */
    public $surface_units;
    // scale -3, 0, 3, 6
    /**
     * @var float|string|null
     */
    public $volume;
    /**
     * @var int|string|null
     */
    public $volume_units;
    // scale -3, 0, 3, 6
    /**
     * @var ?array<string,array<string,string>>
     */
    public $multilangs;
    /**
     * @var int type in line
     */
    public $product_type;
    /**
     * @var int product id in line (when line is linked to a product or service)
     */
    public $fk_product;
    /**
     * Description of the line
     * @var string
     */
    public $desc;
    /**
     * Description of the line
     * @var string
     * @deprecated
     * @see $desc
     */
    public $description;
    /**
     * @var Product Object product to store full product object after a fetch_product() on a line
     */
    public $product;
    /**
     * @var string reference in product table
     */
    public $product_ref;
    /**
     * @var string label in product table
     */
    public $product_label;
    /**
     * @var string barcode in product table
     */
    public $product_barcode;
    /**
     * @var string description in product table
     */
    public $product_desc;
    /**
     * @var ?string Product custom code
     */
    public $product_custom_code;
    /**
     * @var ?string Product custom country code
     */
    public $product_custom_country_code;
    /**
     * @var ?int Product custom country id
     */
    public $product_custom_country_id;
    /**
     * @var int type in product table
     */
    public $fk_product_type;
    /**
     * @var float Quantity
     */
    public $qty;
    /**
     * @var int
     */
    public $duree;
    /**
     * @var float|string
     */
    public $remise_percent;
    /**
     * List of cumulative options:
     * Bit 0:	0 for common VAT - 1 if VAT french NPR
     * Bit 1:	0 si ligne normal - 1 si bit discount (link to line into llx_remise_except)
     * @var ?int
     */
    public $info_bits;
    /**
     * @var int special code
     */
    public $special_code;
    /**
     * Unit price before taxes
     * @var float
     */
    public $subprice;
    /**
     * Unit price including taxes
     * @var float
     */
    public $subprice_ttc;
    /**
     * @var float|string
     */
    public $tva_tx;
    /**
     * @var int multicurrency id
     */
    public $fk_multicurrency;
    /**
     * @var string Multicurrency code
     */
    public $multicurrency_code;
    /**
     * @var float Multicurrency unit price without taxes
     */
    public $multicurrency_subprice;
    /**
     * @var float Multicurrency unit price including taxes
     */
    public $multicurrency_subprice_ttc;
    /**
     * @var float Multicurrency total without tax
     */
    public $multicurrency_total_ht;
    /**
     * @var float Multicurrency total vat
     */
    public $multicurrency_total_tva;
    /**
     * @var float|string Multicurrency total localtax1
     */
    public $multicurrency_total_localtax1;
    // not in database
    /**
     * @var float|string Multicurrency total localtax2
     */
    public $multicurrency_total_localtax2;
    // not in database
    /**
     * @var float Multicurrency total with tax
     */
    public $multicurrency_total_ttc;
    /**
     *	Constructor
     *
     *  @param		DoliDB		$db      Database handler
     */
    public function __construct($db)
    {
    }
    /**
     * Reads the units dictionary to return the translation code of a unit (if type='code'), or translated long label (if type='long') or short label (if type='short').
     * TODO Duplicate of getLabelOfUnit() in product.class.php
     *
     * @param  	string 			$type 			Code type ('code', 'long' or 'short')
     * @param	Translate|null	$outputlangs	Language to use for long label translation
     * @param	int				$noentities		No entities
     * @return 	string|int 						Return integer <0 if KO, code or label of unit if OK.
     */
    public function getLabelOfUnit($type = 'long', $outputlangs = \null, $noentities = 0)
    {
    }
    /**
     * Empty function to prevent errors on call of this function. Must be overload if useful
     *
     * @param  string      		$sortorder    	Sort Order
     * @param  string      		$sortfield    	Sort field
     * @param  int         		$limit        	Limit the number of lines returned
     * @param  int         		$offset       	Offset
     * @param  string|string[]	$filter       	Filter as an Universal Search string.
     * 											Example: '((client:=:1) OR ((client:>=:2) AND (client:<=:3))) AND (client:!=:8) AND (nom:like:'a%')'
     * @param  string      		$filtermode   	No more used
     * @return self[]|int<-1,-1>        	         	int <0 if KO, array of pages if OK
     */
    public function fetchAll($sortorder = '', $sortfield = '', $limit = 0, $offset = 0, $filter = '', $filtermode = 'AND')
    {
    }
    /**
     * Return clickable link of object line (optionally with picto)
     * May (should) also return information about the associated "parent" object.
     * To overload
     *
     * @param      int			$withpicto                Add picto into link
     * @return     string          			          String with URL
     */
    public function getNomUrl($withpicto = 0)
    {
    }
}
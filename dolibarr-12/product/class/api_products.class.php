<?php

/**
 * API class for products
 *
 * @access protected
 * @class  DolibarrApiAccess {@requires user,external}
 */
class Products extends \DolibarrApi
{
    /**
     * @var array   $FIELDS     Mandatory fields, checked when create and update object
     */
    static $FIELDS = array('ref', 'label');
    /**
     * @var Product $product {@type Product}
     */
    public $product;
    /**
     * @var ProductFournisseur $productsupplier {@type ProductFournisseur}
     */
    public $productsupplier;
    /**
     * Constructor
     */
    public function __construct()
    {
    }
    /**
     * Get properties of a product object by id
     *
     * Return an array with product information.
     *
     * @param  int    $id                  ID of product
     * @param  int    $includestockdata    Load also information about stock (slower)
     * @param  bool   $includesubproducts  Load information about subproducts
     * @return array|mixed                 Data without useless information
     *
     * @throws RestException 401
     * @throws RestException 403
     * @throws RestException 404
     */
    public function get($id, $includestockdata = 0, $includesubproducts = \false)
    {
    }
    /**
     * Get properties of a product object by ref
     *
     * Return an array with product information.
     *
     * @param  string $ref                Ref of element
     * @param  int    $includestockdata   Load also information about stock (slower)
     * @param  bool   $includesubproducts Load information about subproducts
     *
     * @return array|mixed                 Data without useless information
     *
     * @url GET ref/{ref}
     *
     * @throws RestException 401
     * @throws RestException 403
     * @throws RestException 404
     */
    public function getByRef($ref, $includestockdata = 0, $includesubproducts = \false)
    {
    }
    /**
     * Get properties of a product object by ref_ext
     *
     * Return an array with product information.
     *
     * @param  string $ref_ext            Ref_ext of element
     * @param  int    $includestockdata   Load also information about stock (slower)
     * @param  bool   $includesubproducts Load information about subproducts
     *
     * @return array|mixed Data without useless information
     *
     * @url GET ref_ext/{ref_ext}
     *
     * @throws RestException 401
     * @throws RestException 403
     * @throws RestException 404
     */
    public function getByRefExt($ref_ext, $includestockdata = 0, $includesubproducts = \false)
    {
    }
    /**
     * Get properties of a product object by barcode
     *
     * Return an array with product information.
     *
     * @param  string $barcode            Barcode of element
     * @param  int    $includestockdata   Load also information about stock (slower)
     * @param  bool   $includesubproducts Load information about subproducts
     *
     * @return array|mixed Data without useless information
     *
     * @url GET barcode/{barcode}
     *
     * @throws RestException 401
     * @throws RestException 403
     * @throws RestException 404
     */
    public function getByBarcode($barcode, $includestockdata = 0, $includesubproducts = \false)
    {
    }
    /**
     * List products
     *
     * Get a list of products
     *
     * @param  string $sortfield  Sort field
     * @param  string $sortorder  Sort order
     * @param  int    $limit      Limit for list
     * @param  int    $page       Page number
     * @param  int    $mode       Use this param to filter list (0 for all, 1 for only product, 2 for only service)
     * @param  int    $category   Use this param to filter list by category
     * @param  string $sqlfilters Other criteria to filter answers separated by a comma. Syntax example "(t.tobuy:=:0) and (t.tosell:=:1)"
     * @return array                Array of product objects
     */
    public function index($sortfield = "t.ref", $sortorder = 'ASC', $limit = 100, $page = 0, $mode = 0, $category = 0, $sqlfilters = '')
    {
    }
    /**
     * Create product object
     *
     * @param  array $request_data Request data
     * @return int     ID of product
     */
    public function post($request_data = \null)
    {
    }
    /**
     * Update product.
     * Price will be updated by this API only if option is set on "One price per product". See other APIs for other price modes.
     *
     * @param  int   $id           Id of product to update
     * @param  array $request_data Datas
     * @return int
     *
     * @throws RestException 401
     * @throws RestException 404
     */
    public function put($id, $request_data = \null)
    {
    }
    /**
     * Delete product
     *
     * @param  int 		$id 		Product ID
     * @return array
     */
    public function delete($id)
    {
    }
    /**
     * Get the list of subproducts of the product.
     *
     * @param  int $id      Id of parent product/service
     * @return array
     *
     * @throws RestException
     * @throws RestException 401
     * @throws RestException 404
     *
     * @url GET {id}/subproducts
     */
    public function getSubproducts($id)
    {
    }
    /**
     * Add subproduct.
     *
     * Link a product/service to a parent product/service
     *
     * @param  int $id            Id of parent product/service
     * @param  int $subproduct_id Id of child product/service
     * @param  int $qty           Quantity
     * @param  int $incdec        1=Increase/decrease stock of child when parent stock increase/decrease
     * @return int
     *
     * @throws RestException
     * @throws RestException 401
     * @throws RestException 404
     *
     * @url POST {id}/subproducts/add
     */
    public function addSubproducts($id, $subproduct_id, $qty, $incdec = 1)
    {
    }
    /**
     * Remove subproduct.
     *
     *  Unlink a product/service from a parent product/service
     *
     * @param  int $id             Id of parent product/service
     * @param  int $subproduct_id  Id of child product/service
     * @return int
     *
     * @throws RestException 401
     * @throws RestException 404
     *
     * @url DELETE {id}/subproducts/remove/{subproduct_id}
     */
    public function delSubproducts($id, $subproduct_id)
    {
    }
    /**
     * Get categories for a product
     *
     * @param int    $id        ID of product
     * @param string $sortfield Sort field
     * @param string $sortorder Sort order
     * @param int    $limit     Limit for list
     * @param int    $page      Page number
     *
     * @return mixed
     *
     * @url GET {id}/categories
     */
    public function getCategories($id, $sortfield = "s.rowid", $sortorder = 'ASC', $limit = 0, $page = 0)
    {
    }
    /**
     * Get prices per segment for a product
     *
     * @param int $id ID of product
     *
     * @return mixed
     *
     * @url GET {id}/selling_multiprices/per_segment
     */
    public function getCustomerPricesPerSegment($id)
    {
    }
    /**
     * Get prices per customer for a product
     *
     * @param int $id ID of product
     * @param string   	$thirdparty_id	  Thirdparty id to filter orders of (example '1') {@pattern /^[0-9,]*$/i}
     *
     * @return mixed
     *
     * @url GET {id}/selling_multiprices/per_customer
     */
    public function getCustomerPricesPerCustomer($id, $thirdparty_id = '')
    {
    }
    /**
     * Get prices per quantity for a product
     *
     * @param int $id ID of product
     *
     * @return mixed
     *
     * @url GET {id}/selling_multiprices/per_quantity
     */
    public function getCustomerPricesPerQuantity($id)
    {
    }
    /**
     * Add/Update purchase prices for a product.
     *
     * @param   int         $id                             ID of Product
     * @param  	float		$qty				            Min quantity for which price is valid
     * @param  	float		$buyprice			            Purchase price for the quantity min
     * @param  	string		$price_base_type	            HT or TTC
     * @param  	int		    $fourn_id                       Supplier ID
     * @param  	int			$availability		            Product availability
     * @param	string		$ref_fourn			            Supplier ref
     * @param	float		$tva_tx				            New VAT Rate (For example 8.5. Should not be a string)
     * @param  	string		$charges			            costs affering to product
     * @param  	float		$remise_percent		            Discount  regarding qty (percent)
     * @param  	float		$remise				            Discount  regarding qty (amount)
     * @param  	int			$newnpr				            Set NPR or not
     * @param	int			$delivery_time_days	            Delay in days for delivery (max). May be '' if not defined.
     * @param   string      $supplier_reputation            Reputation with this product to the defined supplier (empty, FAVORITE, DONOTORDER)
     * @param   array		$localtaxes_array	            Array with localtaxes info array('0'=>type1,'1'=>rate1,'2'=>type2,'3'=>rate2) (loaded by getLocalTaxesFromRate(vatrate, 0, ...) function).
     * @param   string  	$newdefaultvatcode              Default vat code
     * @param  	float		$multicurrency_buyprice 	    Purchase price for the quantity min in currency
     * @param  	string		$multicurrency_price_base_type	HT or TTC in currency
     * @param  	float		$multicurrency_tx	            Rate currency
     * @param  	string		$multicurrency_code	            Currency code
     * @param  	string		$desc_fourn     	            Custom description for product_fourn_price
     * @param  	string		$barcode     	                Barcode
     * @param  	int		    $fk_barcode_type     	        Barcode type
     * @return int
     *
     * @throws RestException 500
     * @throws RestException 401
     *
     * @url POST {id}/purchase_prices
     */
    public function addPurchasePrice($id, $qty, $buyprice, $price_base_type, $fourn_id, $availability, $ref_fourn, $tva_tx, $charges = 0, $remise_percent = 0, $remise = 0, $newnpr = 0, $delivery_time_days = 0, $supplier_reputation = '', $localtaxes_array = array(), $newdefaultvatcode = '', $multicurrency_buyprice = 0, $multicurrency_price_base_type = 'HT', $multicurrency_tx = 1, $multicurrency_code = '', $desc_fourn = '', $barcode = '', $fk_barcode_type = \null)
    {
    }
    /**
     * Delete purchase price for a product
     *
     * @param  int $id Product ID
     * @param  int $priceid purchase price ID
     *
     * @url DELETE {id}/purchase_prices/{priceid}
     *
     * @return int
     *
     * @throws RestException 401
     * @throws RestException 404
     *
     */
    public function deletePurchasePrice($id, $priceid)
    {
    }
    /**
     * Get a list of all purchase prices of products
     *
     * @param  string $sortfield  Sort field
     * @param  string $sortorder  Sort order
     * @param  int    $limit      Limit for list
     * @param  int    $page       Page number
     * @param  int    $mode       Use this param to filter list (0 for all, 1 for only product, 2 for only service)
     * @param  int    $category   Use this param to filter list by category of product
     * @param  int    $supplier   Use this param to filter list by supplier
     * @param  string $sqlfilters Other criteria to filter answers separated by a comma. Syntax example "(t.tobuy:=:0) and (t.tosell:=:1)"
     * @return array              Array of product objects
     *
     * @url GET purchase_prices
     */
    public function getSupplierProducts($sortfield = "t.ref", $sortorder = 'ASC', $limit = 100, $page = 0, $mode = 0, $category = 0, $supplier = 0, $sqlfilters = '')
    {
    }
    /**
     * Get purchase prices for a product
     *
     * Return an array with product information.
     * TODO implement getting a product by ref or by $ref_ext
     *
     * @param  int    $id               ID of product
     * @param  string $ref              Ref of element
     * @param  string $ref_ext          Ref ext of element
     * @param  string $barcode          Barcode of element
     * @return array|mixed              Data without useless information
     *
     * @url GET {id}/purchase_prices
     *
     * @throws RestException 401
     * @throws RestException 403
     * @throws RestException 404
     *
     */
    public function getPurchasePrices($id, $ref = '', $ref_ext = '', $barcode = '')
    {
    }
    /**
     * Get attributes.
     *
     * @return array
     *
     * @throws RestException
     *
     * @url GET attributes
     */
    public function getAttributes()
    {
    }
    /**
     * Get attribute by ID.
     *
     * @param  int $id ID of Attribute
     * @return array
     *
     * @throws RestException
     * @throws RestException 401
     * @throws RestException 404
     *
     * @url GET attributes/{id}
     */
    public function getAttributeById($id)
    {
    }
    /**
     * Get attributes by ref.
     *
     * @param  string $ref Reference of Attribute
     * @return array
     *
     * @throws RestException 500
     * @throws RestException 401
     *
     * @url GET attributes/ref/{ref}
     */
    public function getAttributesByRef($ref)
    {
    }
    /**
     * Add attributes.
     *
     * @param  string $ref   Reference of Attribute
     * @param  string $label Label of Attribute
     * @return int
     *
     * @throws RestException 500
     * @throws RestException 401
     *
     * @url POST attributes
     */
    public function addAttributes($ref, $label)
    {
    }
    /**
     * Update attributes by id.
     *
     * @param  int $id    ID of Attribute
     * @param  array $request_data Datas
     * @return array
     *
     * @throws RestException
     * @throws RestException 401
     * @throws RestException 404
     *
     * @url PUT attributes/{id}
     */
    public function putAttributes($id, $request_data = \null)
    {
    }
    /**
     * Delete attributes by id.
     *
     * @param  int $id 	ID of Attribute
     * @return int		Result of deletion
     *
     * @throws RestException 500
     * @throws RestException 401
     *
     * @url DELETE attributes/{id}
     */
    public function deleteAttributes($id)
    {
    }
    /**
     * Get attribute value by id.
     *
     * @param  int $id ID of Attribute value
     * @return array
     *
     * @throws RestException 500
     * @throws RestException 401
     *
     * @url GET attributes/values/{id}
     */
    public function getAttributeValueById($id)
    {
    }
    /**
     * Get attribute value by ref.
     *
     * @param  int $id ID of Attribute value
     * @param  string $ref Ref of Attribute value
     * @return array
     *
     * @throws RestException 500
     * @throws RestException 401
     *
     * @url GET attributes/{id}/values/ref/{ref}
     */
    public function getAttributeValueByRef($id, $ref)
    {
    }
    /**
     * Delete attribute value by ref.
     *
     * @param  int $id ID of Attribute
     * @param  string $ref Ref of Attribute value
     * @return int
     *
     * @throws RestException 401
     *
     * @url DELETE attributes/{id}/values/ref/{ref}
     */
    public function deleteAttributeValueByRef($id, $ref)
    {
    }
    /**
     * Get all values for an attribute id.
     *
     * @param  int $id ID of an Attribute
     * @return array
     *
     * @throws RestException 401
     * @throws RestException 500
     *
     * @url GET attributes/{id}/values
     */
    public function getAttributeValues($id)
    {
    }
    /**
     * Get all values for an attribute ref.
     *
     * @param  string $ref Ref of an Attribute
     * @return array
     *
     * @throws RestException 401
     *
     * @url GET attributes/ref/{ref}/values
     */
    public function getAttributeValuesByRef($ref)
    {
    }
    /**
     * Add attribute value.
     *
     * @param  int    $id    ID of Attribute
     * @param  string $ref   Reference of Attribute value
     * @param  string $value Value of Attribute value
     * @return int
     *
     * @throws RestException 500
     * @throws RestException 401
     *
     * @url POST attributes/{id}/values
     */
    public function addAttributeValue($id, $ref, $value)
    {
    }
    /**
     * Update attribute value.
     *
     * @param  int $id ID of Attribute
     * @param  array $request_data Datas
     * @return array
     *
     * @throws RestException 401
     * @throws RestException 500
     *
     * @url PUT attributes/values/{id}
     */
    public function putAttributeValue($id, $request_data)
    {
    }
    /**
     * Delete attribute value by id.
     *
     * @param  int $id ID of Attribute value
     * @return int
     *
     * @throws RestException 500
     * @throws RestException 401
     *
     * @url DELETE attributes/values/{id}
     */
    public function deleteAttributeValueById($id)
    {
    }
    /**
     * Get product variants.
     *
     * @param  int $id ID of Product
     * @return array
     *
     * @throws RestException 500
     * @throws RestException 401
     *
     * @url GET {id}/variants
     */
    public function getVariants($id)
    {
    }
    /**
     * Get product variants by Product ref.
     *
     * @param  string $ref Ref of Product
     * @return array
     *
     * @throws RestException 500
     * @throws RestException 401
     *
     * @url GET ref/{ref}/variants
     */
    public function getVariantsByProdRef($ref)
    {
    }
    /**
     * Add variant.
     *
     * "features" is a list of attributes pairs id_attribute=>id_value. Example: array(id_color=>id_Blue, id_size=>id_small, id_option=>id_val_a, ...)
     *
     * @param  int $id ID of Product
     * @param  float $weight_impact Weight impact of variant
     * @param  float $price_impact Price impact of variant
     * @param  bool $price_impact_is_percent Price impact in percent (true or false)
     * @param  array $features List of attributes pairs id_attribute->id_value. Example: array(id_color=>id_Blue, id_size=>id_small, id_option=>id_val_a, ...)
     * @param  bool|string $reference Customized reference of variant
     * @return int
     *
     * @throws RestException 500
     * @throws RestException 401
     * @throws RestException 404
     *
     * @url POST {id}/variants
     */
    public function addVariant($id, $weight_impact, $price_impact, $price_impact_is_percent, $features, $reference = \false)
    {
    }
    /**
     * Add variant by product ref.
     *
     * "features" is a list of attributes pairs id_attribute=>id_value. Example: array(id_color=>id_Blue, id_size=>id_small, id_option=>id_val_a, ...)
     *
     * @param  string $ref                      Ref of Product
     * @param  float  $weight_impact            Weight impact of variant
     * @param  float  $price_impact             Price impact of variant
     * @param  bool   $price_impact_is_percent  Price impact in percent (true or false)
     * @param  array  $features                 List of attributes pairs id_attribute->id_value. Example: array(id_color=>id_Blue, id_size=>id_small, id_option=>id_val_a, ...)
     * @return int
     *
     * @throws RestException 500
     * @throws RestException 401
     * @throws RestException 404
     *
     * @url POST ref/{ref}/variants
     */
    public function addVariantByProductRef($ref, $weight_impact, $price_impact, $price_impact_is_percent, $features)
    {
    }
    /**
     * Put product variants.
     *
     * @param  int $id ID of Variant
     * @param  array $request_data Datas
     * @return int
     *
     * @throws RestException 500
     * @throws RestException 401
     *
     * @url PUT variants/{id}
     */
    public function putVariant($id, $request_data = \null)
    {
    }
    /**
     * Delete product variants.
     *
     * @param  int $id 	ID of Variant
     * @return int		Result of deletion
     *
     * @throws RestException 500
     * @throws RestException 401
     *
     * @url DELETE variants/{id}
     */
    public function deleteVariant($id)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     * Clean sensible object datas
     *
     * @param  object $object Object to clean
     * @return array    Array of cleaned object properties
     */
    protected function _cleanObjectDatas($object)
    {
    }
    /**
     * Validate fields before create or update object
     *
     * @param  array $data Datas to validate
     * @return array
     * @throws RestException
     */
    private function _validate($data)
    {
    }
    /**
     * Get properties of a product object
     *
     * Return an array with product information.
     *
     * @param  int    $id                 ID of product
     * @param  string $ref                Ref of element
     * @param  string $ref_ext            Ref ext of element
     * @param  string $barcode            Barcode of element
     * @param  int    $includestockdata   Load also information about stock (slower)
     * @param  bool   $includesubproducts Load information about subproducts
     * @return array|mixed                Data without useless information
     *
     * @throws RestException 401
     * @throws RestException 403
     * @throws RestException 404
     */
    private function _fetch($id, $ref = '', $ref_ext = '', $barcode = '', $includestockdata = 0, $includesubproducts = \false)
    {
    }
}
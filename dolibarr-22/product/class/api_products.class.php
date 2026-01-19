<?php

/**
 * API class for products
 *
 * @since	4.0.0	Initial implementation
 *
 * @access protected
 * @class  DolibarrApiAccess {@requires user,external}
 */
class Products extends \DolibarrApi
{
    /**
     * @var string[]       Mandatory fields, checked when create and update object
     */
    public static $FIELDS = array('ref', 'label');
    /**
     * @var Product {@type Product}
     */
    public $product;
    /**
     * @var ProductFournisseur {@type ProductFournisseur}
     */
    public $productsupplier;
    /**
     * Constructor
     */
    public function __construct()
    {
    }
    /**
     * Get a product
     *
     * Return an array with product information
     *
     * @since	4.0.0	Initial implementation
     *
     * @param  int    $id                  ID of product
     * @param  int    $includestockdata    Load also information about stock (slower)
     * @param  bool   $includesubproducts  Load information about subproducts
     * @param  bool   $includeparentid     Load also ID of parent product (if product is a variant of a parent product)
     * @param  bool   $includetrans		   Load also the translations of product label and description
     * @return array|mixed                 Data without useless information
     *
     * @throws RestException 401
     * @throws RestException 403
     * @throws RestException 404
     */
    public function get($id, $includestockdata = 0, $includesubproducts = \false, $includeparentid = \false, $includetrans = \false)
    {
    }
    /**
     * Get product by ref
     *
     * Return an array with product information
     *
     * @since	11.0.0	Initial implementation
     *
     * @param  string $ref                Ref of element
     * @param  int    $includestockdata   Load also information about stock (slower)
     * @param  bool   $includesubproducts Load information about subproducts
     * @param  bool   $includeparentid    Load also ID of parent product (if product is a variant of a parent product)
     * @param  bool   $includetrans		  Load also the translations of product label and description
     *
     * @return array|mixed                 Data without useless information
     *
     * @url GET ref/{ref}
     *
     * @throws RestException 401
     * @throws RestException 403
     * @throws RestException 404
     */
    public function getByRef($ref, $includestockdata = 0, $includesubproducts = \false, $includeparentid = \false, $includetrans = \false)
    {
    }
    /**
     * Get product by ref_ext
     *
     * Return an array with product information
     *
     * @since	11.0.0	Initial implementation
     *
     * @param  string $ref_ext            Ref_ext of element
     * @param  int    $includestockdata   Load also information about stock (slower)
     * @param  bool   $includesubproducts Load information about subproducts
     * @param  bool   $includeparentid    Load also ID of parent product (if product is a variant of a parent product)
     * @param  bool   $includetrans		  Load also the translations of product label and description
     *
     * @return array|mixed Data without useless information
     *
     * @url GET ref_ext/{ref_ext}
     *
     * @throws RestException 401
     * @throws RestException 403
     * @throws RestException 404
     */
    public function getByRefExt($ref_ext, $includestockdata = 0, $includesubproducts = \false, $includeparentid = \false, $includetrans = \false)
    {
    }
    /**
     * Get product by barcode
     *
     * Return an array with product information
     *
     * @since	11.0.0	Initial implementation
     *
     * @param  string $barcode            Barcode of element
     * @param  int    $includestockdata   Load also information about stock (slower)
     * @param  bool   $includesubproducts Load information about subproducts
     * @param  bool   $includeparentid    Load also ID of parent product (if product is a variant of a parent product)
     * @param  bool   $includetrans		  Load also the translations of product label and description
     *
     * @return array|mixed Data without useless information
     *
     * @url GET barcode/{barcode}
     *
     * @throws RestException 401
     * @throws RestException 403
     * @throws RestException 404
     */
    public function getByBarcode($barcode, $includestockdata = 0, $includesubproducts = \false, $includeparentid = \false, $includetrans = \false)
    {
    }
    /**
     * List products
     *
     * Get a list of products
     *
     * @since	4.0.0	Initial implementation
     *
     * @param  string $sortfield			Sort field
     * @param  string $sortorder			Sort order
     * @param  int    $limit				Limit for list
     * @param  int    $page					Page number
     * @param  int    $mode					Use this param to filter list (0 for all, 1 for only product, 2 for only service)
     * @param  int    $category				Use this param to filter list by category
     * @param  string $sqlfilters			Other criteria to filter answers separated by a comma. Syntax example "(t.tobuy:=:0) and (t.tosell:=:1)"
     * @param  bool   $ids_only				Return only IDs of product instead of all properties (faster, above all if list is long)
     * @param  int    $variant_filter		Use this param to filter list (0 = all, 1=products without variants, 2=parent of variants, 3=variants only)
     * @param  bool   $pagination_data		If this parameter is set to true the response will include pagination data. Default value is false. Page starts from 0
     * @param  int    $includestockdata		Load also information about stock (slower)
     * @param string  $properties			Restrict the data returned to these properties. Ignored if empty. Comma separated list of properties names
     * @return array						Array of product objects
     * @phan-return Product[]|array{data:Product[],pagination:array{total:int,page:int,page_count:int,limit:int}}
     * @phpstan-return Product[]|array{data:Product[],pagination:array{total:int,page:int,page_count:int,limit:int}}
     *
     * @throws RestException
     */
    public function index($sortfield = "t.ref", $sortorder = 'ASC', $limit = 100, $page = 0, $mode = 0, $category = 0, $sqlfilters = '', $ids_only = \false, $variant_filter = 0, $pagination_data = \false, $includestockdata = 0, $properties = '')
    {
    }
    /**
     * Create a product
     *
     * @since	4.0.0	Initial implementation
     *
     * @param  array $request_data Request data
     * @phan-param ?array<string,string> $request_data
     * @phpstan-param ?array<string,string> $request_data
     * @return int     ID of product
     *
     * @throws RestException
     */
    public function post($request_data = \null)
    {
    }
    /**
     * Update a product
     *
     * Price will be updated by this API only if option is set on "One price per product" or
     * if PRODUIT_MULTIPRICES is set (1 price per segment)
     * See other APIs for other price modes.
     *
     * @since	4.0.0	Initial implementation
     *
     * @param  	int   	$id           		Id of product to update
     * @param  	array 	$request_data 		Data
     * @phan-param ?array<string,string> $request_data
     * @phpstan-param ?array<string,string> $request_data
     * @return 	Object						Updated object
     *
     * @throws RestException 401
     * @throws RestException 404
     */
    public function put($id, $request_data = \null)
    {
    }
    /**
     * Delete a product
     *
     * @since	4.0.0	Initial implementation
     *
     * @param  int		$id			Product ID
     * @return array
     * @phan-return array{success:array{code:int,message:string}}
     * @phpstan-return array{success:array{code:int,message:string}}
     *
     * @throws RestException
     */
    public function delete($id)
    {
    }
    /**
     * Get the list of subproducts of a product
     *
     * @since	11.0.0	Initial implementation
     *
     * @param  int $id      ID of parent product/service
     * @return array
     * @phan-return array<array{rowid:int,qty:float,fkproduct_type:int,label:string,incdec:int,ref:string,fk_association:int,rang:int}>
     * @phpstan-return array<array{rowid:int,qty:float,fkproduct_type:int,label:string,incdec:int,ref:string,fk_association:int,rang:int}>
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
     * Add a subproduct
     *
     * Link a product/service to a parent product/service
     *
     * @since	11.0.0	Initial implementation
     *
     * @param  int $id            ID of parent product/service
     * @param  int $subproduct_id ID of child product/service
     * @param  float $qty         Quantity
     * @param  int $incdec        1=Increase/decrease stock of child when parent stock increases/decreases
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
     * Remove a subproduct
     *
     * Unlink a product/service from a parent product/service
     *
     * @since	11.0.0	Initial implementation
     *
     * @param  int $id             ID of parent product/service
     * @param  int $subproduct_id  ID of child product/service
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
     * @since	5.0.0	Initial implementation
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
     *
     * @throws RestException
     */
    public function getCategories($id, $sortfield = "s.rowid", $sortorder = 'ASC', $limit = 0, $page = 0)
    {
    }
    /**
     * Get prices per segment for a product
     *
     * @since	7.0.0	Initial implementation
     *
     * @param int $id ID of product
     *
     * @return mixed
     *
     * @url GET {id}/selling_multiprices/per_segment
     *
     * @throws RestException
     */
    public function getCustomerPricesPerSegment($id)
    {
    }
    /**
     * Get prices per customer for a product
     *
     * @since	7.0.0	Initial implementation
     *
     * @param int		$id					ID of product
     * @param string	$thirdparty_id		Thirdparty id to filter orders of (example '1') {@pattern /^[0-9,]*$/i}
     *
     * @return mixed
     *
     * @url GET {id}/selling_multiprices/per_customer
     *
     * @throws RestException
     */
    public function getCustomerPricesPerCustomer($id, $thirdparty_id = '')
    {
    }
    /**
     * Get prices per quantity for a product
     *
     * @since	7.0.0	Initial implementation
     *
     * @param int $id ID of product
     *
     * @return mixed
     *
     * @url GET {id}/selling_multiprices/per_quantity
     *
     * @throws RestException
     */
    public function getCustomerPricesPerQuantity($id)
    {
    }
    /**
     * Add/Update purchase prices for a product
     *
     * @since	12.0.0	Initial implementation
     *
     * @param   int         $id                             ID of Product
     * @param	float		$qty							Min quantity for which price is valid
     * @param	float		$buyprice						Purchase price for the quantity min
     * @param	string		$price_base_type				HT or TTC
     * @param	int			$fourn_id                       Supplier ID
     * @param	int			$availability					Product availability
     * @param	string		$ref_fourn						Supplier ref
     * @param	float		$tva_tx							New VAT Rate (For example 8.5. Should not be a string)
     * @param	float 		$charges						costs affering to product
     * @param	float		$remise_percent					Discount  regarding qty (percent)
     * @param	float		$remise							Discount  regarding qty (amount)
     * @param	int			$newnpr							Set NPR or not
     * @param	int			$delivery_time_days				Delay in days for delivery (max). May be '' if not defined.
     * @param   string      $supplier_reputation            Reputation with this product to the defined supplier (empty, FAVORITE, DONOTORDER)
     * @param   array		$localtaxes_array				Array with localtaxes info array('0'=>type1,'1'=>rate1,'2'=>type2,'3'=>rate2) (loaded by getLocalTaxesFromRate(vatrate, 0, ...) function).
     * @phan-param		array{0:string,1:string,2:string,3:string}|array{}	$localtaxes_array
     * @phpstan-param	array{0:string,1:string,2:string,3:string}|array{}	$localtaxes_array
     * @param   string		$newdefaultvatcode              Default vat code
     * @param	float		$multicurrency_buyprice			Purchase price for the quantity min in currency
     * @param	string		$multicurrency_price_base_type	HT or TTC in currency
     * @param	float		$multicurrency_tx				Rate currency
     * @param	string		$multicurrency_code				Currency code
     * @param	string		$desc_fourn						Custom description for product_fourn_price
     * @param	string		$barcode						Barcode
     * @param	int			$fk_barcode_type				Barcode type
     * @return int
     *
     * @throws RestException 500	System error
     * @throws RestException 401
     *
     * @url POST {id}/purchase_prices
     */
    public function addPurchasePrice($id, $qty, $buyprice, $price_base_type, $fourn_id, $availability, $ref_fourn, $tva_tx, $charges = 0, $remise_percent = 0, $remise = 0, $newnpr = 0, $delivery_time_days = 0, $supplier_reputation = '', $localtaxes_array = array(), $newdefaultvatcode = '', $multicurrency_buyprice = 0, $multicurrency_price_base_type = 'HT', $multicurrency_tx = 1, $multicurrency_code = '', $desc_fourn = '', $barcode = '', $fk_barcode_type = \null)
    {
    }
    /**
     * Delete a purchase price for a product
     *
     * @since	11.0.0	Initial implementation
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
     */
    public function deletePurchasePrice($id, $priceid)
    {
    }
    /**
     * Get a list of all purchase prices of products
     *
     * @since	11.0.0	Initial implementation
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
     * @phan-return array<ProductFournisseur[]|int>
     * @phpstan-return array<ProductFournisseur[]|int>
     *
     * @url GET purchase_prices
     *
     * @throws RestException
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
     * @since	11.0.0	Initial implementation
     *
     * @param  int    $id               ID of product
     * @param  string $ref              Ref of element
     * @param  string $ref_ext          Ref ext of element
     * @param  string $barcode          Barcode of element
     * @return array                    Data without useless information
     * @phan-return ProductFournisseur[]
     * @phpstan-return ProductFournisseur[]
     *
     * @url GET {id}/purchase_prices
     *
     * @throws RestException 401
     * @throws RestException 403
     * @throws RestException 404
     */
    public function getPurchasePrices($id, $ref = '', $ref_ext = '', $barcode = '')
    {
    }
    /**
     * Get attributes
     *
     * @since	11.0.0	Initial implementation
     *
     * @param  string $sortfield  Sort field
     * @param  string $sortorder  Sort order
     * @param  int    $limit      Limit for list
     * @param  int    $page       Page number
     * @param  string $sqlfilters Other criteria to filter answers separated by a comma. Syntax example "(t.ref:like:color)"
     * @param string  $properties Restrict the data returned to these properties. Ignored if empty. Comma separated list of properties names
     * @return array
     * @phan-return ProductAttribute[]
     * @phpstan-return ProductAttribute[]
     *
     * @throws RestException 401
     * @throws RestException 404
     * @throws RestException 503
     *
     * @url GET attributes
     */
    public function getAttributes($sortfield = "t.ref", $sortorder = 'ASC', $limit = 100, $page = 0, $sqlfilters = '', $properties = '')
    {
    }
    /**
     * Get attribute by ID
     *
     * @since	11.0.0	Initial implementation
     *
     * @param	int			$id			ID of Attribute
     * @return	Object					Object with cleaned properties
     *
     * @throws RestException 401
     * @throws RestException 404
     *
     * @url GET attributes/{id}
     */
    public function getAttributeById($id)
    {
    }
    /**
     * Get attributes by ref
     *
     * @since	11.0.0	Initial implementation
     *
     * @param  string $ref Reference of Attribute
     * @return array
     * @phan-return		array{id:int,ref:string,ref_ext:string,label:string,rang:int,position:int,entity:string,is_used_by_products:int}
     * @phpstan-return	array{id:int,ref:string,ref_ext:string,label:string,rang:int,position:int,entity:string,is_used_by_products:int}
     *
     * @throws RestException 401
     * @throws RestException 404
     *
     * @url GET attributes/ref/{ref}
     */
    public function getAttributesByRef($ref)
    {
    }
    /**
     * Get attributes by ref_ext
     *
     * @since	11.0.0	Initial implementation
     *
     * @param  string $ref_ext External reference of Attribute
     * @return array
     * @phan-return		array{id:int,ref:string,ref_ext:string,label:string,rang:int,position:int,entity:string,is_used_by_products:int}
     * @phpstan-return	array{id:int,ref:string,ref_ext:string,label:string,rang:int,position:int,entity:string,is_used_by_products:int}
     *
     * @throws RestException 500	System error
     * @throws RestException 401
     *
     * @url GET attributes/ref_ext/{ref_ext}
     */
    public function getAttributesByRefExt($ref_ext)
    {
    }
    /**
     * Add attributes
     *
     * @since	11.0.0	Initial implementation
     *
     * @param  string $ref   Reference of Attribute
     * @param  string $label Label of Attribute
     * @param  string $ref_ext   Reference of Attribute
     * @return int
     *
     * @throws RestException 500	System error
     * @throws RestException 401
     *
     * @url POST attributes
     */
    public function addAttributes($ref, $label, $ref_ext = '')
    {
    }
    /**
     * Update attributes by ID
     *
     * @since	11.0.0	Initial implementation
     *
     * @param	int		$id				ID of Attribute
     * @param	array	$request_data	Data
     * @phan-param ?array<string,string> $request_data
     * @phpstan-param ?array<string,string> $request_data
     * @return	Object					Object with cleaned properties
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
     * Delete attributes by ID
     *
     * @since	11.0.0	Initial implementation
     *
     * @param  int $id	ID of Attribute
     * @return int		Result of deletion
     *
     * @throws RestException 500	System error
     * @throws RestException 401
     *
     * @url DELETE attributes/{id}
     */
    public function deleteAttributes($id)
    {
    }
    /**
     * Get attribute value by ID
     *
     * @since	11.0.0	Initial implementation
     *
     * @param  int $id ID of Attribute value
     * @return array
     * @phan-return array{id:int,fk_product_attribute:int,ref:string,value:string}
     * @phpstan-return array{id:int,fk_product_attribute:int,ref:string,value:string}
     *
     * @throws RestException 500	System error
     * @throws RestException 401
     *
     * @url GET attributes/values/{id}
     */
    public function getAttributeValueById($id)
    {
    }
    /**
     * Get attribute value by ref
     *
     * @since	11.0.0	Initial implementation
     *
     * @param  int $id ID of Attribute value
     * @param  string $ref Ref of Attribute value
     * @return array
     * @phan-return array{id:int,fk_product_attribute:int,ref:string,value:string}
     * @phpstan-return array{id:int,fk_product_attribute:int,ref:string,value:string}
     *
     * @throws RestException 500	System error
     * @throws RestException 401
     *
     * @url GET attributes/{id}/values/ref/{ref}
     */
    public function getAttributeValueByRef($id, $ref)
    {
    }
    /**
     * Delete attribute value by ref
     *
     * @since	11.0.0	Initial implementation
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
     * Get all values for an attribute ID
     *
     * @since	11.0.0	Initial implementation
     *
     * @param  int $id ID of an Attribute
     * @return array
     * @phan-return ProductAttributeValue[]
     * @phpstan-return ProductAttributeValue[]
     *
     * @throws RestException 401
     * @throws RestException 500	System error
     *
     * @url GET attributes/{id}/values
     */
    public function getAttributeValues($id)
    {
    }
    /**
     * Get all values for an attribute ref
     *
     * @since	11.0.0	Initial implementation
     *
     * @param  string $ref Ref of an Attribute
     * @return array
     * @phan-return ProductAttributeValue[]
     * @phpstan-return ProductAttributeValue[]
     *
     * @throws RestException 401
     *
     * @url GET attributes/ref/{ref}/values
     */
    public function getAttributeValuesByRef($ref)
    {
    }
    /**
     * Add attribute value
     *
     * @since	11.0.0	Initial implementation
     *
     * @param  int    $id    ID of Attribute
     * @param  string $ref   Reference of Attribute value
     * @param  string $value Value of Attribute value
     * @return int
     *
     * @throws RestException 500	System error
     * @throws RestException 401
     *
     * @url POST attributes/{id}/values
     */
    public function addAttributeValue($id, $ref, $value)
    {
    }
    /**
     * Update attribute value
     *
     * @since	11.0.0	Initial implementation
     *
     * @param	int		$id				ID of Attribute
     * @param	array	$request_data	Data
     * @phan-param ?array<string,string> $request_data
     * @phpstan-param ?array<string,string> $request_data
     * @return	Object					Object with cleaned properties
     *
     * @throws RestException 401
     * @throws RestException 500	System error
     *
     * @url PUT attributes/values/{id}
     */
    public function putAttributeValue($id, $request_data)
    {
    }
    /**
     * Delete attribute value by ID
     *
     * @since	11.0.0	Initial implementation
     *
     * @param  int $id ID of Attribute value
     * @return int
     *
     * @throws RestException 500	System error
     * @throws RestException 401
     *
     * @url DELETE attributes/values/{id}
     */
    public function deleteAttributeValueById($id)
    {
    }
    /**
     * Get product variants
     *
     * @since	11.0.0	Initial implementation
     *
     * @param  int	$id				ID of Product
     * @param  int  $includestock   Default value 0. If parameter is set to 1 the response will contain stock data of each variant
     * @return array
     * @phan-return ProductCombination[]
     * @phpstan-return ProductCombination[]
     *
     * @throws RestException 500	System error
     * @throws RestException 401
     *
     * @url GET {id}/variants
     */
    public function getVariants($id, $includestock = 0)
    {
    }
    /**
     * Get product variants by Product ref
     *
     * @since	11.0.0	Initial implementation
     *
     * @param  string $ref Ref of Product
     * @return array
     * @phan-return ProductCombination[]
     * @phpstan-return ProductCombination[]
     *
     * @throws RestException 500	System error
     * @throws RestException 401
     *
     * @url GET ref/{ref}/variants
     */
    public function getVariantsByProdRef($ref)
    {
    }
    /**
     * Add variant
     *
     * "features" is a list of attributes pairs id_attribute=>id_value. Example: array(id_color=>id_Blue, id_size=>id_small, id_option=>id_val_a, ...)
     *
     * @since	11.0.0	Initial implementation
     *
     * @param  int $id ID of Product
     * @param  float $weight_impact Weight impact of variant
     * @param  float $price_impact Price impact of variant
     * @param  bool $price_impact_is_percent Price impact in percent (true or false)
     * @param  array $features List of attributes pairs id_attribute->id_value. Example: array(id_color=>id_Blue, id_size=>id_small, id_option=>id_val_a, ...)
     * @phan-param array<string,string> $features
     * @phpstan-param array<string,string> $features
     * @param  string $reference Customized reference of variant
     * @param  string $ref_ext External reference of variant
     * @return int
     *
     * @throws RestException 500	System error
     * @throws RestException 401
     * @throws RestException 404
     *
     * @url POST {id}/variants
     */
    public function addVariant($id, $weight_impact, $price_impact, $price_impact_is_percent, $features, $reference = '', $ref_ext = '')
    {
    }
    /**
     * Add variant by product ref
     *
     * "features" is a list of attributes pairs id_attribute=>id_value. Example: array(id_color=>id_Blue, id_size=>id_small, id_option=>id_val_a, ...)
     *
     * @since	11.0.0	Initial implementation
     *
     * @param  string $ref                      Ref of Product
     * @param  float  $weight_impact            Weight impact of variant
     * @param  float  $price_impact             Price impact of variant
     * @param  bool   $price_impact_is_percent  Price impact in percent (true or false)
     * @param  array  $features                 List of attributes pairs id_attribute->id_value. Example: array(id_color=>id_Blue, id_size=>id_small, id_option=>id_val_a, ...)
     * @phan-param array<string,string> $features
     * @phpstan-param array<string,string> $features
     * @return int
     *
     * @throws RestException 500	System error
     * @throws RestException 401
     * @throws RestException 404
     *
     * @url POST ref/{ref}/variants
     */
    public function addVariantByProductRef($ref, $weight_impact, $price_impact, $price_impact_is_percent, $features)
    {
    }
    /**
     * Update product variants
     *
     * @since	11.0.0	Initial implementation
     *
     * @param  int $id ID of Variant
     * @param  array $request_data Data
     * @phan-param ?array<string,string> $request_data
     * @phpstan-param ?array<string,string> $request_data
     * @return int
     *
     * @throws RestException 500	System error
     * @throws RestException 401
     *
     * @url PUT variants/{id}
     */
    public function putVariant($id, $request_data = \null)
    {
    }
    /**
     * Delete product variants
     *
     * @since	11.0.0	Initial implementation
     *
     * @param  int $id	ID of Variant
     * @return int		Result of deletion
     *
     * @throws RestException 500	System error
     * @throws RestException 401
     *
     * @url DELETE variants/{id}
     */
    public function deleteVariant($id)
    {
    }
    /**
     * Get stock data for a product
     *
     * Optionally with $selected_warehouse_id parameter user can get stock of a specific warehouse
     *
     * @since	14.0.0	Initial implementation
     *
     * @param  int $id ID of Product
     * @param  int $selected_warehouse_id ID of warehouse
     * @return array|mixed                 Data without useless information
     *
     * @throws RestException 500	System error
     * @throws RestException 403
     * @throws RestException 404
     *
     * @url GET {id}/stock
     */
    public function getStock($id, $selected_warehouse_id = \null)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     * Clean sensitive object data
     * @phpstan-template T of Object
     *
     * @param   Object  $object     Object to clean
     * @return  Object              Object with cleaned properties
     *
     * @phpstan-param T $object
     * @phpstan-return T
     */
    protected function _cleanObjectDatas($object)
    {
    }
    /**
     * Validate fields before create or update object
     *
     * @param ?array<string,string> $data   Data to validate
     * @return array<string,string>
     * @throws RestException
     */
    private function _validate($data)
    {
    }
    /**
     * Get properties of 1 product object.
     * Return an array with product information.
     *
     * @param  int    $id						ID of product
     * @param  string $ref						Ref of element
     * @param  string $ref_ext					Ref ext of element
     * @param  string $barcode					Barcode of element
     * @param  int    $includestockdata			Load also information about stock (slower)
     * @param  bool   $includesubproducts		Load information about subproducts (if product is a virtual product)
     * @param  bool   $includeparentid			Load also ID of parent product (if product is a variant of a parent product)
     * @param  bool   $includeifobjectisused	Check if product object is used and set property 'is_object_used' with result.
     * @param  bool   $includetrans				Load also the translations of product label and description
     * @return array|mixed						Data without useless information
     *
     * @throws RestException 401
     * @throws RestException 403
     * @throws RestException 404
     */
    private function _fetch($id, $ref = '', $ref_ext = '', $barcode = '', $includestockdata = 0, $includesubproducts = \false, $includeparentid = \false, $includeifobjectisused = \false, $includetrans = \false)
    {
    }
}
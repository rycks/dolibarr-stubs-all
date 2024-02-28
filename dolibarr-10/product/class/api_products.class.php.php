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
     * Constructor
     */
    public function __construct()
    {
    }
    /**
     * Get properties of a product object (from its ID, Ref, Ref_ext or Barcode)
     *
     * Return an array with product information.
     * TODO implement getting a product by ref or by $ref_ext
     *
     * @param  int    $id               ID of product
     * @param  string $ref              Ref of element
     * @param  string $ref_ext          Ref ext of element
     * @param  string $barcode          Barcode of element
     * @param  int    $includestockdata Load also information about stock (slower)
     * @return array|mixed                 Data without useless information
     *
     * @throws 401
     * @throws 403
     * @throws 404
     */
    public function get($id, $ref = '', $ref_ext = '', $barcode = '', $includestockdata = 0)
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
     * @throws RestException
     * @throws 401
     * @throws 404
     */
    public function put($id, $request_data = \null)
    {
    }
    /**
     * Delete product
     *
     * @param  int $id Product ID
     * @return array
     */
    public function delete($id)
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
     *
     * @return mixed
     *
     * @url GET {id}/selling_multiprices/per_customer
     */
    public function getCustomerPricesPerCustomer($id)
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
     * Delete purchase price for a product
     *
     * @param  int $id Product ID
     * @param  int $priceid purchase price ID
     *
     * @url DELETE {id}/purchase_prices/{priceid}
     *
     * @return array
     *
     * @throws 401
     * @throws 404
     *
     */
    public function deletePurchasePrice($id, $priceid)
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
}
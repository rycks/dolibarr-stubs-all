<?php

/**
 * API class for stock movements
 *
 * @access protected
 * @class  DolibarrApiAccess {@requires user,external}
 */
class StockMovements extends \DolibarrApi
{
    /**
     * @var array   $FIELDS     Mandatory fields, checked when create and update object
     */
    static $FIELDS = array('product_id', 'warehouse_id', 'qty');
    /**
     * @var MouvementStock $stockmovement {@type MouvementStock}
     */
    public $stockmovement;
    /**
     * Constructor
     */
    public function __construct()
    {
    }
    /**
     * Get properties of a stock movement object
     *
     * Return an array with stock movement informations
     *
     * @param 	int 	$id ID of movement
     * @return 	array|mixed data without useless information
     *
     * @throws 	RestException
     */
    /*
        public function get($id)
        {
            if(! DolibarrApiAccess::$user->rights->stock->lire) {
                throw new RestException(401);
            }
    
            $result = $this->stockmovement->fetch($id);
            if( ! $result ) {
                throw new RestException(404, 'warehouse not found');
            }
    
            if( ! DolibarrApi::_checkAccessToResource('warehouse',$this->stockmovement->id)) {
                throw new RestException(401, 'Access not allowed for login '.DolibarrApiAccess::$user->login);
            }
    
            return $this->_cleanObjectDatas($this->stockmovement);
        }*/
    /**
     * Get a list of stock movement
     *
     * @param string	$sortfield	Sort field
     * @param string	$sortorder	Sort order
     * @param int		$limit		Limit for list
     * @param int		$page		Page number
     * @param string    $sqlfilters Other criteria to filter answers separated by a comma. Syntax example "(t.product_id:=:1) and (t.date_creation:<:'20160101')"
     * @return array                Array of warehouse objects
     *
     * @throws RestException
     */
    public function index($sortfield = "t.rowid", $sortorder = 'ASC', $limit = 100, $page = 0, $sqlfilters = '')
    {
    }
    /*
     * @param   int     $product_id         Id product id {@min 1}
     * @param   int     $warehouse_id       Id warehouse {@min 1}
     * @param   float   $qty                Qty to add (Use negative value for a stock decrease) {@min 0} {@message qty must be higher than 0}
     * @param   string  $lot                Lot
     * @param   string  $movementcode       Movement code {@example INV123}
     * @param   string  $movementlabel      Movement label {@example Inventory number 123}
     * @param   string  $price              To update AWP (Average Weighted Price) when you make a stock increase (qty must be higher then 0).
     */
    /**
     * Create stock movement object.
     * You can use the following message to test this RES API:
     * { "product_id": 1, "warehouse_id": 1, "qty": 1, "lot": "", "movementcode": "INV123", "movementlabel": "Inventory 123", "price": 0 }
     *
     * @param array $request_data   Request data
     * @return  int                         ID of stock movement
     */
    //function post($product_id, $warehouse_id, $qty, $lot='', $movementcode='', $movementlabel='', $price=0)
    public function post($request_data = \null)
    {
    }
    /**
     * Update stock movement
     *
     * @param int   $id             Id of warehouse to update
     * @param array $request_data   Datas
     * @return int
     */
    /*
        public function put($id, $request_data = null)
        {
            if(! DolibarrApiAccess::$user->rights->stock->creer) {
                throw new RestException(401);
            }
    
            $result = $this->stockmovement->fetch($id);
            if( ! $result ) {
                throw new RestException(404, 'stock movement not found');
            }
    
            if( ! DolibarrApi::_checkAccessToResource('stock',$this->stockmovement->id)) {
                throw new RestException(401, 'Access not allowed for login '.DolibarrApiAccess::$user->login);
            }
    
            foreach($request_data as $field => $value) {
                if ($field == 'id') continue;
                $this->stockmovement->$field = $value;
            }
    
            if($this->stockmovement->update($id, DolibarrApiAccess::$user))
                return $this->get ($id);
    
            return false;
        }*/
    /**
     * Delete stock movement
     *
     * @param int $id   Stock movement ID
     * @return array
     */
    /*
        public function delete($id)
        {
            if(! DolibarrApiAccess::$user->rights->stock->supprimer) {
                throw new RestException(401);
            }
            $result = $this->stockmovement->fetch($id);
            if( ! $result ) {
                throw new RestException(404, 'stock movement not found');
            }
    
            if( ! DolibarrApi::_checkAccessToResource('stock',$this->stockmovement->id)) {
                throw new RestException(401, 'Access not allowed for login '.DolibarrApiAccess::$user->login);
            }
    
            if (! $this->stockmovement->delete(DolibarrApiAccess::$user)) {
                throw new RestException(401,'error when delete stock movement');
            }
    
            return array(
                'success' => array(
                    'code' => 200,
                    'message' => 'Warehouse deleted'
                )
            );
        }*/
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     * Clean sensible object datas
     *
     * @param   MouvementStock  $object    Object to clean
     * @return    array    Array of cleaned object properties
     */
    protected function _cleanObjectDatas($object)
    {
    }
    /**
     * Validate fields before create or update object
     *
     * @param array|null    $data    Data to validate
     * @return array
     *
     * @throws RestException
     */
    private function _validate($data)
    {
    }
}
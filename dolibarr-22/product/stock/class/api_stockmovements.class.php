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
     * @var string[]       Mandatory fields, checked when create and update object
     */
    public static $FIELDS = array('product_id', 'warehouse_id', 'qty');
    /**
     * @var MouvementStock {@type MouvementStock}
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
     * Return an array with stock movement information
     *
     * @param	int		$id				ID of movement
     * @return  Object					Object with cleaned properties
     *
     * @throws	RestException
     */
    /*
    	public function get($id)
    	{
    		if (!DolibarrApiAccess::$user->hasRight('stock', 'lire')) {
    			throw new RestException(403);
    		}
    
    		$result = $this->stockmovement->fetch($id);
    		if (!$result ) {
    			throw new RestException(404, 'warehouse not found');
    		}
    
    		if (!DolibarrApi::_checkAccessToResource('warehouse',$this->stockmovement->id)) {
    			throw new RestException(403, 'Access not allowed for login '.DolibarrApiAccess::$user->login);
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
     * @param string    $sqlfilters Other criteria to filter answers separated by a comma. Syntax example "(t.fk_product:=:1) and (t.date_creation:<:'20160101')"
     * @param string    $properties	Restrict the data returned to these properties. Ignored if empty. Comma separated list of properties names
     * @return array                Array of warehouse objects
     * @phan-return MouvementStock[]
     * @phpstan-return MouvementStock[]
     *
     * @throws RestException
     */
    public function index($sortfield = "t.rowid", $sortorder = 'ASC', $limit = 100, $page = 0, $sqlfilters = '', $properties = '')
    {
    }
    /**
     * Create stock movement object.
     * You can use the following message to test this RES API:
     * { "product_id": 1, "warehouse_id": 1, "qty": 1, "lot": "", "movementcode": "INV123", "movementlabel": "Inventory 123", "price": 0 }
     * $price Can be set to update AWP (Average Weighted Price) when you make a stock increase
     * $dlc Eat-by date. Will be used if lot does not exists yet and will be created.
     * $dluo Sell-by date. Will be used if lot does not exists yet and will be created.
     *
     * @param int $product_id Id product id {@min 1} {@from body} {@required true}
     * @param int $warehouse_id Id warehouse {@min 1} {@from body} {@required true}
     * @param float $qty Qty to add (Use negative value for a stock decrease) {@from body} {@required true}
     * @param int $type Optionally specify the type of movement. 0=input (stock increase by a stock transfer), 1=output (stock decrease by a stock transfer), 2=output (stock decrease), 3=input (stock increase). {@from body} {@type int}
     * @param string $lot Lot {@from body}
     * @param string $movementcode Movement code {@from body}
     * @param string $movementlabel Movement label {@from body}
     * @param string $price To update AWP (Average Weighted Price) when you make a stock increase (qty must be higher then 0). {@from body}
     * @param string $datem Date of movement {@from body} {@type date}
     * @param string $dlc Eat-by date. {@from body} {@type date}
     * @param string $dluo Sell-by date. {@from body} {@type date}
     * @param string $origin_type   Origin type (Element of source object, like 'project', 'inventory', ...)
     * @param int $origin_id     Origin id (Id of source object)
     * @return  int                         ID of stock movement
     *
     * @throws RestException
     */
    public function post($product_id, $warehouse_id, $qty, $type = 2, $lot = '', $movementcode = '', $movementlabel = '', $price = '', $datem = '', $dlc = '', $dluo = '', $origin_type = '', $origin_id = 0)
    {
    }
    /**
     * Update stock movement
     *
     * @param 	int   	$id             	Id of warehouse to update
     * @param 	array 	$request_data   	Datas
     * @return 	Object						Updated object
     */
    /*
    	public function put($id, $request_data = null)
    	{
    		if(! DolibarrApiAccess::$user->hasRight('stock', 'creer')) {
    			throw new RestException(403);
    		}
    
    		$result = $this->stockmovement->fetch($id);
    		if( ! $result ) {
    			throw new RestException(404, 'stock movement not found');
    		}
    
    		if( ! DolibarrApi::_checkAccessToResource('stock',$this->stockmovement->id)) {
    			throw new RestException(403, 'Access not allowed for login '.DolibarrApiAccess::$user->login);
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
    		if (! DolibarrApiAccess::$user->hasRight('stock', 'supprimer')) {
    			throw new RestException(403);
    		}
    		$result = $this->stockmovement->fetch($id);
    		if (! $result ) {
    			throw new RestException(404, 'stock movement not found');
    		}
    
    		if (! DolibarrApi::_checkAccessToResource('stock',$this->stockmovement->id)) {
    			throw new RestException(403, 'Access not allowed for login '.DolibarrApiAccess::$user->login);
    		}
    
    		if (! $this->stockmovement->delete(DolibarrApiAccess::$user)) {
    			throw new RestException(403,'error when delete stock movement');
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
     * @param   MouvementStock $object     Object to clean
     * @return  Object                     Object with cleaned properties
     */
    protected function _cleanObjectDatas($object)
    {
    }
    /**
     * Validate fields before create or update object
     *
     * @param ?array<string,string> $data   Data to validate
     * @return array<string,string>
     *
     * @throws RestException
     */
    private function _validate($data)
    {
    }
}
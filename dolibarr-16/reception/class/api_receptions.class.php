<?php

/**
 * API class for receptions
 *
 * @access protected
 * @class  DolibarrApiAccess {@requires user,external}
 */
class Receptions extends \DolibarrApi
{
    /**
     * @var array   $FIELDS     Mandatory fields, checked when create and update object
     */
    public static $FIELDS = array('socid', 'origin_id', 'origin_type');
    /**
     * @var Reception $reception {@type Reception}
     */
    public $reception;
    /**
     * Constructor
     */
    public function __construct()
    {
    }
    /**
     * Get properties of a reception object
     *
     * Return an array with reception informations
     *
     * @param       int         $id         ID of reception
     * @return 	array|mixed data without useless information
     *
     * @throws 	RestException
     */
    public function get($id)
    {
    }
    /**
     * List receptions
     *
     * Get a list of receptions
     *
     * @param string	       $sortfield	        Sort field
     * @param string	       $sortorder	        Sort order
     * @param int		       $limit		        Limit for list
     * @param int		       $page		        Page number
     * @param string   	       $thirdparty_ids	    Thirdparty ids to filter receptions of (example '1' or '1,2,3') {@pattern /^[0-9,]*$/i}
     * @param string           $sqlfilters          Other criteria to filter answers separated by a comma. Syntax example "(t.ref:like:'SO-%') and (t.date_creation:<:'20160101')"
     * @return  array                               Array of reception objects
     *
     * @throws RestException
     */
    public function index($sortfield = "t.rowid", $sortorder = 'ASC', $limit = 100, $page = 0, $thirdparty_ids = '', $sqlfilters = '')
    {
    }
    /**
     * Create reception object
     *
     * @param   array   $request_data   Request data
     * @return  int     ID of reception
     */
    public function post($request_data = \null)
    {
    }
    // /**
    //  * Get lines of an reception
    //  *
    //  * @param int   $id             Id of reception
    //  *
    //  * @url	GET {id}/lines
    //  *
    //  * @return int
    //  */
    /*
    public function getLines($id)
    {
    	if(! DolibarrApiAccess::$user->rights->reception->lire) {
    		throw new RestException(401);
    	}
    
    	$result = $this->reception->fetch($id);
    	if( ! $result ) {
    		throw new RestException(404, 'Reception not found');
    	}
    
    	if( ! DolibarrApi::_checkAccessToResource('reception',$this->reception->id)) {
    		throw new RestException(401, 'Access not allowed for login '.DolibarrApiAccess::$user->login);
    	}
    	$this->reception->getLinesArray();
    	$result = array();
    	foreach ($this->reception->lines as $line) {
    		array_push($result,$this->_cleanObjectDatas($line));
    	}
    	return $result;
    }
    */
    // /**
    //  * Add a line to given reception
    //  *
    //  * @param int   $id             Id of reception to update
    //  * @param array $request_data   ShipmentLine data
    //  *
    //  * @url	POST {id}/lines
    //  *
    //  * @return int
    //  */
    /*
    	public function postLine($id, $request_data = null)
    	{
    		if(! DolibarrApiAccess::$user->rights->reception->creer) {
    			throw new RestException(401);
    		}
    
    		$result = $this->reception->fetch($id);
    		if ( ! $result ) {
    			throw new RestException(404, 'Reception not found');
    		}
    
    		if( ! DolibarrApi::_checkAccessToResource('reception',$this->reception->id)) {
    			throw new RestException(401, 'Access not allowed for login '.DolibarrApiAccess::$user->login);
    		}
    
    		$request_data = (object) $request_data;
    
    		$request_data->desc = sanitizeVal($request_data->desc, 'restricthtml');
    		$request_data->label = sanitizeVal($request_data->label);
    
    		$updateRes = $this->reception->addline(
    						$request_data->desc,
    						$request_data->subprice,
    						$request_data->qty,
    						$request_data->tva_tx,
    						$request_data->localtax1_tx,
    						$request_data->localtax2_tx,
    						$request_data->fk_product,
    						$request_data->remise_percent,
    						$request_data->info_bits,
    						$request_data->fk_remise_except,
    						'HT',
    						0,
    						$request_data->date_start,
    						$request_data->date_end,
    						$request_data->product_type,
    						$request_data->rang,
    						$request_data->special_code,
    						$fk_parent_line,
    						$request_data->fk_fournprice,
    						$request_data->pa_ht,
    						$request_data->label,
    						$request_data->array_options,
    						$request_data->fk_unit,
    						$request_data->origin,
    						$request_data->origin_id,
    						$request_data->multicurrency_subprice
    		);
    
    		if ($updateRes > 0) {
    			return $updateRes;
    
    		}
    		return false;
    	}*/
    // /**
    //  * Update a line to given reception
    //  *
    //  * @param int   $id             Id of reception to update
    //  * @param int   $lineid         Id of line to update
    //  * @param array $request_data   ShipmentLine data
    //  *
    //  * @url	PUT {id}/lines/{lineid}
    //  *
    //  * @return object
    //  */
    /*
    	public function putLine($id, $lineid, $request_data = null)
    	{
    		if (! DolibarrApiAccess::$user->rights->reception->creer) {
    			throw new RestException(401);
    		}
    
    		$result = $this->reception->fetch($id);
    		if ( ! $result ) {
    			throw new RestException(404, 'Reception not found');
    		}
    
    		if( ! DolibarrApi::_checkAccessToResource('reception',$this->reception->id)) {
    			throw new RestException(401, 'Access not allowed for login '.DolibarrApiAccess::$user->login);
    		}
    
    		$request_data = (object) $request_data;
    
    		$request_data->desc = sanitizeVal($request_data->desc, 'restricthtml');
    		$request_data->label = sanitizeVal($request_data->label);
    
    		$updateRes = $this->reception->updateline(
    						$lineid,
    						$request_data->desc,
    						$request_data->subprice,
    						$request_data->qty,
    						$request_data->remise_percent,
    						$request_data->tva_tx,
    						$request_data->localtax1_tx,
    						$request_data->localtax2_tx,
    						'HT',
    						$request_data->info_bits,
    						$request_data->date_start,
    						$request_data->date_end,
    						$request_data->product_type,
    						$request_data->fk_parent_line,
    						0,
    						$request_data->fk_fournprice,
    						$request_data->pa_ht,
    						$request_data->label,
    						$request_data->special_code,
    						$request_data->array_options,
    						$request_data->fk_unit,
    						$request_data->multicurrency_subprice
    		);
    
    		if ($updateRes > 0) {
    			$result = $this->get($id);
    			unset($result->line);
    			return $this->_cleanObjectDatas($result);
    		}
    		return false;
    	}*/
    /**
     * Delete a line to given reception
     *
     *
     * @param int   $id             Id of reception to update
     * @param int   $lineid         Id of line to delete
     *
     * @url	DELETE {id}/lines/{lineid}
     *
     * @return int
     *
     * @throws RestException 401
     * @throws RestException 404
     */
    public function deleteLine($id, $lineid)
    {
    }
    /**
     * Update reception general fields (won't touch lines of reception)
     *
     * @param int   $id             Id of reception to update
     * @param array $request_data   Datas
     *
     * @return int
     */
    public function put($id, $request_data = \null)
    {
    }
    /**
     * Delete reception
     *
     * @param   int     $id         Reception ID
     *
     * @return  array
     */
    public function delete($id)
    {
    }
    /**
     * Validate a reception
     *
     * This may record stock movements if module stock is enabled and option to
     * decrease stock on reception is on.
     *
     * @param   int $id             Reception ID
     * @param   int $notrigger      1=Does not execute triggers, 0= execute triggers
     *
     * @url POST    {id}/validate
     *
     * @return  array
     * \todo An error 403 is returned if the request has an empty body.
     * Error message: "Forbidden: Content type `text/plain` is not supported."
     * Workaround: send this in the body
     * {
     *   "notrigger": 0
     * }
     */
    public function validate($id, $notrigger = 0)
    {
    }
    // /**
    //  *  Classify the reception as invoiced
    //  *
    //  * @param int   $id           Id of the reception
    //  *
    //  * @url     POST {id}/setinvoiced
    //  *
    //  * @return int
    //  *
    //  * @throws RestException 400
    //  * @throws RestException 401
    //  * @throws RestException 404
    //  * @throws RestException 405
    //  */
    /*
    public function setinvoiced($id)
    {
    
    	if(! DolibarrApiAccess::$user->rights->reception->creer) {
    			throw new RestException(401);
    	}
    	if(empty($id)) {
    			throw new RestException(400, 'Reception ID is mandatory');
    	}
    	$result = $this->reception->fetch($id);
    	if( ! $result ) {
    			throw new RestException(404, 'Reception not found');
    	}
    
    	$result = $this->reception->classifyBilled(DolibarrApiAccess::$user);
    	if( $result < 0) {
    			throw new RestException(400, $this->reception->error);
    	}
    	return $result;
    }
    */
    //  /**
    //  * Create a reception using an existing order.
    //  *
    //  * @param int   $orderid       Id of the order
    //  *
    //  * @url     POST /createfromorder/{orderid}
    //  *
    //  * @return int
    //  * @throws RestException 400
    //  * @throws RestException 401
    //  * @throws RestException 404
    //  * @throws RestException 405
    //  */
    /*
    public function createShipmentFromOrder($orderid)
    {
    
    	require_once DOL_DOCUMENT_ROOT . '/commande/class/commande.class.php';
    
    	if(! DolibarrApiAccess::$user->rights->reception->lire) {
    			throw new RestException(401);
    	}
    	if(! DolibarrApiAccess::$user->rights->reception->creer) {
    			throw new RestException(401);
    	}
    	if(empty($proposalid)) {
    			throw new RestException(400, 'Order ID is mandatory');
    	}
    
    	$order = new Commande($this->db);
    	$result = $order->fetch($proposalid);
    	if( ! $result ) {
    			throw new RestException(404, 'Order not found');
    	}
    
    	$result = $this->reception->createFromOrder($order, DolibarrApiAccess::$user);
    	if( $result < 0) {
    			throw new RestException(405, $this->reception->error);
    	}
    	$this->reception->fetchObjectLinked();
    	return $this->_cleanObjectDatas($this->reception);
    }
    */
    /**
     * Close a reception (Classify it as "Delivered")
     *
     * @param   int     $id             Reception ID
     * @param   int     $notrigger      Disabled triggers
     *
     * @url POST    {id}/close
     *
     * @return  int
     */
    public function close($id, $notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     * Clean sensible object datas
     *
     * @param   Object  $object     Object to clean
     * @return  Object              Object with cleaned properties
     */
    protected function _cleanObjectDatas($object)
    {
    }
    /**
     * Validate fields before create or update object
     *
     * @param   array           $data   Array with data to verify
     * @return  array
     * @throws  RestException
     */
    private function _validate($data)
    {
    }
}
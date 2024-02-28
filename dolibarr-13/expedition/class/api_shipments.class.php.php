<?php

/**
 * API class for shipments
 *
 * @access protected
 * @class  DolibarrApiAccess {@requires user,external}
 */
class Shipments extends \DolibarrApi
{
    /**
     * @var array   $FIELDS     Mandatory fields, checked when create and update object
     */
    static $FIELDS = array('socid', 'origin_id', 'origin_type');
    /**
     * @var Expedition $shipment {@type Expedition}
     */
    public $shipment;
    /**
     * Constructor
     */
    public function __construct()
    {
    }
    /**
     * Get properties of a shipment object
     *
     * Return an array with shipment informations
     *
     * @param       int         $id         ID of shipment
     * @return 	array|mixed data without useless information
     *
     * @throws 	RestException
     */
    public function get($id)
    {
    }
    /**
     * List shipments
     *
     * Get a list of shipments
     *
     * @param string	       $sortfield	        Sort field
     * @param string	       $sortorder	        Sort order
     * @param int		       $limit		        Limit for list
     * @param int		       $page		        Page number
     * @param string   	       $thirdparty_ids	    Thirdparty ids to filter shipments of (example '1' or '1,2,3') {@pattern /^[0-9,]*$/i}
     * @param string           $sqlfilters          Other criteria to filter answers separated by a comma. Syntax example "(t.ref:like:'SO-%') and (t.date_creation:<:'20160101')"
     * @return  array                               Array of shipment objects
     *
     * @throws RestException
     */
    public function index($sortfield = "t.rowid", $sortorder = 'ASC', $limit = 100, $page = 0, $thirdparty_ids = '', $sqlfilters = '')
    {
    }
    /**
     * Create shipment object
     *
     * @param   array   $request_data   Request data
     * @return  int     ID of shipment
     */
    public function post($request_data = \null)
    {
    }
    // /**
    //  * Get lines of an shipment
    //  *
    //  * @param int   $id             Id of shipment
    //  *
    //  * @url	GET {id}/lines
    //  *
    //  * @return int
    //  */
    /*
    public function getLines($id)
    {
        if(! DolibarrApiAccess::$user->rights->expedition->lire) {
            throw new RestException(401);
        }
    
        $result = $this->shipment->fetch($id);
        if( ! $result ) {
            throw new RestException(404, 'Shipment not found');
        }
    
        if( ! DolibarrApi::_checkAccessToResource('expedition',$this->shipment->id)) {
            throw new RestException(401, 'Access not allowed for login '.DolibarrApiAccess::$user->login);
        }
        $this->shipment->getLinesArray();
        $result = array();
        foreach ($this->shipment->lines as $line) {
            array_push($result,$this->_cleanObjectDatas($line));
        }
        return $result;
    }
    */
    // /**
    //  * Add a line to given shipment
    //  *
    //  * @param int   $id             Id of shipment to update
    //  * @param array $request_data   ShipmentLine data
    //  *
    //  * @url	POST {id}/lines
    //  *
    //  * @return int
    //  */
    /*
        public function postLine($id, $request_data = null)
        {
            if(! DolibarrApiAccess::$user->rights->expedition->creer) {
                throw new RestException(401);
            }
    
            $result = $this->shipment->fetch($id);
            if ( ! $result ) {
                throw new RestException(404, 'Shipment not found');
            }
    
            if( ! DolibarrApi::_checkAccessToResource('expedition',$this->shipment->id)) {
                throw new RestException(401, 'Access not allowed for login '.DolibarrApiAccess::$user->login);
            }
            $request_data = (object) $request_data;
            $updateRes = $this->shipment->addline(
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
    //  * Update a line to given shipment
    //  *
    //  * @param int   $id             Id of shipment to update
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
            if (! DolibarrApiAccess::$user->rights->expedition->creer) {
                throw new RestException(401);
            }
    
            $result = $this->shipment->fetch($id);
            if ( ! $result ) {
                throw new RestException(404, 'Shipment not found');
            }
    
            if( ! DolibarrApi::_checkAccessToResource('expedition',$this->shipment->id)) {
                throw new RestException(401, 'Access not allowed for login '.DolibarrApiAccess::$user->login);
            }
            $request_data = (object) $request_data;
            $updateRes = $this->shipment->updateline(
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
     * Delete a line to given shipment
     *
     *
     * @param int   $id             Id of shipment to update
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
     * Update shipment general fields (won't touch lines of shipment)
     *
     * @param int   $id             Id of shipment to update
     * @param array $request_data   Datas
     *
     * @return int
     */
    public function put($id, $request_data = \null)
    {
    }
    /**
     * Delete shipment
     *
     * @param   int     $id         Shipment ID
     *
     * @return  array
     */
    public function delete($id)
    {
    }
    /**
     * Validate a shipment
     *
     * This may record stock movements if module stock is enabled and option to
     * decrease stock on shipment is on.
     *
     * @param   int $id             Shipment ID
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
    //  *  Classify the shipment as invoiced
    //  *
    //  * @param int   $id           Id of the shipment
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
    
        if(! DolibarrApiAccess::$user->rights->expedition->creer) {
                throw new RestException(401);
        }
        if(empty($id)) {
                throw new RestException(400, 'Shipment ID is mandatory');
        }
        $result = $this->shipment->fetch($id);
        if( ! $result ) {
                throw new RestException(404, 'Shipment not found');
        }
    
        $result = $this->shipment->classifyBilled(DolibarrApiAccess::$user);
        if( $result < 0) {
                throw new RestException(400, $this->shipment->error);
        }
        return $result;
    }
    */
    //  /**
    //  * Create a shipment using an existing order.
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
    
        if(! DolibarrApiAccess::$user->rights->expedition->lire) {
                throw new RestException(401);
        }
        if(! DolibarrApiAccess::$user->rights->expedition->creer) {
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
    
        $result = $this->shipment->createFromOrder($order, DolibarrApiAccess::$user);
        if( $result < 0) {
                throw new RestException(405, $this->shipment->error);
        }
        $this->shipment->fetchObjectLinked();
        return $this->_cleanObjectDatas($this->shipment);
    }
    */
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
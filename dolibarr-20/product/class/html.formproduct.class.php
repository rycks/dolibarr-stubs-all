<?php

/**
 *	Class with static methods for building HTML components related to products
 *	Only components common to products and services must be here.
 */
class FormProduct
{
    /**
     * @var DoliDB Database handler.
     */
    public $db;
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    // Cache arrays
    public $cache_warehouses = array();
    public $cache_lot = array();
    public $cache_workstations = array();
    /**
     *  Constructor
     *
     *  @param  DoliDB  $db     Database handler
     */
    public function __construct($db)
    {
    }
    /**
     * Load in cache array list of warehouses
     * If fk_product is not 0, we do not use cache
     *
     * @param	int		    $fk_product			Add quantity of stock in label for product with id fk_product. Nothing if 0.
     * @param	string	    $batch				Add quantity of batch stock in label for product with batch name batch, batch name precedes batch_id. Nothing if ''.
     * @param	string	    $status				warehouse status filter, following comma separated filter options can be used
     *                      				    'warehouseopen' = select products from open warehouses,
     *                      				    'warehouseclosed' = select products from closed warehouses,
     *                      				    'warehouseinternal' = select products from warehouses for internal correct/transfer only
     * @param	boolean	    $sumStock		    sum total stock of a warehouse, default true
     * @param	array       $exclude            warehouses ids to exclude
     * @param   bool|int    $stockMin           [=false] Value of minimum stock to filter (only warehouse with stock > stockMin are loaded) or false not not filter by minimum stock
     * @param   string      $orderBy            [='e.ref'] Order by
     * @return  int                             Nb of loaded lines, 0 if already loaded, <0 if KO
     * @throws  Exception
     */
    public function loadWarehouses($fk_product = 0, $batch = '', $status = '', $sumStock = \true, $exclude = array(), $stockMin = \false, $orderBy = 'e.ref')
    {
    }
    /**
     * Load in cache array list of workstations
     * If fk_product is not 0, we do not use cache
     *
     * @param	int		    $fk_product			Add quantity of stock in label for product with id fk_product. Nothing if 0.
     * @param	array       $exclude            warehouses ids to exclude
     * @param   string      $orderBy            [='e.ref'] Order by
     * @return  int                             Nb of loaded lines, 0 if already loaded, <0 if KO
     * @throws  Exception
     */
    public function loadWorkstations($fk_product = 0, $exclude = array(), $orderBy = 'w.ref')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Return full path to current warehouse in $tab (recursive function)
     *
     * @param	array	$tab			warehouse data in $this->cache_warehouses line
     * @param	string	$final_label	full label with all parents, separated by ' >> ' (completed on each call)
     * @return	string					full label with all parents, separated by ' >> '
     */
    private function get_parent_path($tab, $final_label = '')
    {
    }
    /**
     *  Return list of warehouses
     *
     *  @param  string|int|array  $selected     Id of preselected warehouse ('' or '-1' for no value, 'ifone' and 'ifonenodefault' = select value if one value otherwise no value, '-2' to use the default value from setup)
     *  @param  string      $htmlname           Name of html select html
     *  @param  string      $filterstatus       warehouse status filter, following comma separated filter options can be used
     *                                          'warehouseopen' = select products from open warehouses,
     *                                          'warehouseclosed' = select products from closed warehouses,
     *                                          'warehouseinternal' = select products from warehouses for internal correct/transfer only
     *  @param  int		    $empty			    1=Can be empty, 0 if not
     * 	@param	int		    $disabled		    1=Select is disabled
     * 	@param	int		    $fk_product		    Add quantity of stock in label for product with id fk_product. Nothing if 0.
     *  @param	string	    $empty_label	    Empty label if needed (only if $empty=1)
     *  @param	int		    $showstock		    1=Show stock count
     *  @param	int	    	$forcecombo		    1=Force combo iso ajax select2
     *  @param	array	    $events			    Events to add to select2
     *  @param  string      $morecss            Add more css classes to HTML select
     *  @param	array	    $exclude            Warehouses ids to exclude
     *  @param  int         $showfullpath       1=Show full path of name (parent ref into label), 0=Show only ref of current warehouse
     *  @param  bool|int    $stockMin           [=false] Value of minimum stock to filter (only warehouse with stock > stockMin are loaded) or false not not filter by minimum stock
     *  @param  string      $orderBy            [='e.ref'] Order by
     *  @param	int			$multiselect		1=Allow multiselect
     * 	@return string					        HTML select
     *
     *  @throws Exception
     */
    public function selectWarehouses($selected = '', $htmlname = 'idwarehouse', $filterstatus = '', $empty = 0, $disabled = 0, $fk_product = 0, $empty_label = '', $showstock = 0, $forcecombo = 0, $events = array(), $morecss = 'minwidth200', $exclude = array(), $showfullpath = 1, $stockMin = \false, $orderBy = 'e.ref', $multiselect = 0)
    {
    }
    /**
     *  Return list of workstations
     *
     *  @param  string|int  $selected           Id of preselected warehouse ('' or '-1' for no value, 'ifone' and 'ifonenodefault' = select value if one value otherwise no value, '-2' to use the default value from setup)
     *  @param  string      $htmlname           Name of html select html
     *  @param  int		    $empty			    1=Can be empty, 0 if not
     * 	@param	int		    $disabled		    1=Select is disabled
     * 	@param	int		    $fk_product		    Add quantity of stock in label for product with id fk_product. Nothing if 0.
     *  @param	string	    $empty_label	    Empty label if needed (only if $empty=1)
     *  @param	int	    	$forcecombo		    1=Force combo iso ajax select2
     *  @param	array	    $events			            Events to add to select2
     *  @param  string      $morecss                    Add more css classes to HTML select
     *  @param	array	    $exclude            Warehouses ids to exclude
     *  @param  int         $showfullpath       1=Show full path of name (parent ref into label), 0=Show only ref of current warehouse
     *  @param  string      $orderBy            [='e.ref'] Order by
     * 	@return string					        HTML select
     *
     *  @throws Exception
     */
    public function selectWorkstations($selected = '', $htmlname = 'idworkstations', $empty = 0, $disabled = 0, $fk_product = 0, $empty_label = '', $forcecombo = 0, $events = array(), $morecss = 'minwidth200', $exclude = array(), $showfullpath = 1, $orderBy = 'e.ref')
    {
    }
    /**
     *    Display form to select warehouse
     *
     *    @param    string      $page        Page
     *    @param    string|int  $selected    Id of warehouse
     *    @param    string      $htmlname    Name of select html field
     *    @param    int         $addempty    1=Add an empty value in list, 2=Add an empty value in list only if there is more than 2 entries.
     *    @return   void
     */
    public function formSelectWarehouses($page, $selected = '', $htmlname = 'warehouse_id', $addempty = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Output a combo box with list of units
     *  Currently the units are not define in the DB
     *
     *  @param	string		$name               Name of HTML field
     *  @param	string		$measuring_style    Unit to show: weight, size, surface, volume, time
     *  @param  string		$selected            Preselected value
     * 	@param	int			$adddefault			Add empty unit called "Default"
     *  @param  int         $mode               1=Use short label as value, 0=Use rowid
     * 	@return	void
     *  @deprecated
     */
    public function select_measuring_units($name = 'measuring_units', $measuring_style = '', $selected = '0', $adddefault = 0, $mode = 0)
    {
    }
    /**
     *  Return a combo box with list of units
     *  Units labels are defined in llx_c_units
     *
     *  @param  string		$name                Name of HTML field
     *  @param  string		$measuring_style     Unit to show: weight, size, surface, volume, time
     *  @param  string		$selected            Preselected value
     *  @param  int|string	$adddefault			 1=Add empty unit called "Default", ''=Add empty value
     *  @param  int         $mode                1=Use short label as value, 0=Use rowid, 2=Use scale (power)
     *  @param	string		$morecss			 More CSS
     *  @return string|-1
     */
    public function selectMeasuringUnits($name = 'measuring_units', $measuring_style = '', $selected = '0', $adddefault = 0, $mode = 0, $morecss = 'maxwidth125')
    {
    }
    /**
     *  Return a combo box with list of units
     *  NAture of product labels are defined in llx_c_product_nature
     *
     *  @param  string		$name                Name of HTML field
     *  @param  string		$selected             Preselected value
     *  @param  int         $mode                1=Use label as value, 0=Use code
     *  @param  int         $showempty           1=show empty value, 0= no
     *  @return string|int
     */
    public function selectProductNature($name = 'finished', $selected = '', $mode = 0, $showempty = 1)
    {
    }
    /**
     *  Return list of lot numbers (stock from product_batch) with stock location and stock qty
     *
     *  @param	string|int	$selected	Id of preselected lot stock id ('' for no value, 'ifone'=select value if one value otherwise no value)
     *  @param  string	$htmlname		Name of html select html
     *  @param  string	$filterstatus	lot status filter, following comma separated filter options can be used
     *  @param  int		$empty			1=Can be empty, 0 if not
     * 	@param	int		$disabled		1=Select is disabled
     * 	@param	int		$fk_product		show lot numbers of product with id fk_product. All from objectLines if 0.
     * 	@param	int		$fk_entrepot	filter lot numbers for warehouse with id fk_entrepot. All if 0.
     * 	@param	array	$objectLines	Only cache lot numbers for products in lines of object. If no lines only for fk_product. If no fk_product, all.
     *  @param	string	$empty_label	Empty label if needed (only if $empty=1)
     *  @param	int		$forcecombo		1=Force combo iso ajax select2
     *  @param	array	$events			Events to add to select2
     *  @param  string  $morecss		Add more css classes to HTML select
     *
     * 	@return	string					HTML select
     */
    public function selectLotStock($selected = '', $htmlname = 'batch_id', $filterstatus = '', $empty = 0, $disabled = 0, $fk_product = 0, $fk_entrepot = 0, $objectLines = array(), $empty_label = '', $forcecombo = 0, $events = array(), $morecss = 'minwidth200')
    {
    }
    /**
     *  Return list of lot numbers (stock from product_batch) for product and warehouse.
     *
     *  @param  string	$htmlname		Name of key that is inside attribute "list" of an input text field.
     *  @param  int		$empty			1=Can be empty, 0 if not
     *  @param	int		$fk_product		show lot numbers of product with id fk_product. All from objectLines if 0.
     *  @param	int		$fk_entrepot	filter lot numbers for warehouse with id fk_entrepot. All if 0.
     *  @param	array	$objectLines	Only cache lot numbers for products in lines of object. If no lines only for fk_product. If no fk_product, all.
     *  @return	string					HTML datalist
     */
    public function selectLotDataList($htmlname = 'batch_id', $empty = 0, $fk_product = 0, $fk_entrepot = 0, $objectLines = array())
    {
    }
    /**
     * Load in cache array list of lot available in stock from a given list of products
     *
     * @param	array	$productIdArray		array of product id's from who to get lot numbers. A
     *
     * @return	int							Nb of loaded lines, 0 if nothing loaded, <0 if KO
     */
    private function loadLotStock($productIdArray = array())
    {
    }
}
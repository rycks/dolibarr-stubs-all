<?php

/**
 *	Class of dictionary of nature of product (used by imports)
 */
class CProductNature extends \CommonDict
{
    /**
     * @var array record
     */
    public $records = array();
    /**
     * @var string element
     */
    public $element = 'cproductnbature';
    /**
     * @var string table element
     */
    public $table_element = 'c_product_nature';
    /**
     *  Constructor
     *
     *  @param      DoliDB		$db      Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *  Create object into database
     *
     *  @param      User	$user        User that create
     *  @param      int		$notrigger   0=launch triggers after, 1=disable triggers
     *  @return     int      		   	 Return integer <0 if KO, Id of created object if OK
     */
    public function create($user, $notrigger = 0)
    {
    }
    /**
     *  Load object in memory from database
     *
     *  @param      int		$id    			Id of CUnit object to fetch (rowid)
     *  @param		string	$code			Code
     *  @return     int						Return integer <0 if KO, >0 if OK
     */
    public function fetch($id, $code = '')
    {
    }
    /**
     * Load list of objects in memory from the database.
     *
     * @param  string      $sortorder    Sort Order
     * @param  string      $sortfield    Sort field
     * @param  int         $limit        Limit
     * @param  int         $offset       Offset
     * @param  string      $filter       Filter USF
     * @param  string      $filtermode   Filter mode (AND or OR)
     * @return array|int                 int <0 if KO, array of pages if OK
     */
    public function fetchAll($sortorder = '', $sortfield = '', $limit = 0, $offset = 0, $filter = '', $filtermode = 'AND')
    {
    }
    /**
     *  Update object into database
     *
     *  @param      User	$user        User that modify
     *  @param      int		$notrigger	 0=launch triggers after, 1=disable triggers
     *  @return     int     		   	 Return integer <0 if KO, >0 if OK
     */
    public function update($user = \null, $notrigger = 0)
    {
    }
    /**
     *  Delete object in database
     *
     *	@param  User	$user        User that delete
     *  @param  int		$notrigger	 0=launch triggers after, 1=disable triggers
     *  @return	int					 Return integer <0 if KO, >0 if OK
     */
    public function delete($user, $notrigger = 0)
    {
    }
    /**
     * Get unit from code
     * @param int $code code of unit
     * @param string $mode 0= id , short_label=Use short label as value, code=use code
     * @return int            Return integer <0 if KO, Id of code if OK
     */
    public function getProductNatureFromCode($code, $mode = 'code')
    {
    }
}
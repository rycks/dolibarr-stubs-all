<?php

/**
 *	Put here description of your class
 */
class Propalmergepdfproduct extends \CommonObject
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'propal_merge_pdf_product';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'propal_merge_pdf_product';
    public $fk_product;
    public $file_name;
    public $fk_user_author;
    public $fk_user_mod;
    public $datec = '';
    public $tms = '';
    public $lang;
    public $lines = array();
    /**
     *  Constructor
     *
     *  @param	DoliDb		$db      Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *  Create object into database
     *
     *  @param	User	$user        User that creates
     *  @param  int		$notrigger   0=launch triggers after, 1=disable triggers
     *  @return int      		   	 Return integer <0 if KO, Id of created object if OK
     */
    public function create($user, $notrigger = 0)
    {
    }
    /**
     *  Load object in memory from the database
     *
     *  @param	int		$id    Id object
     *  @return int          	Return integer <0 if KO, >0 if OK
     */
    public function fetch($id)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Load object in memory from the database
     *
     *  @param	int		$product_id    	Id object
     *  @param	string	$lang  			Lang string code
     *  @return int          	Return integer <0 if KO, >0 if OK
     */
    public function fetch_by_product($product_id, $lang = '')
    {
    }
    /**
     *  Update object into database
     *
     *  @param	User	$user        User that modifies
     *  @param  int		$notrigger	 0=launch triggers after, 1=disable triggers
     *  @return int     		   	 Return integer <0 if KO, >0 if OK
     */
    public function update($user = 0, $notrigger = 0)
    {
    }
    /**
     *  Delete object in database
     *
     *	@param  User	$user        User that deletes
     *  @param  int		$notrigger	 0=launch triggers after, 1=disable triggers
     *  @return	int					 Return integer <0 if KO, >0 if OK
     */
    public function delete($user, $notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Delete object in database
     *
     *	@param  User	$user        User that deletes
     *	@param  int		$product_id	 product_id
     *  @param  string	$lang_id	 language
     *  @param  int		$notrigger	 0=launch triggers after, 1=disable triggers
     *  @return	int					 Return integer <0 if KO, >0 if OK
     */
    public function delete_by_product($user, $product_id, $lang_id = '', $notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Delete object in database
     *
     *	@param  User	$user        User that deletes
     *  @return	int					 Return integer <0 if KO, >0 if OK
     */
    public function delete_by_file($user)
    {
    }
    /**
     *	Load an object from its id and create a new one in database
     *
     *  @param	User	$user		User making the clone
     *	@param	int		$fromid     Id of object to clone
     * 	@return	int					New id of clone
     */
    public function createFromClone(\User $user, $fromid)
    {
    }
    /**
     *	Initialise object with example values
     *	Id must be 0 if object instance is a specimen
     *
     *	@return	void
     */
    public function initAsSpecimen()
    {
    }
}
/**
 * Class to manage propal merge of product line
 */
class PropalmergepdfproductLine
{
    /**
     * @var int ID
     */
    public $id;
    /**
     * @var int ID
     */
    public $fk_product;
    public $file_name;
    public $lang;
    /**
     * @var int ID
     */
    public $fk_user_author;
    /**
     * @var int ID
     */
    public $fk_user_mod;
    public $datec = '';
    public $tms = '';
    public $import_key;
    /**
     *  Constructor
     */
    public function __construct()
    {
    }
}
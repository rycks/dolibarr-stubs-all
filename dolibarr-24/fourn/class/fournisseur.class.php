<?php

/**
 * 	Class to manage suppliers
 */
class Fournisseur extends \Societe
{
    public $next_prev_filter = "(te.fournisseur:=:1)";
    // Used to add a filter in Form::showrefnav method
    /**
     *	Constructor
     *
     *  @param	DoliDB	$db		Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *    Load a third party from database into memory
     *
     *    @param	int		$rowid			Id of third party to load
     *    @param    string	$ref			Reference of third party, name (Warning, this can return several records)
     *    @param    string	$ref_ext       	External reference of third party (Warning, this information is a free field not provided by Dolibarr)
     *    @param    string	$barcode       	Barcode of third party to load
     *    @param    string	$idprof1		Prof id 1 of third party (Warning, this can return several records)
     *    @param    string	$idprof2		Prof id 2 of third party (Warning, this can return several records)
     *    @param    string	$idprof3		Prof id 3 of third party (Warning, this can return several records)
     *    @param    string	$idprof4		Prof id 4 of third party (Warning, this can return several records)
     *    @param    string	$idprof5		Prof id 5 of third party (Warning, this can return several records)
     *    @param    string	$idprof6		Prof id 6 of third party (Warning, this can return several records)
     *    @param    string	$email   		Email of third party (Warning, this can return several records)
     *    @param    string	$ref_alias 		Name_alias of third party (Warning, this can return several records)
     * 	  @param	int		$is_client		Is the thirdparty a client ?
     *    @param	int		$is_supplier	Is the thirdparty a supplier ?
     *    @return   int						>0 if OK, <0 if KO or if two records found for same ref or idprof, 0 if not found.
     */
    public function fetch($rowid, $ref = '', $ref_ext = '', $barcode = '', $idprof1 = '', $idprof2 = '', $idprof3 = '', $idprof4 = '', $idprof5 = '', $idprof6 = '', $email = '', $ref_alias = '', $is_client = 0, $is_supplier = 1)
    {
    }
    /**
     * Return nb of orders
     *
     * @return 	int		Nb of orders for current supplier
     */
    public function getNbOfOrders()
    {
    }
    /**
     * Returns number of ref prices (not number of products) for current supplier
     *
     * @return	int		Nb of ref prices, or <0 if error
     */
    public function nbOfProductRefs()
    {
    }
    /**
     * Load statistics indicators
     *
     * @return     int         Return integer <0 if KO, >0 if OK
     */
    public function loadStateBoard()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Create a supplier category
     *
     *  @param      User	$user       User asking creation
     *	@param		string	$name		Category name
     *  @return     int         		Return integer <0 if KO, 0 if OK
     */
    public function CreateCategory($user, $name)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * 	Return the suppliers list
     *
     *	@return		array<int,string>	Array of suppliers
     */
    public function ListArray()
    {
    }
    /**
     * Function used to replace a thirdparty id with another one.
     *
     * @param 	DoliDB 	$dbs 		Database handler, because function is static we name it $dbs not $db to avoid breaking coding test
     * @param 	int 	$origin_id 	Old thirdparty id
     * @param 	int 	$dest_id 	New thirdparty id
     * @return 	bool
     */
    public static function replaceThirdparty(\DoliDB $dbs, $origin_id, $dest_id)
    {
    }
}
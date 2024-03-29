<?php

/**
 * 	Class to manage suppliers
 */
class Fournisseur extends \Societe
{
    public $next_prev_filter = "te.fournisseur = 1";
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
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Load statistics indicators
     *
     * @return     int         Return integer <0 if KO, >0 if OK
     */
    public function load_state_board()
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
     *	@return		array		Array of suppliers
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
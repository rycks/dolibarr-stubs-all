<?php

/**
 *	Class to manage customers or prospects
 */
class Client extends \Societe
{
    /**
     * @var string Used to add a filter in Form::showrefnav method
     */
    public $next_prev_filter = "te.client:in:1,2,3";
    /**
     * @var array<int,array{id:int,code:string,label:string,picto:string}>
     */
    public $cacheprospectstatus = array();
    /**
     *  Constructor
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
    public function fetch($rowid, $ref = '', $ref_ext = '', $barcode = '', $idprof1 = '', $idprof2 = '', $idprof3 = '', $idprof4 = '', $idprof5 = '', $idprof6 = '', $email = '', $ref_alias = '', $is_client = 1, $is_supplier = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Load indicators into this->nb for board
     *
     *  @return     int         Return integer <0 if KO, >0 if OK
     */
    public function loadStateBoard()
    {
    }
    /**
     *  Load array of prospect status
     *
     *  @param	int		$active     1=Active only, 0=Not active only, -1=All
     *  @return int					Return integer <0 if KO, >0 if OK
     */
    public function loadCacheOfProspStatus($active = 1)
    {
    }
}
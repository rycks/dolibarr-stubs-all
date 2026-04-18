<?php

/**
 * \file    compta/paiement/class/api_paiement.class.php
 * \ingroup paiement
 * \brief   File for API management of paiement.
 */
/**
 * API class for paiement
 *
 * @access protected
 * @class  DolibarrApiAccess {@requires user,external}
 */
class Paiements extends \DolibarrApi
{
    /**
     * @var Paiement {@type Paiement}
     */
    public $paiement;
    /**
     * Constructor
     *
     * @url     GET /
     */
    public function __construct()
    {
    }
    /* BEGIN MODULEBUILDER API PAIEMENT */
    /**
     * Get properties of a paiement object
     *
     * Return an array with paiement information
     *
     * @param	int		$id				ID of paiement
     * @return  Object					Object with cleaned properties
     * @phan-return	Paiement			Object with cleaned properties
     * @phpstan-return	Paiement			Object with cleaned properties
     *
     * @phan-return  Paiement
     *
     *
     * @throws RestException 403 Not allowed
     * @throws RestException 404 Not found
     */
    public function get($id)
    {
    }
    /**
     * List paiements
     *
     * Get a list of paiements
     *
     * @param string		   $sortfield			Sort field
     * @param string		   $sortorder			Sort order
     * @param int			   $limit				Limit for list
     * @param int			   $page				Page number
     * @param string           $sqlfilters          Other criteria to filter answers separated by a comma. Syntax example "(t.ref:like:'SO-%') and (t.date_creation:<:'20160101')"
     * @param string		   $properties			Restrict the data returned to these properties. Ignored if empty. Comma separated list of properties names
     * @return  array                               Array of paiements objects
     * @phan-return array<int,Paiement>
     * @phpstan-return array<int,Paiement>
     *
     * @throws RestException 403 Not allowed
     * @throws RestException 503 System error
     *
     */
    public function index($sortfield = "t.rowid", $sortorder = 'ASC', $limit = 100, $page = 0, $sqlfilters = '', $properties = '')
    {
    }
    /**
     * Update paiement
     *
     * @param 	int   		$id             Id of paiement to update
     * @param 	array 		$request_data   Data
     * @phan-param ?array<string,mixed>	$request_data
     * @phpstan-param ?array<string,mixed>	$request_data
     * @return 	Object						Object after update
     * @phan-return Paiement
     * @phpstan-return Paiement
     *
     * @throws RestException 403 Not allowed
     * @throws RestException 404 Not found
     * @throws RestException 500 System error
     *
     */
    public function put($id, $request_data = \null)
    {
    }
    /**
     * Delete paiement
     *
     * @param   int     $id   Paiement ID
     * @return  array
     * @phan-return array<string,array{code:int,message:string}>
     * @phpstan-return array<string,array{code:int,message:string}>
     *
     * @throws RestException 403 Not allowed
     * @throws RestException 404 Not found
     * @throws RestException 409 Nothing to do
     * @throws RestException 500 System error
     *
     */
    public function delete($id)
    {
    }
    /* END MODULEBUILDER API PAIEMENT */
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     * Clean sensitive object data fields
     * @phpstan-template T
     *
     * @param   Object  $object     Object to clean
     * @return  Object              Object with cleaned properties
     *
     * @phpstan-param T $object
     * @phpstan-return T
     */
    protected function _cleanObjectDatas($object)
    {
    }
}
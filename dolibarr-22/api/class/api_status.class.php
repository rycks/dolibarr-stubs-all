<?php

/**
 * API that gives the status of the Dolibarr instance.
 *
 * @access protected
 * @class  DolibarrApiAccess {@requires user,external}
 */
class Status extends \DolibarrApi
{
    /**
     * Constructor of the class
     */
    public function __construct()
    {
    }
    /**
     * Get status (Dolibarr version)
     *
     * @return array
     * @phan-return array{success:array{code:int,dolibarr_version:string,access_locked:string,environment?:string,timestamp_now_utc?:int,timestamp_php_tz?:string,date_tz?:string}}
     * @phpstan-return array{success:array{code:int,dolibarr_version:string,access_locked:string,environment?:string,timestamp_now_utc?:int,timestamp_php_tz?:string,date_tz?:string}}
     */
    public function index()
    {
    }
}
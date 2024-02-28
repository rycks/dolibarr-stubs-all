<?php

/**
 *	Class to manage customers or prospects
 */
class Client extends \Societe
{
    public $next_prev_filter = "te.client in (1,2,3)";
    // Used to add a filter in Form::showrefnav method
    public $cacheprospectstatus = array();
    /**
     *  Constructor
     *
     *  @param	DoliDB	$db		Database handler
     */
    public function __construct($db)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Load indicators into this->nb for board
     *
     *  @return     int         <0 if KO, >0 if OK
     */
    public function load_state_board()
    {
    }
    /**
     *  Load array of prospect status
     *
     *  @param	int		$active     1=Active only, 0=Not active only, -1=All
     *  @return int					<0 if KO, >0 if OK
     */
    public function loadCacheOfProspStatus($active = 1)
    {
    }
}
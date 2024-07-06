<?php

/**
 *	Class to manage links
 */
class Link extends \CommonObject
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'link';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'links';
    /**
     * @var int Entity
     */
    public $entity;
    public $datea;
    public $url;
    /**
     * @var string Links label
     */
    public $label;
    public $objecttype;
    public $objectid;
    /**
     *    Constructor
     *
     *    @param	DoliDB		$db		Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *    Create link in database
     *
     *    @param	User	$user       Object of user that ask creation
     *    @return   int         		>= 0 if OK, < 0 if KO
     */
    public function create(\User $user)
    {
    }
    /**
     *  Update parameters of third party
     *
     *  @param  User	$user            			User executing update
     *  @param  int		$call_trigger    			0=no, 1=yes
     *  @return int  			           			Return integer <0 if KO, >=0 if OK
     */
    public function update(\User $user, $call_trigger = 1)
    {
    }
    /**
     *  Loads all links from database
     *
     *  @param  array   $links      array of Link objects to fill
     *  @param  string  $objecttype type of the associated object in dolibarr
     *  @param  int     $objectid   id of the associated object in dolibarr
     *  @param  string  $sortfield  field used to sort
     *  @param  string  $sortorder  sort order
     *  @return int                 1 if ok, 0 if no records, -1 if error
     **/
    public function fetchAll(&$links, $objecttype, $objectid, $sortfield = \null, $sortorder = \null)
    {
    }
    /**
     *  Return nb of links
     *
     *  @param  DoliDB  $dbs		Database handler
     *  @param  string  $objecttype Type of the associated object in dolibarr
     *  @param  int     $objectid   Id of the associated object in dolibarr
     *  @return int                 Nb of links, -1 if error
     **/
    public static function count($dbs, $objecttype, $objectid)
    {
    }
    /**
     *  Loads a link from database
     *
     *  @param 	int		$rowid 		Id of link to load
     *  @return int 				1 if ok, 0 if no record found, -1 if error
     **/
    public function fetch($rowid = \null)
    {
    }
    /**
     *    Delete a link from database
     *
     *	  @param	User		$user		Object suer
     *    @return	int						Return integer <0 if KO, 0 if nothing done, >0 if OK
     */
    public function delete($user)
    {
    }
}
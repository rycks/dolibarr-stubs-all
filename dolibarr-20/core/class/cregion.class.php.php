<?php

/**
 * 	Class to manage dictionary Regions
 */
class Cregion extends \CommonDict
{
    //public $element = 'cregion'; //!< Id that identify managed objects
    //public $table_element = 'c_regions'; //!< Name of table without prefix where object is stored
    /**
     * @var int         The code of the region
     */
    public $code_region;
    /**
     * @var int         The ID of the country of the region
     */
    public $fk_pays;
    /**
     * @var string      The name of the region
     */
    public $name;
    /**
     * @var string      The reference of the "chef-lieu" of the region
     *                  A.k.a. the administrative headquarter of the region
     *                  (examples: HU33, PT9, 97601)
     */
    public $cheflieu;
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
     *  @param      int		        $id           Id object
     *  @param      int		        $code_region  Code
     *  @param      int	            $fk_pays      Country Id
     *  @return     int          	>0 if OK, 0 if not found, <0 if KO
     */
    public function fetch($id, $code_region = 0, $fk_pays = 0)
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
     *  @param	int		$notrigger	 0=launch triggers after, 1=disable triggers
     *  @return	int					 Return integer <0 if KO, >0 if OK
     */
    public function delete($user, $notrigger = 0)
    {
    }
    /**
     *  Return a link to the object card (with optionally the picto)
     *
     *	@param	int		$withpicto					Include picto in link (0=No picto, 1=Include picto into link, 2=Only picto)
     *	@param	string	$option						On what the link point to ('nolink', ...)
     *  @param	int  	$notooltip					1=Disable tooltip
     *  @param  string  $morecss            		Add more css on link
     *  @param  int     $save_lastsearch_value    	-1=Auto, 0=No save of lastsearch_values when clicking, 1=Save lastsearch_values whenclicking
     *	@return	string								String with URL
     */
    public function getNomUrl($withpicto = 0, $option = '', $notooltip = 0, $morecss = '', $save_lastsearch_value = -1)
    {
    }
}
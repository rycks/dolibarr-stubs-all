<?php

/**
 *  DAO Resource object
 */
class Dolresource extends \CommonObject
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'dolresource';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'resource';
    /**
     * @var string String with name of icon for myobject. Must be the part after the 'object_' into object_myobject.png
     */
    public $picto = 'resource';
    /**
     * @var int ID
     */
    public $fk_code_type_resource;
    public $type_label;
    /**
     * @var string description
     */
    public $description;
    public $fk_country;
    // Variable for a link of resource
    /**
     * @var int ID
     */
    public $resource_id;
    public $resource_type;
    public $element_id;
    public $element_type;
    public $busy;
    public $mandatory;
    public $fulldayevent;
    /**
     * @var int ID
     */
    public $fk_user_create;
    public $tms = '';
    /**
     * Used by fetch_element_resource() to return an object
     */
    public $objelement;
    /**
     * @var array	Cache of type of resources. TODO Use $conf->cache['type_of_resources'] instead
     */
    public $cache_code_type_resource = array();
    /**
     * @var Dolresource Clone of object before changing it
     */
    public $oldcopy;
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
     *  @param	User    $user        User that creates
     *  @param  int		$notrigger   0=launch triggers after, 1=disable triggers
     *  @return int      		   	 Return integer <0 if KO, Id of created object if OK
     */
    public function create($user, $notrigger = 0)
    {
    }
    /**
     *    Load object in memory from database
     *
     *    @param    int		$id     Id of object
     *    @param	string	$ref	Ref of object
     *    @return   int         	Return integer <0 if KO, >0 if OK
     */
    public function fetch($id, $ref = '')
    {
    }
    /**
     *  Update object into database
     *
     *  @param	User	$user        User that modifies
     *  @param  int		$notrigger	 0=launch triggers after, 1=disable triggers
     *  @return int     		   	 Return integer <0 if KO, >0 if OK
     */
    public function update($user = \null, $notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Load data of resource links in memory from database
     *
     *    @param      int	$id         Id of link element_resources
     *    @return     int         		Return integer <0 if KO, >0 if OK
     */
    public function fetch_element_resource($id)
    {
    }
    /**
     *    Delete a resource object
     *
     *    @param	int		$rowid			Id of resource line to delete
     *    @param	int		$notrigger		Disable all triggers
     *    @return   int						>0 if OK, <0 if KO
     */
    public function delete($rowid, $notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Load resource objects into $this->lines
     *
     *  @param	string		$sortorder    	sort order
     *  @param	string		$sortfield    	sort field
     *  @param	int			$limit		  	limit page
     *  @param	int			$offset    	  	page
     *  @param	array		$filter    	  	filter output
     *  @return int          				Return integer <0 if KO, Number of lines loaded if OK
     */
    public function fetchAll($sortorder, $sortfield, $limit, $offset, $filter = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Update element resource into database
     *
     *  @param	User	$user        User that modifies
     *  @param  int		$notrigger	 0=launch triggers after, 1=disable triggers
     *  @return int     		   	 Return integer <0 if KO, >0 if OK
     */
    public function update_element_resource($user = \null, $notrigger = 0)
    {
    }
    /**
     * Return an array with resources linked to the element
     *
     * @param string    $element        Element
     * @param int       $element_id     Id
     * @param string    $resource_type  Type
     * @return array                    Aray of resources
     */
    public function getElementResources($element, $element_id, $resource_type = '')
    {
    }
    /**
     *  Return an int number of resources linked to the element
     *
     *  @param		string	$element		Element type
     *  @param		int		$element_id		Element id
     *  @return     int						Nb of resources loaded
     */
    public function fetchElementResources($element, $element_id)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *      Load in cache resource type code (setup in dictionary)
     *
     *      @return     int             Number of lines loaded, 0 if already loaded, <0 if KO
     */
    public function load_cache_code_type_resource()
    {
    }
    /**
     * getTooltipContentArray
     *
     * @param array $params ex option, infologin
     * @since v18
     * @return array
     */
    public function getTooltipContentArray($params)
    {
    }
    /**
     *	Return clicable link of object (with eventually picto)
     *
     *	@param      int		$withpicto					Add picto into link
     *	@param      string	$option						Where point the link ('compta', 'expedition', 'document', ...)
     *	@param      string	$get_params    				Parametres added to url
     *	@param		int  	$notooltip					1=Disable tooltip
     *  @param  	string  $morecss                    Add more css on link
     *  @param  	int     $save_lastsearch_value      -1=Auto, 0=No save of lastsearch_values when clicking, 1=Save lastsearch_values whenclicking
     *	@return     string          					String with URL
     */
    public function getNomUrl($withpicto = 0, $option = '', $get_params = '', $notooltip = 0, $morecss = '', $save_lastsearch_value = -1)
    {
    }
    /**
     *  Return the label of the status
     *
     *  @param  int		$mode          0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 6=Long label + Picto
     *  @return	string 			       Label of status
     */
    public function getLibStatut($mode = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return the status
     *
     *  @param	int		$status        	Id status
     *  @param  int		$mode          	0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 5=Long label + Picto
     *  @return string 			       	Label of status
     */
    public static function LibStatut($status, $mode = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *      Charge indicateurs this->nb de tableau de bord
     *
     *      @return     int         Return integer <0 if KO, >0 if OK
     */
    public function load_state_board()
    {
    }
}
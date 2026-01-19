<?php

/**
 *  DAO Resource object
 */
class Dolresource extends \CommonObject
{
    use \CommonPeople;
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
     * @var string 		Description
     */
    public $description;
    /**
     * @var string		Phone number
     */
    public $phone;
    /**
     * @var ?int		Maximum users
     */
    public $max_users;
    /**
     * @var string ID
     */
    public $fk_code_type_resource;
    /**
     * @var ?string
     */
    public $type_label;
    /**
     * @var int resource ID
     * For resource-element link
     * @see updateElementResource()
     * @see fetchElementResource()
     */
    public $resource_id;
    /**
     * @var string resource type
     */
    public $resource_type;
    /**
     * @var int element ID
     * For resource-element link
     * @see updateElementResource()
     * @see fetchElementResource()
     */
    public $element_id;
    /**
     * @var string element type
     */
    public $element_type;
    /**
     * @var int
     */
    public $busy;
    /**
     * @var int
     */
    public $mandatory;
    /**
     * @var int
     */
    public $fulldayevent;
    /**
     * @var int ID
     */
    public $fk_user_create;
    /**
     * @var CommonObject	Used by fetchElementResource() to return an object
     */
    public $objelement;
    /**
     * @var array<int,array{code:string,label:string,active:int}>	Cache of type of resources. TODO Use $conf->cache['type_of_resources'] instead
     */
    public $cache_code_type_resource;
    /**
     *  Constructor
     *
     *  @param	DoliDB		$db      Database handler
     */
    public function __construct(\DoliDB $db)
    {
    }
    /**
     * Create object in database
     *
     * @param	User	$user		User that creates
     * @param	int		$no_trigger	0=launch triggers after, 1=disable triggers
     * @return	int					if KO: <0 || if OK: Id of created object
     */
    public function create(\User $user, int $no_trigger = 0)
    {
    }
    /**
     * Load object into memory from database
     *
     * @param	int		$id		Id of object
     * @param	string	$ref	Ref of object
     * @return	int				if KO: <0 || if OK: >0
     */
    public function fetch(int $id, string $ref = '')
    {
    }
    /**
     * Update object in database
     *
     * @param	?User		$user		User that modifies
     * @param	int<0,1>	$notrigger	0=launch triggers after, 1=disable triggers
     * @return	int						if KO: <0 || if OK: >0
     */
    public function update($user = \null, int $notrigger = 0)
    {
    }
    /**
     * Load data of resource links into memory from database
     *
     * @param	int		$id		Id of link element_resources
     * @return	int				if KO: <0 || if OK: >0
     */
    public function fetchElementResource(int $id)
    {
    }
    /**
     * Delete a resource object
     *
     * @param	User	$user			User making the change
     * @param	int		$notrigger		Disable all triggers
     * @return	int						if OK: >0 || if KO: <0
     */
    public function delete(\User $user, int $notrigger = 0)
    {
    }
    /**
     * Load resource objects into $this->lines
     *
     * @param	string			$sortorder		Sort order
     * @param	string			$sortfield		Sort field
     * @param	int				$limit			Limit page
     * @param	int				$offset			Offset page
     * @param	string|array<string,mixed>	$filter	Filter USF.
     * @return	int								If KO: <0 || if OK number of lines loaded
     */
    public function fetchAll(string $sortorder, string $sortfield, int $limit, int $offset, $filter = '')
    {
    }
    /**
     * Update element resource in database
     *
     * @param	?User		$user		User that modifies
     * @param	int<0,1>	$notrigger	0=launch triggers after, 1=disable triggers
     * @return	int						if KO: <0 || if OK: >0
     */
    public function updateElementResource($user = \null, int $notrigger = 0)
    {
    }
    /**
     * Return an array with resources linked to the element
     *
     * @param	string		$element			Element
     * @param	int			$element_id			Id
     * @param	string		$resource_type		Type
     * @return	array<array{rowid:int,resource_id:int,resource_type:string,busy:int<0,1>,mandatory:int<0,1>}>	Array of resources
     */
    public function getElementResources(string $element, int $element_id, string $resource_type = '')
    {
    }
    /**
     *  Return an int number of resources linked to the element
     *
     * @param	string	$elementType		Element type
     * @param	int		$elementId			Element id
     * @return	int							Nb of resources loaded
     */
    public function fetchElementResources(string $elementType, int $elementId)
    {
    }
    /**
     * Load in cache resource type code (setup in dictionary)
     *
     * @return		int		if KO: <0 || if already loaded: 0 || Number of lines loaded
     */
    public function loadCacheCodeTypeResource()
    {
    }
    /**
     * getTooltipContentArray
     * @param array<string,mixed> $params params to construct tooltip data
     * @since v18
     * @return array{picto?:string,ref?:string,refsupplier?:string,label?:string,date?:string,date_echeance?:string,amountht?:string,total_ht?:string,totaltva?:string,amountlt1?:string,amountlt2?:string,amountrevenustamp?:string,totalttc?:string}|array{optimize:string}
     */
    public function getTooltipContentArray($params)
    {
    }
    /**
     * Return clickable link of object (with optional picto)
     *
     *	@param		int		$withpicto					Add picto into link
     *	@param		string	$option						Where point the link ('compta', 'expedition', 'document', ...)
     *	@param		string	$get_params					Parameters added to url
     *	@param		int		$notooltip					1=Disable tooltip
     *  @param		string	$morecss                    Add more css on link
     *  @param		int		$save_lastsearch_value      -1=Auto, 0=No save of lastsearch_values when clicking, 1=Save lastsearch_values whenclicking
     *	@return		string								String with URL
     */
    public function getNomUrl($withpicto = 0, string $option = '', string $get_params = '', int $notooltip = 0, string $morecss = '', int $save_lastsearch_value = -1)
    {
    }
    /**
     * Get status label
     *
     * @param		int		$mode		0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 6=Long label + Picto
     * @return		string				Label of status
     */
    public function getLibStatut(int $mode = 0)
    {
    }
    /**
     * Get status
     *
     * @param	int		$status		Id status
     * @param	int		$mode 		0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 5=Long label + Picto
     * @return	string				Label of status
     */
    public static function getLibStatusLabel(int $status, int $mode = 0)
    {
    }
    /**
     * Load indicators this->nb for state board
     *
     * @return	int		if KO: <0 || if OK: >0
     */
    public function loadStateBoard()
    {
    }
}
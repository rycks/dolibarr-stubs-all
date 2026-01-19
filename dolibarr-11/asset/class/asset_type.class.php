<?php

/**
 *	Class to manage asset type
 */
class AssetType extends \CommonObject
{
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'asset_type';
    /**
     * @var string ID to identify managed object
     */
    public $element = 'asset_type';
    /**
     * @var string String with name of icon for myobject. Must be the part after the 'object_' into object_myobject.png
     */
    public $picto = 'invoice';
    /**
     * 0=No test on entity, 1=Test with field entity, 2=Test with link by societe
     * @var int
     */
    public $ismultientitymanaged = 1;
    /**
     * @var string Asset type label
     */
    public $label;
    /** @var string Accountancy code asset */
    public $accountancy_code_asset;
    /** @var string Accountancy code depreciation asset */
    public $accountancy_code_depreciation_asset;
    /** @var string Accountancy code depreciation expense */
    public $accountancy_code_depreciation_expense;
    /** @var string 	Public note */
    public $note;
    /** @var array Array of asset */
    public $asset = array();
    /**
     *	Constructor
     *
     *	@param 		DoliDB		$db		Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *  Fonction qui permet de creer le type d'immobilisation
     *
     *  @param	User		$user			User making creation
     *  @param	int			$notrigger		1=do not execute triggers, 0 otherwise
     *  @return	int							>0 if OK, < 0 if KO
     */
    public function create($user, $notrigger = 0)
    {
    }
    /**
     *  Met a jour en base donnees du type
     *
     *  @param	User		$user			Object user making change
     *  @param	int			$notrigger		1=do not execute triggers, 0 otherwise
     *  @return	int							>0 if OK, < 0 if KO
     */
    public function update($user, $notrigger = 0)
    {
    }
    /**
     *	Fonction qui permet de supprimer le status de l'adherent
     *
     *  @return		int					>0 if OK, 0 if not found, < 0 if KO
     */
    public function delete()
    {
    }
    /**
     *  Fonction qui permet de recuperer le status de l'immobilisation
     *
     *  @param 		int		$rowid			Id of member type to load
     *  @return		int						<0 if KO, >0 if OK
     */
    public function fetch($rowid)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return list of asset's type
     *
     *  @return 	array	List of types of members
     */
    public function liste_array()
    {
    }
    /**
     * 	Return array of Asset objects for asset type this->id (or all if this->id not defined)
     *
     * 	@param	string	$excludefilter		Filter to exclude
     *  @param	int		$mode				0=Return array of asset instance
     *  									1=Return array of asset instance without extra data
     *  									2=Return array of asset id only
     * 	@return	mixed						Array of asset or -1 on error
     */
    public function listAssetForAssetType($excludefilter = '', $mode = 0)
    {
    }
    /**
     *    	Return clicable name (with picto eventually)
     *
     *		@param		int		$withpicto		0=No picto, 1=Include picto into link, 2=Only picto
     *		@param		int		$maxlen			length max label
     *  	@param		int  	$notooltip		1=Disable tooltip
     *		@return		string					String with URL
     */
    public function getNomUrl($withpicto = 0, $maxlen = 0, $notooltip = 0)
    {
    }
    /**
     *  Initialise an instance with random values.
     *  Used to build previews or test instances.
     *	id must be 0 if object instance is a specimen.
     *
     *  @return	void
     */
    public function initAsSpecimen()
    {
    }
    /**
     *     getLibStatut
     *
     *     @return string     Return status of a type of asset
     */
    public function getLibStatut()
    {
    }
}
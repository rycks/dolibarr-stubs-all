<?php

/**
 * Class for AssetAccountancyCodes
 */
class AssetAccountancyCodes extends \CommonObject
{
    // TODO This class and table should not exists and should be properties of llx_asset_asset.
    /**
     * @var string 	Name of table without prefix where object is stored. This is also the key used for extrafields management (so extrafields know the link to the parent table).
     */
    public $table_element = 'asset_accountancy_codes_economic';
    /**
     * @var string    Field with ID of parent key if this object has a parent
     */
    public $fk_element = 'fk_asset';
    // BEGIN MODULEBUILDER PROPERTIES
    /**
     * @inheritdoc
     * Array with all fields and their property. Do not use it as a static var. It may be modified by constructor.
     */
    public $fields = array('rowid' => array('type' => 'integer', 'label' => 'TechnicalID', 'enabled' => 1, 'position' => 1, 'notnull' => 1, 'visible' => 0, 'noteditable' => 1, 'index' => 1, 'css' => 'left', 'comment' => 'Id'));
    /**
     * @var int ID
     */
    public $rowid;
    // END MODULEBUILDER PROPERTIES
    /**
     * @var array<string,array<string,string|array<string,array{label:string,columnbreak?:bool}>>>  Array with all accountancy codes info by mode.
     *  Note : 'economic' mode is mandatory and is the primary accountancy codes
     *         'depreciation_asset' and 'depreciation_expense' is mandatory and is used for write depreciation in bookkeeping
     */
    public $accountancy_codes_fields = array('economic' => array('label' => 'AssetAccountancyCodeDepreciationEconomic', 'table' => 'asset_accountancy_codes_economic', 'depreciation_debit' => 'depreciation_expense', 'depreciation_credit' => 'depreciation_asset', 'fields' => array('asset' => array('label' => 'AssetAccountancyCodeAsset'), 'depreciation_asset' => array('label' => 'AssetAccountancyCodeDepreciationAsset'), 'depreciation_expense' => array('label' => 'AssetAccountancyCodeDepreciationExpense'), 'value_asset_sold' => array('label' => 'AssetAccountancyCodeValueAssetSold'), 'receivable_on_assignment' => array('label' => 'AssetAccountancyCodeReceivableOnAssignment'), 'proceeds_from_sales' => array('label' => 'AssetAccountancyCodeProceedsFromSales'), 'vat_collected' => array('label' => 'AssetAccountancyCodeVatCollected'), 'vat_deductible' => array('label' => 'AssetAccountancyCodeVatDeductible', 'column_break' => \true))), 'accelerated_depreciation' => array('label' => 'AssetAccountancyCodeDepreciationAcceleratedDepreciation', 'table' => 'asset_accountancy_codes_fiscal', 'depreciation_debit' => 'endowment_accelerated_depreciation', 'depreciation_credit' => 'accelerated_depreciation', 'fields' => array('accelerated_depreciation' => array('label' => 'AssetAccountancyCodeAcceleratedDepreciation'), 'endowment_accelerated_depreciation' => array('label' => 'AssetAccountancyCodeEndowmentAcceleratedDepreciation'), 'provision_accelerated_depreciation' => array('label' => 'AssetAccountancyCodeProvisionAcceleratedDepreciation'))));
    /**
     * @var int		ID parent asset
     */
    public $fk_asset;
    /**
     * @var array<string,array<string,string>>  Array with all accountancy codes by mode.
     */
    public $accountancy_codes = array();
    /**
     * Constructor
     *
     * @param DoliDB $db Database handler
     */
    public function __construct(\DoliDB $db)
    {
    }
    /**
     * Load object in memory from the database
     *
     * @param	int		$id	Id object
     * @param	string	$ref	Ref
     * @return	int<-1,max>	Return integer <0 if KO, 0 if not found, >0 if OK
     */
    public function fetch($id, $ref = \null)
    {
    }
    /**
     * Delete object in database
     *
     * @param	User		$user		User that deletes
     * @param	int<0,1> 	$notrigger	0=launch triggers, 1=disable triggers
     * @return	int<-1,1>				Return integer <0 if KO, >0 if OK
     */
    public function delete(\User $user, $notrigger = 0)
    {
    }
    /**
     *  Fill accountancy_codes property of object (using for data sent by forms)
     *
     *  @return	array<string,array<string,string>>		Array of values
     */
    public function setAccountancyCodesFromPost()
    {
    }
    /**
     *  Load accountancy codes of a asset or a asset model
     *
     * @param	int		$asset_id			Asset ID to set
     * @param	int		$asset_model_id		Asset model ID to set
     * @return	int							Return integer <0 if KO, >0 if OK
     */
    public function fetchAccountancyCodes($asset_id = 0, $asset_model_id = 0)
    {
    }
    /**
     *	Update accountancy codes of a asset or a asset model
     *
     * @param	User	$user				User making update
     * @param	int		$asset_id			Asset ID to set
     * @param	int		$asset_model_id		Asset model ID to set
     * @param	int		$notrigger			1=disable trigger UPDATE (when called by create)
     * @return	int							Return integer <0 if KO, >0 if OK
     */
    public function updateAccountancyCodes($user, $asset_id = 0, $asset_model_id = 0, $notrigger = 0)
    {
    }
}
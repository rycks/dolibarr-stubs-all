<?php

/**
 * Class for AssetAccountancyCodes
 */
class AssetAccountancyCodes extends \CommonObject
{
    /**
     * @var array<string,array<string,string|array<string,array{label:string,columnbreak?:bool}>>>  Array with all accountancy codes info by mode.
     *  Note : 'economic' mode is mandatory and is the primary accountancy codes
     *         'depreciation_asset' and 'depreciation_expense' is mandatory and is used for write depreciation in bookkeeping
     */
    public $accountancy_codes_fields = array('economic' => array('label' => 'AssetAccountancyCodeDepreciationEconomic', 'table' => 'asset_accountancy_codes_economic', 'depreciation_debit' => 'depreciation_asset', 'depreciation_credit' => 'depreciation_expense', 'fields' => array('asset' => array('label' => 'AssetAccountancyCodeAsset'), 'depreciation_asset' => array('label' => 'AssetAccountancyCodeDepreciationAsset'), 'depreciation_expense' => array('label' => 'AssetAccountancyCodeDepreciationExpense'), 'value_asset_sold' => array('label' => 'AssetAccountancyCodeValueAssetSold'), 'receivable_on_assignment' => array('label' => 'AssetAccountancyCodeReceivableOnAssignment'), 'proceeds_from_sales' => array('label' => 'AssetAccountancyCodeProceedsFromSales'), 'vat_collected' => array('label' => 'AssetAccountancyCodeVatCollected'), 'vat_deductible' => array('label' => 'AssetAccountancyCodeVatDeductible', 'column_break' => \true))), 'accelerated_depreciation' => array('label' => 'AssetAccountancyCodeDepreciationAcceleratedDepreciation', 'table' => 'asset_accountancy_codes_fiscal', 'depreciation_debit' => 'accelerated_depreciation', 'depreciation_credit' => 'endowment_accelerated_depreciation', 'fields' => array('accelerated_depreciation' => array('label' => 'AssetAccountancyCodeAcceleratedDepreciation'), 'endowment_accelerated_depreciation' => array('label' => 'AssetAccountancyCodeEndowmentAcceleratedDepreciation'), 'provision_accelerated_depreciation' => array('label' => 'AssetAccountancyCodeProvisionAcceleratedDepreciation'))));
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
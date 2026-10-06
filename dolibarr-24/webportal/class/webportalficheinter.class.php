<?php

/**
 * Class for WebPortalFicheinter
 */
class WebPortalFicheinter extends \Fichinter
{
    /**
     * @var string ID of module.
     */
    public $module = 'webportal';
    /**
     * Status list (short label)
     */
    const STATUS_SIGN_NOT_SIGNED = 11;
    const STATUS_SIGN_SIGNED_INTERNAL = 12;
    const STATUS_SIGN_SIGNED_THIRDPARTY = 13;
    const STATUS_SIGN_SIGNED_THIRDPARTY_ONLINE = 14;
    const STATUS_SIGN_SIGNED_ALL_PARTIES = 15;
    const ARRAY_STATUS_LABEL = array('-1' => '', self::STATUS_DRAFT => 'StatusInterInDraft', self::STATUS_VALIDATED => 'StatusInterInValidated', self::STATUS_BILLED => 'StatusInterInvoiced', self::STATUS_CLOSED => 'StatusInterInClosed', self::STATUS_SIGN_NOT_SIGNED => 'WebPortalInterSignedStatusNotSigned', self::STATUS_SIGN_SIGNED_INTERNAL => 'WebPortalInterSignedStatusSignedInternal', self::STATUS_SIGN_SIGNED_THIRDPARTY => 'WebPortalInterSignedStatusSignedThirdParty', self::STATUS_SIGN_SIGNED_THIRDPARTY_ONLINE => 'WebPortalInterSignedStatusSignedThirdPartyOnline', self::STATUS_SIGN_SIGNED_ALL_PARTIES => 'WebPortalInterSignedStatusSignedAllParties');
    public $fields = array('rowid' => array('type' => 'integer', 'label' => 'TechnicalID', 'enabled' => 1, 'visible' => 0, 'notnull' => 1, 'position' => 10), 'entity' => array('type' => 'integer', 'label' => 'Entity', 'enabled' => 1, 'visible' => -2, 'notnull' => 1, 'position' => 20), 'ref' => array('type' => 'varchar(30)', 'label' => 'Ref', 'enabled' => 1, 'visible' => 2, 'notnull' => 1, 'showoncombobox' => 1, 'position' => 25), 'fk_soc' => array('type' => 'integer', 'label' => 'ThirdParty', 'enabled' => 1, 'visible' => -2, 'position' => 40), 'datec' => array('type' => 'datetime', 'label' => 'WebPortalInterDateCreation', 'enabled' => 1, 'visible' => 2, 'position' => 60), 'dateo' => array('type' => 'date', 'label' => 'WebPortalInterDateStart', 'enabled' => 1, 'visible' => 2, 'position' => 61), 'datee' => array('type' => 'date', 'label' => 'WebPortalInterDateEnd', 'enabled' => 1, 'visible' => 2, 'position' => 62), 'datet' => array('type' => 'date', 'label' => 'WebPortalInterDateClose', 'enabled' => 1, 'visible' => 2, 'position' => 63), 'description' => array('type' => 'text', 'label' => 'Description', 'enabled' => 1, 'visible' => 2, 'position' => 80), 'fk_statut' => array('type' => 'smallint(6)', 'label' => 'Status', 'enabled' => 1, 'visible' => 2, 'notnull' => 1, 'position' => 500, 'arrayofkeyval' => self::ARRAY_STATUS_LABEL));
    /**
     * Constructor
     *
     * @param	DoliDB	$db		Database handler
     */
    public function __construct(\DoliDB $db)
    {
    }
}
<?php

/**
 *	Class to manage third parties objects (customers, suppliers, prospects...)
 */
class Societe extends \CommonObject
{
    use \CommonIncoterm;
    use \CommonSocialNetworks;
    use \CommonPeople;
    /**
     * @var string ID of module.
     */
    public $module = 'societe';
    /**
     * @var string ID to identify managed object
     */
    public $element = 'societe';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'societe';
    /**
     * @var string Field with ID of parent key if this field has a parent or for child tables
     */
    public $fk_element = 'fk_soc';
    /**
     * @var string Fields for combobox
     */
    public $fieldsforcombobox = 'nom,name_alias';
    /**
     * @var array<string,array{name:string}>	List of child tables. To test if we can delete object.
     */
    protected $childtables = array('supplier_proposal' => array('name' => 'SupplierProposal'), 'propal' => array('name' => 'Proposal'), 'commande' => array('name' => 'Order'), 'facture' => array('name' => 'Invoice'), 'facture_rec' => array('name' => 'RecurringInvoiceTemplate'), 'contrat' => array('name' => 'Contract'), 'fichinter' => array('name' => 'Fichinter'), 'facture_fourn' => array('name' => 'SupplierInvoice'), 'commande_fournisseur' => array('name' => 'SupplierOrder'), 'projet' => array('name' => 'Project'), 'expedition' => array('name' => 'Shipment'), 'prelevement_lignes' => array('name' => 'DirectDebitRecord'));
    /**
     * @var string[]	List of child tables. To know object to delete on cascade.
     *               if name like with @ClassName:FilePathClass:ParentFkFieldName' it will call method deleteByParentField (with parentId as parameters) and FieldName to fetch and delete child object
     */
    protected $childtablesoncascade = array('societe_prices', 'product_fournisseur_price', 'product_customer_price_log', 'product_customer_price', '@Contact:/contact/class/contact.class.php:fk_soc', 'adherent', 'societe_account', 'societe_rib', 'societe_remise', 'societe_remise_except', 'societe_commerciaux', 'categorie', 'notify', 'notify_def', 'actioncomm');
    /**
     * @var string String with name of icon for myobject. Must be the part after the 'object_' into object_myobject.png
     */
    public $picto = 'company';
    /**
     * 0=Default, 1=View may be restricted to sales representative only if no permission to see all or to company of external user if external user
     * @var int<0,1>
     */
    public $restrictiononfksoc = 1;
    /**
     * array of supplier categories
     * @var string[]
     */
    public $SupplierCategories = array();
    /**
     * prefixCustomerIsRequired
     * @var int
     */
    public $prefixCustomerIsRequired;
    /**
     *  'type' field format ('integer', 'integer:ObjectClass:PathToClass[:AddCreateButtonOrNot[:Filter]]', 'sellist:TableName:LabelFieldName[:KeyFieldName[:KeyFieldParent[:Filter]]]', 'varchar(x)', 'double(24,8)', 'real', 'price', 'text', 'text:none', 'html', 'date', 'datetime', 'timestamp', 'duration', 'mail', 'phone', 'url', 'password')
     *         Note: Filter can be a string like "(t.ref:like:'SO-%') or (t.date_creation:<:'20160101') or (t.nature:is:NULL)"
     *  'label' the translation key.
     *  'picto' is code of a picto to show before value in forms
     *  'enabled' is a condition when the field must be managed (Example: 1 or 'getDolGlobalString("MY_SETUP_PARAM")'
     *  'position' is the sort order of field.
     *  'notnull' is set to 1 if not null in database. Set to -1 if we must set data to null if empty ('' or 0).
     *  'visible' says if field is visible in list (Examples: 0=Not visible, 1=Visible on list and create/update/view forms, 2=Visible on list only, 3=Visible on create/update/view form only (not list), 4=Visible on list and update/view form only (not create). 5=Visible on list and view only (not create/not update). Using a negative value means field is not shown by default on list but can be selected for viewing)
     *  'noteditable' says if field is not editable (1 or 0)
     *  'default' is a default value for creation (can still be overwrote by the Setup of Default Values if field is editable in creation form). Note: If default is set to '(PROV)' and field is 'ref', the default value will be set to '(PROVid)' where id is rowid when a new record is created.
     *  'index' if we want an index in database.
     *  'foreignkey'=>'tablename.field' if the field is a foreign key (it is recommended to name the field fk_...).
     *  'searchall' is 1 if we want to search in this field when making a search from the quick search button.
     *  'isameasure' must be set to 1 if you want to have a total on list for this field. Field type must be summable like integer or double(24,8).
     *  'css' and 'cssview' and 'csslist' is the CSS style to use on field. 'css' is used in creation and update. 'cssview' is used in view mode. 'csslist' is used for columns in lists. For example: 'maxwidth200', 'wordbreak', 'tdoverflowmax200'
     *  'help' is a 'TranslationString' to use to show a tooltip on field. You can also use 'TranslationString:keyfortooltiponlick' for a tooltip on click.
     *  'showoncombobox' if value of the field must be visible into the label of the combobox that list record
     *  'disabled' is 1 if we want to have the field locked by a 'disabled' attribute. In most cases, this is never set into the definition of $fields into class, but is set dynamically by some part of code.
     *  'arrayofkeyval' to set list of value if type is a list of predefined values. For example: array("0"=>"Draft","1"=>"Active","-1"=>"Cancel")
     *  'autofocusoncreate' to have field having the focus on a create form. Only 1 field should have this property set to 1.
     *  'comment' is not used. You can store here any text of your choice. It is not used by application.
     *
     *  Note: To have value dynamic, you can set value to 0 in definition and edit the value on the fly into the constructor.
     */
    /**
     * @var array<string,array{type:string,label:string,enabled:int<0,2>|string,position:int,notnull?:int,visible:int<-6,6>|string,alwayseditable?:int<0,1>,noteditable?:int<0,1>,default?:string,index?:int,foreignkey?:string,searchall?:int<0,1>,isameasure?:int<0,1>,css?:string,csslist?:string,help?:string,showoncombobox?:int<0,4>,disabled?:int<0,1>,arrayofkeyval?:array<int|string,string>,autofocusoncreate?:int<0,1>,comment?:string,copytoclipboard?:int<1,2>,validate?:int<0,1>,showonheader?:int<0,1>}>  Array with all fields and their property. Do not use it as a static var. It may be modified by constructor.
     */
    public $fields = array(
        'rowid' => array('type' => 'integer', 'label' => 'TechnicalID', 'enabled' => 1, 'visible' => -2, 'noteditable' => 1, 'notnull' => 1, 'index' => 1, 'position' => 1, 'comment' => 'Id', 'css' => 'left'),
        'parent' => array('type' => 'integer', 'label' => 'Parent', 'enabled' => 1, 'visible' => -1, 'position' => 20),
        'tms' => array('type' => 'timestamp', 'label' => 'DateModification', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 25),
        'datec' => array('type' => 'datetime', 'label' => 'DateCreation', 'enabled' => 1, 'visible' => -1, 'position' => 30),
        'nom' => array('type' => 'varchar(128)', 'length' => 128, 'label' => 'Nom', 'enabled' => 1, 'visible' => -1, 'position' => 35, 'showoncombobox' => 1, 'csslist' => 'tdoverflowmax150'),
        'name_alias' => array('type' => 'varchar(128)', 'label' => 'Name alias', 'enabled' => 1, 'visible' => -1, 'position' => 36, 'showoncombobox' => 2),
        'entity' => array('type' => 'integer', 'label' => 'Entity', 'default' => '1', 'enabled' => 1, 'visible' => -2, 'notnull' => 1, 'position' => 40, 'index' => 1),
        'ref_ext' => array('type' => 'varchar(255)', 'label' => 'RefExt', 'enabled' => 1, 'visible' => 0, 'position' => 45),
        'code_client' => array('type' => 'varchar(24)', 'label' => 'CustomerCode', 'enabled' => 1, 'visible' => -1, 'position' => 55),
        'code_fournisseur' => array('type' => 'varchar(24)', 'label' => 'SupplierCode', 'enabled' => 1, 'visible' => -1, 'position' => 60),
        'code_compta' => array('type' => 'varchar(24)', 'label' => 'CustomerAccountancyCode', 'enabled' => 1, 'visible' => -1, 'position' => 65),
        'code_compta_fournisseur' => array('type' => 'varchar(24)', 'label' => 'SupplierAccountancyCode', 'enabled' => 1, 'visible' => -1, 'position' => 70),
        'address' => array('type' => 'varchar(255)', 'label' => 'Address', 'enabled' => 1, 'visible' => -1, 'position' => 75),
        'zip' => array('type' => 'varchar(25)', 'label' => 'Zip', 'enabled' => 1, 'visible' => -1, 'position' => 80),
        'town' => array('type' => 'varchar(50)', 'label' => 'Town', 'enabled' => 1, 'visible' => -1, 'position' => 85),
        'fk_departement' => array('type' => 'integer', 'label' => 'State', 'enabled' => 1, 'visible' => -1, 'position' => 90),
        'fk_pays' => array('type' => 'integer:Ccountry:core/class/ccountry.class.php', 'label' => 'Country', 'enabled' => 1, 'visible' => -1, 'position' => 95),
        'phone' => array('type' => 'varchar(20)', 'label' => 'Phone', 'enabled' => 1, 'visible' => -1, 'position' => 100),
        'phone_mobile' => array('type' => 'varchar(20)', 'label' => 'PhoneMobile', 'enabled' => 1, 'visible' => -1, 'position' => 102),
        'fax' => array('type' => 'varchar(20)', 'label' => 'Fax', 'enabled' => 1, 'visible' => -1, 'position' => 105),
        'url' => array('type' => 'varchar(255)', 'label' => 'Url', 'enabled' => 1, 'visible' => -1, 'position' => 110),
        'email' => array('type' => 'varchar(128)', 'label' => 'Email', 'enabled' => 1, 'visible' => -1, 'position' => 115),
        'socialnetworks' => array('type' => 'text', 'label' => 'Socialnetworks', 'enabled' => 1, 'visible' => -1, 'position' => 120),
        'fk_effectif' => array('type' => 'integer', 'label' => 'Workforce', 'enabled' => 1, 'visible' => -1, 'position' => 170),
        'fk_typent' => array('type' => 'integer', 'label' => 'TypeOfCompany', 'enabled' => 1, 'visible' => -1, 'position' => 175, 'csslist' => 'minwidth200'),
        'fk_forme_juridique' => array('type' => 'integer', 'label' => 'JuridicalStatus', 'enabled' => 1, 'visible' => -1, 'position' => 180),
        'fk_currency' => array('type' => 'varchar(3)', 'label' => 'Currency', 'enabled' => 1, 'visible' => -1, 'position' => 185),
        'siren' => array('type' => 'varchar(128)', 'label' => 'Idprof1', 'enabled' => 1, 'visible' => -1, 'position' => 190),
        'siret' => array('type' => 'varchar(128)', 'label' => 'Idprof2', 'enabled' => 1, 'visible' => -1, 'position' => 195),
        'ape' => array('type' => 'varchar(128)', 'label' => 'Idprof3', 'enabled' => 1, 'visible' => -1, 'position' => 200),
        'idprof4' => array('type' => 'varchar(128)', 'label' => 'Idprof4', 'enabled' => 1, 'visible' => -1, 'position' => 205),
        'idprof5' => array('type' => 'varchar(128)', 'label' => 'Idprof5', 'enabled' => 1, 'visible' => -1, 'position' => 206),
        'idprof6' => array('type' => 'varchar(128)', 'label' => 'Idprof6', 'enabled' => 1, 'visible' => -1, 'position' => 207),
        'tva_intra' => array('type' => 'varchar(20)', 'label' => 'Tva intra', 'enabled' => 1, 'visible' => -1, 'position' => 210),
        'capital' => array('type' => 'double(24,8)', 'label' => 'Capital', 'enabled' => 1, 'visible' => -1, 'position' => 215),
        'fk_stcomm' => array('type' => 'integer', 'label' => 'CommercialStatus', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 220),
        'note_public' => array('type' => 'html', 'label' => 'NotePublic', 'enabled' => 1, 'visible' => 0, 'position' => 225),
        'note_private' => array('type' => 'html', 'label' => 'NotePrivate', 'enabled' => 1, 'visible' => 0, 'position' => 230),
        'prefix_comm' => array('type' => 'varchar(5)', 'label' => 'Prefix comm', 'enabled' => "getDolGlobalInt('SOCIETE_USEPREFIX')", 'visible' => -1, 'position' => 235),
        'client' => array('type' => 'tinyint(4)', 'label' => 'Client', 'enabled' => 1, 'visible' => -1, 'position' => 240),
        'fournisseur' => array('type' => 'tinyint(4)', 'label' => 'Fournisseur', 'enabled' => 1, 'visible' => -1, 'position' => 245),
        'supplier_account' => array('type' => 'varchar(32)', 'label' => 'Supplier account', 'enabled' => 1, 'visible' => -1, 'position' => 250),
        'fk_prospectlevel' => array('type' => 'varchar(12)', 'label' => 'ProspectLevel', 'enabled' => 1, 'visible' => -1, 'position' => 255),
        'customer_bad' => array('type' => 'tinyint(4)', 'label' => 'Customer bad', 'enabled' => 1, 'visible' => -1, 'position' => 260),
        'customer_rate' => array('type' => 'double', 'label' => 'Customer rate', 'enabled' => 1, 'visible' => -1, 'position' => 265),
        'supplier_rate' => array('type' => 'double', 'label' => 'Supplier rate', 'enabled' => 1, 'visible' => -1, 'position' => 270),
        'fk_user_creat' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'UserAuthor', 'enabled' => 1, 'visible' => -2, 'position' => 275),
        'fk_user_modif' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'UserModif', 'enabled' => 1, 'visible' => -2, 'notnull' => -1, 'position' => 280),
        //'remise_client' =>array('type'=>'double', 'label'=>'CustomerDiscount', 'enabled'=>1, 'visible'=>-1, 'position'=>285, 'isameasure'=>1),
        //'remise_supplier' =>array('type'=>'double', 'label'=>'SupplierDiscount', 'enabled'=>1, 'visible'=>-1, 'position'=>290, 'isameasure'=>1),
        'mode_reglement' => array('type' => 'tinyint(4)', 'label' => 'Mode reglement', 'enabled' => 1, 'visible' => -1, 'position' => 295),
        'cond_reglement' => array('type' => 'tinyint(4)', 'label' => 'Cond reglement', 'enabled' => 1, 'visible' => -1, 'position' => 300),
        'deposit_percent' => array('type' => 'varchar(63)', 'label' => 'DepositPercent', 'enabled' => 1, 'visible' => -1, 'position' => 301),
        'mode_reglement_supplier' => array('type' => 'integer', 'label' => 'Mode reglement supplier', 'enabled' => 1, 'visible' => -1, 'position' => 305),
        'cond_reglement_supplier' => array('type' => 'integer', 'label' => 'Cond reglement supplier', 'enabled' => 1, 'visible' => -1, 'position' => 308),
        'outstanding_limit' => array('type' => 'double(24,8)', 'label' => 'OutstandingBill', 'enabled' => 1, 'visible' => -1, 'position' => 310, 'isameasure' => 1),
        'order_min_amount' => array('type' => 'double(24,8)', 'label' => 'Order min amount', 'enabled' => 'isModEnabled("order") && !empty($conf->global->ORDER_MANAGE_MIN_AMOUNT)', 'visible' => -1, 'position' => 315, 'isameasure' => 1),
        'supplier_order_min_amount' => array('type' => 'double(24,8)', 'label' => 'Supplier order min amount', 'enabled' => 'isModEnabled("order") && !empty($conf->global->ORDER_MANAGE_MIN_AMOUNT)', 'visible' => -1, 'position' => 320, 'isameasure' => 1),
        'fk_shipping_method' => array('type' => 'integer', 'label' => 'Fk shipping method', 'enabled' => 1, 'visible' => -1, 'position' => 330),
        'tva_assuj' => array('type' => 'tinyint(4)', 'label' => 'Tva assuj', 'enabled' => 1, 'visible' => -1, 'position' => 335),
        'localtax1_assuj' => array('type' => 'tinyint(4)', 'label' => 'Localtax1 assuj', 'enabled' => 1, 'visible' => -1, 'position' => 340),
        'localtax1_value' => array('type' => 'double(6,3)', 'label' => 'Localtax1 value', 'enabled' => 1, 'visible' => -1, 'position' => 345),
        'localtax2_assuj' => array('type' => 'tinyint(4)', 'label' => 'Localtax2 assuj', 'enabled' => 1, 'visible' => -1, 'position' => 350),
        'localtax2_value' => array('type' => 'double(6,3)', 'label' => 'Localtax2 value', 'enabled' => 1, 'visible' => -1, 'position' => 355),
        'vat_reverse_charge' => array('type' => 'tinyint(4)', 'label' => 'Vat reverse charge', 'enabled' => 1, 'visible' => -1, 'position' => 335),
        'barcode' => array('type' => 'varchar(255)', 'label' => 'Barcode', 'enabled' => 1, 'visible' => -1, 'position' => 360),
        'price_level' => array('type' => 'integer', 'label' => 'Price level', 'enabled' => '$conf->global->PRODUIT_MULTIPRICES || getDolGlobalString("PRODUIT_CUSTOMER_PRICES_BY_QTY_MULTIPRICES") || getDolGlobalString("PRODUIT_CUSTOMER_PRICES_AND_MULTIPRICES")', 'visible' => -1, 'position' => 365),
        'default_lang' => array('type' => 'varchar(6)', 'label' => 'Default lang', 'enabled' => 1, 'visible' => -1, 'position' => 370),
        'canvas' => array('type' => 'varchar(32)', 'label' => 'Canvas', 'enabled' => 1, 'visible' => -1, 'position' => 375),
        'fk_barcode_type' => array('type' => 'integer', 'label' => 'Fk barcode type', 'enabled' => 1, 'visible' => -1, 'position' => 405),
        'webservices_url' => array('type' => 'varchar(255)', 'label' => 'Webservices url', 'enabled' => 1, 'visible' => -1, 'position' => 410),
        'webservices_key' => array('type' => 'varchar(128)', 'label' => 'Webservices key', 'enabled' => 1, 'visible' => -1, 'position' => 415),
        'fk_incoterms' => array('type' => 'integer', 'label' => 'Fk incoterms', 'enabled' => 1, 'visible' => -1, 'position' => 425),
        'location_incoterms' => array('type' => 'varchar(255)', 'label' => 'Location incoterms', 'enabled' => 1, 'visible' => -1, 'position' => 430),
        'model_pdf' => array('type' => 'varchar(255)', 'label' => 'Model pdf', 'enabled' => 1, 'visible' => 0, 'position' => 435),
        'last_main_doc' => array('type' => 'varchar(255)', 'label' => 'LastMainDoc', 'enabled' => 1, 'visible' => -1, 'position' => 270),
        'fk_multicurrency' => array('type' => 'integer', 'label' => 'Fk multicurrency', 'enabled' => 1, 'visible' => -1, 'position' => 440),
        'multicurrency_code' => array('type' => 'varchar(255)', 'label' => 'Multicurrency code', 'enabled' => 1, 'visible' => -1, 'position' => 445),
        'fk_account' => array('type' => 'integer', 'label' => 'PaymentBankAccount', 'enabled' => 1, 'visible' => -1, 'position' => 450),
        'fk_warehouse' => array('type' => 'integer', 'label' => 'Warehouse', 'enabled' => 1, 'visible' => -1, 'position' => 455),
        'logo' => array('type' => 'varchar(255)', 'label' => 'Logo', 'enabled' => 1, 'visible' => -1, 'position' => 400),
        'logo_squarred' => array('type' => 'varchar(255)', 'label' => 'Logo squarred', 'enabled' => 1, 'visible' => -1, 'position' => 401),
        'status' => array('type' => 'tinyint(4)', 'label' => 'Status', 'enabled' => 1, 'visible' => -1, 'position' => 500),
        'import_key' => array('type' => 'varchar(14)', 'label' => 'ImportId', 'enabled' => 1, 'visible' => -2, 'position' => 1000),
    );
    /**
     * @var int Entity
     */
    public $entity;
    /**
     * Thirdparty name
     * @var ?string
     * @deprecated Use $name instead
     * @see $name
     */
    public $nom;
    /**
     * @var ?string Thirdparty name
     */
    public $name;
    /**
     * Alias names (commercial, trademark or alias names)
     * @var string
     */
    public $name_alias;
    /**
     * @var int Physical thirdparty not a company
     */
    public $particulier;
    /**
     * Thirdparty status : 0=activity ceased, 1= in activity
     * @var int
     */
    public $status = 1;
    /**
     * @var string	region code
     */
    public $region_code;
    /**
     * @var string Region name
     */
    public $region;
    /**
     * @var int country_id
     */
    public $country_id;
    /**
     * @var ?string State code
     * @deprecated Use $state_code instead
     * @see $state_code
     */
    public $departement_code;
    /**
     * @var ?string
     * @deprecated Use $state instead
     * @see $state
     */
    public $departement;
    /**
     * @var ?string
     * @deprecated Use $country instead
     * @see $country
     */
    public $pays;
    /**
     * Phone number
     * @var ?string
     */
    public $phone;
    /**
     * PhoneMobile number
     * @var ?string
     */
    public $phone_mobile;
    /**
     * Fax number
     * @var ?string
     */
    public $fax;
    /**
     * Email
     * @var ?string
     */
    public $email;
    /**
     * No Email
     * @var int		Set if company email found into unsubscribe of emailing list table
     */
    public $no_email;
    /**
     * Skype username
     * @var string
     * @deprecated
     */
    public $skype;
    /**
     * Twitter username
     * @var string
     * @deprecated
     */
    public $twitter;
    /**
     * Facebook username
     * @var string
     * @deprecated
     */
    public $facebook;
    /**
     * LinkedIn username
     * @var string
     * @deprecated
     */
    public $linkedin;
    /**
     * Webpage
     * @var ?string
     */
    public $url;
    /**
     * Barcode value
     * @var string
     */
    public $barcode;
    // 6 professional id (usage depends on country)
    /**
     * Professional ID 1 (Ex: Siren in France)
     * @var ?string
     */
    public $idprof1;
    /**
     * @var ?string Professional ID 1
     * @deprecated Use $idprof1 instead
     * @see $idprof1
     */
    public $siren;
    /**
     * Professional ID 2 (Ex: Siret in France)
     * @var ?string
     */
    public $idprof2;
    /**
     * @var ?string Professional ID 2
     * @deprecated Use $idprof2 instead
     * @see $idprof2
     */
    public $siret;
    /**
     * Professional ID 3 (Ex: Ape in France)
     * @var ?string
     */
    public $idprof3;
    /**
     * @var ?string Professional ID 3
     * @deprecated Use $idprof3 instead
     * @see $idprof3
     */
    public $ape;
    /**
     * Professional ID 4 (Ex: RCS in France)
     * @var ?string
     */
    public $idprof4;
    /**
     * Professional ID 5
     * @var ?string
     */
    public $idprof5;
    /**
     * Professional ID 6
     * @var ?string
     */
    public $idprof6;
    /**
     * Professional ID 7
     * @var ?string
     */
    public $idprof7;
    /**
     * Professional ID 8
     * @var ?string
     */
    public $idprof8;
    /**
     * Professional ID 9
     * @var ?string
     */
    public $idprof9;
    /**
     * Professional ID 10
     * @var ?string
     */
    public $idprof10;
    /**
     * Social object of the company
     * @var string
     */
    public $socialobject;
    /**
     * @var string Prefix comm
     */
    public $prefix_comm;
    /**
     * @var int 	Vat concerned
     */
    public $tva_assuj = 1;
    /**
     * @var ?string	Intracommunitary VAT ID
     */
    public $tva_intra;
    /**
     * @var int<0,1>	Vat reverse-charge concerned
     */
    public $vat_reverse_charge = 0;
    // Local taxes
    /**
     * @var int
     */
    public $localtax1_assuj;
    /**
     * @var string
     */
    public $localtax1_value;
    /**
     * @var int
     */
    public $localtax2_assuj;
    /**
     * @var string
     */
    public $localtax2_value;
    /**
     * @var string Manager
     */
    public $managers;
    /**
     * @var float Capital
     */
    public $capital;
    /**
     * @var int Type thirdparty
     */
    public $typent_id = 0;
    /**
     * @var string
     */
    public $typent_code;
    /**
     * @var int
     */
    public $effectif;
    /**
     * @var int
     */
    public $effectif_id = 0;
    /**
     * @var int
     */
    public $forme_juridique_code = 0;
    /**
     * @var string Label for Legal Form (of company)
     * @see CommonDocGenerator::get_substitutionarray_mysoc()
     */
    public $forme_juridique;
    /**
     * @var string
     */
    public $remise_percent;
    /**
     * @var string
     */
    public $remise_supplier_percent;
    /**
     * @var ?int 		Default Payment method ID (cheque, cash, ...)
     */
    public $mode_reglement_id;
    /**
     * @var ?int		Default Payment term
     */
    public $cond_reglement_id;
    /**
     * @var string|float
     */
    public $deposit_percent;
    /**
     * @var int
     */
    public $mode_reglement_supplier_id;
    /**
     * @var int
     */
    public $cond_reglement_supplier_id;
    /**
     * @var int
     */
    public $transport_mode_supplier_id;
    /**
     * @var string	Prospect level. ie: 'PL_LOW', 'PL...'
     */
    public $fk_prospectlevel;
    /**
     * @var string second name
     */
    public $name_bis;
    /**
     * User that made last update
     * @var User
     * @deprecated
     */
    public $user_modification;
    /**
     * User that created the thirdparty
     * @var User
     * @deprecated
     */
    public $user_creation;
    /**
     * 0=no customer, 1=customer, 2=prospect, 3=customer and prospect
     * @var int
     */
    public $client = 0;
    /**
     * 0=no prospect, 1=prospect
     * @var int
     */
    public $prospect = 0;
    /**
     * 0=no supplier, 1=supplier
     * @var int
     */
    public $fournisseur;
    /**
     * Client code. E.g: CU2014-003
     * @var ?string
     */
    public $code_client;
    /**
     * Supplier code. E.g: SU2014-003
     * @var ?string
     */
    public $code_fournisseur;
    /**
     * Accounting code for client
     * @var ?string
     */
    public $code_compta_client;
    /**
     * Accounting general account for customer
     * @var ?string
     */
    public $accountancy_code_customer_general;
    /**
     * Accounting auxiliary account for customer
     * @var ?string
     */
    public $accountancy_code_customer;
    /**
     * Accounting code for supplier
     * @var ?string
     */
    public $code_compta_fournisseur;
    /**
     * Accounting general account for supplier
     * @var ?string
     */
    public $accountancy_code_supplier_general;
    /**
     * Accounting auxiliary account for supplier
     * @var ?string
     */
    public $accountancy_code_supplier;
    /**
     * Accounting code for product (for level 3 of suggestion of product accounting account)
     * @var string
     */
    public $code_compta_product;
    /**
     * @var ?string
     * @deprecated Use $note_public, $note_private - Note is split in public and private notes
     * @see $note_public, $note_private
     */
    public $note;
    /**
     * Private note
     * @var ?string
     */
    public $note_private;
    /**
     * Public note
     * @var ?string
     */
    public $note_public;
    /**
     * Status prospect id
     * @var int
     */
    public $stcomm_id;
    /**
     * Status prospect picto
     * @var string
     */
    public $stcomm_picto;
    /**
     * Status prospect label
     * @var int
     */
    public $status_prospect_label;
    /**
     * Assigned price level
     * @var int
     */
    public $price_level;
    /**
     * @var string outstanding limit
     */
    public $outstanding_limit;
    /**
     * @var string Min order amount
     */
    public $order_min_amount;
    /**
     * @var string Supplier min order amount
     */
    public $supplier_order_min_amount;
    /**
     * Id of sales representative to link (used for thirdparty creation). Not filled by a fetch, because we can have several sales representatives.
     * @var int
     */
    public $commercial_id;
    /**
     * Id of parent thirdparty (if one)
     * @var int
     */
    public $parent;
    /**
     * Default language code of thirdparty (en_US, ...)
     * @var string
     */
    public $default_lang;
    /**
     * @var string Ref
     */
    public $ref;
    /**
     * External user reference.
     * This is to allow external systems to store their id and make self-developed synchronizing functions easier to build.
     * @var string
     */
    public $ref_ext;
    /**
     * @var string IP address
     */
    public $ip;
    /**
     * Import key.
     * Set when the thirdparty has been created through an import process. This is to relate those created thirdparties
     * to an import process
     * @var string
     */
    public $import_key;
    /**
     * Supplier WebServices URL
     * @var string
     */
    public $webservices_url;
    /**
     * Supplier WebServices Key
     * @var string
     */
    public $webservices_key;
    /**
     * @var string Logo
     */
    public $logo;
    /**
     * @var string logo small
     */
    public $logo_small;
    /**
     * @var string Logo mini
     */
    public $logo_mini;
    /**
     * @var string Logo squarred
     */
    public $logo_squarred;
    /**
     * @var string Logo squarred small
     */
    public $logo_squarred_small;
    /**
     * @var string Logo squarred mini
     */
    public $logo_squarred_mini;
    /**
     * @var string Accountancy account for sales
     */
    public $accountancy_code_sell;
    /**
     * @var string Accountancy account for bought
     */
    public $accountancy_code_buy;
    /**
     * @var string	Main currency code of company
     */
    public $currency_code;
    // Multicurrency
    /**
     * @var int Multicurrency ID
     */
    public $fk_multicurrency;
    /**
     * @var string Multicurrency code
     */
    public $multicurrency_code;
    // Warehouse
    /**
     * @var int ID
     */
    public $fk_warehouse;
    /**
     * @var string	Name of file with terms of sales
     */
    public $termsofsale;
    // Fields loaded by fetchPartnerships()
    /**
     * @var array<array<mixed>>
     */
    public $partnerships = array();
    /**
     * @var Account|string Default BAN account
     */
    public $bank_account;
    /**
     * @deprecated
     * Accounting code for client
     * @var ?string
     */
    public $code_compta;
    const STATUS_CEASED = 0;
    const STATUS_INACTIVITY = 1;
    /**
     * Third party type is no customer
     */
    const NO_CUSTOMER = 0;
    /**
     * Third party type is a customer
     */
    const CUSTOMER = 1;
    /**
     * Third party type is a prospect
     */
    const PROSPECT = 2;
    /**
     * Third party type is a customer and a prospect
     */
    const CUSTOMER_AND_PROSPECT = 3;
    /**
     * Third party supplier flag is not supplier
     */
    const NO_SUPPLIER = 0;
    /**
     * Third party supplier flag is a supplier
     */
    const SUPPLIER = 1;
    /**
     * Provide list of deprecated properties and replacements
     *
     * @return array<string,string>
     */
    protected function deprecatedProperties()
    {
    }
    /**
     *    Constructor
     *
     *    @param	DoliDB		$db		Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *    Create third party in database.
     *    $this->code_client = -1 and $this->code_fournisseur = -1 means automatic assignment.
     *
     *    @param	User	$user           Object of user that ask creation
     *    @param    int		$notrigger	    1=Does not execute triggers, 0= execute triggers
     *    @return   int         		    >=0 if OK, <0 if KO
     */
    public function create(\User $user, $notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Create a contact/address from thirdparty
     *
     * @param 	User		$user		    Object user
     * @param 	int<0,1>	$no_email	    1=Do not send mailing, 0=Ok to receive mailing
     * @param 	string[]	$tags		    Array of tag to affect to contact
     * @param   int<0,1>    $notrigger	    1=Does not execute triggers, 0= execute triggers
     * @return 	int<-1,1>				    Return integer <0 if KO, >0 if OK
     */
    public function create_individual(\User $user, $no_email = 0, $tags = array(), $notrigger = 0)
    {
    }
    /**
     *    Check properties of third party are ok (like name, third party codes, ...)
     *    Used before an add or update.
     *
     *    @return     int		0 if OK, <0 if KO
     */
    public function verify()
    {
    }
    /**
     *      Update parameters of third party
     *
     *      @param	int		$id              			Id of company (deprecated, use 0 here and call update on an object loaded by a fetch)
     *      @param  User	$user            			User who requests the update
     *      @param  int		$call_trigger    			0=no, 1=yes
     *		@param	int		$allowmodcodeclient			Inclut modif code client et code compta
     *		@param	int		$allowmodcodefournisseur	Inclut modif code fournisseur et code compta fournisseur
     *		@param	string	$action						'add' or 'update' or 'merge'
     *		@param	int		$nosyncmember				Do not synchronize info of linked member
     *      @return int  			           			Return integer <0 if KO, >=0 if OK
     */
    public function update($id, \User $user, $call_trigger = 1, $allowmodcodeclient = 0, $allowmodcodefournisseur = 0, $action = 'update', $nosyncmember = 1)
    {
    }
    /**
     *    Load a third party from database into memory
     *
     *    @param	int		$rowid			Id of third party to load
     *    @param    string	$ref			Reference of third party, name (Warning, this can return several records)
     *    @param    string	$ref_ext       	External reference of third party (Warning, this information is a free field not provided by Dolibarr)
     *    @param    string	$barcode       	Barcode of third party to load
     *    @param    string	$idprof1		Prof id 1 of third party (Warning, this can return several records)
     *    @param    string	$idprof2		Prof id 2 of third party (Warning, this can return several records)
     *    @param    string	$idprof3		Prof id 3 of third party (Warning, this can return several records)
     *    @param    string	$idprof4		Prof id 4 of third party (Warning, this can return several records)
     *    @param    string	$idprof5		Prof id 5 of third party (Warning, this can return several records)
     *    @param    string	$idprof6		Prof id 6 of third party (Warning, this can return several records)
     *    @param    string	$email   		Email of third party (Warning, this can return several records)
     *    @param    string	$ref_alias 		Name_alias of third party (Warning, this can return several records)
     * 	  @param	int		$is_client		Only client third party
     *    @param	int		$is_supplier	Only supplier third party
     *    @return   int						>0 if OK, <0 if KO or if two records found for same ref or idprof, 0 if not found.
     */
    public function fetch($rowid, $ref = '', $ref_ext = '', $barcode = '', $idprof1 = '', $idprof2 = '', $idprof3 = '', $idprof4 = '', $idprof5 = '', $idprof6 = '', $email = '', $ref_alias = '', $is_client = 0, $is_supplier = 0)
    {
    }
    /**
     *    Search the thirdparty that match the most the provided parameters.
     *    Searching rules try to find the existing third party.
     *
     *    @param	int		$rowid			Id of third party
     *    @param    string	$ref			Reference of third party, name (Warning, this can return several records)
     *    @param    string	$ref_ext       	External reference of third party (Warning, this information is a free field not provided by Dolibarr)
     *    @param    string	$barcode       	Barcode of third party to load
     *    @param    string	$idprof1		Prof id 1 of third party (Warning, this can return several records)
     *    @param    string	$idprof2		Prof id 2 of third party (Warning, this can return several records)
     *    @param    string	$idprof3		Prof id 3 of third party (Warning, this can return several records)
     *    @param    string	$idprof4		Prof id 4 of third party (Warning, this can return several records)
     *    @param    string	$idprof5		Prof id 5 of third party (Warning, this can return several records)
     *    @param    string	$idprof6		Prof id 6 of third party (Warning, this can return several records)
     *    @param    string	$email   		Email of third party (Warning, this can return several records)
     *    @param    string	$ref_alias 		Name_alias of third party (Warning, this can return several records)
     * 	  @param	int		$is_client		Only client third party
     *    @param	int		$is_supplier	Only supplier third party
     *    @return   int						ID of thirdparty found if OK, <0 if KO or if two records found, 0 if not found.
     */
    public function findNearest($rowid = 0, $ref = '', $ref_ext = '', $barcode = '', $idprof1 = '', $idprof2 = '', $idprof3 = '', $idprof4 = '', $idprof5 = '', $idprof6 = '', $email = '', $ref_alias = '', $is_client = 0, $is_supplier = 0)
    {
    }
    /**
     *    Delete a third party from database and all its dependencies (contacts, rib...)
     *
     *    @param	int			$id             Id of third party to delete
     *    @param    ?User		$fuser          User who ask to delete thirdparty
     *    @param    int<0,1>	$call_trigger   0=No, 1=yes
     *    @return	int							Return integer <0 if KO, 0 if nothing done, >0 if OK
     */
    public function delete($id, $fuser = \null, $call_trigger = 1)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Define third party as a customer
     *
     *	@return		int		Return integer <0 if KO, >0 if OK
     *  @deprecated Use setAsCustomer() instead
     *  @see setAsCustomer()
     */
    public function set_as_client()
    {
    }
    /**
     *  Define third party as a customer
     *
     *	@return		int		Return integer <0 if KO, >0 if OK
     *  @since dolibarr v19
     */
    public function setAsCustomer()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Defines the company as a customer
     *
     *  @param	float	$remise		Value in % of the discount
     *  @param  string	$note		Note/Reason for changing the discount
     *  @param  User	$user		User who sets the discount
     *	@return	int					Return integer <0 if KO, >0 if OK
     */
    public function set_remise_client($remise, $note, \User $user)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Defines the company as a customer
     *
     *  @param	float	$remise		Value in % of the discount
     *  @param  string	$note		Note/Reason for changing the discount
     *  @param  User	$user		User who sets the discount
     *	@return	int					Return integer <0 if KO, >0 if OK
     */
    public function set_remise_supplier($remise, $note, \User $user)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    	Add a discount for third party
     *
     *    	@param	float	$remise     		Amount of discount
     *    	@param  User	$user       		User adding discount
     *    	@param  string	$desc				Reason of discount
     *      @param  string	$vatrate     		VAT rate (may contain the vat code too). Example: '1.23', '1.23 (ABC)', ...
     *      @param	int		$discount_type		0 => customer discount, 1 => supplier discount
     *      @param	string	$price_base_type	Price base type 'HT' or 'TTC'
     *		@return	int							Return integer <0 if KO, id of discount record if OK
     */
    public function set_remise_except($remise, \User $user, $desc, $vatrate = '', $discount_type = 0, $price_base_type = 'HT')
    {
    }
    /**
     * 	Returns amount of included taxes of the current discounts/credits available from the company
     *
     *	@param	?User		$user			Filter on a user author of discounts
     * 	@param	string		$filter			Other filter
     * 	@param	int			$maxvalue		Filter on max value for discount
     * 	@param	int<0,1>	$discount_type	0 => customer discount, 1 => supplier discount
     *	@return	float|int<-1,-1>		Return integer <0 if KO, Credit note amount otherwise
     */
    public function getAvailableDiscounts($user = \null, $filter = '', $maxvalue = 0, $discount_type = 0)
    {
    }
    /**
     *  Return array of sales representatives
     *
     *  @param	User		$user			Object user (not used)
     *  @param	int<0,1>	$mode			0=Array with properties, 1=Array of IDs.
     *  @param	?string		$sortfield		List of sort fields, separated by comma. Example: 't1.fielda,t2.fieldb'
     *  @param	?string		$sortorder		Sort order, separated by comma. Example: 'ASC,DESC';
     *	@return	int<-1,-1>|int[]|array<array{id:int,lastname:string,firstname:string,email:string,phone:string,office_phone:string,office_fax:string,user_mobile:string,personal_mobile:string,job:string,statut:int,status:int,entity:int,login:string,photo:string,gender:string}>	Array of sales representatives of the current third party or <0 if KO
     */
    public function getSalesRepresentatives(\User $user, $mode = 0, $sortfield = \null, $sortorder = \null)
    {
    }
    /**
     * Set the price level
     *
     * @param 	int		$price_level	Level of price
     * @param 	User	$user			Use making change
     * @return	int						Return integer <0 if KO, >0 if OK
     */
    public function setPriceLevel($price_level, \User $user)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Add link to sales representative
     *
     *	@param	User	$user		Object user
     *	@param	int		$commid		Id of user
     *	@return	int					Return integer <=0 if KO, >0 if OK
     */
    public function add_commercial(\User $user, $commid)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Add link to sales representative
     *
     *	@param	User	$user		Object user
     *	@param	int		$commid		Id of user
     *	@return	int					Return <0 if KO, >0 if OK
     */
    public function del_commercial(\User $user, $commid)
    {
    }
    /**
     * getTooltipContentArray
     *
     * @param array<string,mixed> $params params to construct tooltip data
     * @return array<string,string> Data to show in tooltip
     * @since v18
     */
    public function getTooltipContentArray($params)
    {
    }
    /**
     *    	Return a link on thirdparty (with picto)
     *
     *		@param	int<0,2>	$withpicto		          	Add picto into link (0=No picto, 1=Include picto with link, 2=Picto only)
     *		@param	string		$option			          	Target of link (''=auto, 'nolink'=no link, 'customer', 'prospect', 'supplier', 'project', 'agenda', ...)
     *		@param	int<0,max>	$maxlen			          	Max length of name
     *      @param	int<0,1> 	$notooltip		          	1=Disable tooltip
     *      @param  int<-1,1>	$save_lastsearch_value    	-1=Auto, 0=No save of lastsearch_values when clicking, 1=Save lastsearch_values whenclicking
     *      @param	int<0,1>	$noaliasinname			  	1=Do not add alias into the link ref
     *      @param	string		$target			  		  	add attribute target
     *      @param	string		$morecss					More CSS
     *		@return	string						          	String with URL
     */
    public function getNomUrl($withpicto = 0, $option = '', $maxlen = 0, $notooltip = 0, $save_lastsearch_value = -1, $noaliasinname = 0, $target = '', $morecss = '')
    {
    }
    /**
     *    	Return link(s) on type of thirdparty (with picto)
     *
     *		@param	int		$withpicto		        Add picto into link (0=No picto, 1=Include picto with link, 2=Picto only)
     *		@param	string	$option					''=All
     *      @param	int  	$notooltip		        1=Disable tooltip
     *      @param	string	$tag					Tag 'a' or 'span'
     *		@return	string					        String with URL
     */
    public function getTypeUrl($withpicto = 0, $option = '', $notooltip = 0, $tag = 'a')
    {
    }
    /**
     *	Return label of status (activity, closed)
     *
     *	@param	int<0,6>	$mode		0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 6=Long label + Picto
     *	@return	string     		   		Label of status
     */
    public function getLibStatut($mode = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return the label of a given status
     *
     *  @param	int			$status		Status id
     *  @param	int<0,6>	$mode		0=Long label, 1=Short label, 2=Picto + Short label, 3=Picto, 4=Picto + Long label, 5=Short label + Picto, 6=Long label + Picto
     *  @return	string          		Status label
     */
    public function LibStatut($status, $mode = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Return list of contacts emails existing for third party
     *
     *	@param	int<0,2>	$addthirdparty		1=Add also a record for thirdparty email, 2=Same than 1 but add text ThirdParty in grey
     *	@return	array<'thirdparty'|int,string>	Array of contact's emails
     */
    public function thirdparty_and_contact_email_array($addthirdparty = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Return list of contacts mobile phone existing for third party
     *
     *	@return	array<'thirdparty'|int,string>	Array of contacts mobile phone
     */
    public function thirdparty_and_contact_phone_array()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return list of contacts emails or mobile existing for third party
     *
     *  @param	'email'|'mobile'	$mode       	'email' or 'mobile'
     * 	@param	int<0,1>			$hidedisabled	1=Hide contact if disabled
     *  @return string[]    	   					Array of contacts emails or mobile. Example: array(id=>'Name <email>')
     */
    public function contact_property_array($mode = 'email', $hidedisabled = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Return the contact list of this company
     *
     *	@return	string[]	$contacts	array of contacts
     */
    public function contact_array()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Return the contact list of this company
     *
     *	@return	Contact[]	$contacts	array of contacts
     */
    public function contact_array_objects()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return property of contact from its id
     *
     *  @param	int		$rowid      id of contact
     *  @param  string	$mode       'email' or 'mobile'
     *  @return string  			Email of contact with format: "Full name <email>"
     */
    public function contact_get_property($rowid, $mode)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return bank number property of thirdparty (label or rum)
     *
     *	@param	string	$mode	'label' or 'rum' or 'format'
     *  @return	string			Bank label or RUM or '' if no bank account found
     */
    public function display_rib($mode = 'label')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Return Array of RIB
     *
     * @return    CompanyBankAccount[]|int        Return 0 if KO, Array of CompanyBankAccount if OK
     */
    public function get_all_rib()
    {
    }
    /**
     * @return int
     */
    public function getDefaultRib()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Assigns a customer code from the code control module.
     *  Return value is stored into this->code_client
     *
     *	@param	?Societe	$objsoc		Object thirdparty
     *	@param	int			$type		Should be 0 to say customer
     *  @return void
     */
    public function get_codeclient($objsoc = \null, $type = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Assigns a vendor code from the code control module.
     *  Return value is stored into this->code_fournisseur
     *
     *	@param	?Societe	$objsoc		Object thirdparty
     *	@param	int			$type		Should be 1 to say supplier
     *  @return void
     */
    public function get_codefournisseur($objsoc = \null, $type = 1)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Check if a client code is editable based on the parameters of the
     *    code control module.
     *
     *    @return     int		0=No, 1=Yes
     */
    public function codeclient_modifiable()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Check if a vendor code is editable in the code control module configuration
     *
     *    @return     int		0=No, 1=Yes
     */
    public function codefournisseur_modifiable()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Check customer code
     *
     *  @return     int				0 if OK
     * 								-1 ErrorBadCustomerCodeSyntax
     * 								-2 ErrorCustomerCodeRequired
     * 								-3 ErrorCustomerCodeAlreadyUsed
     * 								-4 ErrorPrefixRequired
     * 								-5 NotConfigured - Setup empty so any value may be ok or not
     * 								-6 Other (see this->error)
     */
    public function check_codeclient()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Check supplier code
     *
     *    @return     int		0 if OK
     * 							-1 ErrorBadCustomerCodeSyntax
     * 							-2 ErrorCustomerCodeRequired
     * 							-3 ErrorCustomerCodeAlreadyUsed
     * 							-4 ErrorPrefixRequired
     * 							-5 NotConfigured - Setup empty so any value may be ok or not
     * 							-6 Other (see this->error)
     */
    public function check_codefournisseur()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    	Assigns a accounting code from the accounting code module.
     *      Computed value is stored into this->code_compta_client or this->code_compta_fournisseur according to $type.
     *      May be identical to the one entered or generated automatically. Currently, only the automatic generation is implemented.
     *
     *    	@param	string	$type		Type of thirdparty ('customer' or 'supplier')
     *		@return	int					0 if OK, <0 if $type is not valid
     */
    public function get_codecompta($type)
    {
    }
    /**
     *    Define parent company of current company
     *
     *    @param	int		$id     Id of thirdparty to set or '' to remove
     *    @return	int     		Return integer <0 if KO, >0 if OK
     */
    public function setParent($id)
    {
    }
    /**
     *    Check if a thirdparty $idchild is or not inside the parents (or grand parents) of another thirdparty id $idparent.
     *
     *    @param	int		$idparent	Id of thirdparty to check
     *    @param	int		$idchild	Id of thirdparty to compare to
     *    @param    int     $counter    Counter to protect against infinite loops
     *    @return	int     			Return integer <0 if KO, 0 if OK or 1 if at some level a parent company was the child to compare to
     */
    public function validateFamilyTree($idparent, $idchild, $counter = 0)
    {
    }
    /**
     *	Get parents for company
     *
     * @param   int         $company_id     ID of company to search parent
     * @param   int[]       $parents        List of companies ID found
     * @return	int[]
     */
    public function getParentsForCompany($company_id, $parents = array())
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Returns if a profid should be verified to be unique
     *
     *  @param	int		$idprof		1,2,3,4,5,6 (Example: 1=siren, 2=siret, 3=naf, 4=rcs/rm, 5=eori, 6=idprof6)
     *  @return boolean         	true if the ID must be unique
     */
    public function id_prof_verifiable($idprof)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Verify if a profid exists into database for others thirds
     *
     *    @param	string	$idprof		'idprof1','idprof2','idprof3','idprof4','idprof5','idprof6','email' (Example: idprof1=siren, idprof2=siret, idprof3=naf, idprof4=rcs/rm)
     *    @param	string	$value		Value of profid
     *    @param	int		$socid		Id of thirdparty to exclude (if update)
     *    @return   boolean				True if exists, False if not
     */
    public function id_prof_exists($idprof, $value, $socid = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Check the validity of a professional identifier according to the country of the company (siren, siret, ...)
     *
     *  @param	int			$idprof         1,2,3,4 (Example: 1=siren,2=siret,3=naf,4=rcs/rm)
     *  @param  Societe		$soc            Object societe
     *  @return int             			Return integer <=0 if KO, >0 if OK
     *  TODO better to have this in a lib than into a business class
     */
    public function id_prof_check($idprof, $soc)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *   Return an url to check online a professional id or empty string
     *
     *   @param		int		$idprof         1,2,3,4 (Example: 1=siren,2=siret,3=naf,4=rcs/rm)
     *   @param 	Societe	$thirdparty     Object thirdparty
     *   @return	string          		Url or empty string if no URL known
     *   TODO better in a lib than into business class
     */
    public function id_prof_url($idprof, $thirdparty)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *   Indicates if the company has projects
     *
     *   @return     bool	   true if the company has projects, false otherwise
     */
    public function has_projects()
    {
    }
    /**
     *  Load information for tab info
     *
     *  @param  int		$id     Id of thirdparty to load
     *  @return	void
     */
    public function info($id)
    {
    }
    /**
     *  Check if third party is a company (Business) or an end user (Consumer)
     *
     *  @return		boolean		if a company: true || if a user: false
     */
    public function isACompany()
    {
    }
    /**
     *  Return if a company is inside the EEC (European Economic Community)
     *
     *  @return     boolean		true = country inside EEC, false = country outside EEC
     */
    public function isInEEC()
    {
    }
    /**
     *  Return if a company is inside the SEPA zone (Single Euro Payment Area)
     *
     *  @return     boolean		true = country inside SEPA, false = country outside SEPA
     */
    public function isInSEPA()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Load the list of provider categories
     *
     *  @return    int      0 if success, <> 0 if error
     */
    public function LoadSupplierCateg()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Insert link supplier - category
     *
     *	@param	int		$categorie_id		Id of category
     *  @return int      					0 if success, <> 0 if error
     */
    public function AddFournisseurInCategory($categorie_id)
    {
    }
    /**
     *  Return number of mass Emailing received by this contacts with its email
     *
     *  @return       int     Number of EMailings
     */
    public function getNbOfEMailings()
    {
    }
    /**
     *  Set "blacklist" mailing status
     *
     *  @param	int		$no_email			1=Do not send mailing, 0=Ok to receive mailing
     *  @param	string	$unsubscribegroup	Emailing code ('' by default)
     *  @return int							Return integer <0 if KO, >0 if OK
     */
    public function setNoEmail($no_email, $unsubscribegroup = '')
    {
    }
    /**
     *  get "blacklist" mailing status
     * 	set no_email attribute to 1 or 0
     *
     *  @return int					Return integer <0 if KO, >0 if OK
     */
    public function getNoEmail()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Create a third party into database from a member object
     *
     *  @param	Adherent	$member			Object member
     * 	@param	string		$socname		Name of third party to force
     *	@param	string		$socalias		Alias name of third party to force
     *  @param	string		$customercode	Customer code
     *  @return int							Return integer <0 if KO, id of created account if OK
     */
    public function create_from_member(\Adherent $member, $socname = '', $socalias = '', $customercode = '')
    {
    }
    /**
     * 	Set properties with value into $conf
     *
     * 	@param	Conf	$conf		Conf object (possibility to use another entity)
     * 	@return	void
     */
    public function setMysoc(\Conf $conf)
    {
    }
    /**
     *  Initialise an instance with random values.
     *  Used to build previews or test instances.
     *	id must be 0 if object instance is a specimen.
     *
     *  @return	int >0 if ok
     */
    public function initAsSpecimen()
    {
    }
    /**
     *  Check if we must use localtax feature or not according to country (country of $mysoc in most cases).
     *
     *	@param		int		$localTaxNum	To get info for only localtax1 or localtax2
     *  @return		boolean					true or false
     */
    public function useLocalTax($localTaxNum = 0)
    {
    }
    /**
     *  Check if we must use NPR Vat (french stupid rule) or not according to country (country of $mysoc in most cases).
     *
     *  @return		boolean					true or false
     */
    public function useNPR()
    {
    }
    /**
     *  Check if we must use revenue stamps feature or not according to country (country of $mysoc in most cases).
     *  Table c_revenuestamp contains the country and value of stamp per invoice.
     *
     *  @return		boolean			true or false
     */
    public function useRevenueStamp()
    {
    }
    /**
     *	Return prostect level
     *
     *  @return     string        Label of prospect status
     */
    public function getLibProspLevel()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return label of prospect level
     *
     *  @param	string	$fk_prospectlevel   	Prospect level
     *  @return string        					label of level
     */
    public function LibProspLevel($fk_prospectlevel)
    {
    }
    /**
     *  Return status of prospect
     *
     *  @param	int		$mode       0=label long, 1=label short, 2=Picto + Label short, 3=Picto, 4=Picto + Label long
     *  @param	string	$label		Label to use for status for added status
     *  @return string        		Label
     */
    public function getLibProspCommStatut($mode = 0, $label = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return label of a given status
     *
     *  @param	int|string	$status        	Id or code for prospection status
     *  @param  int			$mode          	0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto
     *  @param	string		$label			Label to use for status for added status
     *	@param 	string		$picto      	Name of image file to show ('filenew', ...)
     *                                      If no extension provided, we use '.png'. Image must be stored into theme/xxx/img directory.
     *                                      Example: picto.png                  if picto.png is stored into htdocs/theme/mytheme/img
     *                                      Example: picto.png@mymodule         if picto.png is stored into htdocs/mymodule/img
     *                                      Example: /mydir/mysubdir/picto.png  if picto.png is stored into htdocs/mydir/mysubdir (pictoisfullpath must be set to 1)
     *  @return string       	 			Label of prospection status
     */
    public function LibProspCommStatut($status, $mode = 0, $label = '', $picto = '')
    {
    }
    /**
     *  Return amount of proposal not yet paid and total an dlist of all proposals
     *
     *  @param     'customer'|'supplier'	$mode	'customer' or 'supplier'
     *  @return    array{opened:float,total_ht:float,total_ttc:float}|array{}	array('opened'=>Amount including tax that remains to pay, 'total_ht'=>Total amount without tax of all objects paid or not, 'total_ttc'=>Total amount including tax of all object paid or not)
     */
    public function getOutstandingProposals($mode = 'customer')
    {
    }
    /**
     *  Return amount of order not yet paid and total and list of all orders
     *
     *  @param     'customer'|'supplier'|''	$mode	'customer' or 'supplier'
     *  @return    array{opened:float,total_ht:float,total_ttc:float}|array{}	array('opened'=>Amount including tax that remains to pay, 'total_ht'=>Total amount without tax of all objects paid or not, 'total_ttc'=>Total amount including tax of all object paid or not)
     */
    public function getOutstandingOrders($mode = 'customer')
    {
    }
    /**
     *  Return amount of bill not yet paid and total of all invoices
     *
     *  @param     'customer'|'supplier'|''	$mode	'customer' or 'supplier'
     *  @param     int<0,1>					$late    	0 => all invoice, 1=> only late
     *  @return    array{opened:float,total_ht:float,total_ttc:float}|array{}	array('opened'=>Amount including tax that remains to pay, 'total_ht'=>Total amount without tax of all objects paid or not, 'total_ttc'=>Total amount including tax of all object paid or not)
     */
    public function getOutstandingBills($mode = 'customer', $late = 0)
    {
    }
    /**
     * Return label of status customer is prospect/customer
     *
     * @return   string        	Label
     * @see getTypeUrl()
     */
    public function getLibCustProspStatut()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return the label of the customer/prospect status
     *
     *  @param	int		$status         Id of prospection status
     *  @return	string          		Label of prospection status
     */
    public function LibCustProspStatut($status)
    {
    }
    /**
     *  Create a document onto disk according to template module.
     *
     *	@param	string					$modele			Generator to use. Caller must set it to obj->model_pdf.
     *	@param	Translate				$outputlangs	object lang a utiliser pour traduction
     *  @param  int<0,1>				$hidedetails    Hide details of lines
     *  @param  int<0,1>				$hidedesc       Hide description
     *  @param  int<0,1>				$hideref        Hide ref
     *  @param  ?array<string,mixed>	$moreparams	Array to provide more information
     *	@return int        							Return integer <0 if KO, >0 if OK
     */
    public function generateDocument($modele, $outputlangs, $hidedetails = 0, $hidedesc = 0, $hideref = 0, $moreparams = \null)
    {
    }
    /**
     * Sets object to supplied categories.
     *
     * Deletes object from existing categories not supplied.
     * Adds it to non existing supplied categories.
     * Existing categories are left untouch.
     *
     * @param 	int[]|int 	$categories 	Category ID or array of Categories IDs
     * @param 	string 		$type_categ 	Category type ('customer' or 'supplier')
     * @return	int							Return integer <0 if KO, >0 if OK
     */
    public function setCategories($categories, $type_categ)
    {
    }
    /**
     * Sets sales representatives of the thirdparty
     *
     * @param 	int[]|int 	$salesrep	 	User ID or array of user IDs
     * @param   bool        $onlyAdd        Only add (no delete before)
     * @return	int<-1,1>					Return integer <0 if KO, >0 if OK
     */
    public function setSalesRep($salesrep, $onlyAdd = \false)
    {
    }
    /**
     *    Define third-party type of current company
     *
     *    @param	int		$typent_id	third party type rowid in llx_c_typent
     *    @return	int     			Return integer <0 if KO, >0 if OK
     */
    public function setThirdpartyType($typent_id)
    {
    }
    /**
     * Function used to replace a thirdparty id with another one.
     * It must be used within a transaction to avoid trouble
     *
     * @param 	DoliDB 	$dbs 		Database handler, because function is static we name it $dbs not $db to avoid breaking coding test
     * @param 	int 	$origin_id 	Old thirdparty id (will be removed)
     * @param 	int 	$dest_id 	New thirdparty id
     * @return 	bool				True if success, False if error
     */
    public static function replaceThirdparty(\DoliDB $dbs, $origin_id, $dest_id)
    {
    }
    /**
     * Sets an accountancy code for a thirdparty.
     * Also calls COMPANY_MODIFY trigger when modified
     *
     * @param   string  $type   It can be only 'buy' or 'sell'
     * @param   string  $value  Accountancy code
     * @return  int             Return integer <0 KO >0 OK
     */
    public function setAccountancyCode($type, $value)
    {
    }
    /**
     *	Function to get partnerships array
     *
     *  @param		string		$mode		'member' or 'thirdparty'
     *	@return		int						Return integer <0 if KO, >0 if OK
     */
    public function fetchPartnerships($mode)
    {
    }
    /**
     *	Return clickable link of object (with optional picto)
     *
     *	@param	string				$option			Where point the link (0=> main card, 1,2 => shipment, 'nolink'=>No link)
     *  @param	array<string,mixed>	$arraydata		Array of data
     *  @return	string								HTML Code for Kanban thumb.
     */
    public function getKanbanView($option = '', $arraydata = array())
    {
    }
    /**
     *    Get array of all contacts for a society (stored in societe_contacts instead of element_contacts for all other objects)
     *
     *    @param	int         $list       0:Return array contains all properties, 1:Return array contains just id
     *    @param    string      $code       Filter on this code of contact type ('SHIPPING', 'BILLING', ...)
     *	  @param    string      $element    Filter on this element of default contact type ('facture', 'propal', 'commande' ...)
     *    @return	array|int		        Array of contacts, -1 if error
     */
    public function getContacts($list = 0, $code = '', $element = '')
    {
    }
    /**
     *    Merge a company with current one, deleting the given company $soc_origin_id.
     *    The company given in parameter will be removed.
     *    This is called for example by the societe/card.php file.
     *    It calls the method replaceThirdparty() of each object with relation with thirdparties,
     *    including hook 'replaceThirdparty' for external modules.
     *
     *    @param	int     $soc_origin_id		Company to merge the data from
     *    @return	int							-1 if error, >=0 if OK
     */
    public function mergeCompany($soc_origin_id)
    {
    }
}
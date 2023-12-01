<?php

/**
 *	Class to manage third parties objects (customers, suppliers, prospects...)
 */
class Societe extends \CommonObject
{
    use \CommonIncoterm;
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
     * @var array	List of child tables. To test if we can delete object.
     */
    protected $childtables = array("supplier_proposal" => 'SupplierProposal', "propal" => 'Proposal', "commande" => 'Order', "facture" => 'Invoice', "facture_rec" => 'RecurringInvoiceTemplate', "contrat" => 'Contract', "fichinter" => 'Fichinter', "facture_fourn" => 'SupplierInvoice', "commande_fournisseur" => 'SupplierOrder', "projet" => 'Project', "expedition" => 'Shipment', "prelevement_lignes" => 'DirectDebitRecord');
    /**
     * @var array    List of child tables. To know object to delete on cascade.
     *               if name like with @ClassName:FilePathClass:ParentFkFieldName' it will call method deleteByParentField (with parentId as parameters) and FieldName to fetch and delete child object
     */
    protected $childtablesoncascade = array("societe_prices", "societe_address", "product_fournisseur_price", "product_customer_price_log", "product_customer_price", "@Contact:/contact/class/contact.class.php:fk_soc", "adherent", "societe_account", "societe_rib", "societe_remise", "societe_remise_except", "societe_commerciaux", "categorie", "notify", "notify_def", "actioncomm");
    /**
     * @var string String with name of icon for myobject. Must be the part after the 'object_' into object_myobject.png
     */
    public $picto = 'company';
    /**
     * 0=No test on entity, 1=Test with field entity, 2=Test with link by societe
     * @var int
     */
    public $ismultientitymanaged = 1;
    /**
     * 0=Default, 1=View may be restricted to sales representative only if no permission to see all or to company of external user if external user
     * @var integer
     */
    public $restrictiononfksoc = 1;
    /**
     *  'type' field format ('integer', 'integer:ObjectClass:PathToClass[:AddCreateButtonOrNot[:Filter]]', 'sellist:TableName:LabelFieldName[:KeyFieldName[:KeyFieldParent[:Filter]]]', 'varchar(x)', 'double(24,8)', 'real', 'price', 'text', 'text:none', 'html', 'date', 'datetime', 'timestamp', 'duration', 'mail', 'phone', 'url', 'password')
     *         Note: Filter can be a string like "(t.ref:like:'SO-%') or (t.date_creation:<:'20160101') or (t.nature:is:NULL)"
     *  'label' the translation key.
     *  'picto' is code of a picto to show before value in forms
     *  'enabled' is a condition when the field must be managed (Example: 1 or '$conf->global->MY_SETUP_PARAM)
     *  'position' is the sort order of field.
     *  'notnull' is set to 1 if not null in database. Set to -1 if we must set data to null if empty ('' or 0).
     *  'visible' says if field is visible in list (Examples: 0=Not visible, 1=Visible on list and create/update/view forms, 2=Visible on list only, 3=Visible on create/update/view form only (not list), 4=Visible on list and update/view form only (not create). 5=Visible on list and view only (not create/not update). Using a negative value means field is not shown by default on list but can be selected for viewing)
     *  'noteditable' says if field is not editable (1 or 0)
     *  'default' is a default value for creation (can still be overwrote by the Setup of Default Values if field is editable in creation form). Note: If default is set to '(PROV)' and field is 'ref', the default value will be set to '(PROVid)' where id is rowid when a new record is created.
     *  'index' if we want an index in database.
     *  'foreignkey'=>'tablename.field' if the field is a foreign key (it is recommanded to name the field fk_...).
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
     * @var array  Array with all fields and their property. Do not use it as a static var. It may be modified by constructor.
     */
    public $fields = array(
        'rowid' => array('type' => 'integer', 'label' => 'TechnicalID', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 10),
        'parent' => array('type' => 'integer', 'label' => 'Parent', 'enabled' => 1, 'visible' => -1, 'position' => 20),
        'tms' => array('type' => 'timestamp', 'label' => 'DateModification', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 25),
        'datec' => array('type' => 'datetime', 'label' => 'DateCreation', 'enabled' => 1, 'visible' => -1, 'position' => 30),
        'nom' => array('type' => 'varchar(128)', 'label' => 'Nom', 'enabled' => 1, 'visible' => -1, 'position' => 35, 'showoncombobox' => 1),
        'name_alias' => array('type' => 'varchar(128)', 'label' => 'Name alias', 'enabled' => 1, 'visible' => -1, 'position' => 36, 'showoncombobox' => 2),
        'entity' => array('type' => 'integer', 'label' => 'Entity', 'default' => 1, 'enabled' => 1, 'visible' => -2, 'notnull' => 1, 'position' => 40, 'index' => 1),
        'ref_ext' => array('type' => 'varchar(255)', 'label' => 'RefExt', 'enabled' => 1, 'visible' => 0, 'position' => 45),
        'code_client' => array('type' => 'varchar(24)', 'label' => 'CustomerCode', 'enabled' => 1, 'visible' => -1, 'position' => 55),
        'code_fournisseur' => array('type' => 'varchar(24)', 'label' => 'SupplierCode', 'enabled' => 1, 'visible' => -1, 'position' => 60),
        'code_compta' => array('type' => 'varchar(24)', 'label' => 'CodeCompta', 'enabled' => 1, 'visible' => -1, 'position' => 65),
        'code_compta_fournisseur' => array('type' => 'varchar(24)', 'label' => 'CodeComptaSupplier', 'enabled' => 1, 'visible' => -1, 'position' => 70),
        'address' => array('type' => 'varchar(255)', 'label' => 'Address', 'enabled' => 1, 'visible' => -1, 'position' => 75),
        'zip' => array('type' => 'varchar(25)', 'label' => 'Zip', 'enabled' => 1, 'visible' => -1, 'position' => 80),
        'town' => array('type' => 'varchar(50)', 'label' => 'Town', 'enabled' => 1, 'visible' => -1, 'position' => 85),
        'fk_departement' => array('type' => 'integer', 'label' => 'State', 'enabled' => 1, 'visible' => -1, 'position' => 90),
        'fk_pays' => array('type' => 'integer:Ccountry:core/class/ccountry.class.php', 'label' => 'Country', 'enabled' => 1, 'visible' => -1, 'position' => 95),
        'phone' => array('type' => 'varchar(20)', 'label' => 'Phone', 'enabled' => 1, 'visible' => -1, 'position' => 100),
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
        'note_public' => array('type' => 'text', 'label' => 'NotePublic', 'enabled' => 1, 'visible' => 0, 'position' => 225),
        'note_private' => array('type' => 'text', 'label' => 'NotePrivate', 'enabled' => 1, 'visible' => 0, 'position' => 230),
        'prefix_comm' => array('type' => 'varchar(5)', 'label' => 'Prefix comm', 'enabled' => '$conf->global->SOCIETE_USEPREFIX', 'visible' => -1, 'position' => 235),
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
        'mode_reglement_supplier' => array('type' => 'integer', 'label' => 'Mode reglement supplier', 'enabled' => 1, 'visible' => -1, 'position' => 305),
        'cond_reglement_supplier' => array('type' => 'integer', 'label' => 'Cond reglement supplier', 'enabled' => 1, 'visible' => -1, 'position' => 308),
        'outstanding_limit' => array('type' => 'double(24,8)', 'label' => 'OutstandingBill', 'enabled' => 1, 'visible' => -1, 'position' => 310, 'isameasure' => 1),
        'order_min_amount' => array('type' => 'double(24,8)', 'label' => 'Order min amount', 'enabled' => '!empty($conf->commande->enabled) && !empty($conf->global->ORDER_MANAGE_MIN_AMOUNT)', 'visible' => -1, 'position' => 315, 'isameasure' => 1),
        'supplier_order_min_amount' => array('type' => 'double(24,8)', 'label' => 'Supplier order min amount', 'enabled' => '!empty($conf->commande->enabled) && !empty($conf->global->ORDER_MANAGE_MIN_AMOUNT)', 'visible' => -1, 'position' => 320, 'isameasure' => 1),
        'fk_shipping_method' => array('type' => 'integer', 'label' => 'Fk shipping method', 'enabled' => 1, 'visible' => -1, 'position' => 330),
        'tva_assuj' => array('type' => 'tinyint(4)', 'label' => 'Tva assuj', 'enabled' => 1, 'visible' => -1, 'position' => 335),
        'localtax1_assuj' => array('type' => 'tinyint(4)', 'label' => 'Localtax1 assuj', 'enabled' => 1, 'visible' => -1, 'position' => 340),
        'localtax1_value' => array('type' => 'double(6,3)', 'label' => 'Localtax1 value', 'enabled' => 1, 'visible' => -1, 'position' => 345),
        'localtax2_assuj' => array('type' => 'tinyint(4)', 'label' => 'Localtax2 assuj', 'enabled' => 1, 'visible' => -1, 'position' => 350),
        'localtax2_value' => array('type' => 'double(6,3)', 'label' => 'Localtax2 value', 'enabled' => 1, 'visible' => -1, 'position' => 355),
        'barcode' => array('type' => 'varchar(255)', 'label' => 'Barcode', 'enabled' => 1, 'visible' => -1, 'position' => 360),
        'price_level' => array('type' => 'integer', 'label' => 'Price level', 'enabled' => '$conf->global->PRODUIT_MULTIPRICES || $conf->global->PRODUIT_CUSTOMER_PRICES_BY_QTY_MULTIPRICES', 'visible' => -1, 'position' => 365),
        'default_lang' => array('type' => 'varchar(6)', 'label' => 'Default lang', 'enabled' => 1, 'visible' => -1, 'position' => 370),
        'canvas' => array('type' => 'varchar(32)', 'label' => 'Canvas', 'enabled' => 1, 'visible' => -1, 'position' => 375),
        'fk_barcode_type' => array('type' => 'integer', 'label' => 'Fk barcode type', 'enabled' => 1, 'visible' => -1, 'position' => 405),
        'webservices_url' => array('type' => 'varchar(255)', 'label' => 'Webservices url', 'enabled' => 1, 'visible' => -1, 'position' => 410),
        'webservices_key' => array('type' => 'varchar(128)', 'label' => 'Webservices key', 'enabled' => 1, 'visible' => -1, 'position' => 415),
        'fk_incoterms' => array('type' => 'integer', 'label' => 'Fk incoterms', 'enabled' => 1, 'visible' => -1, 'position' => 425),
        'location_incoterms' => array('type' => 'varchar(255)', 'label' => 'Location incoterms', 'enabled' => 1, 'visible' => -1, 'position' => 430),
        'model_pdf' => array('type' => 'varchar(255)', 'label' => 'Model pdf', 'enabled' => 1, 'visible' => 0, 'position' => 435),
        'fk_multicurrency' => array('type' => 'integer', 'label' => 'Fk multicurrency', 'enabled' => 1, 'visible' => -1, 'position' => 440),
        'multicurrency_code' => array('type' => 'varchar(255)', 'label' => 'Multicurrency code', 'enabled' => 1, 'visible' => -1, 'position' => 445),
        'fk_account' => array('type' => 'integer', 'label' => 'AccountingAccount', 'enabled' => 1, 'visible' => -1, 'position' => 450),
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
     * @var string
     * @deprecated Use $name instead
     * @see $name
     */
    public $nom;
    /**
     * @var string Thirdparty name
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
     * @var string Address
     */
    public $address;
    /**
     * @var string Zip code of thirdparty
     */
    public $zip;
    /**
     * @var string Town of thirdparty
     */
    public $town;
    /**
     * Thirdparty status : 0=activity ceased, 1= in activity
     * @var int
     */
    public $status = 1;
    /**
     * Id of department
     * @var int
     */
    public $state_id;
    /**
     * @var string State code
     */
    public $state_code;
    /**
     * @var string State name
     */
    public $state;
    /**
     * Id of region
     * @var int
     */
    public $region_code;
    /**
     * @var string Region name
     */
    public $region;
    /**
     * @var string State code
     * @deprecated Use state_code instead
     * @see $state_code
     */
    public $departement_code;
    /**
     * @var string
     * @deprecated Use state instead
     * @see $state
     */
    public $departement;
    /**
     * @var string
     * @deprecated Use country instead
     * @see $country
     */
    public $pays;
    /**
     * Phone number
     * @var string
     */
    public $phone;
    /**
     * Fax number
     * @var string
     */
    public $fax;
    /**
     * Email
     * @var string
     */
    public $email;
    /**
     * @var array array of socialnetworks
     */
    public $socialnetworks;
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
     * @var string
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
     * @var string
     */
    public $idprof1;
    /**
     * Professional ID 2 (Ex: Siret in France)
     * @var string
     */
    public $idprof2;
    /**
     * Professional ID 3 (Ex: Ape in France)
     * @var string
     */
    public $idprof3;
    /**
     * Professional ID 4 (Ex: RCS in France)
     * @var string
     */
    public $idprof4;
    /**
     * Professional ID 5
     * @var string
     */
    public $idprof5;
    /**
     * Professional ID 6
     * @var string
     */
    public $idprof6;
    /**
     * @var string Prefix comm
     */
    public $prefix_comm;
    /**
     * @var int Vat concerned
     */
    public $tva_assuj = 1;
    /**
     * Intracommunitary VAT ID
     * @var string
     */
    public $tva_intra;
    // Local taxes
    public $localtax1_assuj;
    public $localtax1_value;
    public $localtax2_assuj;
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
    public $typent_code;
    public $effectif;
    public $effectif_id = 0;
    public $forme_juridique_code;
    public $forme_juridique = 0;
    public $remise_percent;
    public $remise_supplier_percent;
    public $mode_reglement_supplier_id;
    public $cond_reglement_supplier_id;
    public $transport_mode_supplier_id;
    /**
     * @var int ID
     */
    public $fk_prospectlevel;
    /**
     * @var string second name
     */
    public $name_bis;
    //Log data
    /**
     * Date of last update
     * @var string
     */
    public $date_modification;
    /**
     * User that made last update
     * @var string
     */
    public $user_modification;
    /**
     * @var integer|string date_creation
     */
    public $date_creation;
    /**
     * User that created the thirdparty
     * @var User
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
     * @var string
     */
    public $code_client;
    /**
     * Supplier code. E.g: SU2014-003
     * @var string
     */
    public $code_fournisseur;
    /**
     * Accounting code for client
     * @var string
     */
    public $code_compta_client;
    /**
     * Duplicate of code_compta_client (for backward compatibility)
     * @var string
     */
    public $code_compta;
    /**
     * Accounting code for customer
     * @var string
     */
    public $accountancy_code_customer;
    /**
     * Accounting code for supplier
     * @var string
     */
    public $code_compta_fournisseur;
    /**
     * Accounting code for supplier
     * @var string
     */
    public $accountancy_code_supplier;
    /**
     * Accounting code for product (for level 3 of suggestion of prouct accounting account)
     * @var string
     */
    public $code_compta_product;
    /**
     * @var string
     * @deprecated Note is split in public and private notes
     * @see $note_public, $note_private
     */
    public $note;
    /**
     * Private note
     * @var string
     */
    public $note_private;
    /**
     * Public note
     * @var string
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
     * @var string Internal ref
     * @deprecated
     */
    public $ref_int;
    /**
     * External user reference.
     * This is to allow external systems to store their id and make self-developed synchronizing functions easier to build.
     * @var string
     */
    public $ref_ext;
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
    // Multicurrency
    /**
     * @var int ID
     */
    public $fk_multicurrency;
    // Warehouse
    /**
     * @var int ID
     */
    public $fk_warehouse;
    /**
     * @var string Multicurrency code
     */
    public $multicurrency_code;
    // Fields loaded by fetchPartnerships()
    public $partnerships = array();
    /**
     * @var Account|string Default BAN account
     */
    public $bank_account;
    /**
     * Third party is no customer
     */
    const NO_CUSTOMER = 0;
    /**
     * Third party is a customer
     */
    const CUSTOMER = 1;
    /**
     * Third party is a prospect
     */
    const PROSPECT = 2;
    /**
     * Third party is a customer and a prospect
     */
    const CUSTOMER_AND_PROSPECT = 3;
    /**
     * Third party is no supplier
     */
    const NO_SUPPLIER = 0;
    /**
     * Third party is a supplier
     */
    const SUPPLIER = 1;
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
     *    $this->code_client = -1 and $this->code_fournisseur = -1 means automatic assignement.
     *
     *    @param	User	$user       Object of user that ask creation
     *    @return   int         		>=0 if OK, <0 if KO
     */
    public function create(\User $user)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Create a contact/address from thirdparty
     *
     * @param 	User	$user		Object user
     * @param 	int		$no_email	1=Do not send mailing, 0=Ok to recieve mailling
     * @param 	array	$tags		Array of tag to affect to contact
     * @return 	int					<0 if KO, >0 if OK
     */
    public function create_individual(\User $user, $no_email = 0, $tags = array())
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
     *      @return int  			           			<0 if KO, >=0 if OK
     */
    public function update($id, $user = '', $call_trigger = 1, $allowmodcodeclient = 0, $allowmodcodefournisseur = 0, $action = 'update', $nosyncmember = 1)
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
     *    @return   int						>0 if OK, <0 if KO or if two records found for same ref or idprof, 0 if not found.
     */
    public function fetch($rowid, $ref = '', $ref_ext = '', $barcode = '', $idprof1 = '', $idprof2 = '', $idprof3 = '', $idprof4 = '', $idprof5 = '', $idprof6 = '', $email = '', $ref_alias = '')
    {
    }
    /**
     *    Delete a third party from database and all its dependencies (contacts, rib...)
     *
     *    @param	int		$id             Id of third party to delete
     *    @param    User    $fuser          User who ask to delete thirdparty
     *    @param    int		$call_trigger   0=No, 1=yes
     *    @return	int						<0 if KO, 0 if nothing done, >0 if OK
     */
    public function delete($id, \User $fuser = \null, $call_trigger = 1)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Define third party as a customer
     *
     *	@return		int		<0 if KO, >0 if OK
     */
    public function set_as_client()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Defines the company as a customer
     *
     *  @param	float	$remise		Value in % of the discount
     *  @param  string	$note		Note/Reason for changing the discount
     *  @param  User	$user		User who sets the discount
     *	@return	int					<0 if KO, >0 if OK
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
     *	@return	int					<0 if KO, >0 if OK
     */
    public function set_remise_supplier($remise, $note, \User $user)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    	Add a discount for third party
     *
     *    	@param	float	$remise     	Amount of discount
     *    	@param  User	$user       	User adding discount
     *    	@param  string	$desc			Reason of discount
     *      @param  string	$vatrate     	VAT rate (may contain the vat code too). Exemple: '1.23', '1.23 (ABC)', ...
     *      @param	int		$discount_type	0 => customer discount, 1 => supplier discount
     *		@return	int						<0 if KO, id of discount record if OK
     */
    public function set_remise_except($remise, \User $user, $desc, $vatrate = '', $discount_type = 0)
    {
    }
    /**
     * 	Returns amount of included taxes of the current discounts/credits available from the company
     *
     *	@param	User	$user			Filter on a user author of discounts
     * 	@param	string	$filter			Other filter
     * 	@param	integer	$maxvalue		Filter on max value for discount
     * 	@param	int		$discount_type	0 => customer discount, 1 => supplier discount
     *	@return	int					<0 if KO, Credit note amount otherwise
     */
    public function getAvailableDiscounts($user = '', $filter = '', $maxvalue = 0, $discount_type = 0)
    {
    }
    /**
     *  Return array of sales representatives
     *
     *  @param	User		$user			Object user (not used)
     *  @param	int			$mode			0=Array with properties, 1=Array of id.
     *  @param	string		$sortfield		List of sort fields, separated by comma. Example: 't1.fielda,t2.fieldb'
     *  @param	string		$sortorder		Sort order, separated by comma. Example: 'ASC,DESC';
     *  @return array       				Array of sales representatives of third party
     */
    public function getSalesRepresentatives(\User $user, $mode = 0, $sortfield = \null, $sortorder = \null)
    {
    }
    /**
     * Set the price level
     *
     * @param 	int		$price_level	Level of price
     * @param 	User	$user			Use making change
     * @return	int						<0 if KO, >0 if OK
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
     *	@return	int					<=0 if KO, >0 if OK
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
     *	@return	void
     */
    public function del_commercial(\User $user, $commid)
    {
    }
    /**
     *    	Return a link on thirdparty (with picto)
     *
     *		@param	int		$withpicto		          Add picto into link (0=No picto, 1=Include picto with link, 2=Picto only)
     *		@param	string	$option			          Target of link ('', 'customer', 'prospect', 'supplier', 'project')
     *		@param	int		$maxlen			          Max length of name
     *      @param	int  	$notooltip		          1=Disable tooltip
     *      @param  int     $save_lastsearch_value    -1=Auto, 0=No save of lastsearch_values when clicking, 1=Save lastsearch_values whenclicking
     *      @param	int		$noaliasinname			  1=Do not add alias into the link ref
     *		@return	string					          String with URL
     */
    public function getNomUrl($withpicto = 0, $option = '', $maxlen = 0, $notooltip = 0, $save_lastsearch_value = -1, $noaliasinname = 0)
    {
    }
    /**
     *    	Return link(s) on type of thirdparty (with picto)
     *
     *		@param	int		$withpicto		          Add picto into link (0=No picto, 1=Include picto with link, 2=Picto only)
     *		@param	string	$option					  ''=All
     *      @param	int  	$notooltip		          1=Disable tooltip
     *		@return	string					          String with URL
     */
    public function getTypeUrl($withpicto = 0, $option = '', $notooltip = 0)
    {
    }
    /**
     *    Return label of status (activity, closed)
     *
     *    @param  	int		$mode       0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 6=Long label + Picto
     *    @return   string     	   		Label of status
     */
    public function getLibStatut($mode = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return the label of a given status
     *
     *  @param	int		$status         Status id
     *  @param	int		$mode           0=Long label, 1=Short label, 2=Picto + Short label, 3=Picto, 4=Picto + Long label, 5=Short label + Picto, 6=Long label + Picto
     *  @return	string          		Status label
     */
    public function LibStatut($status, $mode = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Return list of contacts emails existing for third party
     *
     *	  @param	  int		$addthirdparty		1=Add also a record for thirdparty email
     *    @return     array       					Array of contacts emails
     */
    public function thirdparty_and_contact_email_array($addthirdparty = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Return list of contacts mobile phone existing for third party
     *
     *    @return     array       Array of contacts emails
     */
    public function thirdparty_and_contact_phone_array()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return list of contacts emails or mobile existing for third party
     *
     *  @param	string	$mode       		'email' or 'mobile'
     * 	@param	int		$hidedisabled		1=Hide contact if disabled
     *  @return array       				Array of contacts emails or mobile. Example: array(id=>'Name <email>')
     */
    public function contact_property_array($mode = 'email', $hidedisabled = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Returns the contact list of this company
     *
     *    @return     array      array of contacts
     */
    public function contact_array()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Returns the contact list of this company
     *
     *    @return    array    $contacts    array of contacts
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
     * @return     array|int        0 if KO, Array of CompanyBanckAccount if OK
     */
    public function get_all_rib()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Assigns a customer code from the code control module.
     *  Return value is stored into this->code_client
     *
     *	@param	Societe		$objsoc		Object thirdparty
     *	@param	int			$type		Should be 0 to say customer
     *  @return void
     */
    public function get_codeclient($objsoc = 0, $type = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Assigns a vendor code from the code control module.
     *  Return value is stored into this->code_fournisseur
     *
     *	@param	Societe		$objsoc		Object thirdparty
     *	@param	int			$type		Should be 1 to say supplier
     *  @return void
     */
    public function get_codefournisseur($objsoc = 0, $type = 1)
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
     *      Computed value is stored into this->code_compta or this->code_compta_fournisseur according to $type.
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
     *    @return	int     		<0 if KO, >0 if OK
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
     *    @return	int     			<0 if KO, 0 if OK or 1 if at some level a parent company was the child to compare to
     */
    public function validateFamilyTree($idparent, $idchild, $counter = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Returns if a profid sould be verified to be unique
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
     *  @param	int			$idprof         1,2,3,4 (Exemple: 1=siren,2=siret,3=naf,4=rcs/rm)
     *  @param  Societe		$soc            Objet societe
     *  @return int             			<=0 if KO, >0 if OK
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
     *  Return if third party is a company (Business) or an end user (Consumer)
     *
     *  @return    boolean     true=is a company, false=a and user
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
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Create a third party into database from a member object
     *
     *  @param	Adherent	$member			Object member
     * 	@param	string		$socname		Name of third party to force
     *	@param	string		$socalias		Alias name of third party to force
     *  @param	string		$customercode	Customer code
     *  @return int							<0 if KO, id of created account if OK
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
     *  Check if we must use revenue stamps feature or not according to country (country of $mysocin most cases).
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
     *  @return     string        Libelle
     */
    public function getLibProspLevel()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return label of prospect level
     *
     *  @param	int		$fk_prospectlevel   	Prospect level
     *  @return string        					label of level
     */
    public function LibProspLevel($fk_prospectlevel)
    {
    }
    /**
     *  Return status of prospect
     *
     *  @param	int		$mode       0=libelle long, 1=libelle court, 2=Picto + Libelle court, 3=Picto, 4=Picto + Libelle long
     *  @param	string	$label		Label to use for status for added status
     *  @return string        		Libelle
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
     *  @param     string      $mode    'customer' or 'supplier'
     *  @return    array				array('opened'=>Amount including tax that remains to pay, 'total_ht'=>Total amount without tax of all objects paid or not, 'total_ttc'=>Total amunt including tax of all object paid or not)
     */
    public function getOutstandingProposals($mode = 'customer')
    {
    }
    /**
     *  Return amount of order not yet paid and total and list of all orders
     *
     *  @param     string      $mode    'customer' or 'supplier'
     *  @return    array				array('opened'=>Amount including tax that remains to pay, 'total_ht'=>Total amount without tax of all objects paid or not, 'total_ttc'=>Total amunt including tax of all object paid or not)
     */
    public function getOutstandingOrders($mode = 'customer')
    {
    }
    /**
     *  Return amount of bill not yet paid and total of all invoices
     *
     *  @param     string   $mode    	'customer' or 'supplier'
     *  @param     int      $late    	0 => all invoice, 1=> only late
     *  @return    array				array('opened'=>Amount including tax that remains to pay, 'total_ht'=>Total amount without tax of all objects paid or not, 'total_ttc'=>Total amunt including tax of all object paid or not)
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
     *	@param	string		$modele			Generator to use. Caller must set it to obj->model_pdf or GETPOST('model','alpha') for example.
     *	@param	Translate	$outputlangs	objet lang a utiliser pour traduction
     *  @param  int			$hidedetails    Hide details of lines
     *  @param  int			$hidedesc       Hide description
     *  @param  int			$hideref        Hide ref
     *  @param  null|array  $moreparams     Array to provide more information
     *	@return int        					<0 if KO, >0 if OK
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
     * @param 	string 		$type_categ 			Category type ('customer' or 'supplier')
     * @return	int							<0 if KO, >0 if OK
     */
    public function setCategories($categories, $type_categ)
    {
    }
    /**
     * Sets sales representatives of the thirdparty
     *
     * @param 	int[]|int 	$salesrep	 	User ID or array of user IDs
     * @param   bool        $onlyAdd        Only add (no delete before)
     * @return	int							<0 if KO, >0 if OK
     */
    public function setSalesRep($salesrep, $onlyAdd = \false)
    {
    }
    /**
     *    Define third-party type of current company
     *
     *    @param	int		$typent_id	third party type rowid in llx_c_typent
     *    @return	int     			<0 if KO, >0 if OK
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
     * @return  int             <0 KO >0 OK
     */
    public function setAccountancyCode($type, $value)
    {
    }
    /**
     *	Function to get partnerships array
     *
     *  @param		string		$mode		'member' or 'thirdparty'
     *	@return		int						<0 if KO, >0 if OK
     */
    public function fetchPartnerships($mode)
    {
    }
}
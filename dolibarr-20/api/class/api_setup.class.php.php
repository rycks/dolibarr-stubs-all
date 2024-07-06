<?php

/**
 * API class for dictionaries
 *
 * @access protected
 * @class DolibarrApiAccess {@requires user,external}
 */
class Setup extends \DolibarrApi
{
    private $translations = \null;
    /**
     * Constructor
     */
    public function __construct()
    {
    }
    /**
     * Get the list of ordering methods.
     *
     * @param string    $sortfield  Sort field
     * @param string    $sortorder  Sort order
     * @param int       $limit      Number of items per page
     * @param int       $page       Page number {@min 0}
     * @param int       $active     Payment type is active or not {@min 0} {@max 1}
     * @param string    $sqlfilters SQL criteria to filter with. Syntax example "(t.code:=:'OrderByWWW')"
     *
     * @url     GET dictionary/ordering_methods
     *
     * @return array [List of ordering methods]
     *
     * @throws	RestException	400		Bad value for sqlfilters
     * @throws	RestException	403		Access denied
     * @throws	RestException	503		Error retrieving list of ordering methods
     */
    public function getOrderingMethods($sortfield = "code", $sortorder = 'ASC', $limit = 100, $page = 0, $active = 1, $sqlfilters = '')
    {
    }
    /**
     * Get the list of ordering origins.
     *
     * @param string    $sortfield  Sort field
     * @param string    $sortorder  Sort order
     * @param int       $limit      Number of items per page
     * @param int       $page       Page number {@min 0}
     * @param int       $active     Payment type is active or not {@min 0} {@max 1}
     * @param string    $sqlfilters SQL criteria to filter with. Syntax example "(t.code:=:'OrderByWWW')"
     * @return array [List of ordering reasons]
     *
     * @url     GET dictionary/ordering_origins
     *
     * @throws	RestException	400		Bad value for sqlfilters
     * @throws	RestException	403		Access denied
     * @throws	RestException	503		Error retrieving list of ordering origins
     */
    public function getOrderingOrigins($sortfield = "code", $sortorder = 'ASC', $limit = 100, $page = 0, $active = 1, $sqlfilters = '')
    {
    }
    /**
     * Get the list of payments types.
     *
     * @param string    $sortfield  Sort field
     * @param string    $sortorder  Sort order
     * @param int       $limit      Number of items per page
     * @param int       $page       Page number {@min 0}
     * @param int       $active     Payment type is active or not {@min 0} {@max 1}
     * @param string    $sqlfilters SQL criteria to filter with. Syntax example "(t.code:=:'CHQ')"
     *
     * @url     GET dictionary/payment_types
     *
     * @return array [List of payment types]
     *
     * @throws	RestException	400		Bad value for sqlfilters
     * @throws	RestException	403		Access denied
     * @throws	RestException	503		Error retrieving list of payment types
     */
    public function getPaymentTypes($sortfield = "code", $sortorder = 'ASC', $limit = 100, $page = 0, $active = 1, $sqlfilters = '')
    {
    }
    /**
     * Get the list of regions.
     *
     * The returned list is sorted by region ID.
     *
     * @param string    $sortfield  Sort field
     * @param string    $sortorder  Sort order
     * @param int       $limit      Number of items per page
     * @param int       $page       Page number (starting from zero)
     * @param int       $country    To filter on country
     * @param string    $filter     To filter the regions by name
     * @param string    $sqlfilters Other criteria to filter answers separated by a comma. Syntax example "(t.code:like:'A%') and (t.active:>=:0)"
     * @return array                List of regions
     *
     * @url     GET dictionary/regions
     *
     * @throws	RestException	400		Bad value for sqlfilters
     * @throws	RestException	503		Error retrieving list of regions
     */
    public function getListOfRegions($sortfield = "code_region", $sortorder = 'ASC', $limit = 100, $page = 0, $country = 0, $filter = '', $sqlfilters = '')
    {
    }
    /**
     * Get region by ID.
     *
     * @param 	int       $id       ID of region
     * @return 	Object 				Object with cleaned properties
     *
     * @url     GET dictionary/regions/{id}
     *
     * @throws	RestException	404		Region not found
     * @throws	RestException	503		Error retrieving region
     */
    public function getRegionByID($id)
    {
    }
    /**
     * Get region by Code.
     *
     * @param 	string    $code     Code of region
     * @return 	Object 				Object with cleaned properties
     *
     * @url     GET dictionary/regions/byCode/{code}
     *
     * @throws	RestException	404		Region not found
     * @throws	RestException	503		Error when retrieving region
     */
    public function getRegionByCode($code)
    {
    }
    /**
     * Get the list of states/provinces.
     *
     * The names of the states will be translated to the given language if
     * the $lang parameter is provided. The value of $lang must be a language
     * code supported by Dolibarr, for example 'en_US' or 'fr_FR'.
     * The returned list is sorted by state ID.
     *
     * @param string    $sortfield  Sort field
     * @param string    $sortorder  Sort order
     * @param int       $limit      Number of items per page
     * @param int       $page       Page number (starting from zero)
     * @param int    	$country    To filter on country
     * @param string    $filter     To filter the states by name
     * @param string    $sqlfilters Other criteria to filter answers separated by a comma. Syntax example "(t.code:like:'A%') and (t.active:>=:0)"
     * @return array                List of states
     *
     * @url     GET dictionary/states
     *
     * @throws	RestException	400		Bad value for sqlfilters
     * @throws	RestException	503		Error retrieving list of states
     */
    public function getListOfStates($sortfield = "code_departement", $sortorder = 'ASC', $limit = 100, $page = 0, $country = 0, $filter = '', $sqlfilters = '')
    {
    }
    /**
     * Get state by ID.
     *
     * @param 	int       $id        	ID of state
     * @return 	Object 					Object with cleaned properties
     *
     * @url     GET dictionary/states/{id}
     *
     * @throws	RestException	404		State not found
     * @throws	RestException	503		Error retrieving state
     */
    public function getStateByID($id)
    {
    }
    /**
     * Get state by Code.
     *
     * @param 	string    $code      	Code of state
     * @return 	Object 					Object with cleaned properties
     *
     * @url     GET dictionary/states/byCode/{code}
     *
     * @throws	RestException	404		State not found
     * @throws	RestException	503		Error retrieving state
     */
    public function getStateByCode($code)
    {
    }
    /**
     * Get the list of countries.
     *
     * The names of the countries will be translated to the given language if
     * the $lang parameter is provided. The value of $lang must be a language
     * code supported by Dolibarr, for example 'en_US' or 'fr_FR'.
     * The returned list is sorted by country ID.
     *
     * @param string    $sortfield  Sort field
     * @param string    $sortorder  Sort order
     * @param int       $limit      Number of items per page
     * @param int       $page       Page number (starting from zero)
     * @param string    $filter     To filter the countries by name
     * @param string    $lang       Code of the language the label of the countries must be translated to
     * @param string    $sqlfilters Other criteria to filter answers separated by a comma. Syntax example "(t.code:like:'A%') and (t.active:>=:0)"
     * @return array                List of countries
     *
     * @url     GET dictionary/countries
     *
     * @throws	RestException	400		Bad value for sqlfilters
     * @throws	RestException	503		Error retrieving list of countries
     */
    public function getListOfCountries($sortfield = "code", $sortorder = 'ASC', $limit = 100, $page = 0, $filter = '', $lang = '', $sqlfilters = '')
    {
    }
    /**
     * Get country by ID.
     *
     * @param 	int       $id        	ID of country
     * @param 	string    $lang      	Code of the language the name of the country must be translated to
     * @return 	Object 					Object with cleaned properties
     *
     * @url     GET dictionary/countries/{id}
     *
     * @throws	RestException	404		Country not found
     * @throws	RestException	503		Error retrieving country
     */
    public function getCountryByID($id, $lang = '')
    {
    }
    /**
     * Get country by Code.
     *
     * @param 	string    $code      	Code of country (2 characters)
     * @param 	string    $lang      	Code of the language the name of the country must be translated to
     * @return 	Object 					Object with cleaned properties
     *
     * @url     GET dictionary/countries/byCode/{code}
     *
     * @throws	RestException	404		Country not found
     * @throws	RestException	503		Error retrieving country
     */
    public function getCountryByCode($code, $lang = '')
    {
    }
    /**
     * Get country by Iso.
     *
     * @param 	string    $iso       	ISO of country (3 characters)
     * @param 	string    $lang     	Code of the language the name of the country must be translated to
     * @return 	Object 					Object with cleaned properties
     *
     * @url     GET dictionary/countries/byISO/{iso}
     *
     * @throws	RestException	404		Country not found
     * @throws	RestException	503		Error retrieving country
     */
    public function getCountryByISO($iso, $lang = '')
    {
    }
    /**
     * Get region.
     *
     * @param 	int       $id       ID of region
     * @param 	string    $code     Code of region
     * @return 	Object 				Object with cleaned properties
     *
     * @throws RestException
     */
    private function _fetchCregion($id, $code = '')
    {
    }
    /**
     * Get state.
     *
     * @param 	int       $id        	ID of state
     * @param 	string    $code      	Code of state
     * @return 	Object 					Object with cleaned properties
     *
     * @throws RestException
     */
    private function _fetchCstate($id, $code = '')
    {
    }
    /**
     * Get country.
     *
     * @param 	int       $id        	ID of country
     * @param 	string    $code      	Code of country (2 characters)
     * @param 	string    $iso       	ISO of country (3 characters)
     * @param 	string    $lang      	Code of the language the name of the country must be translated to
     * @return 	Object 					Object with cleaned properties
     *
     * @throws RestException
     */
    private function _fetchCcountry($id, $code = '', $iso = '', $lang = '')
    {
    }
    /**
     * Get the list of delivery times.
     *
     * @param string    $sortfield  	Sort field
     * @param string    $sortorder  	Sort order
     * @param int       $limit      	Number of items per page
     * @param int       $page       	Page number {@min 0}
     * @param int       $active     	Delivery times is active or not {@min 0} {@max 1}
     * @param string    $sqlfilters 	SQL criteria to filter with.
     *
     * @url     GET dictionary/availability
     *
     * @return array [List of availability]
     *
     * @throws	RestException	400		Bad value for sqlfilters
     * @throws	RestException	403		Access denied
     * @throws	RestException	503		Error when retrieving list of availabilities
     */
    public function getAvailability($sortfield = "code", $sortorder = 'ASC', $limit = 100, $page = 0, $active = 1, $sqlfilters = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     * Clean sensible object datas
     *
     * @param 	Object    $object    	Object to clean
     * @return 	Object 					Object with cleaned properties
     */
    protected function _cleanObjectDatas($object)
    {
    }
    /**
     * Translate the name of the object to the given language.
     *
     * @param object   $object    Object with label to translate
     * @param string   $lang      Code of the language the name of the object must be translated to
     * @param string   $prefix 	  Prefix for translation key
     * @param array    $dict      Array of dictionary for translation
     * @return void
     */
    private function translateLabel($object, $lang, $prefix = 'Country', $dict = array('dict'))
    {
    }
    /**
     * Get the list of events types.
     *
     * @param string    $sortfield  Sort field
     * @param string    $sortorder  Sort order
     * @param int       $limit      Number of items per page
     * @param int       $page       Page number (starting from zero)
     * @param string    $type       To filter on type of event
     * @param string    $module     To filter on module events
     * @param int       $active     Event's type is active or not {@min 0} {@max 1}
     * @param string    $sqlfilters Other criteria to filter answers separated by a comma. Syntax example "(t.code:like:'A%') and (t.active:>=:0)"
     * @return array				List of events types
     *
     * @url     GET dictionary/event_types
     *
     * @throws	RestException	400		Bad value for sqlfilters
     * @throws	RestException	503		Error when retrieving list of events types
     */
    public function getListOfEventTypes($sortfield = "code", $sortorder = 'ASC', $limit = 100, $page = 0, $type = '', $module = '', $active = 1, $sqlfilters = '')
    {
    }
    /**
     * Get the list of Expense Report types.
     *
     * @param string    $sortfield  Sort field
     * @param string    $sortorder  Sort order
     * @param int       $limit      Number of items per page
     * @param int       $page       Page number (starting from zero)
     * @param string    $module     To filter on module
     * @param int       $active     Event's type is active or not {@min 0} {@max 1}
     * @param string    $sqlfilters Other criteria to filter answers separated by a comma. Syntax example "(t.code:like:'A%') and (t.active:>=:0)"
     * @return array				List of expense report types
     *
     * @url     GET dictionary/expensereport_types
     *
     * @throws	RestException	400		Bad value for sqlfilters
     * @throws	RestException	503		Error when retrieving list of expense report types
     */
    public function getListOfExpenseReportsTypes($sortfield = "code", $sortorder = 'ASC', $limit = 100, $page = 0, $module = '', $active = 1, $sqlfilters = '')
    {
    }
    /**
     * Get the list of contacts types.
     *
     * @param string    $sortfield  Sort field
     * @param string    $sortorder  Sort order
     * @param int       $limit      Number of items per page
     * @param int       $page       Page number (starting from zero)
     * @param string    $type       To filter on type of contact
     * @param string    $module     To filter on module contacts
     * @param int       $active     Contact's type is active or not {@min 0} {@max 1}
     * @param string    $lang       Code of the language the label of the civility must be translated to
     * @param string    $sqlfilters Other criteria to filter answers separated by a comma. Syntax example "(t.code:like:'A%') and (t.active:>=:0)"
     * @return array	  List of Contacts types
     *
     * @url     GET dictionary/contact_types
     *
     * @throws	RestException	400		Bad value for sqlfilters
     * @throws	RestException	503		Error when retrieving list of contacts types
     */
    public function getListOfContactTypes($sortfield = "code", $sortorder = 'ASC', $limit = 100, $page = 0, $type = '', $module = '', $active = 1, $lang = '', $sqlfilters = '')
    {
    }
    /**
     * Get the list of civilities.
     *
     * @param string    $sortfield  Sort field
     * @param string    $sortorder  Sort order
     * @param int       $limit      Number of items per page
     * @param int       $page       Page number (starting from zero)
     * @param string    $module     To filter on module events
     * @param int       $active     Civility is active or not {@min 0} {@max 1}
     * @param string    $lang       Code of the language the label of the civility must be translated to
     * @param string    $sqlfilters Other criteria to filter answers separated by a comma. Syntax example "(t.code:like:'A%') and (t.active:>=:0)"
     * @return array		List of civility types
     *
     * @url     GET dictionary/civilities
     *
     * @throws	RestException	400		Bad value for sqlfilters
     * @throws	RestException	503		Error when retrieving list of civilities
     */
    public function getListOfCivilities($sortfield = "code", $sortorder = 'ASC', $limit = 100, $page = 0, $module = '', $active = 1, $lang = '', $sqlfilters = '')
    {
    }
    /**
     * Get the list of currencies.
     *
     * @param int       $multicurrency  Multicurrency rates (0: no multicurrency, 1: last rate, 2: all rates) {@min 0} {@max 2}
     * @param string    $sortfield  Sort field
     * @param string    $sortorder  Sort order
     * @param int       $limit      Number of items per page
     * @param int       $page       Page number (starting from zero)
     * @param int       $active     Payment term is active or not {@min 0} {@max 1}
     * @param string    $sqlfilters Other criteria to filter answers separated by a comma. Syntax example "(t.code:like:'A%') and (t.active:>=:0)"
     * @return array				List of currencies
     *
     * @url     GET dictionary/currencies
     *
     * @throws	RestException	400		Bad value for sqlfilters
     * @throws	RestException	503		Error when retrieving list of currencies
     */
    public function getListOfCurrencies($multicurrency = 0, $sortfield = "code_iso", $sortorder = 'ASC', $limit = 100, $page = 0, $active = 1, $sqlfilters = '')
    {
    }
    /**
     * Get the list of extra fields.
     *
     * @param string	$sortfield	Sort field
     * @param string	$sortorder	Sort order
     * @param string    $elementtype       Type of element ('adherent', 'commande', 'thirdparty', 'facture', 'propal', 'product', ...)
     * @param string    $sqlfilters Other criteria to filter answers separated by a comma. Syntax example "(t.label:like:'SO-%')"
     * @return array				List of extra fields
     *
     * @url     GET extrafields
     *
     * @throws	RestException	400		Bad value for sqlfilters
     * @throws	RestException	503		Error when retrieving list of extra fields
     */
    public function getListOfExtrafields($sortfield = "t.pos", $sortorder = 'ASC', $elementtype = '', $sqlfilters = '')
    {
    }
    /**
     * Delete extrafield
     *
     * @param   string     $attrname         extrafield attrname
     * @param   string     $elementtype      extrafield elementtype
     * @return  array
     *
     * @url     DELETE extrafields/{elementtype}/{attrname}
     *
     */
    public function deleteExtrafieldsFromNames($attrname, $elementtype)
    {
    }
    /** get Extrafield object
     *
     * @param	string	$attrname		extrafield attrname
     * @param	string	$elementtype	extrafield elementtype
     * @return	array					List of extra fields
     *
     * @url     GET		extrafields/{elementtype}/{attrname}
     *
     * @suppress PhanPluginUnknownArrayMethodParamType  Luracast limitation
     *
     */
    public function getExtrafields($attrname, $elementtype)
    {
    }
    /**
     * Create Extrafield object
     *
     * @param	string	$attrname		extrafield attrname
     * @param	string	$elementtype	extrafield elementtype
     * @param	array	$request_data	Request datas
     * @return	int						ID of extrafield
     *
     * @url     POST	extrafields/{elementtype}/{attrname}
     *
     * @suppress PhanPluginUnknownArrayMethodParamType  Luracast limitation
     *
     */
    public function postExtrafields($attrname, $elementtype, $request_data = \null)
    {
    }
    /**
     * Update Extrafield object
     *
     * @param	string	$attrname		extrafield attrname
     * @param	string	$elementtype	extrafield elementtype
     * @param	array	$request_data	Request datas
     * @return	int						ID of extrafield
     *
     * @url     PUT		extrafields/{elementtype}/{attrname}
     *
     * @suppress PhanPluginUnknownArrayMethodParamType  Luracast limitation
     *
     */
    public function updateExtrafields($attrname, $elementtype, $request_data = \null)
    {
    }
    /**
     * Get the list of towns.
     *
     * @param string    $sortfield  Sort field
     * @param string    $sortorder  Sort order
     * @param int       $limit      Number of items per page
     * @param int       $page       Page number (starting from zero)
     * @param string    $zipcode    To filter on zipcode
     * @param string    $town       To filter on city name
     * @param int       $active     Town is active or not {@min 0} {@max 1}
     * @param string    $sqlfilters Other criteria to filter answers separated by a comma. Syntax example "(t.code:like:'A%') and (t.active:>=:0)"
     * @return array				List of towns
     *
     * @url     GET dictionary/towns
     *
     * @throws	RestException	400		Bad value for sqlfilters
     * @throws	RestException	503		Error when retrieving list of towns
     */
    public function getListOfTowns($sortfield = "zip,town", $sortorder = 'ASC', $limit = 100, $page = 0, $zipcode = '', $town = '', $active = 1, $sqlfilters = '')
    {
    }
    /**
     * Get the list of payments terms.
     *
     * @param string    $sortfield  Sort field
     * @param string    $sortorder  Sort order
     * @param int       $limit      Number of items per page
     * @param int       $page       Page number {@min 0}
     * @param int       $active     Payment term is active or not {@min 0} {@max 1}
     * @param string    $sqlfilters SQL criteria to filter. Syntax example "(t.code:=:'CHQ')"
     *
     * @url     GET dictionary/payment_terms
     *
     * @return array List of payment terms
     *
     * @throws	RestException	400		Bad value for sqlfilters
     * @throws	RestException	403		Access denied
     * @throws	RestException	503		Error when retrieving list of payments terms
     */
    public function getPaymentTerms($sortfield = "sortorder", $sortorder = 'ASC', $limit = 100, $page = 0, $active = 1, $sqlfilters = '')
    {
    }
    /**
     * Get the list of shipping methods.
     *
     * @param int       $limit      Number of items per page
     * @param int       $page       Page number {@min 0}
     * @param int       $active     Shipping methodsm is active or not {@min 0} {@max 1}
     * @param string    $lang       Code of the language the label of the method must be translated to
     * @param string    $sqlfilters SQL criteria to filter. Syntax example "(t.code:=:'CHQ')"
     *
     * @url     GET dictionary/shipping_methods
     *
     * @return array List of shipping methods
     *
     * @throws	RestException	400		Bad value for sqlfilters
     * @throws	RestException	503		Error when retrieving list of shipping modes
     */
    public function getShippingModes($limit = 100, $page = 0, $active = 1, $lang = '', $sqlfilters = '')
    {
    }
    /**
     * Get the list of measuring units.
     *
     * @param string    $sortfield  Sort field
     * @param string    $sortorder  Sort order
     * @param int       $limit      Number of items per page
     * @param int       $page       Page number (starting from zero)
     * @param int       $active     Measuring unit is active or not {@min 0} {@max 1}
     * @param string    $sqlfilters Other criteria to filter answers separated by a comma. Syntax example "(t.code:like:'A%') and (t.active:>=:0)"
     * @return array				List of measuring unit
     *
     * @url     GET dictionary/units
     *
     * @throws	RestException	400		Bad value for sqlfilters
     * @throws	RestException	503		Error when retrieving list of measuring units
     */
    public function getListOfMeasuringUnits($sortfield = "rowid", $sortorder = 'ASC', $limit = 100, $page = 0, $active = 1, $sqlfilters = '')
    {
    }
    /**
     * Get the list of legal form of business.
     *
     * @param string    $sortfield  Sort field
     * @param string    $sortorder  Sort order
     * @param int       $limit      Number of items per page
     * @param int       $page       Page number (starting from zero)
     * @param int   	$country    To filter on country
     * @param int       $active     Lega form is active or not {@min 0} {@max 1}
     * @param string    $sqlfilters Other criteria to filter answers separated by a comma. Syntax example "(t.code:like:'A%') and (t.active:>=:0)"
     * @return array				List of legal form
     *
     * @url     GET dictionary/legal_form
     *
     * @throws	RestException	400		Bad value for sqlfilters
     * @throws	RestException	503		Error when retrieving list of legal form
     */
    public function getListOfLegalForm($sortfield = "rowid", $sortorder = 'ASC', $limit = 100, $page = 0, $country = 0, $active = 1, $sqlfilters = '')
    {
    }
    /**
     * Get the list of staff.
     *
     * @param string    $sortfield  Sort field
     * @param string    $sortorder  Sort order
     * @param int       $limit      Number of items per page
     * @param int       $page       Page number (starting from zero)
     * @param int       $active     Staff is active or not {@min 0} {@max 1}
     * @param string    $sqlfilters Other criteria to filter answers separated by a comma. Syntax example "(t.code:like:'A%') and (t.active:>=:0)"
     * @return array				List of staff
     *
     * @url     GET dictionary/staff
     *
     * @throws	RestException	400		Bad value for sqlfilters
     * @throws	RestException	503		Error when retrieving list of staff
     */
    public function getListOfStaff($sortfield = "id", $sortorder = 'ASC', $limit = 100, $page = 0, $active = 1, $sqlfilters = '')
    {
    }
    /**
     * Get the list of social networks.
     *
     * @param string    $sortfield  Sort field
     * @param string    $sortorder  Sort order
     * @param int       $limit      Number of items per page
     * @param int       $page       Page number (starting from zero)
     * @param int       $active     Social network is active or not {@min 0} {@max 1}
     * @param string    $sqlfilters Other criteria to filter answers separated by a comma. Syntax example "(t.code:like:'A%') and (t.active:>=:0)"
     * @return array				List of social networks
     *
     * @url     GET dictionary/socialnetworks
     *
     * @throws	RestException	400		Bad value for sqlfilters
     * @throws	RestException	503		Error when retrieving list of social networks
     */
    public function getListOfsocialNetworks($sortfield = "rowid", $sortorder = 'ASC', $limit = 100, $page = 0, $active = 1, $sqlfilters = '')
    {
    }
    /**
     * Get the list of tickets categories.
     *
     * @param string    $sortfield  Sort field
     * @param string    $sortorder  Sort order
     * @param int       $limit      Number of items per page
     * @param int       $page       Page number (starting from zero)
     * @param int       $active     Payment term is active or not {@min 0} {@max 1}
     * @param string    $lang       Code of the language the label of the category must be translated to
     * @param string    $sqlfilters Other criteria to filter answers separated by a comma. Syntax example "(t.code:like:'A%') and (t.active:>=:0)"
     * @return array				List of ticket categories
     *
     * @url     GET dictionary/ticket_categories
     *
     * @throws	RestException	400		Bad value for sqlfilters
     * @throws	RestException	503		Error when retrieving list of tickets categories
     */
    public function getTicketsCategories($sortfield = "code", $sortorder = 'ASC', $limit = 100, $page = 0, $active = 1, $lang = '', $sqlfilters = '')
    {
    }
    /**
     * Get the list of tickets severity.
     *
     * @param string    $sortfield  Sort field
     * @param string    $sortorder  Sort order
     * @param int       $limit      Number of items per page
     * @param int       $page       Page number (starting from zero)
     * @param int       $active     Payment term is active or not {@min 0} {@max 1}
     * @param string    $lang       Code of the language the label of the severity must be translated to
     * @param string    $sqlfilters Other criteria to filter answers separated by a comma. Syntax example "(t.code:like:'A%') and (t.active:>=:0)"
     * @return array				List of ticket severities
     *
     * @url     GET dictionary/ticket_severities
     *
     * @throws	RestException	400		Bad value for sqlfilters
     * @throws	RestException	503		Error when retrieving list of tickets severities
     */
    public function getTicketsSeverities($sortfield = "code", $sortorder = 'ASC', $limit = 100, $page = 0, $active = 1, $lang = '', $sqlfilters = '')
    {
    }
    /**
     * Get the list of tickets types.
     *
     * @param string    $sortfield  Sort field
     * @param string    $sortorder  Sort order
     * @param int       $limit      Number of items per page
     * @param int       $page       Page number (starting from zero)
     * @param int       $active     Payment term is active or not {@min 0} {@max 1}
     * @param string    $lang       Code of the language the label of the type must be translated to
     * @param string    $sqlfilters Other criteria to filter answers separated by a comma. Syntax example "(t.code:like:'A%') and (t.active:>=:0)"
     * @return array				List of ticket types
     *
     * @url     GET dictionary/ticket_types
     *
     * @throws RestException 400 Bad value for sqlfilters
     * @throws RestException 503 Error when retrieving list of tickets types
     */
    public function getTicketsTypes($sortfield = "code", $sortorder = 'ASC', $limit = 100, $page = 0, $active = 1, $lang = '', $sqlfilters = '')
    {
    }
    /**
     * Get the list of incoterms.
     *
     * @param string    $sortfield  Sort field
     * @param string    $sortorder  Sort order
     * @param int       $limit      Number of items per page
     * @param int       $page       Page number (starting from zero)
     * @param int       $active     Payment term is active or not {@min 0} {@max 1}
     * @param string    $lang       Code of the language the label of the type must be translated to
     * @param string    $sqlfilters Other criteria to filter answers separated by a comma. Syntax example "(t.code:like:'A%') and (t.active:>=:0)"
     * @return array				List of incoterm types
     *
     * @url     GET dictionary/incoterms
     *
     * @throws RestException 503 Error when retrieving list of incoterms types
     */
    public function getListOfIncoterms($sortfield = "code", $sortorder = 'ASC', $limit = 100, $page = 0, $active = 1, $lang = '', $sqlfilters = '')
    {
    }
    /**
     * Get properties of company
     *
     * @url	GET /company
     *
     * @return  array|mixed Mysoc object
     *
     * @throws RestException 403 Forbidden
     */
    public function getCompany()
    {
    }
    /**
     * Get the list of establishments.
     *
     * @return array				List of establishments
     *
     * @url     GET /establishments
     *
     * @throws RestException 503 Error when retrieving list of establishments
     */
    public function getEstablishments()
    {
    }
    /**
     * Get establishment by ID.
     *
     * @param 	int       $id       	ID of establishment
     * @return  Object    				Object with cleaned properties
     *
     * @url     GET establishments/{id}
     *
     * @throws RestException 404 Establishment not found
     * @throws RestException 503 Error when retrieving establishment
     */
    public function getEtablishmentByID($id)
    {
    }
    /**
     * Get value of a setup variables
     *
     * Note that conf variables that stores security key or password hashes can't be loaded with API.
     *
     * @param	string			$constantname	Name of conf variable to get
     * @return  string							Data without useless information
     *
     * @url     GET conf/{constantname}
     *
     * @throws RestException 400 Error Bad or unknown value for constantname
     * @throws RestException 403 Forbidden
     */
    public function getConf($constantname)
    {
    }
    /**
     * Do a test of integrity for files and setup.
     *
     * @param string	$target			Can be 'local' or 'default' or Url of the signatures file to use for the test. Must be reachable by the tested Dolibarr.
     * @return array					Result of file and setup integrity check
     *
     * @url     GET checkintegrity
     *
     * @throws RestException 403 Forbidden
     * @throws RestException 404 Signature file not found
     * @throws RestException 500 Technical error
     */
    public function getCheckIntegrity($target)
    {
    }
    /**
     * Get list of enabled modules
     *
     * @url	GET /modules
     *
     * @return  array|mixed Data without useless information
     *
     * @throws RestException 403 Forbidden
     */
    public function getModules()
    {
    }
}
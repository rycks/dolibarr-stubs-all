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
     * @throws 400 RestException
     * @throws 200 OK
     */
    public function getOrderingMethods($sortfield = "code", $sortorder = 'ASC', $limit = 100, $page = 0, $active = 1, $sqlfilters = '')
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
     * @throws 400 RestException
     * @throws 200 OK
     */
    public function getPaymentTypes($sortfield = "code", $sortorder = 'ASC', $limit = 100, $page = 0, $active = 1, $sqlfilters = '')
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
     * @throws RestException
     */
    public function getListOfCountries($sortfield = "code", $sortorder = 'ASC', $limit = 100, $page = 0, $filter = '', $lang = '', $sqlfilters = '')
    {
    }
    /**
     * Get country by ID.
     *
     * @param int       $id        ID of country
     * @param string    $lang      Code of the language the name of the
     *                             country must be translated to
     * @return array 			   Array of cleaned object properties
     *
     * @url     GET dictionary/countries/{id}
     *
     * @throws RestException
     */
    public function getCountryByID($id, $lang = '')
    {
    }
    /**
     * Get country by Code.
     *
     * @param string    $code      Code of country
     * @param string    $lang      Code of the language the name of the
     *                             country must be translated to
     * @return array 			   Array of cleaned object properties
     *
     * @url     GET dictionary/countries/byCode/{code}
     *
     * @throws RestException
     */
    public function getCountryByCode($code, $lang = '')
    {
    }
    /**
     * Get country by Iso.
     *
     * @param string    $iso       ISO of country
     * @param string    $lang      Code of the language the name of the
     *                             country must be translated to
     * @return array 			   Array of cleaned object properties
     *
     * @url     GET dictionary/countries/byISO/{iso}
     *
     * @throws RestException
     */
    public function getCountryByISO($iso, $lang = '')
    {
    }
    /**
     * Get country.
     *
     * @param int       $id        ID of country
     * @param string    $code      Code of country
     * @param string    $iso       ISO of country
     * @param string    $lang      Code of the language the name of the
     *                             country must be translated to
     * @return array 			   Array of cleaned object properties
     *
     * @throws RestException
     */
    private function _fetchCcountry($id, $code = '', $iso = '', $lang = '')
    {
    }
    /**
     * Get the list of delivery times.
     *
     * @param string    $sortfield  Sort field
     * @param string    $sortorder  Sort order
     * @param int       $limit      Number of items per page
     * @param int       $page       Page number {@min 0}
     * @param int       $active     Delivery times is active or not {@min 0} {@max 1}
     * @param string    $sqlfilters SQL criteria to filter with.
     *
     * @url     GET dictionary/availability
     *
     * @return array [List of availability]
     *
     * @throws 400 RestException
     * @throws 200 OK
     */
    public function getAvailability($sortfield = "code", $sortorder = 'ASC', $limit = 100, $page = 0, $active = 1, $sqlfilters = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     * Clean sensible object datas
     *
     * @param object    $object    Object to clean
     * @return array 				Array of cleaned object properties
     */
    protected function _cleanObjectDatas($object)
    {
    }
    /**
     * Translate the name of the country to the given language.
     *
     * @param Ccountry $country   Country
     * @param string   $lang      Code of the language the name of the
     *                            country must be translated to
     * @return void
     */
    private function translateLabel($country, $lang)
    {
    }
    /**
     * Get the list of shipment methods.
     *
     * @param string    $sortfield  Sort field
     * @param string    $sortorder  Sort order
     * @param int       $limit      Number of items per page
     * @param int       $page       Page number (starting from zero)
     * @param int       $active     Payment term is active or not {@min 0} {@max 1}
     * @param string    $sqlfilters Other criteria to filter answers separated by a comma. Syntax example "(t.code:like:'A%') and (t.active:>=:0)"
     *
     * @return array List of shipment methods
     *
     * @url     GET dictionary/shipment_methods
     *
     * @throws RestException
     */
    public function getListOfShipmentMethods($sortfield = "rowid", $sortorder = 'ASC', $limit = 100, $page = 0, $active = 1, $sqlfilters = '')
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
     * @throws RestException
     */
    public function getListOfEventTypes($sortfield = "code", $sortorder = 'ASC', $limit = 100, $page = 0, $type = '', $module = '', $active = 1, $sqlfilters = '')
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
     * @param string    $sqlfilters Other criteria to filter answers separated by a comma. Syntax example "(t.code:like:'A%') and (t.active:>=:0)"
     * @return array	  List of Contacts types
     *
     * @url     GET dictionary/contact_types
     *
     * @throws RestException
     */
    public function getListOfContactTypes($sortfield = "code", $sortorder = 'ASC', $limit = 100, $page = 0, $type = '', $module = '', $active = 1, $sqlfilters = '')
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
     * @param string    $sqlfilters Other criteria to filter answers separated by a comma. Syntax example "(t.code:like:'A%') and (t.active:>=:0)"
     * @return array		List of civility types
     *
     * @url     GET dictionary/civilities
     *
     * @throws RestException
     */
    public function getListOfCivilities($sortfield = "code", $sortorder = 'ASC', $limit = 100, $page = 0, $module = '', $active = 1, $sqlfilters = '')
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
     * @throws RestException
     */
    public function getListOfCurrencies($multicurrency = 0, $sortfield = "code_iso", $sortorder = 'ASC', $limit = 100, $page = 0, $active = 1, $sqlfilters = '')
    {
    }
    /**
     * Get the list of extra fields.
     *
     * @param string	$sortfield	Sort field
     * @param string	$sortorder	Sort order
     * @param string    $type       Type of element ('adherent', 'commande', 'thirdparty', 'facture', 'propal', 'product', ...)
     * @param string    $sqlfilters Other criteria to filter answers separated by a comma. Syntax example "(t.label:like:'SO-%')"
     * @return array				List of extra fields
     *
     * @url     GET extrafields
     *
     * @throws RestException
     */
    public function getListOfExtrafields($sortfield = "t.pos", $sortorder = 'ASC', $type = '', $sqlfilters = '')
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
     * @param int       $active     Payment term is active or not {@min 0} {@max 1}
     * @param string    $sqlfilters Other criteria to filter answers separated by a comma. Syntax example "(t.code:like:'A%') and (t.active:>=:0)"
     * @return array				List of towns
     *
     * @url     GET dictionary/towns
     *
     * @throws RestException
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
     * @throws 400 RestException
     * @throws 200 OK
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
     * @param string    $sqlfilters SQL criteria to filter. Syntax example "(t.code:=:'CHQ')"
     *
     * @url     GET dictionary/shipping_methods
     *
     * @return array List of shipping methods
     *
     * @throws 400 RestException
     * @throws 200 OK
     */
    public function getShippingModes($limit = 100, $page = 0, $active = 1, $sqlfilters = '')
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
     * @throws RestException
     */
    public function getListOfMeasuringUnits($sortfield = "rowid", $sortorder = 'ASC', $limit = 100, $page = 0, $active = 1, $sqlfilters = '')
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
     * @throws RestException
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
     * @param string    $sqlfilters Other criteria to filter answers separated by a comma. Syntax example "(t.code:like:'A%') and (t.active:>=:0)"
     * @return array				List of ticket categories
     *
     * @url     GET dictionary/ticket_categories
     *
     * @throws RestException
     */
    public function getTicketsCategories($sortfield = "code", $sortorder = 'ASC', $limit = 100, $page = 0, $active = 1, $sqlfilters = '')
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
     * @param string    $sqlfilters Other criteria to filter answers separated by a comma. Syntax example "(t.code:like:'A%') and (t.active:>=:0)"
     * @return array				List of ticket severities
     *
     * @url     GET dictionary/ticket_severities
     *
     * @throws RestException
     */
    public function getTicketsSeverities($sortfield = "code", $sortorder = 'ASC', $limit = 100, $page = 0, $active = 1, $sqlfilters = '')
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
     * @param string    $sqlfilters Other criteria to filter answers separated by a comma. Syntax example "(t.code:like:'A%') and (t.active:>=:0)"
     * @return array				List of ticket types
     *
     * @url     GET dictionary/ticket_types
     *
     * @throws RestException
     */
    public function getTicketsTypes($sortfield = "code", $sortorder = 'ASC', $limit = 100, $page = 0, $active = 1, $sqlfilters = '')
    {
    }
    /**
     * Get properties of company
     *
     * @url	GET /company
     *
     * @return  array|mixed Data without useless information
     *
     */
    public function getCompany()
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
     * @throws RestException
     */
    public function getCheckIntegrity($target)
    {
    }
}
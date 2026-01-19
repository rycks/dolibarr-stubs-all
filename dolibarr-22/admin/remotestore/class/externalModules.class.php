<?php

/**
 * Class ExternalModules
 */
class ExternalModules
{
    /**
     * @var int Pagination: current page
     */
    public $no_page;
    /**
     * @var int Pagination: display per page
     */
    public $per_page;
    /**
     * @var int The current categorie
     */
    public $categorie;
    /**
     * @var string The search keywords
     */
    public $search;
    // setups
    /**
     * @var string
     */
    /**
     * @var string GitHub YAML file URL
     */
    public $file_source_url;
    /**
     * @var string Cache file path for GitHub modules YAML file content (local)
     */
    public $cache_file;
    /**
     * // the url of this page
     * @var string
     */
    public $url;
    /**
     * @var string
     */
    public $shop_url;
    // the url of the shop
    /**
     * @var string
     */
    public $lang;
    // the integer representing the lang in the store
    /**
     * @var bool
     */
    public $debug_api;
    // useful if no dialog
    /**
     * @var string
     */
    public $dolistore_api_url;
    /**
     * @var string
     */
    public $dolistore_api_key;
    /**
     * @var int
     */
    public $dolistoreApiStatus;
    /**
     * @var string
     */
    public $dolistoreApiError;
    /**
     * @var int
     */
    public $githubFileStatus;
    /**
     * @var string
     */
    public $githubFileError;
    /**
     * @var string
     */
    public $error;
    /**
     * @var int // number of online providers
     */
    public $numberOfProviders;
    /**
     * @var array<int, mixed>|null
     */
    public $products;
    /**
     * @var int Total number of products
     */
    public $numberTotalOfProducts;
    /**
     * @var int Total number of pages
     */
    public $numberTotalOfPages;
    /**
     * @var int Number of products displayed on the page.
     */
    public $numberOfProducts;
    /**
     * Constructor
     *
     * @param	boolean		$debug		Enable debug of request on screen
     */
    public function __construct($debug = \false)
    {
    }
    /**
     * loadRemoteSources
     *
     * @param	boolean		$debug		Enable debug of request on screen
     * @return	void
     */
    public function loadRemoteSources($debug = \false)
    {
    }
    /**
     * Test if we can access to remote Dolistore market place.
     *
     * @param string 						$resource 	Resource relative URL ('categories' or 'products')
     * @param array<string, mixed>|false 	$options 	Options for the request
     * @return array{status_code:int,response:null|string|array<string,mixed>}
     */
    public function callApi($resource, $options = \false)
    {
    }
    /**
     * Fetch modules from a cache YAML file
     * @param array<string, mixed> $options Options for filter
     *
     * @return list<array<string, array<string, string|null>|string|null>> List of modules
     */
    public function fetchModulesFromFile($options = array())
    {
    }
    /**
     * Generate HTML for categories and their children.
     * @param int $active The active category id
     *
     * @return string HTML string representing the categories and their children.
     */
    public function getCategories($active = 0)
    {
    }
    /**
     * Generate HTML for products.
     *
     * @param 	array<string,mixed> 	$options 	Options for the request
     * @return 	string|null 						HTML string representing the products.
     */
    public function getProducts($options)
    {
    }
    /**
     * Sort an array by a key
     *
     * @param string $key Key to sort by
     * @return Closure(array<string, mixed>, array<string, mixed>): int
     */
    public function buildSorter(string $key) : \Closure
    {
    }
    /**
     * version compare
     *
     * @param   string  $v1     version 1
     * @param   string  $v2     version 2
     * @return int              result of compare
     */
    public function versionCompare($v1, $v2)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * get previous link
     *
     * @param   string    $text     symbol previous
     * @return  string              html previous link
     */
    public function get_previous_link($text = '<<')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * get next link
     *
     * @param   string    $text     symbol next
     * @return  string              html next link
     */
    public function get_next_link($text = '>>')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * get previous url
     *
     * @return string    previous url
     */
    public function get_previous_url()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * get next url
     *
     * @return string    next url
     */
    public function get_next_url()
    {
    }
    /**
     * Generate pagination for navigating through pages of products.
     *
     * @return string HTML string representing the pagination.
     */
    public function getPagination()
    {
    }
    /**
     * Check the status code of the request
     *
     * @param array{status_code:int,response:null|string|array{curl_error_msg:string,errors:array{code:int,message:string}[]}} $request Response elements of CURL request
     * @return string|null
     */
    protected function checkStatusCode($request)
    {
    }
    /**
     * Get YAML file from remote source and put it into the cache file
     *
     * @param 	string 		$file_source_url 	URL of the remote source
     * @param 	int 		$cache_time 		Cache time
     * @return 	bool|string 					File content
     */
    public function getRemoteYamlFile($file_source_url, $cache_time)
    {
    }
    /**
     * Read a YAML string and convert it to an array
     *
     * @param string $yaml YAML string
     * @return list<array<string, array<string, string|null>|string|null>> Parsed array representation
     */
    public function readYaml($yaml)
    {
    }
    /**
     * Adapter data fetched from github remote source to the expected format
     *
     * @param array<string, mixed>|list<array<string, array<string, string|null>|string|null>> $data 	Data fetched from github remote source
     * @param string $source 	Source of the data
     * @return list<array<string, array<string, string|null>|string|null>> Data adapted to the expected format
     */
    public function adaptData($data, $source)
    {
    }
    /**
     * Apply filters to the data
     * @param list<array<string, mixed>> $list Data to filter
     * @param array<string, mixed> $options Options for the filter
     *
     * @return array{total:int, data:list<array<string, mixed>>} Filtered data
     */
    public function applyFilters($list, $options)
    {
    }
    /**
     * Check if an Dolistore API is up
     *
     * @return int
     */
    public function checkApiStatus()
    {
    }
    /**
     * Retrieve the status icon
     *
     * @param 	mixed 	$status 	Status
     * @param 	mixed 	$mode		Mode
     * @param	string	$moretext	More text to show on tooltip
     * @return 	string
     */
    public function libStatus($status, $mode = 3, $moretext = '')
    {
    }
}
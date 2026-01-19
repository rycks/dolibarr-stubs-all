<?php

/**
 *    Class to manage generation of HTML components
 *    Only common components for WebPortal must be here.
 *
 */
class FormListWebPortal
{
    /**
     * @var string Action
     */
    public $action = '';
    /**
     * @var DoliDB Database
     */
    public $db;
    /**
     * @var Form  Instance of the Form
     */
    public $form;
    /**
     * @var CommonObject Object
     */
    public $object;
    /**
     * @var int Limit (-1 to get limit from conf, 0 no limit, or Nb to show)
     */
    public $limit = -1;
    /**
     * @var int Page (1 by default)
     */
    public $page = 1;
    /**
     * @var string Sort field
     */
    public $sortfield = '';
    /**
     * @var string Sort order
     */
    public $sortorder = '';
    /**
     * @var string Title key to translate
     */
    public $titleKey = '';
    /**
     * @var string Title desc key to translate
     */
    public $titleDescKey = '';
    /**
     * @var string Page context
     */
    public $contextpage = '';
    /**
     * @var array Search filters
     */
    public $search = array();
    /**
     * @var array Array of fields
     */
    public $arrayfields = array();
    /**
     * @var array Company static list (cache)
     */
    public $companyStaticList = array();
    /**
     * Constructor
     *
     * @param DoliDB $db Database handler
     */
    public function __construct($db)
    {
    }
    /**
     * Init
     *
     * @param	string		$elementEn		Element (english) : "propal", "order", "invoice"
     * @return	void
     */
    public function init($elementEn)
    {
    }
    /**
     * Do actions
     *
     * @return	void
     */
    public function doActions()
    {
    }
    /**
     * List for an element in the page context
     *
     * @param	Context		$context		Context object
     * @return	string		Html output
     */
    public function elementList($context)
    {
    }
    /**
     * Generate with pagination navigaion
     *
     * @param 	string	$url			Url of current page
     * @param	int 	$nbPages		Total of pages results
     * @param	int 	$currentPage	Number of current page
     * @return	string
     */
    public static function generatePageListNav(string $url, int $nbPages, int $currentPage)
    {
    }
}
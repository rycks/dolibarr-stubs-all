<?php

namespace Sabre\CardDAV;

/**
 * CardDAV plugin.
 *
 * The CardDAV plugin adds CardDAV functionality to the WebDAV server
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class Plugin extends \Sabre\DAV\ServerPlugin
{
    /**
     * Url to the addressbooks.
     */
    const ADDRESSBOOK_ROOT = 'addressbooks';
    /**
     * xml namespace for CardDAV elements.
     */
    const NS_CARDDAV = 'urn:ietf:params:xml:ns:carddav';
    /**
     * Add urls to this property to have them automatically exposed as
     * 'directories' to the user.
     *
     * @var array
     */
    public $directories = [];
    /**
     * Server class.
     *
     * @var DAV\Server
     */
    protected $server;
    /**
     * The default PDO storage uses a MySQL MEDIUMBLOB for iCalendar data,
     * which can hold up to 2^24 = 16777216 bytes. This is plenty. We're
     * capping it to 10M here.
     */
    protected $maxResourceSize = 10000000;
    /**
     * Initializes the plugin.
     */
    public function initialize(\Sabre\DAV\Server $server)
    {
    }
    /**
     * Returns a list of supported features.
     *
     * This is used in the DAV: header in the OPTIONS and PROPFIND requests.
     *
     * @return array
     */
    public function getFeatures()
    {
    }
    /**
     * Returns a list of reports this plugin supports.
     *
     * This will be used in the {DAV:}supported-report-set property.
     * Note that you still need to subscribe to the 'report' event to actually
     * implement them
     *
     * @param string $uri
     *
     * @return array
     */
    public function getSupportedReportSet($uri)
    {
    }
    /**
     * Adds all CardDAV-specific properties.
     */
    public function propFindEarly(\Sabre\DAV\PropFind $propFind, \Sabre\DAV\INode $node)
    {
    }
    /**
     * This functions handles REPORT requests specific to CardDAV.
     *
     * @param string   $reportName
     * @param \DOMNode $dom
     * @param mixed    $path
     *
     * @return bool
     */
    public function report($reportName, $dom, $path)
    {
    }
    /**
     * Returns the addressbook home for a given principal.
     *
     * @param string $principal
     *
     * @return string
     */
    protected function getAddressbookHomeForPrincipal($principal)
    {
    }
    /**
     * This function handles the addressbook-multiget REPORT.
     *
     * This report is used by the client to fetch the content of a series
     * of urls. Effectively avoiding a lot of redundant requests.
     *
     * @param Xml\Request\AddressBookMultiGetReport $report
     */
    public function addressbookMultiGetReport($report)
    {
    }
    /**
     * This method is triggered before a file gets updated with new content.
     *
     * This plugin uses this method to ensure that Card nodes receive valid
     * vcard data.
     *
     * @param string   $path
     * @param resource $data
     * @param bool     $modified should be set to true, if this event handler
     *                           changed &$data
     */
    public function beforeWriteContent($path, \Sabre\DAV\IFile $node, &$data, &$modified)
    {
    }
    /**
     * This method is triggered before a new file is created.
     *
     * This plugin uses this method to ensure that Card nodes receive valid
     * vcard data.
     *
     * @param string   $path
     * @param resource $data
     * @param bool     $modified should be set to true, if this event handler
     *                           changed &$data
     */
    public function beforeCreateFile($path, &$data, \Sabre\DAV\ICollection $parentNode, &$modified)
    {
    }
    /**
     * Checks if the submitted iCalendar data is in fact, valid.
     *
     * An exception is thrown if it's not.
     *
     * @param resource|string $data
     * @param bool            $modified should be set to true, if this event handler
     *                                  changed &$data
     */
    protected function validateVCard(&$data, &$modified)
    {
    }
    /**
     * This function handles the addressbook-query REPORT.
     *
     * This report is used by the client to filter an addressbook based on a
     * complex query.
     *
     * @param Xml\Request\AddressBookQueryReport $report
     */
    protected function addressbookQueryReport($report)
    {
    }
    /**
     * Validates if a vcard makes it throught a list of filters.
     *
     * @param string $vcardData
     * @param string $test      anyof or allof (which means OR or AND)
     *
     * @return bool
     */
    public function validateFilters($vcardData, array $filters, $test)
    {
    }
    /**
     * Validates if a param-filter can be applied to a specific property.
     *
     * @todo currently we're only validating the first parameter of the passed
     *       property. Any subsequence parameters with the same name are
     *       ignored.
     *
     * @param string $test
     *
     * @return bool
     */
    protected function validateParamFilters(array $vProperties, array $filters, $test)
    {
    }
    /**
     * Validates if a text-filter can be applied to a specific property.
     *
     * @param string $test
     *
     * @return bool
     */
    protected function validateTextMatches(array $texts, array $filters, $test)
    {
    }
    /**
     * This event is triggered when fetching properties.
     *
     * This event is scheduled late in the process, after most work for
     * propfind has been done.
     */
    public function propFindLate(\Sabre\DAV\PropFind $propFind, \Sabre\DAV\INode $node)
    {
    }
    /**
     * This method is used to generate HTML output for the
     * Sabre\DAV\Browser\Plugin. This allows us to generate an interface users
     * can use to create new addressbooks.
     *
     * @param string $output
     *
     * @return bool
     */
    public function htmlActionsPanel(\Sabre\DAV\INode $node, &$output)
    {
    }
    /**
     * This event is triggered after GET requests.
     *
     * This is used to transform data into jCal, if this was requested.
     */
    public function httpAfterGet(\Sabre\HTTP\RequestInterface $request, \Sabre\HTTP\ResponseInterface $response)
    {
    }
    /**
     * This helper function performs the content-type negotiation for vcards.
     *
     * It will return one of the following strings:
     * 1. vcard3
     * 2. vcard4
     * 3. jcard
     *
     * It defaults to vcard3.
     *
     * @param string $input
     * @param string $mimeType
     *
     * @return string
     */
    protected function negotiateVCard($input, &$mimeType = null)
    {
    }
    /**
     * Converts a vcard blob to a different version, or jcard.
     *
     * @param string|resource $data
     * @param string          $target
     * @param array           $propertiesFilter
     *
     * @return string
     */
    protected function convertVCard($data, $target, array $propertiesFilter = null)
    {
    }
    /**
     * Returns a plugin name.
     *
     * Using this name other plugins will be able to access other plugins
     * using DAV\Server::getPlugin
     *
     * @return string
     */
    public function getPluginName()
    {
    }
    /**
     * Returns a bunch of meta-data about the plugin.
     *
     * Providing this information is optional, and is mainly displayed by the
     * Browser plugin.
     *
     * The description key in the returned array may contain html and will not
     * be sanitized.
     *
     * @return array
     */
    public function getPluginInfo()
    {
    }
}
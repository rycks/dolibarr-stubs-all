<?php

namespace Sabre\DAVACL;

/**
 * SabreDAV ACL Plugin
 *
 * This plugin provides functionality to enforce ACL permissions.
 * ACL is defined in RFC3744.
 *
 * In addition it also provides support for the {DAV:}current-user-principal
 * property, defined in RFC5397 and the {DAV:}expand-property report, as
 * defined in RFC3253.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class Plugin extends \Sabre\DAV\ServerPlugin
{
    /**
     * Recursion constants
     *
     * This only checks the base node
     */
    const R_PARENT = 1;
    /**
     * Recursion constants
     *
     * This checks every node in the tree
     */
    const R_RECURSIVE = 2;
    /**
     * Recursion constants
     *
     * This checks every parentnode in the tree, but not leaf-nodes.
     */
    const R_RECURSIVEPARENTS = 3;
    /**
     * Reference to server object.
     *
     * @var DAV\Server
     */
    protected $server;
    /**
     * List of urls containing principal collections.
     * Modify this if your principals are located elsewhere.
     *
     * @var array
     */
    public $principalCollectionSet = ['principals'];
    /**
     * By default nodes that are inaccessible by the user, can still be seen
     * in directory listings (PROPFIND on parent with Depth: 1)
     *
     * In certain cases it's desirable to hide inaccessible nodes. Setting this
     * to true will cause these nodes to be hidden from directory listings.
     *
     * @var bool
     */
    public $hideNodesFromListings = false;
    /**
     * This list of properties are the properties a client can search on using
     * the {DAV:}principal-property-search report.
     *
     * The keys are the property names, values are descriptions.
     *
     * @var array
     */
    public $principalSearchPropertySet = ['{DAV:}displayname' => 'Display name', '{http://sabredav.org/ns}email-address' => 'Email address'];
    /**
     * Any principal uri's added here, will automatically be added to the list
     * of ACL's. They will effectively receive {DAV:}all privileges, as a
     * protected privilege.
     *
     * @var array
     */
    public $adminPrincipals = [];
    /**
     * The ACL plugin allows privileges to be assigned to users that are not
     * logged in. To facilitate that, it modifies the auth plugin's behavior
     * to only require login when a privileged operation was denied.
     *
     * Unauthenticated access can be considered a security concern, so it's
     * possible to turn this feature off to harden the server's security.
     *
     * @var bool
     */
    public $allowUnauthenticatedAccess = true;
    /**
     * Returns a list of features added by this plugin.
     *
     * This list is used in the response of a HTTP OPTIONS request.
     *
     * @return array
     */
    function getFeatures()
    {
    }
    /**
     * Returns a list of available methods for a given url
     *
     * @param string $uri
     * @return array
     */
    function getMethods($uri)
    {
    }
    /**
     * Returns a plugin name.
     *
     * Using this name other plugins will be able to access other plugins
     * using Sabre\DAV\Server::getPlugin
     *
     * @return string
     */
    function getPluginName()
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
     * @return array
     */
    function getSupportedReportSet($uri)
    {
    }
    /**
     * Checks if the current user has the specified privilege(s).
     *
     * You can specify a single privilege, or a list of privileges.
     * This method will throw an exception if the privilege is not available
     * and return true otherwise.
     *
     * @param string $uri
     * @param array|string $privileges
     * @param int $recursion
     * @param bool $throwExceptions if set to false, this method won't throw exceptions.
     * @throws NeedPrivileges
     * @throws NotAuthenticated
     * @return bool
     */
    function checkPrivileges($uri, $privileges, $recursion = self::R_PARENT, $throwExceptions = true)
    {
    }
    /**
     * Returns the standard users' principal.
     *
     * This is one authoritative principal url for the current user.
     * This method will return null if the user wasn't logged in.
     *
     * @return string|null
     */
    function getCurrentUserPrincipal()
    {
    }
    /**
     * Returns a list of principals that's associated to the current
     * user, either directly or through group membership.
     *
     * @return array
     */
    function getCurrentUserPrincipals()
    {
    }
    /**
     * Sets the default ACL rules.
     *
     * These rules are used for all nodes that don't implement the IACL interface.
     *
     * @param array $acl
     * @return void
     */
    function setDefaultAcl(array $acl)
    {
    }
    /**
     * Returns the default ACL rules.
     *
     * These rules are used for all nodes that don't implement the IACL interface.
     *
     * @return array
     */
    function getDefaultAcl()
    {
    }
    /**
     * The default ACL rules.
     *
     * These rules are used for nodes that don't implement IACL. These default
     * set of rules allow anyone to do anything, as long as they are
     * authenticated.
     *
     * @var array
     */
    protected $defaultAcl = [['principal' => '{DAV:}authenticated', 'protected' => true, 'privilege' => '{DAV:}all']];
    /**
     * This array holds a cache for all the principals that are associated with
     * a single principal.
     *
     * @var array
     */
    protected $principalMembershipCache = [];
    /**
     * Returns all the principal groups the specified principal is a member of.
     *
     * @param string $mainPrincipal
     * @return array
     */
    function getPrincipalMembership($mainPrincipal)
    {
    }
    /**
     * Find out of a principal equals another principal.
     *
     * This is a quick way to find out whether a principal URI is part of a
     * group, or any subgroups.
     *
     * The first argument is the principal URI you want to check against. For
     * example the principal group, and the second argument is the principal of
     * which you want to find out of it is the same as the first principal, or
     * in a member of the first principal's group or subgroups.
     *
     * So the arguments are not interchangeable. If principal A is in group B,
     * passing 'B', 'A' will yield true, but 'A', 'B' is false.
     *
     * If the second argument is not passed, we will use the current user
     * principal.
     *
     * @param string $checkPrincipal
     * @param string $currentPrincipal
     * @return bool
     */
    function principalMatchesPrincipal($checkPrincipal, $currentPrincipal = null)
    {
    }
    /**
     * Returns a tree of supported privileges for a resource.
     *
     * The returned array structure should be in this form:
     *
     * [
     *    [
     *       'privilege' => '{DAV:}read',
     *       'abstract'  => false,
     *       'aggregates' => []
     *    ]
     * ]
     *
     * Privileges can be nested using "aggregates". Doing so means that
     * if you assign someone the aggregating privilege, all the
     * sub-privileges will automatically be granted.
     *
     * Marking a privilege as abstract means that the privilege cannot be
     * directly assigned, but must be assigned via the parent privilege.
     *
     * So a more complex version might look like this:
     *
     * [
     *    [
     *       'privilege' => '{DAV:}read',
     *       'abstract'  => false,
     *       'aggregates' => [
     *          [
     *              'privilege'  => '{DAV:}read-acl',
     *              'abstract'   => false,
     *              'aggregates' => [],
     *          ]
     *       ]
     *    ]
     * ]
     *
     * @param string|INode $node
     * @return array
     */
    function getSupportedPrivilegeSet($node)
    {
    }
    /**
     * Returns the supported privilege set as a flat list
     *
     * This is much easier to parse.
     *
     * The returned list will be index by privilege name.
     * The value is a struct containing the following properties:
     *   - aggregates
     *   - abstract
     *   - concrete
     *
     * @param string|INode $node
     * @return array
     */
    final function getFlatPrivilegeSet($node)
    {
    }
    /**
     * Returns the full ACL list.
     *
     * Either a uri or a INode may be passed.
     *
     * null will be returned if the node doesn't support ACLs.
     *
     * @param string|DAV\INode $node
     * @return array
     */
    function getAcl($node)
    {
    }
    /**
     * Returns a list of privileges the current user has
     * on a particular node.
     *
     * Either a uri or a DAV\INode may be passed.
     *
     * null will be returned if the node doesn't support ACLs.
     *
     * @param string|DAV\INode $node
     * @return array
     */
    function getCurrentUserPrivilegeSet($node)
    {
    }
    /**
     * Returns a principal based on its uri.
     *
     * Returns null if the principal could not be found.
     *
     * @param string $uri
     * @return null|string
     */
    function getPrincipalByUri($uri)
    {
    }
    /**
     * Principal property search
     *
     * This method can search for principals matching certain values in
     * properties.
     *
     * This method will return a list of properties for the matched properties.
     *
     * @param array $searchProperties    The properties to search on. This is a
     *                                   key-value list. The keys are property
     *                                   names, and the values the strings to
     *                                   match them on.
     * @param array $requestedProperties This is the list of properties to
     *                                   return for every match.
     * @param string $collectionUri      The principal collection to search on.
     *                                   If this is ommitted, the standard
     *                                   principal collection-set will be used.
     * @param string $test               "allof" to use AND to search the
     *                                   properties. 'anyof' for OR.
     * @return array     This method returns an array structure similar to
     *                  Sabre\DAV\Server::getPropertiesForPath. Returned
     *                  properties are index by a HTTP status code.
     */
    function principalSearch(array $searchProperties, array $requestedProperties, $collectionUri = null, $test = 'allof')
    {
    }
    /**
     * Sets up the plugin
     *
     * This method is automatically called by the server class.
     *
     * @param DAV\Server $server
     * @return void
     */
    function initialize(\Sabre\DAV\Server $server)
    {
    }
    /* {{{ Event handlers */
    /**
     * Triggered before any method is handled
     *
     * @param RequestInterface $request
     * @param ResponseInterface $response
     * @return void
     */
    function beforeMethod(\Sabre\HTTP\RequestInterface $request, \Sabre\HTTP\ResponseInterface $response)
    {
    }
    /**
     * Triggered before a new node is created.
     *
     * This allows us to check permissions for any operation that creates a
     * new node, such as PUT, MKCOL, MKCALENDAR, LOCK, COPY and MOVE.
     *
     * @param string $uri
     * @return void
     */
    function beforeBind($uri)
    {
    }
    /**
     * Triggered before a node is deleted
     *
     * This allows us to check permissions for any operation that will delete
     * an existing node.
     *
     * @param string $uri
     * @return void
     */
    function beforeUnbind($uri)
    {
    }
    /**
     * Triggered before a node is unlocked.
     *
     * @param string $uri
     * @param DAV\Locks\LockInfo $lock
     * @TODO: not yet implemented
     * @return void
     */
    function beforeUnlock($uri, \Sabre\DAV\Locks\LockInfo $lock)
    {
    }
    /**
     * Triggered before properties are looked up in specific nodes.
     *
     * @param DAV\PropFind $propFind
     * @param DAV\INode $node
     * @TODO really should be broken into multiple methods, or even a class.
     * @return bool
     */
    function propFind(\Sabre\DAV\PropFind $propFind, \Sabre\DAV\INode $node)
    {
    }
    /**
     * This method intercepts PROPPATCH methods and make sure the
     * group-member-set is updated correctly.
     *
     * @param string $path
     * @param DAV\PropPatch $propPatch
     * @return void
     */
    function propPatch($path, \Sabre\DAV\PropPatch $propPatch)
    {
    }
    /**
     * This method handles HTTP REPORT requests
     *
     * @param string $reportName
     * @param mixed $report
     * @param mixed $path
     * @return bool
     */
    function report($reportName, $report, $path)
    {
    }
    /**
     * This method is responsible for handling the 'ACL' event.
     *
     * @param RequestInterface $request
     * @param ResponseInterface $response
     * @return bool
     */
    function httpAcl(\Sabre\HTTP\RequestInterface $request, \Sabre\HTTP\ResponseInterface $response)
    {
    }
    /* }}} */
    /* Reports {{{ */
    /**
     * The principal-match report is defined in RFC3744, section 9.3.
     *
     * This report allows a client to figure out based on the current user,
     * or a principal URL, the principal URL and principal URLs of groups that
     * principal belongs to.
     *
     * @param string $path
     * @param Xml\Request\PrincipalMatchReport $report
     * @return void
     */
    protected function principalMatchReport($path, \Sabre\DAVACL\Xml\Request\PrincipalMatchReport $report)
    {
    }
    /**
     * The expand-property report is defined in RFC3253 section 3.8.
     *
     * This report is very similar to a standard PROPFIND. The difference is
     * that it has the additional ability to look at properties containing a
     * {DAV:}href element, follow that property and grab additional elements
     * there.
     *
     * Other rfc's, such as ACL rely on this report, so it made sense to put
     * it in this plugin.
     *
     * @param string $path
     * @param Xml\Request\ExpandPropertyReport $report
     * @return void
     */
    protected function expandPropertyReport($path, $report)
    {
    }
    /**
     * This method expands all the properties and returns
     * a list with property values
     *
     * @param array $path
     * @param array $requestedProperties the list of required properties
     * @param int $depth
     * @return array
     */
    protected function expandProperties($path, array $requestedProperties, $depth)
    {
    }
    /**
     * principalSearchPropertySetReport
     *
     * This method responsible for handing the
     * {DAV:}principal-search-property-set report. This report returns a list
     * of properties the client may search on, using the
     * {DAV:}principal-property-search report.
     *
     * @param string $path
     * @param Xml\Request\PrincipalSearchPropertySetReport $report
     * @return void
     */
    protected function principalSearchPropertySetReport($path, $report)
    {
    }
    /**
     * principalPropertySearchReport
     *
     * This method is responsible for handing the
     * {DAV:}principal-property-search report. This report can be used for
     * clients to search for groups of principals, based on the value of one
     * or more properties.
     *
     * @param string $path
     * @param Xml\Request\PrincipalPropertySearchReport $report
     * @return void
     */
    protected function principalPropertySearchReport($path, \Sabre\DAVACL\Xml\Request\PrincipalPropertySearchReport $report)
    {
    }
    /**
     * aclPrincipalPropSet REPORT
     *
     * This method is responsible for handling the {DAV:}acl-principal-prop-set
     * REPORT, as defined in:
     *
     * https://tools.ietf.org/html/rfc3744#section-9.2
     *
     * This REPORT allows a user to quickly fetch information about all
     * principals specified in the access control list. Most commonly this
     * is used to for example generate a UI with ACL rules, allowing you
     * to show names for principals for every entry.
     *
     * @param string $path
     * @param Xml\Request\AclPrincipalPropSetReport $report
     * @return void
     */
    protected function aclPrincipalPropSetReport($path, \Sabre\DAVACL\Xml\Request\AclPrincipalPropSetReport $report)
    {
    }
    /* }}} */
    /**
     * This method is used to generate HTML output for the
     * DAV\Browser\Plugin. This allows us to generate an interface users
     * can use to create new calendars.
     *
     * @param DAV\INode $node
     * @param string $output
     * @return bool
     */
    function htmlActionsPanel(\Sabre\DAV\INode $node, &$output)
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
    function getPluginInfo()
    {
    }
}
<?php

namespace DebugBar;

/**
 * Renders the debug bar using the client side javascript implementation
 *
 * Generates all the needed initialization code of controls
 */
class JavascriptRenderer
{
    const INITIALIZE_CONSTRUCTOR = 2;
    const INITIALIZE_CONTROLS = 4;
    const REPLACEABLE_TAG = "{--DEBUGBAR_OB_START_REPLACE_ME--}";
    const RELATIVE_PATH = 'path';
    const RELATIVE_URL = 'url';
    protected $debugBar;
    protected $baseUrl;
    protected $basePath;
    protected $cssVendors = array('fontawesome' => 'vendor/font-awesome/css/font-awesome.min.css', 'highlightjs' => 'vendor/highlightjs/styles/github.css');
    protected $jsVendors = array('jquery' => 'vendor/jquery/dist/jquery.min.js', 'highlightjs' => 'vendor/highlightjs/highlight.pack.js');
    protected $includeVendors = true;
    protected $cssFiles = array('debugbar.css', 'widgets.css', 'openhandler.css');
    protected $jsFiles = array('debugbar.js', 'widgets.js', 'openhandler.js');
    protected $additionalAssets = array();
    protected $javascriptClass = 'PhpDebugBar.DebugBar';
    protected $variableName = 'phpdebugbar';
    protected $enableJqueryNoConflict = true;
    protected $initialization;
    protected $controls = array();
    protected $ignoredCollectors = array();
    protected $ajaxHandlerClass = 'PhpDebugBar.AjaxHandler';
    protected $ajaxHandlerBindToJquery = true;
    protected $ajaxHandlerBindToXHR = false;
    protected $openHandlerClass = 'PhpDebugBar.OpenHandler';
    protected $openHandlerUrl;
    /**
     * @param \DebugBar\DebugBar $debugBar
     * @param string $baseUrl
     * @param string $basePath
     */
    public function __construct(\DebugBar\DebugBar $debugBar, $baseUrl = null, $basePath = null)
    {
    }
    /**
     * Sets options from an array
     *
     * Options:
     *  - base_path
     *  - base_url
     *  - include_vendors
     *  - javascript_class
     *  - variable_name
     *  - initialization
     *  - enable_jquery_noconflict
     *  - controls
     *  - disable_controls
     *  - ignore_collectors
     *  - ajax_handler_classname
     *  - ajax_handler_bind_to_jquery
     *  - open_handler_classname
     *  - open_handler_url
     *
     * @param array $options [description]
     */
    public function setOptions(array $options)
    {
    }
    /**
     * Sets the path which assets are relative to
     *
     * @param string $path
     */
    public function setBasePath($path)
    {
    }
    /**
     * Returns the path which assets are relative to
     *
     * @return string
     */
    public function getBasePath()
    {
    }
    /**
     * Sets the base URL from which assets will be served
     *
     * @param string $url
     */
    public function setBaseUrl($url)
    {
    }
    /**
     * Returns the base URL from which assets will be served
     *
     * @return string
     */
    public function getBaseUrl()
    {
    }
    /**
     * Whether to include vendor assets
     *
     * You can only include js or css vendors using
     * setIncludeVendors('css') or setIncludeVendors('js')
     *
     * @param boolean $enabled
     */
    public function setIncludeVendors($enabled = true)
    {
    }
    /**
     * Checks if vendors assets are included
     *
     * @return boolean
     */
    public function areVendorsIncluded()
    {
    }
    /**
     * Disable a specific vendor's assets.
     *
     * @param  string $name "jquery", "fontawesome", "highlightjs"
     *
     * @return void
     */
    public function disableVendor($name)
    {
    }
    /**
     * Sets the javascript class name
     *
     * @param string $className
     */
    public function setJavascriptClass($className)
    {
    }
    /**
     * Returns the javascript class name
     *
     * @return string
     */
    public function getJavascriptClass()
    {
    }
    /**
     * Sets the variable name of the class instance
     *
     * @param string $name
     */
    public function setVariableName($name)
    {
    }
    /**
     * Returns the variable name of the class instance
     *
     * @return string
     */
    public function getVariableName()
    {
    }
    /**
     * Sets what should be initialized
     *
     *  - INITIALIZE_CONSTRUCTOR: only initializes the instance
     *  - INITIALIZE_CONTROLS: initializes the controls and data mapping
     *  - INITIALIZE_CONSTRUCTOR | INITIALIZE_CONTROLS: initialize everything (default)
     *
     * @param integer $init
     */
    public function setInitialization($init)
    {
    }
    /**
     * Returns what should be initialized
     *
     * @return integer
     */
    public function getInitialization()
    {
    }
    /**
     * Sets whether to call jQuery.noConflict()
     *
     * @param boolean $enabled
     */
    public function setEnableJqueryNoConflict($enabled = true)
    {
    }
    /**
     * Checks if jQuery.noConflict() will be called
     *
     * @return boolean
     */
    public function isJqueryNoConflictEnabled()
    {
    }
    /**
     * Adds a control to initialize
     *
     * Possible options:
     *  - icon: icon name
     *  - tooltip: string
     *  - widget: widget class name
     *  - title: tab title
     *  - map: a property name from the data to map the control to
     *  - default: a js string, default value of the data map
     *
     * "icon" or "widget" are at least needed
     *
     * @param string $name
     * @param array $options
     */
    public function addControl($name, array $options)
    {
    }
    /**
     * Disables a control
     *
     * @param string $name
     */
    public function disableControl($name)
    {
    }
    /**
     * Returns the list of controls
     *
     * This does not include controls provided by collectors
     *
     * @return array
     */
    public function getControls()
    {
    }
    /**
     * Ignores widgets provided by a collector
     *
     * @param string $name
     */
    public function ignoreCollector($name)
    {
    }
    /**
     * Returns the list of ignored collectors
     *
     * @return array
     */
    public function getIgnoredCollectors()
    {
    }
    /**
     * Sets the class name of the ajax handler
     *
     * Set to false to disable
     *
     * @param string $className
     */
    public function setAjaxHandlerClass($className)
    {
    }
    /**
     * Returns the class name of the ajax handler
     *
     * @return string
     */
    public function getAjaxHandlerClass()
    {
    }
    /**
     * Sets whether to call bindToJquery() on the ajax handler
     *
     * @param boolean $bind
     */
    public function setBindAjaxHandlerToJquery($bind = true)
    {
    }
    /**
     * Checks whether bindToJquery() will be called on the ajax handler
     *
     * @return boolean
     */
    public function isAjaxHandlerBoundToJquery()
    {
    }
    /**
     * Sets whether to call bindToXHR() on the ajax handler
     *
     * @param boolean $bind
     */
    public function setBindAjaxHandlerToXHR($bind = true)
    {
    }
    /**
     * Checks whether bindToXHR() will be called on the ajax handler
     *
     * @return boolean
     */
    public function isAjaxHandlerBoundToXHR()
    {
    }
    /**
     * Sets the class name of the js open handler
     *
     * @param string $className
     */
    public function setOpenHandlerClass($className)
    {
    }
    /**
     * Returns the class name of the js open handler
     *
     * @return string
     */
    public function getOpenHandlerClass()
    {
    }
    /**
     * Sets the url of the open handler
     *
     * @param string $url
     */
    public function setOpenHandlerUrl($url)
    {
    }
    /**
     * Returns the url for the open handler
     *
     * @return string
     */
    public function getOpenHandlerUrl()
    {
    }
    /**
     * Add assets to render in the head
     *
     * @param array $cssFiles An array of filenames
     * @param array $jsFiles  An array of filenames
     * @param string $basePath Base path of those files
     * @param string $baseUrl  Base url of those files
     */
    public function addAssets($cssFiles, $jsFiles, $basePath = null, $baseUrl = null)
    {
    }
    /**
     * Returns the list of asset files
     *
     * @param string $type Only return css or js files
     * @param string $relativeTo The type of path to which filenames must be relative (path, url or null)
     * @return array
     */
    public function getAssets($type = null, $relativeTo = self::RELATIVE_PATH)
    {
    }
    /**
     * Returns the correct base according to the type
     *
     * @param string $relativeTo
     * @param string $basePath
     * @param string $baseUrl
     * @return string
     */
    protected function getRelativeRoot($relativeTo, $basePath, $baseUrl)
    {
    }
    /**
     * Makes a URI relative to another
     *
     * @param string|array $uri
     * @param string $root
     * @return string
     */
    protected function makeUriRelativeTo($uri, $root)
    {
    }
    /**
     * Filters a tuple of (css, js) assets according to $type
     *
     * @param array $array
     * @param string $type 'css', 'js' or null for both
     * @return array
     */
    protected function filterAssetArray($array, $type = null)
    {
    }
    /**
     * Returns a tuple where the both items are Assetic AssetCollection,
     * the first one being css files and the second js files
     *
     * @param string $type Only return css or js collection
     * @return array or \Assetic\Asset\AssetCollection
     */
    public function getAsseticCollection($type = null)
    {
    }
    /**
     * Create an Assetic AssetCollection with the given files.
     * Filenames will be converted to absolute path using
     * the base path.
     *
     * @param array $files
     * @return \Assetic\Asset\AssetCollection
     */
    protected function createAsseticCollection($files)
    {
    }
    /**
     * Write all CSS assets to standard output or in a file
     *
     * @param string $targetFilename
     */
    public function dumpCssAssets($targetFilename = null)
    {
    }
    /**
     * Write all JS assets to standard output or in a file
     *
     * @param string $targetFilename
     */
    public function dumpJsAssets($targetFilename = null)
    {
    }
    /**
     * Write assets to standard output or in a file
     *
     * @param array $files
     * @param string $targetFilename
     */
    protected function dumpAssets($files, $targetFilename = null)
    {
    }
    /**
     * Renders the html to include needed assets
     *
     * Only useful if Assetic is not used
     *
     * @return string
     */
    public function renderHead()
    {
    }
    /**
     * Register shutdown to display the debug bar
     *
     * @param boolean $here Set position of HTML. True if is to current position or false for end file
     * @param boolean $initialize Whether to render the de bug bar initialization code
     * @return string Return "{--DEBUGBAR_OB_START_REPLACE_ME--}" or return an empty string if $here == false
     */
    public function renderOnShutdown($here = true, $initialize = true, $renderStackedData = true, $head = false)
    {
    }
    /**
     * Same as renderOnShutdown() with $head = true
     *
     * @param boolean $here
     * @param boolean $initialize
     * @param boolean $renderStackedData
     * @return string
     */
    public function renderOnShutdownWithHead($here = true, $initialize = true, $renderStackedData = true)
    {
    }
    /**
     * Is callback function for register_shutdown_function(...)
     *
     * @param boolean $here Set position of HTML. True if is to current position or false for end file
     * @param boolean $initialize Whether to render the de bug bar initialization code
     */
    public function replaceTagInBuffer($here = true, $initialize = true, $renderStackedData = true, $head = false)
    {
    }
    /**
     * Returns the code needed to display the debug bar
     *
     * AJAX request should not render the initialization code.
     *
     * @param boolean $initialize Whether to render the de bug bar initialization code
     * @return string
     */
    public function render($initialize = true, $renderStackedData = true)
    {
    }
    /**
     * Returns the js code needed to initialize the debug bar
     *
     * @return string
     */
    protected function getJsInitializationCode()
    {
    }
    /**
     * Returns the js code needed to initialized the controls and data mapping of the debug bar
     *
     * Controls can be defined by collectors themselves or using {@see addControl()}
     *
     * @param string $varname Debug bar's variable name
     * @return string
     */
    protected function getJsControlsDefinitionCode($varname)
    {
    }
    /**
     * Returns the js code needed to add a dataset
     *
     * @param string $requestId
     * @param array $data
     * @return string
     */
    protected function getAddDatasetCode($requestId, $data, $suffix = null)
    {
    }
}
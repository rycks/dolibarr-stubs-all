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
    protected $useRequireJs = false;
    protected $initialization;
    protected $controls = array();
    protected $ignoredCollectors = array();
    protected $ajaxHandlerClass = 'PhpDebugBar.AjaxHandler';
    protected $ajaxHandlerBindToFetch = false;
    protected $ajaxHandlerBindToJquery = true;
    protected $ajaxHandlerBindToXHR = false;
    protected $ajaxHandlerAutoShow = true;
    protected $openHandlerClass = 'PhpDebugBar.OpenHandler';
    protected $openHandlerUrl;
    protected $cspNonce;
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
     *  - ajax_handler_auto_show
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
     * Sets whether to use RequireJS or not
     *
     * @param boolean $enabled
     * @return $this
     */
    public function setUseRequireJs($enabled = true)
    {
    }
    /**
     * Checks if RequireJS is used
     *
     * @return boolean
     */
    public function isRequireJsUsed()
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
     * Sets whether to call bindToFetch() on the ajax handler
     *
     * @param boolean $bind
     */
    public function setBindAjaxHandlerToFetch($bind = true)
    {
    }
    /**
     * Checks whether bindToFetch() will be called on the ajax handler
     *
     * @return boolean
     */
    public function isAjaxHandlerBoundToFetch()
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
     * Sets whether new ajax debug data will be immediately shown.  Setting to false could be useful
     * if there are a lot of tracking events cluttering things.
     *
     * @param boolean $autoShow
     */
    public function setAjaxHandlerAutoShow($autoShow = true)
    {
    }
    /**
     * Checks whether the ajax handler will immediately show new ajax requests.
     *
     * @return boolean
     */
    public function isAjaxHandlerAutoShow()
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
     * Sets the CSP Nonce (or remove it by setting to null)
     *
     * @param string|null $nonce
     * @return $this
     */
    public function setCspNonce($nonce = null)
    {
    }
    /**
     * Get the CSP Nonce
     *
     * @return string|null
     */
    public function getCspNonce()
    {
    }
    /**
     * Add assets stored in files to render in the head
     *
     * @param array $cssFiles An array of filenames
     * @param array $jsFiles  An array of filenames
     * @param string $basePath Base path of those files
     * @param string $baseUrl  Base url of those files
     * @return $this
     */
    public function addAssets($cssFiles, $jsFiles, $basePath = null, $baseUrl = null)
    {
    }
    /**
     * Add inline assets to render inline in the head.  Ideally, you should store static assets in
     * files that you add with the addAssets function.  However, adding inline assets is useful when
     * integrating with 3rd-party libraries that require static assets that are only available in an
     * inline format.
     *
     * The inline content arrays require special string array keys:  they are used to deduplicate
     * content.  This is particularly useful if multiple instances of the same asset end up being
     * added.  Inline assets from all collectors are merged together into the same array, so these
     * content IDs effectively deduplicate the inline assets.
     *
     * @param array $inlineCss  An array map of content ID to inline CSS content (not including <style> tag)
     * @param array $inlineJs   An array map of content ID to inline JS content (not including <script> tag)
     * @param array $inlineHead An array map of content ID to arbitrary inline HTML content (typically
     *                          <style>/<script> tags); it must be embedded within the <head> element
     * @return $this
     */
    public function addInlineAssets($inlineCss, $inlineJs, $inlineHead)
    {
    }
    /**
     * Returns the list of asset files
     *
     * @param string $type 'css', 'js', 'inline_css', 'inline_js', 'inline_head', or null for all
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
     * Filters a tuple of (css, js, inline_css, inline_js, inline_head) assets according to $type
     *
     * @param array $array
     * @param string $type 'css', 'js', 'inline_css', 'inline_js', 'inline_head', or null for all
     * @return array
     */
    protected function filterAssetArray($array, $type = '')
    {
    }
    /**
     * Returns an array where all items are Assetic AssetCollection:
     *  - The first one contains the CSS files
     *  - The second one contains the JS files
     *  - The third one contains arbitrary inline HTML (typically composed of <script>/<style>
     *    elements); it must be embedded within the <head> element
     *
     * @param string $type Optionally return only 'css', 'js', or 'inline_head' collection
     * @return array|\Assetic\Asset\AssetCollection
     */
    public function getAsseticCollection($type = null)
    {
    }
    /**
     * Create an Assetic AssetCollection with the given content.
     * Filenames will be converted to absolute path using
     * the base path.
     *
     * @param array|null $files Array of asset filenames.
     * @param array|null $content Array of inline asset content.
     * @return \Assetic\Asset\AssetCollection
     */
    protected function createAsseticCollection($files = null, $content = null)
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
     * Write all inline HTML header assets to standard output or in a file (only returns assets not
     * already returned by dumpCssAssets or dumpJsAssets)
     *
     * @param string $targetFilename
     */
    public function dumpHeadAssets($targetFilename = null)
    {
    }
    /**
     * Write assets to standard output or in a file
     *
     * @param array|null $files Filenames containing assets
     * @param array|null $content Inline content to dump
     * @param string $targetFilename
     * @param bool $useRequireJs
     */
    protected function dumpAssets($files = null, $content = null, $targetFilename = null, $useRequireJs = false)
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
     * @param bool $renderStackedData
     * @param bool $head
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
     * @param bool $renderStackedData
     * @param bool $head
     */
    public function replaceTagInBuffer($here = true, $initialize = true, $renderStackedData = true, $head = false)
    {
    }
    /**
     * Returns the code needed to display the debug bar
     *
     * AJAX request should not render the initialization code.
     *
     * @param boolean $initialize Whether or not to render the debug bar initialization code
     * @param boolean $renderStackedData Whether or not to render the stacked data
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
     * @param mixed $suffix
     * @return string
     */
    protected function getAddDatasetCode($requestId, $data, $suffix = null)
    {
    }
    /**
     * If a nonce it set, create the correct attribute
     * @return string
     */
    protected function getNonceAttribute()
    {
    }
}
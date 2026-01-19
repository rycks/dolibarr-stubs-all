<?php

/**
 * Class Context
 */
class Context
{
    /**
     * @var ?Context Singleton
     * @access private
     * @static
     */
    private static $_instance = \null;
    /**
     * @var	DoliDB	$db		Database handler
     */
    public $db;
    /**
     * @var string
     */
    public $title;
    /**
     * @var string
     */
    public $desc;
    /**
     * @var string
     */
    public $meta_title;
    /**
     * @var string
     */
    public $meta_desc;
    /**
     * The application name
     * @var string $appliName
     */
    public $appliName;
    /**
     * @var string
     */
    public $controller;
    /**
     * @var boolean
     */
    public $controller_found = \false;
    /**
     * @var stdClass[]
     */
    private $controllers = array();
    /**
     * @var Controller $controllerInstance
     */
    public $controllerInstance;
    /**
     * for internal error msg
     * @var string error
     */
    public $error;
    /**
     * @var string[] errors
     */
    public $errors = array();
    /**
     * @var string Action
     */
    public $action;
    /**
     * @var string tpl directory
     */
    public $tplDir;
    /**
     * @var string tpl path
     */
    public $tplPath;
    /**
     * @var stdClass
     */
    public $topMenu;
    /**
     * @var string root url
     */
    public $rootUrl;
    /**
     * @var string[]
     */
    public $menu_active = array();
    /**
     * @var array{mesgs:string[],warnings:string[],errors:string[]}|array{} event messages
     */
    public $eventMessages = array();
    /**
     * @var string token key
     */
    public $tokenKey = 'token';
    /**
     * Current object of page
     * @var object $object
     */
    public $object;
    /**
     * @var CommonObject Logged user
     */
    public $logged_user = \null;
    /**
     * @var CommonObject Logged third-party
     */
    public $logged_thirdparty = \null;
    /**
     * @var CommonObject Logged member
     */
    public $logged_member = \null;
    /**
     * @var CommonObject Logged partnership
     */
    public $logged_partnership = \null;
    /**
     * @var WebPortalTheme Theme data
     */
    public $theme;
    /**
     * Constructor
     *
     * @return  void
     */
    private function __construct()
    {
    }
    /**
     * Singleton method to create one instance of this object
     *
     * @return	Context	Instance
     */
    public static function getInstance()
    {
    }
    /**
     * Init controller
     *
     * @return  void
     */
    public function initController()
    {
    }
    /**
     * Add controller definition
     *
     * @param	string	$controller		Name
     * @param	string	$path			Path
     * @param	string	$className		Class name
     * @return  bool
     */
    public function addControllerDefinition($controller, $path, $className)
    {
    }
    /**
     * Set controller found
     *
     * @return  void
     */
    public function setControllerFound()
    {
    }
    /**
     * Get WebPortal root url
     *
     * @return  string  Web Portal root url
     */
    public static function getRootConfigUrl()
    {
    }
    /**
     * Get root url
     *
     * @param	string			$controller		Controller name
     * @param	string|array<string,mixed>	$moreParams		More parameters
     * @param	bool			$addToken		Add token hash only if $controller is set
     * @return	string
     * @deprecated see getControllerUrl()
     */
    public function getRootUrl($controller = '', $moreParams = '', $addToken = \true)
    {
    }
    /**
     * Get controller url according to context
     *
     * @param	string			$controller		Controller name
     * @param	string|array<string,mixed>	$moreParams		More parameters
     * @param	bool			$addToken		Add token hash only if controller is set
     * @return	string
     */
    public function getControllerUrl($controller = '', $moreParams = '', $addToken = \true)
    {
    }
    /**
     * Generate public controller URL
     * Used for external link (like email or web page)
     * so remove token and contextual behavior associate with current user
     *
     * @param 	string						$controller		Controller
     * @param 	string|array<string,mixed>	$moreParams		More parameters
     * @param	array<string,mixed>			$Tparams		Parameters
     * @return	string
     */
    public static function getPublicControllerUrl($controller = '', $moreParams = '', $Tparams = array())
    {
    }
    /**
     * Url origin
     *
     * @param	bool	$withRequestUri			With request URI
     * @param	bool	$use_forwarded_host		Use formatted host
     * @return 	string
     */
    public static function urlOrigin($withRequestUri = \true, $use_forwarded_host = \false)
    {
    }
    /**
     * Check if user is logged
     *
     * @return	bool
     */
    public function userIsLog()
    {
    }
    /**
     * Is menu enabled ?
     *
     * @param   string	$menuName	Menu name
     * @return  bool
     */
    public function menuIsActive($menuName)
    {
    }
    /**
     * Set errors
     *
     * @param 	string|string[]	$errors		Errors
     * @return	void
     */
    public function setError($errors)
    {
    }
    /**
     * Get errors
     *
     * @return  int
     */
    public function getErrors()
    {
    }
    /**
     * Clear errors
     *
     * @return  void
     */
    public function clearErrors()
    {
    }
    /**
     * Set event messages in dol_events session object. Will be output by calling dol_htmloutput_events.
     * Note: Calling dol_htmloutput_events is done into pages by standard llxFooter() function.
     *
     * @param	string|string[]	$mesgs	Message string or array
     * @param	string			$style	Which style to use ('mesgs' by default, 'warnings', 'errors')
     * @return	void
     */
    public function setEventMessage($mesgs, $style = 'mesgs')
    {
    }
    /**
     * Set event messages in dol_events session object. Will be output by calling dol_htmloutput_events.
     * Note: Calling dol_htmloutput_events is done into pages by standard llxFooter() function.
     *
     * @param	string			$mesg	Message string
     * @param	string[]|null	$mesgs	Message array
     * @param	string			$style	Which style to use ('mesgs' by default, 'warnings', 'errors')
     * @return	void
     */
    public function setEventMessages($mesg, $mesgs, $style = 'mesgs')
    {
    }
    /**
     * Load event messages
     *
     * @return  int
     */
    public function loadEventMessages()
    {
    }
    /**
     * Clear event messages
     *
     * @return  void
     */
    public function clearEventMessages()
    {
    }
    /**
     * Return the value of token currently saved into session with name 'newToken'.
     * This token must be sent by any POST as it will be used by next page for comparison with value in session.
     * This token depends on controller
     *
     * @return  string
     */
    public function newToken()
    {
    }
    /**
     * Generate new token.
     * @deprecated see main
     * @return	string
     */
    protected function generateNewToken()
    {
    }
    /**
     * Get token url
     *
     * @return	string|null
     */
    public function getUrlToken()
    {
    }
    /**
     * Get token input for form
     *
     * @return  string|null
     */
    public function getFormToken()
    {
    }
    /**
     * Try to find the third-party account id from
     *
     * @param	string	$login		Login
     * @param	string	$pass		Password
     * @return  int		Third-party account id || <0 if error
     */
    public function getThirdPartyAccountFromLogin($login, $pass)
    {
    }
}
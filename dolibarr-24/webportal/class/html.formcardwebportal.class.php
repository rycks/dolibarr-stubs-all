<?php

/**
 *    Class to manage generation of HTML components
 *    Only common components for WebPortal must be here.
 */
class FormCardWebPortal
{
    /**
     * @var string Action
     */
    public $action = '';
    /**
     * @var string Back to page
     */
    public $backtopage = '';
    /**
     * @var string Back to page for cancel
     */
    public $backtopageforcancel = '';
    /**
     * @var string Cancel
     */
    public $cancel = '';
    /**
     * @var DoliDB Database
     */
    public $db;
    /**
     * @var string Element in english
     */
    public $elementEn = '';
    /**
     * @var FormWebPortal  Instance of the Form
     */
    public $form;
    /**
     * @var int Id
     */
    public $id;
    /**
     * @var CommonObject Object
     */
    public $object;
    /**
     * @var ExtraFields Extra fields
     */
    public $extrafields;
    /**
     * @var int Permission to read
     */
    public $permissiontoread = 0;
    /**
     * @var int Permission to add
     */
    public $permissiontoadd = 0;
    /**
     * @var int Permission to delete
     */
    public $permissiontodelete = 0;
    /**
     * @var int Permission to note
     */
    public $permissionnote = 0;
    /**
     * @var int Permission to delete links
     */
    public $permissiondellink = 0;
    /**
     * @var string Ref
     */
    public $ref;
    /**
     * @var string Title key to translate
     */
    public $titleKey = '';
    /**
     * @var string Title desc key to translate
     */
    public $titleDescKey = '';
    /**
     * @var string Object field key to break on the view page
     */
    public $key_for_break = '';
    /**
     * @var bool The card displayed is in modal
     */
    public $modal = \false;
    /**
     * @var FieldsManager	Fields manager
     */
    public $fieldsmanager;
    /**
     * @var int		Update function type (1: update(user), 2: update(id, user))
     */
    public $updateType = 1;
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
     * @param	string	$elementEn				Element (english) : "member" (for adherent), "partnership"
     * @param	int		$id						[=0] ID element
     * @param	int		$permissiontoread		[=0] Permission to read (0 : access forbidden by default)
     * @param	int		$permissiontoadd		[=0] Permission to add (0 : access forbidden by default), used by the include of actions_addupdatedelete.inc.php and actions_lineupdown.inc.php
     * @param	int		$permissiontodelete		[=0] Permission to delete (0 : access forbidden by default)
     * @param	int		$permissionnote			[=0] Permission to note (0 : access forbidden by default)
     * @param	int		$permissiondellink		[=0] Permission to delete links (0 : access forbidden by default)
     * @return	void
     */
    public function init($elementEn, $id = 0, $permissiontoread = 0, $permissiontoadd = 0, $permissiontodelete = 0, $permissionnote = 0, $permissiondellink = 0)
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
}
<?php

/**
 *	Class with controller methods for service canvas
 */
class ActionsCardService
{
    /**
     * @var DoliDB Database handler.
     */
    public $db;
    /**
     * @var string
     */
    public $dirmodule;
    /**
     * @var string
     */
    public $module;
    /**
     * @var string
     */
    public $label;
    /**
     * @var string
     */
    public $price_base_type;
    /**
     * @var string
     */
    public $accountancy_code_sell;
    /**
     * @var string
     */
    public $accountancy_code_buy;
    /**
     * @var string
     */
    public $targetmodule;
    /**
     * @var string
     */
    public $canvas;
    /**
     * @var string
     */
    public $card;
    /**
     * @var string
     */
    public $name;
    /**
     * @var string
     */
    public $definition;
    /**
     * @var string
     */
    public $fieldListName;
    /**
     * @var string
     */
    public $next_prev_filter;
    /**
     * @var Product Object container
     */
    public $object;
    //! Template container
    public $tpl = array();
    // List of fields for action=list
    public $field_list = array();
    /**
     * @var string
     */
    public $id;
    /**
     * @var string
     */
    public $ref;
    /**
     * @var string
     */
    public $description;
    /**
     * @var string
     */
    public $note;
    /**
     * @var float
     */
    public $price;
    /**
     * @var float
     */
    public $price_min;
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    /**
     * @var string[] Error codes (or messages)
     */
    public $errors = array();
    /**
     *    Constructor
     *
     *    @param	DoliDB	$db             Database handler
     *    @param	string	$dirmodule		Name of directory of module
     *    @param	string	$targetmodule	Name of directory where canvas is stored
     *    @param   string	$canvas         Name of canvas
     *    @param   string	$card           Name of tab (sub-canvas)
     */
    public function __construct($db, $dirmodule, $targetmodule, $canvas, $card)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Assign custom values for canvas (for example into this->tpl to be used by templates)
     *
     *    @param	string	$action    Type of action
     *    @param	integer	$id			Id of object
     *    @param	string	$ref		Ref of object
     *    @return	void
     */
    public function assign_values(&$action, $id = 0, $ref = '')
    {
    }
    /**
     * 	Fetch field list
     *
     *  @return	void
     */
    private function getFieldListCanvas()
    {
    }
}
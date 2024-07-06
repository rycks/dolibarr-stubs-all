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
    public $dirmodule;
    public $module;
    public $label;
    public $price_base_type;
    public $accountancy_code_sell;
    public $accountancy_code_buy;
    public $targetmodule;
    public $canvas;
    public $card;
    public $name;
    public $definition;
    public $fieldListName;
    public $next_prev_filter;
    //! Object container
    public $object;
    //! Template container
    public $tpl = array();
    // List of fields for action=list
    public $field_list = array();
    public $id;
    public $ref;
    public $description;
    public $note;
    public $price;
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
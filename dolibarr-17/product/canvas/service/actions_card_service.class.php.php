<?php

/**
 *	Class with controller methods for product canvas
 */
class ActionsCardService
{
    public $targetmodule;
    public $canvas;
    public $card;
    //! Template container
    public $tpl = array();
    // List of fiels for action=list
    public $field_list = array();
    public $id;
    public $ref;
    public $description;
    public $note;
    public $price;
    public $price_min;
    /**
     *    Constructor
     *
     *    @param   DoliDB	$db             Handler acces base de donnees
     *    @param   string	$targetmodule   Name of directory of module where canvas is stored
     *    @param   string	$canvas         Name of canvas
     *    @param   string	$card           Name of tab (sub-canvas)
     */
    public function __construct($db, $targetmodule, $canvas, $card)
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
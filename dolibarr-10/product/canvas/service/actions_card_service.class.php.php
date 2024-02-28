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
    public $list_datas = array();
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
    private function getFieldList()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * 	Fetch datas list and save into ->list_datas
     *
     *  @param	int		$limit		Limit number of responses
     *  @param	int		$offset		Offset for first response
     *  @param	string	$sortfield	Sort field
     *  @param	string	$sortorder	Sort order ('ASC' or 'DESC')
     *  @return	void
     */
    public function LoadListDatas($limit, $offset, $sortfield, $sortorder)
    {
    }
}
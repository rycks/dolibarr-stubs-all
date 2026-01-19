<?php

/**
 *	\class      ActionsContactCardDefault
 *	\brief      Classe permettant la gestion des contacts par defaut
 */
class ActionsContactCardDefault extends \ActionsContactCardCommon
{
    /**
     *  Constructor
     *
     *	@param	DoliDB	$db				Handler acces base de donnees
     *	@param	string	$dirmodule		Name of directory of module
     *	@param	string	$targetmodule	Name of directory of module where canvas is stored
     *	@param	string	$canvas			Name of canvas
     *	@param	string	$card			Name of tab (sub-canvas)
     */
    public function __construct($db, $dirmodule, $targetmodule, $canvas, $card)
    {
    }
    /**
     * 	Return the title of card
     *
     * 	@param	string	$action		Code action
     * 	@return	string				Title
     */
    private function getTitle($action)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Assign custom values for canvas
     *
     *  @param	string		$action    	Type of action
     *  @param	int			$id				Id
     *  @return	void
     */
    public function assign_values(&$action, $id)
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
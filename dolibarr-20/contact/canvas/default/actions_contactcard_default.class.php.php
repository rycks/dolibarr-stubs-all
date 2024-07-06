<?php

/**
 *	\class      ActionsContactCardDefault
 *	\brief      Default Class to manage contacts
 */
class ActionsContactCardDefault extends \ActionsContactCardCommon
{
    /**
     *  Constructor
     *
     *	@param	DoliDB	$db				Handler access base de donnees
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
}
<?php

/**
 *	\class      ActionsAdherentCardDefault
 *	\brief      Class allowing the management of the members by default
 */
class ActionsAdherentCardDefault extends \ActionsAdherentCardCommon
{
    /**
     *	Constructor
     *
     *	@param	DoliDB	$db				Handler access data base
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
     * 	@param	string	$action		Action code
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
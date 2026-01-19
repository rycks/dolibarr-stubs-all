<?php

/* Copyright (C) 2010-2012	Regis Houssin		<regis.houssin@inodbox.com>
 * Copyright (C) 2011-2012	Laurent Destailleur	<eldy@users.sourceforge.net>
 * Copyright (C) 2024		MDW					<mdeweerd@users.noreply.github.com>
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <https://www.gnu.org/licenses/>.
 */
/**
 *	\file       htdocs/societe/canvas/actions_card_common.class.php
 *	\ingroup    thirdparty
 *	\brief      File for the abstract class to manage third parties
 */
/**
 *	Abstract class to manage third parties
 */
abstract class ActionsCardCommon
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
     * @var array<string,mixed>	Template container
     */
    public $tpl = array();
    //! Object container
    /**
     * @var Societe
     */
    public $object;
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    /**
     * @var string[] Error codes (or messages)
     */
    public $errors = array();
    /**
     *  Get object from id or ref and save it into this->object
     *
     *  @param		int		$id			Object id
     *  @param		string	$ref		Object ref
     *  @return		Societe				Object loaded
     */
    protected function getObject($id, $ref = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Assign custom values for canvas (for example into this->tpl to be used by templates)
     *
     *    @param	string	$action		Type of action
     *    @param	integer	$id			Id of object
     *    @param	string	$ref		Ref of object
     *    @return	void
     */
    public function assign_values(&$action, $id = 0, $ref = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Assign POST values into object
     *
     *	@param		string		$action		Action string
     *  @return		void
     */
    private function assign_post($action)
    {
    }
}
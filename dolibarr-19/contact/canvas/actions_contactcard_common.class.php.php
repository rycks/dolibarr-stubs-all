<?php

/* Copyright (C) 2010-2012 Regis Houssin  <regis.houssin@inodbox.com>
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
 *	\file       htdocs/contact/canvas/actions_contactcard_common.class.php
 *	\ingroup    thirdparty
 *	\brief      Fichier de la classe Thirdparty contact card controller (common)
 */
/**
 *	\class      ActionsContactCardCommon
 *	\brief      Classe permettant la gestion des contacts par defaut
 */
abstract class ActionsContactCardCommon
{
    /**
     * @var DoliDB Database handler.
     */
    public $db;
    public $dirmodule;
    public $targetmodule;
    public $canvas;
    public $card;
    //! Template container
    public $tpl = array();
    //! Object container
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
     *  Get object
     *
     *  @param	int		$id		Object id
     *  @return	object			Object loaded
     */
    public function getObject($id)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Set content of ->tpl array, to use into template
     *
     *  @param	string		$action    Type of action
     *  @param	int			$id			Id
     *  @return	void
     */
    public function assign_values(&$action, $id)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Assign POST values into object
     *
     *  @return		void
     */
    private function assign_post()
    {
    }
}
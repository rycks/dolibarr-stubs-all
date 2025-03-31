<?php

/* Copyright (c) 2015-2019  Laurent Destailleur     <eldy@users.sourceforge.net>
 * Copyright (C) 2024		MDW						<mdeweerd@users.noreply.github.com>
 * Copyright (C) 2024       Frédéric France         <frederic.france@free.fr>
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
 *	\file       htdocs/core/class/html.formmargin.class.php
 *  \ingroup    core
 *	\brief      Fichier de la class des functions predefinie de composants html autre
 */
/**
 *	Class permettant la generation de composants html autre
 *	Only common components are here.
 */
class FormMargin
{
    /**
     * @var DoliDB Database handler.
     */
    public $db;
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    /**
     *	Constructor
     *
     *	@param	DoliDB		$db      Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *	get array with margin information from lines of object
     *  TODO Move this in common class.
     *
     * 	@param	CommonObject	$object			Object we want to get margin information for
     * 	@param 	bool			$force_price	True of not
     *	@return	array{pa_products:float,pv_products:float, margin_on_products:float, margin_rate_products :string, mark_rate_products :string, pa_services:float, pv_services:float, margin_on_services:float, margin_rate_services :string, mark_rate_services :string, pa_total:float, pv_total:float, total_margin:float, total_margin_rate :string, total_mark_rate :string}		Array with info
     */
    public function getMarginInfosArray($object, $force_price = \false)
    {
    }
    /**
     * 	Show the array with all margin infos
     *
     *	@param	CommonObject	$object			Object we want to get margin information for
     * 	@param 	boolean			$force_price	Force price
     * 	@return	void
     */
    public function displayMarginInfos($object, $force_price = \false)
    {
    }
}
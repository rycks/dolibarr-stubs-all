<?php

/* Copyright (C) 2012 Regis Houssin  <regis.houssin@inodbox.com>
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
 *       \file       htdocs/core/class/commonincoterm.class.php
 *       \ingroup    core
 *       \brief      File of the superclass of object classes that support incoterm (customer and supplier)
 */
/**
 *      Superclass for incoterm classes
 */
trait CommonIncoterm
{
    /**
     * @var int		ID incoterm.
     * @see setIncoterms()
     */
    public $fk_incoterms;
    /**
     * @var string	Label of incoterm. Used for tooltip.
     * @see SetIncoterms()
     */
    public $label_incoterms;
    /**
     * @var string	Location of incoterm.
     * @see display_incoterms()
     */
    public $location_incoterms;
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Return incoterms informations
     *    TODO Use a cache for label get
     *
     *    @return	string	incoterms info
     */
    public function display_incoterms()
    {
    }
    /**
     *    Return incoterms informations for pdf display
     *
     *    @return	string		incoterms info
     */
    public function getIncotermsForPDF()
    {
    }
    /**
     *    Define incoterms values of current object
     *
     *    @param	int		$id_incoterm     Id of incoterm to set or '' to remove
     * 	  @param 	string  $location		 location of incoterm
     *    @return	int     				<0 if KO, >0 if OK
     */
    public function setIncoterms($id_incoterm, $location)
    {
    }
}
<?php

/* Copyright (C) 2002-2003 Rodolphe Quiedeville <rodolphe@quiedeville.org>
 * Copyright (C) 2004-2014 Laurent Destailleur  <eldy@users.sourceforge.net>
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
 *       \file       htdocs/comm/action/class/cactioncomm.class.php
 *       \ingroup    agenda
 *       \brief      File of class to manage type of agenda events
 */
/**
 *      Class to manage different types of events
 */
class CActionComm
{
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    /**
     * @var DoliDB Database handler.
     */
    public $db;
    /**
     * @var int ID
     */
    public $id;
    public $code;
    public $type;
    public $libelle;
    // deprecated
    /**
     * @var string Type of agenda event label
     */
    public $label;
    public $active;
    public $color;
    /**
     * @var string String with name of icon for myobject. Must be the part after the 'object_' into object_myobject.png
     */
    public $picto;
    public $type_actions = array();
    /**
     *  Constructor
     *
     *  @param	DoliDB		$db		Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *  Load action type from database
     *
     *  @param  int     $id     id or code of action type to read
     *  @return int             1=ok, 0=not found, -1=error
     */
    public function fetch($id)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return list of event types: array(id=>label) or array(code=>label)
     *
     *  @param  string|int  $active         1 or 0 to filter on event state active or not ('' by default = no filter)
     *  @param  string      $idorcode       'id' or 'code'
     *  @param  string      $excludetype    Type to exclude ('system' or 'systemauto')
     *  @param  int         $onlyautoornot  1=Group all type AC_XXX into 1 line AC_MANUAL. 0=Keep details of type, -1=Keep details and add a combined line "All manual"
     *  @param  string      $morefilter     Add more SQL filter
     *  @param  int         $shortlabel     1=Get short label instead of long label
     *  @return mixed                       Array of all event types if OK, <0 if KO. Key of array is id or code depending on parameter $idorcode.
     */
    public function liste_array($active = '', $idorcode = 'id', $excludetype = '', $onlyautoornot = 0, $morefilter = '', $shortlabel = 0)
    {
    }
    /**
     *  Return name of action type as a label translated
     *
     *	@param	int		$withpicto		0=No picto, 1=Include picto into link, 2=Picto only
     *  @return string			      	Label of action type
     */
    public function getNomUrl($withpicto = 0)
    {
    }
}
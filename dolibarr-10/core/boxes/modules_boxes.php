<?php

/* Copyright (C) 2004-2013  Laurent Destailleur <eldy@users.sourceforge.net>
 * Copyright (C) 2005-2012  Regis Houssin       <regis.houssin@inodbox.com>
 * Copyright (C) 2014       Raphaël Doursenaud  <rdoursenaud@gpcsolutions.fr>
 * Copyright (C) 2015       Frederic France     <frederic.france@free.fr>
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
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 * or see http://www.gnu.org/
 */
/**
 *	    \file       htdocs/core/boxes/modules_boxes.php
 *		\ingroup    facture
 *		\brief      Fichier contenant la classe mere des boites
 */
/**
 * Class ModeleBoxes
 *
 * Boxes parent class
 */
class ModeleBoxes
{
    /**
     * @var DoliDB Database handler
     */
    public $db;
    /**
     * @var string Error message
     */
    public $error = '';
    /**
     * @var int Maximum lines
     */
    public $max = 5;
    /**
     * @var int Condition to have widget enabled
     */
    public $enabled = 1;
    /**
     * @var int Condition to have widget visible (in most cases, permissions)
     */
    public $hidden = 0;
    /**
     * @var int Box definition database ID
     */
    public $rowid;
    /**
     * @var int ID
     * @deprecated Same as box_id?
     */
    public $id;
    /**
     * @var int Position?
     */
    public $position;
    /**
     * @var string Display order
     */
    public $box_order;
    /**
     * @var int User ID
     */
    public $fk_user;
    /**
     * @var string Source file
     */
    public $sourcefile;
    /**
     * @var string Class name
     */
    public $class;
    /**
     * @var string ID
     */
    public $box_id;
    /**
     * @var string Alphanumeric ID
     */
    public $boxcode;
    /**
     * @var string Note
     */
    public $note;
    /**
     * Constructor
     *
     * @param   DoliDB  $db     Database handler
     * @param   string  $param  More parameters
     */
    public function __construct($db, $param = '')
    {
    }
    /**
     * Return last error message
     *
     * @return  string  Error message
     */
    public function error()
    {
    }
    /**
     * Load a box line from its rowid
     *
     * @param   int $rowid  Row id to load
     *
     * @return  int         <0 if KO, >0 if OK
     */
    public function fetch($rowid)
    {
    }
    /**
     * Standard method to get content of a box
     *
     * @param   array   $head       Array with properties of box title
     * @param   array   $contents   Array with properties of box lines
     *
     * @return  string
     */
    public function outputBox($head = \null, $contents = \null)
    {
    }
    /**
     * Standard method to show a box (usage by boxes not mandatory, a box can still use its own showBox function)
     *
     * @param   array   $head       Array with properties of box title
     * @param   array   $contents   Array with properties of box lines
     * @param	int		$nooutput	No print, only return string
     * @return  string
     */
    public function showBox($head = \null, $contents = \null, $nooutput = 0)
    {
    }
    /**
     *  Return list of widget. Function used by admin page htdoc/admin/widget.
     *  List is sorted by widget filename so by priority to run.
     *
     *  @param	array	$forcedirwidget		null=All default directories. This parameter is used by modulebuilder module only.
     * 	@return	array						Array list of widget
     */
    public static function getWidgetsList($forcedirwidget = \null)
    {
    }
}
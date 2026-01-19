<?php

/* Copyright (C) 2004-2013	Laurent Destailleur			<eldy@users.sourceforge.net>
 * Copyright (C) 2005-2012	Regis Houssin				<regis.houssin@inodbox.com>
 * Copyright (C) 2014		Raphaël Doursenaud			<rdoursenaud@gpcsolutions.fr>
 * Copyright (C) 2015		Frederic France				<frederic.france@free.fr>
 * Copyright (C) 2024		MDW							<mdeweerd@users.noreply.github.com>
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
 * or see https://www.gnu.org/
 */
/**
 *	    \file       htdocs/core/boxes/modules_boxes.php
 *		\ingroup    core
 *		\brief      File containing the parent class of boxes
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
     * Must be defined in the box class
     *
     * @var ''|'development'|'experimental'|'dolibarr'
     */
    public $version;
    /**
     * @var string param
     */
    public $param;
    /**
     * @var array<array{text:string,nbcol?:int,limit?:int,graph?:int<0,1>,sublink?:string,subtext?:string,picto?:string,target?:string,td?:string}>|array{text:string,nbcol?:int,limit?:int,graph?:int<0,1>,sublink?:string,subtext?:string,picto?:string,target?:string,td?:string} box info heads. Example: array('text' => $langs->trans("BoxScheduledJobs", $max), 'nbcol' => 4);
     */
    public $info_box_head = array();
    /**
     * @var array<array<array{td?:string,text:string,asis?:int<0,1>,maxlength?:int}>>|array<array{td?:string,text:string,asis?:int<0,1>,maxlength?:int}> box info content
     */
    public $info_box_contents = array();
    /**
     * @var string Error message
     */
    public $error = '';
    /**
     * @var int<0,max> Maximum lines
     */
    public $max = 5;
    /**
     * @var bool|int Condition to have widget enabled
     */
    public $enabled = 1;
    /**
     * @var boolean Condition to have widget visible (in most cases, permissions)
     */
    public $hidden = \false;
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
     * @var int 	User ID
     */
    public $fk_user;
    /**
     * @var string 	Source file
     */
    public $sourcefile;
    /**
     * @var string 	Class name
     */
    public $class;
    /**
     * @var string 	ID
     */
    public $box_id;
    /**
     * @var string 	Box language file if it needs a specific language file.
     */
    public $lang;
    /**
     * @var string 	Alphanumeric ID
     */
    public $boxcode;
    /**
     * @var string 	Note
     */
    public $note;
    /**
     * @var string 	Widget type ('graph' means the widget is a graph widget)
     */
    public $widgettype = '';
    //! Must be provided in child classes
    /**
     * Note $picto is deprecated
     *
     * @var string  Example "accountancy"
     */
    public $boximg;
    /**
     * @var string  Example "BoxLastManualEntries"
     */
    public $boxlabel;
    /**
     * @var string[]  Example  array("accounting")
     */
    public $depends;
    /**
     * @var  string  urltoaddentry
     */
    public $urltoaddentry;
    /**
     * @var  string  msg when no records exist
     */
    public $msgNoRecords = 'NoRecordFound';
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
     *  Load data for box to show them later
     *
     *  @param	int		$max        Maximum number of records to load
     *  @return	void
     */
    public function loadBox($max = 5)
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
     * @param   int	$rowid	Row id to load
     *
     * @return  int<-1,1>	Return integer <0 if KO, >0 if OK
     */
    public function fetch($rowid)
    {
    }
    /**
     * Standard method to show a box (usage by boxes not mandatory, a box can still use its own showBox function)
     *
     * @param   ?array<array{text?:string,sublink?:string,subtext?:string,subpicto?:?string,picto?:string,nbcol?:int,limit?:int,subclass?:string,graph?:int<0,1>,target?:string}>   $head       Array with properties of box title
     * @param   ?array<array{tr?:string,td?:string,target?:string,text?:string,text2?:string,textnoformat?:string,tooltip?:string,logo?:string,url?:string,maxlength?:int,asis?:int<0,1>}>   $contents   Array with properties of box lines
     * @param	int<0,1>	$nooutput	No print, only return string
     * @return  string
     */
    public function showBox($head = \null, $contents = \null, $nooutput = 0)
    {
    }
    /**
     *  Return list of widget. Function used by admin page htdoc/admin/widget.
     *  List is sorted by widget filename so by priority to run.
     *
     *  @param	?string[]	$forcedirwidget		null=All default directories. This parameter is used by modulebuilder module only.
     *	@return	array<array{picto:string,file:string,fullpath:string,relpath:string,iscoreorexternal:'external'|'internal',version:string,status:string,info:string}>	Array list of widgets
     *
     */
    public static function getWidgetsList($forcedirwidget = \null)
    {
    }
}
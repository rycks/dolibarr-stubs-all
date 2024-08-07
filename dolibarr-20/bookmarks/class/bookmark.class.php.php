<?php

/* Copyright (C) 2005 Laurent Destailleur <eldy@users.sourceforge.net>
 * Copyright (C) 2015 Marcos García       <marcosgdf@gmail.com>
 * Copyright (C) 2024       Frédéric France             <frederic.france@free.fr>
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
 *      \file       htdocs/bookmarks/class/bookmark.class.php
 *      \ingroup    bookmark
 *      \brief      File of class to manage bookmarks
 */
/**
 *		Class to manage bookmarks
 */
class Bookmark extends \CommonObject
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'bookmark';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'bookmark';
    /**
     * @var string  String with name of icon for myobject. Must be the part after the 'object_' into object_myobject.png
     */
    public $picto = 'bookmark';
    /**
     * @var string  Last error number. For example: 'DB_ERROR_RECORD_ALREADY_EXISTS', '12345', ...
     */
    public $errno;
    /**
     * @var int ID
     */
    public $id;
    /**
     * @var int   User ID. If > 0, bookmark of one user. If == 0, bookmark public (for everybody)
     */
    public $fk_user;
    /**
     * Date creation record (datec)
     *
     * @var integer
     */
    public $datec;
    /**
     * @var string url
     */
    public $url;
    public $target;
    // 0=replace, 1=new window
    /**
     * @var string title
     */
    public $title;
    /**
     * @var int position of bookmark
     */
    public $position;
    /**
     * @var string favicon
     */
    public $favicon;
    /**
     *	Constructor
     *
     *  @param		DoliDB		$db      Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *    Directs the bookmark
     *
     *    @param    int		$id		Bookmark Id Loader
     *    @return	int				Return integer <0 if KO, >0 if OK
     */
    public function fetch($id)
    {
    }
    /**
     *      Insert bookmark into database
     *
     *      @return     int     Return integer <0 si ko, rowid du bookmark cree si ok
     */
    public function create()
    {
    }
    /**
     *      Update bookmark record
     *
     *      @return     int         Return integer <0 if KO, > if OK
     */
    public function update()
    {
    }
    /**
     *      Removes the bookmark
     *
     *      @param      User	$user     	User deleting
     *      @return     int         		Return integer <0 if KO, >0 if OK
     */
    public function delete($user)
    {
    }
    /**
     * Function used to replace a thirdparty id with another one.
     *
     * @param 	DoliDB 	$dbs 		Database handler, because function is static we name it $dbs not $db to avoid breaking coding test
     * @param 	int 	$origin_id 	Old thirdparty id
     * @param 	int 	$dest_id 	New thirdparty id
     * @return 	bool
     */
    public static function replaceThirdparty(\DoliDB $dbs, $origin_id, $dest_id)
    {
    }
    /**
     *  Return the label of the status
     *
     *  @param  int		$mode          0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 6=Long label + Picto
     *  @return	string 			       Label of status
     */
    public function getLibStatut($mode)
    {
    }
    /**
     *  Return a link to the object card (with optionally the picto)
     *
     *  @param  int     $withpicto                  Include picto in link (0=No picto, 1=Include picto into link, 2=Only picto)
     *  @param  string  $option                     On what the link point to ('nolink', ...)
     *  @param  int     $notooltip                  1=Disable tooltip
     *  @param  string  $morecss                    Add more css on link
     *  @param  int     $save_lastsearch_value      -1=Auto, 0=No save of lastsearch_values when clicking, 1=Save lastsearch_values whenclicking
     *  @return	string                              String with URL
     */
    public function getNomUrl($withpicto = 0, $option = '', $notooltip = 0, $morecss = '', $save_lastsearch_value = -1)
    {
    }
}
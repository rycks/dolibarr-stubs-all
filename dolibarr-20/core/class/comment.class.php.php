<?php

/* Copyright (C) 2019 Laurent Destailleur  <eldy@users.sourceforge.net>
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
 * 	Class to manage comment
 */
class Comment extends \CommonObject
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'comment';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'comment';
    /**
     * @var int ID of parent key (it's not the name of a field)
     */
    public $fk_element;
    /**
     * @var string element type
     */
    public $element_type;
    /**
     * @var string description
     */
    public $description;
    /**
     * Date creation record (datec)
     *
     * @var integer
     */
    public $datec;
    /**
     * @var int ID
     */
    public $fk_user_author;
    /**
     * @var int ID
     */
    public $fk_user_modif;
    /**
     * @var int 		Entity
     */
    public $entity;
    /**
     * @var string 		Import key
     */
    public $import_key;
    public $comments = array();
    /**
     * @var static 	Object oldcopy
     */
    public $oldcopy;
    /**
     *  Constructor
     *
     *  @param      DoliDB		$db      Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *  Create into database
     *
     *  @param	User	$user        	User that create
     *  @param 	int		$notrigger	    0=launch triggers after, 1=disable triggers
     *  @return int 		        	Return integer <0 if KO, Id of created object if OK
     */
    public function create($user, $notrigger = 0)
    {
    }
    /**
     *  Load object in memory from database
     *
     *  @param	int		$id			Id object
     *  @param	string	$ref		ref object
     *  @return int 		        Return integer <0 if KO, 0 if not found, >0 if OK
     */
    public function fetch($id, $ref = '')
    {
    }
    /**
     *  Update database
     *
     *  @param	User	$user        	User that modify
     *  @param  int		$notrigger	    0=launch triggers after, 1=disable triggers
     *  @return int			         	Return integer <=0 if KO, >0 if OK
     */
    public function update(\User $user, $notrigger = 0)
    {
    }
    /**
     *	Delete task from database
     *
     *	@param	User	$user        	User that delete
     *  @param  int		$notrigger	    0=launch triggers after, 1=disable triggers
     *	@return	int						Return integer <0 if KO, >0 if OK
     */
    public function delete($user, $notrigger = 0)
    {
    }
    /**
     * Load comments linked with current task into ->comments
     *
     * @param	string		$element_type		Element type
     * @param	int			$fk_element			Id of element
     * @return 	int								Result
     */
    public function fetchAllFor($element_type, $fk_element)
    {
    }
}
<?php

/* Copyright (C) 2007-2012  Laurent Destailleur     <eldy@users.sourceforge.net>
 * Copyright (C) 2008-2012  Regis Houssin           <regis.houssin@inodbox.com>
 * Copyright (C) 2024       Frédéric France         <frederic.france@free.fr>
 * Copyright (C) 2024-2025	MDW						<mdeweerd@users.noreply.github.com>
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
 *  \file       htdocs/ecm/class/ecmdirectory.class.php
 *  \ingroup    ecm
 *  \brief      This file is an example for a class file
 */
/**
 *  Class to manage ECM directories
 */
class EcmDirectory extends \CommonObject
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'ecm_directories';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'ecm_directories';
    /**
     * @var string String with name of icon for myobject. Must be the part after the 'object_' into object_myobject.png
     */
    public $picto = 'folder-open';
    /**
     * @var int ID
     */
    public $id;
    /**
     * @var string ECM directories label
     */
    public $label;
    /**
     * @var int ID
     */
    public $fk_parent;
    /**
     * @var string description
     */
    public $description;
    /**
     * @var int cache nb of doc
     */
    public $cachenbofdoc = -1;
    // By default cache initialized with value 'not calculated'
    /**
     * @var int date_c
     */
    public $date_c;
    /**
     * @var int date_m
     */
    public $date_m;
    /**
     * @var int ID
     */
    public $fk_user_m;
    /**
     * @var int ID
     */
    public $fk_user_c;
    /**
     * @var string Ref
     */
    public $ref;
    /**
     * @var array<int,array{id:int,id_mere:int,fulllabel:string,fullpath:string,fullrelativename:string,label:string,description:string,cachenbofdoc:int,date_c:int,fk_user_c:int,statut_c:int,login_c:int,id_children?:int[],level:int}>	Array of categories
     */
    public $cats = array();
    /**
     * @var array<int,int> array of children categories
     */
    public $motherof = array();
    /**
     * @var string[] array of forbidden chars
     */
    public $forbiddenchars = array('<', '>', ':', '/', '\\', '?', '*', '|', '"');
    /**
     * @var string[] array of forbidden chars for dir
     */
    public $forbiddencharsdir = array('<', '>', ':', '?', '*', '|', '"');
    /**
     * @var int 1 if full arbo loaded
     */
    public $full_arbo_loaded;
    /**
     *	Constructor
     *
     *  @param		DoliDB		$db      Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *  Create record into database
     *
     *  @param      User	$user       User that create
     *  @return     int      			Return integer <0 if KO, >0 if OK
     */
    public function create($user)
    {
    }
    /**
     *	Update database
     *
     *  @param	User	$user        	User that modify
     *  @param 	int		$notrigger	    0=no, 1=yes (no update trigger)
     *  @return int 			       	Return integer <0 if KO, >0 if OK
     */
    public function update($user = \null, $notrigger = 0)
    {
    }
    /**
     *	Update cache of nb of documents into database
     *
     * 	@param	string	$value		'+' or '-' or new number
     *  @return int		         	Return integer <0 if KO, >0 if OK
     */
    public function changeNbOfFiles($value)
    {
    }
    /**
     * 	Load object in memory from database
     *
     *  @param	int		$id			Id of object
     *  @return int 		        Return integer <0 if KO, 0 if not found, >0 if OK
     */
    public function fetch($id)
    {
    }
    /**
     * 	Delete object on database and/or on disk
     *
     *	@param	User	$user					User that delete
     *  @param	string	$mode					'all'=delete all, 'databaseonly'=only database entry, 'fileonly' (not implemented)
     *  @param	int		$deletedirrecursive		1=Agree to delete content recursiveley (otherwise an error will be returned when trying to delete)
     *	@return	int								Return integer <0 if KO, >0 if OK
     */
    public function delete($user, $mode = 'all', $deletedirrecursive = 0)
    {
    }
    /**
     *  Initialise an instance with random values.
     *  Used to build previews or test instances.
     *	id must be 0 if object instance is a specimen.
     *
     *  @return int
     */
    public function initAsSpecimen()
    {
    }
    /**
     *  Return directory name you can click (and picto)
     *
     *  @param	int		$withpicto		0=Pas de picto, 1=Include picto into link, 2=Only picto
     *  @param	string	$option			What is the link pointing to
     *  @param	int		$max			Max length
     *  @param	string	$more			Add more param on a link
     *  @param	int		$notooltip		1=Disable tooltip
     *  @return	string					Chaine avec URL
     */
    public function getNomUrl($withpicto = 0, $option = '', $max = 0, $more = '', $notooltip = 0)
    {
    }
    /**
     *  Return relative path of a directory on disk
     *
     * 	@param	int		$force		Force reload of full arbo even if already loaded
     *	@return	string				Relative physical path
     */
    public function getRelativePath($force = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * 	Load this->motherof that is array(id_son=>id_parent, ...)
     *
     *	@return		int		Return integer <0 if KO, >0 if OK
     */
    public function load_motherof()
    {
    }
    /**
     *  Return the label of the status
     *
     *  @param  int		$mode          0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 6=Long label + Picto
     *  @return	string 			       Label of status
     */
    public function getLibStatut($mode = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return the status
     *
     *  @param	int		$status        	Id status
     *  @param  int		$mode          	0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 5=Long label + Picto
     *  @return string 			       	Label of status
     */
    public static function LibStatut($status, $mode = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * 	Rebuild the tree into an array from the database table llx_ecm_directories
     *	Retruen an array('id','id_mere',...) sorted according to tree and with:
     *				id                  Id de la categorie
     *				id_mere             Id de la categorie mere
     *				id_children         Tableau des id enfant
     *				label               Name of directory
     *				cachenbofdoc        Nb of documents
     *				date_c              Date creation
     * 				fk_user_c           User creation
     *  			login_c             Login creation
     * 				fullpath	        Full path of id (Added by buildPathFromId call)
     *              fullrelativename    Full path name (Added by buildPathFromId call)
     * 				fulllabel	        Full label (Added by buildPathFromId call)
     * 				level		        Level of line (Added by buildPathFromId call)
     *
     *
     *  @param	int		$force	        Force reload of full arbo even if already loaded in cache $this->cats
     *	@return array<int,array{id:int,id_mere:int,fulllabel:string,fullpath:string,fullrelativename:string,label:string,description:string,cachenbofdoc:int,date_c:int,fk_user_c:int,statut_c:int,login_c:int,id_children?:int[],level:int}>|int<-1,-1>	Tableau de array if OK, -1 if KO
     */
    public function get_full_arbo($force = 0)
    {
    }
    /**
     *	Define properties fullpath, fullrelativename, fulllabel of a directory of array this->cats and all its children.
     *  Separator between directories is always '/', whatever is OS.
     *
     * 	@param	int		$id_categ		id_categ entry to update
     * 	@param	int		$protection		Deep counter to avoid infinite loop
     * 	@return	void
     */
    private function buildPathFromId($id_categ, $protection = 0)
    {
    }
    /**
     *	Refresh value for cachenboffile. This scan and count files into directory.
     *
     *  @param		int		$all       	0=refresh record using this->id , 1=refresh record using this->entity
     * 	@return		int					-1 if KO, Nb of files in directory if OK
     */
    public function refreshcachenboffile($all = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Call trigger based on this instance.
     * We implement it here because this class doe not extend CommonObject.
     *
     * NB1: Error from trigger are stacked in errors
     * NB2: if trigger fail, action should be canceled.
     * NB3: Should be deleted if EcmDirectory extend CommonObject
     *
     * @param   string    $triggerName   trigger's name to execute
     * @param   User      $user           Object user
     * @return  int                       Result of run_triggers
     */
    public function call_trigger($triggerName, $user)
    {
    }
}
<?php

/* Copyright (C) 2005-2011  Laurent Destailleur <eldy@users.sourceforge.net>
 * Copyright (C) 2005-2012  Regis Houssin       <regis.houssin@inodbox.com>
 * Copyright (C) 2012       Charles-Fr BENKE    <charles.fr@benke.fr>
 * Copyright (C) 2016       Raphaël Doursenaud  <rdoursenaud@gpcsolutions.fr>
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
 */
/**
 *	\file       htdocs/exports/class/export.class.php
 *	\ingroup    export
 *	\brief      File of class to manage exports
 */
/**
 *	Class to manage exports
 */
class Export
{
    /**
     * @var DoliDB Database handler.
     */
    public $db;
    /**
     * @var int
     */
    public $id;
    /**
     * @var string[]
     */
    public $array_export_icon;
    /**
     * @var bool[]
     */
    public $array_export_perms;
    /**
     * @var string Last error message
     */
    public $error;
    /**
     * @var string Last error code
     */
    public $errno;
    /**
     * @var string[] Error messages
     */
    public $errors;
    /**
     * @var array<int,string>
     */
    public $array_export_code = array();
    // Tableau de "idmodule_numexportprofile"
    /**
     * @var string[]
     */
    public $array_export_code_for_sort = array();
    // Tableau de "idmodule_numexportprofile"
    /**
     * @var DolibarrModules[]
     */
    public $array_export_module = array();
    // Tableau de "nom de modules"
    /**
     * @var string[]
     */
    public $array_export_label = array();
    // Array of "Translation key" to use for each export profile
    /**
     * @var string[]
     */
    public $array_export_sql_start = array();
    // Tableau des "requetes sql"
    /**
     * @var string[]
     */
    public $array_export_sql_end = array();
    // Tableau des "requetes sql"
    /**
     * @var string[]
     */
    public $array_export_sql_order = array();
    // Tableau des "requetes sql"
    /**
     * @var array<int,array<string,string>>
     */
    public $array_export_fields = array();
    // Tableau des listes de champ+libelle a exporter
    /**
     * @var array<int,array<string,string>>
     */
    public $array_export_TypeFields = array();
    // Tableau des listes de champ+Type de filtre
    /**
     * @var array<int,array<string,string>>
     */
    public $array_export_FilterValue = array();
    // Tableau des listes de champ+Valeur a filtrer
    /**
     * @var array<int,array<string,string>>
     */
    public $array_export_entities = array();
    // Tableau des listes de champ+alias a exporter
    /**
     * @var array<int,array<string,string>>
     */
    public $array_export_dependencies = array();
    // array of list of entities that must take care of the DISTINCT if a field is added into export
    /**
     * @var array<array<array{rule:string,file:string,classfile:string,class:string,method:string,method_params:string[]}>>
     */
    public $array_export_special = array();
    // array of special operations to do on fields
    /**
     * @var array<array<string,string>>
     */
    public $array_export_examplevalues = array();
    // array with examples for fields
    /**
     * @var array<int,array<string,string>|''>
     */
    public $array_export_help = array();
    // array with tooltip help for fields
    // To store export templates
    /**
     * @var string List of fields in the export profile
     */
    public $hexa;
    /**
     * @var string List of search criteria in the export profile
     */
    public $hexafiltervalue;
    /**
     * @var string
     */
    public $datatoexport;
    /**
     * @var string Name of export profile
     */
    public $model_name;
    /**
     * @var int
     */
    public $fk_user;
    /**
     * @var string
     */
    public $sqlusedforexport;
    /**
     *    Constructor
     *
     *    @param  	DoliDB		$db		Database handler
     */
    public function __construct($db)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Load an exportable dataset
     *
     *    @param  	User		$user      	Object user making export
     *    @param  	string		$filter    	Load a particular dataset only
     *    @return	int						Return integer <0 if KO, >0 if OK
     */
    public function load_arrays($user, $filter = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *      Build the sql export request.
     *      Arrays this->array_export_xxx are already loaded for required datatoexport
     *
     *      @param      int		$indice				Indice of export
     *      @param      array<string,string>	$array_selected     Filter fields on array of fields to export
     *      @param      array<string,string>	$array_filterValue  Filter records on array of value for fields
     *      @return		string						SQL String. Example "select s.rowid as r_rowid, s.status as s_status from ..."
     */
    public function build_sql($indice, $array_selected, $array_filterValue)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *      Build the conditional string from filter the query
     *
     *      @param		string	$TypeField		Type of Field to filter
     *      @param		string	$NameField		Name of the field to filter
     *      @param		string	$ValueField		Value of the field for filter. Must not be ''
     *      @return		string					SQL string of then field ex : "field='xxx'"
     */
    public function build_filterQuery($TypeField, $NameField, $ValueField)
    {
    }
    /**
     *  conditionDate
     *
     *  @param 	string	$Field		Field operand 1
     *  @param 	string	$Value		Value operand 2
     *  @param 	string	$Sens		Comparison operator
     *  @return string
     */
    public function conditionDate($Field, $Value, $Sens)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *      Build an input field used to filter the query
     *
     *      @param		string	$TypeField		Type of Field to filter. Example: Text, Date, List:c_country:label:rowid, List:c_stcom:label:code, Numeric or Number, Boolean
     *      @param		string	$NameField		Name of the field to filter
     *      @param		string	$ValueField		Initial value of the field to filter
     *      @return		string					html string of the input field ex : "<input type=text name=... value=...>"
     */
    public function build_filterField($TypeField, $NameField, $ValueField)
    {
    }
    /**
     *  Build an input field used to filter the query
     *
     *  @param      string  $TypeField      Type of Field to filter
     *  @return     string                  html string of the input field ex : "<input type=text name=... value=...>"
     */
    public function genDocFilter($TypeField)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *      Build export file.
     *      File is built into directory $conf->export->dir_temp.'/'.$user->id
     *      Arrays this->array_export_xxx are already loaded for required datatoexport
     *
     *      @param      User		$user               User that export
     *      @param      string		$model              Export format
     *      @param      string		$datatoexport       Name of dataset to export
     *      @param      array<string,string>	$array_selected     Filter on array of fields to export
     *      @param      array<string,string>	$array_filterValue  Filter on array of fields with a filter
     *      @param		string		$sqlquery			If set, transmit the sql request for select (otherwise, sql request is generated from arrays)
     * 		@param		string		$separator			separator to fill $objmodel->separator with the new separator
     *      @return		int								Return integer <0 if KO, >0 if OK
     */
    public function build_file($user, $model, $datatoexport, $array_selected, $array_filterValue, $sqlquery = '', $separator = '')
    {
    }
    /**
     *  Save an export model in database
     *
     *  @param		User	$user 	Object user that save
     *  @return		int				Return integer <0 if KO, >0 if OK
     */
    public function create($user)
    {
    }
    /**
     *  Load an export profil from database
     *
     *  @param      int		$id		Id of profil to load
     *  @return     int				Return integer <0 if KO, >0 if OK
     */
    public function fetch($id)
    {
    }
    /**
     *	Delete object in database
     *
     *	@param      User		$user        	User that delete
     *  @param      int			$notrigger	    0=launch triggers after, 1=disable triggers
     *	@return		int							Return integer <0 if KO, >0 if OK
     */
    public function delete($user, $notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Output list all export models
     *  --TODO Move this into a class htmlxxx.class.php--
     *
     *	@return	void
     */
    public function list_export_model()
    {
    }
}
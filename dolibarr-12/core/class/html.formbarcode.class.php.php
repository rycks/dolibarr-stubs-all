<?php

/* Copyright (C) 2007-2012  Regis Houssin           <regis.houssin@inodbox.com>
 * Copyright (C) 2008-2012  Laurent Destailleur     <eldy@users.sourceforge.net>
 * Copyright (C) 2018       Frédéric France         <frederic.france@netlogic.fr>
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
 *
 */
/**
 *      \file       htdocs/core/class/html.formbarcode.class.php
 *      \brief      Fichier de la classe des fonctions predefinie de composants html
 */
/**
 *      Class to manage barcode HTML
 */
class FormBarCode
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
     *  Constructor
     *
     *  @param  DoliDB		$db		Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *	Return HTML select with list of bar code generators
     *
     *  @param	int		$selected       Id code pre-selected
     *  @param 	array	$barcodelist	Array of barcodes generators
     *  @param  int		$code_id        Id du code barre
     *  @param  int		$idForm			Id du formulaire
     * 	@return	string					HTML select string
     */
    public function setBarcodeEncoder($selected, $barcodelist, $code_id, $idForm = 'formbarcode')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Print form to select type of barcode
     *
     *  @param  int     $selected          Id code pre-selected
     *  @param  string  $htmlname          Name of HTML select field
     *  @param  int     $useempty          Affiche valeur vide dans liste
     *  @return void
     *  @deprecated
     */
    public function select_barcode_type($selected = '', $htmlname = 'barcodetype_id', $useempty = 0)
    {
    }
    /**
     *  Return html form to select type of barcode
     *
     *  @param  int     $selected          Id code pre-selected
     *  @param  string  $htmlname          Name of HTML select field
     *  @param  int     $useempty          Display empty value in select
     *  @return string
     */
    public function selectBarcodeType($selected = '', $htmlname = 'barcodetype_id', $useempty = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Show form to select type of barcode
     *
     *  @param  string		$page        	Page
     *  @param  int			$selected    	Id condition preselected
     *  @param  string		$htmlname    	Nom du formulaire select
     *  @return	void
     *  @deprecated
     */
    public function form_barcode_type($page, $selected = '', $htmlname = 'barcodetype_id')
    {
    }
    /**
     *  Return html form to select type of barcode
     *
     *  @param  string      $page           Page
     *  @param  int         $selected       Id condition preselected
     *  @param  string      $htmlname       Nom du formulaire select
     *  @return string
     */
    public function formBarcodeType($page, $selected = '', $htmlname = 'barcodetype_id')
    {
    }
}
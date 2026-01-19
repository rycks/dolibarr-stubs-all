<?php

/* Copyright (C) 2003-2007 Rodolphe Quiedeville <rodolphe@quiedeville.org>
 * Copyright (C) 2003      Xavier Dutoit        <doli@sydesy.com>
 * Copyright (C) 2004-2020 Laurent Destailleur  <eldy@users.sourceforge.net>
 * Copyright (C) 2005-2017 Regis Houssin      	<regis.houssin@inodbox.com>
 * Copyright (C) 2006 	   Jean Heimburger    	<jean@tiaris.info>
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
 *	\file       	htdocs/core/class/conf.class.php
 *	\ingroup		core
 *  \brief      	File of class to manage storage of current setup
 *  				Config is stored into file conf.php
 */
/**
 *  Class to stock current configuration
 */
class Conf extends \stdClass
{
    /**
     * @var Object 	Associative array with properties found in conf file
     */
    public $file;
    /**
     * @var Object 	Associative array with some properties ->type, ->db, ...
     */
    public $db;
    /**
     * @var Object To store global setup found into database
     */
    public $global;
    /**
     * @var Object To store browser info (->name, ->os, ->version, ->ua, ->layout, ...)
     */
    public $browser;
    //! To store some setup of generic modules
    public $mycompany;
    public $admin;
    public $medias;
    //! To store properties of multi-company
    public $multicompany;
    //! To store module status of special module names
    public $expedition_bon;
    public $delivery_note;
    //! To store if javascript/ajax is enabked
    public $use_javascript_ajax;
    //! To store if javascript/ajax is enabked
    public $disable_compute;
    //! Used to store current currency (ISO code like 'USD', 'EUR', ...). To get the currency symbol: $langs->getCurrencySymbol($this->currency)
    public $currency;
    /**
     * @var string
     */
    public $theme;
    // Contains current theme ("eldy", "auguria", ...)
    //! Used to store current css (from theme)
    /**
     * @var string
     */
    public $css;
    // Contains full path of css page ("/theme/eldy/style.css.php", ...)
    public $email_from;
    //! Used to store current menu handler
    public $standard_menu;
    /**
     * @var array<string,string>  List of activated modules
     */
    public $modules;
    /**
     * @var array<string,array<string,string|array>>  List of activated modules
     */
    public $modules_parts;
    /**
     * @var array<string,mixed> An array to store cache results ->cache['nameofcache']=...
     */
    public $cache;
    /**
     * @var int To tell header was output
     */
    public $headerdone;
    /**
     * @var string[]
     */
    public $logbuffer = array();
    /**
     * @var LogHandler[]
     */
    public $loghandlers = array();
    /**
     * @var int Used to store running instance for multi-company (default 1)
     */
    public $entity = 1;
    /**
     * @var int[] Used to store list of entities to use for each element
     */
    public $entities = array();
    public $dol_hide_topmenu;
    // Set if we force param dol_hide_topmenu into login url
    public $dol_hide_leftmenu;
    // Set if we force param dol_hide_leftmenu into login url
    public $dol_optimize_smallscreen;
    // Set if we force param dol_optimize_smallscreen into login url or if browser is smartphone
    public $dol_no_mouse_hover;
    // Set if we force param dol_no_mouse_hover into login url or if browser is smartphone
    public $dol_use_jmobile;
    // Set if we force param dol_use_jmobile into login url. 0=default, 1=to say we use app from a webview app, 2=to say we use app from a webview app and keep ajax
    public $format_date_short;
    // Format of day with PHP/C tags (strftime functions)
    public $format_date_short_java;
    // Format of day with Java tags
    public $format_hour_short;
    public $format_hour_short_duration;
    public $format_date_text_short;
    public $format_date_text;
    public $format_date_hour_short;
    public $format_date_hour_sec_short;
    public $format_date_hour_text_short;
    public $format_date_hour_text;
    public $liste_limit;
    public $tzuserinputkey = 'tzserver';
    // Use 'tzuserrel' to always store date in GMT and show date in time zone of user.
    // TODO Remove this part.
    /**
     * @var stdClass  	Supplier
     */
    public $fournisseur;
    /**
     * @var stdClass	Product
     */
    public $product;
    /**
     * @deprecated Use product
     */
    public $produit;
    public $service;
    /**
     * @deprecated Use contract
     */
    public $contrat;
    public $contract;
    public $actions;
    public $agenda;
    public $propal;
    /**
     * @deprecated Use order
     */
    public $commande;
    public $order;
    /**
     * @deprecated Use invoice
     */
    public $facture;
    public $invoice;
    public $user;
    /**
     * @deprecated Use member
     */
    public $adherent;
    public $member;
    public $bank;
    public $notification;
    public $expensereport;
    public $productbatch;
    /**
     * @deprecated Use project
     */
    public $projet;
    public $project;
    public $supplier_proposal;
    public $supplier_order;
    public $supplier_invoice;
    public $category;
    /**
     * Constructor
     */
    public function __construct()
    {
    }
    /**
     * Load setup values into conf object (read llx_const) for a specified entity
     * Note that this->db->xxx, this->file->xxx and this->multicompany have been already loaded when setEntityValues is called.
     *
     * @param	DoliDB	$db			Database handler
     * @param	int		$entity		Entity to get
     * @return	int					Return integer < 0 if KO, >= 0 if OK
     */
    public function setEntityValues($db, $entity)
    {
    }
    /**
     *  Load setup values into conf object (read llx_const)
     *  Note that this->db->xxx, this->file->xxx have been already set when setValues is called.
     *
     *  @param      DoliDB      $db     Database handler
     *  @return     int                 Return integer < 0 if KO, >= 0 if OK
     */
    public function setValues($db)
    {
    }
}
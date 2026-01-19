<?php

/* Copyright (C) 2003-2007  Rodolphe Quiedeville    <rodolphe@quiedeville.org>
 * Copyright (C) 2003       Xavier Dutoit           <doli@sydesy.com>
 * Copyright (C) 2004-2020  Laurent Destailleur     <eldy@users.sourceforge.net>
 * Copyright (C) 2005-2017  Regis Houssin           <regis.houssin@inodbox.com>
 * Copyright (C) 2006 	    Jean Heimburger         <jean@tiaris.info>
 * Copyright (C) 2024-2025  Frédéric France         <frederic.france@free.fr>
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
    /**
     * @var stdClass
     */
    public $mycompany;
    /**
     * @var stdClass
     */
    public $admin;
    /**
     * @var stdClass
     */
    public $medias;
    /**
     * @var stdClass To store properties of multi-company
     */
    public $multicompany;
    //! To store module status of special module names
    /**
     * @var ?mixed
     */
    public $expedition_bon;
    /**
     * @var ?mixed
     */
    public $delivery_note;
    /**
     * @var int To store if javascript/ajax is enabled
     */
    public $use_javascript_ajax;
    /**
     * @var int To store if compute is enabled
     */
    public $disable_compute;
    /**
     * @var string Used to store current currency (ISO code like 'USD', 'EUR', ...). To get the currency symbol:->getCurrencySymbol($this->currency)
     */
    public $currency;
    /**
     * @var string Contains current theme ("eldy", "auguria", ...)
     */
    public $theme;
    /**
     * @var string Contains full path of css page ("/theme/eldy/style.css.php", ...)
     */
    public $css;
    /**
     * @var string
     */
    public $email_from;
    /**
     * @var string Used to store current menu handler
     */
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
    /**
     * @var int<0,1> Set if we force param dol_hide_topmenu into login url
     */
    public $dol_hide_topmenu;
    /**
     * @var int<0,1> Set if we force param dol_hide_leftmenu into login url
     */
    public $dol_hide_leftmenu;
    /**
     * @var int Set if we force param dol_optimize_smallscreen into login url or if browser is smartphone
     */
    public $dol_optimize_smallscreen;
    /**
     * @var int Set if we force param dol_no_mouse_hover into login url or if browser is smartphone
     */
    public $dol_no_mouse_hover;
    /**
     * @var int
     */
    public $dol_use_jmobile;
    // Set if we force param dol_use_jmobile into login url. 0=default, 1=to say we use app from a webview app, 2=to say we use app from a webview app and keep ajax
    /**
     * @var string
     */
    public $format_date_short;
    // Format of day with PHP/C tags (strftime functions)
    /**
     * @var string
     */
    public $format_date_short_java;
    // Format of day with Java tags
    /**
     * @var string
     */
    public $format_hour_short;
    /**
     * @var string
     */
    public $format_hour_short_duration;
    /**
     * @var string
     */
    public $format_date_text_short;
    /**
     * @var string
     */
    public $format_date_text;
    /**
     * @var string
     */
    public $format_date_hour_short;
    /**
     * @var string
     */
    public $format_date_hour_sec_short;
    /**
     * @var string
     */
    public $format_date_hour_text_short;
    /**
     * @var string
     */
    public $format_date_hour_text;
    /**
     * @var int limit for list
     */
    public $liste_limit;
    /**
     * @var int checkboxes are on left column if 1
     */
    public $main_checkbox_left_column;
    /**
     * @var string  Use 'tzuserrel' to always store date in GMT and show date in time zone of user.
     */
    public $tzuserinputkey = 'tzserver';
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
     * @var stdClass
     * @deprecated Use product
     */
    public $produit;
    /**
     * @var stdClass  	service
     */
    public $service;
    /**
     * @var stdClass
     * @deprecated Use contract
     */
    public $contrat;
    /**
     * @var stdClass Contract
     */
    public $contract;
    /**
     * @var stdClass
     */
    public $actions;
    /**
     * @var stdClass
     */
    public $agenda;
    /**
     * @var stdClass
     */
    public $propal;
    /**
     * @var stdClass
     * @deprecated Use order
     */
    public $commande;
    /**
     * @var stdClass
     */
    public $order;
    /**
     * @var stdClass
     * @deprecated Use invoice
     */
    public $facture;
    /**
     * @var stdClass
     */
    public $invoice;
    /**
     * @var stdClass
     */
    public $user;
    /**
     * @var stdClass
     * @deprecated Use member
     */
    public $adherent;
    /**
     * @var stdClass
     */
    public $member;
    /**
     * @var stdClass
     */
    public $bank;
    /**
     * @var stdClass
     */
    public $notification;
    /**
     * @var stdClass
     */
    public $expensereport;
    /**
     * @var stdClass
     */
    public $productbatch;
    /**
     * @var stdClass
     */
    public $api;
    /**
     * @var ?stdClass
     * @deprecated Use project
     */
    public $projet;
    /**
     * @var ?stdClass
     */
    public $project;
    /**
     * @var stdClass
     */
    public $supplier_proposal;
    /**
     * @var stdClass
     */
    public $supplier_order;
    /**
     * @var stdClass
     */
    public $supplier_invoice;
    /**
     * @var stdClass
     */
    public $category;
    /**
     * @var ?stdClass
     */
    public $mrp;
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
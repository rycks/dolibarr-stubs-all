<?php

/* Copyright (C) 2003-2007 Rodolphe Quiedeville <rodolphe@quiedeville.org>
 * Copyright (C) 2003      Xavier Dutoit        <doli@sydesy.com>
 * Copyright (C) 2004-2016 Laurent Destailleur  <eldy@users.sourceforge.net>
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
class Conf
{
    /** \public */
    //! To store properties found in conf file
    public $file;
    /**
     * @var DoliDB Database handler.
     */
    public $db;
    //! To store properties found into database
    public $global;
    //! To store browser info
    public $browser;
    //! To store if javascript/ajax is enabked
    public $use_javascript_ajax;
    //! To store if javascript/ajax is enabked
    public $disable_compute;
    //! Used to store current currency (ISO code like 'USD', 'EUR', ...)
    public $currency;
    //! Used to store current css (from theme)
    public $theme;
    // Contains current theme ("eldy", "auguria", ...)
    public $css;
    // Contains full path of css page ("/theme/eldy/style.css.php", ...)
    //! Used to store current menu handler
    public $standard_menu;
    // List of activated modules
    public $modules = array();
    public $modules_parts = array('css' => array(), 'js' => array(), 'tabs' => array(), 'triggers' => array(), 'login' => array(), 'substitutions' => array(), 'menus' => array(), 'theme' => array(), 'sms' => array(), 'tpl' => array(), 'barcode' => array(), 'models' => array(), 'societe' => array(), 'hooks' => array(), 'dir' => array(), 'syslog' => array());
    public $logbuffer = array();
    /**
     * @var LogHandlerInterface[]
     */
    public $loghandlers = array();
    //! To store properties of multi-company
    public $multicompany;
    //! Used to store running instance for multi-company (default 1)
    public $entity = 1;
    //! Used to store list of entities to use for each element
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
    // Set if we force param dol_use_jmobile into login url
    /**
     * Constructor
     */
    public function __construct()
    {
    }
    /**
     *  Load setup values into conf object (read llx_const)
     *  Note that this->db->xxx, this->file->xxx and this->multicompany have been already loaded when setValues is called.
     *
     *  @param      DoliDB      $db     Database handler
     *  @return     int                 < 0 if KO, >= 0 if OK
     */
    public function setValues($db)
    {
    }
}
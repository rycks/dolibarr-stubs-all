<?php

/* Copyright (C) 2003-2007  Rodolphe Quiedeville    <rodolphe@quiedeville.org>
 * Copyright (C) 2004       Sebastien Di Cintio     <sdicintio@ressource-toi.org>
 * Copyright (C) 2004       Benoit Mortier          <benoit.mortier@opensides.be>
 * Copyright (C) 2004       Eric Seigne             <eric.seigne@ryxeo.com>
 * Copyright (C) 2005-2013  Laurent Destailleur     <eldy@users.sourceforge.net>
 * Copyright (C) 2005-2012  Regis Houssin           <regis.houssin@inodbox.com>
 * Copyright (C) 2014       Raphaël Doursenaud      <rdoursenaud@gpcsolutions.fr>
 * Copyright (C) 2018       Josep Lluís Amador      <joseplluis@lliuretic.cat>
 * Copyright (C) 2019       Frédéric France         <frederic.france@netlogic.fr>
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
 * \file           htdocs/core/modules/DolibarrModules.class.php
 * \brief          File of parent class of module descriptor class files
 */
/**
 * Class DolibarrModules
 *
 * Parent class for module descriptor class files
 */
class DolibarrModules
{
    /**
     * @var DoliDb Database handler
     */
    public $db;
    /**
     * @var int Module unique ID
     * @see https://wiki.dolibarr.org/index.php/List_of_modules_id
     */
    public $numero;
    /**
     * @var   string Publisher name
     * @since 4.0.0
     */
    public $editor_name;
    /**
     * @var   string URL of module at publisher site
     * @since 4.0.0
     */
    public $editor_url;
    /**
     * @var string Family
     * @see $familyinfo
     *
     * Native values: 'crm', 'financial', 'hr', 'projects', 'products', 'ecm', 'technic', 'other'.
     * Use familyinfo to declare a custom value.
     */
    public $family;
    /**
     * @var array Custom family informations
     * @see $family
     *
     * e.g.:
     * array(
     *     'myownfamily' => array(
     *         'position' => '001',
     *         'label' => $langs->trans("MyOwnFamily")
     *     )
     * );
     */
    public $familyinfo;
    /**
     * @var string    Module position on 2 digits
     */
    public $module_position = '50';
    /**
     * @var string Module name
     *
     * Only used if Module[ID]Name translation string is not found.
     *
     * You can use the following code to automatically derive it from your module's class name:
     * preg_replace('/^mod/i', '', get_class($this))
     */
    public $name;
    /**
     * @var string[] Paths to create when module is activated
     *
     * e.g.: array('/mymodule/temp')
     */
    public $dirs = array();
    /**
     * @var array Module boxes
     */
    public $boxes = array();
    /**
     * @var array Module constants
     */
    public $const = array();
    /**
     * @var array Module cron jobs entries
     */
    public $cronjobs = array();
    /**
     * @var array Module access rights
     */
    public $rights;
    /**
     * @var string Module access rights family
     */
    public $rights_class;
    /**
     * @var array|int 	Module menu entries (1 means the menu entries are not declared into module descriptor but are hardcoded into menu manager)
     */
    public $menu = array();
    /**
     * @var array Module parts
     *  array(
     *      // Set this to 1 if module has its own trigger directory (/mymodule/core/triggers)
     *      'triggers' => 0,
     *      // Set this to 1 if module has its own login method directory (/mymodule/core/login)
     *      'login' => 0,
     *      // Set this to 1 if module has its own substitution function file (/mymodule/core/substitutions)
     *      'substitutions' => 0,
     *      // Set this to 1 if module has its own menus handler directory (/mymodule/core/menus)
     *      'menus' => 0,
     *      // Set this to 1 if module has its own theme directory (/mymodule/theme)
     *      'theme' => 0,
     *      // Set this to 1 if module overwrite template dir (/mymodule/core/tpl)
     *      'tpl' => 0,
     *      // Set this to 1 if module has its own barcode directory (/mymodule/core/modules/barcode)
     *      'barcode' => 0,
     *      // Set this to 1 if module has its own models directory (/mymodule/core/modules/xxx)
     *      'models' => 0,
     *      // Set this to relative path of css file if module has its own css file
     *      'css' => '/mymodule/css/mymodule.css.php',
     *      // Set this to relative path of js file if module must load a js on all pages
     *      'js' => '/mymodule/js/mymodule.js',
     *      // Set here all hooks context managed by module
     *      'hooks' => array('hookcontext1','hookcontext2')
     *  )
     */
    public $module_parts = array();
    /**
     * @var        string Module documents ?
     * @deprecated Seems unused anywhere
     */
    public $docs;
    /**
     * @var        string ?
     * @deprecated Seems unused anywhere
     */
    public $dbversion = "-";
    /**
     * @var string Error message
     */
    public $error;
    /**
     * @var string Module version
     * @see http://semver.org
     *
     * The following keywords can also be used:
     * 'development'
     * 'experimental'
     * 'dolibarr': only for core modules that share its version
     * 'dolibarr_deprecated': only for deprecated core modules
     */
    public $version;
    /**
     * Module last version
     * @var string $lastVersion
     */
    public $lastVersion = '';
    /**
     * true indicate this module need update
     * @var bool $needUpdate
     */
    public $needUpdate = \false;
    /**
     * @var string Module description (short text)
     *
     * Only used if Module[ID]Desc translation string is not found.
     */
    public $description;
    /**
     * @var   string Module description (long text)
     * @since 4.0.0
     *
     * HTML content supported.
     */
    public $descriptionlong;
    // For exports
    /**
     * @var string Module export code
     */
    public $export_code;
    /**
     * @var string Module export label
     */
    public $export_label;
    public $export_permission;
    public $export_fields_array;
    public $export_TypeFields_array;
    // Array of key=>type where type can be 'Numeric', 'Date', 'Text', 'Boolean', 'Status', 'List:xxx:login:rowid'
    public $export_entities_array;
    public $export_special_array;
    // special or computed field
    public $export_dependencies_array;
    public $export_sql_start;
    public $export_sql_end;
    public $export_sql_order;
    // For import
    /**
     * @var string Module import code
     */
    public $import_code;
    /**
     * @var string Module import label
     */
    public $import_label;
    /**
     * @var string Module constant name
     */
    public $const_name;
    /**
     * @var bool Module can't be disabled
     */
    public $always_enabled;
    /**
     * @var bool Module is disabled
     */
    public $disabled;
    /**
     * @var int Module is enabled globally (Multicompany support)
     */
    public $core_enabled;
    /**
     * @var string Name of image file used for this module
     *
     * If file is in theme/yourtheme/img directory under name object_pictoname.png use 'pictoname'
     * If file is in module/img directory under name object_pictoname.png use 'pictoname@module'
     */
    public $picto;
    /**
     * @var string[] List of config pages
     *
     * Name of php pages stored into module/admin directory, used to setup module.
     * e.g.: "admin.php@module"
     */
    public $config_page_url;
    /**
     * @var string[] List of module class names that must be enabled if this module is enabled. e.g.: array('modAnotherModule', 'FR'=>'modYetAnotherModule')
     * @see $requiredby
     */
    public $depends;
    /**
     * @var string[] List of module class names to disable if the module is disabled.
     * @see $depends
     */
    public $requiredby;
    /**
     * @var string[] List of module class names as string this module is in conflict with.
     * @see $depends
     */
    public $conflictwith;
    /**
     * @var string[] Module language files
     */
    public $langfiles;
    /**
     * @var array<string,string> Array of warnings to show when we activate the module
     *
     * array('always'='text') or array('FR'='text')
     */
    public $warnings_activation;
    /**
     * @var array<string,string> Array of warnings to show when we activate an external module
     *
     * array('always'='text') or array('FR'='text')
     */
    public $warnings_activation_ext;
    /**
     * @var array Minimum version of PHP required by module.
     * e.g.: PHP ≥ 5.6 = array(5, 6)
     */
    public $phpmin;
    /**
     * @var array Minimum version of Dolibarr required by module.
     * e.g.: Dolibarr ≥ 3.6 = array(3, 6)
     */
    public $need_dolibarr_version;
    /**
     * @var bool Whether to hide the module.
     */
    public $hidden = \false;
    /**
     * @var string url to check for module update
     */
    public $url_last_version;
    /**
     * Constructor. Define names, constants, directories, boxes, permissions
     *
     * @param DoliDB $db Database handler
     */
    public function __construct($db)
    {
    }
    // We should but can't set this as abstract because this will make dolibarr hang
    // after migration due to old module not implementing. We must wait PHP is able to make
    // a try catch on Fatal error to manage this correctly.
    // We need constructor into function unActivateModule into admin.lib.php
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     * Enables a module.
     * Inserts all informations into database.
     *
     * @param array  $array_sql 	SQL requests to be executed when enabling module
     * @param string $options   	String with options when disabling module:
     *                          	- 'noboxes' = Do all actions but do not insert boxes
     *                          	- 'newboxdefonly' = Do all actions but for boxes, insert def of boxes only and not boxes activation
     * @return int                  1 if OK, 0 if KO
     */
    protected function _init($array_sql, $options = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     * Disable function. Deletes the module constants and boxes from the database.
     *
     * @param string[] $array_sql SQL requests to be executed when module is disabled
     * @param string   $options   Options when disabling module:
     *
     * @return int                     1 if OK, 0 if KO
     */
    protected function _remove($array_sql, $options = '')
    {
    }
    /**
     * Gives the translated module name if translation exists in admin.lang or into language files of module.
     * Otherwise return the module key name.
     *
     * @return string  Translated module name
     */
    public function getName()
    {
    }
    /**
     * Gives the translated module description if translation exists in admin.lang or the default module description
     *
     * @return string  Translated module description
     */
    public function getDesc()
    {
    }
    /**
     * Gives the long description of a module. First check README-la_LA.md then README.md
     * If no markdown files found, it returns translated value of the key ->descriptionlong.
     *
     * @return string     Long description of a module from README.md of from property.
     */
    public function getDescLong()
    {
    }
    /**
     * Return path of file if a README file was found.
     *
     * @return string      Path of file if a README file was found.
     */
    public function getDescLongReadmeFound()
    {
    }
    /**
     * Gives the changelog. First check ChangeLog-la_LA.md then ChangeLog.md
     *
     * @return string  Content of ChangeLog
     */
    public function getChangeLog()
    {
    }
    /**
     * Gives the publisher name
     *
     * @return string  Publisher name
     */
    public function getPublisher()
    {
    }
    /**
     * Gives the publisher url
     *
     * @return string  Publisher url
     */
    public function getPublisherUrl()
    {
    }
    /**
     * Gives module version (translated if param $translated is on)
     * For 'experimental' modules, gives 'experimental' translation
     * For 'dolibarr' modules, gives Dolibarr version
     *
     * @param  int $translated 1=Special version keys are translated, 0=Special version keys are not translated
     * @return string                  Module version
     */
    public function getVersion($translated = 1)
    {
    }
    /**
     * Gives the module position
     *
     * @return int  	Module position (an external module should never return a value lower than 100000. 1-100000 are reserved for core)
     */
    public function getModulePosition()
    {
    }
    /**
     * Tells if module is core or external.
     * 'dolibarr' and 'dolibarr_deprecated' is core
     * 'experimental' and 'development' is core
     *
     * @return string  'core', 'external' or 'unknown'
     */
    public function isCoreOrExternalModule()
    {
    }
    /**
     * Gives module related language files list
     *
     * @return string[]    Language files list
     */
    public function getLangFilesArray()
    {
    }
    /**
     * Gives translated label of an export dataset
     *
     * @param int $r Dataset index
     *
     * @return string       Translated databaset label
     */
    public function getExportDatasetLabel($r)
    {
    }
    /**
     * Gives translated label of an import dataset
     *
     * @param int $r Dataset index
     *
     * @return string      Translated dataset label
     */
    public function getImportDatasetLabel($r)
    {
    }
    /**
     * Gives the last date of activation
     *
     * @return 	int|string       	Date of last activation or '' if module was never activated
     */
    public function getLastActivationDate()
    {
    }
    /**
     * Gives the last author of activation
     *
     * @return array       Array array('authorid'=>Id of last activation user, 'lastactivationdate'=>Date of last activation)
     */
    public function getLastActivationInfo()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     * Insert constants for module activation
     *
     * @return int Error count (0 if OK)
     */
    protected function _active()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     * Module deactivation
     *
     * @return int Error count (0 if OK)
     */
    protected function _unactive()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps,PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     * Create tables and keys required by module:
     * - Files table.sql or table-module.sql with create table instructions
     * - Then table.key.sql or table-module.key.sql with create keys instructions
     * - Then data_xxx.sql (usualy provided by external modules only)
     * - Then update_xxx.sql (usualy provided by external modules only)
     * Files must be stored in subdirectory 'tables' or 'data' into directory $reldir (Example: '/install/mysql/' or '/module/sql/')
     * This function may also be called by :
     * - _load_tables('/install/mysql/', 'modulename') into the this->init() of core module descriptors.
     * - _load_tables('/mymodule/sql/') into the this->init() of external module descriptors.
     *
     * @param  	string 	$reldir 			Relative directory where to scan files. Example: '/install/mysql/' or '/module/sql/'
     * @param	string	$onlywithsuffix		Only with the defined suffix
     * @return 	int             			<=0 if KO, >0 if OK
     */
    protected function _load_tables($reldir, $onlywithsuffix = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Adds boxes
     *
     * @param string $option Options when disabling module ('newboxdefonly'=insert only boxes definition)
     *
     * @return int             Error count (0 if OK)
     */
    public function insert_boxes($option = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Removes boxes
     *
     * @return int Error count (0 if OK)
     */
    public function delete_boxes()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Adds cronjobs
     *
     * @return int             Error count (0 if OK)
     */
    public function insert_cronjobs()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Removes boxes
     *
     * @return int Error count (0 if OK)
     */
    public function delete_cronjobs()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Removes tabs
     *
     * @return int Error count (0 if OK)
     */
    public function delete_tabs()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Adds tabs
     *
     * @return int  Error count (0 if ok)
     */
    public function insert_tabs()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Adds constants
     *
     * @return int Error count (0 if OK)
     */
    public function insert_const()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Removes constants tagged 'deleteonunactive'
     *
     * @return int <0 if KO, 0 if OK
     */
    public function delete_const()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Adds access rights
     *
     * @param  int $reinitadminperms 	If 1, we also grant them to all admin users
     * @param  int $force_entity     	Force current entity
     * @param  int $notrigger        	1=Does not execute triggers, 0= execute triggers
     * @return int                     	Error count (0 if OK)
     */
    public function insert_permissions($reinitadminperms = 0, $force_entity = \null, $notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Removes access rights
     *
     * @return int                     Error count (0 if OK)
     */
    public function delete_permissions()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Adds menu entries
     *
     * @return int     Error count (0 if OK)
     */
    public function insert_menus()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Removes menu entries
     *
     * @return int Error count (0 if OK)
     */
    public function delete_menus()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Creates directories
     *
     * @return int Error count (0 if OK)
     */
    public function create_dirs()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Adds directories definitions
     *
     * @param string $name Name
     * @param string $dir  Directory
     *
     * @return int             Error count (0 if OK)
     */
    public function insert_dirs($name, $dir)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Removes directories
     *
     * @return int Error count (0 if OK)
     */
    public function delete_dirs()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Adds generic parts
     *
     * @return int Error count (0 if OK)
     */
    public function insert_module_parts()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Removes generic parts
     *
     * @return int Error count (0 if OK)
     */
    public function delete_module_parts()
    {
    }
    /**
     * Function called when module is enabled.
     * The init function adds tabs, constants, boxes, permissions and menus (defined in constructor) into Dolibarr database.
     * It also creates data directories
     *
     * @param  string $options Options when enabling module ('', 'newboxdefonly', 'noboxes', 'menuonly')
     *                         'noboxes' = Do not insert boxes 'newboxdefonly' = For boxes, insert def of boxes only and not boxes activation
     * @return int                1 if OK, 0 if KO
     */
    public function init($options = '')
    {
    }
    /**
     * Function called when module is disabled.
     * The remove function removes tabs, constants, boxes, permissions and menus from Dolibarr database.
     * Data directories are not deleted
     *
     * @param  string $options Options when enabling module ('', 'noboxes')
     * @return int                     1 if OK, 0 if KO
     */
    public function remove($options = '')
    {
    }
    /**
     * Return Kanban view of a module
     *
     * @param	string	$codeenabledisable		HTML code for button to enable/disable module
     * @param	string	$codetoconfig			HTML code to go to config page
     * @return 	string							HTML code of Kanban view
     */
    public function getKanbanView($codeenabledisable = '', $codetoconfig = '')
    {
    }
    /**
     * Check for module update
     * TODO : store results for $this->url_last_version and $this->needUpdate
     * Add a cron task to monitor for updates
     *
     * @return int <0 if Error, 0 == no update needed,  >0 if need update
     */
    public function checkForUpdate()
    {
    }
}
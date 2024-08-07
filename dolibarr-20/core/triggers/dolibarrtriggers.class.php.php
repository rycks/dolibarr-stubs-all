<?php

/* Copyright (C) 2014		Marcos García			<marcosgdf@gmail.com>
 * Copyright (C) 2023-2024	William Mead			<william.mead@manchenumerique.fr>
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
 * Class that all triggers must inherit
 */
abstract class DolibarrTriggers
{
    /**
     * Database handler
     * @var DoliDB
     */
    protected $db;
    /**
     * Name of the trigger
     * @var mixed|string
     */
    public $name;
    /**
     * Description of the trigger
     * @var string
     */
    public $description;
    /**
     * Version of the trigger
     * @var string
     */
    public $version;
    /**
     * Image of the trigger
     * @var string
     */
    public $picto;
    /**
     * Category of the trigger
     * @var string
     */
    public $family;
    /**
     * Error reported by the trigger
     * @var string
     * @deprecated Use $this->errors
     * @see $errors
     */
    public $error;
    /**
     * Errors reported by the trigger
     * @var array
     */
    public $errors;
    /**
     * @var string module is in development
     * @deprecated Use self::VERSIONS
     * @see self::VERSIONS
     */
    const VERSION_DEVELOPMENT = 'development';
    /**
     * @var string module is experimental
     * @deprecated Use self::VERSIONS
     * @see self::VERSIONS
     */
    const VERSION_EXPERIMENTAL = 'experimental';
    /**
     * @var string module is dolibarr ready
     * @deprecated Use self::VERSIONS
     * @see self::VERSIONS
     */
    const VERSION_DOLIBARR = 'dolibarr';
    /**
     * @var array dictionary of possible module states
     */
    const VERSIONS = ['dev' => 'development', 'exp' => 'experimental', 'prod' => 'dolibarr'];
    /**
     * Constructor
     *
     * @param DoliDB $db Database handler
     */
    public function __construct(\DoliDB $db)
    {
    }
    /**
     * Returns the name of the trigger file
     *
     * @return string
     */
    public function getName()
    {
    }
    /**
     * Returns the description of trigger file
     *
     * @return string
     */
    public function getDesc()
    {
    }
    /**
     * Returns the version of the trigger file
     *
     * @return string Version of trigger file
     */
    public function getVersion()
    {
    }
    /**
     * setErrorsFromObject
     *
     * @param	CommonObject	$object		Object
     * @return	void
     */
    public function setErrorsFromObject(\CommonObject $object)
    {
    }
    /**
     *  Function called when a Dolibarr business event is done.
     *  All functions "runTrigger" are triggered if file is inside directory htdocs/core/triggers or htdocs/module/code/triggers (and declared)
     *
     *  @param string       $action     Event action code
     *  @param Object       $object     Object
     *  @param User         $user       Object user
     *  @param Translate    $langs      Object langs
     *  @param conf         $conf       Object conf
     *  @return int                     if KO: <0 || if no trigger ran: 0 || if OK: >0
     */
    public abstract function runTrigger($action, $object, \User $user, \Translate $langs, \Conf $conf);
}
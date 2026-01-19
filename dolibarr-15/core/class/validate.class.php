<?php

/* Copyright (C) 2021 John BOTELLA <john.botella@atm-consulting.fr>
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * any later version.
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
 *   	\file       htdocs/core/class/validate.class.php
 *      \ingroup    core
 *		\brief      File for Utils class
 */
/**
 *		Class toolbox to validate values
 */
class Validate
{
    /**
     * @var DoliDb		Database handler (result of a new DoliDB)
     */
    public $db;
    /**
     * @var Translate $outputLang
     */
    public $outputLang;
    /**
     * @var string 		Error string
     * @see             $errors
     */
    public $error;
    /**
     * Constructor
     *
     * @param DoliDB 		$db 			Database handler
     * @param Translate   	$outputLang 	Output lang for error
     */
    public function __construct($db, $outputLang = \null)
    {
    }
    /**
     * Use to clear errors msg or other ghost vars
     * @return null
     */
    protected function clear()
    {
    }
    /**
     * Use to clear errors msg or other ghost vars
     *
     * @param string $errMsg your error message
     * @return null
     */
    protected function setError($errMsg)
    {
    }
    /**
     * Check for e-mail validity
     *
     * @param string $email e-mail address to validate
     * @param int   $maxLength string max length
     * @return boolean Validity is ok or not
     */
    public function isEmail($email, $maxLength = \false)
    {
    }
    /**
     * Check for price validity
     *
     * @param string $price Price to validate
     * @return boolean Validity is ok or not
     */
    public function isPrice($price)
    {
    }
    /**
     * Check for timestamp validity
     *
     * @param string|int $stamp timestamp to validate
     * @return boolean Validity is ok or not
     */
    public function isTimestamp($stamp)
    {
    }
    /**
     * Check for phone validity
     *
     * @param string $phone Phone string to validate
     * @return boolean Validity is ok or not
     */
    public function isPhone($phone)
    {
    }
    /**
     * Check for string max length validity
     *
     * @param string $string to validate
     * @param int  $length max length
     * @return boolean Validity is ok or not
     */
    public function isMaxLength($string, $length)
    {
    }
    /**
     * Check for string not empty
     *
     * @param string $string to validate
     * @return boolean Validity is ok or not
     */
    public function isNotEmptyString($string)
    {
    }
    /**
     * Check for string min length validity
     *
     * @param string $string to validate
     * @param int  $length max length
     * @return boolean Validity is ok or not
     */
    public function isMinLength($string, $length)
    {
    }
    /**
     * Check url validity
     *
     * @param string $url to validate
     * @return boolean Validity is ok or not
     */
    public function isUrl($url)
    {
    }
    /**
     * Check Duration validity
     *
     * @param mixed $duration to validate
     * @return boolean Validity is ok or not
     */
    public function isDuration($duration)
    {
    }
    /**
     * Check numeric validity
     *
     * @param mixed $string to validate
     * @return boolean Validity is ok or not
     */
    public function isNumeric($string)
    {
    }
    /**
     * Check for boolean validity
     *
     * @param boolean $bool Boolean to validate
     * @return boolean Validity is ok or not
     */
    public function isBool($bool)
    {
    }
    /**
     * Check for all values in db
     *
     * @param array  $values Boolean to validate
     * @param string $table  the db table name without MAIN_DB_PREFIX
     * @param string $col    the target col
     * @return boolean Validity is ok or not
     * @throws Exception
     */
    public function isInDb($values, $table, $col)
    {
    }
    /**
     * Check for all values in db
     *
     * @param array  $values    Boolean to validate
     * @param string $classname the class name
     * @param string $classpath the class path
     * @return boolean Validity is ok or not
     * @throws Exception
     */
    public function isFetchable($values, $classname, $classpath)
    {
    }
}
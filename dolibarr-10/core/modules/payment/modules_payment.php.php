<?php

/* Copyright (C) 2015      Juanjo Menent	    <jmenent@2byte.es>
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
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 * or see http://www.gnu.org/
 */
/**
 *  \class      ModeleNumRefPayments
 *  \brief      Payment numbering references mother class
 */
abstract class ModeleNumRefPayments
{
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    /**
     *	Return if a module can be used or not
     *
     *	@return		boolean     true if module can be used
     */
    public function isEnabled()
    {
    }
    /**
     *	Return the default description of numbering module
     *
     *	@return     string      Texte descripif
     */
    public function info()
    {
    }
    /**
     *	Return numbering example
     *
     *	@return     string      Example
     */
    public function getExample()
    {
    }
    /**
     *  Test if the existing numbers in the database do not cause conflicts that would prevent this numbering run.
     *
     *	@return     boolean     false si conflit, true si ok
     */
    public function canBeActivated()
    {
    }
    /**
     *	Returns the next value
     *
     *	@param	Societe		$objsoc     Object thirdparty
     *	@param	Object		$object		Object we need next value for
     *	@return	string      Valeur
     */
    public function getNextValue($objsoc, $object)
    {
    }
    /**
     *	Returns the module numbering version
     *
     *	@return     string      Value
     */
    public function getVersion()
    {
    }
}
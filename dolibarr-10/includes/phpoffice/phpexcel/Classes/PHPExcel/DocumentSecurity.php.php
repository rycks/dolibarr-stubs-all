<?php

/**
 * PHPExcel
 *
 * Copyright (c) 2006 - 2014 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel
 * @package    PHPExcel
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    ##VERSION##, ##DATE##
 */
/**
 * PHPExcel_DocumentSecurity
 *
 * @category   PHPExcel
 * @package    PHPExcel
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_DocumentSecurity
{
    /**
     * LockRevision
     *
     * @var boolean
     */
    private $_lockRevision;
    /**
     * LockStructure
     *
     * @var boolean
     */
    private $_lockStructure;
    /**
     * LockWindows
     *
     * @var boolean
     */
    private $_lockWindows;
    /**
     * RevisionsPassword
     *
     * @var string
     */
    private $_revisionsPassword;
    /**
     * WorkbookPassword
     *
     * @var string
     */
    private $_workbookPassword;
    /**
     * Create a new PHPExcel_DocumentSecurity
     */
    public function __construct()
    {
    }
    /**
     * Is some sort of dcument security enabled?
     *
     * @return boolean
     */
    function isSecurityEnabled()
    {
    }
    /**
     * Get LockRevision
     *
     * @return boolean
     */
    function getLockRevision()
    {
    }
    /**
     * Set LockRevision
     *
     * @param boolean $pValue
     * @return PHPExcel_DocumentSecurity
     */
    function setLockRevision($pValue = \false)
    {
    }
    /**
     * Get LockStructure
     *
     * @return boolean
     */
    function getLockStructure()
    {
    }
    /**
     * Set LockStructure
     *
     * @param boolean $pValue
     * @return PHPExcel_DocumentSecurity
     */
    function setLockStructure($pValue = \false)
    {
    }
    /**
     * Get LockWindows
     *
     * @return boolean
     */
    function getLockWindows()
    {
    }
    /**
     * Set LockWindows
     *
     * @param boolean $pValue
     * @return PHPExcel_DocumentSecurity
     */
    function setLockWindows($pValue = \false)
    {
    }
    /**
     * Get RevisionsPassword (hashed)
     *
     * @return string
     */
    function getRevisionsPassword()
    {
    }
    /**
     * Set RevisionsPassword
     *
     * @param string 	$pValue
     * @param boolean 	$pAlreadyHashed If the password has already been hashed, set this to true
     * @return PHPExcel_DocumentSecurity
     */
    function setRevisionsPassword($pValue = '', $pAlreadyHashed = \false)
    {
    }
    /**
     * Get WorkbookPassword (hashed)
     *
     * @return string
     */
    function getWorkbookPassword()
    {
    }
    /**
     * Set WorkbookPassword
     *
     * @param string 	$pValue
     * @param boolean 	$pAlreadyHashed If the password has already been hashed, set this to true
     * @return PHPExcel_DocumentSecurity
     */
    function setWorkbookPassword($pValue = '', $pAlreadyHashed = \false)
    {
    }
    /**
     * Implement PHP __clone to create a deep clone, not just a shallow copy.
     */
    public function __clone()
    {
    }
}
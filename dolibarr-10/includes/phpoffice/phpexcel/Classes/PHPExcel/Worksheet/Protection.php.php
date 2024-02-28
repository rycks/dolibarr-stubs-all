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
 * @package    PHPExcel_Worksheet
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    ##VERSION##, ##DATE##
 */
/**
 * PHPExcel_Worksheet_Protection
 *
 * @category   PHPExcel
 * @package    PHPExcel_Worksheet
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_Worksheet_Protection
{
    /**
     * Sheet
     *
     * @var boolean
     */
    private $_sheet = \false;
    /**
     * Objects
     *
     * @var boolean
     */
    private $_objects = \false;
    /**
     * Scenarios
     *
     * @var boolean
     */
    private $_scenarios = \false;
    /**
     * Format cells
     *
     * @var boolean
     */
    private $_formatCells = \false;
    /**
     * Format columns
     *
     * @var boolean
     */
    private $_formatColumns = \false;
    /**
     * Format rows
     *
     * @var boolean
     */
    private $_formatRows = \false;
    /**
     * Insert columns
     *
     * @var boolean
     */
    private $_insertColumns = \false;
    /**
     * Insert rows
     *
     * @var boolean
     */
    private $_insertRows = \false;
    /**
     * Insert hyperlinks
     *
     * @var boolean
     */
    private $_insertHyperlinks = \false;
    /**
     * Delete columns
     *
     * @var boolean
     */
    private $_deleteColumns = \false;
    /**
     * Delete rows
     *
     * @var boolean
     */
    private $_deleteRows = \false;
    /**
     * Select locked cells
     *
     * @var boolean
     */
    private $_selectLockedCells = \false;
    /**
     * Sort
     *
     * @var boolean
     */
    private $_sort = \false;
    /**
     * AutoFilter
     *
     * @var boolean
     */
    private $_autoFilter = \false;
    /**
     * Pivot tables
     *
     * @var boolean
     */
    private $_pivotTables = \false;
    /**
     * Select unlocked cells
     *
     * @var boolean
     */
    private $_selectUnlockedCells = \false;
    /**
     * Password
     *
     * @var string
     */
    private $_password = '';
    /**
     * Create a new PHPExcel_Worksheet_Protection
     */
    public function __construct()
    {
    }
    /**
     * Is some sort of protection enabled?
     *
     * @return boolean
     */
    function isProtectionEnabled()
    {
    }
    /**
     * Get Sheet
     *
     * @return boolean
     */
    function getSheet()
    {
    }
    /**
     * Set Sheet
     *
     * @param boolean $pValue
     * @return PHPExcel_Worksheet_Protection
     */
    function setSheet($pValue = \false)
    {
    }
    /**
     * Get Objects
     *
     * @return boolean
     */
    function getObjects()
    {
    }
    /**
     * Set Objects
     *
     * @param boolean $pValue
     * @return PHPExcel_Worksheet_Protection
     */
    function setObjects($pValue = \false)
    {
    }
    /**
     * Get Scenarios
     *
     * @return boolean
     */
    function getScenarios()
    {
    }
    /**
     * Set Scenarios
     *
     * @param boolean $pValue
     * @return PHPExcel_Worksheet_Protection
     */
    function setScenarios($pValue = \false)
    {
    }
    /**
     * Get FormatCells
     *
     * @return boolean
     */
    function getFormatCells()
    {
    }
    /**
     * Set FormatCells
     *
     * @param boolean $pValue
     * @return PHPExcel_Worksheet_Protection
     */
    function setFormatCells($pValue = \false)
    {
    }
    /**
     * Get FormatColumns
     *
     * @return boolean
     */
    function getFormatColumns()
    {
    }
    /**
     * Set FormatColumns
     *
     * @param boolean $pValue
     * @return PHPExcel_Worksheet_Protection
     */
    function setFormatColumns($pValue = \false)
    {
    }
    /**
     * Get FormatRows
     *
     * @return boolean
     */
    function getFormatRows()
    {
    }
    /**
     * Set FormatRows
     *
     * @param boolean $pValue
     * @return PHPExcel_Worksheet_Protection
     */
    function setFormatRows($pValue = \false)
    {
    }
    /**
     * Get InsertColumns
     *
     * @return boolean
     */
    function getInsertColumns()
    {
    }
    /**
     * Set InsertColumns
     *
     * @param boolean $pValue
     * @return PHPExcel_Worksheet_Protection
     */
    function setInsertColumns($pValue = \false)
    {
    }
    /**
     * Get InsertRows
     *
     * @return boolean
     */
    function getInsertRows()
    {
    }
    /**
     * Set InsertRows
     *
     * @param boolean $pValue
     * @return PHPExcel_Worksheet_Protection
     */
    function setInsertRows($pValue = \false)
    {
    }
    /**
     * Get InsertHyperlinks
     *
     * @return boolean
     */
    function getInsertHyperlinks()
    {
    }
    /**
     * Set InsertHyperlinks
     *
     * @param boolean $pValue
     * @return PHPExcel_Worksheet_Protection
     */
    function setInsertHyperlinks($pValue = \false)
    {
    }
    /**
     * Get DeleteColumns
     *
     * @return boolean
     */
    function getDeleteColumns()
    {
    }
    /**
     * Set DeleteColumns
     *
     * @param boolean $pValue
     * @return PHPExcel_Worksheet_Protection
     */
    function setDeleteColumns($pValue = \false)
    {
    }
    /**
     * Get DeleteRows
     *
     * @return boolean
     */
    function getDeleteRows()
    {
    }
    /**
     * Set DeleteRows
     *
     * @param boolean $pValue
     * @return PHPExcel_Worksheet_Protection
     */
    function setDeleteRows($pValue = \false)
    {
    }
    /**
     * Get SelectLockedCells
     *
     * @return boolean
     */
    function getSelectLockedCells()
    {
    }
    /**
     * Set SelectLockedCells
     *
     * @param boolean $pValue
     * @return PHPExcel_Worksheet_Protection
     */
    function setSelectLockedCells($pValue = \false)
    {
    }
    /**
     * Get Sort
     *
     * @return boolean
     */
    function getSort()
    {
    }
    /**
     * Set Sort
     *
     * @param boolean $pValue
     * @return PHPExcel_Worksheet_Protection
     */
    function setSort($pValue = \false)
    {
    }
    /**
     * Get AutoFilter
     *
     * @return boolean
     */
    function getAutoFilter()
    {
    }
    /**
     * Set AutoFilter
     *
     * @param boolean $pValue
     * @return PHPExcel_Worksheet_Protection
     */
    function setAutoFilter($pValue = \false)
    {
    }
    /**
     * Get PivotTables
     *
     * @return boolean
     */
    function getPivotTables()
    {
    }
    /**
     * Set PivotTables
     *
     * @param boolean $pValue
     * @return PHPExcel_Worksheet_Protection
     */
    function setPivotTables($pValue = \false)
    {
    }
    /**
     * Get SelectUnlockedCells
     *
     * @return boolean
     */
    function getSelectUnlockedCells()
    {
    }
    /**
     * Set SelectUnlockedCells
     *
     * @param boolean $pValue
     * @return PHPExcel_Worksheet_Protection
     */
    function setSelectUnlockedCells($pValue = \false)
    {
    }
    /**
     * Get Password (hashed)
     *
     * @return string
     */
    function getPassword()
    {
    }
    /**
     * Set Password
     *
     * @param string 	$pValue
     * @param boolean 	$pAlreadyHashed If the password has already been hashed, set this to true
     * @return PHPExcel_Worksheet_Protection
     */
    function setPassword($pValue = '', $pAlreadyHashed = \false)
    {
    }
    /**
     * Implement PHP __clone to create a deep clone, not just a shallow copy.
     */
    public function __clone()
    {
    }
}
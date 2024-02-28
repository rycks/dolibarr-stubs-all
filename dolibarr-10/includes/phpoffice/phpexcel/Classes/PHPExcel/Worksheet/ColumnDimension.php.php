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
 * PHPExcel_Worksheet_ColumnDimension
 *
 * @category   PHPExcel
 * @package    PHPExcel_Worksheet
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_Worksheet_ColumnDimension
{
    /**
     * Column index
     *
     * @var int
     */
    private $_columnIndex;
    /**
     * Column width
     *
     * When this is set to a negative value, the column width should be ignored by IWriter
     *
     * @var double
     */
    private $_width = -1;
    /**
     * Auto size?
     *
     * @var bool
     */
    private $_autoSize = \false;
    /**
     * Visible?
     *
     * @var bool
     */
    private $_visible = \true;
    /**
     * Outline level
     *
     * @var int
     */
    private $_outlineLevel = 0;
    /**
     * Collapsed
     *
     * @var bool
     */
    private $_collapsed = \false;
    /**
     * Index to cellXf
     *
     * @var int
     */
    private $_xfIndex;
    /**
     * Create a new PHPExcel_Worksheet_ColumnDimension
     *
     * @param string $pIndex Character column index
     */
    public function __construct($pIndex = 'A')
    {
    }
    /**
     * Get ColumnIndex
     *
     * @return string
     */
    public function getColumnIndex()
    {
    }
    /**
     * Set ColumnIndex
     *
     * @param string $pValue
     * @return PHPExcel_Worksheet_ColumnDimension
     */
    public function setColumnIndex($pValue)
    {
    }
    /**
     * Get Width
     *
     * @return double
     */
    public function getWidth()
    {
    }
    /**
     * Set Width
     *
     * @param double $pValue
     * @return PHPExcel_Worksheet_ColumnDimension
     */
    public function setWidth($pValue = -1)
    {
    }
    /**
     * Get Auto Size
     *
     * @return bool
     */
    public function getAutoSize()
    {
    }
    /**
     * Set Auto Size
     *
     * @param bool $pValue
     * @return PHPExcel_Worksheet_ColumnDimension
     */
    public function setAutoSize($pValue = \false)
    {
    }
    /**
     * Get Visible
     *
     * @return bool
     */
    public function getVisible()
    {
    }
    /**
     * Set Visible
     *
     * @param bool $pValue
     * @return PHPExcel_Worksheet_ColumnDimension
     */
    public function setVisible($pValue = \true)
    {
    }
    /**
     * Get Outline Level
     *
     * @return int
     */
    public function getOutlineLevel()
    {
    }
    /**
     * Set Outline Level
     *
     * Value must be between 0 and 7
     *
     * @param int $pValue
     * @throws PHPExcel_Exception
     * @return PHPExcel_Worksheet_ColumnDimension
     */
    public function setOutlineLevel($pValue)
    {
    }
    /**
     * Get Collapsed
     *
     * @return bool
     */
    public function getCollapsed()
    {
    }
    /**
     * Set Collapsed
     *
     * @param bool $pValue
     * @return PHPExcel_Worksheet_ColumnDimension
     */
    public function setCollapsed($pValue = \true)
    {
    }
    /**
     * Get index to cellXf
     *
     * @return int
     */
    public function getXfIndex()
    {
    }
    /**
     * Set index to cellXf
     *
     * @param int $pValue
     * @return PHPExcel_Worksheet_ColumnDimension
     */
    public function setXfIndex($pValue = 0)
    {
    }
    /**
     * Implement PHP __clone to create a deep clone, not just a shallow copy.
     */
    public function __clone()
    {
    }
}
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
 * PHPExcel_Worksheet_RowDimension
 *
 * @category   PHPExcel
 * @package    PHPExcel_Worksheet
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_Worksheet_RowDimension
{
    /**
     * Row index
     *
     * @var int
     */
    private $_rowIndex;
    /**
     * Row height (in pt)
     *
     * When this is set to a negative value, the row height should be ignored by IWriter
     *
     * @var double
     */
    private $_rowHeight = -1;
    /**
     * ZeroHeight for Row?
     *
     * @var bool
     */
    private $_zeroHeight = \false;
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
     * Index to cellXf. Null value means row has no explicit cellXf format.
     *
     * @var int|null
     */
    private $_xfIndex;
    /**
     * Create a new PHPExcel_Worksheet_RowDimension
     *
     * @param int $pIndex Numeric row index
     */
    public function __construct($pIndex = 0)
    {
    }
    /**
     * Get Row Index
     *
     * @return int
     */
    public function getRowIndex()
    {
    }
    /**
     * Set Row Index
     *
     * @param int $pValue
     * @return PHPExcel_Worksheet_RowDimension
     */
    public function setRowIndex($pValue)
    {
    }
    /**
     * Get Row Height
     *
     * @return double
     */
    public function getRowHeight()
    {
    }
    /**
     * Set Row Height
     *
     * @param double $pValue
     * @return PHPExcel_Worksheet_RowDimension
     */
    public function setRowHeight($pValue = -1)
    {
    }
    /**
     * Get ZeroHeight
     *
     * @return bool
     */
    public function getZeroHeight()
    {
    }
    /**
     * Set ZeroHeight
     *
     * @param bool $pValue
     * @return PHPExcel_Worksheet_RowDimension
     */
    public function setZeroHeight($pValue = \false)
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
     * @return PHPExcel_Worksheet_RowDimension
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
     * @return PHPExcel_Worksheet_RowDimension
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
     * @return PHPExcel_Worksheet_RowDimension
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
     * @return PHPExcel_Worksheet_RowDimension
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
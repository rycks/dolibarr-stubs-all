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
 * @category	PHPExcel
 * @package		PHPExcel_Chart
 * @copyright	Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license		http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version		##VERSION##, ##DATE##
 */
/**
 * PHPExcel_Chart_Layout
 *
 * @category	PHPExcel
 * @package		PHPExcel_Chart
 * @copyright	Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_Chart_Layout
{
    /**
     * layoutTarget
     *
     * @var string
     */
    private $_layoutTarget = \NULL;
    /**
     * X Mode
     *
     * @var string
     */
    private $_xMode = \NULL;
    /**
     * Y Mode
     *
     * @var string
     */
    private $_yMode = \NULL;
    /**
     * X-Position
     *
     * @var float
     */
    private $_xPos = \NULL;
    /**
     * Y-Position
     *
     * @var float
     */
    private $_yPos = \NULL;
    /**
     * width
     *
     * @var float
     */
    private $_width = \NULL;
    /**
     * height
     *
     * @var float
     */
    private $_height = \NULL;
    /**
     * show legend key
     * Specifies that legend keys should be shown in data labels
     *
     * @var boolean
     */
    private $_showLegendKey = \NULL;
    /**
     * show value
     * Specifies that the value should be shown in a data label.
     *
     * @var boolean
     */
    private $_showVal = \NULL;
    /**
     * show category name
     * Specifies that the category name should be shown in the data label.
     *
     * @var boolean
     */
    private $_showCatName = \NULL;
    /**
     * show data series name
     * Specifies that the series name should be shown in the data label.
     *
     * @var boolean
     */
    private $_showSerName = \NULL;
    /**
     * show percentage
     * Specifies that the percentage should be shown in the data label.
     *
     * @var boolean
     */
    private $_showPercent = \NULL;
    /**
     * show bubble size
     *
     * @var boolean
     */
    private $_showBubbleSize = \NULL;
    /**
     * show leader lines
     * Specifies that leader lines should be shown for the data label.
     *
     * @var boolean
     */
    private $_showLeaderLines = \NULL;
    /**
     * Create a new PHPExcel_Chart_Layout
     */
    public function __construct($layout = array())
    {
    }
    /**
     * Get Layout Target
     *
     * @return string
     */
    public function getLayoutTarget()
    {
    }
    /**
     * Set Layout Target
     *
     * @param Layout Target $value
     * @return PHPExcel_Chart_Layout
     */
    public function setLayoutTarget($value)
    {
    }
    /**
     * Get X-Mode
     *
     * @return string
     */
    public function getXMode()
    {
    }
    /**
     * Set X-Mode
     *
     * @param X-Mode $value
     * @return PHPExcel_Chart_Layout
     */
    public function setXMode($value)
    {
    }
    /**
     * Get Y-Mode
     *
     * @return string
     */
    public function getYMode()
    {
    }
    /**
     * Set Y-Mode
     *
     * @param Y-Mode $value
     * @return PHPExcel_Chart_Layout
     */
    public function setYMode($value)
    {
    }
    /**
     * Get X-Position
     *
     * @return number
     */
    public function getXPosition()
    {
    }
    /**
     * Set X-Position
     *
     * @param X-Position $value
     * @return PHPExcel_Chart_Layout
     */
    public function setXPosition($value)
    {
    }
    /**
     * Get Y-Position
     *
     * @return number
     */
    public function getYPosition()
    {
    }
    /**
     * Set Y-Position
     *
     * @param Y-Position $value
     * @return PHPExcel_Chart_Layout
     */
    public function setYPosition($value)
    {
    }
    /**
     * Get Width
     *
     * @return number
     */
    public function getWidth()
    {
    }
    /**
     * Set Width
     *
     * @param Width $value
     * @return PHPExcel_Chart_Layout
     */
    public function setWidth($value)
    {
    }
    /**
     * Get Height
     *
     * @return number
     */
    public function getHeight()
    {
    }
    /**
     * Set Height
     *
     * @param Height $value
     * @return PHPExcel_Chart_Layout
     */
    public function setHeight($value)
    {
    }
    /**
     * Get show legend key
     *
     * @return boolean
     */
    public function getShowLegendKey()
    {
    }
    /**
     * Set show legend key
     * Specifies that legend keys should be shown in data labels.
     *
     * @param boolean $value		Show legend key
     * @return PHPExcel_Chart_Layout
     */
    public function setShowLegendKey($value)
    {
    }
    /**
     * Get show value
     *
     * @return boolean
     */
    public function getShowVal()
    {
    }
    /**
     * Set show val
     * Specifies that the value should be shown in data labels.
     *
     * @param boolean $value		Show val
     * @return PHPExcel_Chart_Layout
     */
    public function setShowVal($value)
    {
    }
    /**
     * Get show category name
     *
     * @return boolean
     */
    public function getShowCatName()
    {
    }
    /**
     * Set show cat name
     * Specifies that the category name should be shown in data labels.
     *
     * @param boolean $value		Show cat name
     * @return PHPExcel_Chart_Layout
     */
    public function setShowCatName($value)
    {
    }
    /**
     * Get show data series name
     *
     * @return boolean
     */
    public function getShowSerName()
    {
    }
    /**
     * Set show ser name
     * Specifies that the series name should be shown in data labels.
     *
     * @param boolean $value		Show series name
     * @return PHPExcel_Chart_Layout
     */
    public function setShowSerName($value)
    {
    }
    /**
     * Get show percentage
     *
     * @return boolean
     */
    public function getShowPercent()
    {
    }
    /**
     * Set show percentage
     * Specifies that the percentage should be shown in data labels.
     *
     * @param boolean $value		Show percentage
     * @return PHPExcel_Chart_Layout
     */
    public function setShowPercent($value)
    {
    }
    /**
     * Get show bubble size
     *
     * @return boolean
     */
    public function getShowBubbleSize()
    {
    }
    /**
     * Set show bubble size
     * Specifies that the bubble size should be shown in data labels.
     *
     * @param boolean $value		Show bubble size
     * @return PHPExcel_Chart_Layout
     */
    public function setShowBubbleSize($value)
    {
    }
    /**
     * Get show leader lines
     *
     * @return boolean
     */
    public function getShowLeaderLines()
    {
    }
    /**
     * Set show leader lines
     * Specifies that leader lines should be shown in data labels.
     *
     * @param boolean $value		Show leader lines
     * @return PHPExcel_Chart_Layout
     */
    public function setShowLeaderLines($value)
    {
    }
}
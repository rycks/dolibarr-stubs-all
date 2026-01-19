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
 * PHPExcel_Worksheet_HeaderFooterDrawing
 *
 * @category   PHPExcel
 * @package    PHPExcel_Worksheet
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_Worksheet_HeaderFooterDrawing extends \PHPExcel_Worksheet_Drawing implements \PHPExcel_IComparable
{
    /**
     * Path
     *
     * @var string
     */
    private $_path;
    /**
     * Name
     *
     * @var string
     */
    protected $_name;
    /**
     * Offset X
     *
     * @var int
     */
    protected $_offsetX;
    /**
     * Offset Y
     *
     * @var int
     */
    protected $_offsetY;
    /**
     * Width
     *
     * @var int
     */
    protected $_width;
    /**
     * Height
     *
     * @var int
     */
    protected $_height;
    /**
     * Proportional resize
     *
     * @var boolean
     */
    protected $_resizeProportional;
    /**
     * Create a new PHPExcel_Worksheet_HeaderFooterDrawing
     */
    public function __construct()
    {
    }
    /**
     * Get Name
     *
     * @return string
     */
    public function getName()
    {
    }
    /**
     * Set Name
     *
     * @param string $pValue
     * @return PHPExcel_Worksheet_HeaderFooterDrawing
     */
    public function setName($pValue = '')
    {
    }
    /**
     * Get OffsetX
     *
     * @return int
     */
    public function getOffsetX()
    {
    }
    /**
     * Set OffsetX
     *
     * @param int $pValue
     * @return PHPExcel_Worksheet_HeaderFooterDrawing
     */
    public function setOffsetX($pValue = 0)
    {
    }
    /**
     * Get OffsetY
     *
     * @return int
     */
    public function getOffsetY()
    {
    }
    /**
     * Set OffsetY
     *
     * @param int $pValue
     * @return PHPExcel_Worksheet_HeaderFooterDrawing
     */
    public function setOffsetY($pValue = 0)
    {
    }
    /**
     * Get Width
     *
     * @return int
     */
    public function getWidth()
    {
    }
    /**
     * Set Width
     *
     * @param int $pValue
     * @return PHPExcel_Worksheet_HeaderFooterDrawing
     */
    public function setWidth($pValue = 0)
    {
    }
    /**
     * Get Height
     *
     * @return int
     */
    public function getHeight()
    {
    }
    /**
     * Set Height
     *
     * @param int $pValue
     * @return PHPExcel_Worksheet_HeaderFooterDrawing
     */
    public function setHeight($pValue = 0)
    {
    }
    /**
     * Set width and height with proportional resize
     * Example:
     * <code>
     * $objDrawing->setResizeProportional(true);
     * $objDrawing->setWidthAndHeight(160,120);
     * </code>
     *
     * @author Vincent@luo MSN:kele_100@hotmail.com
     * @param int $width
     * @param int $height
     * @return PHPExcel_Worksheet_HeaderFooterDrawing
     */
    public function setWidthAndHeight($width = 0, $height = 0)
    {
    }
    /**
     * Get ResizeProportional
     *
     * @return boolean
     */
    public function getResizeProportional()
    {
    }
    /**
     * Set ResizeProportional
     *
     * @param boolean $pValue
     * @return PHPExcel_Worksheet_HeaderFooterDrawing
     */
    public function setResizeProportional($pValue = \true)
    {
    }
    /**
     * Get Filename
     *
     * @return string
     */
    public function getFilename()
    {
    }
    /**
     * Get Extension
     *
     * @return string
     */
    public function getExtension()
    {
    }
    /**
     * Get Path
     *
     * @return string
     */
    public function getPath()
    {
    }
    /**
     * Set Path
     *
     * @param 	string 		$pValue			File path
     * @param 	boolean		$pVerifyFile	Verify file
     * @throws 	PHPExcel_Exception
     * @return PHPExcel_Worksheet_HeaderFooterDrawing
     */
    public function setPath($pValue = '', $pVerifyFile = \true)
    {
    }
    /**
     * Get hash code
     *
     * @return string	Hash code
     */
    public function getHashCode()
    {
    }
    /**
     * Implement PHP __clone to create a deep clone, not just a shallow copy.
     */
    public function __clone()
    {
    }
}
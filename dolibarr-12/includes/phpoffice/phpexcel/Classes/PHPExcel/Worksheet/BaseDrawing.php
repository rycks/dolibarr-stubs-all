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
 * PHPExcel_Worksheet_BaseDrawing
 *
 * @category   PHPExcel
 * @package    PHPExcel_Worksheet
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_Worksheet_BaseDrawing implements \PHPExcel_IComparable
{
    /**
     * Image counter
     *
     * @var int
     */
    private static $_imageCounter = 0;
    /**
     * Image index
     *
     * @var int
     */
    private $_imageIndex = 0;
    /**
     * Name
     *
     * @var string
     */
    protected $_name;
    /**
     * Description
     *
     * @var string
     */
    protected $_description;
    /**
     * Worksheet
     *
     * @var PHPExcel_Worksheet
     */
    protected $_worksheet;
    /**
     * Coordinates
     *
     * @var string
     */
    protected $_coordinates;
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
     * Rotation
     *
     * @var int
     */
    protected $_rotation;
    /**
     * Shadow
     *
     * @var PHPExcel_Worksheet_Drawing_Shadow
     */
    protected $_shadow;
    /**
     * Create a new PHPExcel_Worksheet_BaseDrawing
     */
    public function __construct()
    {
    }
    /**
     * Get image index
     *
     * @return int
     */
    public function getImageIndex()
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
     * @return PHPExcel_Worksheet_BaseDrawing
     */
    public function setName($pValue = '')
    {
    }
    /**
     * Get Description
     *
     * @return string
     */
    public function getDescription()
    {
    }
    /**
     * Set Description
     *
     * @param string $pValue
     * @return PHPExcel_Worksheet_BaseDrawing
     */
    public function setDescription($pValue = '')
    {
    }
    /**
     * Get Worksheet
     *
     * @return PHPExcel_Worksheet
     */
    public function getWorksheet()
    {
    }
    /**
     * Set Worksheet
     *
     * @param 	PHPExcel_Worksheet 	$pValue
     * @param 	bool				$pOverrideOld	If a Worksheet has already been assigned, overwrite it and remove image from old Worksheet?
     * @throws 	PHPExcel_Exception
     * @return PHPExcel_Worksheet_BaseDrawing
     */
    public function setWorksheet(\PHPExcel_Worksheet $pValue = \null, $pOverrideOld = \false)
    {
    }
    /**
     * Get Coordinates
     *
     * @return string
     */
    public function getCoordinates()
    {
    }
    /**
     * Set Coordinates
     *
     * @param string $pValue
     * @return PHPExcel_Worksheet_BaseDrawing
     */
    public function setCoordinates($pValue = 'A1')
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
     * @return PHPExcel_Worksheet_BaseDrawing
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
     * @return PHPExcel_Worksheet_BaseDrawing
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
     * @return PHPExcel_Worksheet_BaseDrawing
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
     * @return PHPExcel_Worksheet_BaseDrawing
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
     * @return PHPExcel_Worksheet_BaseDrawing
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
     * @return PHPExcel_Worksheet_BaseDrawing
     */
    public function setResizeProportional($pValue = \true)
    {
    }
    /**
     * Get Rotation
     *
     * @return int
     */
    public function getRotation()
    {
    }
    /**
     * Set Rotation
     *
     * @param int $pValue
     * @return PHPExcel_Worksheet_BaseDrawing
     */
    public function setRotation($pValue = 0)
    {
    }
    /**
     * Get Shadow
     *
     * @return PHPExcel_Worksheet_Drawing_Shadow
     */
    public function getShadow()
    {
    }
    /**
     * Set Shadow
     *
     * @param 	PHPExcel_Worksheet_Drawing_Shadow $pValue
     * @throws 	PHPExcel_Exception
     * @return PHPExcel_Worksheet_BaseDrawing
     */
    public function setShadow(\PHPExcel_Worksheet_Drawing_Shadow $pValue = \null)
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
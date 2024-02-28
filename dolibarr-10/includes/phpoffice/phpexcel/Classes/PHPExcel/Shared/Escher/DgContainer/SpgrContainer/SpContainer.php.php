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
 * @package    PHPExcel_Shared_Escher
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    ##VERSION##, ##DATE##
 */
/**
 * PHPExcel_Shared_Escher_DgContainer_SpgrContainer_SpContainer
 *
 * @category   PHPExcel
 * @package    PHPExcel_Shared_Escher
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_Shared_Escher_DgContainer_SpgrContainer_SpContainer
{
    /**
     * Parent Shape Group Container
     *
     * @var PHPExcel_Shared_Escher_DgContainer_SpgrContainer
     */
    private $_parent;
    /**
     * Is this a group shape?
     *
     * @var boolean
     */
    private $_spgr = \false;
    /**
     * Shape type
     *
     * @var int
     */
    private $_spType;
    /**
     * Shape flag
     *
     * @var int
     */
    private $_spFlag;
    /**
     * Shape index (usually group shape has index 0, and the rest: 1,2,3...)
     *
     * @var boolean
     */
    private $_spId;
    /**
     * Array of options
     *
     * @var array
     */
    private $_OPT;
    /**
     * Cell coordinates of upper-left corner of shape, e.g. 'A1'
     *
     * @var string
     */
    private $_startCoordinates;
    /**
     * Horizontal offset of upper-left corner of shape measured in 1/1024 of column width
     *
     * @var int
     */
    private $_startOffsetX;
    /**
     * Vertical offset of upper-left corner of shape measured in 1/256 of row height
     *
     * @var int
     */
    private $_startOffsetY;
    /**
     * Cell coordinates of bottom-right corner of shape, e.g. 'B2'
     *
     * @var string
     */
    private $_endCoordinates;
    /**
     * Horizontal offset of bottom-right corner of shape measured in 1/1024 of column width
     *
     * @var int
     */
    private $_endOffsetX;
    /**
     * Vertical offset of bottom-right corner of shape measured in 1/256 of row height
     *
     * @var int
     */
    private $_endOffsetY;
    /**
     * Set parent Shape Group Container
     *
     * @param PHPExcel_Shared_Escher_DgContainer_SpgrContainer $parent
     */
    public function setParent($parent)
    {
    }
    /**
     * Get the parent Shape Group Container
     *
     * @return PHPExcel_Shared_Escher_DgContainer_SpgrContainer
     */
    public function getParent()
    {
    }
    /**
     * Set whether this is a group shape
     *
     * @param boolean $value
     */
    public function setSpgr($value = \false)
    {
    }
    /**
     * Get whether this is a group shape
     *
     * @return boolean
     */
    public function getSpgr()
    {
    }
    /**
     * Set the shape type
     *
     * @param int $value
     */
    public function setSpType($value)
    {
    }
    /**
     * Get the shape type
     *
     * @return int
     */
    public function getSpType()
    {
    }
    /**
     * Set the shape flag
     *
     * @param int $value
     */
    public function setSpFlag($value)
    {
    }
    /**
     * Get the shape flag
     *
     * @return int
     */
    public function getSpFlag()
    {
    }
    /**
     * Set the shape index
     *
     * @param int $value
     */
    public function setSpId($value)
    {
    }
    /**
     * Get the shape index
     *
     * @return int
     */
    public function getSpId()
    {
    }
    /**
     * Set an option for the Shape Group Container
     *
     * @param int $property The number specifies the option
     * @param mixed $value
     */
    public function setOPT($property, $value)
    {
    }
    /**
     * Get an option for the Shape Group Container
     *
     * @param int $property The number specifies the option
     * @return mixed
     */
    public function getOPT($property)
    {
    }
    /**
     * Get the collection of options
     *
     * @return array
     */
    public function getOPTCollection()
    {
    }
    /**
     * Set cell coordinates of upper-left corner of shape
     *
     * @param string $value
     */
    public function setStartCoordinates($value = 'A1')
    {
    }
    /**
     * Get cell coordinates of upper-left corner of shape
     *
     * @return string
     */
    public function getStartCoordinates()
    {
    }
    /**
     * Set offset in x-direction of upper-left corner of shape measured in 1/1024 of column width
     *
     * @param int $startOffsetX
     */
    public function setStartOffsetX($startOffsetX = 0)
    {
    }
    /**
     * Get offset in x-direction of upper-left corner of shape measured in 1/1024 of column width
     *
     * @return int
     */
    public function getStartOffsetX()
    {
    }
    /**
     * Set offset in y-direction of upper-left corner of shape measured in 1/256 of row height
     *
     * @param int $startOffsetY
     */
    public function setStartOffsetY($startOffsetY = 0)
    {
    }
    /**
     * Get offset in y-direction of upper-left corner of shape measured in 1/256 of row height
     *
     * @return int
     */
    public function getStartOffsetY()
    {
    }
    /**
     * Set cell coordinates of bottom-right corner of shape
     *
     * @param string $value
     */
    public function setEndCoordinates($value = 'A1')
    {
    }
    /**
     * Get cell coordinates of bottom-right corner of shape
     *
     * @return string
     */
    public function getEndCoordinates()
    {
    }
    /**
     * Set offset in x-direction of bottom-right corner of shape measured in 1/1024 of column width
     *
     * @param int $startOffsetX
     */
    public function setEndOffsetX($endOffsetX = 0)
    {
    }
    /**
     * Get offset in x-direction of bottom-right corner of shape measured in 1/1024 of column width
     *
     * @return int
     */
    public function getEndOffsetX()
    {
    }
    /**
     * Set offset in y-direction of bottom-right corner of shape measured in 1/256 of row height
     *
     * @param int $endOffsetY
     */
    public function setEndOffsetY($endOffsetY = 0)
    {
    }
    /**
     * Get offset in y-direction of bottom-right corner of shape measured in 1/256 of row height
     *
     * @return int
     */
    public function getEndOffsetY()
    {
    }
    /**
     * Get the nesting level of this spContainer. This is the number of spgrContainers between this spContainer and
     * the dgContainer. A value of 1 = immediately within first spgrContainer
     * Higher nesting level occurs if and only if spContainer is part of a shape group
     *
     * @return int Nesting level
     */
    public function getNestingLevel()
    {
    }
}
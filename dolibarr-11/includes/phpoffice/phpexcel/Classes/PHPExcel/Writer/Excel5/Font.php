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
 * @package    PHPExcel_Writer_Excel5
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    ##VERSION##, ##DATE##
 */
/**
 * PHPExcel_Writer_Excel5_Font
 *
 * @category   PHPExcel
 * @package    PHPExcel_Writer_Excel5
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_Writer_Excel5_Font
{
    /**
     * Color index
     *
     * @var int
     */
    private $_colorIndex;
    /**
     * Font
     *
     * @var PHPExcel_Style_Font
     */
    private $_font;
    /**
     * Constructor
     *
     * @param PHPExcel_Style_Font $font
     */
    public function __construct(\PHPExcel_Style_Font $font = \null)
    {
    }
    /**
     * Set the color index
     *
     * @param int $colorIndex
     */
    public function setColorIndex($colorIndex)
    {
    }
    /**
     * Get font record data
     *
     * @return string
     */
    public function writeFont()
    {
    }
    /**
     * Map to BIFF5-BIFF8 codes for bold
     *
     * @param boolean $bold
     * @return int
     */
    private static function _mapBold($bold)
    {
    }
    /**
     * Map of BIFF2-BIFF8 codes for underline styles
     * @static	array of int
     *
     */
    private static $_mapUnderline = array(\PHPExcel_Style_Font::UNDERLINE_NONE => 0x0, \PHPExcel_Style_Font::UNDERLINE_SINGLE => 0x1, \PHPExcel_Style_Font::UNDERLINE_DOUBLE => 0x2, \PHPExcel_Style_Font::UNDERLINE_SINGLEACCOUNTING => 0x21, \PHPExcel_Style_Font::UNDERLINE_DOUBLEACCOUNTING => 0x22);
    /**
     * Map underline
     *
     * @param string
     * @return int
     */
    private static function _mapUnderline($underline)
    {
    }
}
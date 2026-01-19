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
// Original file header of PEAR::Spreadsheet_Excel_Writer_Format (used as the base for this class):
// -----------------------------------------------------------------------------------------
// /*
// *  Module written/ported by Xavier Noguer <xnoguer@rezebra.com>
// *
// *  The majority of this is _NOT_ my code.  I simply ported it from the
// *  PERL Spreadsheet::WriteExcel module.
// *
// *  The author of the Spreadsheet::WriteExcel module is John McNamara
// *  <jmcnamara@cpan.org>
// *
// *  I _DO_ maintain this code, and John McNamara has nothing to do with the
// *  porting of this code to PHP.  Any questions directly related to this
// *  class library should be directed to me.
// *
// *  License Information:
// *
// *    Spreadsheet_Excel_Writer:  A library for generating Excel Spreadsheets
// *    Copyright (c) 2002-2003 Xavier Noguer xnoguer@rezebra.com
// *
// *    This library is free software; you can redistribute it and/or
// *    modify it under the terms of the GNU Lesser General Public
// *    License as published by the Free Software Foundation; either
// *    version 2.1 of the License, or (at your option) any later version.
// *
// *    This library is distributed in the hope that it will be useful,
// *    but WITHOUT ANY WARRANTY; without even the implied warranty of
// *    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
// *    Lesser General Public License for more details.
// *
// *    You should have received a copy of the GNU Lesser General Public
// *    License along with this library; if not, write to the Free Software
// *    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
// */
/**
 * PHPExcel_Writer_Excel5_Xf
 *
 * @category   PHPExcel
 * @package    PHPExcel_Writer_Excel5
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_Writer_Excel5_Xf
{
    /**
     * Style XF or a cell XF ?
     *
     * @var boolean
     */
    private $_isStyleXf;
    /**
     * Index to the FONT record. Index 4 does not exist
     * @var integer
     */
    private $_fontIndex;
    /**
     * An index (2 bytes) to a FORMAT record (number format).
     * @var integer
     */
    public $_numberFormatIndex;
    /**
     * 1 bit, apparently not used.
     * @var integer
     */
    public $_text_justlast;
    /**
     * The cell's foreground color.
     * @var integer
     */
    public $_fg_color;
    /**
     * The cell's background color.
     * @var integer
     */
    public $_bg_color;
    /**
     * Color of the bottom border of the cell.
     * @var integer
     */
    public $_bottom_color;
    /**
     * Color of the top border of the cell.
     * @var integer
     */
    public $_top_color;
    /**
     * Color of the left border of the cell.
     * @var integer
     */
    public $_left_color;
    /**
     * Color of the right border of the cell.
     * @var integer
     */
    public $_right_color;
    /**
     * Constructor
     *
     * @access public
     * @param PHPExcel_Style	The XF format
     */
    public function __construct(\PHPExcel_Style $style = \null)
    {
    }
    /**
     * Generate an Excel BIFF XF record (style or cell).
     *
     * @return string The XF record
     */
    function writeXf()
    {
    }
    /**
     * Is this a style XF ?
     *
     * @param boolean $value
     */
    public function setIsStyleXf($value)
    {
    }
    /**
     * Sets the cell's bottom border color
     *
     * @access public
     * @param int $colorIndex Color index
     */
    function setBottomColor($colorIndex)
    {
    }
    /**
     * Sets the cell's top border color
     *
     * @access public
     * @param int $colorIndex Color index
     */
    function setTopColor($colorIndex)
    {
    }
    /**
     * Sets the cell's left border color
     *
     * @access public
     * @param int $colorIndex Color index
     */
    function setLeftColor($colorIndex)
    {
    }
    /**
     * Sets the cell's right border color
     *
     * @access public
     * @param int $colorIndex Color index
     */
    function setRightColor($colorIndex)
    {
    }
    /**
     * Sets the cell's diagonal border color
     *
     * @access public
     * @param int $colorIndex Color index
     */
    function setDiagColor($colorIndex)
    {
    }
    /**
     * Sets the cell's foreground color
     *
     * @access public
     * @param int $colorIndex Color index
     */
    function setFgColor($colorIndex)
    {
    }
    /**
     * Sets the cell's background color
     *
     * @access public
     * @param int $colorIndex Color index
     */
    function setBgColor($colorIndex)
    {
    }
    /**
     * Sets the index to the number format record
     * It can be date, time, currency, etc...
     *
     * @access public
     * @param integer $numberFormatIndex Index to format record
     */
    function setNumberFormatIndex($numberFormatIndex)
    {
    }
    /**
     * Set the font index.
     *
     * @param int $value Font index, note that value 4 does not exist
     */
    public function setFontIndex($value)
    {
    }
    /**
     * Map of BIFF2-BIFF8 codes for border styles
     * @static	array of int
     *
     */
    private static $_mapBorderStyle = array(\PHPExcel_Style_Border::BORDER_NONE => 0x0, \PHPExcel_Style_Border::BORDER_THIN => 0x1, \PHPExcel_Style_Border::BORDER_MEDIUM => 0x2, \PHPExcel_Style_Border::BORDER_DASHED => 0x3, \PHPExcel_Style_Border::BORDER_DOTTED => 0x4, \PHPExcel_Style_Border::BORDER_THICK => 0x5, \PHPExcel_Style_Border::BORDER_DOUBLE => 0x6, \PHPExcel_Style_Border::BORDER_HAIR => 0x7, \PHPExcel_Style_Border::BORDER_MEDIUMDASHED => 0x8, \PHPExcel_Style_Border::BORDER_DASHDOT => 0x9, \PHPExcel_Style_Border::BORDER_MEDIUMDASHDOT => 0xa, \PHPExcel_Style_Border::BORDER_DASHDOTDOT => 0xb, \PHPExcel_Style_Border::BORDER_MEDIUMDASHDOTDOT => 0xc, \PHPExcel_Style_Border::BORDER_SLANTDASHDOT => 0xd);
    /**
     * Map border style
     *
     * @param string $borderStyle
     * @return int
     */
    private static function _mapBorderStyle($borderStyle)
    {
    }
    /**
     * Map of BIFF2-BIFF8 codes for fill types
     * @static	array of int
     *
     */
    private static $_mapFillType = array(
        \PHPExcel_Style_Fill::FILL_NONE => 0x0,
        \PHPExcel_Style_Fill::FILL_SOLID => 0x1,
        \PHPExcel_Style_Fill::FILL_PATTERN_MEDIUMGRAY => 0x2,
        \PHPExcel_Style_Fill::FILL_PATTERN_DARKGRAY => 0x3,
        \PHPExcel_Style_Fill::FILL_PATTERN_LIGHTGRAY => 0x4,
        \PHPExcel_Style_Fill::FILL_PATTERN_DARKHORIZONTAL => 0x5,
        \PHPExcel_Style_Fill::FILL_PATTERN_DARKVERTICAL => 0x6,
        \PHPExcel_Style_Fill::FILL_PATTERN_DARKDOWN => 0x7,
        \PHPExcel_Style_Fill::FILL_PATTERN_DARKUP => 0x8,
        \PHPExcel_Style_Fill::FILL_PATTERN_DARKGRID => 0x9,
        \PHPExcel_Style_Fill::FILL_PATTERN_DARKTRELLIS => 0xa,
        \PHPExcel_Style_Fill::FILL_PATTERN_LIGHTHORIZONTAL => 0xb,
        \PHPExcel_Style_Fill::FILL_PATTERN_LIGHTVERTICAL => 0xc,
        \PHPExcel_Style_Fill::FILL_PATTERN_LIGHTDOWN => 0xd,
        \PHPExcel_Style_Fill::FILL_PATTERN_LIGHTUP => 0xe,
        \PHPExcel_Style_Fill::FILL_PATTERN_LIGHTGRID => 0xf,
        \PHPExcel_Style_Fill::FILL_PATTERN_LIGHTTRELLIS => 0x10,
        \PHPExcel_Style_Fill::FILL_PATTERN_GRAY125 => 0x11,
        \PHPExcel_Style_Fill::FILL_PATTERN_GRAY0625 => 0x12,
        \PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR => 0x0,
        // does not exist in BIFF8
        \PHPExcel_Style_Fill::FILL_GRADIENT_PATH => 0x0,
    );
    /**
     * Map fill type
     *
     * @param string $fillType
     * @return int
     */
    private static function _mapFillType($fillType)
    {
    }
    /**
     * Map of BIFF2-BIFF8 codes for horizontal alignment
     * @static	array of int
     *
     */
    private static $_mapHAlign = array(\PHPExcel_Style_Alignment::HORIZONTAL_GENERAL => 0, \PHPExcel_Style_Alignment::HORIZONTAL_LEFT => 1, \PHPExcel_Style_Alignment::HORIZONTAL_CENTER => 2, \PHPExcel_Style_Alignment::HORIZONTAL_RIGHT => 3, \PHPExcel_Style_Alignment::HORIZONTAL_FILL => 4, \PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY => 5, \PHPExcel_Style_Alignment::HORIZONTAL_CENTER_CONTINUOUS => 6);
    /**
     * Map to BIFF2-BIFF8 codes for horizontal alignment
     *
     * @param string $hAlign
     * @return int
     */
    private function _mapHAlign($hAlign)
    {
    }
    /**
     * Map of BIFF2-BIFF8 codes for vertical alignment
     * @static	array of int
     *
     */
    private static $_mapVAlign = array(\PHPExcel_Style_Alignment::VERTICAL_TOP => 0, \PHPExcel_Style_Alignment::VERTICAL_CENTER => 1, \PHPExcel_Style_Alignment::VERTICAL_BOTTOM => 2, \PHPExcel_Style_Alignment::VERTICAL_JUSTIFY => 3);
    /**
     * Map to BIFF2-BIFF8 codes for vertical alignment
     *
     * @param string $vAlign
     * @return int
     */
    private static function _mapVAlign($vAlign)
    {
    }
    /**
     * Map to BIFF8 codes for text rotation angle
     *
     * @param int $textRotation
     * @return int
     */
    private static function _mapTextRotation($textRotation)
    {
    }
    /**
     * Map locked
     *
     * @param string
     * @return int
     */
    private static function _mapLocked($locked)
    {
    }
    /**
     * Map hidden
     *
     * @param string
     * @return int
     */
    private static function _mapHidden($hidden)
    {
    }
}
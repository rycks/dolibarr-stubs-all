<?php

namespace PhpOffice\PhpSpreadsheet\Writer\Xls;

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
// *    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
// *    Lesser General Public License for more details.
// *
// *    You should have received a copy of the GNU Lesser General Public
// *    License along with this library; if not, write to the Free Software
// *    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
// */
class Xf
{
    /**
     * Style XF or a cell XF ?
     *
     * @var bool
     */
    private $isStyleXf;
    /**
     * Index to the FONT record. Index 4 does not exist.
     *
     * @var int
     */
    private $fontIndex;
    /**
     * An index (2 bytes) to a FORMAT record (number format).
     *
     * @var int
     */
    private $numberFormatIndex;
    /**
     * 1 bit, apparently not used.
     *
     * @var int
     */
    private $textJustLast;
    /**
     * The cell's foreground color.
     *
     * @var int
     */
    private $foregroundColor;
    /**
     * The cell's background color.
     *
     * @var int
     */
    private $backgroundColor;
    /**
     * Color of the bottom border of the cell.
     *
     * @var int
     */
    private $bottomBorderColor;
    /**
     * Color of the top border of the cell.
     *
     * @var int
     */
    private $topBorderColor;
    /**
     * Color of the left border of the cell.
     *
     * @var int
     */
    private $leftBorderColor;
    /**
     * Color of the right border of the cell.
     *
     * @var int
     */
    private $rightBorderColor;
    /**
     * Constructor.
     *
     * @param Style $style The XF format
     */
    public function __construct(\PhpOffice\PhpSpreadsheet\Style\Style $style)
    {
    }
    /**
     * Generate an Excel BIFF XF record (style or cell).
     *
     * @return string The XF record
     */
    public function writeXf()
    {
    }
    /**
     * Is this a style XF ?
     *
     * @param bool $value
     */
    public function setIsStyleXf($value)
    {
    }
    /**
     * Sets the cell's bottom border color.
     *
     * @param int $colorIndex Color index
     */
    public function setBottomColor($colorIndex)
    {
    }
    /**
     * Sets the cell's top border color.
     *
     * @param int $colorIndex Color index
     */
    public function setTopColor($colorIndex)
    {
    }
    /**
     * Sets the cell's left border color.
     *
     * @param int $colorIndex Color index
     */
    public function setLeftColor($colorIndex)
    {
    }
    /**
     * Sets the cell's right border color.
     *
     * @param int $colorIndex Color index
     */
    public function setRightColor($colorIndex)
    {
    }
    /**
     * Sets the cell's diagonal border color.
     *
     * @param int $colorIndex Color index
     */
    public function setDiagColor($colorIndex)
    {
    }
    /**
     * Sets the cell's foreground color.
     *
     * @param int $colorIndex Color index
     */
    public function setFgColor($colorIndex)
    {
    }
    /**
     * Sets the cell's background color.
     *
     * @param int $colorIndex Color index
     */
    public function setBgColor($colorIndex)
    {
    }
    /**
     * Sets the index to the number format record
     * It can be date, time, currency, etc...
     *
     * @param int $numberFormatIndex Index to format record
     */
    public function setNumberFormatIndex($numberFormatIndex)
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
     * Map of BIFF2-BIFF8 codes for border styles.
     *
     * @var array of int
     */
    private static $mapBorderStyles = [\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_NONE => 0x0, \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN => 0x1, \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM => 0x2, \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_DASHED => 0x3, \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_DOTTED => 0x4, \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK => 0x5, \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_DOUBLE => 0x6, \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_HAIR => 0x7, \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUMDASHED => 0x8, \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_DASHDOT => 0x9, \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUMDASHDOT => 0xa, \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_DASHDOTDOT => 0xb, \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUMDASHDOTDOT => 0xc, \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_SLANTDASHDOT => 0xd];
    /**
     * Map border style.
     *
     * @param string $borderStyle
     *
     * @return int
     */
    private static function mapBorderStyle($borderStyle)
    {
    }
    /**
     * Map of BIFF2-BIFF8 codes for fill types.
     *
     * @var array of int
     */
    private static $mapFillTypes = [
        \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_NONE => 0x0,
        \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID => 0x1,
        \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_PATTERN_MEDIUMGRAY => 0x2,
        \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_PATTERN_DARKGRAY => 0x3,
        \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_PATTERN_LIGHTGRAY => 0x4,
        \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_PATTERN_DARKHORIZONTAL => 0x5,
        \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_PATTERN_DARKVERTICAL => 0x6,
        \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_PATTERN_DARKDOWN => 0x7,
        \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_PATTERN_DARKUP => 0x8,
        \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_PATTERN_DARKGRID => 0x9,
        \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_PATTERN_DARKTRELLIS => 0xa,
        \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_PATTERN_LIGHTHORIZONTAL => 0xb,
        \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_PATTERN_LIGHTVERTICAL => 0xc,
        \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_PATTERN_LIGHTDOWN => 0xd,
        \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_PATTERN_LIGHTUP => 0xe,
        \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_PATTERN_LIGHTGRID => 0xf,
        \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_PATTERN_LIGHTTRELLIS => 0x10,
        \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_PATTERN_GRAY125 => 0x11,
        \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_PATTERN_GRAY0625 => 0x12,
        \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR => 0x0,
        // does not exist in BIFF8
        \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_PATH => 0x0,
    ];
    /**
     * Map fill type.
     *
     * @param string $fillType
     *
     * @return int
     */
    private static function mapFillType($fillType)
    {
    }
    /**
     * Map of BIFF2-BIFF8 codes for horizontal alignment.
     *
     * @var array of int
     */
    private static $mapHAlignments = [\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_GENERAL => 0, \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT => 1, \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER => 2, \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT => 3, \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_FILL => 4, \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_JUSTIFY => 5, \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER_CONTINUOUS => 6];
    /**
     * Map to BIFF2-BIFF8 codes for horizontal alignment.
     *
     * @param string $hAlign
     *
     * @return int
     */
    private function mapHAlign($hAlign)
    {
    }
    /**
     * Map of BIFF2-BIFF8 codes for vertical alignment.
     *
     * @var array of int
     */
    private static $mapVAlignments = [\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP => 0, \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER => 1, \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_BOTTOM => 2, \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_JUSTIFY => 3];
    /**
     * Map to BIFF2-BIFF8 codes for vertical alignment.
     *
     * @param string $vAlign
     *
     * @return int
     */
    private static function mapVAlign($vAlign)
    {
    }
    /**
     * Map to BIFF8 codes for text rotation angle.
     *
     * @param int $textRotation
     *
     * @return int
     */
    private static function mapTextRotation($textRotation)
    {
    }
    /**
     * Map locked.
     *
     * @param string $locked
     *
     * @return int
     */
    private static function mapLocked($locked)
    {
    }
    /**
     * Map hidden.
     *
     * @param string $hidden
     *
     * @return int
     */
    private static function mapHidden($hidden)
    {
    }
}
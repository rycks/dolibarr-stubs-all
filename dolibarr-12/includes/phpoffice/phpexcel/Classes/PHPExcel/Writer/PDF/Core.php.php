<?php

/**
 *  PHPExcel
 *
 *  Copyright (c) 2006 - 2014 PHPExcel
 *
 *  This library is free software; you can redistribute it and/or
 *  modify it under the terms of the GNU Lesser General Public
 *  License as published by the Free Software Foundation; either
 *  version 2.1 of the License, or (at your option) any later version.
 *
 *  This library is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 *  Lesser General Public License for more details.
 *
 *  You should have received a copy of the GNU Lesser General Public
 *  License along with this library; if not, write to the Free Software
 *  Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 *  @category    PHPExcel
 *  @package     PHPExcel_Writer_PDF
 *  @copyright   Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 *  @license     http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt    LGPL
 *  @version     ##VERSION##, ##DATE##
 */
/**
 *  PHPExcel_Writer_PDF_Core
 *
 *  @category    PHPExcel
 *  @package     PHPExcel_Writer_PDF
 *  @copyright   Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
abstract class PHPExcel_Writer_PDF_Core extends \PHPExcel_Writer_HTML
{
    /**
     * Temporary storage directory
     *
     * @var string
     */
    protected $_tempDir = '';
    /**
     * Font
     *
     * @var string
     */
    protected $_font = 'freesans';
    /**
     * Orientation (Over-ride)
     *
     * @var string
     */
    protected $_orientation = \NULL;
    /**
     * Paper size (Over-ride)
     *
     * @var int
     */
    protected $_paperSize = \NULL;
    /**
     * Temporary storage for Save Array Return type
     *
     * @var string
     */
    private $_saveArrayReturnType;
    /**
     * Paper Sizes xRef List
     *
     * @var array
     */
    protected static $_paperSizes = array(
        \PHPExcel_Worksheet_PageSetup::PAPERSIZE_LETTER => 'LETTER',
        //    (8.5 in. by 11 in.)
        \PHPExcel_Worksheet_PageSetup::PAPERSIZE_LETTER_SMALL => 'LETTER',
        //    (8.5 in. by 11 in.)
        \PHPExcel_Worksheet_PageSetup::PAPERSIZE_TABLOID => array(792.0, 1224.0),
        //    (11 in. by 17 in.)
        \PHPExcel_Worksheet_PageSetup::PAPERSIZE_LEDGER => array(1224.0, 792.0),
        //    (17 in. by 11 in.)
        \PHPExcel_Worksheet_PageSetup::PAPERSIZE_LEGAL => 'LEGAL',
        //    (8.5 in. by 14 in.)
        \PHPExcel_Worksheet_PageSetup::PAPERSIZE_STATEMENT => array(396.0, 612.0),
        //    (5.5 in. by 8.5 in.)
        \PHPExcel_Worksheet_PageSetup::PAPERSIZE_EXECUTIVE => 'EXECUTIVE',
        //    (7.25 in. by 10.5 in.)
        \PHPExcel_Worksheet_PageSetup::PAPERSIZE_A3 => 'A3',
        //    (297 mm by 420 mm)
        \PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4 => 'A4',
        //    (210 mm by 297 mm)
        \PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4_SMALL => 'A4',
        //    (210 mm by 297 mm)
        \PHPExcel_Worksheet_PageSetup::PAPERSIZE_A5 => 'A5',
        //    (148 mm by 210 mm)
        \PHPExcel_Worksheet_PageSetup::PAPERSIZE_B4 => 'B4',
        //    (250 mm by 353 mm)
        \PHPExcel_Worksheet_PageSetup::PAPERSIZE_B5 => 'B5',
        //    (176 mm by 250 mm)
        \PHPExcel_Worksheet_PageSetup::PAPERSIZE_FOLIO => 'FOLIO',
        //    (8.5 in. by 13 in.)
        \PHPExcel_Worksheet_PageSetup::PAPERSIZE_QUARTO => array(609.45, 779.53),
        //    (215 mm by 275 mm)
        \PHPExcel_Worksheet_PageSetup::PAPERSIZE_STANDARD_1 => array(720.0, 1008.0),
        //    (10 in. by 14 in.)
        \PHPExcel_Worksheet_PageSetup::PAPERSIZE_STANDARD_2 => array(792.0, 1224.0),
        //    (11 in. by 17 in.)
        \PHPExcel_Worksheet_PageSetup::PAPERSIZE_NOTE => 'LETTER',
        //    (8.5 in. by 11 in.)
        \PHPExcel_Worksheet_PageSetup::PAPERSIZE_NO9_ENVELOPE => array(279.0, 639.0),
        //    (3.875 in. by 8.875 in.)
        \PHPExcel_Worksheet_PageSetup::PAPERSIZE_NO10_ENVELOPE => array(297.0, 684.0),
        //    (4.125 in. by 9.5 in.)
        \PHPExcel_Worksheet_PageSetup::PAPERSIZE_NO11_ENVELOPE => array(324.0, 747.0),
        //    (4.5 in. by 10.375 in.)
        \PHPExcel_Worksheet_PageSetup::PAPERSIZE_NO12_ENVELOPE => array(342.0, 792.0),
        //    (4.75 in. by 11 in.)
        \PHPExcel_Worksheet_PageSetup::PAPERSIZE_NO14_ENVELOPE => array(360.0, 828.0),
        //    (5 in. by 11.5 in.)
        \PHPExcel_Worksheet_PageSetup::PAPERSIZE_C => array(1224.0, 1584.0),
        //    (17 in. by 22 in.)
        \PHPExcel_Worksheet_PageSetup::PAPERSIZE_D => array(1584.0, 2448.0),
        //    (22 in. by 34 in.)
        \PHPExcel_Worksheet_PageSetup::PAPERSIZE_E => array(2448.0, 3168.0),
        //    (34 in. by 44 in.)
        \PHPExcel_Worksheet_PageSetup::PAPERSIZE_DL_ENVELOPE => array(311.81, 623.62),
        //    (110 mm by 220 mm)
        \PHPExcel_Worksheet_PageSetup::PAPERSIZE_C5_ENVELOPE => 'C5',
        //    (162 mm by 229 mm)
        \PHPExcel_Worksheet_PageSetup::PAPERSIZE_C3_ENVELOPE => 'C3',
        //    (324 mm by 458 mm)
        \PHPExcel_Worksheet_PageSetup::PAPERSIZE_C4_ENVELOPE => 'C4',
        //    (229 mm by 324 mm)
        \PHPExcel_Worksheet_PageSetup::PAPERSIZE_C6_ENVELOPE => 'C6',
        //    (114 mm by 162 mm)
        \PHPExcel_Worksheet_PageSetup::PAPERSIZE_C65_ENVELOPE => array(323.15, 649.13),
        //    (114 mm by 229 mm)
        \PHPExcel_Worksheet_PageSetup::PAPERSIZE_B4_ENVELOPE => 'B4',
        //    (250 mm by 353 mm)
        \PHPExcel_Worksheet_PageSetup::PAPERSIZE_B5_ENVELOPE => 'B5',
        //    (176 mm by 250 mm)
        \PHPExcel_Worksheet_PageSetup::PAPERSIZE_B6_ENVELOPE => array(498.9, 354.33),
        //    (176 mm by 125 mm)
        \PHPExcel_Worksheet_PageSetup::PAPERSIZE_ITALY_ENVELOPE => array(311.81, 651.97),
        //    (110 mm by 230 mm)
        \PHPExcel_Worksheet_PageSetup::PAPERSIZE_MONARCH_ENVELOPE => array(279.0, 540.0),
        //    (3.875 in. by 7.5 in.)
        \PHPExcel_Worksheet_PageSetup::PAPERSIZE_6_3_4_ENVELOPE => array(261.0, 468.0),
        //    (3.625 in. by 6.5 in.)
        \PHPExcel_Worksheet_PageSetup::PAPERSIZE_US_STANDARD_FANFOLD => array(1071.0, 792.0),
        //    (14.875 in. by 11 in.)
        \PHPExcel_Worksheet_PageSetup::PAPERSIZE_GERMAN_STANDARD_FANFOLD => array(612.0, 864.0),
        //    (8.5 in. by 12 in.)
        \PHPExcel_Worksheet_PageSetup::PAPERSIZE_GERMAN_LEGAL_FANFOLD => 'FOLIO',
        //    (8.5 in. by 13 in.)
        \PHPExcel_Worksheet_PageSetup::PAPERSIZE_ISO_B4 => 'B4',
        //    (250 mm by 353 mm)
        \PHPExcel_Worksheet_PageSetup::PAPERSIZE_JAPANESE_DOUBLE_POSTCARD => array(566.9299999999999, 419.53),
        //    (200 mm by 148 mm)
        \PHPExcel_Worksheet_PageSetup::PAPERSIZE_STANDARD_PAPER_1 => array(648.0, 792.0),
        //    (9 in. by 11 in.)
        \PHPExcel_Worksheet_PageSetup::PAPERSIZE_STANDARD_PAPER_2 => array(720.0, 792.0),
        //    (10 in. by 11 in.)
        \PHPExcel_Worksheet_PageSetup::PAPERSIZE_STANDARD_PAPER_3 => array(1080.0, 792.0),
        //    (15 in. by 11 in.)
        \PHPExcel_Worksheet_PageSetup::PAPERSIZE_INVITE_ENVELOPE => array(623.62, 623.62),
        //    (220 mm by 220 mm)
        \PHPExcel_Worksheet_PageSetup::PAPERSIZE_LETTER_EXTRA_PAPER => array(667.8, 864.0),
        //    (9.275 in. by 12 in.)
        \PHPExcel_Worksheet_PageSetup::PAPERSIZE_LEGAL_EXTRA_PAPER => array(667.8, 1080.0),
        //    (9.275 in. by 15 in.)
        \PHPExcel_Worksheet_PageSetup::PAPERSIZE_TABLOID_EXTRA_PAPER => array(841.6799999999999, 1296.0),
        //    (11.69 in. by 18 in.)
        \PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4_EXTRA_PAPER => array(668.98, 912.76),
        //    (236 mm by 322 mm)
        \PHPExcel_Worksheet_PageSetup::PAPERSIZE_LETTER_TRANSVERSE_PAPER => array(595.8, 792.0),
        //    (8.275 in. by 11 in.)
        \PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4_TRANSVERSE_PAPER => 'A4',
        //    (210 mm by 297 mm)
        \PHPExcel_Worksheet_PageSetup::PAPERSIZE_LETTER_EXTRA_TRANSVERSE_PAPER => array(667.8, 864.0),
        //    (9.275 in. by 12 in.)
        \PHPExcel_Worksheet_PageSetup::PAPERSIZE_SUPERA_SUPERA_A4_PAPER => array(643.46, 1009.13),
        //    (227 mm by 356 mm)
        \PHPExcel_Worksheet_PageSetup::PAPERSIZE_SUPERB_SUPERB_A3_PAPER => array(864.5700000000001, 1380.47),
        //    (305 mm by 487 mm)
        \PHPExcel_Worksheet_PageSetup::PAPERSIZE_LETTER_PLUS_PAPER => array(612.0, 913.6799999999999),
        //    (8.5 in. by 12.69 in.)
        \PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4_PLUS_PAPER => array(595.28, 935.4299999999999),
        //    (210 mm by 330 mm)
        \PHPExcel_Worksheet_PageSetup::PAPERSIZE_A5_TRANSVERSE_PAPER => 'A5',
        //    (148 mm by 210 mm)
        \PHPExcel_Worksheet_PageSetup::PAPERSIZE_JIS_B5_TRANSVERSE_PAPER => array(515.91, 728.5),
        //    (182 mm by 257 mm)
        \PHPExcel_Worksheet_PageSetup::PAPERSIZE_A3_EXTRA_PAPER => array(912.76, 1261.42),
        //    (322 mm by 445 mm)
        \PHPExcel_Worksheet_PageSetup::PAPERSIZE_A5_EXTRA_PAPER => array(493.23, 666.14),
        //    (174 mm by 235 mm)
        \PHPExcel_Worksheet_PageSetup::PAPERSIZE_ISO_B5_EXTRA_PAPER => array(569.76, 782.36),
        //    (201 mm by 276 mm)
        \PHPExcel_Worksheet_PageSetup::PAPERSIZE_A2_PAPER => 'A2',
        //    (420 mm by 594 mm)
        \PHPExcel_Worksheet_PageSetup::PAPERSIZE_A3_TRANSVERSE_PAPER => 'A3',
        //    (297 mm by 420 mm)
        \PHPExcel_Worksheet_PageSetup::PAPERSIZE_A3_EXTRA_TRANSVERSE_PAPER => array(912.76, 1261.42),
    );
    /**
     *  Create a new PHPExcel_Writer_PDF
     *
     *  @param     PHPExcel    $phpExcel    PHPExcel object
     */
    public function __construct(\PHPExcel $phpExcel)
    {
    }
    /**
     *  Get Font
     *
     *  @return string
     */
    public function getFont()
    {
    }
    /**
     *  Set font. Examples:
     *      'arialunicid0-chinese-simplified'
     *      'arialunicid0-chinese-traditional'
     *      'arialunicid0-korean'
     *      'arialunicid0-japanese'
     *
     *  @param    string    $fontName
     */
    public function setFont($fontName)
    {
    }
    /**
     *  Get Paper Size
     *
     *  @return int
     */
    public function getPaperSize()
    {
    }
    /**
     *  Set Paper Size
     *
     *  @param  string  $pValue Paper size
     *  @return PHPExcel_Writer_PDF
     */
    public function setPaperSize($pValue = \PHPExcel_Worksheet_PageSetup::PAPERSIZE_LETTER)
    {
    }
    /**
     *  Get Orientation
     *
     *  @return string
     */
    public function getOrientation()
    {
    }
    /**
     *  Set Orientation
     *
     *  @param string $pValue  Page orientation
     *  @return PHPExcel_Writer_PDF
     */
    public function setOrientation($pValue = \PHPExcel_Worksheet_PageSetup::ORIENTATION_DEFAULT)
    {
    }
    /**
     *  Get temporary storage directory
     *
     *  @return string
     */
    public function getTempDir()
    {
    }
    /**
     *  Set temporary storage directory
     *
     *  @param     string        $pValue        Temporary storage directory
     *  @throws    PHPExcel_Writer_Exception    when directory does not exist
     *  @return    PHPExcel_Writer_PDF
     */
    public function setTempDir($pValue = '')
    {
    }
    /**
     *  Save PHPExcel to PDF file, pre-save
     *
     *  @param     string     $pFilename   Name of the file to save as
     *  @throws    PHPExcel_Writer_Exception
     */
    protected function prepareForSave($pFilename = \NULL)
    {
    }
    /**
     *  Save PHPExcel to PDF file, post-save
     *
     *  @param     resource      $fileHandle
     *  @throws    PHPExcel_Writer_Exception
     */
    protected function restoreStateAfterSave($fileHandle)
    {
    }
}
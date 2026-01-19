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
 * PHPExcel_Worksheet_HeaderFooter
 *
 * <code>
 * Header/Footer Formatting Syntax taken from Office Open XML Part 4 - Markup Language Reference, page 1970:
 *
 * There are a number of formatting codes that can be written inline with the actual header / footer text, which
 * affect the formatting in the header or footer.
 *
 * Example: This example shows the text "Center Bold Header" on the first line (center section), and the date on
 * the second line (center section).
 * 		&CCenter &"-,Bold"Bold&"-,Regular"Header_x000A_&D
 *
 * General Rules:
 * There is no required order in which these codes must appear.
 *
 * The first occurrence of the following codes turns the formatting ON, the second occurrence turns it OFF again:
 * - strikethrough
 * - superscript
 * - subscript
 * Superscript and subscript cannot both be ON at same time. Whichever comes first wins and the other is ignored,
 * while the first is ON.
 * &L - code for "left section" (there are three header / footer locations, "left", "center", and "right"). When
 * two or more occurrences of this section marker exist, the contents from all markers are concatenated, in the
 * order of appearance, and placed into the left section.
 * &P - code for "current page #"
 * &N - code for "total pages"
 * &font size - code for "text font size", where font size is a font size in points.
 * &K - code for "text font color"
 * RGB Color is specified as RRGGBB
 * Theme Color is specifed as TTSNN where TT is the theme color Id, S is either "+" or "-" of the tint/shade
 * value, NN is the tint/shade value.
 * &S - code for "text strikethrough" on / off
 * &X - code for "text super script" on / off
 * &Y - code for "text subscript" on / off
 * &C - code for "center section". When two or more occurrences of this section marker exist, the contents
 * from all markers are concatenated, in the order of appearance, and placed into the center section.
 *
 * &D - code for "date"
 * &T - code for "time"
 * &G - code for "picture as background"
 * &U - code for "text single underline"
 * &E - code for "double underline"
 * &R - code for "right section". When two or more occurrences of this section marker exist, the contents
 * from all markers are concatenated, in the order of appearance, and placed into the right section.
 * &Z - code for "this workbook's file path"
 * &F - code for "this workbook's file name"
 * &A - code for "sheet tab name"
 * &+ - code for add to page #.
 * &- - code for subtract from page #.
 * &"font name,font type" - code for "text font name" and "text font type", where font name and font type
 * are strings specifying the name and type of the font, separated by a comma. When a hyphen appears in font
 * name, it means "none specified". Both of font name and font type can be localized values.
 * &"-,Bold" - code for "bold font style"
 * &B - also means "bold font style".
 * &"-,Regular" - code for "regular font style"
 * &"-,Italic" - code for "italic font style"
 * &I - also means "italic font style"
 * &"-,Bold Italic" code for "bold italic font style"
 * &O - code for "outline style"
 * &H - code for "shadow style"
 * </code>
 *
 * @category   PHPExcel
 * @package    PHPExcel_Worksheet
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_Worksheet_HeaderFooter
{
    /* Header/footer image location */
    const IMAGE_HEADER_LEFT = 'LH';
    const IMAGE_HEADER_CENTER = 'CH';
    const IMAGE_HEADER_RIGHT = 'RH';
    const IMAGE_FOOTER_LEFT = 'LF';
    const IMAGE_FOOTER_CENTER = 'CF';
    const IMAGE_FOOTER_RIGHT = 'RF';
    /**
     * OddHeader
     *
     * @var string
     */
    private $_oddHeader = '';
    /**
     * OddFooter
     *
     * @var string
     */
    private $_oddFooter = '';
    /**
     * EvenHeader
     *
     * @var string
     */
    private $_evenHeader = '';
    /**
     * EvenFooter
     *
     * @var string
     */
    private $_evenFooter = '';
    /**
     * FirstHeader
     *
     * @var string
     */
    private $_firstHeader = '';
    /**
     * FirstFooter
     *
     * @var string
     */
    private $_firstFooter = '';
    /**
     * Different header for Odd/Even, defaults to false
     *
     * @var boolean
     */
    private $_differentOddEven = \false;
    /**
     * Different header for first page, defaults to false
     *
     * @var boolean
     */
    private $_differentFirst = \false;
    /**
     * Scale with document, defaults to true
     *
     * @var boolean
     */
    private $_scaleWithDocument = \true;
    /**
     * Align with margins, defaults to true
     *
     * @var boolean
     */
    private $_alignWithMargins = \true;
    /**
     * Header/footer images
     *
     * @var PHPExcel_Worksheet_HeaderFooterDrawing[]
     */
    private $_headerFooterImages = array();
    /**
     * Create a new PHPExcel_Worksheet_HeaderFooter
     */
    public function __construct()
    {
    }
    /**
     * Get OddHeader
     *
     * @return string
     */
    public function getOddHeader()
    {
    }
    /**
     * Set OddHeader
     *
     * @param string $pValue
     * @return PHPExcel_Worksheet_HeaderFooter
     */
    public function setOddHeader($pValue)
    {
    }
    /**
     * Get OddFooter
     *
     * @return string
     */
    public function getOddFooter()
    {
    }
    /**
     * Set OddFooter
     *
     * @param string $pValue
     * @return PHPExcel_Worksheet_HeaderFooter
     */
    public function setOddFooter($pValue)
    {
    }
    /**
     * Get EvenHeader
     *
     * @return string
     */
    public function getEvenHeader()
    {
    }
    /**
     * Set EvenHeader
     *
     * @param string $pValue
     * @return PHPExcel_Worksheet_HeaderFooter
     */
    public function setEvenHeader($pValue)
    {
    }
    /**
     * Get EvenFooter
     *
     * @return string
     */
    public function getEvenFooter()
    {
    }
    /**
     * Set EvenFooter
     *
     * @param string $pValue
     * @return PHPExcel_Worksheet_HeaderFooter
     */
    public function setEvenFooter($pValue)
    {
    }
    /**
     * Get FirstHeader
     *
     * @return string
     */
    public function getFirstHeader()
    {
    }
    /**
     * Set FirstHeader
     *
     * @param string $pValue
     * @return PHPExcel_Worksheet_HeaderFooter
     */
    public function setFirstHeader($pValue)
    {
    }
    /**
     * Get FirstFooter
     *
     * @return string
     */
    public function getFirstFooter()
    {
    }
    /**
     * Set FirstFooter
     *
     * @param string $pValue
     * @return PHPExcel_Worksheet_HeaderFooter
     */
    public function setFirstFooter($pValue)
    {
    }
    /**
     * Get DifferentOddEven
     *
     * @return boolean
     */
    public function getDifferentOddEven()
    {
    }
    /**
     * Set DifferentOddEven
     *
     * @param boolean $pValue
     * @return PHPExcel_Worksheet_HeaderFooter
     */
    public function setDifferentOddEven($pValue = \false)
    {
    }
    /**
     * Get DifferentFirst
     *
     * @return boolean
     */
    public function getDifferentFirst()
    {
    }
    /**
     * Set DifferentFirst
     *
     * @param boolean $pValue
     * @return PHPExcel_Worksheet_HeaderFooter
     */
    public function setDifferentFirst($pValue = \false)
    {
    }
    /**
     * Get ScaleWithDocument
     *
     * @return boolean
     */
    public function getScaleWithDocument()
    {
    }
    /**
     * Set ScaleWithDocument
     *
     * @param boolean $pValue
     * @return PHPExcel_Worksheet_HeaderFooter
     */
    public function setScaleWithDocument($pValue = \true)
    {
    }
    /**
     * Get AlignWithMargins
     *
     * @return boolean
     */
    public function getAlignWithMargins()
    {
    }
    /**
     * Set AlignWithMargins
     *
     * @param boolean $pValue
     * @return PHPExcel_Worksheet_HeaderFooter
     */
    public function setAlignWithMargins($pValue = \true)
    {
    }
    /**
     * Add header/footer image
     *
     * @param PHPExcel_Worksheet_HeaderFooterDrawing $image
     * @param string $location
     * @throws PHPExcel_Exception
     * @return PHPExcel_Worksheet_HeaderFooter
     */
    public function addImage(\PHPExcel_Worksheet_HeaderFooterDrawing $image = \null, $location = self::IMAGE_HEADER_LEFT)
    {
    }
    /**
     * Remove header/footer image
     *
     * @param string $location
     * @throws PHPExcel_Exception
     * @return PHPExcel_Worksheet_HeaderFooter
     */
    public function removeImage($location = self::IMAGE_HEADER_LEFT)
    {
    }
    /**
     * Set header/footer images
     *
     * @param PHPExcel_Worksheet_HeaderFooterDrawing[] $images
     * @throws PHPExcel_Exception
     * @return PHPExcel_Worksheet_HeaderFooter
     */
    public function setImages($images)
    {
    }
    /**
     * Get header/footer images
     *
     * @return PHPExcel_Worksheet_HeaderFooterDrawing[]
     */
    public function getImages()
    {
    }
    /**
     * Implement PHP __clone to create a deep clone, not just a shallow copy.
     */
    public function __clone()
    {
    }
}
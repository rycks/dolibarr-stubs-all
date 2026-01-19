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
 * @package    PHPExcel_Shared
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    ##VERSION##, ##DATE##
 */
/**
 * PHPExcel_Shared_Font
 *
 * @category   PHPExcel
 * @package    PHPExcel_Shared
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_Shared_Font
{
    /* Methods for resolving autosize value */
    const AUTOSIZE_METHOD_APPROX = 'approx';
    const AUTOSIZE_METHOD_EXACT = 'exact';
    private static $_autoSizeMethods = array(self::AUTOSIZE_METHOD_APPROX, self::AUTOSIZE_METHOD_EXACT);
    /** Character set codes used by BIFF5-8 in Font records */
    const CHARSET_ANSI_LATIN = 0x0;
    const CHARSET_SYSTEM_DEFAULT = 0x1;
    const CHARSET_SYMBOL = 0x2;
    const CHARSET_APPLE_ROMAN = 0x4d;
    const CHARSET_ANSI_JAPANESE_SHIFTJIS = 0x80;
    const CHARSET_ANSI_KOREAN_HANGUL = 0x81;
    const CHARSET_ANSI_KOREAN_JOHAB = 0x82;
    const CHARSET_ANSI_CHINESE_SIMIPLIFIED = 0x86;
    //	gb2312
    const CHARSET_ANSI_CHINESE_TRADITIONAL = 0x88;
    //	big5
    const CHARSET_ANSI_GREEK = 0xa1;
    const CHARSET_ANSI_TURKISH = 0xa2;
    const CHARSET_ANSI_VIETNAMESE = 0xa3;
    const CHARSET_ANSI_HEBREW = 0xb1;
    const CHARSET_ANSI_ARABIC = 0xb2;
    const CHARSET_ANSI_BALTIC = 0xba;
    const CHARSET_ANSI_CYRILLIC = 0xcc;
    const CHARSET_ANSI_THAI = 0xdd;
    const CHARSET_ANSI_LATIN_II = 0xee;
    const CHARSET_OEM_LATIN_I = 0xff;
    //  XXX: Constants created!
    /** Font filenames */
    const ARIAL = 'arial.ttf';
    const ARIAL_BOLD = 'arialbd.ttf';
    const ARIAL_ITALIC = 'ariali.ttf';
    const ARIAL_BOLD_ITALIC = 'arialbi.ttf';
    const CALIBRI = 'CALIBRI.TTF';
    const CALIBRI_BOLD = 'CALIBRIB.TTF';
    const CALIBRI_ITALIC = 'CALIBRII.TTF';
    const CALIBRI_BOLD_ITALIC = 'CALIBRIZ.TTF';
    const COMIC_SANS_MS = 'comic.ttf';
    const COMIC_SANS_MS_BOLD = 'comicbd.ttf';
    const COURIER_NEW = 'cour.ttf';
    const COURIER_NEW_BOLD = 'courbd.ttf';
    const COURIER_NEW_ITALIC = 'couri.ttf';
    const COURIER_NEW_BOLD_ITALIC = 'courbi.ttf';
    const GEORGIA = 'georgia.ttf';
    const GEORGIA_BOLD = 'georgiab.ttf';
    const GEORGIA_ITALIC = 'georgiai.ttf';
    const GEORGIA_BOLD_ITALIC = 'georgiaz.ttf';
    const IMPACT = 'impact.ttf';
    const LIBERATION_SANS = 'LiberationSans-Regular.ttf';
    const LIBERATION_SANS_BOLD = 'LiberationSans-Bold.ttf';
    const LIBERATION_SANS_ITALIC = 'LiberationSans-Italic.ttf';
    const LIBERATION_SANS_BOLD_ITALIC = 'LiberationSans-BoldItalic.ttf';
    const LUCIDA_CONSOLE = 'lucon.ttf';
    const LUCIDA_SANS_UNICODE = 'l_10646.ttf';
    const MICROSOFT_SANS_SERIF = 'micross.ttf';
    const PALATINO_LINOTYPE = 'pala.ttf';
    const PALATINO_LINOTYPE_BOLD = 'palab.ttf';
    const PALATINO_LINOTYPE_ITALIC = 'palai.ttf';
    const PALATINO_LINOTYPE_BOLD_ITALIC = 'palabi.ttf';
    const SYMBOL = 'symbol.ttf';
    const TAHOMA = 'tahoma.ttf';
    const TAHOMA_BOLD = 'tahomabd.ttf';
    const TIMES_NEW_ROMAN = 'times.ttf';
    const TIMES_NEW_ROMAN_BOLD = 'timesbd.ttf';
    const TIMES_NEW_ROMAN_ITALIC = 'timesi.ttf';
    const TIMES_NEW_ROMAN_BOLD_ITALIC = 'timesbi.ttf';
    const TREBUCHET_MS = 'trebuc.ttf';
    const TREBUCHET_MS_BOLD = 'trebucbd.ttf';
    const TREBUCHET_MS_ITALIC = 'trebucit.ttf';
    const TREBUCHET_MS_BOLD_ITALIC = 'trebucbi.ttf';
    const VERDANA = 'verdana.ttf';
    const VERDANA_BOLD = 'verdanab.ttf';
    const VERDANA_ITALIC = 'verdanai.ttf';
    const VERDANA_BOLD_ITALIC = 'verdanaz.ttf';
    /**
     * AutoSize method
     *
     * @var string
     */
    private static $autoSizeMethod = self::AUTOSIZE_METHOD_APPROX;
    /**
     * Path to folder containing TrueType font .ttf files
     *
     * @var string
     */
    private static $trueTypeFontPath = \null;
    /**
     * How wide is a default column for a given default font and size?
     * Empirical data found by inspecting real Excel files and reading off the pixel width
     * in Microsoft Office Excel 2007.
     *
     * @var array
     */
    public static $defaultColumnWidths = array('Arial' => array(1 => array('px' => 24, 'width' => 12.0), 2 => array('px' => 24, 'width' => 12.0), 3 => array('px' => 32, 'width' => 10.6640625), 4 => array('px' => 32, 'width' => 10.6640625), 5 => array('px' => 40, 'width' => 10.0), 6 => array('px' => 48, 'width' => 9.59765625), 7 => array('px' => 48, 'width' => 9.59765625), 8 => array('px' => 56, 'width' => 9.33203125), 9 => array('px' => 64, 'width' => 9.140625), 10 => array('px' => 64, 'width' => 9.140625)), 'Calibri' => array(1 => array('px' => 24, 'width' => 12.0), 2 => array('px' => 24, 'width' => 12.0), 3 => array('px' => 32, 'width' => 10.6640625), 4 => array('px' => 32, 'width' => 10.6640625), 5 => array('px' => 40, 'width' => 10.0), 6 => array('px' => 48, 'width' => 9.59765625), 7 => array('px' => 48, 'width' => 9.59765625), 8 => array('px' => 56, 'width' => 9.33203125), 9 => array('px' => 56, 'width' => 9.33203125), 10 => array('px' => 64, 'width' => 9.140625), 11 => array('px' => 64, 'width' => 9.140625)), 'Verdana' => array(1 => array('px' => 24, 'width' => 12.0), 2 => array('px' => 24, 'width' => 12.0), 3 => array('px' => 32, 'width' => 10.6640625), 4 => array('px' => 32, 'width' => 10.6640625), 5 => array('px' => 40, 'width' => 10.0), 6 => array('px' => 48, 'width' => 9.59765625), 7 => array('px' => 48, 'width' => 9.59765625), 8 => array('px' => 64, 'width' => 9.140625), 9 => array('px' => 72, 'width' => 9.0), 10 => array('px' => 72, 'width' => 9.0)));
    /**
     * Set autoSize method
     *
     * @param string $pValue
     * @return	 boolean					Success or failure
     */
    public static function setAutoSizeMethod($pValue = self::AUTOSIZE_METHOD_APPROX)
    {
    }
    /**
     * Get autoSize method
     *
     * @return string
     */
    public static function getAutoSizeMethod()
    {
    }
    /**
     * Set the path to the folder containing .ttf files. There should be a trailing slash.
     * Typical locations on variout some platforms:
     *	<ul>
     *		<li>C:/Windows/Fonts/</li>
     *		<li>/usr/share/fonts/truetype/</li>
     *		<li>~/.fonts/</li>
     *	</ul>
     *
     * @param string $pValue
     */
    public static function setTrueTypeFontPath($pValue = '')
    {
    }
    /**
     * Get the path to the folder containing .ttf files.
     *
     * @return string
     */
    public static function getTrueTypeFontPath()
    {
    }
    /**
     * Calculate an (approximate) OpenXML column width, based on font size and text contained
     *
     * @param 	PHPExcel_Style_Font			$font			Font object
     * @param 	PHPExcel_RichText|string	$cellText		Text to calculate width
     * @param 	integer						$rotation		Rotation angle
     * @param 	PHPExcel_Style_Font|NULL	$defaultFont	Font object
     * @return 	integer		Column width
     */
    public static function calculateColumnWidth(\PHPExcel_Style_Font $font, $cellText = '', $rotation = 0, \PHPExcel_Style_Font $defaultFont = \null)
    {
    }
    /**
     * Get GD text width in pixels for a string of text in a certain font at a certain rotation angle
     *
     * @param string $text
     * @param PHPExcel_Style_Font
     * @param int $rotation
     * @return int
     * @throws PHPExcel_Exception
     */
    public static function getTextWidthPixelsExact($text, \PHPExcel_Style_Font $font, $rotation = 0)
    {
    }
    /**
     * Get approximate width in pixels for a string of text in a certain font at a certain rotation angle
     *
     * @param string $columnText
     * @param PHPExcel_Style_Font $font
     * @param int $rotation
     * @return int Text width in pixels (no padding added)
     */
    public static function getTextWidthPixelsApprox($columnText, \PHPExcel_Style_Font $font = \null, $rotation = 0)
    {
    }
    /**
     * Calculate an (approximate) pixel size, based on a font points size
     *
     * @param 	int		$fontSizeInPoints	Font size (in points)
     * @return 	int		Font size (in pixels)
     */
    public static function fontSizeToPixels($fontSizeInPoints = 11)
    {
    }
    /**
     * Calculate an (approximate) pixel size, based on inch size
     *
     * @param 	int		$sizeInInch	Font size (in inch)
     * @return 	int		Size (in pixels)
     */
    public static function inchSizeToPixels($sizeInInch = 1)
    {
    }
    /**
     * Calculate an (approximate) pixel size, based on centimeter size
     *
     * @param 	int		$sizeInCm	Font size (in centimeters)
     * @return 	int		Size (in pixels)
     */
    public static function centimeterSizeToPixels($sizeInCm = 1)
    {
    }
    /**
     * Returns the font path given the font
     *
     * @param PHPExcel_Style_Font
     * @return string Path to TrueType font file
     */
    public static function getTrueTypeFontFileFromFont($font)
    {
    }
    /**
     * Returns the associated charset for the font name.
     *
     * @param string $name Font name
     * @return int Character set code
     */
    public static function getCharsetFromFontName($name)
    {
    }
    /**
     * Get the effective column width for columns without a column dimension or column with width -1
     * For example, for Calibri 11 this is 9.140625 (64 px)
     *
     * @param PHPExcel_Style_Font $font The workbooks default font
     * @param boolean $pPixels true = return column width in pixels, false = return in OOXML units
     * @return mixed Column width
     */
    public static function getDefaultColumnWidthByFont(\PHPExcel_Style_Font $font, $pPixels = \false)
    {
    }
    /**
     * Get the effective row height for rows without a row dimension or rows with height -1
     * For example, for Calibri 11 this is 15 points
     *
     * @param PHPExcel_Style_Font $font The workbooks default font
     * @return float Row height in points
     */
    public static function getDefaultRowHeightByFont(\PHPExcel_Style_Font $font)
    {
    }
}
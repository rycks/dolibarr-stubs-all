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
 * @package	PHPExcel_Style
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license	http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version	##VERSION##, ##DATE##
 */
/**
 * PHPExcel_Style_NumberFormat
 *
 * @category   PHPExcel
 * @package	PHPExcel_Style
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_Style_NumberFormat extends \PHPExcel_Style_Supervisor implements \PHPExcel_IComparable
{
    /* Pre-defined formats */
    const FORMAT_GENERAL = 'General';
    const FORMAT_TEXT = '@';
    const FORMAT_NUMBER = '0';
    const FORMAT_NUMBER_00 = '0.00';
    const FORMAT_NUMBER_COMMA_SEPARATED1 = '#,##0.00';
    const FORMAT_NUMBER_COMMA_SEPARATED2 = '#,##0.00_-';
    const FORMAT_PERCENTAGE = '0%';
    const FORMAT_PERCENTAGE_00 = '0.00%';
    const FORMAT_DATE_YYYYMMDD2 = 'yyyy-mm-dd';
    const FORMAT_DATE_YYYYMMDD = 'yy-mm-dd';
    const FORMAT_DATE_DDMMYYYY = 'dd/mm/yy';
    const FORMAT_DATE_DMYSLASH = 'd/m/y';
    const FORMAT_DATE_DMYMINUS = 'd-m-y';
    const FORMAT_DATE_DMMINUS = 'd-m';
    const FORMAT_DATE_MYMINUS = 'm-y';
    const FORMAT_DATE_XLSX14 = 'mm-dd-yy';
    const FORMAT_DATE_XLSX15 = 'd-mmm-yy';
    const FORMAT_DATE_XLSX16 = 'd-mmm';
    const FORMAT_DATE_XLSX17 = 'mmm-yy';
    const FORMAT_DATE_XLSX22 = 'm/d/yy h:mm';
    const FORMAT_DATE_DATETIME = 'd/m/y h:mm';
    const FORMAT_DATE_TIME1 = 'h:mm AM/PM';
    const FORMAT_DATE_TIME2 = 'h:mm:ss AM/PM';
    const FORMAT_DATE_TIME3 = 'h:mm';
    const FORMAT_DATE_TIME4 = 'h:mm:ss';
    const FORMAT_DATE_TIME5 = 'mm:ss';
    const FORMAT_DATE_TIME6 = 'h:mm:ss';
    const FORMAT_DATE_TIME7 = 'i:s.S';
    const FORMAT_DATE_TIME8 = 'h:mm:ss;@';
    const FORMAT_DATE_YYYYMMDDSLASH = 'yy/mm/dd;@';
    const FORMAT_CURRENCY_USD_SIMPLE = '"$"#,##0.00_-';
    const FORMAT_CURRENCY_USD = '$#,##0_-';
    const FORMAT_CURRENCY_EUR_SIMPLE = '[$EUR ]#,##0.00_-';
    /**
     * Excel built-in number formats
     *
     * @var array
     */
    protected static $_builtInFormats;
    /**
     * Excel built-in number formats (flipped, for faster lookups)
     *
     * @var array
     */
    protected static $_flippedBuiltInFormats;
    /**
     * Format Code
     *
     * @var string
     */
    protected $_formatCode = \PHPExcel_Style_NumberFormat::FORMAT_GENERAL;
    /**
     * Built-in format Code
     *
     * @var string
     */
    protected $_builtInFormatCode = 0;
    /**
     * Create a new PHPExcel_Style_NumberFormat
     *
     * @param	boolean	$isSupervisor	Flag indicating if this is a supervisor or not
     *									Leave this value at default unless you understand exactly what
     *										its ramifications are
     * @param	boolean	$isConditional	Flag indicating if this is a conditional style or not
     *									Leave this value at default unless you understand exactly what
     *										its ramifications are
     */
    public function __construct($isSupervisor = \FALSE, $isConditional = \FALSE)
    {
    }
    /**
     * Get the shared style component for the currently active cell in currently active sheet.
     * Only used for style supervisor
     *
     * @return PHPExcel_Style_NumberFormat
     */
    public function getSharedComponent()
    {
    }
    /**
     * Build style array from subcomponents
     *
     * @param array $array
     * @return array
     */
    public function getStyleArray($array)
    {
    }
    /**
     * Apply styles from array
     *
     * <code>
     * $objPHPExcel->getActiveSheet()->getStyle('B2')->getNumberFormat()->applyFromArray(
     *		array(
     *			'code' => PHPExcel_Style_NumberFormat::FORMAT_CURRENCY_EUR_SIMPLE
     *		)
     * );
     * </code>
     *
     * @param	array	$pStyles	Array containing style information
     * @throws	PHPExcel_Exception
     * @return PHPExcel_Style_NumberFormat
     */
    public function applyFromArray($pStyles = \null)
    {
    }
    /**
     * Get Format Code
     *
     * @return string
     */
    public function getFormatCode()
    {
    }
    /**
     * Set Format Code
     *
     * @param string $pValue
     * @return PHPExcel_Style_NumberFormat
     */
    public function setFormatCode($pValue = \PHPExcel_Style_NumberFormat::FORMAT_GENERAL)
    {
    }
    /**
     * Get Built-In Format Code
     *
     * @return int
     */
    public function getBuiltInFormatCode()
    {
    }
    /**
     * Set Built-In Format Code
     *
     * @param int $pValue
     * @return PHPExcel_Style_NumberFormat
     */
    public function setBuiltInFormatCode($pValue = 0)
    {
    }
    /**
     * Fill built-in format codes
     */
    private static function fillBuiltInFormatCodes()
    {
    }
    /**
     * Get built-in format code
     *
     * @param	int		$pIndex
     * @return	string
     */
    public static function builtInFormatCode($pIndex)
    {
    }
    /**
     * Get built-in format code index
     *
     * @param	string		$formatCode
     * @return	int|boolean
     */
    public static function builtInFormatCodeIndex($formatCode)
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
     * Search/replace values to convert Excel date/time format masks to PHP format masks
     *
     * @var array
     */
    private static $_dateFormatReplacements = array(
        // first remove escapes related to non-format characters
        '\\' => '',
        //	12-hour suffix
        'am/pm' => 'A',
        //	4-digit year
        'e' => 'Y',
        'yyyy' => 'Y',
        //	2-digit year
        'yy' => 'y',
        //	first letter of month - no php equivalent
        'mmmmm' => 'M',
        //	full month name
        'mmmm' => 'F',
        //	short month name
        'mmm' => 'M',
        //	mm is minutes if time, but can also be month w/leading zero
        //	so we try to identify times be the inclusion of a : separator in the mask
        //	It isn't perfect, but the best way I know how
        ':mm' => ':i',
        'mm:' => 'i:',
        //	month leading zero
        'mm' => 'm',
        //	month no leading zero
        'm' => 'n',
        //	full day of week name
        'dddd' => 'l',
        //	short day of week name
        'ddd' => 'D',
        //	days leading zero
        'dd' => 'd',
        //	days no leading zero
        'd' => 'j',
        //	seconds
        'ss' => 's',
        //	fractional seconds - no php equivalent
        '.s' => '',
    );
    /**
     * Search/replace values to convert Excel date/time format masks hours to PHP format masks (24 hr clock)
     *
     * @var array
     */
    private static $_dateFormatReplacements24 = array('hh' => 'H', 'h' => 'G');
    /**
     * Search/replace values to convert Excel date/time format masks hours to PHP format masks (12 hr clock)
     *
     * @var array
     */
    private static $_dateFormatReplacements12 = array('hh' => 'h', 'h' => 'g');
    private static function _formatAsDate(&$value, &$format)
    {
    }
    private static function _formatAsPercentage(&$value, &$format)
    {
    }
    private static function _formatAsFraction(&$value, &$format)
    {
    }
    private static function _complexNumberFormatMask($number, $mask, $level = 0)
    {
    }
    /**
     * Convert a value in a pre-defined format to a PHP string
     *
     * @param mixed	$value		Value to format
     * @param string	$format		Format code
     * @param array		$callBack	Callback function for additional formatting of string
     * @return string	Formatted string
     */
    public static function toFormattedString($value = '0', $format = \PHPExcel_Style_NumberFormat::FORMAT_GENERAL, $callBack = \null)
    {
    }
}
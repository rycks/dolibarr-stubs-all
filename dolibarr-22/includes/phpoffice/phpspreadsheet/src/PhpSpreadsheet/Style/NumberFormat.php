<?php

namespace PhpOffice\PhpSpreadsheet\Style;

class NumberFormat extends \PhpOffice\PhpSpreadsheet\Style\Supervisor
{
    // Pre-defined formats
    const FORMAT_GENERAL = 'General';
    const FORMAT_TEXT = '@';
    const FORMAT_NUMBER = '0';
    const FORMAT_NUMBER_00 = '0.00';
    const FORMAT_NUMBER_COMMA_SEPARATED1 = '#,##0.00';
    const FORMAT_NUMBER_COMMA_SEPARATED2 = '#,##0.00_-';
    const FORMAT_PERCENTAGE = '0%';
    const FORMAT_PERCENTAGE_00 = '0.00%';
    const FORMAT_DATE_YYYYMMDD2 = 'yyyy-mm-dd';
    const FORMAT_DATE_YYYYMMDD = 'yyyy-mm-dd';
    const FORMAT_DATE_DDMMYYYY = 'dd/mm/yyyy';
    const FORMAT_DATE_DMYSLASH = 'd/m/yy';
    const FORMAT_DATE_DMYMINUS = 'd-m-yy';
    const FORMAT_DATE_DMMINUS = 'd-m';
    const FORMAT_DATE_MYMINUS = 'm-yy';
    const FORMAT_DATE_XLSX14 = 'mm-dd-yy';
    const FORMAT_DATE_XLSX15 = 'd-mmm-yy';
    const FORMAT_DATE_XLSX16 = 'd-mmm';
    const FORMAT_DATE_XLSX17 = 'mmm-yy';
    const FORMAT_DATE_XLSX22 = 'm/d/yy h:mm';
    const FORMAT_DATE_DATETIME = 'd/m/yy h:mm';
    const FORMAT_DATE_TIME1 = 'h:mm AM/PM';
    const FORMAT_DATE_TIME2 = 'h:mm:ss AM/PM';
    const FORMAT_DATE_TIME3 = 'h:mm';
    const FORMAT_DATE_TIME4 = 'h:mm:ss';
    const FORMAT_DATE_TIME5 = 'mm:ss';
    const FORMAT_DATE_TIME6 = 'h:mm:ss';
    const FORMAT_DATE_TIME7 = 'i:s.S';
    const FORMAT_DATE_TIME8 = 'h:mm:ss;@';
    const FORMAT_DATE_YYYYMMDDSLASH = 'yyyy/mm/dd;@';
    const FORMAT_CURRENCY_USD_SIMPLE = '"$"#,##0.00_-';
    const FORMAT_CURRENCY_USD = '$#,##0_-';
    const FORMAT_CURRENCY_EUR_SIMPLE = '#,##0.00_-"€"';
    const FORMAT_CURRENCY_EUR = '#,##0_-"€"';
    const FORMAT_ACCOUNTING_USD = '_("$"* #,##0.00_);_("$"* \\(#,##0.00\\);_("$"* "-"??_);_(@_)';
    const FORMAT_ACCOUNTING_EUR = '_("€"* #,##0.00_);_("€"* \\(#,##0.00\\);_("€"* "-"??_);_(@_)';
    /**
     * Excel built-in number formats.
     *
     * @var array
     */
    protected static $builtInFormats;
    /**
     * Excel built-in number formats (flipped, for faster lookups).
     *
     * @var array
     */
    protected static $flippedBuiltInFormats;
    /**
     * Format Code.
     *
     * @var string
     */
    protected $formatCode = self::FORMAT_GENERAL;
    /**
     * Built-in format Code.
     *
     * @var string
     */
    protected $builtInFormatCode = 0;
    /**
     * Create a new NumberFormat.
     *
     * @param bool $isSupervisor Flag indicating if this is a supervisor or not
     *                                    Leave this value at default unless you understand exactly what
     *                                        its ramifications are
     * @param bool $isConditional Flag indicating if this is a conditional style or not
     *                                    Leave this value at default unless you understand exactly what
     *                                        its ramifications are
     */
    public function __construct($isSupervisor = false, $isConditional = false)
    {
    }
    /**
     * Get the shared style component for the currently active cell in currently active sheet.
     * Only used for style supervisor.
     *
     * @return NumberFormat
     */
    public function getSharedComponent()
    {
    }
    /**
     * Build style array from subcomponents.
     *
     * @param array $array
     *
     * @return array
     */
    public function getStyleArray($array)
    {
    }
    /**
     * Apply styles from array.
     *
     * <code>
     * $spreadsheet->getActiveSheet()->getStyle('B2')->getNumberFormat()->applyFromArray(
     *     [
     *         'formatCode' => NumberFormat::FORMAT_CURRENCY_EUR_SIMPLE
     *     ]
     * );
     * </code>
     *
     * @param array $pStyles Array containing style information
     *
     * @throws PhpSpreadsheetException
     *
     * @return $this
     */
    public function applyFromArray(array $pStyles)
    {
    }
    /**
     * Get Format Code.
     *
     * @return string
     */
    public function getFormatCode()
    {
    }
    /**
     * Set Format Code.
     *
     * @param string $pValue see self::FORMAT_*
     *
     * @return $this
     */
    public function setFormatCode($pValue)
    {
    }
    /**
     * Get Built-In Format Code.
     *
     * @return int
     */
    public function getBuiltInFormatCode()
    {
    }
    /**
     * Set Built-In Format Code.
     *
     * @param int $pValue
     *
     * @return $this
     */
    public function setBuiltInFormatCode($pValue)
    {
    }
    /**
     * Fill built-in format codes.
     */
    private static function fillBuiltInFormatCodes()
    {
    }
    /**
     * Get built-in format code.
     *
     * @param int $pIndex
     *
     * @return string
     */
    public static function builtInFormatCode($pIndex)
    {
    }
    /**
     * Get built-in format code index.
     *
     * @param string $formatCode
     *
     * @return bool|int
     */
    public static function builtInFormatCodeIndex($formatCode)
    {
    }
    /**
     * Get hash code.
     *
     * @return string Hash code
     */
    public function getHashCode()
    {
    }
    /**
     * Search/replace values to convert Excel date/time format masks to PHP format masks.
     *
     * @var array
     */
    private static $dateFormatReplacements = [
        // first remove escapes related to non-format characters
        '\\' => '',
        //    12-hour suffix
        'am/pm' => 'A',
        //    4-digit year
        'e' => 'Y',
        'yyyy' => 'Y',
        //    2-digit year
        'yy' => 'y',
        //    first letter of month - no php equivalent
        'mmmmm' => 'M',
        //    full month name
        'mmmm' => 'F',
        //    short month name
        'mmm' => 'M',
        //    mm is minutes if time, but can also be month w/leading zero
        //    so we try to identify times be the inclusion of a : separator in the mask
        //    It isn't perfect, but the best way I know how
        ':mm' => ':i',
        'mm:' => 'i:',
        //    month leading zero
        'mm' => 'm',
        //    month no leading zero
        'm' => 'n',
        //    full day of week name
        'dddd' => 'l',
        //    short day of week name
        'ddd' => 'D',
        //    days leading zero
        'dd' => 'd',
        //    days no leading zero
        'd' => 'j',
        //    seconds
        'ss' => 's',
        //    fractional seconds - no php equivalent
        '.s' => '',
    ];
    /**
     * Search/replace values to convert Excel date/time format masks hours to PHP format masks (24 hr clock).
     *
     * @var array
     */
    private static $dateFormatReplacements24 = ['hh' => 'H', 'h' => 'G'];
    /**
     * Search/replace values to convert Excel date/time format masks hours to PHP format masks (12 hr clock).
     *
     * @var array
     */
    private static $dateFormatReplacements12 = ['hh' => 'h', 'h' => 'g'];
    private static function setLowercaseCallback($matches)
    {
    }
    private static function escapeQuotesCallback($matches)
    {
    }
    private static function formatAsDate(&$value, &$format)
    {
    }
    private static function formatAsPercentage(&$value, &$format)
    {
    }
    private static function formatAsFraction(&$value, &$format)
    {
    }
    private static function mergeComplexNumberFormatMasks($numbers, $masks)
    {
    }
    private static function processComplexNumberFormatMask($number, $mask)
    {
    }
    private static function complexNumberFormatMask($number, $mask, $splitOnPoint = true)
    {
    }
    private static function formatStraightNumericValue($value, $format, array $matches, $useThousands, $number_regex)
    {
    }
    private static function formatAsNumber($value, $format)
    {
    }
    /**
     * Convert a value in a pre-defined format to a PHP string.
     *
     * @param mixed $value Value to format
     * @param string $format Format code, see = self::FORMAT_*
     * @param array $callBack Callback function for additional formatting of string
     *
     * @return string Formatted string
     */
    public static function toFormattedString($value, $format, $callBack = null)
    {
    }
}
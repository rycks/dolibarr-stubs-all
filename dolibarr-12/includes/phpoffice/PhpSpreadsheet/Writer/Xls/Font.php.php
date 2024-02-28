<?php

namespace PhpOffice\PhpSpreadsheet\Writer\Xls;

class Font
{
    /**
     * Color index.
     *
     * @var int
     */
    private $colorIndex;
    /**
     * Font.
     *
     * @var \PhpOffice\PhpSpreadsheet\Style\Font
     */
    private $font;
    /**
     * Constructor.
     *
     * @param \PhpOffice\PhpSpreadsheet\Style\Font $font
     */
    public function __construct(\PhpOffice\PhpSpreadsheet\Style\Font $font)
    {
    }
    /**
     * Set the color index.
     *
     * @param int $colorIndex
     */
    public function setColorIndex($colorIndex)
    {
    }
    /**
     * Get font record data.
     *
     * @return string
     */
    public function writeFont()
    {
    }
    /**
     * Map to BIFF5-BIFF8 codes for bold.
     *
     * @param bool $bold
     *
     * @return int
     */
    private static function mapBold($bold)
    {
    }
    /**
     * Map of BIFF2-BIFF8 codes for underline styles.
     *
     * @var array of int
     */
    private static $mapUnderline = [\PhpOffice\PhpSpreadsheet\Style\Font::UNDERLINE_NONE => 0x0, \PhpOffice\PhpSpreadsheet\Style\Font::UNDERLINE_SINGLE => 0x1, \PhpOffice\PhpSpreadsheet\Style\Font::UNDERLINE_DOUBLE => 0x2, \PhpOffice\PhpSpreadsheet\Style\Font::UNDERLINE_SINGLEACCOUNTING => 0x21, \PhpOffice\PhpSpreadsheet\Style\Font::UNDERLINE_DOUBLEACCOUNTING => 0x22];
    /**
     * Map underline.
     *
     * @param string $underline
     *
     * @return int
     */
    private static function mapUnderline($underline)
    {
    }
}
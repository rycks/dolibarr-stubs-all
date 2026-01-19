<?php

namespace PhpOffice\PhpSpreadsheet\Writer;

abstract class Pdf extends \PhpOffice\PhpSpreadsheet\Writer\Html
{
    /**
     * Temporary storage directory.
     *
     * @var string
     */
    protected $tempDir = '';
    /**
     * Font.
     *
     * @var string
     */
    protected $font = 'freesans';
    /**
     * Orientation (Over-ride).
     *
     * @var string
     */
    protected $orientation;
    /**
     * Paper size (Over-ride).
     *
     * @var int
     */
    protected $paperSize;
    /**
     * Temporary storage for Save Array Return type.
     *
     * @var string
     */
    private $saveArrayReturnType;
    /**
     * Paper Sizes xRef List.
     *
     * @var array
     */
    protected static $paperSizes = [
        \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_LETTER => 'LETTER',
        //    (8.5 in. by 11 in.)
        \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_LETTER_SMALL => 'LETTER',
        //    (8.5 in. by 11 in.)
        \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_TABLOID => [792.0, 1224.0],
        //    (11 in. by 17 in.)
        \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_LEDGER => [1224.0, 792.0],
        //    (17 in. by 11 in.)
        \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_LEGAL => 'LEGAL',
        //    (8.5 in. by 14 in.)
        \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_STATEMENT => [396.0, 612.0],
        //    (5.5 in. by 8.5 in.)
        \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_EXECUTIVE => 'EXECUTIVE',
        //    (7.25 in. by 10.5 in.)
        \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A3 => 'A3',
        //    (297 mm by 420 mm)
        \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4 => 'A4',
        //    (210 mm by 297 mm)
        \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4_SMALL => 'A4',
        //    (210 mm by 297 mm)
        \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A5 => 'A5',
        //    (148 mm by 210 mm)
        \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_B4 => 'B4',
        //    (250 mm by 353 mm)
        \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_B5 => 'B5',
        //    (176 mm by 250 mm)
        \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_FOLIO => 'FOLIO',
        //    (8.5 in. by 13 in.)
        \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_QUARTO => [609.45, 779.53],
        //    (215 mm by 275 mm)
        \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_STANDARD_1 => [720.0, 1008.0],
        //    (10 in. by 14 in.)
        \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_STANDARD_2 => [792.0, 1224.0],
        //    (11 in. by 17 in.)
        \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_NOTE => 'LETTER',
        //    (8.5 in. by 11 in.)
        \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_NO9_ENVELOPE => [279.0, 639.0],
        //    (3.875 in. by 8.875 in.)
        \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_NO10_ENVELOPE => [297.0, 684.0],
        //    (4.125 in. by 9.5 in.)
        \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_NO11_ENVELOPE => [324.0, 747.0],
        //    (4.5 in. by 10.375 in.)
        \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_NO12_ENVELOPE => [342.0, 792.0],
        //    (4.75 in. by 11 in.)
        \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_NO14_ENVELOPE => [360.0, 828.0],
        //    (5 in. by 11.5 in.)
        \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_C => [1224.0, 1584.0],
        //    (17 in. by 22 in.)
        \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_D => [1584.0, 2448.0],
        //    (22 in. by 34 in.)
        \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_E => [2448.0, 3168.0],
        //    (34 in. by 44 in.)
        \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_DL_ENVELOPE => [311.81, 623.62],
        //    (110 mm by 220 mm)
        \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_C5_ENVELOPE => 'C5',
        //    (162 mm by 229 mm)
        \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_C3_ENVELOPE => 'C3',
        //    (324 mm by 458 mm)
        \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_C4_ENVELOPE => 'C4',
        //    (229 mm by 324 mm)
        \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_C6_ENVELOPE => 'C6',
        //    (114 mm by 162 mm)
        \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_C65_ENVELOPE => [323.15, 649.13],
        //    (114 mm by 229 mm)
        \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_B4_ENVELOPE => 'B4',
        //    (250 mm by 353 mm)
        \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_B5_ENVELOPE => 'B5',
        //    (176 mm by 250 mm)
        \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_B6_ENVELOPE => [498.9, 354.33],
        //    (176 mm by 125 mm)
        \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_ITALY_ENVELOPE => [311.81, 651.97],
        //    (110 mm by 230 mm)
        \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_MONARCH_ENVELOPE => [279.0, 540.0],
        //    (3.875 in. by 7.5 in.)
        \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_6_3_4_ENVELOPE => [261.0, 468.0],
        //    (3.625 in. by 6.5 in.)
        \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_US_STANDARD_FANFOLD => [1071.0, 792.0],
        //    (14.875 in. by 11 in.)
        \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_GERMAN_STANDARD_FANFOLD => [612.0, 864.0],
        //    (8.5 in. by 12 in.)
        \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_GERMAN_LEGAL_FANFOLD => 'FOLIO',
        //    (8.5 in. by 13 in.)
        \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_ISO_B4 => 'B4',
        //    (250 mm by 353 mm)
        \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_JAPANESE_DOUBLE_POSTCARD => [566.9299999999999, 419.53],
        //    (200 mm by 148 mm)
        \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_STANDARD_PAPER_1 => [648.0, 792.0],
        //    (9 in. by 11 in.)
        \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_STANDARD_PAPER_2 => [720.0, 792.0],
        //    (10 in. by 11 in.)
        \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_STANDARD_PAPER_3 => [1080.0, 792.0],
        //    (15 in. by 11 in.)
        \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_INVITE_ENVELOPE => [623.62, 623.62],
        //    (220 mm by 220 mm)
        \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_LETTER_EXTRA_PAPER => [667.8, 864.0],
        //    (9.275 in. by 12 in.)
        \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_LEGAL_EXTRA_PAPER => [667.8, 1080.0],
        //    (9.275 in. by 15 in.)
        \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_TABLOID_EXTRA_PAPER => [841.6799999999999, 1296.0],
        //    (11.69 in. by 18 in.)
        \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4_EXTRA_PAPER => [668.98, 912.76],
        //    (236 mm by 322 mm)
        \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_LETTER_TRANSVERSE_PAPER => [595.8, 792.0],
        //    (8.275 in. by 11 in.)
        \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4_TRANSVERSE_PAPER => 'A4',
        //    (210 mm by 297 mm)
        \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_LETTER_EXTRA_TRANSVERSE_PAPER => [667.8, 864.0],
        //    (9.275 in. by 12 in.)
        \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_SUPERA_SUPERA_A4_PAPER => [643.46, 1009.13],
        //    (227 mm by 356 mm)
        \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_SUPERB_SUPERB_A3_PAPER => [864.5700000000001, 1380.47],
        //    (305 mm by 487 mm)
        \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_LETTER_PLUS_PAPER => [612.0, 913.6799999999999],
        //    (8.5 in. by 12.69 in.)
        \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4_PLUS_PAPER => [595.28, 935.4299999999999],
        //    (210 mm by 330 mm)
        \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A5_TRANSVERSE_PAPER => 'A5',
        //    (148 mm by 210 mm)
        \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_JIS_B5_TRANSVERSE_PAPER => [515.91, 728.5],
        //    (182 mm by 257 mm)
        \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A3_EXTRA_PAPER => [912.76, 1261.42],
        //    (322 mm by 445 mm)
        \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A5_EXTRA_PAPER => [493.23, 666.14],
        //    (174 mm by 235 mm)
        \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_ISO_B5_EXTRA_PAPER => [569.76, 782.36],
        //    (201 mm by 276 mm)
        \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A2_PAPER => 'A2',
        //    (420 mm by 594 mm)
        \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A3_TRANSVERSE_PAPER => 'A3',
        //    (297 mm by 420 mm)
        \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A3_EXTRA_TRANSVERSE_PAPER => [912.76, 1261.42],
    ];
    /**
     * Create a new PDF Writer instance.
     *
     * @param Spreadsheet $spreadsheet Spreadsheet object
     */
    public function __construct(\PhpOffice\PhpSpreadsheet\Spreadsheet $spreadsheet)
    {
    }
    /**
     * Get Font.
     *
     * @return string
     */
    public function getFont()
    {
    }
    /**
     * Set font. Examples:
     *      'arialunicid0-chinese-simplified'
     *      'arialunicid0-chinese-traditional'
     *      'arialunicid0-korean'
     *      'arialunicid0-japanese'.
     *
     * @param string $fontName
     *
     * @return Pdf
     */
    public function setFont($fontName)
    {
    }
    /**
     * Get Paper Size.
     *
     * @return int
     */
    public function getPaperSize()
    {
    }
    /**
     * Set Paper Size.
     *
     * @param string $pValue Paper size see PageSetup::PAPERSIZE_*
     *
     * @return self
     */
    public function setPaperSize($pValue)
    {
    }
    /**
     * Get Orientation.
     *
     * @return string
     */
    public function getOrientation()
    {
    }
    /**
     * Set Orientation.
     *
     * @param string $pValue Page orientation see PageSetup::ORIENTATION_*
     *
     * @return self
     */
    public function setOrientation($pValue)
    {
    }
    /**
     * Get temporary storage directory.
     *
     * @return string
     */
    public function getTempDir()
    {
    }
    /**
     * Set temporary storage directory.
     *
     * @param string $pValue Temporary storage directory
     *
     * @throws WriterException when directory does not exist
     *
     * @return self
     */
    public function setTempDir($pValue)
    {
    }
    /**
     * Save Spreadsheet to PDF file, pre-save.
     *
     * @param string $pFilename Name of the file to save as
     *
     * @throws WriterException
     *
     * @return resource
     */
    protected function prepareForSave($pFilename)
    {
    }
    /**
     * Save PhpSpreadsheet to PDF file, post-save.
     *
     * @param resource $fileHandle
     */
    protected function restoreStateAfterSave($fileHandle)
    {
    }
}
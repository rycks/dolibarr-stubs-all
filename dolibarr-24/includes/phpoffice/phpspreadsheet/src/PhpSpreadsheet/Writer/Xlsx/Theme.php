<?php

namespace PhpOffice\PhpSpreadsheet\Writer\Xlsx;

/**
 * @category   PhpSpreadsheet
 *
 * @copyright  Copyright (c) 2006 - 2016 PhpSpreadsheet (https://github.com/PHPOffice/PhpSpreadsheet)
 */
class Theme extends \PhpOffice\PhpSpreadsheet\Writer\Xlsx\WriterPart
{
    /**
     * Map of Major fonts to write.
     *
     * @var array of string
     */
    private static $majorFonts = ['Jpan' => 'ＭＳ Ｐゴシック', 'Hang' => '맑은 고딕', 'Hans' => '宋体', 'Hant' => '新細明體', 'Arab' => 'Times New Roman', 'Hebr' => 'Times New Roman', 'Thai' => 'Tahoma', 'Ethi' => 'Nyala', 'Beng' => 'Vrinda', 'Gujr' => 'Shruti', 'Khmr' => 'MoolBoran', 'Knda' => 'Tunga', 'Guru' => 'Raavi', 'Cans' => 'Euphemia', 'Cher' => 'Plantagenet Cherokee', 'Yiii' => 'Microsoft Yi Baiti', 'Tibt' => 'Microsoft Himalaya', 'Thaa' => 'MV Boli', 'Deva' => 'Mangal', 'Telu' => 'Gautami', 'Taml' => 'Latha', 'Syrc' => 'Estrangelo Edessa', 'Orya' => 'Kalinga', 'Mlym' => 'Kartika', 'Laoo' => 'DokChampa', 'Sinh' => 'Iskoola Pota', 'Mong' => 'Mongolian Baiti', 'Viet' => 'Times New Roman', 'Uigh' => 'Microsoft Uighur', 'Geor' => 'Sylfaen'];
    /**
     * Map of Minor fonts to write.
     *
     * @var array of string
     */
    private static $minorFonts = ['Jpan' => 'ＭＳ Ｐゴシック', 'Hang' => '맑은 고딕', 'Hans' => '宋体', 'Hant' => '新細明體', 'Arab' => 'Arial', 'Hebr' => 'Arial', 'Thai' => 'Tahoma', 'Ethi' => 'Nyala', 'Beng' => 'Vrinda', 'Gujr' => 'Shruti', 'Khmr' => 'DaunPenh', 'Knda' => 'Tunga', 'Guru' => 'Raavi', 'Cans' => 'Euphemia', 'Cher' => 'Plantagenet Cherokee', 'Yiii' => 'Microsoft Yi Baiti', 'Tibt' => 'Microsoft Himalaya', 'Thaa' => 'MV Boli', 'Deva' => 'Mangal', 'Telu' => 'Gautami', 'Taml' => 'Latha', 'Syrc' => 'Estrangelo Edessa', 'Orya' => 'Kalinga', 'Mlym' => 'Kartika', 'Laoo' => 'DokChampa', 'Sinh' => 'Iskoola Pota', 'Mong' => 'Mongolian Baiti', 'Viet' => 'Arial', 'Uigh' => 'Microsoft Uighur', 'Geor' => 'Sylfaen'];
    /**
     * Map of core colours.
     *
     * @var array of string
     */
    private static $colourScheme = ['dk2' => '1F497D', 'lt2' => 'EEECE1', 'accent1' => '4F81BD', 'accent2' => 'C0504D', 'accent3' => '9BBB59', 'accent4' => '8064A2', 'accent5' => '4BACC6', 'accent6' => 'F79646', 'hlink' => '0000FF', 'folHlink' => '800080'];
    /**
     * Write theme to XML format.
     *
     * @param Spreadsheet $spreadsheet
     *
     * @throws \PhpOffice\PhpSpreadsheet\Writer\Exception
     *
     * @return string XML Output
     */
    public function writeTheme(\PhpOffice\PhpSpreadsheet\Spreadsheet $spreadsheet)
    {
    }
    /**
     * Write fonts to XML format.
     *
     * @param XMLWriter $objWriter
     * @param string $latinFont
     * @param array of string                $fontSet
     *
     * @return string XML Output
     */
    private function writeFonts($objWriter, $latinFont, $fontSet)
    {
    }
    /**
     * Write colour scheme to XML format.
     *
     * @param XMLWriter $objWriter
     *
     * @return string XML Output
     */
    private function writeColourScheme($objWriter)
    {
    }
}
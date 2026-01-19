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
 * @package    PHPExcel_Writer_Excel2007
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    ##VERSION##, ##DATE##
 */
/**
 * PHPExcel_Writer_Excel2007_Theme
 *
 * @category   PHPExcel
 * @package    PHPExcel_Writer_Excel2007
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_Writer_Excel2007_Theme extends \PHPExcel_Writer_Excel2007_WriterPart
{
    /**
     * Map of Major fonts to write
     * @static	array of string
     *
     */
    private static $_majorFonts = array('Jpan' => 'ＭＳ Ｐゴシック', 'Hang' => '맑은 고딕', 'Hans' => '宋体', 'Hant' => '新細明體', 'Arab' => 'Times New Roman', 'Hebr' => 'Times New Roman', 'Thai' => 'Tahoma', 'Ethi' => 'Nyala', 'Beng' => 'Vrinda', 'Gujr' => 'Shruti', 'Khmr' => 'MoolBoran', 'Knda' => 'Tunga', 'Guru' => 'Raavi', 'Cans' => 'Euphemia', 'Cher' => 'Plantagenet Cherokee', 'Yiii' => 'Microsoft Yi Baiti', 'Tibt' => 'Microsoft Himalaya', 'Thaa' => 'MV Boli', 'Deva' => 'Mangal', 'Telu' => 'Gautami', 'Taml' => 'Latha', 'Syrc' => 'Estrangelo Edessa', 'Orya' => 'Kalinga', 'Mlym' => 'Kartika', 'Laoo' => 'DokChampa', 'Sinh' => 'Iskoola Pota', 'Mong' => 'Mongolian Baiti', 'Viet' => 'Times New Roman', 'Uigh' => 'Microsoft Uighur', 'Geor' => 'Sylfaen');
    /**
     * Map of Minor fonts to write
     * @static	array of string
     *
     */
    private static $_minorFonts = array('Jpan' => 'ＭＳ Ｐゴシック', 'Hang' => '맑은 고딕', 'Hans' => '宋体', 'Hant' => '新細明體', 'Arab' => 'Arial', 'Hebr' => 'Arial', 'Thai' => 'Tahoma', 'Ethi' => 'Nyala', 'Beng' => 'Vrinda', 'Gujr' => 'Shruti', 'Khmr' => 'DaunPenh', 'Knda' => 'Tunga', 'Guru' => 'Raavi', 'Cans' => 'Euphemia', 'Cher' => 'Plantagenet Cherokee', 'Yiii' => 'Microsoft Yi Baiti', 'Tibt' => 'Microsoft Himalaya', 'Thaa' => 'MV Boli', 'Deva' => 'Mangal', 'Telu' => 'Gautami', 'Taml' => 'Latha', 'Syrc' => 'Estrangelo Edessa', 'Orya' => 'Kalinga', 'Mlym' => 'Kartika', 'Laoo' => 'DokChampa', 'Sinh' => 'Iskoola Pota', 'Mong' => 'Mongolian Baiti', 'Viet' => 'Arial', 'Uigh' => 'Microsoft Uighur', 'Geor' => 'Sylfaen');
    /**
     * Map of core colours
     * @static	array of string
     *
     */
    private static $_colourScheme = array('dk2' => '1F497D', 'lt2' => 'EEECE1', 'accent1' => '4F81BD', 'accent2' => 'C0504D', 'accent3' => '9BBB59', 'accent4' => '8064A2', 'accent5' => '4BACC6', 'accent6' => 'F79646', 'hlink' => '0000FF', 'folHlink' => '800080');
    /**
     * Write theme to XML format
     *
     * @param 	PHPExcel	$pPHPExcel
     * @return 	string 		XML Output
     * @throws 	PHPExcel_Writer_Exception
     */
    public function writeTheme(\PHPExcel $pPHPExcel = \null)
    {
    }
    /**
     * Write fonts to XML format
     *
     * @param 	PHPExcel_Shared_XMLWriter	$objWriter
     * @param 	string						$latinFont
     * @param 	array of string				$fontSet
     * @return 	string 						XML Output
     * @throws 	PHPExcel_Writer_Exception
     */
    private function _writeFonts($objWriter, $latinFont, $fontSet)
    {
    }
    /**
     * Write colour scheme to XML format
     *
     * @param 	PHPExcel_Shared_XMLWriter	$objWriter
     * @return 	string 						XML Output
     * @throws 	PHPExcel_Writer_Exception
     */
    private function _writeColourScheme($objWriter)
    {
    }
}
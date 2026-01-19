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
 * PHPExcel_Writer_Excel2007_Style
 *
 * @category   PHPExcel
 * @package    PHPExcel_Writer_Excel2007
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_Writer_Excel2007_Style extends \PHPExcel_Writer_Excel2007_WriterPart
{
    /**
     * Write styles to XML format
     *
     * @param 	PHPExcel	$pPHPExcel
     * @return 	string 		XML Output
     * @throws 	PHPExcel_Writer_Exception
     */
    public function writeStyles(\PHPExcel $pPHPExcel = \null)
    {
    }
    /**
     * Write Fill
     *
     * @param 	PHPExcel_Shared_XMLWriter 	$objWriter 		XML Writer
     * @param 	PHPExcel_Style_Fill			$pFill			Fill style
     * @throws 	PHPExcel_Writer_Exception
     */
    private function _writeFill(\PHPExcel_Shared_XMLWriter $objWriter = \null, \PHPExcel_Style_Fill $pFill = \null)
    {
    }
    /**
     * Write Gradient Fill
     *
     * @param 	PHPExcel_Shared_XMLWriter 	$objWriter 		XML Writer
     * @param 	PHPExcel_Style_Fill			$pFill			Fill style
     * @throws 	PHPExcel_Writer_Exception
     */
    private function _writeGradientFill(\PHPExcel_Shared_XMLWriter $objWriter = \null, \PHPExcel_Style_Fill $pFill = \null)
    {
    }
    /**
     * Write Pattern Fill
     *
     * @param 	PHPExcel_Shared_XMLWriter			$objWriter 		XML Writer
     * @param 	PHPExcel_Style_Fill					$pFill			Fill style
     * @throws 	PHPExcel_Writer_Exception
     */
    private function _writePatternFill(\PHPExcel_Shared_XMLWriter $objWriter = \null, \PHPExcel_Style_Fill $pFill = \null)
    {
    }
    /**
     * Write Font
     *
     * @param 	PHPExcel_Shared_XMLWriter		$objWriter 		XML Writer
     * @param 	PHPExcel_Style_Font				$pFont			Font style
     * @throws 	PHPExcel_Writer_Exception
     */
    private function _writeFont(\PHPExcel_Shared_XMLWriter $objWriter = \null, \PHPExcel_Style_Font $pFont = \null)
    {
    }
    /**
     * Write Border
     *
     * @param 	PHPExcel_Shared_XMLWriter			$objWriter 		XML Writer
     * @param 	PHPExcel_Style_Borders				$pBorders		Borders style
     * @throws 	PHPExcel_Writer_Exception
     */
    private function _writeBorder(\PHPExcel_Shared_XMLWriter $objWriter = \null, \PHPExcel_Style_Borders $pBorders = \null)
    {
    }
    /**
     * Write Cell Style Xf
     *
     * @param 	PHPExcel_Shared_XMLWriter			$objWriter 		XML Writer
     * @param 	PHPExcel_Style						$pStyle			Style
     * @param 	PHPExcel							$pPHPExcel		Workbook
     * @throws 	PHPExcel_Writer_Exception
     */
    private function _writeCellStyleXf(\PHPExcel_Shared_XMLWriter $objWriter = \null, \PHPExcel_Style $pStyle = \null, \PHPExcel $pPHPExcel = \null)
    {
    }
    /**
     * Write Cell Style Dxf
     *
     * @param 	PHPExcel_Shared_XMLWriter 		$objWriter 		XML Writer
     * @param 	PHPExcel_Style					$pStyle			Style
     * @throws 	PHPExcel_Writer_Exception
     */
    private function _writeCellStyleDxf(\PHPExcel_Shared_XMLWriter $objWriter = \null, \PHPExcel_Style $pStyle = \null)
    {
    }
    /**
     * Write BorderPr
     *
     * @param 	PHPExcel_Shared_XMLWriter		$objWriter 		XML Writer
     * @param 	string							$pName			Element name
     * @param 	PHPExcel_Style_Border			$pBorder		Border style
     * @throws 	PHPExcel_Writer_Exception
     */
    private function _writeBorderPr(\PHPExcel_Shared_XMLWriter $objWriter = \null, $pName = 'left', \PHPExcel_Style_Border $pBorder = \null)
    {
    }
    /**
     * Write NumberFormat
     *
     * @param 	PHPExcel_Shared_XMLWriter			$objWriter 		XML Writer
     * @param 	PHPExcel_Style_NumberFormat			$pNumberFormat	Number Format
     * @param 	int									$pId			Number Format identifier
     * @throws 	PHPExcel_Writer_Exception
     */
    private function _writeNumFmt(\PHPExcel_Shared_XMLWriter $objWriter = \null, \PHPExcel_Style_NumberFormat $pNumberFormat = \null, $pId = 0)
    {
    }
    /**
     * Get an array of all styles
     *
     * @param 	PHPExcel				$pPHPExcel
     * @return 	PHPExcel_Style[]		All styles in PHPExcel
     * @throws 	PHPExcel_Writer_Exception
     */
    public function allStyles(\PHPExcel $pPHPExcel = \null)
    {
    }
    /**
     * Get an array of all conditional styles
     *
     * @param 	PHPExcel							$pPHPExcel
     * @return 	PHPExcel_Style_Conditional[]		All conditional styles in PHPExcel
     * @throws 	PHPExcel_Writer_Exception
     */
    public function allConditionalStyles(\PHPExcel $pPHPExcel = \null)
    {
    }
    /**
     * Get an array of all fills
     *
     * @param 	PHPExcel						$pPHPExcel
     * @return 	PHPExcel_Style_Fill[]		All fills in PHPExcel
     * @throws 	PHPExcel_Writer_Exception
     */
    public function allFills(\PHPExcel $pPHPExcel = \null)
    {
    }
    /**
     * Get an array of all fonts
     *
     * @param 	PHPExcel						$pPHPExcel
     * @return 	PHPExcel_Style_Font[]		All fonts in PHPExcel
     * @throws 	PHPExcel_Writer_Exception
     */
    public function allFonts(\PHPExcel $pPHPExcel = \null)
    {
    }
    /**
     * Get an array of all borders
     *
     * @param 	PHPExcel						$pPHPExcel
     * @return 	PHPExcel_Style_Borders[]		All borders in PHPExcel
     * @throws 	PHPExcel_Writer_Exception
     */
    public function allBorders(\PHPExcel $pPHPExcel = \null)
    {
    }
    /**
     * Get an array of all number formats
     *
     * @param 	PHPExcel								$pPHPExcel
     * @return 	PHPExcel_Style_NumberFormat[]		All number formats in PHPExcel
     * @throws 	PHPExcel_Writer_Exception
     */
    public function allNumberFormats(\PHPExcel $pPHPExcel = \null)
    {
    }
}
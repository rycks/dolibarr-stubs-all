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
 * PHPExcel_Writer_Excel2007_Workbook
 *
 * @category   PHPExcel
 * @package    PHPExcel_Writer_Excel2007
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_Writer_Excel2007_Workbook extends \PHPExcel_Writer_Excel2007_WriterPart
{
    /**
     * Write workbook to XML format
     *
     * @param 	PHPExcel	$pPHPExcel
     * @param	boolean		$recalcRequired	Indicate whether formulas should be recalculated before writing
     * @return 	string 		XML Output
     * @throws 	PHPExcel_Writer_Exception
     */
    public function writeWorkbook(\PHPExcel $pPHPExcel = \null, $recalcRequired = \FALSE)
    {
    }
    /**
     * Write file version
     *
     * @param 	PHPExcel_Shared_XMLWriter $objWriter 		XML Writer
     * @throws 	PHPExcel_Writer_Exception
     */
    private function _writeFileVersion(\PHPExcel_Shared_XMLWriter $objWriter = \null)
    {
    }
    /**
     * Write WorkbookPr
     *
     * @param 	PHPExcel_Shared_XMLWriter $objWriter 		XML Writer
     * @throws 	PHPExcel_Writer_Exception
     */
    private function _writeWorkbookPr(\PHPExcel_Shared_XMLWriter $objWriter = \null)
    {
    }
    /**
     * Write BookViews
     *
     * @param 	PHPExcel_Shared_XMLWriter 	$objWriter 		XML Writer
     * @param 	PHPExcel					$pPHPExcel
     * @throws 	PHPExcel_Writer_Exception
     */
    private function _writeBookViews(\PHPExcel_Shared_XMLWriter $objWriter = \null, \PHPExcel $pPHPExcel = \null)
    {
    }
    /**
     * Write WorkbookProtection
     *
     * @param 	PHPExcel_Shared_XMLWriter 	$objWriter 		XML Writer
     * @param 	PHPExcel					$pPHPExcel
     * @throws 	PHPExcel_Writer_Exception
     */
    private function _writeWorkbookProtection(\PHPExcel_Shared_XMLWriter $objWriter = \null, \PHPExcel $pPHPExcel = \null)
    {
    }
    /**
     * Write calcPr
     *
     * @param 	PHPExcel_Shared_XMLWriter	$objWriter		XML Writer
     * @param	boolean						$recalcRequired	Indicate whether formulas should be recalculated before writing
     * @throws 	PHPExcel_Writer_Exception
     */
    private function _writeCalcPr(\PHPExcel_Shared_XMLWriter $objWriter = \null, $recalcRequired = \TRUE)
    {
    }
    /**
     * Write sheets
     *
     * @param 	PHPExcel_Shared_XMLWriter 	$objWriter 		XML Writer
     * @param 	PHPExcel					$pPHPExcel
     * @throws 	PHPExcel_Writer_Exception
     */
    private function _writeSheets(\PHPExcel_Shared_XMLWriter $objWriter = \null, \PHPExcel $pPHPExcel = \null)
    {
    }
    /**
     * Write sheet
     *
     * @param 	PHPExcel_Shared_XMLWriter 	$objWriter 		XML Writer
     * @param 	string 						$pSheetname 		Sheet name
     * @param 	int							$pSheetId	 		Sheet id
     * @param 	int							$pRelId				Relationship ID
     * @param   string                      $sheetState         Sheet state (visible, hidden, veryHidden)
     * @throws 	PHPExcel_Writer_Exception
     */
    private function _writeSheet(\PHPExcel_Shared_XMLWriter $objWriter = \null, $pSheetname = '', $pSheetId = 1, $pRelId = 1, $sheetState = 'visible')
    {
    }
    /**
     * Write Defined Names
     *
     * @param 	PHPExcel_Shared_XMLWriter	$objWriter 		XML Writer
     * @param 	PHPExcel					$pPHPExcel
     * @throws 	PHPExcel_Writer_Exception
     */
    private function _writeDefinedNames(\PHPExcel_Shared_XMLWriter $objWriter = \null, \PHPExcel $pPHPExcel = \null)
    {
    }
    /**
     * Write named ranges
     *
     * @param 	PHPExcel_Shared_XMLWriter	$objWriter 		XML Writer
     * @param 	PHPExcel					$pPHPExcel
     * @throws 	PHPExcel_Writer_Exception
     */
    private function _writeNamedRanges(\PHPExcel_Shared_XMLWriter $objWriter = \null, \PHPExcel $pPHPExcel)
    {
    }
    /**
     * Write Defined Name for named range
     *
     * @param 	PHPExcel_Shared_XMLWriter	$objWriter 		XML Writer
     * @param 	PHPExcel_NamedRange			$pNamedRange
     * @throws 	PHPExcel_Writer_Exception
     */
    private function _writeDefinedNameForNamedRange(\PHPExcel_Shared_XMLWriter $objWriter = \null, \PHPExcel_NamedRange $pNamedRange)
    {
    }
    /**
     * Write Defined Name for autoFilter
     *
     * @param 	PHPExcel_Shared_XMLWriter	$objWriter 		XML Writer
     * @param 	PHPExcel_Worksheet			$pSheet
     * @param 	int							$pSheetId
     * @throws 	PHPExcel_Writer_Exception
     */
    private function _writeDefinedNameForAutofilter(\PHPExcel_Shared_XMLWriter $objWriter = \null, \PHPExcel_Worksheet $pSheet = \null, $pSheetId = 0)
    {
    }
    /**
     * Write Defined Name for PrintTitles
     *
     * @param 	PHPExcel_Shared_XMLWriter	$objWriter 		XML Writer
     * @param 	PHPExcel_Worksheet			$pSheet
     * @param 	int							$pSheetId
     * @throws 	PHPExcel_Writer_Exception
     */
    private function _writeDefinedNameForPrintTitles(\PHPExcel_Shared_XMLWriter $objWriter = \null, \PHPExcel_Worksheet $pSheet = \null, $pSheetId = 0)
    {
    }
    /**
     * Write Defined Name for PrintTitles
     *
     * @param 	PHPExcel_Shared_XMLWriter	$objWriter 		XML Writer
     * @param 	PHPExcel_Worksheet			$pSheet
     * @param 	int							$pSheetId
     * @throws 	PHPExcel_Writer_Exception
     */
    private function _writeDefinedNameForPrintArea(\PHPExcel_Shared_XMLWriter $objWriter = \null, \PHPExcel_Worksheet $pSheet = \null, $pSheetId = 0)
    {
    }
}
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
 * @package	PHPExcel_Writer_Excel2007
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license	http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version	##VERSION##, ##DATE##
 */
/**
 * PHPExcel_Writer_Excel2007_Worksheet
 *
 * @category   PHPExcel
 * @package	PHPExcel_Writer_Excel2007
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_Writer_Excel2007_Worksheet extends \PHPExcel_Writer_Excel2007_WriterPart
{
    /**
     * Write worksheet to XML format
     *
     * @param	PHPExcel_Worksheet		$pSheet
     * @param	string[]				$pStringTable
     * @param	boolean					$includeCharts	Flag indicating if we should write charts
     * @return	string					XML Output
     * @throws	PHPExcel_Writer_Exception
     */
    public function writeWorksheet($pSheet = \null, $pStringTable = \null, $includeCharts = \FALSE)
    {
    }
    /**
     * Write SheetPr
     *
     * @param	PHPExcel_Shared_XMLWriter		$objWriter		XML Writer
     * @param	PHPExcel_Worksheet				$pSheet			Worksheet
     * @throws	PHPExcel_Writer_Exception
     */
    private function _writeSheetPr(\PHPExcel_Shared_XMLWriter $objWriter = \null, \PHPExcel_Worksheet $pSheet = \null)
    {
    }
    /**
     * Write Dimension
     *
     * @param	PHPExcel_Shared_XMLWriter	$objWriter		XML Writer
     * @param	PHPExcel_Worksheet			$pSheet			Worksheet
     * @throws	PHPExcel_Writer_Exception
     */
    private function _writeDimension(\PHPExcel_Shared_XMLWriter $objWriter = \null, \PHPExcel_Worksheet $pSheet = \null)
    {
    }
    /**
     * Write SheetViews
     *
     * @param	PHPExcel_Shared_XMLWriter			$objWriter		XML Writer
     * @param	PHPExcel_Worksheet					$pSheet			Worksheet
     * @throws	PHPExcel_Writer_Exception
     */
    private function _writeSheetViews(\PHPExcel_Shared_XMLWriter $objWriter = \NULL, \PHPExcel_Worksheet $pSheet = \NULL)
    {
    }
    /**
     * Write SheetFormatPr
     *
     * @param	PHPExcel_Shared_XMLWriter $objWriter		XML Writer
     * @param	PHPExcel_Worksheet		  $pSheet			Worksheet
     * @throws	PHPExcel_Writer_Exception
     */
    private function _writeSheetFormatPr(\PHPExcel_Shared_XMLWriter $objWriter = \null, \PHPExcel_Worksheet $pSheet = \null)
    {
    }
    /**
     * Write Cols
     *
     * @param	PHPExcel_Shared_XMLWriter			$objWriter		XML Writer
     * @param	PHPExcel_Worksheet					$pSheet			Worksheet
     * @throws	PHPExcel_Writer_Exception
     */
    private function _writeCols(\PHPExcel_Shared_XMLWriter $objWriter = \null, \PHPExcel_Worksheet $pSheet = \null)
    {
    }
    /**
     * Write SheetProtection
     *
     * @param	PHPExcel_Shared_XMLWriter			$objWriter		XML Writer
     * @param	PHPExcel_Worksheet					$pSheet			Worksheet
     * @throws	PHPExcel_Writer_Exception
     */
    private function _writeSheetProtection(\PHPExcel_Shared_XMLWriter $objWriter = \null, \PHPExcel_Worksheet $pSheet = \null)
    {
    }
    /**
     * Write ConditionalFormatting
     *
     * @param	PHPExcel_Shared_XMLWriter			$objWriter		XML Writer
     * @param	PHPExcel_Worksheet					$pSheet			Worksheet
     * @throws	PHPExcel_Writer_Exception
     */
    private function _writeConditionalFormatting(\PHPExcel_Shared_XMLWriter $objWriter = \null, \PHPExcel_Worksheet $pSheet = \null)
    {
    }
    /**
     * Write DataValidations
     *
     * @param	PHPExcel_Shared_XMLWriter			$objWriter		XML Writer
     * @param	PHPExcel_Worksheet					$pSheet			Worksheet
     * @throws	PHPExcel_Writer_Exception
     */
    private function _writeDataValidations(\PHPExcel_Shared_XMLWriter $objWriter = \null, \PHPExcel_Worksheet $pSheet = \null)
    {
    }
    /**
     * Write Hyperlinks
     *
     * @param	PHPExcel_Shared_XMLWriter			$objWriter		XML Writer
     * @param	PHPExcel_Worksheet					$pSheet			Worksheet
     * @throws	PHPExcel_Writer_Exception
     */
    private function _writeHyperlinks(\PHPExcel_Shared_XMLWriter $objWriter = \null, \PHPExcel_Worksheet $pSheet = \null)
    {
    }
    /**
     * Write ProtectedRanges
     *
     * @param	PHPExcel_Shared_XMLWriter			$objWriter		XML Writer
     * @param	PHPExcel_Worksheet					$pSheet			Worksheet
     * @throws	PHPExcel_Writer_Exception
     */
    private function _writeProtectedRanges(\PHPExcel_Shared_XMLWriter $objWriter = \null, \PHPExcel_Worksheet $pSheet = \null)
    {
    }
    /**
     * Write MergeCells
     *
     * @param	PHPExcel_Shared_XMLWriter			$objWriter		XML Writer
     * @param	PHPExcel_Worksheet					$pSheet			Worksheet
     * @throws	PHPExcel_Writer_Exception
     */
    private function _writeMergeCells(\PHPExcel_Shared_XMLWriter $objWriter = \null, \PHPExcel_Worksheet $pSheet = \null)
    {
    }
    /**
     * Write PrintOptions
     *
     * @param	PHPExcel_Shared_XMLWriter			$objWriter		XML Writer
     * @param	PHPExcel_Worksheet					$pSheet			Worksheet
     * @throws	PHPExcel_Writer_Exception
     */
    private function _writePrintOptions(\PHPExcel_Shared_XMLWriter $objWriter = \null, \PHPExcel_Worksheet $pSheet = \null)
    {
    }
    /**
     * Write PageMargins
     *
     * @param	PHPExcel_Shared_XMLWriter				$objWriter		XML Writer
     * @param	PHPExcel_Worksheet						$pSheet			Worksheet
     * @throws	PHPExcel_Writer_Exception
     */
    private function _writePageMargins(\PHPExcel_Shared_XMLWriter $objWriter = \null, \PHPExcel_Worksheet $pSheet = \null)
    {
    }
    /**
     * Write AutoFilter
     *
     * @param	PHPExcel_Shared_XMLWriter				$objWriter		XML Writer
     * @param	PHPExcel_Worksheet						$pSheet			Worksheet
     * @throws	PHPExcel_Writer_Exception
     */
    private function _writeAutoFilter(\PHPExcel_Shared_XMLWriter $objWriter = \null, \PHPExcel_Worksheet $pSheet = \null)
    {
    }
    /**
     * Write PageSetup
     *
     * @param	PHPExcel_Shared_XMLWriter			$objWriter		XML Writer
     * @param	PHPExcel_Worksheet					$pSheet			Worksheet
     * @throws	PHPExcel_Writer_Exception
     */
    private function _writePageSetup(\PHPExcel_Shared_XMLWriter $objWriter = \null, \PHPExcel_Worksheet $pSheet = \null)
    {
    }
    /**
     * Write Header / Footer
     *
     * @param	PHPExcel_Shared_XMLWriter		$objWriter		XML Writer
     * @param	PHPExcel_Worksheet				$pSheet			Worksheet
     * @throws	PHPExcel_Writer_Exception
     */
    private function _writeHeaderFooter(\PHPExcel_Shared_XMLWriter $objWriter = \null, \PHPExcel_Worksheet $pSheet = \null)
    {
    }
    /**
     * Write Breaks
     *
     * @param	PHPExcel_Shared_XMLWriter		$objWriter		XML Writer
     * @param	PHPExcel_Worksheet				$pSheet			Worksheet
     * @throws	PHPExcel_Writer_Exception
     */
    private function _writeBreaks(\PHPExcel_Shared_XMLWriter $objWriter = \null, \PHPExcel_Worksheet $pSheet = \null)
    {
    }
    /**
     * Write SheetData
     *
     * @param	PHPExcel_Shared_XMLWriter		$objWriter		XML Writer
     * @param	PHPExcel_Worksheet				$pSheet			Worksheet
     * @param	string[]						$pStringTable	String table
     * @throws	PHPExcel_Writer_Exception
     */
    private function _writeSheetData(\PHPExcel_Shared_XMLWriter $objWriter = \null, \PHPExcel_Worksheet $pSheet = \null, $pStringTable = \null)
    {
    }
    /**
     * Write Cell
     *
     * @param	PHPExcel_Shared_XMLWriter	$objWriter				XML Writer
     * @param	PHPExcel_Worksheet			$pSheet					Worksheet
     * @param	PHPExcel_Cell				$pCellAddress			Cell Address
     * @param	string[]					$pStringTable			String table
     * @param	string[]					$pFlippedStringTable	String table (flipped), for faster index searching
     * @throws	PHPExcel_Writer_Exception
     */
    private function _writeCell(\PHPExcel_Shared_XMLWriter $objWriter = \null, \PHPExcel_Worksheet $pSheet = \null, $pCellAddress = \null, $pStringTable = \null, $pFlippedStringTable = \null)
    {
    }
    /**
     * Write Drawings
     *
     * @param	PHPExcel_Shared_XMLWriter	$objWriter		XML Writer
     * @param	PHPExcel_Worksheet			$pSheet			Worksheet
     * @param	boolean						$includeCharts	Flag indicating if we should include drawing details for charts
     * @throws	PHPExcel_Writer_Exception
     */
    private function _writeDrawings(\PHPExcel_Shared_XMLWriter $objWriter = \null, \PHPExcel_Worksheet $pSheet = \null, $includeCharts = \FALSE)
    {
    }
    /**
     * Write LegacyDrawing
     *
     * @param	PHPExcel_Shared_XMLWriter		$objWriter		XML Writer
     * @param	PHPExcel_Worksheet				$pSheet			Worksheet
     * @throws	PHPExcel_Writer_Exception
     */
    private function _writeLegacyDrawing(\PHPExcel_Shared_XMLWriter $objWriter = \null, \PHPExcel_Worksheet $pSheet = \null)
    {
    }
    /**
     * Write LegacyDrawingHF
     *
     * @param	PHPExcel_Shared_XMLWriter		$objWriter		XML Writer
     * @param	PHPExcel_Worksheet				$pSheet			Worksheet
     * @throws	PHPExcel_Writer_Exception
     */
    private function _writeLegacyDrawingHF(\PHPExcel_Shared_XMLWriter $objWriter = \null, \PHPExcel_Worksheet $pSheet = \null)
    {
    }
}
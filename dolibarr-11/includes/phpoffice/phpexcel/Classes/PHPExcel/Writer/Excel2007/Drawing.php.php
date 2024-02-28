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
 * PHPExcel_Writer_Excel2007_Drawing
 *
 * @category   PHPExcel
 * @package    PHPExcel_Writer_Excel2007
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_Writer_Excel2007_Drawing extends \PHPExcel_Writer_Excel2007_WriterPart
{
    /**
     * Write drawings to XML format
     *
     * @param 	PHPExcel_Worksheet	$pWorksheet
     * @param	int					&$chartRef		Chart ID
     * @param	boolean				$includeCharts	Flag indicating if we should include drawing details for charts
     * @return 	string 				XML Output
     * @throws 	PHPExcel_Writer_Exception
     */
    public function writeDrawings(\PHPExcel_Worksheet $pWorksheet = \null, &$chartRef, $includeCharts = \FALSE)
    {
    }
    /**
     * Write drawings to XML format
     *
     * @param 	PHPExcel_Shared_XMLWriter	$objWriter 		XML Writer
     * @param 	PHPExcel_Chart				$pChart
     * @param 	int							$pRelationId
     * @throws 	PHPExcel_Writer_Exception
     */
    public function _writeChart(\PHPExcel_Shared_XMLWriter $objWriter = \null, \PHPExcel_Chart $pChart = \null, $pRelationId = -1)
    {
    }
    /**
     * Write drawings to XML format
     *
     * @param 	PHPExcel_Shared_XMLWriter			$objWriter 		XML Writer
     * @param 	PHPExcel_Worksheet_BaseDrawing		$pDrawing
     * @param 	int									$pRelationId
     * @throws 	PHPExcel_Writer_Exception
     */
    public function _writeDrawing(\PHPExcel_Shared_XMLWriter $objWriter = \null, \PHPExcel_Worksheet_BaseDrawing $pDrawing = \null, $pRelationId = -1)
    {
    }
    /**
     * Write VML header/footer images to XML format
     *
     * @param 	PHPExcel_Worksheet				$pWorksheet
     * @return 	string 								XML Output
     * @throws 	PHPExcel_Writer_Exception
     */
    public function writeVMLHeaderFooterImages(\PHPExcel_Worksheet $pWorksheet = \null)
    {
    }
    /**
     * Write VML comment to XML format
     *
     * @param 	PHPExcel_Shared_XMLWriter		$objWriter 			XML Writer
     * @param	string							$pReference			Reference
     * @param 	PHPExcel_Worksheet_HeaderFooterDrawing	$pImage		Image
     * @throws 	PHPExcel_Writer_Exception
     */
    public function _writeVMLHeaderFooterImage(\PHPExcel_Shared_XMLWriter $objWriter = \null, $pReference = '', \PHPExcel_Worksheet_HeaderFooterDrawing $pImage = \null)
    {
    }
    /**
     * Get an array of all drawings
     *
     * @param 	PHPExcel							$pPHPExcel
     * @return 	PHPExcel_Worksheet_Drawing[]		All drawings in PHPExcel
     * @throws 	PHPExcel_Writer_Exception
     */
    public function allDrawings(\PHPExcel $pPHPExcel = \null)
    {
    }
}
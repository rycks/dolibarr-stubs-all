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
 * PHPExcel_Writer_Excel2007_Rels
 *
 * @category   PHPExcel
 * @package    PHPExcel_Writer_Excel2007
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_Writer_Excel2007_Rels extends \PHPExcel_Writer_Excel2007_WriterPart
{
    /**
     * Write relationships to XML format
     *
     * @param 	PHPExcel	$pPHPExcel
     * @return 	string 		XML Output
     * @throws 	PHPExcel_Writer_Exception
     */
    public function writeRelationships(\PHPExcel $pPHPExcel = \null)
    {
    }
    /**
     * Write workbook relationships to XML format
     *
     * @param 	PHPExcel	$pPHPExcel
     * @return 	string 		XML Output
     * @throws 	PHPExcel_Writer_Exception
     */
    public function writeWorkbookRelationships(\PHPExcel $pPHPExcel = \null)
    {
    }
    /**
     * Write worksheet relationships to XML format
     *
     * Numbering is as follows:
     * 	rId1 				- Drawings
     *  rId_hyperlink_x 	- Hyperlinks
     *
     * @param 	PHPExcel_Worksheet	$pWorksheet
     * @param 	int					$pWorksheetId
     * @param	boolean				$includeCharts	Flag indicating if we should write charts
     * @return 	string 				XML Output
     * @throws 	PHPExcel_Writer_Exception
     */
    public function writeWorksheetRelationships(\PHPExcel_Worksheet $pWorksheet = \null, $pWorksheetId = 1, $includeCharts = \FALSE)
    {
    }
    /**
     * Write drawing relationships to XML format
     *
     * @param 	PHPExcel_Worksheet	$pWorksheet
     * @param	int					&$chartRef		Chart ID
     * @param	boolean				$includeCharts	Flag indicating if we should write charts
     * @return 	string 				XML Output
     * @throws 	PHPExcel_Writer_Exception
     */
    public function writeDrawingRelationships(\PHPExcel_Worksheet $pWorksheet = \null, &$chartRef, $includeCharts = \FALSE)
    {
    }
    /**
     * Write header/footer drawing relationships to XML format
     *
     * @param 	PHPExcel_Worksheet			$pWorksheet
     * @return 	string 						XML Output
     * @throws 	PHPExcel_Writer_Exception
     */
    public function writeHeaderFooterDrawingRelationships(\PHPExcel_Worksheet $pWorksheet = \null)
    {
    }
    /**
     * Write Override content type
     *
     * @param 	PHPExcel_Shared_XMLWriter 	$objWriter 		XML Writer
     * @param 	int							$pId			Relationship ID. rId will be prepended!
     * @param 	string						$pType			Relationship type
     * @param 	string 						$pTarget		Relationship target
     * @param 	string 						$pTargetMode	Relationship target mode
     * @throws 	PHPExcel_Writer_Exception
     */
    private function _writeRelationship(\PHPExcel_Shared_XMLWriter $objWriter = \null, $pId = 1, $pType = '', $pTarget = '', $pTargetMode = '')
    {
    }
}
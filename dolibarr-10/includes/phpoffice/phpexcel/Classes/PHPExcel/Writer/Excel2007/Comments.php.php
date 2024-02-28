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
 * PHPExcel_Writer_Excel2007_Comments
 *
 * @category   PHPExcel
 * @package    PHPExcel_Writer_Excel2007
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_Writer_Excel2007_Comments extends \PHPExcel_Writer_Excel2007_WriterPart
{
    /**
     * Write comments to XML format
     *
     * @param 	PHPExcel_Worksheet				$pWorksheet
     * @return 	string 								XML Output
     * @throws 	PHPExcel_Writer_Exception
     */
    public function writeComments(\PHPExcel_Worksheet $pWorksheet = \null)
    {
    }
    /**
     * Write comment to XML format
     *
     * @param 	PHPExcel_Shared_XMLWriter		$objWriter 			XML Writer
     * @param	string							$pCellReference		Cell reference
     * @param 	PHPExcel_Comment				$pComment			Comment
     * @param	array							$pAuthors			Array of authors
     * @throws 	PHPExcel_Writer_Exception
     */
    public function _writeComment(\PHPExcel_Shared_XMLWriter $objWriter = \null, $pCellReference = 'A1', \PHPExcel_Comment $pComment = \null, $pAuthors = \null)
    {
    }
    /**
     * Write VML comments to XML format
     *
     * @param 	PHPExcel_Worksheet				$pWorksheet
     * @return 	string 								XML Output
     * @throws 	PHPExcel_Writer_Exception
     */
    public function writeVMLComments(\PHPExcel_Worksheet $pWorksheet = \null)
    {
    }
    /**
     * Write VML comment to XML format
     *
     * @param 	PHPExcel_Shared_XMLWriter		$objWriter 			XML Writer
     * @param	string							$pCellReference		Cell reference
     * @param 	PHPExcel_Comment				$pComment			Comment
     * @throws 	PHPExcel_Writer_Exception
     */
    public function _writeVMLComment(\PHPExcel_Shared_XMLWriter $objWriter = \null, $pCellReference = 'A1', \PHPExcel_Comment $pComment = \null)
    {
    }
}
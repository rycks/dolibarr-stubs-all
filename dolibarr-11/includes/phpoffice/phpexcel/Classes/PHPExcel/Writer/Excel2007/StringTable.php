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
 * PHPExcel_Writer_Excel2007_StringTable
 *
 * @category   PHPExcel
 * @package    PHPExcel_Writer_Excel2007
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_Writer_Excel2007_StringTable extends \PHPExcel_Writer_Excel2007_WriterPart
{
    /**
     * Create worksheet stringtable
     *
     * @param 	PHPExcel_Worksheet 	$pSheet				Worksheet
     * @param 	string[] 				$pExistingTable 	Existing table to eventually merge with
     * @return 	string[] 				String table for worksheet
     * @throws 	PHPExcel_Writer_Exception
     */
    public function createStringTable($pSheet = \null, $pExistingTable = \null)
    {
    }
    /**
     * Write string table to XML format
     *
     * @param 	string[] 	$pStringTable
     * @return 	string 		XML Output
     * @throws 	PHPExcel_Writer_Exception
     */
    public function writeStringTable($pStringTable = \null)
    {
    }
    /**
     * Write Rich Text
     *
     * @param 	PHPExcel_Shared_XMLWriter	$objWriter 		XML Writer
     * @param 	PHPExcel_RichText			$pRichText		Rich text
     * @param 	string						$prefix			Optional Namespace prefix
     * @throws 	PHPExcel_Writer_Exception
     */
    public function writeRichText(\PHPExcel_Shared_XMLWriter $objWriter = \null, \PHPExcel_RichText $pRichText = \null, $prefix = \NULL)
    {
    }
    /**
     * Write Rich Text
     *
     * @param 	PHPExcel_Shared_XMLWriter	$objWriter 		XML Writer
     * @param 	string|PHPExcel_RichText	$pRichText		text string or Rich text
     * @param 	string						$prefix			Optional Namespace prefix
     * @throws 	PHPExcel_Writer_Exception
     */
    public function writeRichTextForCharts(\PHPExcel_Shared_XMLWriter $objWriter = \null, $pRichText = \null, $prefix = \NULL)
    {
    }
    /**
     * Flip string table (for index searching)
     *
     * @param 	array	$stringTable	Stringtable
     * @return 	array
     */
    public function flipStringTable($stringTable = array())
    {
    }
}
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
 * PHPExcel_Writer_Excel2007_ContentTypes
 *
 * @category   PHPExcel
 * @package    PHPExcel_Writer_Excel2007
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_Writer_Excel2007_ContentTypes extends \PHPExcel_Writer_Excel2007_WriterPart
{
    /**
     * Write content types to XML format
     *
     * @param 	PHPExcel	$pPHPExcel
     * @param	boolean		$includeCharts	Flag indicating if we should include drawing details for charts
     * @return 	string 						XML Output
     * @throws 	PHPExcel_Writer_Exception
     */
    public function writeContentTypes(\PHPExcel $pPHPExcel = \null, $includeCharts = \FALSE)
    {
    }
    /**
     * Get image mime type
     *
     * @param 	string	$pFile	Filename
     * @return 	string	Mime Type
     * @throws 	PHPExcel_Writer_Exception
     */
    private function _getImageMimeType($pFile = '')
    {
    }
    /**
     * Write Default content type
     *
     * @param 	PHPExcel_Shared_XMLWriter 	$objWriter 		XML Writer
     * @param 	string 						$pPartname 		Part name
     * @param 	string 						$pContentType 	Content type
     * @throws 	PHPExcel_Writer_Exception
     */
    private function _writeDefaultContentType(\PHPExcel_Shared_XMLWriter $objWriter = \null, $pPartname = '', $pContentType = '')
    {
    }
    /**
     * Write Override content type
     *
     * @param 	PHPExcel_Shared_XMLWriter 	$objWriter 		XML Writer
     * @param 	string 						$pPartname 		Part name
     * @param 	string 						$pContentType 	Content type
     * @throws 	PHPExcel_Writer_Exception
     */
    private function _writeOverrideContentType(\PHPExcel_Shared_XMLWriter $objWriter = \null, $pPartname = '', $pContentType = '')
    {
    }
}
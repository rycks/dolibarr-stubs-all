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
 * @package    PHPExcel_Shared
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    ##VERSION##, ##DATE##
 */
/**
 * PHPExcel_Shared_File
 *
 * @category   PHPExcel
 * @package    PHPExcel_Shared
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_Shared_File
{
    /*
     * Use Temp or File Upload Temp for temporary files
     *
     * @protected
     * @var	boolean
     */
    protected static $_useUploadTempDirectory = \FALSE;
    /**
     * Set the flag indicating whether the File Upload Temp directory should be used for temporary files
     *
     * @param	 boolean	$useUploadTempDir		Use File Upload Temporary directory (true or false)
     */
    public static function setUseUploadTempDirectory($useUploadTempDir = \FALSE)
    {
    }
    //	function setUseUploadTempDirectory()
    /**
     * Get the flag indicating whether the File Upload Temp directory should be used for temporary files
     *
     * @return	 boolean	Use File Upload Temporary directory (true or false)
     */
    public static function getUseUploadTempDirectory()
    {
    }
    //	function getUseUploadTempDirectory()
    /**
     * Verify if a file exists
     *
     * @param 	string	$pFilename	Filename
     * @return bool
     */
    public static function file_exists($pFilename)
    {
    }
    /**
     * Returns canonicalized absolute pathname, also for ZIP archives
     *
     * @param string $pFilename
     * @return string
     */
    public static function realpath($pFilename)
    {
    }
    /**
     * Get the systems temporary directory.
     *
     * @return string
     */
    public static function sys_get_temp_dir()
    {
    }
}
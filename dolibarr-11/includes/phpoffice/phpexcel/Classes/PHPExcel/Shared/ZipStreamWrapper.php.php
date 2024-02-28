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
 * PHPExcel_Shared_ZipStreamWrapper
 *
 * @category   PHPExcel
 * @package    PHPExcel_Shared
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_Shared_ZipStreamWrapper
{
    /**
     * Internal ZipAcrhive
     *
     * @var ZipAcrhive
     */
    private $_archive;
    /**
     * Filename in ZipAcrhive
     *
     * @var string
     */
    private $_fileNameInArchive = '';
    /**
     * Position in file
     *
     * @var int
     */
    private $_position = 0;
    /**
     * Data
     *
     * @var mixed
     */
    private $_data = '';
    /**
     * Register wrapper
     */
    public static function register()
    {
    }
    /**
     * Implements support for fopen().
     *
     * @param	string	$path			resource name including scheme, e.g.
     * @param	string	$mode			only "r" is supported
     * @param	int		$options		mask of STREAM_REPORT_ERRORS and STREAM_USE_PATH
     * @param	string  &$openedPath	absolute path of the opened stream (out parameter)
     * @return	bool    true on success
     */
    public function stream_open($path, $mode, $options, &$opened_path)
    {
    }
    /**
     * Implements support for fstat().
     *
     * @return  boolean
     */
    public function statName()
    {
    }
    /**
     * Implements support for fstat().
     *
     * @return  boolean
     */
    public function url_stat()
    {
    }
    /**
     * Implements support for fstat().
     *
     * @return  boolean
     */
    public function stream_stat()
    {
    }
    /**
     * Implements support for fread(), fgets() etc.
     *
     * @param   int		$count	maximum number of bytes to read
     * @return  string
     */
    function stream_read($count)
    {
    }
    /**
     * Returns the position of the file pointer, i.e. its offset into the file
     * stream. Implements support for ftell().
     *
     * @return  int
     */
    public function stream_tell()
    {
    }
    /**
     * EOF stream
     *
     * @return	bool
     */
    public function stream_eof()
    {
    }
    /**
     * Seek stream
     *
     * @param	int		$offset	byte offset
     * @param	int		$whence	SEEK_SET, SEEK_CUR or SEEK_END
     * @return	bool
     */
    public function stream_seek($offset, $whence)
    {
    }
}
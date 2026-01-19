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
 * @package    PHPExcel_Writer_Excel5
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    ##VERSION##, ##DATE##
 */
// Original file header of PEAR::Spreadsheet_Excel_Writer_BIFFwriter (used as the base for this class):
// -----------------------------------------------------------------------------------------
// *  Module written/ported by Xavier Noguer <xnoguer@rezebra.com>
// *
// *  The majority of this is _NOT_ my code.  I simply ported it from the
// *  PERL Spreadsheet::WriteExcel module.
// *
// *  The author of the Spreadsheet::WriteExcel module is John McNamara
// *  <jmcnamara@cpan.org>
// *
// *  I _DO_ maintain this code, and John McNamara has nothing to do with the
// *  porting of this code to PHP.  Any questions directly related to this
// *  class library should be directed to me.
// *
// *  License Information:
// *
// *    Spreadsheet_Excel_Writer:  A library for generating Excel Spreadsheets
// *    Copyright (c) 2002-2003 Xavier Noguer xnoguer@rezebra.com
// *
// *    This library is free software; you can redistribute it and/or
// *    modify it under the terms of the GNU Lesser General Public
// *    License as published by the Free Software Foundation; either
// *    version 2.1 of the License, or (at your option) any later version.
// *
// *    This library is distributed in the hope that it will be useful,
// *    but WITHOUT ANY WARRANTY; without even the implied warranty of
// *    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
// *    Lesser General Public License for more details.
// *
// *    You should have received a copy of the GNU Lesser General Public
// *    License along with this library; if not, write to the Free Software
// *    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
// */
/**
 * PHPExcel_Writer_Excel5_BIFFwriter
 *
 * @category   PHPExcel
 * @package    PHPExcel_Writer_Excel5
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_Writer_Excel5_BIFFwriter
{
    /**
     * The byte order of this architecture. 0 => little endian, 1 => big endian
     * @var integer
     */
    private static $_byte_order;
    /**
     * The string containing the data of the BIFF stream
     * @var string
     */
    public $_data;
    /**
     * The size of the data in bytes. Should be the same as strlen($this->_data)
     * @var integer
     */
    public $_datasize;
    /**
     * The maximum length for a BIFF record (excluding record header and length field). See _addContinue()
     * @var integer
     * @see _addContinue()
     */
    public $_limit = 8224;
    /**
     * Constructor
     */
    public function __construct()
    {
    }
    /**
     * Determine the byte order and store it as class data to avoid
     * recalculating it for each call to new().
     *
     * @return int
     */
    public static function getByteOrder()
    {
    }
    /**
     * General storage function
     *
     * @param string $data binary data to append
     * @access private
     */
    function _append($data)
    {
    }
    /**
     * General storage function like _append, but returns string instead of modifying $this->_data
     *
     * @param string $data binary data to write
     * @return string
     */
    public function writeData($data)
    {
    }
    /**
     * Writes Excel BOF record to indicate the beginning of a stream or
     * sub-stream in the BIFF file.
     *
     * @param  integer $type Type of BIFF file to write: 0x0005 Workbook,
     *                       0x0010 Worksheet.
     * @access private
     */
    function _storeBof($type)
    {
    }
    /**
     * Writes Excel EOF record to indicate the end of a BIFF stream.
     *
     * @access private
     */
    function _storeEof()
    {
    }
    /**
     * Writes Excel EOF record to indicate the end of a BIFF stream.
     *
     * @access private
     */
    public function writeEof()
    {
    }
    /**
     * Excel limits the size of BIFF records. In Excel 5 the limit is 2084 bytes. In
     * Excel 97 the limit is 8228 bytes. Records that are longer than these limits
     * must be split up into CONTINUE blocks.
     *
     * This function takes a long BIFF record and inserts CONTINUE records as
     * necessary.
     *
     * @param  string  $data The original binary data to be written
     * @return string        A very convenient string of continue blocks
     * @access private
     */
    function _addContinue($data)
    {
    }
}
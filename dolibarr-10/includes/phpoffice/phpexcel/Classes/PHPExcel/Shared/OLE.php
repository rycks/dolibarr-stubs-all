<?php

/**
* OLE package base class.
*
* @author   Xavier Noguer <xnoguer@php.net>
* @author   Christian Schmidt <schmidt@php.net>
* @category   PHPExcel
* @package    PHPExcel_Shared_OLE
*/
class PHPExcel_Shared_OLE
{
    const OLE_PPS_TYPE_ROOT = 5;
    const OLE_PPS_TYPE_DIR = 1;
    const OLE_PPS_TYPE_FILE = 2;
    const OLE_DATA_SIZE_SMALL = 0x1000;
    const OLE_LONG_INT_SIZE = 4;
    const OLE_PPS_SIZE = 0x80;
    /**
     * The file handle for reading an OLE container
     * @var resource
     */
    public $_file_handle;
    /**
     * Array of PPS's found on the OLE container
     * @var array
     */
    public $_list = array();
    /**
     * Root directory of OLE container
     * @var OLE_PPS_Root
     */
    public $root;
    /**
     * Big Block Allocation Table
     * @var array  (blockId => nextBlockId)
     */
    public $bbat;
    /**
     * Short Block Allocation Table
     * @var array  (blockId => nextBlockId)
     */
    public $sbat;
    /**
     * Size of big blocks. This is usually 512.
     * @var  int  number of octets per block.
     */
    public $bigBlockSize;
    /**
     * Size of small blocks. This is usually 64.
     * @var  int  number of octets per block
     */
    public $smallBlockSize;
    /**
     * Reads an OLE container from the contents of the file given.
     *
     * @acces public
     * @param string $file
     * @return mixed true on success, PEAR_Error on failure
     */
    public function read($file)
    {
    }
    /**
     * @param  int  block id
     * @param  int  byte offset from beginning of file
     * @access public
     */
    public function _getBlockOffset($blockId)
    {
    }
    /**
     * Returns a stream for use with fread() etc. External callers should
     * use PHPExcel_Shared_OLE_PPS_File::getStream().
     * @param   int|PPS   block id or PPS
     * @return  resource  read-only stream
     */
    public function getStream($blockIdOrPps)
    {
    }
    /**
     * Reads a signed char.
     * @param   resource  file handle
     * @return  int
     * @access public
     */
    private static function _readInt1($fh)
    {
    }
    /**
     * Reads an unsigned short (2 octets).
     * @param   resource  file handle
     * @return  int
     * @access public
     */
    private static function _readInt2($fh)
    {
    }
    /**
     * Reads an unsigned long (4 octets).
     * @param   resource  file handle
     * @return  int
     * @access public
     */
    private static function _readInt4($fh)
    {
    }
    /**
     * Gets information about all PPS's on the OLE container from the PPS WK's
     * creates an OLE_PPS object for each one.
     *
     * @access public
     * @param  integer  the block id of the first block
     * @return mixed true on success, PEAR_Error on failure
     */
    public function _readPpsWks($blockId)
    {
    }
    /**
     * It checks whether the PPS tree is complete (all PPS's read)
     * starting with the given PPS (not necessarily root)
     *
     * @access public
     * @param integer $index The index of the PPS from which we are checking
     * @return boolean Whether the PPS tree for the given PPS is complete
     */
    public function _ppsTreeComplete($index)
    {
    }
    /**
     * Checks whether a PPS is a File PPS or not.
     * If there is no PPS for the index given, it will return false.
     *
     * @access public
     * @param integer $index The index for the PPS
     * @return bool true if it's a File PPS, false otherwise
     */
    public function isFile($index)
    {
    }
    /**
     * Checks whether a PPS is a Root PPS or not.
     * If there is no PPS for the index given, it will return false.
     *
     * @access public
     * @param integer $index The index for the PPS.
     * @return bool true if it's a Root PPS, false otherwise
     */
    public function isRoot($index)
    {
    }
    /**
     * Gives the total number of PPS's found in the OLE container.
     *
     * @access public
     * @return integer The total number of PPS's found in the OLE container
     */
    public function ppsTotal()
    {
    }
    /**
     * Gets data from a PPS
     * If there is no PPS for the index given, it will return an empty string.
     *
     * @access public
     * @param integer $index    The index for the PPS
     * @param integer $position The position from which to start reading
     *                          (relative to the PPS)
     * @param integer $length   The amount of bytes to read (at most)
     * @return string The binary string containing the data requested
     * @see OLE_PPS_File::getStream()
     */
    public function getData($index, $position, $length)
    {
    }
    /**
     * Gets the data length from a PPS
     * If there is no PPS for the index given, it will return 0.
     *
     * @access public
     * @param integer $index    The index for the PPS
     * @return integer The amount of bytes in data the PPS has
     */
    public function getDataLength($index)
    {
    }
    /**
     * Utility function to transform ASCII text to Unicode
     *
     * @access public
     * @static
     * @param string $ascii The ASCII string to transform
     * @return string The string in Unicode
     */
    public static function Asc2Ucs($ascii)
    {
    }
    /**
     * Utility function
     * Returns a string for the OLE container with the date given
     *
     * @access public
     * @static
     * @param integer $date A timestamp
     * @return string The string for the OLE container
     */
    public static function LocalDate2OLE($date = \null)
    {
    }
    /**
     * Returns a timestamp from an OLE container's date
     *
     * @access public
     * @static
     * @param integer $string A binary string with the encoded date
     * @return string The timestamp corresponding to the string
     */
    public static function OLE2LocalDate($string)
    {
    }
}
/* vim: set expandtab tabstop=4 shiftwidth=4: */
// +----------------------------------------------------------------------+
// | PHP Version 4                                                        |
// +----------------------------------------------------------------------+
// | Copyright (c) 1997-2002 The PHP Group                                |
// +----------------------------------------------------------------------+
// | This source file is subject to version 2.02 of the PHP license,      |
// | that is bundled with this package in the file LICENSE, and is        |
// | available at through the world-wide-web at                           |
// | http://www.php.net/license/2_02.txt.                                 |
// | If you did not receive a copy of the PHP license and are unable to   |
// | obtain it through the world-wide-web, please send a note to          |
// | license@php.net so we can mail you a copy immediately.               |
// +----------------------------------------------------------------------+
// | Author: Xavier Noguer <xnoguer@php.net>                              |
// | Based on OLE::Storage_Lite by Kawai, Takanori                        |
// +----------------------------------------------------------------------+
//
// $Id: OLE.php,v 1.13 2007/03/07 14:38:25 schmidt Exp $
/**
* Array for storing OLE instances that are accessed from
* OLE_ChainedBlockStream::stream_open().
* @var  array
*/
$_OLE_INSTANCES = array();
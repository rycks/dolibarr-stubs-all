<?php

namespace PhpOffice\PhpSpreadsheet\Shared;

/**
 * OLE package base class.
 *
 * @author   Xavier Noguer <xnoguer@php.net>
 * @author   Christian Schmidt <schmidt@php.net>
 *
 * @category   PhpSpreadsheet
 */
class OLE
{
    const OLE_PPS_TYPE_ROOT = 5;
    const OLE_PPS_TYPE_DIR = 1;
    const OLE_PPS_TYPE_FILE = 2;
    const OLE_DATA_SIZE_SMALL = 0x1000;
    const OLE_LONG_INT_SIZE = 4;
    const OLE_PPS_SIZE = 0x80;
    /**
     * The file handle for reading an OLE container.
     *
     * @var resource
     */
    public $_file_handle;
    /**
     * Array of PPS's found on the OLE container.
     *
     * @var array
     */
    public $_list = [];
    /**
     * Root directory of OLE container.
     *
     * @var Root
     */
    public $root;
    /**
     * Big Block Allocation Table.
     *
     * @var array (blockId => nextBlockId)
     */
    public $bbat;
    /**
     * Short Block Allocation Table.
     *
     * @var array (blockId => nextBlockId)
     */
    public $sbat;
    /**
     * Size of big blocks. This is usually 512.
     *
     * @var int number of octets per block
     */
    public $bigBlockSize;
    /**
     * Size of small blocks. This is usually 64.
     *
     * @var int number of octets per block
     */
    public $smallBlockSize;
    /**
     * Threshold for big blocks.
     *
     * @var int
     */
    public $bigBlockThreshold;
    /**
     * Reads an OLE container from the contents of the file given.
     *
     * @acces public
     *
     * @param string $file
     *
     * @throws ReaderException
     *
     * @return bool true on success, PEAR_Error on failure
     */
    public function read($file)
    {
    }
    /**
     * @param int $blockId byte offset from beginning of file
     *
     * @return int
     */
    public function _getBlockOffset($blockId)
    {
    }
    /**
     * Returns a stream for use with fread() etc. External callers should
     * use \PhpOffice\PhpSpreadsheet\Shared\OLE\PPS\File::getStream().
     *
     * @param int|OLE\PPS $blockIdOrPps block id or PPS
     *
     * @return resource read-only stream
     */
    public function getStream($blockIdOrPps)
    {
    }
    /**
     * Reads a signed char.
     *
     * @param resource $fh file handle
     *
     * @return int
     */
    private static function _readInt1($fh)
    {
    }
    /**
     * Reads an unsigned short (2 octets).
     *
     * @param resource $fh file handle
     *
     * @return int
     */
    private static function _readInt2($fh)
    {
    }
    /**
     * Reads an unsigned long (4 octets).
     *
     * @param resource $fh file handle
     *
     * @return int
     */
    private static function _readInt4($fh)
    {
    }
    /**
     * Gets information about all PPS's on the OLE container from the PPS WK's
     * creates an OLE_PPS object for each one.
     *
     * @param int $blockId the block id of the first block
     *
     * @return bool true on success, PEAR_Error on failure
     */
    public function _readPpsWks($blockId)
    {
    }
    /**
     * It checks whether the PPS tree is complete (all PPS's read)
     * starting with the given PPS (not necessarily root).
     *
     * @param int $index The index of the PPS from which we are checking
     *
     * @return bool Whether the PPS tree for the given PPS is complete
     */
    public function _ppsTreeComplete($index)
    {
    }
    /**
     * Checks whether a PPS is a File PPS or not.
     * If there is no PPS for the index given, it will return false.
     *
     * @param int $index The index for the PPS
     *
     * @return bool true if it's a File PPS, false otherwise
     */
    public function isFile($index)
    {
    }
    /**
     * Checks whether a PPS is a Root PPS or not.
     * If there is no PPS for the index given, it will return false.
     *
     * @param int $index the index for the PPS
     *
     * @return bool true if it's a Root PPS, false otherwise
     */
    public function isRoot($index)
    {
    }
    /**
     * Gives the total number of PPS's found in the OLE container.
     *
     * @return int The total number of PPS's found in the OLE container
     */
    public function ppsTotal()
    {
    }
    /**
     * Gets data from a PPS
     * If there is no PPS for the index given, it will return an empty string.
     *
     * @param int $index The index for the PPS
     * @param int $position The position from which to start reading
     *                          (relative to the PPS)
     * @param int $length The amount of bytes to read (at most)
     *
     * @return string The binary string containing the data requested
     *
     * @see OLE_PPS_File::getStream()
     */
    public function getData($index, $position, $length)
    {
    }
    /**
     * Gets the data length from a PPS
     * If there is no PPS for the index given, it will return 0.
     *
     * @param int $index The index for the PPS
     *
     * @return int The amount of bytes in data the PPS has
     */
    public function getDataLength($index)
    {
    }
    /**
     * Utility function to transform ASCII text to Unicode.
     *
     * @param string $ascii The ASCII string to transform
     *
     * @return string The string in Unicode
     */
    public static function ascToUcs($ascii)
    {
    }
    /**
     * Utility function
     * Returns a string for the OLE container with the date given.
     *
     * @param int $date A timestamp
     *
     * @return string The string for the OLE container
     */
    public static function localDateToOLE($date)
    {
    }
    /**
     * Returns a timestamp from an OLE container's date.
     *
     * @param string $oleTimestamp A binary string with the encoded date
     *
     * @throws ReaderException
     *
     * @return int The Unix timestamp corresponding to the string
     */
    public static function OLE2LocalDate($oleTimestamp)
    {
    }
}
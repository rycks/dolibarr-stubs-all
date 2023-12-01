<?php

namespace PhpOffice\PhpSpreadsheet\Shared\OLE\PPS;

/**
 * Class for creating Root PPS's for OLE containers.
 *
 * @author   Xavier Noguer <xnoguer@php.net>
 *
 * @category PhpSpreadsheet
 */
class Root extends \PhpOffice\PhpSpreadsheet\Shared\OLE\PPS
{
    /**
     * Directory for temporary files.
     *
     * @var string
     */
    protected $tempDirectory;
    /**
     * @var resource
     */
    private $fileHandle;
    /**
     * @var string
     */
    private $tempFilename;
    /**
     * @var int
     */
    private $smallBlockSize;
    /**
     * @var int
     */
    private $bigBlockSize;
    /**
     * @param int $time_1st A timestamp
     * @param int $time_2nd A timestamp
     * @param File[] $raChild
     */
    public function __construct($time_1st, $time_2nd, $raChild)
    {
    }
    /**
     * Method for saving the whole OLE container (including files).
     * In fact, if called with an empty argument (or '-'), it saves to a
     * temporary file and then outputs it's contents to stdout.
     * If a resource pointer to a stream created by fopen() is passed
     * it will be used, but you have to close such stream by yourself.
     *
     * @param resource|string $filename the name of the file or stream where to save the OLE container
     *
     * @throws WriterException
     *
     * @return bool true on success
     */
    public function save($filename)
    {
    }
    /**
     * Calculate some numbers.
     *
     * @param array $raList Reference to an array of PPS's
     *
     * @return float[] The array of numbers
     */
    public function _calcSize(&$raList)
    {
    }
    /**
     * Helper function for caculating a magic value for block sizes.
     *
     * @param int $i2 The argument
     *
     * @see save()
     *
     * @return float
     */
    private static function adjust2($i2)
    {
    }
    /**
     * Save OLE header.
     *
     * @param int $iSBDcnt
     * @param int $iBBcnt
     * @param int $iPPScnt
     */
    public function _saveHeader($iSBDcnt, $iBBcnt, $iPPScnt)
    {
    }
    /**
     * Saving big data (PPS's with data bigger than \PhpOffice\PhpSpreadsheet\Shared\OLE::OLE_DATA_SIZE_SMALL).
     *
     * @param int $iStBlk
     * @param array &$raList Reference to array of PPS's
     */
    public function _saveBigData($iStBlk, &$raList)
    {
    }
    /**
     * get small data (PPS's with data smaller than \PhpOffice\PhpSpreadsheet\Shared\OLE::OLE_DATA_SIZE_SMALL).
     *
     * @param array &$raList Reference to array of PPS's
     *
     * @return string
     */
    public function _makeSmallData(&$raList)
    {
    }
    /**
     * Saves all the PPS's WKs.
     *
     * @param array $raList Reference to an array with all PPS's
     */
    public function _savePps(&$raList)
    {
    }
    /**
     * Saving Big Block Depot.
     *
     * @param int $iSbdSize
     * @param int $iBsize
     * @param int $iPpsCnt
     */
    public function _saveBbd($iSbdSize, $iBsize, $iPpsCnt)
    {
    }
}
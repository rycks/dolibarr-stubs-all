<?php

class PHPExcel_Shared_OLERead
{
    private $data = '';
    // OLE identifier
    const IDENTIFIER_OLE = \IDENTIFIER_OLE;
    // Size of a sector = 512 bytes
    const BIG_BLOCK_SIZE = 0x200;
    // Size of a short sector = 64 bytes
    const SMALL_BLOCK_SIZE = 0x40;
    // Size of a directory entry always = 128 bytes
    const PROPERTY_STORAGE_BLOCK_SIZE = 0x80;
    // Minimum size of a standard stream = 4096 bytes, streams smaller than this are stored as short streams
    const SMALL_BLOCK_THRESHOLD = 0x1000;
    // header offsets
    const NUM_BIG_BLOCK_DEPOT_BLOCKS_POS = 0x2c;
    const ROOT_START_BLOCK_POS = 0x30;
    const SMALL_BLOCK_DEPOT_BLOCK_POS = 0x3c;
    const EXTENSION_BLOCK_POS = 0x44;
    const NUM_EXTENSION_BLOCK_POS = 0x48;
    const BIG_BLOCK_DEPOT_BLOCKS_POS = 0x4c;
    // property storage offsets (directory offsets)
    const SIZE_OF_NAME_POS = 0x40;
    const TYPE_POS = 0x42;
    const START_BLOCK_POS = 0x74;
    const SIZE_POS = 0x78;
    public $wrkbook = \null;
    public $summaryInformation = \null;
    public $documentSummaryInformation = \null;
    /**
     * Read the file
     *
     * @param $sFileName string Filename
     * @throws PHPExcel_Reader_Exception
     */
    public function read($sFileName)
    {
    }
    /**
     * Extract binary stream data
     *
     * @return string
     */
    public function getStream($stream)
    {
    }
    /**
     * Read a standard stream (by joining sectors using information from SAT)
     *
     * @param int $bl Sector ID where the stream starts
     * @return string Data for standard stream
     */
    private function _readData($bl)
    {
    }
    /**
     * Read entries in the directory stream.
     */
    private function _readPropertySets()
    {
    }
    /**
     * Read 4 bytes of data at specified position
     *
     * @param string $data
     * @param int $pos
     * @return int
     */
    private static function _GetInt4d($data, $pos)
    {
    }
}
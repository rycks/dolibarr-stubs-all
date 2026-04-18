<?php

namespace PhpOffice\PhpSpreadsheet\Shared;

class XMLWriter extends \XMLWriter
{
    public static $debugEnabled = false;
    /** Temporary storage method */
    const STORAGE_MEMORY = 1;
    const STORAGE_DISK = 2;
    /**
     * Temporary filename.
     *
     * @var string
     */
    private $tempFileName = '';
    /**
     * Create a new XMLWriter instance.
     *
     * @param int $pTemporaryStorage Temporary storage location
     * @param string $pTemporaryStorageFolder Temporary storage folder
     */
    public function __construct($pTemporaryStorage = self::STORAGE_MEMORY, $pTemporaryStorageFolder = null)
    {
    }
    /**
     * Destructor.
     */
    public function __destruct()
    {
    }
    /**
     * Get written data.
     *
     * @return string
     */
    public function getData()
    {
    }
    /**
     * Wrapper method for writeRaw.
     *
     * @param string|string[] $text
     *
     * @return bool
     */
    public function writeRawData($text)
    {
    }
}
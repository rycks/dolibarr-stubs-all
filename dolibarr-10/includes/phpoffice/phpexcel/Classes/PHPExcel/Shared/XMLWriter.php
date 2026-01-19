<?php

/**
 * PHPExcel_Shared_XMLWriter
 *
 * @category   PHPExcel
 * @package	PHPExcel_Shared
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_Shared_XMLWriter extends \XMLWriter
{
    /** Temporary storage method */
    const STORAGE_MEMORY = 1;
    const STORAGE_DISK = 2;
    /**
     * Temporary filename
     *
     * @var string
     */
    private $_tempFileName = '';
    /**
     * Create a new PHPExcel_Shared_XMLWriter instance
     *
     * @param int		$pTemporaryStorage			Temporary storage location
     * @param string	$pTemporaryStorageFolder	Temporary storage folder
     */
    public function __construct($pTemporaryStorage = self::STORAGE_MEMORY, $pTemporaryStorageFolder = \NULL)
    {
    }
    /**
     * Destructor
     */
    public function __destruct()
    {
    }
    /**
     * Get written data
     *
     * @return $data
     */
    public function getData()
    {
    }
    /**
     * Fallback method for writeRaw, introduced in PHP 5.2
     *
     * @param string $text
     * @return string
     */
    public function writeRawData($text)
    {
    }
}
\define('DEBUGMODE_ENABLED', \false);
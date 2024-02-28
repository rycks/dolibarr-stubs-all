<?php

/**
 * PHPExcel_Shared_ZipArchive
 *
 * @category   PHPExcel
 * @package    PHPExcel_Shared_ZipArchive
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_Shared_ZipArchive
{
    /**	constants */
    const OVERWRITE = 'OVERWRITE';
    const CREATE = 'CREATE';
    /**
     * Temporary storage directory
     *
     * @var string
     */
    private $_tempDir;
    /**
     * Zip Archive Stream Handle
     *
     * @var string
     */
    private $_zip;
    /**
     * Open a new zip archive
     *
     * @param	string	$fileName	Filename for the zip archive
     * @return	boolean
     */
    public function open($fileName)
    {
    }
    /**
     * Close this zip archive
     *
     */
    public function close()
    {
    }
    /**
     * Add a new file to the zip archive from a string of raw data.
     *
     * @param	string	$localname		Directory/Name of the file to add to the zip archive
     * @param	string	$contents		String of data to add to the zip archive
     */
    public function addFromString($localname, $contents)
    {
    }
    /**
     * Find if given fileName exist in archive (Emulate ZipArchive locateName())
     *
     * @param        string        $fileName        Filename for the file in zip archive
     * @return        boolean
     */
    public function locateName($fileName)
    {
    }
    /**
     * Extract file from archive by given fileName (Emulate ZipArchive getFromName())
     *
     * @param        string        $fileName        Filename for the file in zip archive
     * @return        string  $contents        File string contents
     */
    public function getFromName($fileName)
    {
    }
}
\define('PCLZIP_TEMPORARY_DIR', \PHPExcel_Shared_File::sys_get_temp_dir() . \DIRECTORY_SEPARATOR);
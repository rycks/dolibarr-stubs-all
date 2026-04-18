<?php

namespace PhpOffice\PhpSpreadsheet\Shared;

class File
{
    /**
     * Use Temp or File Upload Temp for temporary files.
     *
     * @var bool
     */
    protected static $useUploadTempDirectory = false;
    /**
     * Set the flag indicating whether the File Upload Temp directory should be used for temporary files.
     *
     * @param bool $useUploadTempDir Use File Upload Temporary directory (true or false)
     */
    public static function setUseUploadTempDirectory($useUploadTempDir)
    {
    }
    /**
     * Get the flag indicating whether the File Upload Temp directory should be used for temporary files.
     *
     * @return bool Use File Upload Temporary directory (true or false)
     */
    public static function getUseUploadTempDirectory()
    {
    }
    /**
     * Verify if a file exists.
     *
     * @param string $pFilename Filename
     *
     * @return bool
     */
    public static function fileExists($pFilename)
    {
    }
    /**
     * Returns canonicalized absolute pathname, also for ZIP archives.
     *
     * @param string $pFilename
     *
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
    public static function sysGetTempDir()
    {
    }
    /**
     * Assert that given path is an existing file and is readable, otherwise throw exception.
     *
     * @param string $filename
     *
     * @throws InvalidArgumentException
     */
    public static function assertFile($filename)
    {
    }
}
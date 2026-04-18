<?php

namespace PhpOffice\PhpSpreadsheet\Helper;

/**
 * Helper class to be used in sample code.
 */
class Sample
{
    /**
     * Returns whether we run on CLI or browser.
     *
     * @return bool
     */
    public function isCli()
    {
    }
    /**
     * Return the filename currently being executed.
     *
     * @return string
     */
    public function getScriptFilename()
    {
    }
    /**
     * Whether we are executing the index page.
     *
     * @return bool
     */
    public function isIndex()
    {
    }
    /**
     * Return the page title.
     *
     * @return string
     */
    public function getPageTitle()
    {
    }
    /**
     * Return the page heading.
     *
     * @return string
     */
    public function getPageHeading()
    {
    }
    /**
     * Returns an array of all known samples.
     *
     * @return string[] [$name => $path]
     */
    public function getSamples()
    {
    }
    /**
     * Write documents.
     *
     * @param Spreadsheet $spreadsheet
     * @param string $filename
     * @param string[] $writers
     */
    public function write(\PhpOffice\PhpSpreadsheet\Spreadsheet $spreadsheet, $filename, array $writers = ['Xlsx', 'Xls'])
    {
    }
    /**
     * Returns the temporary directory and make sure it exists.
     *
     * @return string
     */
    private function getTemporaryFolder()
    {
    }
    /**
     * Returns the filename that should be used for sample output.
     *
     * @param string $filename
     * @param string $extension
     *
     * @return string
     */
    public function getFilename($filename, $extension = 'xlsx')
    {
    }
    /**
     * Return a random temporary file name.
     *
     * @param string $extension
     *
     * @return string
     */
    public function getTemporaryFilename($extension = 'xlsx')
    {
    }
    public function log($message)
    {
    }
    /**
     * Log ending notes.
     */
    public function logEndingNotes()
    {
    }
    /**
     * Log a line about the write operation.
     *
     * @param IWriter $writer
     * @param string $path
     * @param float $callStartTime
     */
    public function logWrite(\PhpOffice\PhpSpreadsheet\Writer\IWriter $writer, $path, $callStartTime)
    {
    }
    /**
     * Log a line about the read operation.
     *
     * @param string $format
     * @param string $path
     * @param float $callStartTime
     */
    public function logRead($format, $path, $callStartTime)
    {
    }
}
<?php

namespace PhpOffice\PhpSpreadsheet;

/**
 * Factory to create readers and writers easily.
 *
 * It is not required to use this class, but it should make it easier to read and write files.
 * Especially for reading files with an unknown format.
 */
abstract class IOFactory
{
    private static $readers = ['Xlsx' => \PhpOffice\PhpSpreadsheet\Reader\Xlsx::class, 'Xls' => \PhpOffice\PhpSpreadsheet\Reader\Xls::class, 'Xml' => \PhpOffice\PhpSpreadsheet\Reader\Xml::class, 'Ods' => \PhpOffice\PhpSpreadsheet\Reader\Ods::class, 'Slk' => \PhpOffice\PhpSpreadsheet\Reader\Slk::class, 'Gnumeric' => \PhpOffice\PhpSpreadsheet\Reader\Gnumeric::class, 'Html' => \PhpOffice\PhpSpreadsheet\Reader\Html::class, 'Csv' => \PhpOffice\PhpSpreadsheet\Reader\Csv::class];
    private static $writers = ['Xls' => \PhpOffice\PhpSpreadsheet\Writer\Xls::class, 'Xlsx' => \PhpOffice\PhpSpreadsheet\Writer\Xlsx::class, 'Ods' => \PhpOffice\PhpSpreadsheet\Writer\Ods::class, 'Csv' => \PhpOffice\PhpSpreadsheet\Writer\Csv::class, 'Html' => \PhpOffice\PhpSpreadsheet\Writer\Html::class, 'Tcpdf' => \PhpOffice\PhpSpreadsheet\Writer\Pdf\Tcpdf::class, 'Dompdf' => \PhpOffice\PhpSpreadsheet\Writer\Pdf\Dompdf::class, 'Mpdf' => \PhpOffice\PhpSpreadsheet\Writer\Pdf\Mpdf::class];
    /**
     * Create Writer\IWriter.
     *
     * @param Spreadsheet $spreadsheet
     * @param string $writerType Example: Xlsx
     *
     * @throws Writer\Exception
     *
     * @return Writer\IWriter
     */
    public static function createWriter(\PhpOffice\PhpSpreadsheet\Spreadsheet $spreadsheet, $writerType)
    {
    }
    /**
     * Create Reader\IReader.
     *
     * @param string $readerType Example: Xlsx
     *
     * @throws Reader\Exception
     *
     * @return Reader\IReader
     */
    public static function createReader($readerType)
    {
    }
    /**
     * Loads Spreadsheet from file using automatic Reader\IReader resolution.
     *
     * @param string $pFilename The name of the spreadsheet file
     *
     * @throws Reader\Exception
     *
     * @return Spreadsheet
     */
    public static function load($pFilename)
    {
    }
    /**
     * Identify file type using automatic Reader\IReader resolution.
     *
     * @param string $pFilename The name of the spreadsheet file to identify
     *
     * @throws Reader\Exception
     *
     * @return string
     */
    public static function identify($pFilename)
    {
    }
    /**
     * Create Reader\IReader for file using automatic Reader\IReader resolution.
     *
     * @param string $filename The name of the spreadsheet file
     *
     * @throws Reader\Exception
     *
     * @return Reader\IReader
     */
    public static function createReaderForFile($filename)
    {
    }
    /**
     * Guess a reader type from the file extension, if any.
     *
     * @param string $filename
     *
     * @return null|string
     */
    private static function getReaderTypeFromExtension($filename)
    {
    }
    /**
     * Register a writer with its type and class name.
     *
     * @param string $writerType
     * @param string $writerClass
     */
    public static function registerWriter($writerType, $writerClass)
    {
    }
    /**
     * Register a reader with its type and class name.
     *
     * @param string $readerType
     * @param string $readerClass
     */
    public static function registerReader($readerType, $readerClass)
    {
    }
}
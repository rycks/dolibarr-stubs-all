<?php

class EscposImageTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Checking loading of an empty image - requires no libraries
     */
    public function testNoLibrariesBlank()
    {
    }
    /**
     * BMP handling not yet implemented, but these will use
     * a native PHP bitmap reader.
     * This just tests that they are not being passed on to another library.
     */
    public function testBmpBadFilename()
    {
    }
    public function testBmpBlack()
    {
    }
    public function testBmpBlackWhite()
    {
    }
    public function testBmpWhite()
    {
    }
    /**
     * GD tests - Load tiny images and check how they are printed.
     * These are skipped if you don't have gd.
     */
    public function testGdBadFilename()
    {
    }
    public function testGdBlack()
    {
    }
    public function testGdBlackTransparent()
    {
    }
    public function testGdBlackWhite()
    {
    }
    public function testGdWhite()
    {
    }
    /**
     * Imagick tests - Load tiny images and check how they are printed
     * These are skipped if you don't have imagick
     */
    public function testImagickBadFilename()
    {
    }
    public function testImagickBlack()
    {
    }
    public function testImagickBlackTransparent()
    {
    }
    public function testImagickBlackWhite()
    {
    }
    public function testImagickWhite()
    {
    }
    /**
     * Mixed test - Same as above, but confirms that each tiny image can be loaded
     * under any supported library configuration with the same results.
     * These are skipped if you don't have gd AND imagick
     */
    public function testLibraryDifferences()
    {
    }
    /**
     * PDF tests - load tiny PDF and check for well-formedness
     * These are also skipped if you don't have imagick
     * @medium
     */
    public function testPdfAllPages()
    {
    }
    public function testPdfBadFilename()
    {
    }
    /**
     * @medium
     */
    public function testPdfBadRange()
    {
    }
    /**
     * @medium
     */
    public function testPdfFirstPage()
    {
    }
    /**
     * @medium
     */
    public function testPdfMorePages()
    {
    }
    /**
     * @medium
     */
    public function testPdfSecondPage()
    {
    }
    /**
     * @medium
     */
    public function testPdfStartPastEndOfDoc()
    {
    }
    /**
     * Load an EscposImage with (optionally) certain libraries disabled and run a check.
     */
    private function loadAndCheckImg($fn, $gd, $imagick, $width, $height, $rasterFormat = \null)
    {
    }
    /**
     * Same as above, loading document and checking pages against some expected values.
     */
    private function loadAndCheckPdf($fn, array $range = \null, $width, $height, array $rasterFormat = \null)
    {
    }
    /**
     * Check image against known width, height, output.
     */
    private function checkImg(\EscposImage $img, $width, $height, $rasterFormat = \null)
    {
    }
    /**
     * Load up an EsposImage with given libraries disabled or enabled. Marks the test
     * as skipped if you ask for a library which is not loaded.
     */
    private function getMockImage($path, $gd, $imagick)
    {
    }
}
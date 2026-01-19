<?php

namespace Mike42\Escpos;

/**
 * Implementation of EscposImage using the Imagick PHP plugin.
 */
class ImagickEscposImage extends \Mike42\Escpos\EscposImage
{
    /**
     * Load actual image pixels from Imagick object
     *
     * @param Imagick $im Image to load from
     */
    public function readImageFromImagick(\Imagick $im)
    {
    }
    /**
     * @param string $filename
     *  Filename to load from
     * @param boolean $highDensityVertical
     *  True for high density output (24px lines), false for regular density (8px)
     * @return string[]|NULL
     *  Column format data as array, or NULL if optimised renderer isn't
     *  available in this implementation.
     */
    protected function getColumnFormatFromFile($filename = null, $highDensityVertical = true)
    {
    }
    /**
     * Load an image from disk, into memory, using Imagick.
     *
     * @param string|null $filename The filename to load from
     * @throws Exception if the image format is not supported,
     *  or the file cannot be opened.
     */
    protected function loadImageData($filename = null)
    {
    }
    /**
     * Return data in column format as array of slices.
     * Operates recursively to save cloning larger image many times.
     *
     * @param Imagick $im
     * @param int $lineHeight
     *          Height of printed line in dots. 8 or 24.
     * @return string[]
     */
    private function getColumnFormatFromImage(\Imagick $im, $lineHeight)
    {
    }
    /**
     * Load Imagick file from image
     *
     * @param string $filename Filename to load
     * @throws Exception Wrapped Imagick error if image can't be loaded
     * @return Imagick Loaded image
     */
    private function getImageFromFile($filename)
    {
    }
    /**
     * Pull blob (from PBM-formatted image only!), and spit out a blob or raster data.
     * Will crash out on anything which is not a valid 'P4' file.
     *
     * @param Imagick $im Image which has format PBM.
     * @return string raster data from the image
     */
    private function getRasterBlobFromImage(\Imagick $im)
    {
    }
    /**
     * @param string $filename
     *  Filename to load from
     * @return string|NULL
     *  Raster format data, or NULL if no optimised renderer is available in
     *  this implementation.
     */
    protected function getRasterFormatFromFile($filename = null)
    {
    }
    /**
     * Load a PDF for use on the printer
     *
     * @param string $pdfFile
     *  The file to load
     * @param int $pageWidth
     *  The width, in pixels, of the printer's output. The first page of the
     *  PDF will be scaled to approximately fit in this area.
     * @throws Exception Where Imagick is not loaded, or where a missing file
     *  or invalid page number is requested.
     * @return array Array of images, retrieved from the PDF file.
     */
    public static function loadPdf($pdfFile, $pageWidth = 550)
    {
    }
    /**
     * Paste image over white canvas to stip transparency reliably on different
     * versions of ImageMagick.
     *
     * There are other methods for this:
     * - flattenImages() is deprecated
     * - setImageAlphaChannel(Imagick::ALPHACHANNEL_REMOVE) is not available on
     *      ImageMagick < 6.8.
     *
     * @param Imagick $im Image to flatten
     * @return Imagick Flattened image
     */
    private static function alphaRemove(\Imagick $im)
    {
    }
}
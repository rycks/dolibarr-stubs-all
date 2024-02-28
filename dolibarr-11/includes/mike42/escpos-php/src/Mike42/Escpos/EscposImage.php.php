<?php

namespace Mike42\Escpos;

/**
 * This class deals with images in raster formats, and converts them into formats
 * which are suitable for use on thermal receipt printers. Currently, only PNG
 * images (in) and ESC/POS raster format (out) are implemeted.
 *
 * Input formats:
 *  - Currently, only PNG is supported.
 *  - Other easily read raster formats (jpg, gif) will be added at a later date, as this is not complex.
 *  - The BMP format can be directly read by some commands, but this has not yet been implemented.
 *
 * Output formats:
 *  - Currently, only ESC/POS raster format is supported
 *  - ESC/POS 'column format' support is partially implemented, but is not yet used by Escpos.php library.
 *  - Output as multiple rows of column format image is not yet in the works.
 *
 * Libraries:
 *  - Currently, php-gd is used to read the input. Support for imagemagick where gd is not installed is
 *    also not complex to add, and is a likely future feature.
 *  - Support for native use of the BMP format is a goal, for maximum compatibility with target environments.
 */
abstract class EscposImage
{
    /**
     * @var int $imgHeight
     *  height of the image.
     */
    protected $imgHeight = 0;
    /**
     * @var int $imgWidth
     *  width of the image
     */
    protected $imgWidth = 0;
    /**
     * @var string $imgData
     *  Image data in rows: 1 for black, 0 for white.
     */
    private $imgData = null;
    /**
     * @var array:string $imgColumnData
     *  Cached column-format data to avoid re-computation
     */
    private $imgColumnData = [];
    /**
     * @var string $imgRasterData
     *  Cached raster format data to avoid re-computation
     */
    private $imgRasterData = null;
    /**
     * @var string $filename
     *  Filename of image on disk - null if not loaded from disk.
     */
    private $filename = null;
    /**
     * @var boolean $allowOptimisations
     *  True to allow faster library-specific rendering shortcuts, false to always just use
     *  image libraries to read pixels (more reproducible between systems).
     */
    private $allowOptimisations = true;
    /**
     * Construct a new EscposImage.
     *
     * @param string $filename Path to image filename, or null to create an empty image.
     * @param boolean $allowOptimisations True (default) to use any library-specific tricks
     *  to speed up rendering, false to force the image to be read in pixel-by-pixel,
     *  which is easier to unit test and more reproducible between systems, but slower.
     */
    public function __construct($filename = null, $allowOptimisations = true)
    {
    }
    /**
     * @return int height of the image in pixels
     */
    public function getHeight()
    {
    }
    /**
     * @return int Number of bytes to represent a row of this image
     */
    public function getHeightBytes()
    {
    }
    /**
     * @return int Width of the image
     */
    public function getWidth()
    {
    }
    /**
     * @return int Number of bytes to represent a row of this image
     */
    public function getWidthBytes()
    {
    }
    /**
     * Output the image in raster (row) format. This can result in padding on the
     * right of the image, if its width is not divisible by 8.
     *
     * @throws Exception Where the generated data is unsuitable for the printer
     *  (indicates a bug or oversized image).
     * @return string The image in raster format.
     */
    public function toRasterFormat()
    {
    }
    /**
     * Output the image in column format.
     *
     * @param boolean $doubleDensity True for double density (24px) lines, false for single-density (8px) lines.
     * @return string[] an array, one item per line of output. All lines will be of equal size.
     */
    public function toColumnFormat($doubleDensity = false)
    {
    }
    /**
     * Load an image from disk. This default implementation always gives a zero-sized image.
     *
     * @param string|null $filename Filename to load from.
     */
    protected function loadImageData($filename = null)
    {
    }
    /**
     * Set image data.
     *
     * @param string $data Image data to use, string of 1's (black) and 0's (white) in row-major order.
     */
    protected function setImgData($data)
    {
    }
    /**
     * Set image width.
     *
     * @param int $width width of the image
     */
    protected function setImgWidth($width)
    {
    }
    /**
     * Set image height.
     *
     * @param int $height height of the image.
     */
    protected function setImgHeight($height)
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
     * Get column fromat from loaded image pixels, line by line.
     *
     * @throws Exception
     *  Where wrong number of bytes has been generated.
     * @return string
     *  Raster format data
     */
    private function getRasterFormat()
    {
    }
    /**
     * Get column fromat from loaded image pixels, line by line.
     *
     * @param boolean $highDensity
     *  True for high density output (24px lines), false for regular density (8px)
     * @return string[]
     *  Array of column format data, one item per row.
     */
    private function getColumnFormat($highDensity)
    {
    }
    /**
     * Output image in column format. Must be called once for each line of output.
     *
     * @param int $lineNo
     *  Line number to retrieve
     * @param bool $highDensity
     *  True for high density output (24px lines), false for regular density (8px)
     * @throws Exception
     *  Where wrong number of bytes has been generated.
     * @return NULL|string
     *  Column format data, or null if there is no more data (when iterating)
     */
    private function getColumnFormatLine($lineNo, $highDensity)
    {
    }
    /**
     * @return boolean True if GD is loaded, false otherwise
     */
    public static function isGdLoaded()
    {
    }
    /**
     * @return boolean True if Imagick is loaded, false otherwise
     */
    public static function isImagickLoaded()
    {
    }
    /**
     * This is a convinience method to load an image from file, auto-selecting
     * an EscposImage implementation which uses an available library.
     *
     * The sub-classes can be constructed directly if you know that you will
     * have Imagick or GD on the print server.
     *
     * @param string $filename
     *  File to load from
     * @param bool $allowOptimisations
     *  True to allow the fastest rendering shortcuts, false to force the library
     *  to read the image into an internal raster format and use PHP to render
     *  the image (slower but less fragile).
     * @param array $preferred
     *  Order to try to load libraries in- escpos-php supports pluggable image
     *  libraries. Items can be 'imagick', 'gd', 'native'.
     * @throws Exception
     *  Where no suitable library could be found for the type of file being loaded.
     * @return EscposImage
     *
     */
    public static function load($filename, $allowOptimisations = true, array $preferred = ['imagick', 'gd', 'native'])
    {
    }
}
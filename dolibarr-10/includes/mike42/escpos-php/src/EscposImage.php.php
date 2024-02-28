<?php

/**
 * escpos-php, a Thermal receipt printer library, for use with
 * ESC/POS compatible printers.
 * 
 * Copyright (c) 2014-2015 Michael Billington <michael.billington@gmail.com>,
 * 	incorporating modifications by:
 *  - Roni Saha <roni.cse@gmail.com>
 *  - Gergely Radics <gerifield@ustream.tv>
 *  - Warren Doyle <w.doyle@fuelled.co>
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 * 
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
class EscposImage
{
    /**
     * @var string The image's bitmap data (if it is a Windows BMP).
     */
    protected $imgBmpData;
    /**
     * @var string image data in rows: 1 for black, 0 for white.
     */
    protected $imgData;
    /**
     * @var string cached raster format data to avoid re-computation
     */
    protected $imgRasterData;
    /**
     * @var int height of the image
     */
    protected $imgHeight;
    /**
     * @var int width of the image
     */
    protected $imgWidth;
    /**
     * Load up an image from a filename
     * 
     * @param string $imgPath The path to the image to load, or null to skip
     * 			loading the image (some other functions are available for
     * 			populating the data). Supported graphics types depend on your PHP configuration.
     */
    public function __construct($imgPath = \null)
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
     * @return string binary data of the original file, for function which accept bitmaps.
     */
    public function getWindowsBMPData()
    {
    }
    /**
     * @return boolean True if the image was a windows bitmap, false otherwise
     */
    public function isWindowsBMP()
    {
    }
    /**
     * Load actual image pixels from GD resource.
     *
     * @param resouce $im GD resource to use
     * @throws Exception Where the image can't be read.
     */
    public function readImageFromGdResource($im)
    {
    }
    /**
     * Load actual image pixels from Imagick object
     * 
     * @param Imagick $im Image to load from
     */
    public function readImageFromImagick(\Imagick $im)
    {
    }
    /**
     * Output the image in raster (row) format. This can result in padding on the right of the image, if its width is not divisible by 8.
     * 
     * @throws Exception Where the generated data is unsuitable for the printer (indicates a bug or oversized image).
     * @return string The image in raster format.
     */
    public function toRasterFormat()
    {
    }
    /**
     * Output image in column format. This format results in padding at the base and right of the image, if its height and width are not divisible by 8.
     */
    private function toColumnFormat()
    {
    }
    /**
     * @return boolean True if GD is supported, false otherwise (a wrapper for the static version, for mocking in tests)
     */
    protected function isGdSupported()
    {
    }
    /**
     * @return boolean True if Imagick is supported, false otherwise (a wrapper for the static version, for mocking in tests)
     */
    protected function isImagickSupported()
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
     * Load a PDF for use on the printer
     *
     * @param string $pdfFile The file to load
     * @param string $pageWidth The width, in pixels, of the printer's output. The first page of the PDF will be scaled to approximately fit in this area.
     * @param array $range array indicating the first and last page (starting from 0) to load. If not set, the entire document is loaded.
     * @throws Exception Where Imagick is not loaded, or where a missing file or invalid page number is requested.
     * @return multitype:EscposImage Array of images, retrieved from the PDF file.
     */
    public static function loadPdf($pdfFile, $pageWidth = 550, array $range = \null)
    {
    }
}
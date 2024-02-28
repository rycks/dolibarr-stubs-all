<?php

//============================================================+
// File name   : tcpdf_images.php
// Version     : 1.0.005
// Begin       : 2002-08-03
// Last Update : 2014-11-15
// Author      : Nicola Asuni - Tecnick.com LTD - www.tecnick.com - info@tecnick.com
// License     : GNU-LGPL v3 (http://www.gnu.org/copyleft/lesser.html)
// -------------------------------------------------------------------
// Copyright (C) 2002-2014 Nicola Asuni - Tecnick.com LTD
//
// This file is part of TCPDF software library.
//
// TCPDF is free software: you can redistribute it and/or modify it
// under the terms of the GNU Lesser General Public License as
// published by the Free Software Foundation, either version 3 of the
// License, or (at your option) any later version.
//
// TCPDF is distributed in the hope that it will be useful, but
// WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
// See the GNU Lesser General Public License for more details.
//
// You should have received a copy of the License
// along with TCPDF. If not, see
// <http://www.tecnick.com/pagefiles/tcpdf/LICENSE.TXT>.
//
// See LICENSE.TXT file for more information.
// -------------------------------------------------------------------
//
// Description :
//   Static image methods used by the TCPDF class.
//
//============================================================+
/**
 * @file
 * This is a PHP class that contains static image methods for the TCPDF class.<br>
 * @package com.tecnick.tcpdf
 * @author Nicola Asuni
 * @version 1.0.005
 */
/**
 * @class TCPDF_IMAGES
 * Static image methods used by the TCPDF class.
 * @package com.tecnick.tcpdf
 * @brief PHP class for generating PDF documents without requiring external extensions.
 * @version 1.0.005
 * @author Nicola Asuni - info@tecnick.com
 */
class TCPDF_IMAGES
{
    /**
     * Array of hinheritable SVG properties.
     * @since 5.0.000 (2010-05-02)
     * @public static
     */
    public static $svginheritprop = array('clip-rule', 'color', 'color-interpolation', 'color-interpolation-filters', 'color-profile', 'color-rendering', 'cursor', 'direction', 'display', 'fill', 'fill-opacity', 'fill-rule', 'font', 'font-family', 'font-size', 'font-size-adjust', 'font-stretch', 'font-style', 'font-variant', 'font-weight', 'glyph-orientation-horizontal', 'glyph-orientation-vertical', 'image-rendering', 'kerning', 'letter-spacing', 'marker', 'marker-end', 'marker-mid', 'marker-start', 'pointer-events', 'shape-rendering', 'stroke', 'stroke-dasharray', 'stroke-dashoffset', 'stroke-linecap', 'stroke-linejoin', 'stroke-miterlimit', 'stroke-opacity', 'stroke-width', 'text-anchor', 'text-rendering', 'visibility', 'word-spacing', 'writing-mode');
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
    /**
     * Return the image type given the file name or array returned by getimagesize() function.
     * @param $imgfile (string) image file name
     * @param $iminfo (array) array of image information returned by getimagesize() function.
     * @return string image type
     * @since 4.8.017 (2009-11-27)
     * @public static
     */
    public static function getImageFileType($imgfile, $iminfo = array())
    {
    }
    /**
     * Set the transparency for the given GD image.
     * @param $new_image (image) GD image object
     * @param $image (image) GD image object.
     * return GD image object.
     * @since 4.9.016 (2010-04-20)
     * @public static
     */
    public static function setGDImageTransparency($new_image, $image)
    {
    }
    /**
     * Convert the loaded image to a PNG and then return a structure for the PDF creator.
     * This function requires GD library and write access to the directory defined on K_PATH_CACHE constant.
     * @param $image (image) Image object.
     * @param $tempfile (string) Temporary file name.
     * return image PNG image object.
     * @since 4.9.016 (2010-04-20)
     * @public static
     */
    public static function _toPNG($image, $tempfile)
    {
    }
    /**
     * Convert the loaded image to a JPEG and then return a structure for the PDF creator.
     * This function requires GD library and write access to the directory defined on K_PATH_CACHE constant.
     * @param $image (image) Image object.
     * @param $quality (int) JPEG quality.
     * @param $tempfile (string) Temporary file name.
     * return image JPEG image object.
     * @public static
     */
    public static function _toJPEG($image, $quality, $tempfile)
    {
    }
    /**
     * Extract info from a JPEG file without using the GD library.
     * @param $file (string) image file to parse
     * @return array structure containing the image data
     * @public static
     */
    public static function _parsejpeg($file)
    {
    }
    /**
     * Extract info from a PNG file without using the GD library.
     * @param $file (string) image file to parse
     * @return array structure containing the image data
     * @public static
     */
    public static function _parsepng($file)
    {
    }
}
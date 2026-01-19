<?php

/* Copyright (C) 2004-2010 Laurent Destailleur  <eldy@users.sourceforge.net>
 * Copyright (C) 2005-2007 Regis Houssin        <regis.houssin@inodbox.com>
 * Copyright (C) 2024-2025	MDW					<mdeweerd@users.noreply.github.com>
 * Copyright (C) 2024       Frédéric France             <frederic.france@free.fr>
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <https://www.gnu.org/licenses/>.
 * or see https://www.gnu.org/
 */
/**
 *  \file		htdocs/core/lib/images.lib.php
 *  \brief		Set of function for manipulating images
 */
// Define size of logo small and mini
// TODO Remove this and call getDefaultImageSizes() instead
$maxwidthsmall = 480;
/**
 *      Return default values for image sizes
 *
 *      @return array{maxwidthsmall:int,maxheightsmall:int,maxwidthmini:int,maxheightmini:int,quality:int}		Array of default values
 */
function getDefaultImageSizes()
{
}
/**
 *      Return if a filename is file name of a supported image format
 *
 *      @param	int		$acceptsvg	0=Default (depends on setup), 1=Always accept SVG as image files
 *      @return string				Return list of image formats
 */
function getListOfPossibleImageExt($acceptsvg = 0)
{
}
/**
 *      Return if a filename is file name of a supported image format
 *
 *      @param	string	$file       Filename
 *      @param	int		$acceptsvg	0=Default (depends on setup), 1=Always accept SVG as image files
 *      @return int         		-1=Not image filename, 0=Image filename but format not supported for conversion by PHP, 1=Image filename with format supported in conversion by this PHP
 */
function image_format_supported($file, $acceptsvg = 0)
{
}
/**
 *    	Return size of image file on disk (Supported extensions are gif, jpg, png, bmp and webp)
 *
 * 		@param	string	$file		Full path name of file
 * 		@param	bool	$url		Image with url (true or false)
 * 		@return	array{width:int,height:int}|array{}|array{width:'',height:''}	array('width'=>width, 'height'=>height)
 */
function dol_getImageSize($file, $url = \false)
{
}
/**
 *  Resize or crop an image file (Supported extensions are gif, jpg, png, bmp and webp)
 *
 *  @param	string	$file          	Path of source file to resize/crop
 * 	@param	int		$mode			0=Resize, 1=Crop
 *  @param  int		$newWidth      	Largeur maximum que dois faire l'image destination (0=keep ratio)
 *  @param  int		$newHeight     	Hauteur maximum que dois faire l'image destination (0=keep ratio)
 * 	@param	int		$src_x			Position of croping image in source image (not use if mode=0)
 * 	@param	int		$src_y			Position of croping image in source image (not use if mode=0)
 * 	@param	string	$filetowrite	Path of file to write (overwrite source file if not provided)
 *  @param	int		$newquality		Value for the new quality of image, for supported format (use 0 for maximum/unchanged).
 *	@return	string                  File name if OK, error message if KO
 *	@see dol_convert_file()
 */
function dol_imageResizeOrCrop($file, $mode, $newWidth, $newHeight, $src_x = 0, $src_y = 0, $filetowrite = '', $newquality = 0)
{
}
/**
 * dolRotateImage if image is a jpg file.
 * Currently use an autodetection to know if we can rotate.
 * TODO Introduce a new parameter to force rotate.
 *
 * @param 	string   $file_path      Full path to image to rotate
 * @return	boolean				     Success or not
 */
function dolRotateImage($file_path)
{
}
/**
 * Add exif orientation correction for image
 *
 * @param string $fileSource Full path to source image to rotate
 * @param string|bool|null $fileDest string : Full path to image to rotate | false return gd img  | null  the raw image stream will be outputted directly
 * @param int<-1,100> $quality output image quality
 * @return bool : true on success or false on failure or gd img if $fileDest is false.
 */
function correctExifImageOrientation($fileSource, $fileDest, $quality = 95)
{
}
/**
 *    	Create a thumbnail from an image file (Supported extensions are gif, jpg, png and bmp).
 *      If file is myfile.jpg, new file may be myfile_small.jpg. But extension may differs if original file has a format and an extension
 *      of another one, like a.jpg file when real format is png.
 *
 *    	@param     string	$file           	Path of source file to resize
 *    	@param     int		$maxWidth       	Maximum width of the thumbnail (-1=unchanged, 160 by default)
 *    	@param     int		$maxHeight      	Maximum height of the thumbnail (-1=unchanged, 120 by default)
 *    	@param     string	$extName        	Extension to differentiate thumb file name ('_small', '_mini')
 *    	@param     int		$quality        	Quality after compression (0=worst so better compression, 100=best so low or no compression)
 *      @param     string	$outdir           	Directory where to store thumb
 *      @param     int		$targetformat     	New format of target (IMAGETYPE_GIF, IMAGETYPE_JPG, IMAGETYPE_PNG, IMAGETYPE_BMP, IMAGETYPE_WBMP ... or 0 to keep original format)
 *    	@return    string|int<0,0>				Full path of thumb or '' if it fails or 'Error...' if it fails, or 0 if it fails to detect the type of image
 */
function vignette($file, $maxWidth = 160, $maxHeight = 120, $extName = '_small', $quality = 50, $outdir = 'thumbs', $targetformat = 0)
{
}
/**
 * Beautify an image by adding a link edit and delete on image
 *
 * @param	string		$htmlid			ID of HTML img tag
 * @param	string		$urledit		URL to submit to edit Image
 * @param	string		$urldelete		URL to call when deleting the image
 * @return	string						HTML and JS code to manage the update/delete of image.
 */
function imgAddEditDeleteButton($htmlid, $urledit, $urldelete)
{
}
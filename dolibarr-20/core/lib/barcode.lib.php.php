<?php

/* Copyright (C) 2004-2016 Laurent Destailleur     <eldy@users.sourceforge.net>
 * Copyright (C) 2024		Frédéric France				<frederic.france@free.fr>
 * Copyright (C) 2004-2010 Folke Ashberg: Some lines of code were inspired from work
 * Copyright (C) 2024		MDW							<mdeweerd@users.noreply.github.com>
 *                         of Folke Ashberg into PHP-Barcode 0.3pl2, available as GPL
 *                         source code at http://www.ashberg.de/bar.
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
 */
/**
 *	\file       htdocs/core/lib/barcode.lib.php
 *	\brief      Set of functions used for barcode generation (internal lib, also code 'phpbarcode')
 *	\ingroup    core
 */
/* ******************************************************************** */
/*                          COLORS                                      */
/* ******************************************************************** */
$bar_color = array(0, 0, 0);
/**
 * Print barcode
 *
 * @param	string	       	$code			Code
 * @param	string	       	$encoding		Encoding ('EAN13', 'ISBN', 'C128', 'UPC', 'CBR', 'QRCODE', 'DATAMATRIX', 'ANY'...)
 * @param	int<1,max>     	$scale			Scale
 * @param	string	       	$mode			'png', 'gif', 'jpg', 'jpeg' ...
 * @param	string			$filebarcode	Filename to store barcode image file if defined
 * @return	array{encoding:string,bars:string,text:string}|string   $bars		array('encoding': the encoding which has been used, 'bars': the bars, 'text': text-positioning info) or string with error message
 */
function barcode_print($code, $encoding = "ANY", $scale = 2, $mode = "png", $filebarcode = '')
{
}
/**
 * Encodes $code with $encoding using genbarcode OR built-in encoder if you don't have genbarcode only EAN-13/ISBN or UPC is possible
 *
 * You can use the following encodings (when you have genbarcode):
 *   ANY    choose best-fit (default)
 *   EAN    8 or 13 EAN-Code
 *   UPC    12-digit EAN
 *   ISBN   isbn numbers (still EAN-13)
 *   39     code 39
 *   128    code 128 (a,b,c: autoselection)
 *   128C   code 128 (compact form for digits)
 *   128B   code 128, full printable ascii
 *   I25    interleaved 2 of 5 (only digits)
 *   128RAW Raw code 128 (by Leonid A. Broukhis)
 *   CBR    Codabar (by Leonid A. Broukhis)
 *   MSI    MSI (by Leonid A. Broukhis)
 *   PLS    Plessey (by Leonid A. Broukhis)
 *
 * @param	string	$code		Code
 * @param	string	$encoding	Encoding
 * @return	array{encoding:string,bars:string,text:string}|false			array('encoding': the encoding which has been used, 'bars': the bars, 'text': text-positioning info)
 */
function barcode_encode($code, $encoding)
{
}
/**
 * Calculate EAN sum
 *
 * @param	string	$ean	EAN to encode
 * @return	int<0,9>		EAN Sum
 */
function barcode_gen_ean_sum($ean)
{
}
/**
 * Generate EAN bars
 *
 * @param	string	$ean	EAN to encode
 * @return	string			Encoded EAN
 */
function barcode_gen_ean_bars($ean)
{
}
/**
 * Encode EAN
 *
 * @param	string	$ean		Code
 * @param	string	$encoding	Encoding
 * @return	array{encoding:string,bars:string,text:string,error:string}|array{text:string,error:string}	array('encoding': the encoding which has been used, 'bars': the bars, 'text': text-positioning info, 'error': error message if error)
 */
function barcode_encode_ean($ean, $encoding = "EAN-13")
{
}
/**
 * Encode UPC
 *
 * @param	string	$upc		Code
 * @param	string	$encoding	Encoding
 * @return	array{encoding:string,bars:string,text:string,error:string}|array{text:string,error:string}	array('encoding': the encoding which has been used, 'bars': the bars, 'text': text-positioning info, 'error': error message if error)
 */
function barcode_encode_upc($upc, $encoding = "UPC")
{
}
/**
 * Encode result of genbarcode command
 *
 * @param	string	$code		Code
 * @param	string	$encoding	Encoding
 * @return	array{encoding:string,bars:string,text:string}|false			array('encoding': the encoding which has been used, 'bars': the bars, 'text': text-positioning info)
 */
function barcode_encode_genbarcode($code, $encoding)
{
}
/**
 * Output image onto standard output, or onto disk if $filebarcode is defined
 *
 * @param	string		$text			the text-line (<position>:<font-size>:<character> ...)
 * @param	string		$bars   		where to place the bars  (<space-width><bar-width><space-width><bar-width>...)
 * @param	int<1,max>	$scale			scale factor ( 1 < scale < unlimited (scale 50 will produce 5400x300 pixels when using EAN-13!!!))
 * @param	string		$mode   		Mime 'png', 'gif', 'jpg', 'jpeg' (default='png') or file disk if empty.
 * @param	int			$total_y		the total height of the image ( default: scale * 60 )
 * @param	array{}|array{top:int,bottom:int,left:int,right:int}	$space		default:  $space[top]   = 2 * $scale; $space[bottom]= 2 * $scale;  $space[left]  = 2 * $scale;  $space[right] = 2 * $scale;
 * @param	string		$filebarcode	Filename to store barcode image file
 * @return	void
 */
function barcode_outimage($text, $bars, $scale = 1, $mode = "png", $total_y = 0, $space = [], $filebarcode = '')
{
}
/**
 * Check if EAN13 code is valid
 *
 * @param string $ean	Code
 * @return bool
 */
function isAValidEAN13($ean)
{
}
<?php

/* Copyright (C) 2008-2011 Laurent Destailleur  <eldy@users.sourceforge.net>
 * Copyright (C) 2024		MDW						<mdeweerd@users.noreply.github.com>
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
 *  \file       htdocs/core/lib/xcal.lib.php
 *  \brief      Function to manage calendar files (vcal/ical/...)
 */
/**
 *	Build a file from an array of events
 *  All input params and data must be encoded in $conf->charset_output
 *
 *  @param      string  $format             "vcal" or "ical"
 *  @param      string  $title              Title of export
 *  @param      string  $desc               Description of export
 *  @param      array<string,WebsitePage|array{uid:string,startdate:int,summary:string,desc:string,url?:?string,author:string,category?:?string,image?:?string,content?:?string}>	$events_array       Array of events ("uid","startdate","summary","url","desc","author","category","image") or Array of WebsitePage
 *  @param      string  $outputfile         Output file
 *  @return     int                         Return integer < 0 if KO, Nb of events in file if OK
 */
function build_calfile($format, $title, $desc, $events_array, $outputfile)
{
}
/**
 *  Build a file from an array of events.
 *  All input data must be encoded in $conf->charset_output
 *
 *  @param      string	$format             "rss"
 *  @param      string	$title              Title of export
 *  @param      string	$desc               Description of export
 *  @param      array<WebsitePage|array{uid:string,startdate:int,summary:string,desc:string,url?:?string,author:string,category?:?string,image?:?string,content?:?string}>	$events_array       Array of events ("uid","startdate","summary","url","desc","author","category","image") or Array of WebsitePage
 *  @param      string	$outputfile         Output file
 *  @param      string	$filter             (optional) Filter
 *  @param		string	$url				Url (If empty, forge URL for agenda RSS export)
 *  @param		string	$langcode			Language code to show in header
 *  @return     int                         Return integer < 0 if KO, Nb of events in file if OK
 */
function build_rssfile($format, $title, $desc, $events_array, $outputfile, $filter = '', $url = '', $langcode = '')
{
}
/**
 *  Encode for cal export
 *
 *  @param      string  $format     "vcal" or "ical"
 *  @param      string  $string     String to encode
 *  @return     string              String encoded
 */
function format_cal($format, $string)
{
}
/**
 *  Cut string after 75 chars. Add CRLF+Space.
 *  line must be encoded in UTF-8
 *
 *  @param      string    $line     String to convert
 *  @return     string              String converted
 */
function calEncode($line)
{
}
/**
 *  Encode into vcal format
 *
 *  @param      string  $str        String to convert
 *  @param      int     $forcal     (optional) 1 = For cal
 *  @return     string              String converted
 */
function quotedPrintEncode($str, $forcal = 0)
{
}
/**
 *  Decode vcal format
 *
 *  @param      string  $str    String to convert
 *  @return     string          String converted
 */
function quotedPrintDecode($str)
{
}
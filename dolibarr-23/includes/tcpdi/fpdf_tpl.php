<?php

//
//  FPDF_TPL - Version 1.2.3
//
//    Copyright 2004-2013 Setasign - Jan Slabon
//
//  Licensed under the Apache License, Version 2.0 (the "License");
//  you may not use this file except in compliance with the License.
//  You may obtain a copy of the License at
//
//      http://www.apache.org/licenses/LICENSE-2.0
//
//  Unless required by applicable law or agreed to in writing, software
//  distributed under the License is distributed on an "AS IS" BASIS,
//  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
//  See the License for the specific language governing permissions and
//  limitations under the License.
//
class FPDF_TPL extends \FPDF
{
    /**
     * Array of Tpl-Data
     * @var array
     */
    var $tpls = array();
    /**
     * Current Template-ID
     * @var int
     */
    var $tpl = 0;
    /**
     * "In Template"-Flag
     * @var boolean
     */
    var $_intpl = \false;
    /**
     * Nameprefix of Templates used in Resources-Dictonary
     * @var string A String defining the Prefix used as Template-Object-Names. Have to beginn with an /
     */
    var $tplprefix = "/TPL";
    /**
     * Resources used By Templates and Pages
     * @var array
     */
    var $_res = array();
    /**
     * Last used Template data
     *
     * @var array
     */
    var $lastUsedTemplateData = array();
    /**
     * Start a Template
     *
     * This method starts a template. You can give own coordinates to build an own sized
     * Template. Pay attention, that the margins are adapted to the new templatesize.
     * If you want to write outside the template, for example to build a clipped Template,
     * you have to set the Margins and "Cursor"-Position manual after beginTemplate-Call.
     *
     * If no parameter is given, the template uses the current page-size.
     * The Method returns an ID of the current Template. This ID is used later for using this template.
     * Warning: A created Template is used in PDF at all events. Still if you don't use it after creation!
     *
     * @param int $x The x-coordinate given in user-unit
     * @param int $y The y-coordinate given in user-unit
     * @param int $w The width given in user-unit
     * @param int $h The height given in user-unit
     * @return int The ID of new created Template
     */
    function beginTemplate($x = \null, $y = \null, $w = \null, $h = \null)
    {
    }
    /**
     * End Template
     *
     * This method ends a template and reset initiated variables on beginTemplate.
     *
     * @return mixed If a template is opened, the ID is returned. If not a false is returned.
     */
    function endTemplate()
    {
    }
    /**
     * Use a Template in current Page or other Template
     *
     * You can use a template in a page or in another template.
     * You can give the used template a new size like you use the Image()-method.
     * All parameters are optional. The width or height is calculated automaticaly
     * if one is given. If no parameter is given the origin size as defined in
     * beginTemplate() is used.
     * The calculated or used width and height are returned as an array.
     *
     * @param int $tplidx A valid template-Id
     * @param int $_x The x-position
     * @param int $_y The y-position
     * @param int $_w The new width of the template
     * @param int $_h The new height of the template
     * @retrun array The height and width of the template
     */
    function useTemplate($tplidx, $_x = \null, $_y = \null, $_w = 0, $_h = 0)
    {
    }
    /**
     * Get The calculated Size of a Template
     *
     * If one size is given, this method calculates the other one.
     *
     * @param int $tplidx A valid template-Id
     * @param int $_w The width of the template
     * @param int $_h The height of the template
     * @return array The height and width of the template
     */
    function getTemplateSize($tplidx, $_w = 0, $_h = 0)
    {
    }
    /**
     * See FPDF/TCPDF-Documentation ;-)
     */
    public function SetFont($family, $style = '', $size = 0, $fontfile = '', $subset = 'default', $out = \true)
    {
    }
    /**
     * See FPDF/TCPDF-Documentation ;-)
     */
    function Image($file, $x = '', $y = '', $w = 0, $h = 0, $type = '', $link = '', $align = '', $resize = \false, $dpi = 300, $palign = '', $ismask = \false, $imgmask = \false, $border = 0, $fitbox = \false, $hidden = \false, $fitonpage = \false, $alt = \false, $altimgs = array())
    {
    }
    /**
     * See FPDF-Documentation ;-)
     *
     * AddPage is not available when you're "in" a template.
     */
    function AddPage($orientation = '', $format = '', $keepmargins = \false, $tocpage = \false)
    {
    }
    /**
     * Preserve adding Links in Templates ...won't work
     */
    function Link($x, $y, $w, $h, $link, $spaces = 0)
    {
    }
    function AddLink()
    {
    }
    function SetLink($link, $y = 0, $page = -1)
    {
    }
    /**
     * Private Method that writes the form xobjects
     */
    function _putformxobjects()
    {
    }
    /**
     * Overwritten to add _putformxobjects() after _putimages()
     *
     */
    function _putimages()
    {
    }
    function _putxobjectdict()
    {
    }
    /**
     * Private Method
     */
    function _out($s)
    {
    }
}
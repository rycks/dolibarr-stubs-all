<?php

/* Copyright (C) 2006-2008 Laurent Destailleur  <eldy@users.sourceforge.net>
 * Copyright (C) 2021 Gaëtan MAISON <gm@ilad.org>
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
 *       \file       htdocs/core/class/doleditor.class.php
 *       \brief      Class to manage a WYSIWYG editor
 */
/**
 *      Class to manage a WYSIWYG editor.
 *		Usage: $doleditor=new DolEditor('body',$message,320,'toolbar_mailing');
 *		       $doleditor->Create();
 */
class DolEditor
{
    public $tool;
    // Store the selected tool
    // If using fckeditor
    public $editor;
    // If not using fckeditor
    public $content;
    public $htmlname;
    public $toolbarname;
    public $toolbarstartexpanded;
    public $rows;
    public $cols;
    public $height;
    public $width;
    public $uselocalbrowser;
    public $readonly;
    public $posx;
    public $posy;
    /**
     *  Create an object to build an HTML area to edit a large string content
     *
     *  @param 	string	$htmlname		        		HTML name of WYSIWIG field
     *  @param 	string	$content		        		Content of WYSIWIG field
     *  @param	int		$width							Width in pixel of edit area (auto by default)
     *  @param 	int		$height			       		 	Height in pixel of edit area (200px by default)
     *  @param 	string	$toolbarname	       		 	Name of bar set to use ('Full', 'dolibarr_notes[_encoded]', 'dolibarr_details[_encoded]'=the less featured, 'dolibarr_mailings[_encoded]', 'dolibarr_readonly').
     *  @param  string	$toolbarlocation       			Where bar is stored :
     *                       		                    'In' = each window has its own toolbar
     *                              		            'Out:name' = share toolbar into the div called 'name'
     *  @param  boolean	$toolbarstartexpanded  			Bar is visible or not at start
     *  @param	boolean|int		$uselocalbrowser		Enabled to add links to local object with local browser. If false, only external images can be added in content.
     *  @param  boolean|string	$okforextendededitor    True=Allow usage of extended editor tool if qualified (like ckeditor). If 'textarea', force use of simple textarea. If 'ace', force use of Ace.
     *                                                  Warning: If you use 'ace', don't forget to also include ace.js in page header. Also, the button "save" must have class="buttonforacesave".
     *  @param  int		$rows                   		Size of rows for textarea tool
     *  @param  string	$cols                   		Size of cols for textarea tool (textarea number of cols '70' or percent 'x%')
     *  @param	int		$readonly						0=Read/Edit, 1=Read only
     *  @param	array	$poscursor						Array for initial cursor position array('x'=>x, 'y'=>y)
     */
    public function __construct($htmlname, $content, $width = '', $height = 200, $toolbarname = 'Basic', $toolbarlocation = 'In', $toolbarstartexpanded = \false, $uselocalbrowser = 1, $okforextendededitor = \true, $rows = 0, $cols = 0, $readonly = 0, $poscursor = array())
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Output edit area inside the HTML stream.
     *	Output depends on this->tool (fckeditor, ckeditor, textarea, ...)
     *
     *  @param	int		$noprint             1=Return HTML string instead of printing it to output
     *  @param	string	$morejs		         Add more js. For example: ".on( \'saveSnapshot\', function(e) { alert(\'ee\'); });". Used by CKEditor only.
     *  @param  boolean $disallowAnyContent  Disallow to use any content. true=restrict to a predefined list of allowed elements. Used by CKEditor only.
     *  @param	string	$titlecontent		 Show title content before editor area. Used by ACE editor only.
     *  @param	string	$option				 For ACE editor, set the source language ('html', 'php', 'javascript', ...)
     *  @param	string	$moreparam			 Add extra tags to the textarea
     *  @param	string	$morecss			 Add extra css to the textarea
     *  @return	void|string
     */
    public function Create($noprint = 0, $morejs = '', $disallowAnyContent = \true, $titlecontent = '', $option = '', $moreparam = '', $morecss = '')
    {
    }
}
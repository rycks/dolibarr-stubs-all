<?php

/* Copyright (C) 2008-2013	Laurent Destailleur	<eldy@users.sourceforge.net>
 * Copyright (C) 2010-2014	Regis Houssin		<regis.houssin@inodbox.com>
 * Copyright (C) 2010-2016	Juanjo Menent		<jmenent@2byte.es>
 * Copyright (C) 2013		Charles-Fr BENKE	<charles.fr@benke.fr>
 * Copyright (C) 2013		Cédric Salvador		<csalvador@gpcsolutions.fr>
 * Copyright (C) 2014		Marcos García		<marcosgdf@gmail.com>
 * Copyright (C) 2015		Bahfir Abbes		<bafbes@gmail.com>
 * Copyright (C) 2016-2017	Ferran Marcet		<fmarcet@2byte.es>
 * Copyright (C) 2019-2022  Frédéric France     <frederic.france@netlogic.fr>
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
 *	\file       htdocs/core/class/html.formfile.class.php
 *  \ingroup    core
 *	\brief      File of class to offer components to list and upload files
 */
/**
 *	Class to offer components to list and upload files
 */
class FormFile
{
    private $db;
    /**
     * @var string Error code (or message)
     */
    public $error;
    public $numoffiles;
    public $infofiles;
    // Used to return informations by function getDocumentsLink
    /**
     *	Constructor
     *
     *  @param		DoliDB		$db      Database handler
     */
    public function __construct($db)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Show form to upload a new file.
     *
     *  @param  string		$url			Url
     *  @param  string		$title			Title zone (Title or '' or 'none')
     *  @param  int			$addcancel		1=Add 'Cancel' button
     *	@param	int			$sectionid		If upload must be done inside a particular ECM section (is sectionid defined, sectiondir must not be)
     * 	@param	int			$perm			Value of permission to allow upload
     *  @param  int			$size          	Length of input file area. Deprecated.
     *  @param	Object		$object			Object to use (when attachment is done on an element)
     *  @param	string		$options		Add an option column
     *  @param  integer     $useajax        Use fileupload ajax (0=never, 1=if enabled, 2=always whatever is option).
     *                                      Deprecated 2 should never be used and if 1 is used, option should not be enabled.
     *  @param	string		$savingdocmask	Mask to use to define output filename. For example 'XXXXX-__YYYYMMDD__-__file__'
     *  @param	integer		$linkfiles		1=Also add form to link files, 0=Do not show form to link files
     *  @param	string		$htmlname		Name and id of HTML form ('formuserfile' by default, 'formuserfileecm' when used to upload a file in ECM)
     *  @param	string		$accept			Specifies the types of files accepted (This is not a security check but an user interface facility. eg '.pdf,image/*' or '.png,.jpg' or 'video/*')
     *	@param	string		$sectiondir		If upload must be done inside a particular directory (if sectiondir defined, sectionid must not be)
     *  @param  int         $usewithoutform 0=Default, 1=Disable <form> and <input hidden> to use in existing form area, 2=Disable the tag <form> only
     *  @param	int			$capture		1=Add tag capture="capture" to force use of micro or video recording to generate file. When setting this to 1, you must also provide a value for $accept.
     *  @param	int			$disablemulti	0=Default, 1=Disable multiple file upload
     *  @param	int			$nooutput		0=Output result with print, 1=Return result
     * 	@return	int|string					<0 if KO, >0 if OK, or string if $noouput=1
     */
    public function form_attach_new_file($url, $title = '', $addcancel = 0, $sectionid = 0, $perm = 1, $size = 50, $object = '', $options = '', $useajax = 1, $savingdocmask = '', $linkfiles = 1, $htmlname = 'formuserfile', $accept = '', $sectiondir = '', $usewithoutform = 0, $capture = 0, $disablemulti = 0, $nooutput = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *      Show the box with list of available documents for object
     *
     *      @param      string				$modulepart         propal, facture, facture_fourn, ...
     *      @param      string				$modulesubdir       Sub-directory to scan (Example: '0/1/10', 'FA/DD/MM/YY/9999'). Use '' if file is not into subdir of module.
     *      @param      string				$filedir            Directory to scan
     *      @param      string				$urlsource          Url of origin page (for return)
     *      @param      int					$genallowed         Generation is allowed (1/0 or array of formats)
     *      @param      int					$delallowed         Remove is allowed (1/0)
     *      @param      string				$modelselected      Model to preselect by default
     *      @param      integer				$allowgenifempty	Show warning if no model activated
     *      @param      integer				$forcenomultilang	Do not show language option (even if MAIN_MULTILANGS defined)
     *      @param      int					$iconPDF            Show only PDF icon with link (1/0)
     * 		@param		int					$notused	        Not used
     * 		@param		integer				$noform				Do not output html form tags
     * 		@param		string				$param				More param on http links
     * 		@param		string				$title				Title to show on top of form
     * 		@param		string				$buttonlabel		Label on submit button
     * 		@param		string				$codelang			Default language code to use on lang combo box if multilang is enabled
     * 		@return		int										<0 if KO, number of shown files if OK
     *      @deprecated                                         Use print xxx->showdocuments() instead.
     */
    public function show_documents($modulepart, $modulesubdir, $filedir, $urlsource, $genallowed, $delallowed = 0, $modelselected = '', $allowgenifempty = 1, $forcenomultilang = 0, $iconPDF = 0, $notused = 0, $noform = 0, $param = '', $title = '', $buttonlabel = '', $codelang = '')
    {
    }
    /**
     *      Return a string to show the box with list of available documents for object.
     *      This also set the property $this->numoffiles
     *
     *      @param      string				$modulepart         Module the files are related to ('propal', 'facture', 'facture_fourn', 'mymodule', 'mymodule:MyObject', 'mymodule_temp', ...)
     *      @param      string				$modulesubdir       Existing (so sanitized) sub-directory to scan (Example: '0/1/10', 'FA/DD/MM/YY/9999'). Use '' if file is not into a subdir of module.
     *      @param      string				$filedir            Directory to scan (must not end with a /). Example: '/mydolibarrdocuments/facture/FAYYMM-1234'
     *      @param      string				$urlsource          Url of origin page (for return)
     *      @param      int|string[]        $genallowed         Generation is allowed (1/0 or array list of templates)
     *      @param      int					$delallowed         Remove is allowed (1/0)
     *      @param      string				$modelselected      Model to preselect by default
     *      @param      integer				$allowgenifempty	Allow generation even if list of template ($genallowed) is empty (show however a warning)
     *      @param      integer				$forcenomultilang	Do not show language option (even if MAIN_MULTILANGS defined)
     *      @param      int					$iconPDF            Deprecated, see getDocumentsLink
     * 		@param		int					$notused	        Not used
     * 		@param		integer				$noform				Do not output html form tags
     * 		@param		string				$param				More param on http links
     * 		@param		string				$title				Title to show on top of form. Example: '' (Default to "Documents") or 'none'
     * 		@param		string				$buttonlabel		Label on submit button
     * 		@param		string				$codelang			Default language code to use on lang combo box if multilang is enabled
     * 		@param		string				$morepicto			Add more HTML content into cell with picto
     *      @param      Object              $object             Object when method is called from an object card.
     *      @param		int					$hideifempty		Hide section of generated files if there is no file
     *      @param      string              $removeaction       (optional) The action to remove a file
     *      @param		string				$tooltipontemplatecombo		Text to show on a tooltip after the combo list of templates
     * 		@return		string              					Output string with HTML array of documents (might be empty string)
     */
    public function showdocuments($modulepart, $modulesubdir, $filedir, $urlsource, $genallowed, $delallowed = 0, $modelselected = '', $allowgenifempty = 1, $forcenomultilang = 0, $iconPDF = 0, $notused = 0, $noform = 0, $param = '', $title = '', $buttonlabel = '', $codelang = '', $morepicto = '', $object = \null, $hideifempty = 0, $removeaction = 'remove_file', $tooltipontemplatecombo = '')
    {
    }
    /**
     *	Show a Document icon with link(s)
     *  You may want to call this into a div like this:
     *  print '<div class="inline-block valignmiddle">'.$formfile->getDocumentsLink($element_doc, $filename, $filedir).'</div>';
     *
     *	@param	string	$modulepart		'propal', 'facture', 'facture_fourn', ...
     *	@param	string	$modulesubdir	Sub-directory to scan (Example: '0/1/10', 'FA/DD/MM/YY/9999'). Use '' if file is not into subdir of module.
     *	@param	string	$filedir		Full path to directory to scan
     *  @param	string	$filter			Filter filenames on this regex string (Example: '\.pdf$')
     *  @param	string	$morecss		Add more css to the download picto
     *  @param	string	$allfiles		0=Only generated docs, 1=All files
     *	@return	string              	Output string with HTML link of documents (might be empty string). This also fill the array ->infofiles
     */
    public function getDocumentsLink($modulepart, $modulesubdir, $filedir, $filter = '', $morecss = 'valignmiddle', $allfiles = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Show list of documents in $filearray (may be they are all in same directory but may not)
     *  This also sync database if $upload_dir is defined.
     *
     *  @param	 array	$filearray          Array of files loaded by dol_dir_list('files') function before calling this.
     * 	@param	 Object	$object				Object on which document is linked to.
     * 	@param	 string	$modulepart			Value for modulepart used by download or viewimage wrapper.
     * 	@param	 string	$param				Parameters on sort links (param must start with &, example &aaa=bbb&ccc=ddd)
     * 	@param	 int	$forcedownload		Force to open dialog box "Save As" when clicking on file.
     * 	@param	 string	$relativepath		Relative path of docs (autodefined if not provided), relative to module dir, not to MAIN_DATA_ROOT.
     * 	@param	 int	$permonobject		Permission on object (so permission to delete or crop document)
     * 	@param	 int	$useinecm			Change output for use in ecm module:
     * 										0 or 6: Add a preview column. Show also a rename button. Show also a crop button for some values of $modulepart (must be supported into hard coded list in this function + photos_resize.php + restrictedArea + checkUserAccessToObject)
     * 										1: Add link to edit ECM entry
     * 										2: Add rename and crop link
     *                                      4: Add a preview column
     *                                      5: Add link to edit ECM entry and Add a preview column
     * 	@param	 string	$textifempty		Text to show if filearray is empty ('NoFileFound' if not defined)
     *  @param   int	$maxlength          Maximum length of file name shown.
     *  @param	 string	$title				Title before list. Use 'none' to disable title.
     *  @param	 string $url				Full url to use for click links ('' = autodetect)
     *  @param	 int	$showrelpart		0=Show only filename (default), 1=Show first level 1 dir
     *  @param   int    $permtoeditline     Permission to edit document line (You must provide a value, -1 is deprecated and must not be used any more)
     *  @param   string $upload_dir         Full path directory so we can know dir relative to MAIN_DATA_ROOT. Fill this to complete file data with database indexes.
     *  @param   string $sortfield          Sort field ('name', 'size', 'position', ...)
     *  @param   string $sortorder          Sort order ('ASC' or 'DESC')
     *  @param   int    $disablemove        1=Disable move button, 0=Position move is possible.
     *  @param	 int	$addfilterfields	Add the line with filters
     *  @param	 int	$disablecrop		Disable crop feature on images (-1 = auto, prefer to set it explicitely to 0 or 1)
     *  @param	 string	$moreattrondiv		More attributes on the div for responsive. Example 'style="height:280px; overflow: auto;"'
     * 	@return	 int						<0 if KO, nb of files shown if OK
     *  @see list_of_autoecmfiles()
     */
    public function list_of_documents($filearray, $object, $modulepart, $param = '', $forcedownload = 0, $relativepath = '', $permonobject = 1, $useinecm = 0, $textifempty = '', $maxlength = 0, $title = '', $url = '', $showrelpart = 0, $permtoeditline = -1, $upload_dir = '', $sortfield = '', $sortorder = 'ASC', $disablemove = 1, $addfilterfields = 0, $disablecrop = -1, $moreattrondiv = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Show list of documents in a directory of ECM module.
     *
     *  @param	string	$upload_dir         Directory that was scanned. This directory will contains files into subdirs REF/files
     *  @param  array	$filearray          Array of files loaded by dol_dir_list function before calling this function
     *  @param  string	$modulepart         Value for modulepart used by download wrapper. Value can be $object->table_name (that is 'myobject' or 'mymodule_myobject') or $object->element.'-'.$module (for compatibility purpose)
     *  @param  string	$param              Parameters on sort links
     *  @param  int		$forcedownload      Force to open dialog box "Save As" when clicking on file
     *  @param  string	$relativepath       Relative path of docs (autodefined if not provided)
     *  @param  int		$permissiontodelete       Permission to delete
     *  @param  int		$useinecm           Change output for use in ecm module
     *  @param  int		$textifempty        Text to show if filearray is empty
     *  @param  int		$maxlength          Maximum length of file name shown
     *  @param	string 	$url				Full url to use for click links ('' = autodetect)
     *  @param	int		$addfilterfields	Add line with filters
     *  @return int                 		<0 if KO, nb of files shown if OK
     *  @see list_of_documents()
     */
    public function list_of_autoecmfiles($upload_dir, $filearray, $modulepart, $param, $forcedownload = 0, $relativepath = '', $permissiontodelete = 1, $useinecm = 0, $textifempty = '', $maxlength = 0, $url = '', $addfilterfields = 0)
    {
    }
    /**
     * Show array with linked files
     *
     * @param 	Object		$object			Object
     * @param 	int			$permissiontodelete	Deletion is allowed
     * @param 	string		$action			Action
     * @param 	string		$selected		???
     * @param	string		$param			More param to add into URL
     * @return 	int							Number of links
     */
    public function listOfLinks($object, $permissiontodelete = 1, $action = \null, $selected = \null, $param = '')
    {
    }
    /**
     * Show detail icon with link for preview
     *
     * @param   array     $file           Array with data of file. Example: array('name'=>...)
     * @param   string    $modulepart     propal, facture, facture_fourn, ...
     * @param   string    $relativepath   Relative path of docs
     * @param   integer   $ruleforpicto   Rule for picto: 0=Use the generic preview picto, 1=Use the picto of mime type of file). Use a negative value to show a generic picto even if preview not available.
     * @param	string	  $param		  More param on http links
     * @return  string    $out            Output string with HTML
     */
    public function showPreview($file, $modulepart, $relativepath, $ruleforpicto = 0, $param = '')
    {
    }
}
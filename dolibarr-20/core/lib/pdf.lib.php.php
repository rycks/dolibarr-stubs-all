<?php

/**
 *  Return array head with list of tabs to view object information.
 *
 *  @return	array   	        head array with tabs
 */
function pdf_admin_prepare_head()
{
}
/**
 *	Return array with format properties of default PDF format
 *
 *	@param		Translate|null	$outputlangs		Output lang to use to autodetect output format if we need 'auto' detection
 *  @param		string			$mode				'setup' = Use setup, 'auto' = Force autodetection whatever is setup
 *  @return     array								Array('width'=>w,'height'=>h,'unit'=>u);
 */
function pdf_getFormat(\Translate $outputlangs = \null, $mode = 'setup')
{
}
/**
 *      Return a PDF instance object. We create a FPDI instance that instantiate TCPDF.
 *
 *      @param	string		$format         Array(width,height). Keep empty to use default setup.
 *      @param	string		$metric         Unit of format ('mm')
 *      @param  string		$pagetype       'P' or 'l'
 *      @return TCPDF|TCPDI					PDF object
 */
function pdf_getInstance($format = '', $metric = 'mm', $pagetype = 'P')
{
}
/**
 * Return if pdf file is protected/encrypted
 *
 * @param   string		$pathoffile		Path of file
 * @return  boolean     			    True or false
 */
function pdf_getEncryption($pathoffile)
{
}
/**
 *      Return font name to use for PDF generation
 *
 *      @param	Translate	$outputlangs    Output langs object
 *      @return string          			Name of font to use
 */
function pdf_getPDFFont($outputlangs)
{
}
/**
 *      Return font size to use for PDF generation
 *
 *      @param	Translate	$outputlangs     Output langs object
 *      @return int				             Size of font to use
 */
function pdf_getPDFFontSize($outputlangs)
{
}
/**
 * Return height to use for Logo onto PDF
 *
 * @param	string		$logo		Full path to logo file to use
 * @param	bool		$url		Image with url (true or false)
 * @return	int|float
 */
function pdf_getHeightForLogo($logo, $url = \false)
{
}
/**
 * Function to try to calculate height of a HTML Content
 *
 * @param 	TCPDF     $pdf				PDF initialized object
 * @param 	string    $htmlcontent		HTML Content
 * @return 	int							Height
 * @see getStringHeight()
 */
function pdfGetHeightForHtmlContent(&$pdf, $htmlcontent)
{
}
/**
 * Returns the name of the thirdparty
 *
 * @param   Societe|Contact     $thirdparty     Contact or thirdparty
 * @param   Translate           $outputlangs    Output language
 * @param   int                 $includealias   1=Include alias name after name
 * @return  string                              String with name of thirdparty (+ alias if requested)
 */
function pdfBuildThirdpartyName($thirdparty, \Translate $outputlangs, $includealias = 0)
{
}
/**
 *   	Return a string with full address formatted for output on PDF documents
 *
 * 		@param	Translate	          $outputlangs		    Output langs object
 *   	@param  Societe		          $sourcecompany		Source company object
 *   	@param  Societe|string|null   $targetcompany		Target company object
 *      @param  Contact|string|null	  $targetcontact	    Target contact object
 * 		@param	int			          $usecontact		    Use contact instead of company
 * 		@param	string  	          $mode				    Address type ('source', 'target', 'targetwithdetails', 'targetwithdetails_xxx': target but include also phone/fax/email/url)
 *      @param  Object|null           $object               Object we want to build document for
 * 		@return	string|int				    		        String with full address or -1 if KO
 */
function pdf_build_address($outputlangs, $sourcecompany, $targetcompany = '', $targetcontact = '', $usecontact = 0, $mode = 'source', $object = \null)
{
}
/**
 *   	Show header of page for PDF generation
 *
 *   	@param      TCPDF		$pdf     		Object PDF
 *      @param      Translate	$outputlangs	Object lang for output
 * 		@param		int			$page_height	Height of page
 *      @return	void
 */
function pdf_pagehead(&$pdf, $outputlangs, $page_height)
{
}
/**
 *	Return array of possible substitutions for PDF content (without external module substitutions).
 *
 *	@param	Translate	    $outputlangs	Output language
 *	@param	array|null	    $exclude        Array of family keys we want to exclude. For example array('mycompany', 'object', 'date', 'user', ...)
 *	@param	Object|null     $object         Object
 *	@param	int             $onlykey       	1=Do not calculate some heavy values of keys (performance enhancement when we need only the keys), 2=Values are truncated and html sanitized (to use for help tooltip)
 *  @param  array|null      $include        Array of family keys we want to include. For example array('system', 'mycompany', 'object', 'objectamount', 'date', 'user', ...)
 *	@return	array						Array of substitutions
 */
function pdf_getSubstitutionArray($outputlangs, $exclude = \null, $object = \null, $onlykey = 0, $include = \null)
{
}
/**
 *      Add a draft watermark on PDF files
 *
 *      @param	TCPDF      	$pdf            Object PDF
 *      @param  Translate	$outputlangs	Object lang
 *      @param  int		    $h		        Height of PDF
 *      @param  int		    $w		        Width of PDF
 *      @param  string	    $unit           Unit of height (mm, pt, ...)
 *      @param  string		$text           Text to show
 *      @return	void
 */
function pdf_watermark(&$pdf, $outputlangs, $h, $w, $unit, $text)
{
}
/**
 *  Show bank information for PDF generation
 *
 *  @param	TCPDF		$pdf            		Object PDF
 *  @param  Translate	$outputlangs     		Object lang
 *  @param  int			$curx            		X
 *  @param  int			$cury            		Y
 *  @param  Account		$account         		Bank account object
 *  @param  int			$onlynumber      		Output only number (bank+desk+key+number according to country, but without name of bank and address)
 *  @param	int			$default_font_size		Default font size
 *  @return	float                               The Y PDF position
 */
function pdf_bank(&$pdf, $outputlangs, $curx, $cury, $account, $onlynumber = 0, $default_font_size = 10)
{
}
/**
 *  Show footer of page for PDF generation
 *
 *	@param	TCPDF		$pdf     		The PDF factory
 *  @param  Translate	$outputlangs	Object lang for output
 * 	@param	string		$paramfreetext	Constant name of free text
 * 	@param	Societe		$fromcompany	Object company
 * 	@param	int			$marge_basse	Margin bottom we use for the autobreak
 * 	@param	int			$marge_gauche	Margin left (no more used)
 * 	@param	int			$page_hauteur	Page height
 * 	@param	Object		$object			Object shown in PDF
 * 	@param	int			$showdetails	Show company address details into footer (0=Nothing, 1=Show address, 2=Show managers, 3=Both)
 *  @param	int			$hidefreetext	1=Hide free text, 0=Show free text
 *  @param	int			$page_largeur	Page width
 *  @param	string		$watermark		Watermark text to print on page
 * 	@return	int							Return height of bottom margin including footer text
 */
function pdf_pagefoot(&$pdf, $outputlangs, $paramfreetext, $fromcompany, $marge_basse, $marge_gauche, $page_hauteur, $object, $showdetails = 0, $hidefreetext = 0, $page_largeur = 0, $watermark = '')
{
}
/**
 *	Show linked objects for PDF generation
 *
 *	@param	TCPDF			$pdf				Object PDF
 *	@param	object		$object				Object
 *	@param  Translate	$outputlangs		Object lang
 *	@param  int			$posx				X
 *	@param  int			$posy				Y
 *	@param	float		$w					Width of cells. If 0, they extend up to the right margin of the page.
 *	@param	float		$h					Cell minimum height. The cell extends automatically if needed.
 *	@param	int			$align				Align
 *	@param	string		$default_font_size	Font size
 *	@return	float                           The Y PDF position
 */
function pdf_writeLinkedObjects(&$pdf, $object, $outputlangs, $posx, $posy, $w, $h, $align, $default_font_size)
{
}
/**
 *	Output line description into PDF
 *
 *  @param  TCPDF			$pdf               	PDF object
 *	@param	Object			$object				Object
 *	@param	int				$i					Current line number
 *  @param  Translate		$outputlangs		Object lang for output
 *  @param  int				$w					Width
 *  @param  int				$h					Height
 *  @param  int				$posx				Pos x
 *  @param  int				$posy				Pos y
 *  @param  int				$hideref       		Hide reference
 *  @param  int				$hidedesc           Hide description
 * 	@param	int				$issupplierline		Is it a line for a supplier object ?
 *  @param	string			$align				text alignment ('L', 'C', 'R', 'J' (default))
 * 	@return	string
 */
function pdf_writelinedesc(&$pdf, $object, $i, $outputlangs, $w, $h, $posx, $posy, $hideref = 0, $hidedesc = 0, $issupplierline = 0, $align = 'J')
{
}
/**
 *  Return line description translated in outputlangs and encoded into htmlentities and with <br>
 *
 *  @param  Object		$object              Object
 *  @param  int			$i                   Current line number (0 = first line, 1 = second line, ...)
 *  @param  Translate	$outputlangs         Object langs for output
 *  @param  int			$hideref             Hide reference
 *  @param  int			$hidedesc            Hide description
 *  @param  int			$issupplierline      Is it a line for a supplier object ?
 *  @return string       				     String with line
 */
function pdf_getlinedesc($object, $i, $outputlangs, $hideref = 0, $hidedesc = 0, $issupplierline = 0)
{
}
/**
 *	Return line num
 *
 *	@param	Object		$object				Object
 *	@param	int			$i					Current line number
 *  @param  Translate	$outputlangs		Object langs for output
 *  @param	int			$hidedetails		Hide details (0=no, 1=yes, 2=just special lines)
 * 	@return	string
 */
function pdf_getlinenum($object, $i, $outputlangs, $hidedetails = 0)
{
}
/**
 *	Return line product ref
 *
 *	@param	Object		$object				Object
 *	@param	int			$i					Current line number
 *  @param  Translate	$outputlangs		Object langs for output
 *  @param	int			$hidedetails		Hide details (0=no, 1=yes, 2=just special lines)
 * 	@return	string
 */
function pdf_getlineref($object, $i, $outputlangs, $hidedetails = 0)
{
}
/**
 *	Return line ref_supplier
 *
 *	@param	Object		$object				Object
 *	@param	int			$i					Current line number
 *  @param  Translate	$outputlangs		Object langs for output
 *  @param	int			$hidedetails		Hide details (0=no, 1=yes, 2=just special lines)
 * 	@return	string
 */
function pdf_getlineref_supplier($object, $i, $outputlangs, $hidedetails = 0)
{
}
/**
 *	Return line vat rate
 *
 *	@param	Object		$object				Object
 *	@param	int			$i					Current line number
 *  @param  Translate	$outputlangs		Object langs for output
 *  @param	int			$hidedetails		Hide details (0=no, 1=yes, 2=just special lines)
 * 	@return	string
 */
function pdf_getlinevatrate($object, $i, $outputlangs, $hidedetails = 0)
{
}
/**
 *	Return line unit price excluding tax
 *
 *	@param	Object		$object				Object
 *	@param	int			$i					Current line number
 *  @param  Translate	$outputlangs		Object langs for output
 *  @param	int			$hidedetails		Hide details (0=no, 1=yes, 2=just special lines)
 * 	@return	string
 */
function pdf_getlineupexcltax($object, $i, $outputlangs, $hidedetails = 0)
{
}
/**
 *	Return line unit price including tax
 *
 *	@param	Object		$object				Object
 *	@param	int			$i					Current line number
 *  @param  Translate	$outputlangs		Object langs for output
 *  @param	int			$hidedetails		Hide value (0 = no,	1 = yes, 2 = just special lines)
 *  @return	string
 */
function pdf_getlineupwithtax($object, $i, $outputlangs, $hidedetails = 0)
{
}
/**
 *	Return line quantity
 *
 *	@param	Object		$object				Object
 *	@param	int			$i					Current line number
 *  @param  Translate	$outputlangs		Object langs for output
 *  @param	int			$hidedetails		Hide details (0=no, 1=yes, 2=just special lines)
 *  @return	string
 */
function pdf_getlineqty($object, $i, $outputlangs, $hidedetails = 0)
{
}
/**
 *	Return line quantity asked
 *
 *	@param	Object		$object				Object
 *	@param	int			$i					Current line number
 *  @param  Translate	$outputlangs		Object langs for output
 *  @param	int			$hidedetails		Hide details (0=no, 1=yes, 2=just special lines)
 * 	@return	string
 */
function pdf_getlineqty_asked($object, $i, $outputlangs, $hidedetails = 0)
{
}
/**
 *	Return line quantity shipped
 *
 *	@param	Object		$object				Object
 *	@param	int			$i					Current line number
 *  @param  Translate	$outputlangs		Object langs for output
 *  @param	int			$hidedetails		Hide details (0=no, 1=yes, 2=just special lines)
 * 	@return	string
 */
function pdf_getlineqty_shipped($object, $i, $outputlangs, $hidedetails = 0)
{
}
/**
 *	Return line keep to ship quantity
 *
 *	@param	Object		$object				Object
 *	@param	int			$i					Current line number
 *  @param  Translate	$outputlangs		Object langs for output
 *  @param	int			$hidedetails		Hide details (0=no, 1=yes, 2=just special lines)
 * 	@return	string
 */
function pdf_getlineqty_keeptoship($object, $i, $outputlangs, $hidedetails = 0)
{
}
/**
 *	Return line unit
 *
 *	@param	Object		$object				Object
 *	@param	int			$i					Current line number
 *  @param  Translate	$outputlangs		Object langs for output
 *  @param	int			$hidedetails		Hide details (0=no, 1=yes, 2=just special lines)
 *  @return	string							Value for unit cell
 */
function pdf_getlineunit($object, $i, $outputlangs, $hidedetails = 0)
{
}
/**
 *	Return line remise percent
 *
 *	@param	Object		$object				Object
 *	@param	int			$i					Current line number
 *  @param  Translate	$outputlangs		Object langs for output
 *  @param	int			$hidedetails		Hide details (0=no, 1=yes, 2=just special lines)
 * 	@return	string
 */
function pdf_getlineremisepercent($object, $i, $outputlangs, $hidedetails = 0)
{
}
/**
 * Return line percent
 *
 * @param Object                $object             Object
 * @param int                   $i                  Current line number
 * @param Translate             $outputlangs        Object langs for output
 * @param int                   $hidedetails        Hide details (0=no, 1=yes, 2=just special lines)
 * @param HookManager|null      $hookmanager        Hook manager instance
 * @return string
 */
function pdf_getlineprogress($object, $i, $outputlangs, $hidedetails = 0, $hookmanager = \null)
{
}
/**
 *	Return line total excluding tax
 *
 *	@param	Object		$object				Object
 *	@param	int			$i					Current line number
 *  @param  Translate	$outputlangs		Object langs for output
 *  @param	int			$hidedetails		Hide details (0=no, 1=yes, 2=just special lines)
 * 	@return	string							Return total of line excl tax
 */
function pdf_getlinetotalexcltax($object, $i, $outputlangs, $hidedetails = 0)
{
}
/**
 *	Return line total including tax
 *
 *	@param	Object		$object				Object
 *	@param	int			$i					Current line number
 *  @param 	Translate	$outputlangs		Object langs for output
 *  @param	int			$hidedetails		Hide value (0 = no, 1 = yes, 2 = just special lines)
 *  @return	string							Return total of line incl tax
 */
function pdf_getlinetotalwithtax($object, $i, $outputlangs, $hidedetails = 0)
{
}
/**
 * 	Return linked objects to use for document generation.
 *  Warning: To save space, this function returns only one link per link type (all links are concated on same record string). This function is used by pdf_writeLinkedObjects
 *
 * 	@param	CommonObject	$object			Object
 * 	@param	Translate		$outputlangs	Object lang for output
 * 	@return	array                       	Linked objects
 */
function pdf_getLinkedObjects(&$object, $outputlangs)
{
}
/**
 * Return dimensions to use for images onto PDF checking that width and height are not higher than
 * maximum (16x32 by default).
 *
 * @param	string		$realpath		Full path to photo file to use
 * @return	array						Height and width to use to output image (in pdf user unit, so mm)
 */
function pdf_getSizeForImage($realpath)
{
}
/**
 *	Return line total amount discount
 *
 *	@param	CommonObject	$object				Object
 *	@param	int				$i					Current line number
 *  @param  Translate		$outputlangs		Object langs for output
 *  @param	int				$hidedetails		Hide details (0=no, 1=yes, 2=just special lines)
 * 	@return	float|string						Return total of line excl tax
 */
function pdfGetLineTotalDiscountAmount($object, $i, $outputlangs, $hidedetails = 0)
{
}
<?php

/**
 *  Return array head with list of tabs to view object information.
 *
 *  @return	array<array{0:string,1:string,2:string}>	head array with tabs
 */
function pdf_admin_prepare_head()
{
}
/**
 *	Return array with format properties of default PDF format
 *
 *	@param		?Translate		$outputlangs		Output lang to use to autodetect output format if we need 'auto' detection
 *  @param		'setup'|'auto'	$mode				'setup' = Use setup, 'auto' = Force autodetection whatever is setup
 *  @return     array{width:float|int,height:float|int,unit:string}		Array('width'=>w,'height'=>h,'unit'=>u);
 */
function pdf_getFormat($outputlangs = \null, $mode = 'setup')
{
}
/**
 *      Return a PDF instance object. We create a FPDI instance that instantiate TCPDF.
 *
 *      @param	array{float|int,float|int}|array{}|''	$format	Array(width,height). Keep empty to use default setup.
 *      @param	string		$metric         Unit of format ('mm')
 *      @param  'P'|'l'		$pagetype       'P' or 'l'
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
 * Function to try to calculate height of a HTML Content.
 * WARNING: Do not use this function inside a TCPDF transaction.
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
 * @param   int<0,1>            $includealias   1=Include alias name after name
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
 *      @param  ?CommonObject         $object               Object we want to build document for
 * 		@return	string|int				    		        String with full address or -1 if KO
 */
function pdf_build_address($outputlangs, $sourcecompany, $targetcompany = '', $targetcontact = '', $usecontact = 0, $mode = 'source', $object = \null)
{
}
/**
 *   	Show header of page for PDF generation
 *
 *   	@param	TCPDF		$pdf     		Object PDF
 *      @param	Translate	$outputlangs	Object lang for output
 * 		@param	float		$page_height	Height of page
 *      @return	void
 */
function pdf_pagehead(&$pdf, $outputlangs, $page_height)
{
}
/**
 *	Return array of possible substitutions for PDF content (without external module substitutions).
 *
 *	@param	Translate	    $outputlangs	Output language
 *	@param	null|string[]	$exclude        Array of family keys we want to exclude. For example array('mycompany', 'object', 'date', 'user', ...)
 *	@param	?Object			$object         Object
 *	@param	int<0,2>        $onlykey       	1=Do not calculate some heavy values of keys (performance enhancement when we need only the keys), 2=Values are truncated and html sanitized (to use for help tooltip)
 *  @param  null|string[]	$include        Array of family keys we want to include. For example array('system', 'mycompany', 'object', 'objectamount', 'date', 'user', ...)
 *	@return	array<string,string>			Array of substitutions
 */
function pdf_getSubstitutionArray($outputlangs, $exclude = \null, $object = \null, $onlykey = 0, $include = \null)
{
}
/**
 *      Add a draft watermark on PDF files
 *
 *      @param	TCPDF      	$pdf            Object PDF
 *      @param  Translate	$outputlangs	Object lang
 *      @param  float	    $h		        Height of PDF
 *      @param  float	    $w		        Width of PDF
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
 *  @param  float		$curx            		X
 *  @param  float		$cury            		Y
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
 * 	@param	?Societe	$fromcompany	Object company
 * 	@param	float		$marge_basse	Margin bottom we use for the autobreak
 * 	@param	float		$marge_gauche	Margin left (no more used)
 * 	@param	float		$page_hauteur	Page height
 * 	@param	CommonObject	$object			Object shown in PDF
 * 	@param	int<0,3>	$showdetails	Show company address details into footer (0=Nothing, 1=Show address, 2=Show managers, 3=Both)
 *  @param	int			$hidefreetext	1=Hide free text, 0=Show free text
 *  @param	float		$page_largeur	Page width
 *  @param	string		$watermark		Watermark text to print on page
 * 	@return	int							Return height of bottom margin including footer text
 */
function pdf_pagefoot(&$pdf, $outputlangs, $paramfreetext, $fromcompany, $marge_basse, $marge_gauche, $page_hauteur, $object, $showdetails = 0, $hidefreetext = 0, $page_largeur = 0, $watermark = '')
{
}
/**
 *	Show linked objects for PDF generation
 *
 *	@param	TCPDF		$pdf				Object PDF
 *	@param	CommonObject	$object				Object
 *	@param  Translate	$outputlangs		Object lang
 *	@param  float			$posx				X
 *	@param  float			$posy				Y
 *	@param	float		$w					Width of cells. If 0, they extend up to the right margin of the page.
 *	@param	float		$h					Cell minimum height. The cell extends automatically if needed.
 *	@param	string		$align				Align
 *	@param	float		$default_font_size	Font size
 *	@return	float                           The Y PDF position
 */
function pdf_writeLinkedObjects(&$pdf, $object, $outputlangs, $posx, $posy, $w, $h, $align, $default_font_size)
{
}
/**
 *	Output line description into PDF
 *
 *  @param  TCPDF			$pdf               	PDF object
 *	@param	CommonObject	$object				Object
 *	@param	int				$i					Current line number
 *  @param  Translate		$outputlangs		Object lang for output
 *  @param  float			$w					Width
 *  @param  float			$h					Height
 *  @param  float			$posx				Pos x
 *  @param  float			$posy				Pos y
 *  @param  int<0,1>		$hideref       		Hide reference
 *  @param  int<0,1>		$hidedesc           Hide description
 * 	@param	int<0,1>		$issupplierline		Is it a line for a supplier object ?
 *  @param	'L'|'C'|'R'|'J'	$align				text alignment ('L', 'C', 'R', 'J' (default))
 * 	@return	string
 */
function pdf_writelinedesc(&$pdf, $object, $i, $outputlangs, $w, $h, $posx, $posy, $hideref = 0, $hidedesc = 0, $issupplierline = 0, $align = 'J')
{
}
/**
 *  Return line description translated in outputlangs and encoded into htmlentities and with <br>
 *
 *  @param  CommonObject	$object              Object
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
 *	@param	CommonObject	$object				Object
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
 *	@param	CommonObject	$object				Object
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
 *	@param	Contrat|CommandeFournisseur|FactureFournisseur|Facture|Product|Reception|SupplierProposal	$object	Object
 *	@param	int			$i					Current line number
 *  @param  Translate	$outputlangs		Object langs for output
 *  @param	int<0,2>	$hidedetails		Hide details (0=no, 1=yes, 2=just special lines)
 * 	@return	string
 */
function pdf_getlineref_supplier($object, $i, $outputlangs, $hidedetails = 0)
{
}
/**
 *	Return line vat rate
 *
 *	@param	SupplierProposal|CommandeFournisseur|FactureFournisseur|Propal|Facture|Commande|ExpenseReport|StockTransfer	$object	Object
 *	@param	int				$i					Current line number
 *  @param  Translate		$outputlangs		Object langs for output
 *  @param	int<0,2>		$hidedetails		Hide details (0=no, 1=yes, 2=just special lines)
 * 	@return	string
 */
function pdf_getlinevatrate($object, $i, $outputlangs, $hidedetails = 0)
{
}
/**
 *	Return line unit price excluding tax
 *
 *	@param	SupplierProposal|CommandeFournisseur|Propal|Facture|FactureFournisseur|Commande|StockTransfer	$object	Object
 *	@param	int			$i					Current line number
 *  @param  Translate	$outputlangs		Object langs for output
 *  @param	int<0,2>	$hidedetails		Hide details (0=no, 1=yes, 2=just special lines)
 * 	@return	string
 */
function pdf_getlineupexcltax($object, $i, $outputlangs, $hidedetails = 0)
{
}
/**
 *	Return line unit price including tax
 *
 *	@param	SupplierProposal|CommandeFournisseur|Propal|Facture|Commande	$object	Object
 *	@param	int			$i					Current line number
 *  @param  Translate	$outputlangs		Object langs for output
 *  @param	int<0,2>	$hidedetails		Hide value (0 = no,	1 = yes, 2 = just special lines)
 *  @return	string
 */
function pdf_getlineupwithtax($object, $i, $outputlangs, $hidedetails = 0)
{
}
/**
 *	Return line quantity
 *
 *	@param	Delivery|Asset|Commande|Facture|CommandeFournisseur|FactureFournisseur|SupplierProposal|Propal|StockTransfer|MyObject	$object				Object
 *	@param	int			$i					Current line number
 *  @param  Translate	$outputlangs		Object langs for output
 *  @param	int<0,2>	$hidedetails		Hide details (0=no, 1=yes, 2=just special lines)
 *  @return	string
 */
function pdf_getlineqty($object, $i, $outputlangs, $hidedetails = 0)
{
}
/**
 *	Return line quantity asked
 *
 *	@param	Delivery	$object				Object
 *	@param	int			$i					Current line number
 *  @param  Translate	$outputlangs		Object langs for output
 *  @param	int<0,2>	$hidedetails		Hide details (0=no, 1=yes, 2=just special lines)
 * 	@return	string
 */
function pdf_getlineqty_asked($object, $i, $outputlangs, $hidedetails = 0)
{
}
/**
 *	Return line quantity shipped
 *
 *	@param	Delivery	$object				Object
 *	@param	int			$i					Current line number
 *  @param  Translate	$outputlangs		Object langs for output
 *  @param	int<0,2>	$hidedetails		Hide details (0=no, 1=yes, 2=just special lines)
 * 	@return	string
 */
function pdf_getlineqty_shipped($object, $i, $outputlangs, $hidedetails = 0)
{
}
/**
 *	Return line keep to ship quantity
 *
 *	@param	Delivery|Asset|Commande|Facture|CommandeFournisseur|FactureFournisseur|SupplierProposal|Propal|StockTransfer|MyObject	$object		Object
 *	@param	int			$i					Current line number
 *  @param  Translate	$outputlangs		Object langs for output
 *  @param	int<0,2>	$hidedetails		Hide details (0=no, 1=yes, 2=just special lines)
 * 	@return	string
 */
function pdf_getlineqty_keeptoship($object, $i, $outputlangs, $hidedetails = 0)
{
}
/**
 *	Return line unit
 *
 *	@param	SupplierProposal|CommandeFournisseur|Propal|Facture|FactureFournisseur|Commande|StockTransfer	$object	Object
 *	@param	int			$i					Current line number
 *  @param  Translate	$outputlangs		Object langs for output
 *  @param	int<0,2>	$hidedetails		Hide details (0=no, 1=yes, 2=just special lines)
 *  @return	string							Value for unit cell
 */
function pdf_getlineunit($object, $i, $outputlangs, $hidedetails = 0)
{
}
/**
 *	Return line remise percent
 *
 *	@param	SupplierProposal|CommandeFournisseur|Propal|Facture|FactureFournisseur|Commande|StockTransfer	$object	Object
 *	@param	int			$i					Current line number
 *  @param  Translate	$outputlangs		Object langs for output
 *  @param	int<0,2>	$hidedetails		Hide details (0=no, 1=yes, 2=just special lines)
 * 	@return	string
 */
function pdf_getlineremisepercent($object, $i, $outputlangs, $hidedetails = 0)
{
}
/**
 * Return line percent
 *
 * @param Facture		$object             Object
 * @param int			$i                  Current line number
 * @param Translate		$outputlangs        Object langs for output
 * @param int<0,2>		$hidedetails        Hide details (0=no, 1=yes, 2=just special lines)
 * @param ?HookManager	$hookmanager        Hook manager instance
 * @return string
 */
function pdf_getlineprogress($object, $i, $outputlangs, $hidedetails = 0, $hookmanager = \null)
{
}
/**
 *	Return line total excluding tax
 *
 *	@param	Commande|Facture|Propal|FactureFournisseur|CommandeFournisseur|SupplierProposal	$object				Object
 *	@param	int			$i					Current line number
 *  @param  Translate	$outputlangs		Object langs for output
 *  @param	int<0,2>	$hidedetails		Hide details (0=no, 1=yes, 2=just special lines)
 * 	@return	string							Return total of line excl tax
 */
function pdf_getlinetotalexcltax($object, $i, $outputlangs, $hidedetails = 0)
{
}
/**
 *	Return line total including tax
 *
 *	@param	Commande|Facture|Propal|FactureFournisseur|CommandeFournisseur|SupplierProposal	$object				Object
 *	@param	int			$i					Current line number
 *  @param  Translate	$outputlangs		Object langs for output
 *  @param	int<0,2>	$hidedetails		Hide value (0 = no, 1 = yes, 2 = just special lines)
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
 * 	@return	array<string,array<string,null|int|float|string>>	Linked objects
 */
function pdf_getLinkedObjects(&$object, $outputlangs)
{
}
/**
 * Return dimensions to use for images onto PDF checking that width and height are not higher than
 * maximum (20x32 by default).
 *
 * @param	string		$realpath		Full path to photo file to use
 * @return	array{width:int,height:int}	Height and width to use to output image (in pdf user unit, so mm)
 */
function pdf_getSizeForImage($realpath)
{
}
/**
 *	Return line total amount discount.
 *  Calculated by taking the unit price (subprice) * quantity - (total without tax)
 *
 *	@param	Commande|Facture|Propal			$object				Object
 *	@param	int								$i					Current line number
 *  @param  Translate						$outputlangs		Object langs for output
 *  @param	int<0,2>						$hidedetails		Hide details (0=no, 1=yes, 2=just special lines)
 *  @param	int<0,1>						$multicurrency		1=Get value in the foreign currency
 * 	@return	int|float|string									Return total of line excl tax
 */
function pdfGetLineTotalDiscountAmount($object, $i, $outputlangs, $hidedetails = 0, $multicurrency = 0)
{
}
/**
 * Function to extract metadata from a PDF file by doing a binary parsing of the PDF file
 *
 * @param 	string	$file		Path of file
 * @param 	string	$field		Key to extract
 * @return 	string				String of the extracted key or string started with 'ERROR:' if error.
 */
function pdfExtractMetadata($file, $field = 'Keywords')
{
}
/**
 * Render subtotals line with a colored background and adapted text color .
 *
 * @param  TCPDF              $pdf                PDF instance
 * @param  CommonDocGenerator $generator          Generator object
 * @param  float              $curY               Current Y position
 * @param  CommonObject       $object             Object containing lines
 * @param  int                $i                  Current line number
 * @param  Translate          $outputlangs        Output language object
 * @param  int                $hideref            Hide reference
 * @param  int                $hidedesc           Hide description
 * @param  array<int, int>    $bgColor            RGB color array [R,G,B]
 * @param  bool               $isSubtotal         Whether this is a subtotal line
 * @param  bool               $applySubtotalLogic Whether to apply subtotal specific logic
 *
 * @return void
 */
function pdf_render_subtotals(\TCPDF $pdf, \CommonDocGenerator $generator, float $curY, \CommonObject $object, int $i, \Translate $outputlangs, int $hideref, int $hidedesc, array $bgColor, bool $isSubtotal = \false, bool $applySubtotalLogic = \true)
{
}
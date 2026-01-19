<?php

/**
 *	Class to generate stick sheet with format Avery or other personalised
 */
class pdf_standard_member extends \CommonStickerGenerator
{
    /**
     * Dolibarr version of the loaded document
     * @var string Version, possible values are: 'development', 'experimental', 'dolibarr', 'dolibarr_deprecated' or a version string like 'x.y.z'''|'development'|'dolibarr'|'experimental'
     */
    public $version = 'dolibarr';
    /**
     *	Constructor
     *
     *  @param		DoliDB		$db      Database handler
     */
    public function __construct($db)
    {
    }
    /**
     * Output a sticker on page at position _COUNTX, _COUNTY (_COUNTX and _COUNTY start from 0)
     *
     * @param	TCPDF		$pdf			PDF reference
     * @param	Translate	$outputlangs	Output langs
     * @param	array<string,string>	$param		Associative array containing label content and optional parameters
     * @return	void
     */
    public function addSticker(&$pdf, $outputlangs, $param)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Output a sticker on page at position _COUNTX, _COUNTY (_COUNTX and _COUNTY start from 0)
     * - __LOGO__ is replace with company logo
     * - __MEMBER_PHOTO__ is replace with photo provided as parameter
     *
     * @param	 TCPDF		$pdf			PDF
     * @param	 string		$textleft		Text left
     * @param	 string		$header			Header
     * @param	 string		$footer			Footer
     * @param	 Translate	$outputlangs	Output langs
     * @param	 string		$textright		Text right
     * @param	 int		$idmember		Id member
     * @param	 string		$photo			Photo (full path to image file used as replacement for key __PHOTOS__ into left, right, header or footer text)
     * @return	 void
     */
    public function Add_PDF_card(&$pdf, $textleft, $header, $footer, $outputlangs, $textright = '', $idmember = 0, $photo = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Function to build PDF on disk, then output on HTTP stream.
     *
     *  @param  Adherent|array<array{textleft:string,textheader:string,textfooter:string,textright:string,id:string,photo:string}>   $object     Object Adherent for PDF for the same member, Array of record information (array('textleft'=>,'textheader'=>, ..., 'id'=>,'photo'=>)
     *  @param  Translate	$outputlangs		Lang object for output language
     *  @param  string		$srctemplatepath	file. Example: '5161', 'AVERYC32010', 'CARD', ...
     *  @param  string		$mode				Tell if doc module is called
     *  @param  string		$nooutput			1=Generate only file on disk and do not return it on response // TODO: Fix not compatible parameter signature.
     *  @param  string		$filename			Name of output file (without extension)
     *  @return int<-1,1>                       1=OK, <=0=KO
     */
    public function write_file($object, $outputlangs, $srctemplatepath, $mode = 'member', $nooutput = '', $filename = 'tmp_cards')
    {
    }
}
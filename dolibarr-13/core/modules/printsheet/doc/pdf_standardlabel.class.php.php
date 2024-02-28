<?php

/**
 *  Class to generate stick sheet with format Avery or other personalised
 */
class pdf_standardlabel extends \CommonStickerGenerator
{
    /**
     * Output a sticker on page at position _COUNTX, _COUNTY (_COUNTX and _COUNTY start from 0)
     *
     * @param	TCPDF		$pdf			PDF reference
     * @param	Translate	$outputlangs	Output langs
     * @param	array		$param			Associative array containing label content and optional parameters
     * @return	void
     */
    public function addSticker(&$pdf, $outputlangs, $param)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Output a sticker on page at position _COUNTX, _COUNTY (_COUNTX and _COUNTY start from 0)
     * - %LOGO% is replace with company logo
     * - %PHOTO% is replace with photo provided as parameter
     *
     * @param	TCPDF		$pdf			PDF reference
     * @param	string		$textleft		Text left
     * @param	string		$header			Header
     * @param	string		$footer			Footer
     * @param	Translate	$outputlangs	Output langs
     * @param	string		$textright		Text right
     * @param	string		$photo			Photo (full path to image file used as replacement for key %PHOTOS% into left, right, header or footer text)
     * @return	void
     */
    public function Add_PDF_label(&$pdf, $textleft, $header, $footer, $outputlangs, $textright = '', $photo = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Function to build PDF on disk, then output on HTTP strem.
     *
     *	@param	array		$arrayofrecords		Array of record informations (array('textleft'=>,'textheader'=>, ..., 'id'=>,'photo'=>)
     *	@param	Translate	$outputlangs		Lang object for output language
     *	@param	string		$srctemplatepath	Full path of source filename for generator using a template file
     *	@param	string		$outputdir			Output directory for pdf file
     *  @param  string      $filename           Short file name of PDF output file
     *	@return int								1=OK, 0=KO
     */
    public function write_file($arrayofrecords, $outputlangs, $srctemplatepath, $outputdir = '', $filename = 'tmp_address_sheet.pdf')
    {
    }
}
<?php

/**
 *	Class to generate stick sheet with format Avery or other personalised
 */
class pdf_standard extends \CommonStickerGenerator
{
    /**
     * Output a sticker on page at position _COUNTX, _COUNTY (_COUNTX and _COUNTY start from 0)
     *
     * @param	PDF			$pdf			PDF reference
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
     * - __LOGO__ is replace with company logo
     * - __PHOTO__ is replace with photo provided as parameter
     *
     * @param	 PDF		$pdf			PDF
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
     *	Function to build PDF on disk, then output on HTTP stream.
     *
     *	@param	Adherent	$object		        Member object. Old usage: Array of record informations (array('textleft'=>,'textheader'=>, ...'id'=>,'photo'=>)
     *	@param	Translate	$outputlangs		Lang object for output language
     *	@param	string		$srctemplatepath	Full path of source filename for generator using a template file. Example: '5161', 'AVERYC32010', 'CARD', ...
     *	@param	string		$mode				Tell if doc module is called for 'member', ...
     *  @param  int         $nooutput           1=Generate only file on disk and do not return it on response
     *	@return	int								1=OK, 0=KO
     */
    public function write_file($object, $outputlangs, $srctemplatepath, $mode = 'member', $nooutput = 0)
    {
    }
}
<?php

/**
 *	Class to generate stick sheet with format Avery or other personalised
 */
class pdf_tcpdflabel extends \CommonStickerGenerator
{
    // define 1d barcode style
    private $_style1d = array('position' => '', 'align' => 'C', 'stretch' => \false, 'fitwidth' => \true, 'cellfitalign' => '', 'border' => \false, 'hpadding' => 'auto', 'vpadding' => 'auto', 'fgcolor' => array(0, 0, 0), 'bgcolor' => \false, 'text' => \true, 'font' => 'helvetica', 'fontsize' => 8, 'stretchtext' => 4);
    // set style for 2d barcode
    private $_style2d = array(
        'border' => \false,
        'vpadding' => 'auto',
        'hpadding' => 'auto',
        'fgcolor' => array(0, 0, 0),
        'bgcolor' => \false,
        'module_width' => 1,
        // width of a single module in points
        'module_height' => 1,
    );
    private $_align2d = 'N';
    private $_xres = 0.4;
    /**
     * write barcode to pdf
     *
     * @param TCPDF	  $pdf		   PDF reference
     * @param string  $code		   code to print
     * @param string  $encoding	   type of barcode
     * @param boolean $is2d		   true if 2d barcode
     * @param int	  $x		   x position in user units
     * @param int	  $y		   y position in user units
     * @param int	  $w		   width in user units
     * @param int	  $h		   height in user units
     * @return void
     */
    private function writeBarcode(&$pdf, $code, $encoding, $is2d, $x, $y, $w, $h)
    {
    }
    /**
     * Output a sticker on page at position _COUNTX, _COUNTY (_COUNTX and _COUNTY start from 0)
     *
     * @param	TCPDF		$pdf			PDF reference
     * @param	Translate	$outputlangs	Output langs
     * @param	array{textleft:string,textheader:string,textfooter:string,textright:string,code:string,encoding:string,is2d:int<0,1>|bool}		$param			Associative array containing label content and optional parameters
     * @return	void
     */
    public function addSticker(&$pdf, $outputlangs, $param)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Function to build PDF on disk, then output on HTTP stream.
     *
     *	@param	Adherent|array<array{textleft:string,textheader:string,textfooter:string,textright:string,code:string,encoding:string,is2d:int<0,1>|bool}>	$arrayofrecords		Array of record information (array('textleft'=>,'textheader'=>, ..., 'id'=>,'photo'=>)
     *	@param	Translate	$outputlangs		Lang object for output language
     *	@param	string		$srctemplatepath	Full path of source filename for generator using a template file
     *	@param	string		$outputdir			Output directory for pdf file
     *  @param  string      $filename           Short file name of PDF output file
     *  @return int<-1,1>                       1=OK, <=0=KO
     */
    public function write_file($arrayofrecords, $outputlangs, $srctemplatepath, $outputdir = '', $filename = 'tmp_address_sheet.pdf')
    {
    }
}
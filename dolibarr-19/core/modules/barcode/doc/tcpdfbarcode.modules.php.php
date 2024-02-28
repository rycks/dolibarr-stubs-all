<?php

// This is to include def like $genbarcode_loc and $font_loc
/**
 *	Class to generate barcode images using tcpdf barcode generator
 */
class modTcpdfbarcode extends \ModeleBarCode
{
    /**
     * Dolibarr version of the loaded document
     * @var string
     */
    public $version = 'dolibarr';
    // 'development', 'experimental', 'dolibarr'
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    public $is2d = \false;
    /**
     *	Return description of numbering model
     *
     *	@param	Translate	$langs      Lang object to use for output
     *  @return string      			Descriptive text
     */
    public function info($langs)
    {
    }
    /**
     *	Return if a module can be used or not
     *
     *	@return		boolean		true if module can be used
     */
    public function isEnabled()
    {
    }
    /**
     *  Checks if the numbers already in the database do not
     *  cause conflicts that would prevent this numbering working.
     *
     *	@param	Object		$object		Object we need next value for
     *  @return boolean     			false if KO (there is a conflict), true if OK
     */
    public function canBeActivated($object)
    {
    }
    /**
     *	Return true if encoding is supported
     *
     *	@param	string	$encoding		Encoding norm
     *	@return	int						>0 if supported, 0 if not
     */
    public function encodingIsSupported($encoding)
    {
    }
    /**
     *	Return an image file on the fly (no need to write on disk)
     *
     *	@param	   string	    $code		      Value to encode
     *	@param	   string	    $encoding	      Mode of encoding
     *	@param	   string	    $readable	      Code can be read (What is this ? is this used ?)
     *	@param	   integer		$scale			  Scale (not used with this engine)
     *  @param     integer      $nooutputiferror  No output if error (not used with this engine)
     *	@return	   int			                  Return integer <0 if KO, >0 if OK
     */
    public function buildBarCode($code, $encoding, $readable = 'Y', $scale = 1, $nooutputiferror = 0)
    {
    }
    /**
     *	Save an image file on disk (with no output)
     *
     *	@param	   string	    $code		      Value to encode
     *	@param	   string	    $encoding	      Mode of encoding
     *	@param	   string	    $readable	      Code can be read
     *	@param	   integer		$scale			  Scale (not used with this engine)
     *  @param     integer      $nooutputiferror  No output if error (not used with this engine)
     *	@return	   int			                  Return integer <0 if KO, >0 if OK
     */
    public function writeBarCode($code, $encoding, $readable = 'Y', $scale = 1, $nooutputiferror = 0)
    {
    }
    /**
     *	get available output_modes for tcpdf class wth its translated description
     *
     * @param	string $dolEncodingType dolibarr barcode encoding type
     * @return	string tcpdf encoding type
     */
    public function getTcpdfEncodingType($dolEncodingType)
    {
    }
}
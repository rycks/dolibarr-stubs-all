<?php

// This is to include def like $genbarcode_loc and $font_loc
/**
 *	Class to generate barcode images using php barcode generator
 */
class modPhpbarcode extends \ModeleBarCode
{
    /**
     * Dolibarr version of the loaded document
     * @var string Version, possible values are: 'development', 'experimental', 'dolibarr', 'dolibarr_deprecated' or a version string like 'x.y.z''development'|'experimental'|'dolibarr'
     */
    public $version = 'dolibarr';
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    /**
     * 	Return if a module can be used or not
     *
     *  @return		boolean     true if module can be used
     */
    public function isEnabled()
    {
    }
    /**
     * 	Return description
     *
     *	@param	Translate	$langs      Lang object to use for output
     *  @return string      			Descriptive text
     */
    public function info($langs)
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
     *	Return an image file on the fly (no need to write on disk) with the HTTP content-type of image.
     *
     *	@param	string   	$code			  	Value to encode
     *	@param  string	 	$encoding		  	Mode of encoding
     *	@param  string	 	$readable		  	Code can be read (What is this ? is this used ?)
     *	@param	integer		$scale			  	Scale
     *  @param  integer     $nooutputiferror  	No output if error
     *	@return	int							  	Return integer <0 if KO, >0 if OK
     */
    public function buildBarCode($code, $encoding, $readable = 'Y', $scale = 1, $nooutputiferror = 0)
    {
    }
    /**
     *	Save an image file on disk (with no output)
     *
     *	@param	string   	$code			  	Value to encode
     *	@param	string   	$encoding		  	Mode of encoding
     *	@param  string	 	$readable		  	Code can be read
     *	@param	integer		$scale			  	Scale
     *  @param  integer     $nooutputiferror  	No output if error
     *	@return	int							  	Return integer <0 if KO, >0 if OK
     */
    public function writeBarCode($code, $encoding, $readable = 'Y', $scale = 1, $nooutputiferror = 0)
    {
    }
}
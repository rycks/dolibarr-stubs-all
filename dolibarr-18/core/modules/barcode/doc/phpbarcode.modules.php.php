<?php

// This is to include def like $genbarcode_loc and $font_loc
/**
 *	Class to generate barcode images using php barcode generator
 */
class modPhpbarcode extends \ModeleBarCode
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
     * 	@return     string      Descriptive text
     */
    public function info()
    {
    }
    /**
     *  Checks if the numbers already in the database do not
     *  cause conflicts that would prevent this numbering working.
     *
     *	@return     boolean     false if conflict, true if ok
     */
    public function canBeActivated()
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
     *	@param	string   	$code			  Value to encode
     *	@param  string	 	$encoding		  Mode of encoding
     *	@param  string	 	$readable		  Code can be read (What is this ? is this used ?)
     *	@param	integer		$scale			  Scale
     *  @param  integer     $nooutputiferror  No output if error
     *	@return	int							  <0 if KO, >0 if OK
     */
    public function buildBarCode($code, $encoding, $readable = 'Y', $scale = 1, $nooutputiferror = 0)
    {
    }
    /**
     *	Save an image file on disk (with no output)
     *
     *	@param	string   	$code			  Value to encode
     *	@param	string   	$encoding		  Mode of encoding
     *	@param  string	 	$readable		  Code can be read
     *	@param	integer		$scale			  Scale
     *  @param  integer     $nooutputiferror  No output if error
     *	@return	int							  <0 if KO, >0 if OK
     */
    public function writeBarCode($code, $encoding, $readable = 'Y', $scale = 1, $nooutputiferror = 0)
    {
    }
}
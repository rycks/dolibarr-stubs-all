<?php

/**
 *	    \class      modGeneratePassPerso
 *		\brief      Class to generate a password according to personal rules
 */
class modGeneratePassPerso extends \ModeleGenPassword
{
    /**
     * @var int ID
     */
    public $id;
    public $length;
    public $length2;
    // didn't overright display
    public $NbMaj;
    public $NbNum;
    public $NbSpe;
    public $NbRepeat;
    public $WithoutAmbi;
    /**
     * @var DoliDB Database handler.
     */
    public $db;
    public $conf;
    public $lang;
    public $user;
    public $Maj;
    public $Min;
    public $Nb;
    public $Spe;
    public $Ambi;
    public $All;
    /**
     *	Constructor
     *
     *  @param		DoliDB		$db			Database handler
     *	@param		Conf		$conf		Handler de conf
     *	@param		Translate	$langs		Handler de langue
     *	@param		User		$user		Handler du user connecte
     */
    public function __construct($db, $conf, $langs, $user)
    {
    }
    /**
     *		Return description of module
     *
     *      @return     string      Description of text
     */
    public function getDescription()
    {
    }
    /**
     * 		Return an example of password generated by this module
     *
     *      @return     string      Example of password
     */
    public function getExample()
    {
    }
    /**
     *  Build new password
     *
     *  @return     string      Return a new generated password
     */
    public function getNewGeneratedPassword()
    {
    }
    /**
     *  Validate a password
     *
     *  @param      string  $password   Password to check
     *  @return     bool                false if KO, true if OK
     */
    public function validatePassword($password)
    {
    }
    /**
     *  Check the consecutive iterations of the same character. Return false if the number doesn't match the maximum consecutive value allowed.
     *
     *  @param		string	$password	Password to check
     *  @return     bool
     */
    private function consecutiveInterationSameCharacter($password)
    {
    }
}
<?php

/**
 *	Class to generate a password according to rule 'no password'
 */
class modGeneratePassNone extends \ModeleGenPassword
{
    /**
     * @var int ID
     */
    public $id;
    /**
     * Minimum length (text visible by end user)
     *
     * @var string
     */
    public $length;
    /**
     * Minimum length in number of characters
     *
     * @var integer
     */
    public $length2;
    /**
     * @var DoliDB Database handler.
     */
    public $db;
    public $conf;
    public $lang;
    public $user;
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
     * 		Build new password
     *
     *      @return     string      Return a new generated password
     */
    public function getNewGeneratedPassword()
    {
    }
    /**
     * 	Validate a password.
     * 	This function is called by User->setPassword() and internally to validate that the password matches the constraints.
     *
     *	@param		string	$password	Password to check
     *  @return     int					0 if KO, >0 if OK
     */
    public function validatePassword($password)
    {
    }
}
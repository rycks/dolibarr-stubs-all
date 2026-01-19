<?php

/**
 * Class DataPolicy
 */
class DataPolicy
{
    /**
     * @var DoliDB Database handler.
     */
    public $db;
    /**
     * @var string
     */
    public $error;
    /**
     *	Constructor
     *
     *  @param		DoliDB		$db      Database handler
     */
    public function __construct($db)
    {
    }
    /**
     * getAllContactNotInformed
     *
     * @return integer
     */
    public function getAllContactNotInformed()
    {
    }
    /**
     * getAllCompaniesNotInformed
     *
     * @return integer
     */
    public function getAllCompaniesNotInformed()
    {
    }
    /**
     * getAllAdherentsNotInformed
     *
     * @return integer
     */
    public function getAllAdherentsNotInformed()
    {
    }
    /**
     * sendMailDataPolicyContact
     *
     * @param 	Contact		$contact		Contact
     * @return	void
     */
    public static function sendMailDataPolicyContact($contact)
    {
    }
    /**
     * sendMailDataPolicyCompany
     *
     * @param Societe	$societe	Object societe
     * @return	void
     */
    public static function sendMailDataPolicyCompany($societe)
    {
    }
    /**
     * sendMailDataPolicyAdherent
     *
     * @param Adherent	$adherent		Member
     * @return void
     */
    public static function sendMailDataPolicyAdherent($adherent)
    {
    }
}
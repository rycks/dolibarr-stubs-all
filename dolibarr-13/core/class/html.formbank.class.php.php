<?php

/**
 *	Class to manage generation of HTML components for bank module
 */
class FormBank
{
    /**
     * @var DoliDB Database handler.
     */
    public $db;
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    /**
     * Constructor
     *
     * @param		DoliDB		$db      Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *  Retourne la liste des types de comptes financiers
     *
     *  @param	integer	$selected        Type pre-selectionne
     *  @param  string	$htmlname        Nom champ formulaire
     *  @return	void
     */
    public function selectTypeOfBankAccount($selected = \Account::TYPE_CURRENT, $htmlname = 'type')
    {
    }
    /**
     * Returns the name of the Iban label. India uses 'IFSC' and the rest of the world 'IBAN' name.
     *
     * @param Account $account Account object
     * @return string
     */
    public static function getIBANLabel(\Account $account)
    {
    }
}
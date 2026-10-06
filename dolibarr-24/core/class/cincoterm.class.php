<?php

/**
 *  Class to manage dictionary Incoterms (used by imports)
 */
class Cincoterm extends \CommonDict
{
    /**
     * @var string      The code of the incoterm
     *                  (ex: FOB, CIF, CPT, etc.)
     */
    public $code;
    /**
     * @var ?string      The name of the incoterm
     */
    public $label = '';
    /**
     * @var ?string      The description of the incoterm
     */
    public $description = '';
    /**
     * @var ?string
     * @deprecated
     * @see $description
     */
    public $libelle = '';
    /**
     *  Constructor
     *
     *  @param      DoliDB		$db      Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *  Load object in memory from database
     *
     *  @param      int		$id    	Incoterm ID
     *  @param		string	$code	Incoterm code
     *  @return     int          	Return integer <0 if KO, >0 if OK
     */
    public function fetch($id, $code = '')
    {
    }
}
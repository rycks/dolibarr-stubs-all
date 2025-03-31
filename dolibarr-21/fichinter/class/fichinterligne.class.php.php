<?php

/**
 *	Class to manage intervention lines
 */
class FichinterLigne extends \CommonObjectLine
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
     * @var int ID of intervention (field from llx_fichinterdet)
     */
    public $fk_fichinter;
    /**
     * @var string Line description
     */
    public $desc;
    /**
     * @var int Date of intervention
     */
    public $date;
    /**
     * @var int Date of intervention
     * @deprecated
     */
    public $datei;
    /**
     * @var int Duration of intervention
     */
    public $duration;
    /**
     * @var int Line rang
     */
    public $rang = 0;
    /**
     * @var float Taxe rate
     */
    public $tva_tx;
    /**
     * Unit price before taxes
     * @var float
     */
    public $subprice;
    /**
     * @var string ID to identify managed object
     */
    public $element = 'fichinterdet';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'fichinterdet';
    /**
     * @var string Field with ID of parent key if this field has a parent
     */
    public $fk_element = 'fk_fichinter';
    /**
     *  Constructor
     *
     *  @param  DoliDB  $db     Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *	Retrieve the line of intervention
     *
     *	@param  int		$rowid		Line id
     *	@return	int					Return integer <0 if KO, >0 if OK
     */
    public function fetch($rowid)
    {
    }
    /**
     *	Insert the line into database
     *
     *	@param		User	$user 		Object user that make creation
     *	@param		int		$notrigger	Disable all triggers
     *	@return		int		Return integer <0 if ko, >0 if ok
     */
    public function insert($user, $notrigger = 0)
    {
    }
    /**
     *	Update intervention into database
     *
     *	@param		User	$user 		Object user that make creation
     *	@param		int		$notrigger	Disable all triggers
     *	@return		int		Return integer <0 if ko, >0 if ok
     */
    public function update($user, $notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Update total duration into llx_fichinter
     *
     *	@return		int		Return integer <0 si ko, >0 si ok
     */
    public function update_total()
    {
    }
    /**
     *	Delete a intervention line
     *
     *	@param		User	$user 		Object user that make creation
     *	@param		int		$notrigger	Disable all triggers
     *	@return     int		>0 if ok, <0 if ko
     */
    public function deleteLine($user, $notrigger = 0)
    {
    }
}
<?php

/**
 *	Class to manage subscriptions of foundation members
 */
class Subscription extends \CommonObject
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'subscription';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'subscription';
    /**
     * @var int  Does myobject support multicompany module ? 0=No test on entity, 1=Test with field entity, 2=Test with link by fk_soc, 'field@table'=Test with link by field@table
     */
    public $ismultientitymanaged = 'fk_adherent@adherent';
    /**
     * @var string String with name of icon for myobject. Must be the part after the 'object_' into object_myobject.png
     */
    public $picto = 'payment';
    /**
     * Date creation record (datec)
     *
     * @var integer
     */
    public $datec;
    /**
     * Date modification record (tms)
     *
     * @var integer
     */
    public $datem;
    /**
     * Subscription start date (date subscription)
     *
     * @var integer
     */
    public $dateh;
    /**
     * Subscription end date
     *
     * @var integer
     */
    public $datef;
    /**
     * @var int ID
     */
    public $fk_type;
    /**
     * @var int Member ID
     */
    public $fk_adherent;
    /**
     * @var double amount subscription
     */
    public $amount;
    /**
     * @var int ID
     */
    public $fk_bank;
    public $fields = array('rowid' => array('type' => 'integer', 'label' => 'TechnicalID', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 10), 'tms' => array('type' => 'timestamp', 'label' => 'DateModification', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 15), 'datec' => array('type' => 'datetime', 'label' => 'DateCreation', 'enabled' => 1, 'visible' => -1, 'position' => 20), 'fk_adherent' => array('type' => 'integer', 'label' => 'Member', 'enabled' => 1, 'visible' => -1, 'position' => 25), 'dateadh' => array('type' => 'datetime', 'label' => 'DateSubscription', 'enabled' => 1, 'visible' => -1, 'position' => 30), 'datef' => array('type' => 'datetime', 'label' => 'DateEndSubscription', 'enabled' => 1, 'visible' => -1, 'position' => 35), 'subscription' => array('type' => 'double(24,8)', 'label' => 'Amount', 'enabled' => 1, 'visible' => -1, 'position' => 40, 'isameasure' => 1), 'fk_bank' => array('type' => 'integer', 'label' => 'BankId', 'enabled' => 1, 'visible' => -1, 'position' => 45), 'note' => array('type' => 'text', 'label' => 'Note', 'enabled' => 1, 'visible' => -1, 'position' => 50), 'fk_type' => array('type' => 'integer', 'label' => 'MemberType', 'enabled' => 1, 'visible' => -1, 'position' => 55), 'fk_user_creat' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'UserAuthor', 'enabled' => 1, 'visible' => -2, 'position' => 60), 'fk_user_valid' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'UserValidation', 'enabled' => 1, 'visible' => -1, 'position' => 65));
    /**
     *	Constructor
     *
     *	@param 		DoliDB		$db		Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *	Function who permitted cretaion of the subscription
     *
     *	@param	User	$user			User that create
     *	@param  bool 	$notrigger 		false=launch triggers after, true=disable triggers
     *	@return	int						<0 if KO, Id subscription created if OK
     */
    public function create($user, $notrigger = \false)
    {
    }
    /**
     *  Method to load a subscription
     *
     *  @param	int		$rowid		Id subscription
     *  @return	int					<0 if KO, =0 if not found, >0 if OK
     */
    public function fetch($rowid)
    {
    }
    /**
     *	Update subscription
     *
     *	@param	User	$user			User who updated
     *	@param 	int		$notrigger		0=Disable triggers
     *	@return	int						<0 if KO, >0 if OK
     */
    public function update($user, $notrigger = 0)
    {
    }
    /**
     *	Delete a subscription
     *
     *	@param	User	$user		User that delete
     *	@param 	bool 	$notrigger  false=launch triggers after, true=disable triggers
     *	@return	int					<0 if KO, 0 if not found, >0 if OK
     */
    public function delete($user, $notrigger = \false)
    {
    }
    /**
     *  Return clicable name (with picto eventually)
     *
     *	@param	int		$withpicto					0=No picto, 1=Include picto into link, 2=Only picto
     *  @param	int  	$notooltip					1=Disable tooltip
     *	@param	string	$option						Page for link ('', 'nolink', ...)
     *  @param  string  $morecss        			Add more css on link
     *  @param  int     $save_lastsearch_value    	-1=Auto, 0=No save of lastsearch_values when clicking, 1=Save lastsearch_values whenclicking
     *	@return	string								Chaine avec URL
     */
    public function getNomUrl($withpicto = 0, $notooltip = 0, $option = '', $morecss = '', $save_lastsearch_value = -1)
    {
    }
    /**
     *  Retourne le libelle du statut d'une adhesion
     *
     *  @param	int		$mode       0=libelle long, 1=libelle court, 2=Picto + Libelle court, 3=Picto, 4=Picto + Libelle long, 5=Libelle court + Picto
     *  @return string				Label
     */
    public function getLibStatut($mode = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Renvoi le libelle d'un statut donne
     *
     *  @param	int			$status      			Id status
     *  @return string      						Label
     */
    public function LibStatut($status)
    {
    }
    /**
     *  Load information of the subscription object
     *
     *  @param	int		$id       Id subscription
     *  @return	void
     */
    public function info($id)
    {
    }
}
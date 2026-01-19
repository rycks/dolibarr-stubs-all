<?php

//require_once DOL_DOCUMENT_ROOT."/societe/class/societe.class.php";
//require_once DOL_DOCUMENT_ROOT."/product/class/product.class.php";
/**
 *	Put here description of your class
 */
class Opensurveysondage extends \CommonObject
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'opensurvey_sondage';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'opensurvey_sondage';
    public $picto = 'opensurvey';
    public $id_sondage;
    /**
     * @deprecated
     * @see $description
     */
    public $commentaires;
    /**
     * @var string description
     */
    public $description;
    public $mail_admin;
    public $nom_admin;
    /**
     * Id of user author of the poll
     * @var int
     */
    public $fk_user_creat;
    public $titre;
    public $date_fin = '';
    public $status = 1;
    public $format;
    public $mailsonde;
    public $sujet;
    /**
     * Allow comments on this poll
     * @var bool
     */
    public $allow_comments;
    /**
     * Allow users see others vote
     * @var bool
     */
    public $allow_spy;
    /**
     * Draft status (not used)
     */
    const STATUS_DRAFT = 0;
    /**
     * Validated/Opened status
     */
    const STATUS_VALIDATED = 1;
    /**
     * Closed
     */
    const STATUS_CLOSED = 2;
    /**
     *  Constructor
     *
     *  @param	DoliDb		$db      Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *  Create object into database
     *
     *  @param	User    $user        User that creates
     *  @param  int     $notrigger   0=launch triggers after, 1=disable triggers
     *  @return int                  <0 if KO, Id of created object if OK
     */
    public function create(\User $user, $notrigger = 0)
    {
    }
    /**
     *  Load object in memory from the database
     *
     *  @param	int		$id    				Id object
     *  @param	string	$numsurvey			Ref of survey (admin or not)
     *  @return int          				<0 if KO, >0 if OK
     */
    public function fetch($id, $numsurvey = '')
    {
    }
    /**
     *  Update object into database
     *
     *  @param	User    $user        User that modifies
     *  @param  int     $notrigger	 0=launch triggers after, 1=disable triggers
     *  @return int     		   	 <0 if KO, >0 if OK
     */
    public function update(\User $user, $notrigger = 0)
    {
    }
    /**
     *  Delete object in database
     *
     *	@param  User	$user        		User that deletes
     *  @param  int		$notrigger	 		0=launch triggers after, 1=disable triggers
     *  @param	string	$numsondage			Num sondage admin to delete
     *  @return	int					 		<0 if KO, >0 if OK
     */
    public function delete(\User $user, $notrigger = 0, $numsondage = '')
    {
    }
    /**
     *  Return a link to the object card (with optionaly the picto)
     *
     *	@param	int		$withpicto					Include picto in link (0=No picto, 1=Include picto into link, 2=Only picto)
     *  @param	int  	$notooltip					1=Disable tooltip
     *  @param  string  $morecss            		Add more css on link
     *  @param  int     $save_lastsearch_value    	-1=Auto, 0=No save of lastsearch_values when clicking, 1=Save lastsearch_values whenclicking
     *	@return	string								String with URL
     */
    public function getNomUrl($withpicto = 0, $notooltip = 0, $morecss = '', $save_lastsearch_value = -1)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Return array of lines
     *
     * @return 	int		<0 if KO, >0 if OK
     */
    public function fetch_lines()
    {
    }
    /**
     *	Initialise object with example values
     *	Id must be 0 if object instance is a specimen
     *
     *	@return	void
     */
    public function initAsSpecimen()
    {
    }
    /**
     * Returns all comments for the current opensurvey poll
     *
     * @return Object[]
     */
    public function getComments()
    {
    }
    /**
     * Adds a comment to the poll
     *
     * @param string $comment Comment content
     * @param string $comment_user Comment author
     * @return boolean False in case of the query fails, true if it was successful
     */
    public function addComment($comment, $comment_user)
    {
    }
    /**
     * Deletes a comment of the poll
     *
     * @param int $id_comment Id of the comment
     * @return boolean False in case of the query fails, true if it was successful
     */
    public function deleteComment($id_comment)
    {
    }
    /**
     * Cleans all the class variables before doing an update or an insert
     *
     * @return void
     */
    private function cleanParameters()
    {
    }
    /**
     *	Return status label of Order
     *
     *	@param      int     $mode       0=libelle long, 1=libelle court, 2=Picto + Libelle court, 3=Picto, 4=Picto + Libelle long, 5=Libelle court + Picto
     *	@return     string              Libelle
     */
    public function getLibStatut($mode)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return label of status
     *
     *  @param		int		$status      	  Id statut
     *  @param      int		$mode        	  0=libelle long, 1=libelle court, 2=Picto + Libelle court, 3=Picto, 4=Picto + Libelle long, 5=Libelle court + Picto
     *  @return     string					  Label of status
     */
    public function LibStatut($status, $mode)
    {
    }
}
<?php

/**
 * Class of expense report details lines
 */
class ExpenseReportLine extends \CommonObjectLine
{
    /**
     * @var DoliDB Database handler.
     */
    public $db;
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'expensereport_det';
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    /**
     * @var int ID
     */
    public $rowid;
    /**
     * @var string
     */
    public $comments;
    /**
     * @var float Quantity
     */
    public $qty;
    /**
     * @var string|float|int
     */
    public $value_unit;
    /**
     * @var int|string
     */
    public $date;
    /**
     * @var int|string
     */
    public $dates;
    /**
     * @var int ID
     */
    public $fk_c_type_fees;
    /**
     * @var int ID
     */
    public $fk_c_exp_tax_cat;
    /**
     * @var int ID
     */
    public $fk_projet;
    /**
     * @var int ID
     */
    public $fk_expensereport;
    /**
     * @var string
     */
    public $type_fees_code;
    /**
     * @var string
     */
    public $type_fees_libelle;
    /**
     * @var string
     */
    public $type_fees_accountancy_code;
    /**
     * @var string
     */
    public $projet_ref;
    /**
     * @var string
     */
    public $projet_title;
    /**
     * @var int
     */
    public $rang;
    /**
     * @var int|string
     */
    public $vatrate;
    /**
     * @var string
     */
    public $vat_src_code;
    /**
     * @var float
     */
    public $tva_tx;
    /**
     * @var int|string
     */
    public $localtax1_tx;
    /**
     * @var int|string
     */
    public $localtax2_tx;
    /**
     * @var string
     */
    public $localtax1_type;
    /**
     * @var string
     */
    public $localtax2_type;
    /**
     * @var float
     */
    public $total_ht;
    /**
     * @var float
     */
    public $total_tva;
    /**
     * @var float
     */
    public $total_ttc;
    /**
     * @var float
     */
    public $total_localtax1;
    /**
     * @var float
     */
    public $total_localtax2;
    // Multicurrency
    /**
     * @var int Currency ID
     */
    public $fk_multicurrency;
    /**
     * @var string multicurrency code
     */
    public $multicurrency_code;
    /**
     * @var float
     */
    public $multicurrency_tx;
    /**
     * @var float
     */
    public $multicurrency_total_ht;
    /**
     * @var float
     */
    public $multicurrency_total_tva;
    /**
     * @var float
     */
    public $multicurrency_total_ttc;
    /**
     * @var int ID into llx_ecm_files table to link line to attached file
     */
    public $fk_ecm_files;
    /**
     * @var string
     */
    public $rule_warning_message;
    /**
     * Constructor
     *
     * @param DoliDB    $db     Handlet database
     */
    public function __construct($db)
    {
    }
    /**
     * Fetch record for expense report detailed line
     *
     * @param   int     $rowid      Id of object to load
     * @return  int                 Return integer <0 if KO, >0 if OK
     */
    public function fetch($rowid)
    {
    }
    /**
     * Insert a line of expense report
     *
     * @param   int     $notrigger      1=No trigger
     * @param   bool    $fromaddline    false=keep default behavior, true=exclude the update_price() of parent object
     * @return  int                     Return integer <0 if KO, >0 if OK
     */
    public function insert($notrigger = 0, $fromaddline = \false)
    {
    }
    /**
     * Function to get total amount in expense reports for a same rule
     *
     * @param  ExpenseReportRule $rule		object rule to check
     * @param  int				 $fk_user	user author id
     * @param  string			 $mode		day|EX_DAY / month|EX_MON / year|EX_YEA to get amount
     * @return float                        Amount
     */
    public function getExpAmount(\ExpenseReportRule $rule, $fk_user, $mode = 'day')
    {
    }
    /**
     * Update line
     *
     * @param   User    $user      User
     * @param   int     $notrigger 1=No trigger
     * @return  int                Return integer <0 if KO, >0 if OK
     */
    public function update(\User $user, $notrigger = 0)
    {
    }
}
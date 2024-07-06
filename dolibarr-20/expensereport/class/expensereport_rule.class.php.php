<?php

/**
 *	Class to manage inventories
 */
class ExpenseReportRule extends \CommonObject
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'expenserule';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'expensereport_rules';
    /**
     * @var string Fieldname with ID of parent key if this field has a parent
     */
    public $fk_element = 'fk_expense_rule';
    /**
     * date start
     * @var int|string
     */
    public $dates;
    /**
     * date end
     * @var int|string
     */
    public $datee;
    /**
     * amount
     * @var double
     */
    public $amount;
    /**
     * restrective
     * @var int
     */
    public $restrictive;
    /**
     * rule for user
     * @var int
     */
    public $fk_user;
    /**
     * rule for group
     * @var int
     */
    public $fk_usergroup;
    /**
     * c_type_fees id
     * @var int
     */
    public $fk_c_type_fees;
    /**
     * code type of expense report
     * @var string
     */
    public $code_expense_rules_type;
    /**
     * rule for all
     * @var int
     */
    public $is_for_all;
    /**
     * entity
     * @var int
     */
    public $entity;
    /**
     * Attribute object linked with database
     * @var array<string,array{type:string,label:string,enabled:int<0,2>|string,position:int,notnull?:int,visible:int,noteditable?:int,default?:string,index?:int,foreignkey?:string,searchall?:int,isameasure?:int,css?:string,csslist?:string,help?:string,showoncombobox?:int,disabled?:int,arrayofkeyval?:array<int,string>,comment?:string}>  Array with all fields and their property. Do not use it as a static var. It may be modified by constructor.
     */
    public $fields = array('rowid' => array('type' => 'integer', 'index' => 1, 'label' => 'ID', 'enabled' => 1, 'visible' => -1, 'position' => 10), 'dates' => array('type' => 'date', 'label' => 'Dates', 'enabled' => 1, 'visible' => -1, 'position' => 20), 'datee' => array('type' => 'date', 'label' => 'Datee', 'enabled' => 1, 'visible' => -1, 'position' => 30), 'amount' => array('type' => 'double', 'label' => 'Amount', 'enabled' => 1, 'visible' => -1, 'position' => 40), 'restrictive' => array('type' => 'integer', 'label' => 'Restrictive', 'enabled' => 1, 'visible' => -1, 'position' => 50), 'fk_user' => array('type' => 'integer', 'label' => 'User', 'enabled' => 1, 'visible' => -1, 'position' => 60), 'fk_usergroup' => array('type' => 'integer', 'label' => 'Usergroup', 'enabled' => 1, 'visible' => -1, 'position' => 70), 'fk_c_type_fees' => array('type' => 'integer', 'label' => 'Type fees', 'enabled' => 1, 'visible' => -1, 'position' => 80), 'code_expense_rules_type' => array('type' => 'string', 'label' => 'Expense rule code', 'enabled' => 1, 'visible' => -1, 'position' => 90), 'is_for_all' => array('type' => 'integer', 'label' => 'IsForAll', 'enabled' => 1, 'visible' => -1, 'position' => 100), 'entity' => array('type' => 'integer', 'label' => 'Entity', 'enabled' => 1, 'visible' => -2, 'position' => 110));
    /**
     *  Constructor
     *
     *  @param      DoliDB		$db      Database handler
     */
    public function __construct(\DoliDB $db)
    {
    }
    /**
     * Create object into database
     *
     * @param  User $user      User that creates
     * @param  int 	$notrigger 0=launch triggers after, 1=disable triggers
     * @return int             Return integer <0 if KO, Id of created object if OK
     */
    public function create(\User $user, $notrigger = 0)
    {
    }
    /**
     * Load object in memory from the database
     *
     * @param int    $id   Id object
     * @param string $ref  Ref
     * @return int         Return integer <0 if KO, 0 if not found, >0 if OK
     */
    public function fetch($id, $ref = \null)
    {
    }
    /**
     * Update object into database
     *
     * @param  User $user      User that modifies
     * @param  int 	$notrigger 0=launch triggers after, 1=disable triggers
     * @return int             Return integer <0 if KO, >0 if OK
     */
    public function update(\User $user, $notrigger = 0)
    {
    }
    /**
     * Delete object in database
     *
     * @param User 	$user       User that deletes
     * @param int 	$notrigger  0=launch triggers after, 1=disable triggers
     * @return int             	Return integer <0 if KO, >0 if OK
     */
    public function delete(\User $user, $notrigger = 0)
    {
    }
    /**
     * Return all rules or filtered by something
     *
     * @param int	     $fk_c_type_fees	type of expense
     * @param int|string $date			    date of expense
     * @param int        $fk_user		    user of expense
     * @return array                        Array with ExpenseReportRule
     */
    public function getAllRule($fk_c_type_fees = 0, $date = '', $fk_user = 0)
    {
    }
    /**
     * Return the label of group for the current object
     *
     * @return string
     */
    public function getGroupLabel()
    {
    }
    /**
     * Return the name of user for the current object
     *
     * @return string
     */
    public function getUserName()
    {
    }
}
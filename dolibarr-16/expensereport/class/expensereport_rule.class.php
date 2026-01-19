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
     * @var array
     */
    public $fields = array('rowid' => array('type' => 'integer', 'index' => \true), 'dates' => array('type' => 'date'), 'datee' => array('type' => 'date'), 'amount' => array('type' => 'double'), 'restrictive' => array('type' => 'integer'), 'fk_user' => array('type' => 'integer'), 'fk_usergroup' => array('type' => 'integer'), 'fk_c_type_fees' => array('type' => 'integer'), 'code_expense_rules_type' => array('type' => 'string'), 'is_for_all' => array('type' => 'integer'), 'entity' => array('type' => 'integer'));
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
     * @param  bool $notrigger false=launch triggers after, true=disable triggers
     * @return int             <0 if KO, Id of created object if OK
     */
    public function create(\User $user, $notrigger = \false)
    {
    }
    /**
     * Load object in memory from the database
     *
     * @param int    $id   Id object
     * @param string $ref  Ref
     * @return int         <0 if KO, 0 if not found, >0 if OK
     */
    public function fetch($id, $ref = \null)
    {
    }
    /**
     * Update object into database
     *
     * @param  User $user      User that modifies
     * @param  bool $notrigger false=launch triggers after, true=disable triggers
     * @return int             <0 if KO, >0 if OK
     */
    public function update(\User $user, $notrigger = \false)
    {
    }
    /**
     * Delete object in database
     *
     * @param User $user       User that deletes
     * @param bool $notrigger  false=launch triggers after, true=disable triggers
     * @return int             <0 if KO, >0 if OK
     */
    public function delete(\User $user, $notrigger = \false)
    {
    }
    /**
     * Return all rules or filtered by something
     *
     * @param int	     $fk_c_type_fees	type of expense
     * @param integer	 $date			    date of expense
     * @param int        $fk_user		    user of expense
     * @return array                        Array with ExpenseReportRule
     */
    public function getAllRule($fk_c_type_fees = '', $date = '', $fk_user = '')
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
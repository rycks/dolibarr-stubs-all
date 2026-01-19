<?php

/**
 *	Class to manage inventories
 */
class ExpenseReportIk extends \CommonObject
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'expenseik';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'expensereport_ik';
    /**
     * @var string Field with ID of parent key if this field has a parent
     */
    public $fk_element = 'fk_expense_ik';
    /**
     * c_exp_tax_cat Id
     * @var int
     */
    public $fk_c_exp_tax_cat;
    /**
     * c_exp_tax_range id
     * @var int
     */
    public $fk_range;
    /**
     * Coef
     * @var double
     */
    public $coef;
    /**
     * Offset
     * @var double
     */
    public $ikoffset;
    /**
     * Attribute object linked with database
     * @var array
     */
    public $fields = array('rowid' => array('type' => 'integer', 'index' => \true), 'fk_c_exp_tax_cat' => array('type' => 'integer', 'index' => \true), 'fk_range' => array('type' => 'integer', 'index' => \true), 'coef' => array('type' => 'double'), 'ikoffset' => array('type' => 'double'));
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
     * @return int             Return integer <0 if KO, Id of created object if OK
     */
    public function create(\User $user, $notrigger = \false)
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
     * @param  bool $notrigger false=launch triggers after, true=disable triggers
     * @return int             Return integer <0 if KO, >0 if OK
     */
    public function update(\User $user, $notrigger = \false)
    {
    }
    /**
     * Delete object in database
     *
     * @param User $user       User that deletes
     * @param bool $notrigger  false=launch triggers after, true=disable triggers
     * @return int             Return integer <0 if KO, >0 if OK
     */
    public function delete(\User $user, $notrigger = \false)
    {
    }
    /**
     * Return expense categories in array
     *
     * @param	int		$mode	1=only active; 2=only inactive; other value return all
     * @return	array of category
     */
    public function getTaxCategories($mode = 1)
    {
    }
    /**
     * Return an array of ranges for a user
     *
     * @param User  $userauthor         user author id
     * @param int   $fk_c_exp_tax_cat   category
     * @return boolean|array
     */
    public function getRangeByUser(\User $userauthor, int $fk_c_exp_tax_cat)
    {
    }
    /**
     * Return an array of ranges for a category
     *
     * @param int	$fk_c_exp_tax_cat	category id
     * @param int	$active				active
     * @return array
     */
    public function getRangesByCategory(int $fk_c_exp_tax_cat, $active = 1)
    {
    }
    /**
     * Return an array of ranges grouped by category
     *
     * @return array
     */
    public function getAllRanges()
    {
    }
    /**
     * Return the max number of range by a category
     *
     * @param 	int 	$default_c_exp_tax_cat id	Default c_exp_tax_cat
     * @return 	int									Max nb
     */
    public function getMaxRangeNumber($default_c_exp_tax_cat = 0)
    {
    }
}
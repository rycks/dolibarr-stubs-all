<?php

namespace PhpOffice\PhpSpreadsheet\Worksheet\AutoFilter;

class Column
{
    const AUTOFILTER_FILTERTYPE_FILTER = 'filters';
    const AUTOFILTER_FILTERTYPE_CUSTOMFILTER = 'customFilters';
    //    Supports no more than 2 rules, with an And/Or join criteria
    //        if more than 1 rule is defined
    const AUTOFILTER_FILTERTYPE_DYNAMICFILTER = 'dynamicFilter';
    //    Even though the filter rule is constant, the filtered data can vary
    //        e.g. filtered by date = TODAY
    const AUTOFILTER_FILTERTYPE_TOPTENFILTER = 'top10';
    /**
     * Types of autofilter rules.
     *
     * @var string[]
     */
    private static $filterTypes = [
        //    Currently we're not handling
        //        colorFilter
        //        extLst
        //        iconFilter
        self::AUTOFILTER_FILTERTYPE_FILTER,
        self::AUTOFILTER_FILTERTYPE_CUSTOMFILTER,
        self::AUTOFILTER_FILTERTYPE_DYNAMICFILTER,
        self::AUTOFILTER_FILTERTYPE_TOPTENFILTER,
    ];
    // Multiple Rule Connections
    const AUTOFILTER_COLUMN_JOIN_AND = 'and';
    const AUTOFILTER_COLUMN_JOIN_OR = 'or';
    /**
     * Join options for autofilter rules.
     *
     * @var string[]
     */
    private static $ruleJoins = [self::AUTOFILTER_COLUMN_JOIN_AND, self::AUTOFILTER_COLUMN_JOIN_OR];
    /**
     * Autofilter.
     *
     * @var AutoFilter
     */
    private $parent;
    /**
     * Autofilter Column Index.
     *
     * @var string
     */
    private $columnIndex = '';
    /**
     * Autofilter Column Filter Type.
     *
     * @var string
     */
    private $filterType = self::AUTOFILTER_FILTERTYPE_FILTER;
    /**
     * Autofilter Multiple Rules And/Or.
     *
     * @var string
     */
    private $join = self::AUTOFILTER_COLUMN_JOIN_OR;
    /**
     * Autofilter Column Rules.
     *
     * @var array of Column\Rule
     */
    private $ruleset = [];
    /**
     * Autofilter Column Dynamic Attributes.
     *
     * @var array of mixed
     */
    private $attributes = [];
    /**
     * Create a new Column.
     *
     * @param string $pColumn Column (e.g. A)
     * @param AutoFilter $pParent Autofilter for this column
     */
    public function __construct($pColumn, \PhpOffice\PhpSpreadsheet\Worksheet\AutoFilter $pParent = null)
    {
    }
    /**
     * Get AutoFilter Column Index.
     *
     * @return string
     */
    public function getColumnIndex()
    {
    }
    /**
     * Set AutoFilter Column Index.
     *
     * @param string $pColumn Column (e.g. A)
     *
     * @throws PhpSpreadsheetException
     *
     * @return Column
     */
    public function setColumnIndex($pColumn)
    {
    }
    /**
     * Get this Column's AutoFilter Parent.
     *
     * @return AutoFilter
     */
    public function getParent()
    {
    }
    /**
     * Set this Column's AutoFilter Parent.
     *
     * @param AutoFilter $pParent
     *
     * @return Column
     */
    public function setParent(\PhpOffice\PhpSpreadsheet\Worksheet\AutoFilter $pParent = null)
    {
    }
    /**
     * Get AutoFilter Type.
     *
     * @return string
     */
    public function getFilterType()
    {
    }
    /**
     * Set AutoFilter Type.
     *
     * @param string $pFilterType
     *
     * @throws PhpSpreadsheetException
     *
     * @return Column
     */
    public function setFilterType($pFilterType)
    {
    }
    /**
     * Get AutoFilter Multiple Rules And/Or Join.
     *
     * @return string
     */
    public function getJoin()
    {
    }
    /**
     * Set AutoFilter Multiple Rules And/Or.
     *
     * @param string $pJoin And/Or
     *
     * @throws PhpSpreadsheetException
     *
     * @return Column
     */
    public function setJoin($pJoin)
    {
    }
    /**
     * Set AutoFilter Attributes.
     *
     * @param string[] $attributes
     *
     * @return Column
     */
    public function setAttributes(array $attributes)
    {
    }
    /**
     * Set An AutoFilter Attribute.
     *
     * @param string $pName Attribute Name
     * @param string $pValue Attribute Value
     *
     * @return Column
     */
    public function setAttribute($pName, $pValue)
    {
    }
    /**
     * Get AutoFilter Column Attributes.
     *
     * @return string[]
     */
    public function getAttributes()
    {
    }
    /**
     * Get specific AutoFilter Column Attribute.
     *
     * @param string $pName Attribute Name
     *
     * @return string
     */
    public function getAttribute($pName)
    {
    }
    /**
     * Get all AutoFilter Column Rules.
     *
     * @return Column\Rule[]
     */
    public function getRules()
    {
    }
    /**
     * Get a specified AutoFilter Column Rule.
     *
     * @param int $pIndex Rule index in the ruleset array
     *
     * @return Column\Rule
     */
    public function getRule($pIndex)
    {
    }
    /**
     * Create a new AutoFilter Column Rule in the ruleset.
     *
     * @return Column\Rule
     */
    public function createRule()
    {
    }
    /**
     * Add a new AutoFilter Column Rule to the ruleset.
     *
     * @param Column\Rule $pRule
     *
     * @return Column
     */
    public function addRule(\PhpOffice\PhpSpreadsheet\Worksheet\AutoFilter\Column\Rule $pRule)
    {
    }
    /**
     * Delete a specified AutoFilter Column Rule
     * If the number of rules is reduced to 1, then we reset And/Or logic to Or.
     *
     * @param int $pIndex Rule index in the ruleset array
     *
     * @return Column
     */
    public function deleteRule($pIndex)
    {
    }
    /**
     * Delete all AutoFilter Column Rules.
     *
     * @return Column
     */
    public function clearRules()
    {
    }
    /**
     * Implement PHP __clone to create a deep clone, not just a shallow copy.
     */
    public function __clone()
    {
    }
}
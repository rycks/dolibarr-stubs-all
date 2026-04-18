<?php

namespace PhpOffice\PhpSpreadsheet\Style;

class Conditional implements \PhpOffice\PhpSpreadsheet\IComparable
{
    // Condition types
    const CONDITION_NONE = 'none';
    const CONDITION_CELLIS = 'cellIs';
    const CONDITION_CONTAINSTEXT = 'containsText';
    const CONDITION_EXPRESSION = 'expression';
    const CONDITION_CONTAINSBLANKS = 'containsBlanks';
    const CONDITION_NOTCONTAINSBLANKS = 'notContainsBlanks';
    // Operator types
    const OPERATOR_NONE = '';
    const OPERATOR_BEGINSWITH = 'beginsWith';
    const OPERATOR_ENDSWITH = 'endsWith';
    const OPERATOR_EQUAL = 'equal';
    const OPERATOR_GREATERTHAN = 'greaterThan';
    const OPERATOR_GREATERTHANOREQUAL = 'greaterThanOrEqual';
    const OPERATOR_LESSTHAN = 'lessThan';
    const OPERATOR_LESSTHANOREQUAL = 'lessThanOrEqual';
    const OPERATOR_NOTEQUAL = 'notEqual';
    const OPERATOR_CONTAINSTEXT = 'containsText';
    const OPERATOR_NOTCONTAINS = 'notContains';
    const OPERATOR_BETWEEN = 'between';
    /**
     * Condition type.
     *
     * @var string
     */
    private $conditionType = self::CONDITION_NONE;
    /**
     * Operator type.
     *
     * @var string
     */
    private $operatorType = self::OPERATOR_NONE;
    /**
     * Text.
     *
     * @var string
     */
    private $text;
    /**
     * Stop on this condition, if it matches.
     *
     * @var bool
     */
    private $stopIfTrue = false;
    /**
     * Condition.
     *
     * @var string[]
     */
    private $condition = [];
    /**
     * Style.
     *
     * @var Style
     */
    private $style;
    /**
     * Create a new Conditional.
     */
    public function __construct()
    {
    }
    /**
     * Get Condition type.
     *
     * @return string
     */
    public function getConditionType()
    {
    }
    /**
     * Set Condition type.
     *
     * @param string $pValue Condition type, see self::CONDITION_*
     *
     * @return $this
     */
    public function setConditionType($pValue)
    {
    }
    /**
     * Get Operator type.
     *
     * @return string
     */
    public function getOperatorType()
    {
    }
    /**
     * Set Operator type.
     *
     * @param string $pValue Conditional operator type, see self::OPERATOR_*
     *
     * @return $this
     */
    public function setOperatorType($pValue)
    {
    }
    /**
     * Get text.
     *
     * @return string
     */
    public function getText()
    {
    }
    /**
     * Set text.
     *
     * @param string $value
     *
     * @return $this
     */
    public function setText($value)
    {
    }
    /**
     * Get StopIfTrue.
     *
     * @return bool
     */
    public function getStopIfTrue()
    {
    }
    /**
     * Set StopIfTrue.
     *
     * @param bool $value
     *
     * @return $this
     */
    public function setStopIfTrue($value)
    {
    }
    /**
     * Get Conditions.
     *
     * @return string[]
     */
    public function getConditions()
    {
    }
    /**
     * Set Conditions.
     *
     * @param string[] $pValue Condition
     *
     * @return $this
     */
    public function setConditions($pValue)
    {
    }
    /**
     * Add Condition.
     *
     * @param string $pValue Condition
     *
     * @return $this
     */
    public function addCondition($pValue)
    {
    }
    /**
     * Get Style.
     *
     * @return Style
     */
    public function getStyle()
    {
    }
    /**
     * Set Style.
     *
     * @param Style $pValue
     *
     * @return $this
     */
    public function setStyle(\PhpOffice\PhpSpreadsheet\Style\Style $pValue = null)
    {
    }
    /**
     * Get hash code.
     *
     * @return string Hash code
     */
    public function getHashCode()
    {
    }
    /**
     * Implement PHP __clone to create a deep clone, not just a shallow copy.
     */
    public function __clone()
    {
    }
}
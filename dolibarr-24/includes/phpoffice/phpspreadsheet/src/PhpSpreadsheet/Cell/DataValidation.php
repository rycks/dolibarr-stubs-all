<?php

namespace PhpOffice\PhpSpreadsheet\Cell;

class DataValidation
{
    // Data validation types
    const TYPE_NONE = 'none';
    const TYPE_CUSTOM = 'custom';
    const TYPE_DATE = 'date';
    const TYPE_DECIMAL = 'decimal';
    const TYPE_LIST = 'list';
    const TYPE_TEXTLENGTH = 'textLength';
    const TYPE_TIME = 'time';
    const TYPE_WHOLE = 'whole';
    // Data validation error styles
    const STYLE_STOP = 'stop';
    const STYLE_WARNING = 'warning';
    const STYLE_INFORMATION = 'information';
    // Data validation operators
    const OPERATOR_BETWEEN = 'between';
    const OPERATOR_EQUAL = 'equal';
    const OPERATOR_GREATERTHAN = 'greaterThan';
    const OPERATOR_GREATERTHANOREQUAL = 'greaterThanOrEqual';
    const OPERATOR_LESSTHAN = 'lessThan';
    const OPERATOR_LESSTHANOREQUAL = 'lessThanOrEqual';
    const OPERATOR_NOTBETWEEN = 'notBetween';
    const OPERATOR_NOTEQUAL = 'notEqual';
    /**
     * Formula 1.
     *
     * @var string
     */
    private $formula1 = '';
    /**
     * Formula 2.
     *
     * @var string
     */
    private $formula2 = '';
    /**
     * Type.
     *
     * @var string
     */
    private $type = self::TYPE_NONE;
    /**
     * Error style.
     *
     * @var string
     */
    private $errorStyle = self::STYLE_STOP;
    /**
     * Operator.
     *
     * @var string
     */
    private $operator = self::OPERATOR_BETWEEN;
    /**
     * Allow Blank.
     *
     * @var bool
     */
    private $allowBlank = false;
    /**
     * Show DropDown.
     *
     * @var bool
     */
    private $showDropDown = false;
    /**
     * Show InputMessage.
     *
     * @var bool
     */
    private $showInputMessage = false;
    /**
     * Show ErrorMessage.
     *
     * @var bool
     */
    private $showErrorMessage = false;
    /**
     * Error title.
     *
     * @var string
     */
    private $errorTitle = '';
    /**
     * Error.
     *
     * @var string
     */
    private $error = '';
    /**
     * Prompt title.
     *
     * @var string
     */
    private $promptTitle = '';
    /**
     * Prompt.
     *
     * @var string
     */
    private $prompt = '';
    /**
     * Create a new DataValidation.
     */
    public function __construct()
    {
    }
    /**
     * Get Formula 1.
     *
     * @return string
     */
    public function getFormula1()
    {
    }
    /**
     * Set Formula 1.
     *
     * @param string $value
     *
     * @return $this
     */
    public function setFormula1($value)
    {
    }
    /**
     * Get Formula 2.
     *
     * @return string
     */
    public function getFormula2()
    {
    }
    /**
     * Set Formula 2.
     *
     * @param string $value
     *
     * @return $this
     */
    public function setFormula2($value)
    {
    }
    /**
     * Get Type.
     *
     * @return string
     */
    public function getType()
    {
    }
    /**
     * Set Type.
     *
     * @param string $value
     *
     * @return $this
     */
    public function setType($value)
    {
    }
    /**
     * Get Error style.
     *
     * @return string
     */
    public function getErrorStyle()
    {
    }
    /**
     * Set Error style.
     *
     * @param string $value see self::STYLE_*
     *
     * @return $this
     */
    public function setErrorStyle($value)
    {
    }
    /**
     * Get Operator.
     *
     * @return string
     */
    public function getOperator()
    {
    }
    /**
     * Set Operator.
     *
     * @param string $value
     *
     * @return $this
     */
    public function setOperator($value)
    {
    }
    /**
     * Get Allow Blank.
     *
     * @return bool
     */
    public function getAllowBlank()
    {
    }
    /**
     * Set Allow Blank.
     *
     * @param bool $value
     *
     * @return $this
     */
    public function setAllowBlank($value)
    {
    }
    /**
     * Get Show DropDown.
     *
     * @return bool
     */
    public function getShowDropDown()
    {
    }
    /**
     * Set Show DropDown.
     *
     * @param bool $value
     *
     * @return $this
     */
    public function setShowDropDown($value)
    {
    }
    /**
     * Get Show InputMessage.
     *
     * @return bool
     */
    public function getShowInputMessage()
    {
    }
    /**
     * Set Show InputMessage.
     *
     * @param bool $value
     *
     * @return $this
     */
    public function setShowInputMessage($value)
    {
    }
    /**
     * Get Show ErrorMessage.
     *
     * @return bool
     */
    public function getShowErrorMessage()
    {
    }
    /**
     * Set Show ErrorMessage.
     *
     * @param bool $value
     *
     * @return $this
     */
    public function setShowErrorMessage($value)
    {
    }
    /**
     * Get Error title.
     *
     * @return string
     */
    public function getErrorTitle()
    {
    }
    /**
     * Set Error title.
     *
     * @param string $value
     *
     * @return $this
     */
    public function setErrorTitle($value)
    {
    }
    /**
     * Get Error.
     *
     * @return string
     */
    public function getError()
    {
    }
    /**
     * Set Error.
     *
     * @param string $value
     *
     * @return $this
     */
    public function setError($value)
    {
    }
    /**
     * Get Prompt title.
     *
     * @return string
     */
    public function getPromptTitle()
    {
    }
    /**
     * Set Prompt title.
     *
     * @param string $value
     *
     * @return $this
     */
    public function setPromptTitle($value)
    {
    }
    /**
     * Get Prompt.
     *
     * @return string
     */
    public function getPrompt()
    {
    }
    /**
     * Set Prompt.
     *
     * @param string $value
     *
     * @return $this
     */
    public function setPrompt($value)
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
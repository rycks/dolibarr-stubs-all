<?php

namespace PhpOffice\PhpSpreadsheet;

class NamedRange
{
    /**
     * Range name.
     *
     * @var string
     */
    private $name;
    /**
     * Worksheet on which the named range can be resolved.
     *
     * @var Worksheet
     */
    private $worksheet;
    /**
     * Range of the referenced cells.
     *
     * @var string
     */
    private $range;
    /**
     * Is the named range local? (i.e. can only be used on $this->worksheet).
     *
     * @var bool
     */
    private $localOnly;
    /**
     * Scope.
     *
     * @var Worksheet
     */
    private $scope;
    /**
     * Create a new NamedRange.
     *
     * @param string $pName
     * @param Worksheet $pWorksheet
     * @param string $pRange
     * @param bool $pLocalOnly
     * @param null|Worksheet $pScope Scope. Only applies when $pLocalOnly = true. Null for global scope.
     *
     * @throws Exception
     */
    public function __construct($pName, \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $pWorksheet, $pRange = 'A1', $pLocalOnly = false, $pScope = null)
    {
    }
    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
    }
    /**
     * Set name.
     *
     * @param string $value
     *
     * @return $this
     */
    public function setName($value)
    {
    }
    /**
     * Get worksheet.
     *
     * @return Worksheet
     */
    public function getWorksheet()
    {
    }
    /**
     * Set worksheet.
     *
     * @param Worksheet $value
     *
     * @return $this
     */
    public function setWorksheet(\PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $value = null)
    {
    }
    /**
     * Get range.
     *
     * @return string
     */
    public function getRange()
    {
    }
    /**
     * Set range.
     *
     * @param string $value
     *
     * @return $this
     */
    public function setRange($value)
    {
    }
    /**
     * Get localOnly.
     *
     * @return bool
     */
    public function getLocalOnly()
    {
    }
    /**
     * Set localOnly.
     *
     * @param bool $value
     *
     * @return $this
     */
    public function setLocalOnly($value)
    {
    }
    /**
     * Get scope.
     *
     * @return null|Worksheet
     */
    public function getScope()
    {
    }
    /**
     * Set scope.
     *
     * @param null|Worksheet $value
     *
     * @return $this
     */
    public function setScope(\PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $value = null)
    {
    }
    /**
     * Resolve a named range to a regular cell range.
     *
     * @param string $pNamedRange Named range
     * @param null|Worksheet $pSheet Scope. Use null for global scope
     *
     * @return NamedRange
     */
    public static function resolveRange($pNamedRange, \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $pSheet)
    {
    }
    /**
     * Implement PHP __clone to create a deep clone, not just a shallow copy.
     */
    public function __clone()
    {
    }
}
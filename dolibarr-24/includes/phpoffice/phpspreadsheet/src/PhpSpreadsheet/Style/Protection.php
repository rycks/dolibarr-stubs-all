<?php

namespace PhpOffice\PhpSpreadsheet\Style;

class Protection extends \PhpOffice\PhpSpreadsheet\Style\Supervisor
{
    /** Protection styles */
    const PROTECTION_INHERIT = 'inherit';
    const PROTECTION_PROTECTED = 'protected';
    const PROTECTION_UNPROTECTED = 'unprotected';
    /**
     * Locked.
     *
     * @var string
     */
    protected $locked;
    /**
     * Hidden.
     *
     * @var string
     */
    protected $hidden;
    /**
     * Create a new Protection.
     *
     * @param bool $isSupervisor Flag indicating if this is a supervisor or not
     *                                    Leave this value at default unless you understand exactly what
     *                                        its ramifications are
     * @param bool $isConditional Flag indicating if this is a conditional style or not
     *                                    Leave this value at default unless you understand exactly what
     *                                        its ramifications are
     */
    public function __construct($isSupervisor = false, $isConditional = false)
    {
    }
    /**
     * Get the shared style component for the currently active cell in currently active sheet.
     * Only used for style supervisor.
     *
     * @return Protection
     */
    public function getSharedComponent()
    {
    }
    /**
     * Build style array from subcomponents.
     *
     * @param array $array
     *
     * @return array
     */
    public function getStyleArray($array)
    {
    }
    /**
     * Apply styles from array.
     *
     * <code>
     * $spreadsheet->getActiveSheet()->getStyle('B2')->getLocked()->applyFromArray(
     *     [
     *         'locked' => TRUE,
     *         'hidden' => FALSE
     *     ]
     * );
     * </code>
     *
     * @param array $pStyles Array containing style information
     *
     * @throws PhpSpreadsheetException
     *
     * @return $this
     */
    public function applyFromArray(array $pStyles)
    {
    }
    /**
     * Get locked.
     *
     * @return string
     */
    public function getLocked()
    {
    }
    /**
     * Set locked.
     *
     * @param string $pValue see self::PROTECTION_*
     *
     * @return $this
     */
    public function setLocked($pValue)
    {
    }
    /**
     * Get hidden.
     *
     * @return string
     */
    public function getHidden()
    {
    }
    /**
     * Set hidden.
     *
     * @param string $pValue see self::PROTECTION_*
     *
     * @return $this
     */
    public function setHidden($pValue)
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
}
<?php

namespace PhpOffice\PhpSpreadsheet\Document;

class Security
{
    /**
     * LockRevision.
     *
     * @var bool
     */
    private $lockRevision = false;
    /**
     * LockStructure.
     *
     * @var bool
     */
    private $lockStructure = false;
    /**
     * LockWindows.
     *
     * @var bool
     */
    private $lockWindows = false;
    /**
     * RevisionsPassword.
     *
     * @var string
     */
    private $revisionsPassword = '';
    /**
     * WorkbookPassword.
     *
     * @var string
     */
    private $workbookPassword = '';
    /**
     * Create a new Document Security instance.
     */
    public function __construct()
    {
    }
    /**
     * Is some sort of document security enabled?
     *
     * @return bool
     */
    public function isSecurityEnabled()
    {
    }
    /**
     * Get LockRevision.
     *
     * @return bool
     */
    public function getLockRevision()
    {
    }
    /**
     * Set LockRevision.
     *
     * @param bool $pValue
     *
     * @return $this
     */
    public function setLockRevision($pValue)
    {
    }
    /**
     * Get LockStructure.
     *
     * @return bool
     */
    public function getLockStructure()
    {
    }
    /**
     * Set LockStructure.
     *
     * @param bool $pValue
     *
     * @return $this
     */
    public function setLockStructure($pValue)
    {
    }
    /**
     * Get LockWindows.
     *
     * @return bool
     */
    public function getLockWindows()
    {
    }
    /**
     * Set LockWindows.
     *
     * @param bool $pValue
     *
     * @return $this
     */
    public function setLockWindows($pValue)
    {
    }
    /**
     * Get RevisionsPassword (hashed).
     *
     * @return string
     */
    public function getRevisionsPassword()
    {
    }
    /**
     * Set RevisionsPassword.
     *
     * @param string $pValue
     * @param bool $pAlreadyHashed If the password has already been hashed, set this to true
     *
     * @return $this
     */
    public function setRevisionsPassword($pValue, $pAlreadyHashed = false)
    {
    }
    /**
     * Get WorkbookPassword (hashed).
     *
     * @return string
     */
    public function getWorkbookPassword()
    {
    }
    /**
     * Set WorkbookPassword.
     *
     * @param string $pValue
     * @param bool $pAlreadyHashed If the password has already been hashed, set this to true
     *
     * @return $this
     */
    public function setWorkbookPassword($pValue, $pAlreadyHashed = false)
    {
    }
    /**
     * Implement PHP __clone to create a deep clone, not just a shallow copy.
     */
    public function __clone()
    {
    }
}
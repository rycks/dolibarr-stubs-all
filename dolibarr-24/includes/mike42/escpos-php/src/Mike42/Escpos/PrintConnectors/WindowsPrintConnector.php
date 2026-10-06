<?php

namespace Mike42\Escpos\PrintConnectors;

/**
 * Connector for sending print jobs to
 * - local ports on windows (COM1, LPT1, etc)
 * - shared (SMB) printers from any platform (smb://server/foo)
 * For USB printers or other ports, the trick is to share the printer with a
 * generic text driver, then connect to the shared printer locally.
 */
class WindowsPrintConnector implements \Mike42\Escpos\PrintConnectors\PrintConnector
{
    /**
     * @var array $buffer
     *  Accumulated lines of output for later use.
     */
    private $buffer;
    /**
     * @var string $hostname
     *  The hostname of the target machine, or null if this is a local connection.
     */
    private $hostname;
    /**
     * @var boolean $isLocal
     *  True if a port is being used directly (must be Windows), false if network shares will be used.
     */
    private $isLocal;
    /**
     * @var int $platform
     *  Platform we're running on, for selecting different commands. See PLATFORM_* constants.
     */
    private $platform;
    /**
     * @var string $printerName
     *  The name of the target printer (eg "Foo Printer") or port ("COM1", "LPT1").
     */
    private $printerName;
    /**
     * @var string $userName
     *  Login name for network printer, or null if not using authentication.
     */
    private $userName;
    /**
     * @var string $userPassword
     *  Password for network printer, or null if no password is required.
     */
    private $userPassword;
    /**
     * @var string $workgroup
     *  Workgroup that the printer is located on
     */
    private $workgroup;
    /**
     * Represents Linux
     */
    const PLATFORM_LINUX = 0;
    /**
     * Represents Mac
     */
    const PLATFORM_MAC = 1;
    /**
     * Represents Windows
     */
    const PLATFORM_WIN = 2;
    /**
     * Valid local ports.
     */
    const REGEX_LOCAL = "/^(LPT\\d|COM\\d)\$/";
    /**
     * Valid printer name.
     */
    const REGEX_PRINTERNAME = "/^[\\d\\w-]+(\\s[\\d\\w-]+)*\$/";
    /**
     * Valid smb:// URI containing hostname & printer with optional user & optional password only.
     */
    const REGEX_SMB = "/^smb:\\/\\/([\\s\\d\\w-]+(:[\\s\\d\\w+-]+)?@)?([\\d\\w-]+\\.)*[\\d\\w-]+\\/([\\d\\w-]+\\/)?[\\d\\w-]+(\\s[\\d\\w-]+)*\$/";
    /**
     * @param string $dest
     * @throws BadMethodCallException
     */
    public function __construct($dest)
    {
    }
    public function __destruct()
    {
    }
    public function finalize()
    {
    }
    /**
     * Send job to printer -- platform-specific Linux code.
     *
     * @param string $data Print data
     * @throws Exception
     */
    protected function finalizeLinux($data)
    {
    }
    /**
     * Send job to printer -- platform-specific Mac code.
     *
     * @param string $data Print data
     * @throws Exception
     */
    protected function finalizeMac($data)
    {
    }
    /**
     * Send data to printer -- platform-specific Windows code.
     *
     * @param string $data
     */
    protected function finalizeWin($data)
    {
    }
    /**
     * @return string Current platform. Separated out for testing purposes.
     */
    protected function getCurrentPlatform()
    {
    }
    /* (non-PHPdoc)
     * @see PrintConnector::read()
     */
    public function read($len)
    {
    }
    /**
     * Run a command, pass it data, and retrieve its return value, standard output, and standard error.
     *
     * @param string $command the command to run.
     * @param string $outputStr variable to fill with standard output.
     * @param string $errorStr variable to fill with standard error.
     * @param string $inputStr text to pass to the command's standard input (optional).
     * @return number
     */
    protected function runCommand($command, &$outputStr, &$errorStr, $inputStr = null)
    {
    }
    /**
     * Copy a file. Separated out so that nothing is actually printed during test runs.
     *
     * @param string $from Source file
     * @param string $to Destination file
     * @return boolean True if copy was successful, false otherwise
     */
    protected function runCopy($from, $to)
    {
    }
    /**
     * Write data to a file. Separated out so that nothing is actually printed during test runs.
     *
     * @param string $data Data to print
     * @param string $filename Destination file
     * @return boolean True if write was successful, false otherwise
     */
    protected function runWrite($data, $filename)
    {
    }
    public function write($data)
    {
    }
}
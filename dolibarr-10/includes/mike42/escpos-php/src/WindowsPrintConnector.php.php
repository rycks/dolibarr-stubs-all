<?php

/**
 * escpos-php, a Thermal receipt printer library, for use with
 * ESC/POS compatible printers.
 *
 * Copyright (c) 2014-2015 Michael Billington <michael.billington@gmail.com>,
 * 	incorporating modifications by:
 *  - Roni Saha <roni.cse@gmail.com>
 *  - Gergely Radics <gerifield@ustream.tv>
 *  - Warren Doyle <w.doyle@fuelled.co>
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 * 
 * Connector for sending print jobs to
 * - local ports on windows (COM1, LPT1, etc)
 * - shared (SMB) printers from any platform (\\server\foo)
 * For USB printers or other ports, the trick is to share the printer with a generic text driver, then access it locally.
 */
class WindowsPrintConnector implements \PrintConnector
{
    /**
     * @var array Accumulated lines of output for later use.
     */
    private $buffer;
    /**
     * @var string The hostname of the target machine, or null if this is a local connection.
     */
    private $hostname;
    /**
     * @var boolean True if a port is being used directly (must be Windows), false if network shares will be used.
     */
    private $isLocal;
    /**
     * @var int Platform we're running on, for selecting different commands. See PLATFORM_* constants.
     */
    private $platform;
    /**
     * @var string The name of the target printer (eg "Foo Printer") or port ("COM1", "LPT1").
     */
    private $printerName;
    /**
     * @var string Login name for network printer, or null if not using authentication.
     */
    private $userName;
    /**
     * @var string Password for network printer, or null if no password is required.
     */
    private $userPassword;
    /**
     * @var string Workgroup that the printer is located on
     */
    private $workgroup;
    /**
     * @var int represents Linux
     */
    const PLATFORM_LINUX = 0;
    /**
     * @var int represents Mac
     */
    const PLATFORM_MAC = 1;
    /**
     * @var int represents Windows
     */
    const PLATFORM_WIN = 2;
    /**
     * @var string Valid local ports.
     */
    const REGEX_LOCAL = "/^(LPT\\d|COM\\d)\$/";
    /**
     * @var string Valid printer name.
     */
    const REGEX_PRINTERNAME = "/^[\\w-]+(\\s[\\w-]+)*\$/";
    /**
     * @var string Valid smb:// URI containing hostname & printer with optional user & optional password only.
     */
    const REGEX_SMB = "/^smb:\\/\\/([\\s\\w-]+(:[\\s\\w-]+)?@)?[\\w-]+\\/([\\w-]+\\/)?[\\w-]+(\\s[\\w-]+)*\$/";
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
    protected function runCommand($command, &$outputStr, &$errorStr, $inputStr = \null)
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
     * @param string $to Destination file
     * @return boolean True if write was successful, false otherwise
     */
    protected function runWrite($data, $to)
    {
    }
    public function write($data)
    {
    }
}
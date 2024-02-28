<?php

/*
 * Copyright (C)           Walter Torres        <walter@torres.ws> [with a *lot* of help!]
 * Copyright (C) 2005-2015 Laurent Destailleur  <eldy@users.sourceforge.net>
 * Copyright (C) 2006-2011 Regis Houssin
 * Copyright (C) 2016      Jonathan TISSEAU     <jonathan.tisseau@86dev.fr>
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */
/**
 *	\file       htdocs/core/class/smtps.class.php
 *	\brief      Class to construct and send SMTP compliant email, even to a secure
 *              SMTP server, regardless of platform.
 * Goals:
 *  - mime compliant
 *  - multiple Reciptiants
 *    - TO
 *    - CC
 *    - BCC
 *  - multi-part message
 *    - plain text
 *    - HTML
 *    - inline attachments
 *    - attachments
 *  - GPG access
 * This Class is based off of 'SMTP PHP MAIL' by Dirk Paehl, http://www.paehl.de
 */
/**
 * 	Class to construct and send SMTP compliant email, even
 * 	to a secure SMTP server, regardless of platform.
 */
class SMTPs
{
    /**
     * Host Name or IP of SMTP Server to use
     */
    private $_smtpsHost = 'localhost';
    /**
     * SMTP Server Port definition. 25 is default value
     * This can be defined via a INI file or via a setter method
     */
    private $_smtpsPort = '25';
    /**
     * Secure SMTP Server access ID
     * This can be defined via a INI file or via a setter method
     */
    private $_smtpsID = \null;
    /**
     * Secure SMTP Server access Password
     * This can be defined via a INI file or via a setter method
     */
    private $_smtpsPW = \null;
    /**
     * Who sent the Message
     * This can be defined via a INI file or via a setter method
     */
    private $_msgFrom = \null;
    /**
     * Where are replies and errors to be sent to
     * This can be defined via a INI file or via a setter method
     */
    private $_msgReplyTo = \null;
    /**
     * Who will the Message be sent to; TO, CC, BCC
     * Multi-diminsional array containg addresses the message will
     * be sent TO, CC or BCC
     */
    private $_msgRecipients = \null;
    /**
     * Message Subject
     */
    private $_msgSubject = \null;
    /**
     * Message Content
     */
    private $_msgContent = \null;
    /**
     * Custom X-Headers
     */
    private $_msgXheader = \null;
    /**
     * Character set
     * Defaulted to 'iso-8859-1'
     */
    private $_smtpsCharSet = 'iso-8859-1';
    /**
     * Message Sensitivity
     * Defaults to ZERO - None
     */
    private $_msgSensitivity = 0;
    /**
     * Message Sensitivity
     */
    private $_arySensitivity = array(\false, 'Personal', 'Private', 'Company Confidential');
    /**
     * Message Sensitivity
     * Defaults to 3 - Normal
     */
    private $_msgPriority = 3;
    /**
     * Message Priority
     */
    private $_aryPriority = array('Bulk', 'Highest', 'High', 'Normal', 'Low', 'Lowest');
    /**
     * Content-Transfer-Encoding
     * Defaulted to 0 - 7bit
     */
    private $_smtpsTransEncodeType = 0;
    /**
     * Content-Transfer-Encoding
     */
    private $_smtpsTransEncodeTypes = array(
        '7bit',
        // Simple 7-bit ASCII
        '8bit',
        // 8-bit coding with line termination characters
        'base64',
        // 3 octets encoded into 4 sextets with offset
        'binary',
        // Arbitrary binary stream
        'mac-binhex40',
        // Macintosh binary to hex encoding
        'quoted-printable',
        // Mostly 7-bit, with 8-bit characters encoded as "=HH"
        'uuencode',
    );
    // UUENCODE encoding
    /**
     * Content-Transfer-Encoding
     * Defaulted to '7bit'
     */
    private $_smtpsTransEncode = '7bit';
    /**
     * Boundary String for MIME seperation
     */
    private $_smtpsBoundary = \null;
    /**
     * Related Boundary
     */
    private $_smtpsRelatedBoundary = \null;
    /**
     * Alternative Boundary
     */
    private $_smtpsAlternativeBoundary = \null;
    /**
     * Determines the method inwhich the message are to be sent.
     * - 'sockets' [0] - conect via network to SMTP server - default
     * - 'pipe     [1] - use UNIX path to EXE
     * - 'phpmail  [2] - use the PHP built-in mail function
     * NOTE: Only 'sockets' is implemented
     */
    private $_transportType = 0;
    /**
     * If '$_transportType' is set to '1', then this variable is used
     * to define the UNIX file system path to the sendmail execuable
     */
    private $_mailPath = '/usr/lib/sendmail';
    /**
     * Sets the SMTP server timeout in seconds.
     */
    private $_smtpTimeout = 10;
    /**
     * Determines whether to calculate message MD5 checksum.
     */
    private $_smtpMD5 = \false;
    /**
     * Class error codes and messages
     */
    private $_smtpsErrors = \null;
    /**
     * Defines log level
     *  0 - no logging
     *  1 - connectivity logging
     *  2 - message generation logging
     *  3 - detail logging
     */
    private $_log_level = 0;
    /**
     * Place Class in" debug" mode
     */
    private $_debug = \false;
    // @CHANGE LDR
    public $log = '';
    private $_errorsTo = '';
    private $_deliveryReceipt = 0;
    private $_trackId = '';
    private $_moreInHeader = '';
    /**
     * Set delivery receipt
     *
     * @param	int		$_val		Value
     * @return	void
     */
    public function setDeliveryReceipt($_val = 0)
    {
    }
    /**
     * get delivery receipt
     *
     * @return	int		Delivery receipt
     */
    public function getDeliveryReceipt()
    {
    }
    /**
     * Set trackid
     *
     * @param	string		$_val		Value
     * @return	void
     */
    public function setTrackId($_val = '')
    {
    }
    /**
     * Set moreInHeader
     *
     * @param	string		$_val		Value
     * @return	void
     */
    public function setMoreInHeader($_val = '')
    {
    }
    /**
     * get trackid
     *
     * @return	string		Track id
     */
    public function getTrackId()
    {
    }
    /**
     * get moreInHeader
     *
     * @return	string		moreInHeader
     */
    public function getMoreInHeader()
    {
    }
    /**
     * Set errors to
     *
     * @param	string		$_strErrorsTo		Errors to
     * @return	void
     */
    public function setErrorsTo($_strErrorsTo)
    {
    }
    /**
     * Get errors to
     *
     * @param	boolean		$_part		Variant
     * @return	string					Errors to
     */
    public function getErrorsTo($_part = \true)
    {
    }
    /**
     * Set debug
     *
     * @param	boolean		$_vDebug		Value for debug
     * @return 	void
     */
    public function setDebug($_vDebug = \false)
    {
    }
    /**
     * build RECIPIENT List, all addresses who will recieve this message
     *
     * @return void
     */
    public function buildRCPTlist()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Attempt a connection to mail server
     *
     * @return mixed  $_retVal   Boolean indicating success or failure on connection
     */
    private function _server_connect()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Attempt mail server authentication for a secure connection
     *
     * @return boolean|null  $_retVal   Boolean indicating success or failure of authentication
     */
    private function _server_authenticate()
    {
    }
    /**
     * Now send the message
     *
     * @param  boolean $_bolTestMsg  whether to run this method in 'Test' mode.
     * @param  boolean $_bolDebug    whether to log all communication between this Class and the Mail Server.
     * @return boolean|null   void
     *                 $_strMsg      If this is run in 'Test' mode, the actual message structure will be returned
     */
    public function sendMsg($_bolTestMsg = \false, $_bolDebug = \false)
    {
    }
    // =============================================================
    // ** Setter & Getter methods
    // ** Basic System configuration
    /**
     * setConfig() is used to populate select class properties from either
     * a user defined INI file or the systems 'php.ini' file
     *
     * If a user defined INI is to be used, the files complete path is passed
     * as the method single parameter. The INI can define any class and/or
     * user properties. Only properties defined within this file will be setter
     * and/or orverwritten
     *
     * If the systems 'php.ini' file is to be used, the method is called without
     * parameters. In this case, only HOST, PORT and FROM properties will be set
     * as they are the only properties that are defined within the 'php.ini'.
     *
     * If secure SMTP is to be used, the user ID and Password can be defined with
     * the user INI file, but the properties are not defined with the systems
     * 'php.ini'file, they must be defined via their setter methods
     *
     * This method can be called twice, if desired. Once without a parameter to
     * load the properties as defined within the systems 'php.ini' file, and a
     * second time, with a path to a user INI file for other properties to be
     * defined.
     *
     * @param mixed $_strConfigPath path to config file or VOID
     * @return boolean
     */
    public function setConfig($_strConfigPath = \null)
    {
    }
    /**
     * Determines the method inwhich the messages are to be sent.
     * - 'sockets' [0] - conect via network to SMTP server
     * - 'pipe     [1] - use UNIX path to EXE
     * - 'phpmail  [2] - use the PHP built-in mail function
     *
     * @param int $_type  Interger value representing Mail Transport Type
     * @return void
     */
    public function setTransportType($_type = 0)
    {
    }
    /**
     * Return the method inwhich the message is to be sent.
     * - 'sockets' [0] - conect via network to SMTP server
     * - 'pipe     [1] - use UNIX path to EXE
     * - 'phpmail  [2] - use the PHP built-in mail function
     *
     * @return int $_strHost Host Name or IP of the Mail Server to use
     */
    public function getTransportType()
    {
    }
    /**
     * Path to the sendmail execuable
     *
     * @param string $_path Path to the sendmail execuable
     * @return boolean
     *
     */
    public function setMailPath($_path)
    {
    }
    /**
     * Defines the Host Name or IP of the Mail Server to use.
     * This is defaulted to 'localhost'
     * This is  used only with 'socket' based mail transmission
     *
     * @param 	string 	$_strHost 		Host Name or IP of the Mail Server to use
     * @return 	void
     */
    public function setHost($_strHost)
    {
    }
    /**
     * Retrieves the Host Name or IP of the Mail Server to use
     * This is  used only with 'socket' based mail transmission
     *
     * @return 	string 	$_strHost 		Host Name or IP of the Mail Server to use
     */
    public function getHost()
    {
    }
    /**
     * Defines the Port Number of the Mail Server to use
     * This is defaulted to '25'
     * This is  used only with 'socket' based mail transmission
     *
     * @param 	int 	$_intPort 		Port Number of the Mail Server to use
     * @return 	void
     */
    public function setPort($_intPort)
    {
    }
    /**
     * Retrieves the Port Number of the Mail Server to use
     * This is  used only with 'socket' based mail transmission
     *
     * @return 	string 		Port Number of the Mail Server to use
     */
    public function getPort()
    {
    }
    /**
     * User Name for authentication on Mail Server
     *
     * @param 	string 	$_strID 	User Name for authentication on Mail Server
     * @return 	void
     */
    public function setID($_strID)
    {
    }
    /**
     * Retrieves the User Name for authentication on Mail Server
     *
     * @return string 	User Name for authentication on Mail Server
     */
    public function getID()
    {
    }
    /**
     * User Password for authentication on Mail Server
     *
     * @param 	string 	$_strPW 	User Password for authentication on Mail Server
     * @return 	void
     */
    public function setPW($_strPW)
    {
    }
    /**
     * Retrieves the User Password for authentication on Mail Server
     *
     * @return 	string 		User Password for authentication on Mail Server
     */
    public function getPW()
    {
    }
    /**
     * Character set used for current message
     * Character set is defaulted to 'iso-8859-1';
     *
     * @param string $_strCharSet Character set used for current message
     * @return void
     */
    public function setCharSet($_strCharSet)
    {
    }
    /**
     * Retrieves the Character set used for current message
     *
     * @return string $_smtpsCharSet Character set used for current message
     */
    public function getCharSet()
    {
    }
    /**
     * Content-Transfer-Encoding, Defaulted to '7bit'
     * This can be changed for 2byte characers sets
     * Known Encode Types
     *  - 7bit               Simple 7-bit ASCII
     *  - 8bit               8-bit coding with line termination characters
     *  - base64             3 octets encoded into 4 sextets with offset
     *  - binary             Arbitrary binary stream
     *  - mac-binhex40       Macintosh binary to hex encoding
     *  - quoted-printable   Mostly 7-bit, with 8-bit characters encoded as "=HH"
     *  - uuencode           UUENCODE encoding
     *
     * @param string $_strTransEncode Content-Transfer-Encoding
     * @return void
     */
    public function setTransEncode($_strTransEncode)
    {
    }
    /**
     * Retrieves the Content-Transfer-Encoding
     *
     * @return string $_smtpsTransEncode Content-Transfer-Encoding
     */
    public function getTransEncode()
    {
    }
    /**
     * Content-Transfer-Encoding, Defaulted to '0' [ZERO]
     * This can be changed for 2byte characers sets
     * Known Encode Types
     *  - [0] 7bit               Simple 7-bit ASCII
     *  - [1] 8bit               8-bit coding with line termination characters
     *  - [2] base64             3 octets encoded into 4 sextets with offset
     *  - [3] binary             Arbitrary binary stream
     *  - [4] mac-binhex40       Macintosh binary to hex encoding
     *  - [5] quoted-printable   Mostly 7-bit, with 8-bit characters encoded as "=HH"
     *  - [6] uuencode           UUENCODE encoding
     *
     * @param string $_strTransEncodeType Content-Transfer-Encoding
     * @return void
     *
     */
    public function setTransEncodeType($_strTransEncodeType)
    {
    }
    /**
     * Retrieves the Content-Transfer-Encoding
     *
     * @return 	string 		Content-Transfer-Encoding
     */
    public function getTransEncodeType()
    {
    }
    // ** Message Construction
    /**
     * FROM Address from which mail will be sent
     *
     * @param 	string 	$_strFrom 	Address from which mail will be sent
     * @return 	void
     */
    public function setFrom($_strFrom)
    {
    }
    /**
     * Retrieves the Address from which mail will be sent
     *
     * @param  	boolean $_part		To "strip" 'Real name' from address
     * @return 	string 				Address from which mail will be sent
     */
    public function getFrom($_part = \true)
    {
    }
    /**
     * Reply-To Address from which mail will be the reply-to
     *
     * @param 	string 	$_strReplyTo 	Address from which mail will be the reply-to
     * @return 	void
     */
    public function setReplyTo($_strReplyTo)
    {
    }
    /**
     * Retrieves the Address from which mail will be the reply-to
     *
     * @param  	boolean $_part		To "strip" 'Real name' from address
     * @return 	string 				Address from which mail will be the reply-to
     */
    public function getReplyTo($_part = \true)
    {
    }
    /**
     * Inserts given addresses into structured format.
     * This method takes a list of given addresses, via an array
     * or a COMMA delimted string, and inserts them into a highly
     * structured array. This array is designed to remove duplicate
     * addresses and to sort them by Domain.
     *
     * @param 	string 	$_type 			TO, CC, or BCC lists to add addrresses into
     * @param 	mixed 	$_addrList 		Array or COMMA delimited string of addresses
     * @return void
     *
     */
    private function _buildAddrList($_type, $_addrList)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Returns an array of the various parts of an email address
     * This assumes a well formed address:
     * - "Real name" <username@domain.tld>
     * - "Real Name" is optional
     * - if "Real Name" does not exist, the angle brackets are optional
     * This will split an email address into 4 or 5 parts.
     * - $_aryEmail[org]  = orignal string
     * - $_aryEmail[real] = "real name" - if there is one
     * - $_aryEmail[addr] = address part "username@domain.tld"
     * - $_aryEmail[host] = "domain.tld"
     * - $_aryEmail[user] = "userName"
     *
     *	@param		string		$_strAddr		Email address
     * 	@return 	array	 					An array of the various parts of an email address
     */
    private function _strip_email($_strAddr)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Returns an array of bares addresses for use with 'RCPT TO:'
     * This is a "build as you go" method. Each time this method is called
     * the underlaying array is destroyed and reconstructed.
     *
     * @return 		array		Returns an array of bares addresses
     */
    public function get_RCPT_list()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Returns an array of addresses for a specific type; TO, CC or BCC
     *
     * @param 		string 	       $_which 	    Which collection of addresses to return ('to', 'cc', 'bcc')
     * @return 		string|false 				Array of emaill address
     */
    public function get_email_list($_which = \null)
    {
    }
    /**
     * TO Address[es] inwhich to send mail to
     *
     * @param 	string 	$_addrTo 	TO Address[es] inwhich to send mail to
     * @return 	void
     */
    public function setTO($_addrTo)
    {
    }
    /**
     * Retrieves the TO Address[es] inwhich to send mail to
     *
     * @return 	string 	TO Address[es] inwhich to send mail to
     */
    public function getTo()
    {
    }
    /**
     * CC Address[es] inwhich to send mail to
     *
     * @param 	string	$_strCC		CC Address[es] inwhich to send mail to
     * @return 	void
     */
    public function setCC($_strCC)
    {
    }
    /**
     * Retrieves the CC Address[es] inwhich to send mail to
     *
     * @return 	string 		CC Address[es] inwhich to send mail to
     */
    public function getCC()
    {
    }
    /**
     * BCC Address[es] inwhich to send mail to
     *
     * @param 	string		$_strBCC	Recipients BCC Address[es] inwhich to send mail to
     * @return 	void
     */
    public function setBCC($_strBCC)
    {
    }
    /**
     * Retrieves the BCC Address[es] inwhich to send mail to
     *
     * @return 	string		BCC Address[es] inwhich to send mail to
     */
    public function getBCC()
    {
    }
    /**
     * Message Subject
     *
     * @param 	string 	$_strSubject	Message Subject
     * @return 	void
     */
    public function setSubject($_strSubject = '')
    {
    }
    /**
     * Retrieves the Message Subject
     *
     * @return 	string 		Message Subject
     */
    public function getSubject()
    {
    }
    /**
     * Constructes and returns message header
     *
     * @return string Complete message header
     */
    public function getHeader()
    {
    }
    /**
     * Message Content
     *
     * @param 	string 	$strContent		Message Content
     * @param	string	$strType		Type
     * @return 	void
     */
    public function setBodyContent($strContent, $strType = 'plain')
    {
    }
    /**
     * Retrieves the Message Content
     *
     * @return 	string			Message Content
     */
    public function getBodyContent()
    {
    }
    /**
     * File attachments are added to the content array as sub-arrays,
     * allowing for multiple attachments for each outbound email
     *
     * @param string $strContent  File data to attach to message
     * @param string $strFileName File Name to give to attachment
     * @param string $strMimeType File Mime Type of attachment
     * @return void
     */
    public function setAttachment($strContent, $strFileName = 'unknown', $strMimeType = 'unknown')
    {
    }
    // @CHANGE LDR
    /**
     * Image attachments are added to the content array as sub-arrays,
     * allowing for multiple images for each outbound email
     *
     * @param 	string $strContent  	Image data to attach to message
     * @param 	string $strImageName 	Image Name to give to attachment
     * @param 	string $strMimeType 	Image Mime Type of attachment
     * @param 	string $strImageCid		CID
     * @return 	void
     */
    public function setImageInline($strContent, $strImageName = 'unknown', $strMimeType = 'unknown', $strImageCid = 'unknown')
    {
    }
    // END @CHANGE LDR
    /**
     * Message Content Sensitivity
     * Message Sensitivity values:
     *   - [0] None - default
     *   - [1] Personal
     *   - [2] Private
     *   - [3] Company Confidential
     *
     * @param 	integer	$_value		Message Sensitivity
     * @return 	void
     */
    public function setSensitivity($_value = 0)
    {
    }
    /**
     * Returns Message Content Sensitivity string
     * Message Sensitivity values:
     *   - [0] None - default
     *   - [1] Personal
     *   - [2] Private
     *   - [3] Company Confidential
     *
     * @return 	void
     */
    public function getSensitivity()
    {
    }
    /**
     * Message Content Priority
     * Message Priority values:
     *  - [0] 'Bulk'
     *  - [1] 'Highest'
     *  - [2] 'High'
     *  - [3] 'Normal' - default
     *  - [4] 'Low'
     *  - [5] 'Lowest'
     *
     * @param 	integer 	$_value 	Message Priority
     * @return 	void
     */
    public function setPriority($_value = 3)
    {
    }
    /**
     * Message Content Priority
     * Message Priority values:
     *  - [0] 'Bulk'
     *  - [1] 'Highest'
     *  - [2] 'High'
     *  - [3] 'Normal' - default
     *  - [4] 'Low'
     *  - [5] 'Lowest'
     *
     * @return string
     */
    public function getPriority()
    {
    }
    /**
     * Set flag which determines whether to calculate message MD5 checksum.
     *
     * @param 	string 	$_flag		Message Priority
     * @return 	void
     */
    public function setMD5flag($_flag = \false)
    {
    }
    /**
     * Gets flag which determines whether to calculate message MD5 checksum.
     *
     * @return 	boolean 				Message Priority
     */
    public function getMD5flag()
    {
    }
    /**
     * Message X-Header Content
     * This is a simple "insert". Whatever is given will be placed
     * "as is" into the Xheader array.
     *
     * @param string $strXdata Message X-Header Content
     * @return void
     */
    public function setXheader($strXdata)
    {
    }
    /**
     * Retrieves the Message X-Header Content
     *
     * @return string[] $_msgContent Message X-Header Content
     */
    public function getXheader()
    {
    }
    /**
     * Generates Random string for MIME message Boundary
     *
     * @return void
     */
    private function _setBoundary()
    {
    }
    /**
     * Retrieves the MIME message Boundary
     *
     * @param  string $type				Type of boundary
     * @return string $_smtpsBoundary 	MIME message Boundary
     */
    private function _getBoundary($type = 'mixed')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * This function has been modified as provided by SirSir to allow multiline responses when
     * using SMTP Extensions
     *
     * @param	resource    $socket			Socket handler
     * @param	string		$response		Response. Example: "550 5.7.1  https://support.google.com/a/answer/6140680#invalidcred j21sm814390wre.3"
     * @return	boolean						True or false
     */
    public function server_parse($socket, $response)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Send str
     *
     * @param	string		$_strSend		String to send
     * @param 	string		$_returnCode	Return code
     * @param 	string		$CRLF			CRLF
     * @return 	boolean|null						True or false
     */
    public function socket_send_str($_strSend, $_returnCode = \null, $CRLF = "\r\n")
    {
    }
    // =============================================================
    // ** Error handling methods
    /**
     * Defines errors codes and messages for Class
     *
     * @param  int    $_errNum  Error Code Number
     * @param  string $_errMsg  Error Message
     * @return void
     */
    private function _setErr($_errNum, $_errMsg)
    {
    }
    /**
     * Returns errors codes and messages for Class
     *
     * @return string $_errMsg  Error Message
     */
    public function getErrors()
    {
    }
}
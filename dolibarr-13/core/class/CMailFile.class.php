<?php

/**
 * Copyright (C)            Dan Potter
 * Copyright (C)            Eric Seigne
 * Copyright (C) 2000-2005  Rodolphe Quiedeville    <rodolphe@quiedeville.org>
 * Copyright (C) 2003       Jean-Louis Bergamo      <jlb@j1b.org>
 * Copyright (C) 2004-2015  Laurent Destailleur     <eldy@users.sourceforge.net>
 * Copyright (C) 2005-2012  Regis Houssin           <regis.houssin@inodbox.com>
 * Copyright (C) 2019       Frédéric France         <frederic.france@netlogic.fr>
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
 * along with this program. If not, see <https://www.gnu.org/licenses/>.
 * or see https://www.gnu.org/
 *
 * Lots of code inspired from Dan Potter's CMailFile class
 */
/**
 *      \file       htdocs/core/class/CMailFile.class.php
 *      \brief      File of class to send emails (with attachments or not)
 */
/**
 *	Class to send emails (with attachments or not)
 *  Usage: $mailfile = new CMailFile($subject,$sendto,$replyto,$message,$filepath,$mimetype,$filename,$cc,$ccc,$deliveryreceipt,$msgishtml,$errors_to,$css,$trackid,$moreinheader,$sendcontext,$replyto);
 *         $mailfile->sendfile();
 */
class CMailFile
{
    public $sendcontext;
    public $sendmode;
    public $sendsetup;
    public $subject;
    // Topic:       Subject of email
    public $addr_from;
    // From:		Label and EMail of sender (must include '<>'). For example '<myemail@example.com>' or 'John Doe <myemail@example.com>' or '<myemail+trackingid@example.com>'). Note that with gmail smtps, value here is forced by google to account (but not the reply-to).
    // Sender:      Who send the email ("Sender" has sent emails on behalf of "From").
    //              Use it when the "From" is an email of a domain that is a SPF protected domain, and sending smtp server is not this domain. In such case, add Sender field with an email of the protected domain.
    // Return-Path: Email where to send bounds.
    public $reply_to;
    // Reply-To:	Email where to send replies from mailer software (mailer use From if reply-to not defined, Gmail use gmail account if reply-to not defined)
    public $errors_to;
    // Errors-To:	Email where to send errors.
    public $addr_to;
    public $addr_cc;
    public $addr_bcc;
    public $trackid;
    public $mixed_boundary;
    public $related_boundary;
    public $alternative_boundary;
    public $deliveryreceipt;
    public $atleastonefile;
    public $msg;
    public $eol;
    public $eol2;
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    public $smtps;
    // Contains SMTPs object (if this method is used)
    public $phpmailer;
    // Contains PHPMailer object (if this method is used)
    /**
     * @var string CSS
     */
    public $css;
    //! Defined css style for body background
    public $styleCSS;
    //! Defined background directly in body tag
    public $bodyCSS;
    public $msgid;
    public $headers;
    public $message;
    /**
     * @var array fullfilenames list (full path of filename on file system)
     */
    public $filename_list = array();
    /**
     * @var array mimetypes of files list (List of MIME type of attached files)
     */
    public $mimetype_list = array();
    /**
     * @var array filenames list (List of attached file name in message)
     */
    public $mimefilename_list = array();
    // Image
    public $html;
    public $image_boundary;
    public $atleastoneimage = 0;
    // at least one image file with file=xxx.ext into content (TODO Debug this. How can this case be tested. Remove if not used).
    public $html_images = array();
    public $images_encoded = array();
    public $image_types = array('gif' => 'image/gif', 'jpg' => 'image/jpeg', 'jpeg' => 'image/jpeg', 'jpe' => 'image/jpeg', 'bmp' => 'image/bmp', 'png' => 'image/png', 'tif' => 'image/tiff', 'tiff' => 'image/tiff');
    /**
     *	CMailFile
     *
     *	@param 	string	$subject             Topic/Subject of mail
     *	@param 	string	$to                  Recipients emails (RFC 2822: "Name firstname <email>[, ...]" or "email[, ...]" or "<email>[, ...]"). Note: the keyword '__SUPERVISOREMAIL__' is not allowed here and must be replaced by caller.
     *	@param 	string	$from                Sender email      (RFC 2822: "Name firstname <email>[, ...]" or "email[, ...]" or "<email>[, ...]")
     *	@param 	string	$msg                 Message
     *	@param 	array	$filename_list       List of files to attach (full path of filename on file system)
     *	@param 	array	$mimetype_list       List of MIME type of attached files
     *	@param 	array	$mimefilename_list   List of attached file name in message
     *	@param 	string	$addr_cc             Email cc
     *	@param 	string	$addr_bcc            Email bcc (Note: This is autocompleted with MAIN_MAIL_AUTOCOPY_TO if defined)
     *	@param 	int		$deliveryreceipt     Ask a delivery receipt
     *	@param 	int		$msgishtml           1=String IS already html, 0=String IS NOT html, -1=Unknown make autodetection (with fast mode, not reliable)
     *	@param 	string	$errors_to      	 Email for errors-to
     *	@param	string	$css                 Css option
     *	@param	string	$trackid             Tracking string (contains type and id of related element)
     *  @param  string  $moreinheader        More in header. $moreinheader must contains the "\r\n" (TODO not supported for other MAIL_SEND_MODE different than 'phpmail' and 'smtps' for the moment)
     *  @param  string  $sendcontext      	 'standard', 'emailing', ... (used to define which sending mode and parameters to use)
     *  @param	string	$replyto			 Reply-to email (will be set to same value than From by default if not provided)
     */
    public function __construct($subject, $to, $from, $msg, $filename_list = array(), $mimetype_list = array(), $mimefilename_list = array(), $addr_cc = "", $addr_bcc = "", $deliveryreceipt = 0, $msgishtml = 0, $errors_to = '', $css = '', $trackid = '', $moreinheader = '', $sendcontext = 'standard', $replyto = '')
    {
    }
    /**
     * Send mail that was prepared by constructor.
     *
     * @return    boolean     True if mail sent, false otherwise
     */
    public function sendfile()
    {
    }
    /**
     * Encode subject according to RFC 2822 - http://en.wikipedia.org/wiki/MIME#Encoded-Word
     *
     * @param string $stringtoencode String to encode
     * @return string                string encoded
     */
    public static function encodetorfc2822($stringtoencode)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Read a file on disk and return encoded content for emails (mode = 'mail')
     *
     * @param	string	$sourcefile		Path to file to encode
     * @return 	int					    <0 if KO, encoded string if OK
     */
    private function _encode_file($sourcefile)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Write content of a SMTP request into a dump file (mode = all)
     *  Used for debugging.
     *  Note that to see full SMTP protocol, you can use tcpdump -w /tmp/smtp -s 2000 port 25"
     *
     *  @return	void
     */
    public function dump_mail()
    {
    }
    /**
     * Correct an uncomplete html string
     *
     * @param	string	$msg	String
     * @return	string			Completed string
     */
    public function checkIfHTML($msg)
    {
    }
    /**
     * Build a css style (mode = all) into this->styleCSS and this->bodyCSS
     *
     * @return string
     */
    public function buildCSS()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Create SMTP headers (mode = 'mail')
     *
     * @return	string headers
     */
    public function write_smtpheaders()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Create header MIME (mode = 'mail')
     *
     * @param	array	$filename_list			Array of filenames
     * @param 	array	$mimefilename_list		Array of mime types
     * @return	string							mime headers
     */
    public function write_mimeheaders($filename_list, $mimefilename_list)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Return email content (mode = 'mail')
     *
     * @param	string		$msgtext		Message string
     * @return	string						String content
     */
    public function write_body($msgtext)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Attach file to email (mode = 'mail')
     *
     * @param	array	$filename_list		Tableau
     * @param	array	$mimetype_list		Tableau
     * @param 	array	$mimefilename_list	Tableau
     * @return	string						Chaine fichiers encodes
     */
    public function write_files($filename_list, $mimetype_list, $mimefilename_list)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Attach an image to email (mode = 'mail')
     *
     * @param	array	$images_list	Array of array image
     * @return	string					Chaine images encodees
     */
    public function write_images($images_list)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Try to create a socket connection
     *
     * @param 	string		$host		Add ssl:// for SSL/TLS.
     * @param 	int			$port		Example: 25, 465
     * @return	int						Socket id if ok, 0 if KO
     */
    public function check_server_port($host, $port)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * This function has been modified as provided by SirSir to allow multiline responses when
     * using SMTP Extensions.
     *
     * @param	resource	$socket			Socket
     * @param   string	    $response		Response string
     * @return  boolean		      			true if success
     */
    public function server_parse($socket, $response)
    {
    }
    /**
     * Seearch images into html message and init array this->images_encoded if found
     *
     * @param	string	$images_dir		Location of physical images files
     * @return	int 		        	>0 if OK, <0 if KO
     */
    public function findHtmlImages($images_dir)
    {
    }
    /**
     * Return a formatted address string for SMTP protocol
     *
     * @param	string		$address		     Example: 'John Doe <john@doe.com>, Alan Smith <alan@smith.com>' or 'john@doe.com, alan@smith.com'
     * @param	int			$format			     0=auto, 1=emails with <>, 2=emails without <>, 3=auto + label between ", 4 label or email, 5 mailto link
     * @param	int			$encode			     0=No encode name, 1=Encode name to RFC2822
     * @param   int         $maxnumberofemail    0=No limit. Otherwise, maximum number of emails returned ($address may contains several email separated with ','). Add '...' if there is more.
     * @return	string						     If format 0: '<john@doe.com>' or 'John Doe <john@doe.com>' or '=?UTF-8?B?Sm9obiBEb2U=?= <john@doe.com>'
     * 										     If format 1: '<john@doe.com>'
     *										     If format 2: 'john@doe.com'
     *										     If format 3: '<john@doe.com>' or '"John Doe" <john@doe.com>' or '"=?UTF-8?B?Sm9obiBEb2U=?=" <john@doe.com>'
     *                                           If format 4: 'John Doe' or 'john@doe.com' if no label exists
     *                                           If format 5: <a href="mailto:john@doe.com">John Doe</a> or <a href="mailto:john@doe.com">john@doe.com</a> if no label exists
     * @see getArrayAddress()
     */
    public static function getValidAddress($address, $format, $encode = 0, $maxnumberofemail = 0)
    {
    }
    /**
     * Return a formatted array of address string for SMTP protocol
     *
     * @param   string      $address        Example: 'John Doe <john@doe.com>, Alan Smith <alan@smith.com>' or 'john@doe.com, alan@smith.com'
     * @return  array                       array of email => name
     * @see getValidAddress()
     */
    public function getArrayAddress($address)
    {
    }
}
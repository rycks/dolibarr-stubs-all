<?php

/**
 * The Mail_Mime class provides an OO interface to create MIME
 * enabled email messages. This way you can create emails that
 * contain plain-text bodies, HTML bodies, attachments, inline
 * images and specific headers.
 *
 * @category  Mail
 * @package   Mail_Mime
 * @author    Richard Heyes  <richard@phpguru.org>
 * @author    Tomas V.V. Cox <cox@idecnet.com>
 * @author    Cipriano Groenendal <cipri@php.net>
 * @author    Sean Coates <sean@php.net>
 * @copyright 2003-2006 PEAR <pear-group@php.net>
 * @license   http://www.opensource.org/licenses/bsd-license.php BSD License
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/Mail_mime
 */
class Mail_mime
{
    /**
     * Contains the plain text part of the email
     *
     * @var string
     * @access private
     */
    var $_txtbody;
    /**
     * Contains the html part of the email
     *
     * @var string
     * @access private
     */
    var $_htmlbody;
    /**
     * list of the attached images
     *
     * @var array
     * @access private
     */
    var $_html_images = array();
    /**
     * list of the attachements
     *
     * @var array
     * @access private
     */
    var $_parts = array();
    /**
     * Headers for the mail
     *
     * @var array
     * @access private
     */
    var $_headers = array();
    /**
     * Build parameters
     *
     * @var array
     * @access private
     */
    var $_build_params = array(
        // What encoding to use for the headers
        // Options: quoted-printable or base64
        'head_encoding' => 'quoted-printable',
        // What encoding to use for plain text
        // Options: 7bit, 8bit, base64, or quoted-printable
        'text_encoding' => 'quoted-printable',
        // What encoding to use for html
        // Options: 7bit, 8bit, base64, or quoted-printable
        'html_encoding' => 'quoted-printable',
        // The character set to use for html
        'html_charset' => 'ISO-8859-1',
        // The character set to use for text
        'text_charset' => 'ISO-8859-1',
        // The character set to use for headers
        'head_charset' => 'ISO-8859-1',
        // End-of-line sequence
        'eol' => "\r\n",
        // Delay attachment files IO until building the message
        'delay_file_io' => \false,
    );
    /**
     * Constructor function
     *
     * @param mixed $params Build parameters that change the way the email
     *                      is built. Should be an associative array.
     *                      See $_build_params.
     *
     * @return void
     * @access public
     */
    function Mail_mime($params = array())
    {
    }
    /**
     * Set build parameter value
     *
     * @param string $name  Parameter name
     * @param string $value Parameter value
     *
     * @return void
     * @access public
     * @since 1.6.0
     */
    function setParam($name, $value)
    {
    }
    /**
     * Get build parameter value
     *
     * @param string $name Parameter name
     *
     * @return mixed Parameter value
     * @access public
     * @since 1.6.0
     */
    function getParam($name)
    {
    }
    /**
     * Accessor function to set the body text. Body text is used if
     * it's not an html mail being sent or else is used to fill the
     * text/plain part that emails clients who don't support
     * html should show.
     *
     * @param string $data   Either a string or
     *                       the file name with the contents
     * @param bool   $isfile If true the first param should be treated
     *                       as a file name, else as a string (default)
     * @param bool   $append If true the text or file is appended to
     *                       the existing body, else the old body is
     *                       overwritten
     *
     * @return mixed         True on success or PEAR_Error object
     * @access public
     */
    function setTXTBody($data, $isfile = \false, $append = \false)
    {
    }
    /**
     * Get message text body
     *
     * @return string Text body
     * @access public
     * @since 1.6.0
     */
    function getTXTBody()
    {
    }
    /**
     * Adds a html part to the mail.
     *
     * @param string $data   Either a string or the file name with the
     *                       contents
     * @param bool   $isfile A flag that determines whether $data is a
     *                       filename, or a string(false, default)
     *
     * @return bool          True on success
     * @access public
     */
    function setHTMLBody($data, $isfile = \false)
    {
    }
    /**
     * Get message HTML body
     *
     * @return string HTML body
     * @access public
     * @since 1.6.0
     */
    function getHTMLBody()
    {
    }
    /**
     * Adds an image to the list of embedded images.
     *
     * @param string $file       The image file name OR image data itself
     * @param string $c_type     The content type
     * @param string $name       The filename of the image.
     *                           Only used if $file is the image data.
     * @param bool   $isfile     Whether $file is a filename or not.
     *                           Defaults to true
     * @param string $content_id Desired Content-ID of MIME part
     *                           Defaults to generated unique ID
     *
     * @return bool          True on success
     * @access public
     */
    function addHTMLImage($file, $c_type = 'application/octet-stream', $name = '', $isfile = \true, $content_id = \null)
    {
    }
    /**
     * Adds a file to the list of attachments.
     *
     * @param string $file        The file name of the file to attach
     *                            or the file contents itself
     * @param string $c_type      The content type
     * @param string $name        The filename of the attachment
     *                            Only use if $file is the contents
     * @param bool   $isfile      Whether $file is a filename or not. Defaults to true
     * @param string $encoding    The type of encoding to use. Defaults to base64.
     *                            Possible values: 7bit, 8bit, base64 or quoted-printable.
     * @param string $disposition The content-disposition of this file
     *                            Defaults to attachment.
     *                            Possible values: attachment, inline.
     * @param string $charset     The character set of attachment's content.
     * @param string $language    The language of the attachment
     * @param string $location    The RFC 2557.4 location of the attachment
     * @param string $n_encoding  Encoding of the attachment's name in Content-Type
     *                            By default filenames are encoded using RFC2231 method
     *                            Here you can set RFC2047 encoding (quoted-printable
     *                            or base64) instead
     * @param string $f_encoding  Encoding of the attachment's filename
     *                            in Content-Disposition header.
     * @param string $description Content-Description header
     * @param string $h_charset   The character set of the headers e.g. filename
     *                            If not specified, $charset will be used
     * @param array  $add_headers Additional part headers. Array keys can be in form
     *                            of <header_name>:<parameter_name>
     *
     * @return mixed              True on success or PEAR_Error object
     * @access public
     */
    function addAttachment($file, $c_type = 'application/octet-stream', $name = '', $isfile = \true, $encoding = 'base64', $disposition = 'attachment', $charset = '', $language = '', $location = '', $n_encoding = \null, $f_encoding = \null, $description = '', $h_charset = \null, $add_headers = array())
    {
    }
    /**
     * Get the contents of the given file name as string
     *
     * @param string $file_name Path of file to process
     *
     * @return string           Contents of $file_name
     * @access private
     */
    function _file2str($file_name)
    {
    }
    /**
     * Adds a text subpart to the mimePart object and
     * returns it during the build process.
     *
     * @param mixed  &$obj The object to add the part to, or
     *                     anything else if a new object is to be created.
     * @param string $text The text to add.
     *
     * @return object      The text mimePart object
     * @access private
     */
    function &_addTextPart(&$obj, $text = '')
    {
    }
    /**
     * Adds a html subpart to the mimePart object and
     * returns it during the build process.
     *
     * @param mixed &$obj The object to add the part to, or
     *                    anything else if a new object is to be created.
     *
     * @return object     The html mimePart object
     * @access private
     */
    function &_addHtmlPart(&$obj)
    {
    }
    /**
     * Creates a new mimePart object, using multipart/mixed as
     * the initial content-type and returns it during the
     * build process.
     *
     * @return object The multipart/mixed mimePart object
     * @access private
     */
    function &_addMixedPart()
    {
    }
    /**
     * Adds a multipart/alternative part to a mimePart
     * object (or creates one), and returns it during
     * the build process.
     *
     * @param mixed &$obj The object to add the part to, or
     *                    anything else if a new object is to be created.
     *
     * @return object     The multipart/mixed mimePart object
     * @access private
     */
    function &_addAlternativePart(&$obj)
    {
    }
    /**
     * Adds a multipart/related part to a mimePart
     * object (or creates one), and returns it during
     * the build process.
     *
     * @param mixed &$obj The object to add the part to, or
     *                    anything else if a new object is to be created
     *
     * @return object     The multipart/mixed mimePart object
     * @access private
     */
    function &_addRelatedPart(&$obj)
    {
    }
    /**
     * Adds an html image subpart to a mimePart object
     * and returns it during the build process.
     *
     * @param object &$obj  The mimePart to add the image to
     * @param array  $value The image information
     *
     * @return object       The image mimePart object
     * @access private
     */
    function &_addHtmlImagePart(&$obj, $value)
    {
    }
    /**
     * Adds an attachment subpart to a mimePart object
     * and returns it during the build process.
     *
     * @param object &$obj  The mimePart to add the image to
     * @param array  $value The attachment information
     *
     * @return object       The image mimePart object
     * @access private
     */
    function &_addAttachmentPart(&$obj, $value)
    {
    }
    /**
     * Returns the complete e-mail, ready to send using an alternative
     * mail delivery method. Note that only the mailpart that is made
     * with Mail_Mime is created. This means that,
     * YOU WILL HAVE NO TO: HEADERS UNLESS YOU SET IT YOURSELF 
     * using the $headers parameter!
     * 
     * @param string $separation The separation between these two parts.
     * @param array  $params     The Build parameters passed to the
     *                           get() function. See get() for more info.
     * @param array  $headers    The extra headers that should be passed
     *                           to the headers() method.
     *                           See that function for more info.
     * @param bool   $overwrite  Overwrite the existing headers with new.
     *
     * @return mixed The complete e-mail or PEAR error object
     * @access public
     */
    function getMessage($separation = \null, $params = \null, $headers = \null, $overwrite = \false)
    {
    }
    /**
     * Returns the complete e-mail body, ready to send using an alternative
     * mail delivery method.
     * 
     * @param array $params The Build parameters passed to the
     *                      get() method. See get() for more info.
     *
     * @return mixed The e-mail body or PEAR error object
     * @access public
     * @since 1.6.0
     */
    function getMessageBody($params = \null)
    {
    }
    /**
     * Writes (appends) the complete e-mail into file.
     * 
     * @param string $filename  Output file location
     * @param array  $params    The Build parameters passed to the
     *                          get() method. See get() for more info.
     * @param array  $headers   The extra headers that should be passed
     *                          to the headers() function.
     *                          See that function for more info.
     * @param bool   $overwrite Overwrite the existing headers with new.
     *
     * @return mixed True or PEAR error object
     * @access public
     * @since 1.6.0
     */
    function saveMessage($filename, $params = \null, $headers = \null, $overwrite = \false)
    {
    }
    /**
     * Writes (appends) the complete e-mail body into file.
     *
     * @param string $filename Output file location
     * @param array  $params   The Build parameters passed to the
     *                         get() method. See get() for more info.
     *
     * @return mixed True or PEAR error object
     * @access public
     * @since 1.6.0
     */
    function saveMessageBody($filename, $params = \null)
    {
    }
    /**
     * Builds the multipart message from the list ($this->_parts) and
     * returns the mime content.
     *
     * @param array    $params    Build parameters that change the way the email
     *                            is built. Should be associative. See $_build_params.
     * @param resource $filename  Output file where to save the message instead of
     *                            returning it
     * @param boolean  $skip_head True if you want to return/save only the message
     *                            without headers
     *
     * @return mixed The MIME message content string, null or PEAR error object
     * @access public
     */
    function get($params = \null, $filename = \null, $skip_head = \false)
    {
    }
    /**
     * Returns an array with the headers needed to prepend to the email
     * (MIME-Version and Content-Type). Format of argument is:
     * $array['header-name'] = 'header-value';
     *
     * @param array $xtra_headers Assoc array with any extra headers (optional)
     *                            (Don't set Content-Type for multipart messages here!)
     * @param bool  $overwrite    Overwrite already existing headers.
     * @param bool  $skip_content Don't return content headers: Content-Type,
     *                            Content-Disposition and Content-Transfer-Encoding
     * 
     * @return array              Assoc array with the mime headers
     * @access public
     */
    function headers($xtra_headers = \null, $overwrite = \false, $skip_content = \false)
    {
    }
    /**
     * Get the text version of the headers
     * (usefull if you want to use the PHP mail() function)
     *
     * @param array $xtra_headers Assoc array with any extra headers (optional)
     *                            (Don't set Content-Type for multipart messages here!)
     * @param bool  $overwrite    Overwrite the existing headers with new.
     * @param bool  $skip_content Don't return content headers: Content-Type,
     *                            Content-Disposition and Content-Transfer-Encoding
     *
     * @return string             Plain text headers
     * @access public
     */
    function txtHeaders($xtra_headers = \null, $overwrite = \false, $skip_content = \false)
    {
    }
    /**
     * Sets message Content-Type header.
     * Use it to build messages with various content-types e.g. miltipart/raport
     * not supported by _contentHeaders() function.
     *
     * @param string $type   Type name
     * @param array  $params Hash array of header parameters
     *
     * @return void
     * @access public
     * @since 1.7.0
     */
    function setContentType($type, $params = array())
    {
    }
    /**
     * Sets the Subject header
     *
     * @param string $subject String to set the subject to.
     *
     * @return void
     * @access public
     */
    function setSubject($subject)
    {
    }
    /**
     * Set an email to the From (the sender) header
     *
     * @param string $email The email address to use
     *
     * @return void
     * @access public
     */
    function setFrom($email)
    {
    }
    /**
     * Add an email to the To header
     * (multiple calls to this method are allowed)
     *
     * @param string $email The email direction to add
     *
     * @return void
     * @access public
     */
    function addTo($email)
    {
    }
    /**
     * Add an email to the Cc (carbon copy) header
     * (multiple calls to this method are allowed)
     *
     * @param string $email The email direction to add
     *
     * @return void
     * @access public
     */
    function addCc($email)
    {
    }
    /**
     * Add an email to the Bcc (blank carbon copy) header
     * (multiple calls to this method are allowed)
     *
     * @param string $email The email direction to add
     *
     * @return void
     * @access public
     */
    function addBcc($email)
    {
    }
    /**
     * Since the PHP send function requires you to specify
     * recipients (To: header) separately from the other
     * headers, the To: header is not properly encoded.
     * To fix this, you can use this public method to 
     * encode your recipients before sending to the send
     * function
     *
     * @param string $recipients A comma-delimited list of recipients
     *
     * @return string            Encoded data
     * @access public
     */
    function encodeRecipients($recipients)
    {
    }
    /**
     * Encodes headers as per RFC2047
     *
     * @param array $input  The header data to encode
     * @param array $params Extra build parameters
     *
     * @return array        Encoded data
     * @access private
     */
    function _encodeHeaders($input, $params = array())
    {
    }
    /**
     * Encodes a header as per RFC2047
     *
     * @param string $name     The header name
     * @param string $value    The header data to encode
     * @param string $charset  Character set name
     * @param string $encoding Encoding name (base64 or quoted-printable)
     *
     * @return string          Encoded header data (without a name)
     * @access public
     * @since 1.5.3
     */
    function encodeHeader($name, $value, $charset, $encoding)
    {
    }
    /**
     * Get file's basename (locale independent) 
     *
     * @param string $filename Filename
     *
     * @return string          Basename
     * @access private
     */
    function _basename($filename)
    {
    }
    /**
     * Get Content-Type and Content-Transfer-Encoding headers of the message
     *
     * @return array Headers array
     * @access private
     */
    function _contentHeaders()
    {
    }
    /**
     * Validate and set build parameters
     *
     * @return void
     * @access private
     */
    function _checkParams()
    {
    }
    /**
     * PEAR::isError implementation
     *
     * @param mixed $data Object
     *
     * @return bool True if object is an instance of PEAR_Error
     * @access private
     */
    function _isError($data)
    {
    }
    /**
     * PEAR::raiseError implementation
     *
     * @param $message A text error message
     *
     * @return PEAR_Error Instance of PEAR_Error
     * @access private
     */
    function _raiseError($message)
    {
    }
}
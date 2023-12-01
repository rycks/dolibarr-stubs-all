<?php

namespace Sabre\DAV\Browser;

/**
 * GuessContentType plugin
 *
 * A lot of the built-in File objects just return application/octet-stream
 * as a content-type by default. This is a problem for some clients, because
 * they expect a correct contenttype.
 *
 * There's really no accurate, fast and portable way to determine the contenttype
 * so this extension does what the rest of the world does, and guesses it based
 * on the file extension.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class GuessContentType extends \Sabre\DAV\ServerPlugin
{
    /**
     * List of recognized file extensions
     *
     * Feel free to add more
     *
     * @var array
     */
    public $extensionMap = [
        // images
        'jpg' => 'image/jpeg',
        'gif' => 'image/gif',
        'png' => 'image/png',
        // groupware
        'ics' => 'text/calendar',
        'vcf' => 'text/vcard',
        // text
        'txt' => 'text/plain',
    ];
    /**
     * Initializes the plugin
     *
     * @param DAV\Server $server
     * @return void
     */
    function initialize(\Sabre\DAV\Server $server)
    {
    }
    /**
     * Our PROPFIND handler
     *
     * Here we set a contenttype, if the node didn't already have one.
     *
     * @param PropFind $propFind
     * @param INode $node
     * @return void
     */
    function propFind(\Sabre\DAV\PropFind $propFind, \Sabre\DAV\Inode $node)
    {
    }
    /**
     * Simple method to return the contenttype
     *
     * @param string $fileName
     * @return string
     */
    protected function getContentType($fileName)
    {
    }
}
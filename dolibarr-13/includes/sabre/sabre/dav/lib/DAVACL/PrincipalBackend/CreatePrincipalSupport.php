<?php

namespace Sabre\DAVACL\PrincipalBackend;

/**
 * Implement this interface to add support for creating new principals to your
 * principal backend.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
interface CreatePrincipalSupport extends \Sabre\DAVACL\PrincipalBackend\BackendInterface
{
    /**
     * Creates a new principal.
     *
     * This method receives a full path for the new principal. The mkCol object
     * contains any additional webdav properties specified during the creation
     * of the principal.
     *
     * @param string $path
     * @param MkCol $mkCol
     * @return void
     */
    function createPrincipal($path, \Sabre\DAV\MkCol $mkCol);
}
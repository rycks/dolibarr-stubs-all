<?php

namespace Sabre\HTTP;

/**
 * This exception represents a HTTP error coming from the Client.
 *
 * By default the Client will not emit these, this has to be explicitly enabled
 * with the setThrowExceptions method.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class ClientHttpException extends \Exception implements \Sabre\HTTP\HttpException
{
    /**
     * Response object.
     *
     * @var ResponseInterface
     */
    protected $response;
    /**
     * Constructor.
     */
    public function __construct(\Sabre\HTTP\ResponseInterface $response)
    {
    }
    /**
     * The http status code for the error.
     */
    public function getHttpStatus() : int
    {
    }
    /**
     * Returns the full response object.
     */
    public function getResponse() : \Sabre\HTTP\ResponseInterface
    {
    }
}
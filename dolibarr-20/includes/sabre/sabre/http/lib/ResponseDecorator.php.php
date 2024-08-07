<?php

namespace Sabre\HTTP;

/**
 * Response Decorator.
 *
 * This helper class allows you to easily create decorators for the Response
 * object.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class ResponseDecorator implements \Sabre\HTTP\ResponseInterface
{
    use \Sabre\HTTP\MessageDecoratorTrait;
    /**
     * Constructor.
     */
    public function __construct(\Sabre\HTTP\ResponseInterface $inner)
    {
    }
    /**
     * Returns the current HTTP status code.
     */
    public function getStatus() : int
    {
    }
    /**
     * Returns the human-readable status string.
     *
     * In the case of a 200, this may for example be 'OK'.
     */
    public function getStatusText() : string
    {
    }
    /**
     * Sets the HTTP status code.
     *
     * This can be either the full HTTP status code with human-readable string,
     * for example: "403 I can't let you do that, Dave".
     *
     * Or just the code, in which case the appropriate default message will be
     * added.
     *
     * @param string|int $status
     */
    public function setStatus($status)
    {
    }
    /**
     * Serializes the request object as a string.
     *
     * This is useful for debugging purposes.
     */
    public function __toString() : string
    {
    }
}
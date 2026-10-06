<?php

namespace OAuth\OAuth2\Service\Exception;

/**
 * Exception thrown when service is requested to refresh the access token but no refresh token can be found.
 */
class MissingRefreshTokenException extends \OAuth\Common\Exception\Exception
{
}
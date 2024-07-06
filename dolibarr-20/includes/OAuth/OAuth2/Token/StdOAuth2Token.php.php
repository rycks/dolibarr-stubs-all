<?php

namespace OAuth\OAuth2\Token;

/**
 * Standard OAuth2 token implementation.
 * Implements OAuth\OAuth2\Token\TokenInterface for any functionality that might not be provided by AbstractToken.
 */
class StdOAuth2Token extends \OAuth\Common\Token\AbstractToken implements \OAuth\OAuth2\Token\TokenInterface
{
}
<?php

namespace Stripe\Error\OAuth;

/**
 * InvalidRequest is raised when a code, refresh token, or grant type
 * parameter is not provided, but was required.
 */
class InvalidRequest extends \Stripe\Error\OAuth\OAuthBase
{
}
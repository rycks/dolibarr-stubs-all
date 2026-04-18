<?php

namespace Illuminate\Support\Facades;

/**
 * @method static mixed reset(array $credentials, \Closure $callback)
 * @method static string sendResetLink(array $credentials, \Closure $callback = null)
 * @method static \Illuminate\Contracts\Auth\CanResetPassword getUser(array $credentials)
 * @method static string createToken(\Illuminate\Contracts\Auth\CanResetPassword $user)
 * @method static void deleteToken(\Illuminate\Contracts\Auth\CanResetPassword $user)
 * @method static bool tokenExists(\Illuminate\Contracts\Auth\CanResetPassword $user, string $token)
 * @method static \Illuminate\Auth\Passwords\TokenRepositoryInterface getRepository()
 * @method static \Illuminate\Contracts\Auth\PasswordBroker broker(string|null $name = null)
 *
 * @see \Illuminate\Auth\Passwords\PasswordBroker
 */
class Password extends \Illuminate\Support\Facades\Facade
{
    /**
     * Constant representing a successfully sent reminder.
     *
     * @var string
     */
    const RESET_LINK_SENT = \Illuminate\Contracts\Auth\PasswordBroker::RESET_LINK_SENT;
    /**
     * Constant representing a successfully reset password.
     *
     * @var string
     */
    const PASSWORD_RESET = \Illuminate\Contracts\Auth\PasswordBroker::PASSWORD_RESET;
    /**
     * Constant representing the user not found response.
     *
     * @var string
     */
    const INVALID_USER = \Illuminate\Contracts\Auth\PasswordBroker::INVALID_USER;
    /**
     * Constant representing an invalid token.
     *
     * @var string
     */
    const INVALID_TOKEN = \Illuminate\Contracts\Auth\PasswordBroker::INVALID_TOKEN;
    /**
     * Constant representing a throttled reset attempt.
     *
     * @var string
     */
    const RESET_THROTTLED = \Illuminate\Contracts\Auth\PasswordBroker::RESET_THROTTLED;
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
    }
}
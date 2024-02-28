<?php

/**
 * API that allows to log in with an user account.
 */
class Login
{
    /**
     * @var DoliDB	Database handler
     */
    public $db;
    /**
     * Constructor of the class
     */
    public function __construct()
    {
    }
    /**
     * Login
     *
     * Request the API token for a couple username / password.
     * WARNING: You should NEVER use this API, like you should never use the similare API that uses the POST method. This will expose your password.
     * To use the APIs, you should instead set an API token to the user you want to allow to use API (This API token called DOLAPIKEY can be found/set on the user page) and use this token as credential for any API call.
     * From the API explorer, you can enter directly the "DOLAPIKEY" into the field at the top right of the page to get access to any allowed APIs.
     *
     * @param   string  $login			User login
     * @param   string  $password		User password
     * @param   string  $entity			Entity (when multicompany module is used). '' means 1=first company.
     * @param   int     $reset          Reset token (0=get current token, 1=ask a new token and canceled old token. This means access using current existing API token of user will fails: new token will be required for new access)
     * @return  array                   Response status and user token
     *
     * @throws RestException 403 Access denied
     * @throws RestException 500 System error
     *
     * @url GET /
     */
    public function loginUnsecured($login, $password, $entity = '', $reset = 0)
    {
    }
    /**
     * Login
     *
     * Request the API token for a couple username / password.
     * WARNING: You should NEVER use this API, like you should never use the similare API that uses the POST method. This will expose your password.
     * To use the APIs, you should instead set an API token to the user you want to allow to use API (This API token called DOLAPIKEY can be found/set on the user page) and use this token as credential for any API call.
     * From the API explorer, you can enter directly the "DOLAPIKEY" into the field at the top right of the page to get access to any allowed APIs.
     *
     * @param   string  $login			User login
     * @param   string  $password		User password
     * @param   string  $entity			Entity (when multicompany module is used). '' means 1=first company.
     * @param   int     $reset          Reset token (0=get current token, 1=ask a new token and canceled old token. This means access using current existing API token of user will fails: new token will be required for new access)
     * @return  array                   Response status and user token
     *
     * @throws RestException 403 Access denied
     * @throws RestException 500 System error
     *
     * @url POST /
     */
    public function index($login, $password, $entity = '', $reset = 0)
    {
    }
}
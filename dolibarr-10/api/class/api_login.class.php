<?php

/**
 * API that allows to log in with an user account.
 */
class Login
{
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
     * Using method POST is recommanded for security reasons (method GET is often logged by default by web servers with parameters so with login and pass into server log file).
     * Both methods are provided for developer conveniance. Best is to not use at all the login API method and enter directly the "DOLAPIKEY" into field at the top right of page. Note: The API key (DOLAPIKEY) can be found/set on the user page.
     *
     * @param   string  $login			User login
     * @param   string  $password		User password
     * @param   string  $entity			Entity (when multicompany module is used). '' means 1=first company.
     * @param   int     $reset          Reset token (0=get current token, 1=ask a new token and canceled old token. This means access using current existing API token of user will fails: new token will be required for new access)
     * @return  array                   Response status and user token
     *
     * @throws 200
     * @throws 403
     * @throws 500
     *
     * @url GET /
     * @url POST /
     */
    public function index($login, $password, $entity = '', $reset = 0)
    {
    }
}
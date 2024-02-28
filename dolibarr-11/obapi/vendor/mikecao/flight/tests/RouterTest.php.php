<?php

class RouterTest extends \PHPUnit\Framework\TestCase
{
    private \flight\net\Router $router;
    private \flight\net\Request $request;
    private \flight\core\Dispatcher $dispatcher;
    protected function setUp() : void
    {
    }
    // Simple output
    public function ok()
    {
    }
    // Checks if a route was matched with a given output
    public function check($str = '')
    {
    }
    public function routeRequest()
    {
    }
    // Default route
    public function testDefaultRoute()
    {
    }
    // Simple path
    public function testPathRoute()
    {
    }
    // POST route
    public function testPostRoute()
    {
    }
    // Either GET or POST route
    public function testGetPostRoute()
    {
    }
    // Test regular expression matching
    public function testRegEx()
    {
    }
    // Passing URL parameters
    public function testUrlParameters()
    {
    }
    // Passing URL parameters matched with regular expression
    public function testRegExParameters()
    {
    }
    // Optional parameters
    public function testOptionalParameters()
    {
    }
    // Regex in optional parameters
    public function testRegexOptionalParameters()
    {
    }
    // Regex in optional parameters
    public function testRegexEmptyOptionalParameters()
    {
    }
    // Wildcard matching
    public function testWildcard()
    {
    }
    // Check if route object was passed
    public function testRouteObjectPassing()
    {
    }
    public function testRouteWithParameters()
    {
    }
    // Test splat
    public function testSplatWildcard()
    {
    }
    // Test splat without trailing slash
    public function testSplatWildcardTrailingSlash()
    {
    }
    // Test splat with named parameters
    public function testSplatNamedPlusWildcard()
    {
    }
    // Test not found
    public function testNotFound()
    {
    }
    // Test case sensitivity
    public function testCaseSensitivity()
    {
    }
    // Passing URL parameters matched with regular expression for a URL containing Cyrillic letters:
    public function testRegExParametersCyrillic()
    {
    }
}
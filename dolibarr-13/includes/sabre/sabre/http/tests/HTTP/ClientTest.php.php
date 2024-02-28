<?php

namespace Sabre\HTTP;

class ClientTest extends \PHPUnit_Framework_TestCase
{
    function testCreateCurlSettingsArrayGET()
    {
    }
    function testCreateCurlSettingsArrayHEAD()
    {
    }
    function testCreateCurlSettingsArrayGETAfterHEAD()
    {
    }
    function testCreateCurlSettingsArrayPUTStream()
    {
    }
    function testCreateCurlSettingsArrayPUTString()
    {
    }
    function testSend()
    {
    }
    function testSendClientError()
    {
    }
    function testSendHttpError()
    {
    }
    function testSendRetry()
    {
    }
    function testHttpErrorException()
    {
    }
    function testParseCurlResult()
    {
    }
    function testParseCurlError()
    {
    }
    function testDoRequest()
    {
    }
    function testDoRequestCurlError()
    {
    }
}
class ClientMock extends \Sabre\HTTP\Client
{
    protected $persistedSettings = [];
    /**
     * Making this method public.
     *
     * We are also going to persist all settings this method generates. While
     * the underlying object doesn't behave exactly the same, it helps us
     * simulate what curl does internally, and helps us identify problems with
     * settings that are set by _some_ methods and not correctly reset by other
     * methods after subsequent use.
     * forces
     */
    function createCurlSettingsArray(\Sabre\HTTP\RequestInterface $request)
    {
    }
    /**
     * Making this method public.
     */
    function parseCurlResult($response, $curlHandle)
    {
    }
    /**
     * This method is responsible for performing a single request.
     *
     * @param RequestInterface $request
     * @return ResponseInterface
     */
    function doRequest(\Sabre\HTTP\RequestInterface $request)
    {
    }
    /**
     * Returns a bunch of information about a curl request.
     *
     * This method exists so it can easily be overridden and mocked.
     *
     * @param resource $curlHandle
     * @return array
     */
    protected function curlStuff($curlHandle)
    {
    }
    /**
     * Calls curl_exec
     *
     * This method exists so it can easily be overridden and mocked.
     *
     * @param resource $curlHandle
     * @return string
     */
    protected function curlExec($curlHandle)
    {
    }
}
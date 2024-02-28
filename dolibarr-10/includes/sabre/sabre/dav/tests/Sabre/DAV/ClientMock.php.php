<?php

namespace Sabre\DAV;

class ClientMock extends \Sabre\DAV\Client
{
    public $request;
    public $response;
    public $url;
    public $curlSettings;
    /**
     * Just making this method public
     *
     * @param string $url
     * @return string
     */
    function getAbsoluteUrl($url)
    {
    }
    function doRequest(\Sabre\HTTP\RequestInterface $request)
    {
    }
}
<?php

namespace Mike42\Escpos\PrintConnectors;

/**
 * PrintConnector for directly opening a network socket to a printer to send it commands.
 */
class NetworkPrintConnector extends \Mike42\Escpos\PrintConnectors\FilePrintConnector
{
    /**
     * Construct a new NetworkPrintConnector
     *
     * @param string $ip IP address or hostname to use.
     * @param string $port The port number to connect on.
     * @param string $timeout The connection timeout, in seconds.
     * @throws Exception Where the socket cannot be opened.
     */
    public function __construct($ip, $port = "9100", $timeout = false)
    {
    }
}
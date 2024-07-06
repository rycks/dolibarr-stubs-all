<?php

/*
 * This file is part of SwiftMailer.
 * (c) 2018 Christian Schmidt
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
/**
 * An IDN email address encoder.
 *
 * Encodes the domain part of an address using IDN. This is compatible will all
 * SMTP servers.
 *
 * This encoder does not support email addresses with non-ASCII characters in
 * local-part (the substring before @). To send to such addresses, use
 * Swift_AddressEncoder_Utf8AddressEncoder together with
 * Swift_Transport_Esmtp_SmtpUtf8Handler. Your outbound SMTP server must support
 * the SMTPUTF8 extension.
 *
 * @author Christian Schmidt
 */
class Swift_AddressEncoder_IdnAddressEncoder implements \Swift_AddressEncoder
{
    /**
     * Encodes the domain part of an address using IDN.
     *
     * @throws Swift_AddressEncoderException If local-part contains non-ASCII characters
     */
    public function encodeString(string $address) : string
    {
    }
}
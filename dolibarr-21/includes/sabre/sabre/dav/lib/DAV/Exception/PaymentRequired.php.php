<?php

namespace Sabre\DAV\Exception;

/**
 * Payment Required.
 *
 * The PaymentRequired exception may be thrown in a case where a user must pay
 * to access a certain resource or operation.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class PaymentRequired extends \Sabre\DAV\Exception
{
    /**
     * Returns the HTTP statuscode for this exception.
     *
     * @return int
     */
    public function getHTTPCode()
    {
    }
}
<?php

namespace Egulias\EmailValidator\Exception;

class ExpectingQPair extends \Egulias\EmailValidator\Exception\InvalidEmail
{
    const CODE = 136;
    const REASON = "Expecting QPAIR";
}
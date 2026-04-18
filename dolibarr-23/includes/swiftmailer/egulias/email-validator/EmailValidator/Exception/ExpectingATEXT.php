<?php

namespace Egulias\EmailValidator\Exception;

class ExpectingATEXT extends \Egulias\EmailValidator\Exception\InvalidEmail
{
    const CODE = 137;
    const REASON = "Expecting ATEXT";
}
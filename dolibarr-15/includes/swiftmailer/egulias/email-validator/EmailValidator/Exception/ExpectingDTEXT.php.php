<?php

namespace Egulias\EmailValidator\Exception;

class ExpectingDTEXT extends \Egulias\EmailValidator\Exception\InvalidEmail
{
    const CODE = 129;
    const REASON = "Expected DTEXT";
}
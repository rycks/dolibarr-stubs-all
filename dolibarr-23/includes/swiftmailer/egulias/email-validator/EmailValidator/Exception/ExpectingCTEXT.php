<?php

namespace Egulias\EmailValidator\Exception;

class ExpectingCTEXT extends \Egulias\EmailValidator\Exception\InvalidEmail
{
    const CODE = 139;
    const REASON = "Expecting CTEXT";
}
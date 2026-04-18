<?php

namespace Egulias\EmailValidator\Exception;

class UnclosedQuotedString extends \Egulias\EmailValidator\Exception\InvalidEmail
{
    const CODE = 145;
    const REASON = "Unclosed quoted string";
}
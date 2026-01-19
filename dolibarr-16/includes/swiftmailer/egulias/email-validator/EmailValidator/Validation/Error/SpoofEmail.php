<?php

namespace Egulias\EmailValidator\Validation\Error;

class SpoofEmail extends \Egulias\EmailValidator\Exception\InvalidEmail
{
    const CODE = 998;
    const REASON = "The email contains mixed UTF8 chars that makes it suspicious";
}
<?php

namespace Egulias\EmailValidator\Validation\Error;

class RFCWarnings extends \Egulias\EmailValidator\Exception\InvalidEmail
{
    const CODE = 997;
    const REASON = 'Warnings were found.';
}
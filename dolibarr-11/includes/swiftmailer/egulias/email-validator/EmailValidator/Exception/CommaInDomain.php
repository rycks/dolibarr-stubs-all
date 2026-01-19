<?php

namespace Egulias\EmailValidator\Exception;

class CommaInDomain extends \Egulias\EmailValidator\Exception\InvalidEmail
{
    const CODE = 200;
    const REASON = "Comma ',' is not allowed in domain part";
}
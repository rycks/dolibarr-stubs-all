<?php

namespace Egulias\EmailValidator\Exception;

class DomainAcceptsNoMail extends \Egulias\EmailValidator\Exception\InvalidEmail
{
    const CODE = 154;
    const REASON = 'Domain accepts no mail (Null MX, RFC7505)';
}
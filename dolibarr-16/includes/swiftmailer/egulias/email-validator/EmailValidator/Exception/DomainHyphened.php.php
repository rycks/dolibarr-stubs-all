<?php

namespace Egulias\EmailValidator\Exception;

class DomainHyphened extends \Egulias\EmailValidator\Exception\InvalidEmail
{
    const CODE = 144;
    const REASON = "Hyphen found in domain";
}
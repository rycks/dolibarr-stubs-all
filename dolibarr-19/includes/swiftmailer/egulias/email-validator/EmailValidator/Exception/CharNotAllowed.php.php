<?php

namespace Egulias\EmailValidator\Exception;

class CharNotAllowed extends \Egulias\EmailValidator\Exception\InvalidEmail
{
    const CODE = 201;
    const REASON = "Non allowed character in domain";
}
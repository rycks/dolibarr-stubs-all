<?php

namespace Egulias\EmailValidator\Exception;

class CRLFX2 extends \Egulias\EmailValidator\Exception\InvalidEmail
{
    const CODE = 148;
    const REASON = "Folding whitespace CR LF found twice";
}
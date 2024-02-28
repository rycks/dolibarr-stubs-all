<?php

namespace Egulias\EmailValidator\Exception;

class CRLFAtTheEnd extends \Egulias\EmailValidator\Exception\InvalidEmail
{
    const CODE = 149;
    const REASON = "CRLF at the end";
}
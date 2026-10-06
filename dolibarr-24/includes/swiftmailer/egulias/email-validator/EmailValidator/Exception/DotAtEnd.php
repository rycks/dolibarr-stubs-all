<?php

namespace Egulias\EmailValidator\Exception;

class DotAtEnd extends \Egulias\EmailValidator\Exception\InvalidEmail
{
    const CODE = 142;
    const REASON = "Dot at the end";
}
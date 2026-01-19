<?php

namespace Egulias\EmailValidator\Exception;

class DotAtStart extends \Egulias\EmailValidator\Exception\InvalidEmail
{
    const CODE = 141;
    const REASON = "Found DOT at start";
}
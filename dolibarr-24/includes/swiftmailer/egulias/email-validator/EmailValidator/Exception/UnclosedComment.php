<?php

namespace Egulias\EmailValidator\Exception;

class UnclosedComment extends \Egulias\EmailValidator\Exception\InvalidEmail
{
    const CODE = 146;
    const REASON = "No closing comment token found";
}
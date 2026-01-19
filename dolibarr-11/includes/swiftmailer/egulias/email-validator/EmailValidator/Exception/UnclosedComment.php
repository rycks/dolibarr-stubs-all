<?php

namespace Egulias\EmailValidator\Exception;

class UnclosedComment extends \Egulias\EmailValidator\Exception\InvalidEmail
{
    const CODE = 146;
    const REASON = "No colosing comment token found";
}
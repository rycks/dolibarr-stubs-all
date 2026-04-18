<?php

namespace Egulias\EmailValidator\Exception;

class UnopenedComment extends \Egulias\EmailValidator\Exception\InvalidEmail
{
    const CODE = 152;
    const REASON = "No opening comment token found";
}
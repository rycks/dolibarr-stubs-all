<?php

namespace Egulias\EmailValidator\Warning;

class QuotedPart extends \Egulias\EmailValidator\Warning\Warning
{
    const CODE = 36;
    /**
     * @param scalar $prevToken
     * @param scalar $postToken
     */
    public function __construct($prevToken, $postToken)
    {
    }
}
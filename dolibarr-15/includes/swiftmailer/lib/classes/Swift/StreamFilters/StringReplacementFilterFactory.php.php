<?php

/*
 * This file is part of SwiftMailer.
 * (c) 2004-2009 Chris Corbyn
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
/**
 * Creates filters for replacing needles in a string buffer.
 *
 * @author Chris Corbyn
 */
class Swift_StreamFilters_StringReplacementFilterFactory implements \Swift_ReplacementFilterFactory
{
    /** Lazy-loaded filters */
    private $filters = array();
    /**
     * Create a new StreamFilter to replace $search with $replace in a string.
     *
     * @param string $search
     * @param string $replace
     *
     * @return Swift_StreamFilter
     */
    public function createFilter($search, $replace)
    {
    }
}
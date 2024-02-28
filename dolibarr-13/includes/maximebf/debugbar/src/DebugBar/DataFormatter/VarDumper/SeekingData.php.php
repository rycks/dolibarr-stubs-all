<?php

namespace DebugBar\DataFormatter\VarDumper;

/**
 * This class backports the seek() function from Symfony 3.2 to older versions - up to v2.6.  The
 * class should not be used with newer Symfony versions that provide the seek function, as it relies
 * on a lot of undocumented functionality.
 */
class SeekingData extends \Symfony\Component\VarDumper\Cloner\Data
{
    // Because the class copies/pastes the seek() implementation from Symfony 3.2, we reproduce its
    // copyright here; this class is subject to the following additional copyright:
    /*
     * Copyright (c) 2014-2017 Fabien Potencier
     *
     * Permission is hereby granted, free of charge, to any person obtaining a copy
     * of this software and associated documentation files (the "Software"), to deal
     * in the Software without restriction, including without limitation the rights
     * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
     * copies of the Software, and to permit persons to whom the Software is furnished
     * to do so, subject to the following conditions:
     *
     * The above copyright notice and this permission notice shall be included in all
     * copies or substantial portions of the Software.
     *
     * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
     * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
     * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
     * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
     * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
     * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
     * THE SOFTWARE.
     */
    private $position = 0;
    private $key = 0;
    /**
     * Seeks to a specific key in nested data structures.
     *
     * @param string|int $key The key to seek to
     *
     * @return self|null A clone of $this of null if the key is not set
     */
    public function seek($key)
    {
    }
    /**
     * {@inheritdoc}
     */
    public function dump(\Symfony\Component\VarDumper\Cloner\DumperInterface $dumper)
    {
    }
}
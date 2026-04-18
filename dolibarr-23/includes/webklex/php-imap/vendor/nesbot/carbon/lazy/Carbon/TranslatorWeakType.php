<?php

namespace Carbon;

class LazyTranslator extends \Carbon\AbstractTranslator
{
    /**
     * Returns the translation.
     *
     * @param string|null $id
     * @param array       $parameters
     * @param string|null $domain
     * @param string|null $locale
     *
     * @return string
     */
    public function trans($id, array $parameters = [], $domain = null, $locale = null)
    {
    }
}
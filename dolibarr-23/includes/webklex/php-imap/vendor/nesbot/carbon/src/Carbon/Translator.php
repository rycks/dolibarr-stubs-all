<?php

namespace Carbon;

class Translator extends \Carbon\LazyTranslator
{
    // Proxy dynamically loaded LazyTranslator in a static way
}
/**
 * This file is part of the Carbon package.
 *
 * (c) Brian Nesbitt <brian@nesbot.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Carbon;

$transMethod = new \ReflectionMethod(class_exists(\Symfony\Contracts\Translation\TranslatorInterface::class) ? \Symfony\Contracts\Translation\TranslatorInterface::class : \Symfony\Component\Translation\Translator::class, 'trans');
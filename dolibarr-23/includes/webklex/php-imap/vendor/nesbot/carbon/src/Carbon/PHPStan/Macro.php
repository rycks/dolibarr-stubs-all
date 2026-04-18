<?php

namespace Carbon\PHPStan;

final class Macro extends \Carbon\PHPStan\LazyMacro
{
}
/**
 * This file is part of the Carbon package.
 *
 * (c) Brian Nesbitt <brian@nesbot.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Carbon\PHPStan;

$method = new \ReflectionMethod(\PHPStan\Reflection\Php\BuiltinMethodReflection::class, 'getReflection');
$method = new \ReflectionMethod(\PHPStan\Reflection\Php\BuiltinMethodReflection::class, 'getFileName');
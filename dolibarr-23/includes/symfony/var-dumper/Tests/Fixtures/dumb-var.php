<?php

namespace Symfony\Component\VarDumper\Tests\Fixture;

class DumbFoo
{
    public $foo = 'foo';
}
namespace Symfony\Component\VarDumper\Tests\Fixture;

$foo = new \Symfony\Component\VarDumper\Tests\Fixture\DumbFoo();
$g = fopen(__FILE__, 'r');
$var = array('number' => 1, null, 'const' => 1.1, true, false, NAN, INF, -INF, PHP_INT_MAX, 'str' => "déjà\n", "\xe9\x00", '[]' => array(), 'res' => $g, 'obj' => $foo, 'closure' => function ($a, \PDO &$b = null) {
}, 'line' => __LINE__ - 1, 'nobj' => array((object) array()));
$r = array();
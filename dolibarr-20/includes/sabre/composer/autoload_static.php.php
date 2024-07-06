<?php

namespace Composer\Autoload;

class ComposerStaticInit51cd53f153efda61d1f1f814155d1c4a
{
    public static $files = array('383eaff206634a77a1be54e64e6459c7' => __DIR__ . '/..' . '/sabre/uri/lib/functions.php', '2b9d0f43f9552984cfa82fee95491826' => __DIR__ . '/..' . '/sabre/event/lib/coroutine.php', 'd81bab31d3feb45bfe2f283ea3c8fdf7' => __DIR__ . '/..' . '/sabre/event/lib/Loop/functions.php', 'a1cce3d26cc15c00fcd0b3354bd72c88' => __DIR__ . '/..' . '/sabre/event/lib/Promise/functions.php', '3569eecfeed3bcf0bad3c998a494ecb8' => __DIR__ . '/..' . '/sabre/xml/lib/Deserializer/functions.php', '93aa591bc4ca510c520999e34229ee79' => __DIR__ . '/..' . '/sabre/xml/lib/Serializer/functions.php', 'ebdb698ed4152ae445614b69b5e4bb6a' => __DIR__ . '/..' . '/sabre/http/lib/functions.php');
    public static $prefixLengthsPsr4 = array('S' => array('Sabre\\Xml\\' => 10, 'Sabre\\VObject\\' => 14, 'Sabre\\Uri\\' => 10, 'Sabre\\HTTP\\' => 11, 'Sabre\\Event\\' => 12, 'Sabre\\' => 6), 'P' => array('Psr\\Log\\' => 8));
    public static $prefixDirsPsr4 = array('Sabre\\Xml\\' => array(0 => __DIR__ . '/..' . '/sabre/xml/lib'), 'Sabre\\VObject\\' => array(0 => __DIR__ . '/..' . '/sabre/vobject/lib'), 'Sabre\\Uri\\' => array(0 => __DIR__ . '/..' . '/sabre/uri/lib'), 'Sabre\\HTTP\\' => array(0 => __DIR__ . '/..' . '/sabre/http/lib'), 'Sabre\\Event\\' => array(0 => __DIR__ . '/..' . '/sabre/event/lib'), 'Sabre\\' => array(0 => __DIR__ . '/..' . '/sabre/dav/lib'), 'Psr\\Log\\' => array(0 => __DIR__ . '/..' . '/psr/log/Psr/Log'));
    public static $classMap = array('Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php');
    public static function getInitializer(\Composer\Autoload\ClassLoader $loader)
    {
    }
}
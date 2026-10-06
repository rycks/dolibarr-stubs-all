<?php

namespace Luracast\Restler\Format;

/**
 * AMF Binary Format for Restler Framework.
 * Native format supported by Adobe Flash and Adobe AIR
 *
 * @category   Framework
 * @package    Restler
 * @subpackage format
 * @author     R.Arul Kumaran <arul@luracast.com>
 * @copyright  2010 Luracast
 * @license    http://www.opensource.org/licenses/lgpl-license.php LGPL
 * @link       http://luracast.com/products/restler/
 *
 */
class AmfFormat extends \Luracast\Restler\Format\DependentFormat
{
    const MIME = 'application/x-amf';
    const EXTENSION = 'amf';
    const PACKAGE_NAME = 'zendframework/zendamf:dev-master';
    const EXTERNAL_CLASS = 'ZendAmf\\Parser\\Amf3\\Deserializer';
    public function encode($data, $humanReadable = false)
    {
    }
    public function decode($data)
    {
    }
}
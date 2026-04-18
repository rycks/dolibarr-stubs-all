<?php

namespace Luracast\Restler\Format;

/**
 * YAML Format for Restler Framework
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
class YamlFormat extends \Luracast\Restler\Format\DependentFormat
{
    const MIME = 'text/plain';
    const EXTENSION = 'yaml';
    const PACKAGE_NAME = 'symfony/yaml:*';
    const EXTERNAL_CLASS = 'Symfony\\Component\\Yaml\\Yaml';
    public function encode($data, $humanReadable = false)
    {
    }
    public function decode($data)
    {
    }
}
<?php

namespace Luracast\Restler\Data;

/**
 * ValueObject base class, you may use this class to create your
 * iValueObjects quickly
 *
 * @category   Framework
 * @package    Restler
 * @author     R.Arul Kumaran <arul@luracast.com>
 * @copyright  2010 Luracast
 * @license    http://www.opensource.org/licenses/lgpl-license.php LGPL
 * @link       http://luracast.com/products/restler/
 * @version    3.0.0rc6
 */
class ValueObject implements \Luracast\Restler\Data\iValueObject
{
    public function __toString()
    {
    }
    public static function __set_state(array $properties)
    {
    }
    public function __toArray()
    {
    }
}
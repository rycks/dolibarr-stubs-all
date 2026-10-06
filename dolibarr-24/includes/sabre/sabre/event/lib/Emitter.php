<?php

namespace Sabre\Event;

/**
 * Emitter object.
 *
 * Instantiate this class, or subclass it for easily creating event emitters.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class Emitter implements \Sabre\Event\EmitterInterface
{
    use \Sabre\Event\EmitterTrait;
}
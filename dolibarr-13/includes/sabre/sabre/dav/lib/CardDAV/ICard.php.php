<?php

namespace Sabre\CardDAV;

/**
 * Card interface
 *
 * Extend the ICard interface to allow your custom nodes to be picked up as
 * 'Cards'.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
interface ICard extends \Sabre\DAV\IFile
{
}
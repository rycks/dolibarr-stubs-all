<?php

namespace Symfony\Component\VarDumper\Caster;

/**
 * Casts XmlReader class to array representation.
 *
 * @author Baptiste Clavié <clavie.b@gmail.com>
 */
class XmlReaderCaster
{
    private static $nodeTypes = array(\XmlReader::NONE => 'NONE', \XmlReader::ELEMENT => 'ELEMENT', \XmlReader::ATTRIBUTE => 'ATTRIBUTE', \XmlReader::TEXT => 'TEXT', \XmlReader::CDATA => 'CDATA', \XmlReader::ENTITY_REF => 'ENTITY_REF', \XmlReader::ENTITY => 'ENTITY', \XmlReader::PI => 'PI (Processing Instruction)', \XmlReader::COMMENT => 'COMMENT', \XmlReader::DOC => 'DOC', \XmlReader::DOC_TYPE => 'DOC_TYPE', \XmlReader::DOC_FRAGMENT => 'DOC_FRAGMENT', \XmlReader::NOTATION => 'NOTATION', \XmlReader::WHITESPACE => 'WHITESPACE', \XmlReader::SIGNIFICANT_WHITESPACE => 'SIGNIFICANT_WHITESPACE', \XmlReader::END_ELEMENT => 'END_ELEMENT', \XmlReader::END_ENTITY => 'END_ENTITY', \XmlReader::XML_DECLARATION => 'XML_DECLARATION');
    public static function castXmlReader(\XmlReader $reader, array $a, \Symfony\Component\VarDumper\Cloner\Stub $stub, $isNested)
    {
    }
}
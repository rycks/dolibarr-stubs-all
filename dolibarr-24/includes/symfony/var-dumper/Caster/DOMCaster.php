<?php

namespace Symfony\Component\VarDumper\Caster;

/**
 * Casts DOM related classes to array representation.
 *
 * @author Nicolas Grekas <p@tchwork.com>
 */
class DOMCaster
{
    private static $errorCodes = array(DOM_PHP_ERR => 'DOM_PHP_ERR', DOM_INDEX_SIZE_ERR => 'DOM_INDEX_SIZE_ERR', DOMSTRING_SIZE_ERR => 'DOMSTRING_SIZE_ERR', DOM_HIERARCHY_REQUEST_ERR => 'DOM_HIERARCHY_REQUEST_ERR', DOM_WRONG_DOCUMENT_ERR => 'DOM_WRONG_DOCUMENT_ERR', DOM_INVALID_CHARACTER_ERR => 'DOM_INVALID_CHARACTER_ERR', DOM_NO_DATA_ALLOWED_ERR => 'DOM_NO_DATA_ALLOWED_ERR', DOM_NO_MODIFICATION_ALLOWED_ERR => 'DOM_NO_MODIFICATION_ALLOWED_ERR', DOM_NOT_FOUND_ERR => 'DOM_NOT_FOUND_ERR', DOM_NOT_SUPPORTED_ERR => 'DOM_NOT_SUPPORTED_ERR', DOM_INUSE_ATTRIBUTE_ERR => 'DOM_INUSE_ATTRIBUTE_ERR', DOM_INVALID_STATE_ERR => 'DOM_INVALID_STATE_ERR', DOM_SYNTAX_ERR => 'DOM_SYNTAX_ERR', DOM_INVALID_MODIFICATION_ERR => 'DOM_INVALID_MODIFICATION_ERR', DOM_NAMESPACE_ERR => 'DOM_NAMESPACE_ERR', DOM_INVALID_ACCESS_ERR => 'DOM_INVALID_ACCESS_ERR', DOM_VALIDATION_ERR => 'DOM_VALIDATION_ERR');
    private static $nodeTypes = array(XML_ELEMENT_NODE => 'XML_ELEMENT_NODE', XML_ATTRIBUTE_NODE => 'XML_ATTRIBUTE_NODE', XML_TEXT_NODE => 'XML_TEXT_NODE', XML_CDATA_SECTION_NODE => 'XML_CDATA_SECTION_NODE', XML_ENTITY_REF_NODE => 'XML_ENTITY_REF_NODE', XML_ENTITY_NODE => 'XML_ENTITY_NODE', XML_PI_NODE => 'XML_PI_NODE', XML_COMMENT_NODE => 'XML_COMMENT_NODE', XML_DOCUMENT_NODE => 'XML_DOCUMENT_NODE', XML_DOCUMENT_TYPE_NODE => 'XML_DOCUMENT_TYPE_NODE', XML_DOCUMENT_FRAG_NODE => 'XML_DOCUMENT_FRAG_NODE', XML_NOTATION_NODE => 'XML_NOTATION_NODE', XML_HTML_DOCUMENT_NODE => 'XML_HTML_DOCUMENT_NODE', XML_DTD_NODE => 'XML_DTD_NODE', XML_ELEMENT_DECL_NODE => 'XML_ELEMENT_DECL_NODE', XML_ATTRIBUTE_DECL_NODE => 'XML_ATTRIBUTE_DECL_NODE', XML_ENTITY_DECL_NODE => 'XML_ENTITY_DECL_NODE', XML_NAMESPACE_DECL_NODE => 'XML_NAMESPACE_DECL_NODE');
    public static function castException(\DOMException $e, array $a, \Symfony\Component\VarDumper\Cloner\Stub $stub, $isNested)
    {
    }
    public static function castLength($dom, array $a, \Symfony\Component\VarDumper\Cloner\Stub $stub, $isNested)
    {
    }
    public static function castImplementation($dom, array $a, \Symfony\Component\VarDumper\Cloner\Stub $stub, $isNested)
    {
    }
    public static function castNode(\DOMNode $dom, array $a, \Symfony\Component\VarDumper\Cloner\Stub $stub, $isNested)
    {
    }
    public static function castNameSpaceNode(\DOMNameSpaceNode $dom, array $a, \Symfony\Component\VarDumper\Cloner\Stub $stub, $isNested)
    {
    }
    public static function castDocument(\DOMDocument $dom, array $a, \Symfony\Component\VarDumper\Cloner\Stub $stub, $isNested, $filter = 0)
    {
    }
    public static function castCharacterData(\DOMCharacterData $dom, array $a, \Symfony\Component\VarDumper\Cloner\Stub $stub, $isNested)
    {
    }
    public static function castAttr(\DOMAttr $dom, array $a, \Symfony\Component\VarDumper\Cloner\Stub $stub, $isNested)
    {
    }
    public static function castElement(\DOMElement $dom, array $a, \Symfony\Component\VarDumper\Cloner\Stub $stub, $isNested)
    {
    }
    public static function castText(\DOMText $dom, array $a, \Symfony\Component\VarDumper\Cloner\Stub $stub, $isNested)
    {
    }
    public static function castTypeinfo(\DOMTypeinfo $dom, array $a, \Symfony\Component\VarDumper\Cloner\Stub $stub, $isNested)
    {
    }
    public static function castDomError(\DOMDomError $dom, array $a, \Symfony\Component\VarDumper\Cloner\Stub $stub, $isNested)
    {
    }
    public static function castLocator(\DOMLocator $dom, array $a, \Symfony\Component\VarDumper\Cloner\Stub $stub, $isNested)
    {
    }
    public static function castDocumentType(\DOMDocumentType $dom, array $a, \Symfony\Component\VarDumper\Cloner\Stub $stub, $isNested)
    {
    }
    public static function castNotation(\DOMNotation $dom, array $a, \Symfony\Component\VarDumper\Cloner\Stub $stub, $isNested)
    {
    }
    public static function castEntity(\DOMEntity $dom, array $a, \Symfony\Component\VarDumper\Cloner\Stub $stub, $isNested)
    {
    }
    public static function castProcessingInstruction(\DOMProcessingInstruction $dom, array $a, \Symfony\Component\VarDumper\Cloner\Stub $stub, $isNested)
    {
    }
    public static function castXPath(\DOMXPath $dom, array $a, \Symfony\Component\VarDumper\Cloner\Stub $stub, $isNested)
    {
    }
}
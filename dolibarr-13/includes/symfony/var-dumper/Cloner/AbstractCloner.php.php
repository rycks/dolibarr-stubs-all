<?php

namespace Symfony\Component\VarDumper\Cloner;

/**
 * AbstractCloner implements a generic caster mechanism for objects and resources.
 *
 * @author Nicolas Grekas <p@tchwork.com>
 */
abstract class AbstractCloner implements \Symfony\Component\VarDumper\Cloner\ClonerInterface
{
    public static $defaultCasters = array('Symfony\\Component\\VarDumper\\Caster\\CutStub' => 'Symfony\\Component\\VarDumper\\Caster\\StubCaster::castStub', 'Symfony\\Component\\VarDumper\\Caster\\CutArrayStub' => 'Symfony\\Component\\VarDumper\\Caster\\StubCaster::castCutArray', 'Symfony\\Component\\VarDumper\\Caster\\ConstStub' => 'Symfony\\Component\\VarDumper\\Caster\\StubCaster::castStub', 'Symfony\\Component\\VarDumper\\Caster\\EnumStub' => 'Symfony\\Component\\VarDumper\\Caster\\StubCaster::castEnum', 'Closure' => 'Symfony\\Component\\VarDumper\\Caster\\ReflectionCaster::castClosure', 'Generator' => 'Symfony\\Component\\VarDumper\\Caster\\ReflectionCaster::castGenerator', 'ReflectionType' => 'Symfony\\Component\\VarDumper\\Caster\\ReflectionCaster::castType', 'ReflectionGenerator' => 'Symfony\\Component\\VarDumper\\Caster\\ReflectionCaster::castReflectionGenerator', 'ReflectionClass' => 'Symfony\\Component\\VarDumper\\Caster\\ReflectionCaster::castClass', 'ReflectionFunctionAbstract' => 'Symfony\\Component\\VarDumper\\Caster\\ReflectionCaster::castFunctionAbstract', 'ReflectionMethod' => 'Symfony\\Component\\VarDumper\\Caster\\ReflectionCaster::castMethod', 'ReflectionParameter' => 'Symfony\\Component\\VarDumper\\Caster\\ReflectionCaster::castParameter', 'ReflectionProperty' => 'Symfony\\Component\\VarDumper\\Caster\\ReflectionCaster::castProperty', 'ReflectionExtension' => 'Symfony\\Component\\VarDumper\\Caster\\ReflectionCaster::castExtension', 'ReflectionZendExtension' => 'Symfony\\Component\\VarDumper\\Caster\\ReflectionCaster::castZendExtension', 'Doctrine\\Common\\Persistence\\ObjectManager' => 'Symfony\\Component\\VarDumper\\Caster\\StubCaster::cutInternals', 'Doctrine\\Common\\Proxy\\Proxy' => 'Symfony\\Component\\VarDumper\\Caster\\DoctrineCaster::castCommonProxy', 'Doctrine\\ORM\\Proxy\\Proxy' => 'Symfony\\Component\\VarDumper\\Caster\\DoctrineCaster::castOrmProxy', 'Doctrine\\ORM\\PersistentCollection' => 'Symfony\\Component\\VarDumper\\Caster\\DoctrineCaster::castPersistentCollection', 'DOMException' => 'Symfony\\Component\\VarDumper\\Caster\\DOMCaster::castException', 'DOMStringList' => 'Symfony\\Component\\VarDumper\\Caster\\DOMCaster::castLength', 'DOMNameList' => 'Symfony\\Component\\VarDumper\\Caster\\DOMCaster::castLength', 'DOMImplementation' => 'Symfony\\Component\\VarDumper\\Caster\\DOMCaster::castImplementation', 'DOMImplementationList' => 'Symfony\\Component\\VarDumper\\Caster\\DOMCaster::castLength', 'DOMNode' => 'Symfony\\Component\\VarDumper\\Caster\\DOMCaster::castNode', 'DOMNameSpaceNode' => 'Symfony\\Component\\VarDumper\\Caster\\DOMCaster::castNameSpaceNode', 'DOMDocument' => 'Symfony\\Component\\VarDumper\\Caster\\DOMCaster::castDocument', 'DOMNodeList' => 'Symfony\\Component\\VarDumper\\Caster\\DOMCaster::castLength', 'DOMNamedNodeMap' => 'Symfony\\Component\\VarDumper\\Caster\\DOMCaster::castLength', 'DOMCharacterData' => 'Symfony\\Component\\VarDumper\\Caster\\DOMCaster::castCharacterData', 'DOMAttr' => 'Symfony\\Component\\VarDumper\\Caster\\DOMCaster::castAttr', 'DOMElement' => 'Symfony\\Component\\VarDumper\\Caster\\DOMCaster::castElement', 'DOMText' => 'Symfony\\Component\\VarDumper\\Caster\\DOMCaster::castText', 'DOMTypeinfo' => 'Symfony\\Component\\VarDumper\\Caster\\DOMCaster::castTypeinfo', 'DOMDomError' => 'Symfony\\Component\\VarDumper\\Caster\\DOMCaster::castDomError', 'DOMLocator' => 'Symfony\\Component\\VarDumper\\Caster\\DOMCaster::castLocator', 'DOMDocumentType' => 'Symfony\\Component\\VarDumper\\Caster\\DOMCaster::castDocumentType', 'DOMNotation' => 'Symfony\\Component\\VarDumper\\Caster\\DOMCaster::castNotation', 'DOMEntity' => 'Symfony\\Component\\VarDumper\\Caster\\DOMCaster::castEntity', 'DOMProcessingInstruction' => 'Symfony\\Component\\VarDumper\\Caster\\DOMCaster::castProcessingInstruction', 'DOMXPath' => 'Symfony\\Component\\VarDumper\\Caster\\DOMCaster::castXPath', 'ErrorException' => 'Symfony\\Component\\VarDumper\\Caster\\ExceptionCaster::castErrorException', 'Exception' => 'Symfony\\Component\\VarDumper\\Caster\\ExceptionCaster::castException', 'Error' => 'Symfony\\Component\\VarDumper\\Caster\\ExceptionCaster::castError', 'Symfony\\Component\\DependencyInjection\\ContainerInterface' => 'Symfony\\Component\\VarDumper\\Caster\\StubCaster::cutInternals', 'Symfony\\Component\\VarDumper\\Exception\\ThrowingCasterException' => 'Symfony\\Component\\VarDumper\\Caster\\ExceptionCaster::castThrowingCasterException', 'Symfony\\Component\\VarDumper\\Caster\\TraceStub' => 'Symfony\\Component\\VarDumper\\Caster\\ExceptionCaster::castTraceStub', 'Symfony\\Component\\VarDumper\\Caster\\FrameStub' => 'Symfony\\Component\\VarDumper\\Caster\\ExceptionCaster::castFrameStub', 'PHPUnit_Framework_MockObject_MockObject' => 'Symfony\\Component\\VarDumper\\Caster\\StubCaster::cutInternals', 'Prophecy\\Prophecy\\ProphecySubjectInterface' => 'Symfony\\Component\\VarDumper\\Caster\\StubCaster::cutInternals', 'Mockery\\MockInterface' => 'Symfony\\Component\\VarDumper\\Caster\\StubCaster::cutInternals', 'PDO' => 'Symfony\\Component\\VarDumper\\Caster\\PdoCaster::castPdo', 'PDOStatement' => 'Symfony\\Component\\VarDumper\\Caster\\PdoCaster::castPdoStatement', 'AMQPConnection' => 'Symfony\\Component\\VarDumper\\Caster\\AmqpCaster::castConnection', 'AMQPChannel' => 'Symfony\\Component\\VarDumper\\Caster\\AmqpCaster::castChannel', 'AMQPQueue' => 'Symfony\\Component\\VarDumper\\Caster\\AmqpCaster::castQueue', 'AMQPExchange' => 'Symfony\\Component\\VarDumper\\Caster\\AmqpCaster::castExchange', 'AMQPEnvelope' => 'Symfony\\Component\\VarDumper\\Caster\\AmqpCaster::castEnvelope', 'ArrayObject' => 'Symfony\\Component\\VarDumper\\Caster\\SplCaster::castArrayObject', 'SplDoublyLinkedList' => 'Symfony\\Component\\VarDumper\\Caster\\SplCaster::castDoublyLinkedList', 'SplFileInfo' => 'Symfony\\Component\\VarDumper\\Caster\\SplCaster::castFileInfo', 'SplFileObject' => 'Symfony\\Component\\VarDumper\\Caster\\SplCaster::castFileObject', 'SplFixedArray' => 'Symfony\\Component\\VarDumper\\Caster\\SplCaster::castFixedArray', 'SplHeap' => 'Symfony\\Component\\VarDumper\\Caster\\SplCaster::castHeap', 'SplObjectStorage' => 'Symfony\\Component\\VarDumper\\Caster\\SplCaster::castObjectStorage', 'SplPriorityQueue' => 'Symfony\\Component\\VarDumper\\Caster\\SplCaster::castHeap', 'OuterIterator' => 'Symfony\\Component\\VarDumper\\Caster\\SplCaster::castOuterIterator', 'MongoCursorInterface' => 'Symfony\\Component\\VarDumper\\Caster\\MongoCaster::castCursor', ':curl' => 'Symfony\\Component\\VarDumper\\Caster\\ResourceCaster::castCurl', ':dba' => 'Symfony\\Component\\VarDumper\\Caster\\ResourceCaster::castDba', ':dba persistent' => 'Symfony\\Component\\VarDumper\\Caster\\ResourceCaster::castDba', ':gd' => 'Symfony\\Component\\VarDumper\\Caster\\ResourceCaster::castGd', ':mysql link' => 'Symfony\\Component\\VarDumper\\Caster\\ResourceCaster::castMysqlLink', ':pgsql large object' => 'Symfony\\Component\\VarDumper\\Caster\\PgSqlCaster::castLargeObject', ':pgsql link' => 'Symfony\\Component\\VarDumper\\Caster\\PgSqlCaster::castLink', ':pgsql link persistent' => 'Symfony\\Component\\VarDumper\\Caster\\PgSqlCaster::castLink', ':pgsql result' => 'Symfony\\Component\\VarDumper\\Caster\\PgSqlCaster::castResult', ':process' => 'Symfony\\Component\\VarDumper\\Caster\\ResourceCaster::castProcess', ':stream' => 'Symfony\\Component\\VarDumper\\Caster\\ResourceCaster::castStream', ':stream-context' => 'Symfony\\Component\\VarDumper\\Caster\\ResourceCaster::castStreamContext', ':xml' => 'Symfony\\Component\\VarDumper\\Caster\\XmlResourceCaster::castXml');
    protected $maxItems = 2500;
    protected $maxString = -1;
    protected $useExt;
    private $casters = array();
    private $prevErrorHandler;
    private $classInfo = array();
    private $filter = 0;
    /**
     * @param callable[]|null $casters A map of casters.
     *
     * @see addCasters
     */
    public function __construct(array $casters = null)
    {
    }
    /**
     * Adds casters for resources and objects.
     *
     * Maps resources or objects types to a callback.
     * Types are in the key, with a callable caster for value.
     * Resource types are to be prefixed with a `:`,
     * see e.g. static::$defaultCasters.
     *
     * @param callable[] $casters A map of casters.
     */
    public function addCasters(array $casters)
    {
    }
    /**
     * Sets the maximum number of items to clone past the first level in nested structures.
     *
     * @param int $maxItems
     */
    public function setMaxItems($maxItems)
    {
    }
    /**
     * Sets the maximum cloned length for strings.
     *
     * @param int $maxString
     */
    public function setMaxString($maxString)
    {
    }
    /**
     * Clones a PHP variable.
     *
     * @param mixed $var    Any PHP variable.
     * @param int   $filter A bit field of Caster::EXCLUDE_* constants.
     *
     * @return Data The cloned variable represented by a Data object.
     */
    public function cloneVar($var, $filter = 0)
    {
    }
    /**
     * Effectively clones the PHP variable.
     *
     * @param mixed $var Any PHP variable.
     *
     * @return array The cloned variable represented in an array.
     */
    protected abstract function doClone($var);
    /**
     * Casts an object to an array representation.
     *
     * @param Stub $stub     The Stub for the casted object.
     * @param bool $isNested True if the object is nested in the dumped structure.
     *
     * @return array The object casted as array.
     */
    protected function castObject(\Symfony\Component\VarDumper\Cloner\Stub $stub, $isNested)
    {
    }
    /**
     * Casts a resource to an array representation.
     *
     * @param Stub $stub     The Stub for the casted resource.
     * @param bool $isNested True if the object is nested in the dumped structure.
     *
     * @return array The resource casted as array.
     */
    protected function castResource(\Symfony\Component\VarDumper\Cloner\Stub $stub, $isNested)
    {
    }
    /**
     * Calls a custom caster.
     *
     * @param callable        $callback The caster.
     * @param object|resource $obj      The object/resource being casted.
     * @param array           $a        The result of the previous cast for chained casters.
     * @param Stub            $stub     The Stub for the casted object/resource.
     * @param bool            $isNested True if $obj is nested in the dumped structure.
     *
     * @return array The casted object/resource.
     */
    private function callCaster($callback, $obj, $a, $stub, $isNested)
    {
    }
}
<?php

namespace Symfony\Component\VarDumper\Caster;

/**
 * Casts Amqp related classes to array representation.
 *
 * @author Grégoire Pineau <lyrixx@lyrixx.info>
 */
class AmqpCaster
{
    private static $flags = array(AMQP_DURABLE => 'AMQP_DURABLE', AMQP_PASSIVE => 'AMQP_PASSIVE', AMQP_EXCLUSIVE => 'AMQP_EXCLUSIVE', AMQP_AUTODELETE => 'AMQP_AUTODELETE', AMQP_INTERNAL => 'AMQP_INTERNAL', AMQP_NOLOCAL => 'AMQP_NOLOCAL', AMQP_AUTOACK => 'AMQP_AUTOACK', AMQP_IFEMPTY => 'AMQP_IFEMPTY', AMQP_IFUNUSED => 'AMQP_IFUNUSED', AMQP_MANDATORY => 'AMQP_MANDATORY', AMQP_IMMEDIATE => 'AMQP_IMMEDIATE', AMQP_MULTIPLE => 'AMQP_MULTIPLE', AMQP_NOWAIT => 'AMQP_NOWAIT', AMQP_REQUEUE => 'AMQP_REQUEUE');
    private static $exchangeTypes = array(AMQP_EX_TYPE_DIRECT => 'AMQP_EX_TYPE_DIRECT', AMQP_EX_TYPE_FANOUT => 'AMQP_EX_TYPE_FANOUT', AMQP_EX_TYPE_TOPIC => 'AMQP_EX_TYPE_TOPIC', AMQP_EX_TYPE_HEADERS => 'AMQP_EX_TYPE_HEADERS');
    public static function castConnection(\AMQPConnection $c, array $a, \Symfony\Component\VarDumper\Cloner\Stub $stub, $isNested)
    {
    }
    public static function castChannel(\AMQPChannel $c, array $a, \Symfony\Component\VarDumper\Cloner\Stub $stub, $isNested)
    {
    }
    public static function castQueue(\AMQPQueue $c, array $a, \Symfony\Component\VarDumper\Cloner\Stub $stub, $isNested)
    {
    }
    public static function castExchange(\AMQPExchange $c, array $a, \Symfony\Component\VarDumper\Cloner\Stub $stub, $isNested)
    {
    }
    public static function castEnvelope(\AMQPEnvelope $c, array $a, \Symfony\Component\VarDumper\Cloner\Stub $stub, $isNested, $filter = 0)
    {
    }
    private static function extractFlags($flags)
    {
    }
}
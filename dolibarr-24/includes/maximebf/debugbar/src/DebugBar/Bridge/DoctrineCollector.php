<?php

namespace DebugBar\Bridge;

/**
 * Collects Doctrine queries
 *
 * http://doctrine-project.org
 *
 * Uses the DebugStack logger to collects data about queries
 *
 * <code>
 * $debugStack = new Doctrine\DBAL\Logging\DebugStack();
 * $entityManager->getConnection()->getConfiguration()->setSQLLogger($debugStack);
 * $debugbar->addCollector(new DoctrineCollector($debugStack));
 * </code>
 */
class DoctrineCollector extends \DebugBar\DataCollector\DataCollector implements \DebugBar\DataCollector\Renderable, \DebugBar\DataCollector\AssetProvider
{
    protected $debugStack;
    /**
     * DoctrineCollector constructor.
     * @param $debugStackOrEntityManager
     * @throws DebugBarException
     */
    public function __construct($debugStackOrEntityManager)
    {
    }
    /**
     * @return array
     */
    public function collect()
    {
    }
    /**
     * @return string
     */
    public function getName()
    {
    }
    /**
     * @return array
     */
    public function getWidgets()
    {
    }
    /**
     * @return array
     */
    public function getAssets()
    {
    }
}
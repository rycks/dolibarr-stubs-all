<?php

namespace PhpOffice\PhpSpreadsheet\Shared\Escher\DgContainer;

class SpgrContainer
{
    /**
     * Parent Shape Group Container.
     *
     * @var \PhpOffice\PhpSpreadsheet\Shared\Escher\DgContainer\SpgrContainer
     */
    private $parent;
    /**
     * Shape Container collection.
     *
     * @var array
     */
    private $children = [];
    /**
     * Set parent Shape Group Container.
     *
     * @param \PhpOffice\PhpSpreadsheet\Shared\Escher\DgContainer\SpgrContainer $parent
     */
    public function setParent($parent)
    {
    }
    /**
     * Get the parent Shape Group Container if any.
     *
     * @return null|\PhpOffice\PhpSpreadsheet\Shared\Escher\DgContainer\SpgrContainer
     */
    public function getParent()
    {
    }
    /**
     * Add a child. This will be either spgrContainer or spContainer.
     *
     * @param mixed $child
     */
    public function addChild($child)
    {
    }
    /**
     * Get collection of Shape Containers.
     */
    public function getChildren()
    {
    }
    /**
     * Recursively get all spContainers within this spgrContainer.
     *
     * @return SpgrContainer\SpContainer[]
     */
    public function getAllSpContainers()
    {
    }
}
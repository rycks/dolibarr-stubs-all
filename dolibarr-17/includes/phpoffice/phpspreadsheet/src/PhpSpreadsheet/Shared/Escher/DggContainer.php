<?php

namespace PhpOffice\PhpSpreadsheet\Shared\Escher;

class DggContainer
{
    /**
     * Maximum shape index of all shapes in all drawings increased by one.
     *
     * @var int
     */
    private $spIdMax;
    /**
     * Total number of drawings saved.
     *
     * @var int
     */
    private $cDgSaved;
    /**
     * Total number of shapes saved (including group shapes).
     *
     * @var int
     */
    private $cSpSaved;
    /**
     * BLIP Store Container.
     *
     * @var DggContainer\BstoreContainer
     */
    private $bstoreContainer;
    /**
     * Array of options for the drawing group.
     *
     * @var array
     */
    private $OPT = [];
    /**
     * Array of identifier clusters containg information about the maximum shape identifiers.
     *
     * @var array
     */
    private $IDCLs = [];
    /**
     * Get maximum shape index of all shapes in all drawings (plus one).
     *
     * @return int
     */
    public function getSpIdMax()
    {
    }
    /**
     * Set maximum shape index of all shapes in all drawings (plus one).
     *
     * @param int $value
     */
    public function setSpIdMax($value)
    {
    }
    /**
     * Get total number of drawings saved.
     *
     * @return int
     */
    public function getCDgSaved()
    {
    }
    /**
     * Set total number of drawings saved.
     *
     * @param int $value
     */
    public function setCDgSaved($value)
    {
    }
    /**
     * Get total number of shapes saved (including group shapes).
     *
     * @return int
     */
    public function getCSpSaved()
    {
    }
    /**
     * Set total number of shapes saved (including group shapes).
     *
     * @param int $value
     */
    public function setCSpSaved($value)
    {
    }
    /**
     * Get BLIP Store Container.
     *
     * @return DggContainer\BstoreContainer
     */
    public function getBstoreContainer()
    {
    }
    /**
     * Set BLIP Store Container.
     *
     * @param DggContainer\BstoreContainer $bstoreContainer
     */
    public function setBstoreContainer($bstoreContainer)
    {
    }
    /**
     * Set an option for the drawing group.
     *
     * @param int $property The number specifies the option
     * @param mixed $value
     */
    public function setOPT($property, $value)
    {
    }
    /**
     * Get an option for the drawing group.
     *
     * @param int $property The number specifies the option
     *
     * @return mixed
     */
    public function getOPT($property)
    {
    }
    /**
     * Get identifier clusters.
     *
     * @return array
     */
    public function getIDCLs()
    {
    }
    /**
     * Set identifier clusters. [<drawingId> => <max shape id>, ...].
     *
     * @param array $pValue
     */
    public function setIDCLs($pValue)
    {
    }
}
<?php

namespace PhpOffice\PhpSpreadsheet\Reader\Xls;

class Escher
{
    const DGGCONTAINER = 0xf000;
    const BSTORECONTAINER = 0xf001;
    const DGCONTAINER = 0xf002;
    const SPGRCONTAINER = 0xf003;
    const SPCONTAINER = 0xf004;
    const DGG = 0xf006;
    const BSE = 0xf007;
    const DG = 0xf008;
    const SPGR = 0xf009;
    const SP = 0xf00a;
    const OPT = 0xf00b;
    const CLIENTTEXTBOX = 0xf00d;
    const CLIENTANCHOR = 0xf010;
    const CLIENTDATA = 0xf011;
    const BLIPJPEG = 0xf01d;
    const BLIPPNG = 0xf01e;
    const SPLITMENUCOLORS = 0xf11e;
    const TERTIARYOPT = 0xf122;
    /**
     * Escher stream data (binary).
     *
     * @var string
     */
    private $data;
    /**
     * Size in bytes of the Escher stream data.
     *
     * @var int
     */
    private $dataSize;
    /**
     * Current position of stream pointer in Escher stream data.
     *
     * @var int
     */
    private $pos;
    /**
     * The object to be returned by the reader. Modified during load.
     *
     * @var BSE|BstoreContainer|DgContainer|DggContainer|\PhpOffice\PhpSpreadsheet\Shared\Escher|SpContainer|SpgrContainer
     */
    private $object;
    /**
     * Create a new Escher instance.
     *
     * @param mixed $object
     */
    public function __construct($object)
    {
    }
    /**
     * Load Escher stream data. May be a partial Escher stream.
     *
     * @param string $data
     *
     * @return BSE|BstoreContainer|DgContainer|DggContainer|\PhpOffice\PhpSpreadsheet\Shared\Escher|SpContainer|SpgrContainer
     */
    public function load($data)
    {
    }
    /**
     * Read a generic record.
     */
    private function readDefault()
    {
    }
    /**
     * Read DggContainer record (Drawing Group Container).
     */
    private function readDggContainer()
    {
    }
    /**
     * Read Dgg record (Drawing Group).
     */
    private function readDgg()
    {
    }
    /**
     * Read BstoreContainer record (Blip Store Container).
     */
    private function readBstoreContainer()
    {
    }
    /**
     * Read BSE record.
     */
    private function readBSE()
    {
    }
    /**
     * Read BlipJPEG record. Holds raw JPEG image data.
     */
    private function readBlipJPEG()
    {
    }
    /**
     * Read BlipPNG record. Holds raw PNG image data.
     */
    private function readBlipPNG()
    {
    }
    /**
     * Read OPT record. This record may occur within DggContainer record or SpContainer.
     */
    private function readOPT()
    {
    }
    /**
     * Read TertiaryOPT record.
     */
    private function readTertiaryOPT()
    {
    }
    /**
     * Read SplitMenuColors record.
     */
    private function readSplitMenuColors()
    {
    }
    /**
     * Read DgContainer record (Drawing Container).
     */
    private function readDgContainer()
    {
    }
    /**
     * Read Dg record (Drawing).
     */
    private function readDg()
    {
    }
    /**
     * Read SpgrContainer record (Shape Group Container).
     */
    private function readSpgrContainer()
    {
    }
    /**
     * Read SpContainer record (Shape Container).
     */
    private function readSpContainer()
    {
    }
    /**
     * Read Spgr record (Shape Group).
     */
    private function readSpgr()
    {
    }
    /**
     * Read Sp record (Shape).
     */
    private function readSp()
    {
    }
    /**
     * Read ClientTextbox record.
     */
    private function readClientTextbox()
    {
    }
    /**
     * Read ClientAnchor record. This record holds information about where the shape is anchored in worksheet.
     */
    private function readClientAnchor()
    {
    }
    /**
     * Read ClientData record.
     */
    private function readClientData()
    {
    }
    /**
     * Read OfficeArtRGFOPTE table of property-value pairs.
     *
     * @param string $data Binary data
     * @param int $n Number of properties
     */
    private function readOfficeArtRGFOPTE($data, $n)
    {
    }
}
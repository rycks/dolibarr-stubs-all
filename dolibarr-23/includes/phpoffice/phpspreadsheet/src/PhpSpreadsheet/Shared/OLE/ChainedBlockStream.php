<?php

namespace PhpOffice\PhpSpreadsheet\Shared\OLE;

class ChainedBlockStream
{
    /**
     * The OLE container of the file that is being read.
     *
     * @var OLE
     */
    public $ole;
    /**
     * Parameters specified by fopen().
     *
     * @var array
     */
    public $params;
    /**
     * The binary data of the file.
     *
     * @var string
     */
    public $data;
    /**
     * The file pointer.
     *
     * @var int byte offset
     */
    public $pos;
    /**
     * Implements support for fopen().
     * For creating streams using this wrapper, use OLE_PPS_File::getStream().
     *
     * @param string $path resource name including scheme, e.g.
     *                                    ole-chainedblockstream://oleInstanceId=1
     * @param string $mode only "r" is supported
     * @param int $options mask of STREAM_REPORT_ERRORS and STREAM_USE_PATH
     * @param string &$openedPath absolute path of the opened stream (out parameter)
     *
     * @return bool true on success
     */
    public function stream_open($path, $mode, $options, &$openedPath)
    {
    }
    /**
     * Implements support for fclose().
     */
    public function stream_close()
    {
    }
    /**
     * Implements support for fread(), fgets() etc.
     *
     * @param int $count maximum number of bytes to read
     *
     * @return string
     */
    public function stream_read($count)
    {
    }
    /**
     * Implements support for feof().
     *
     * @return bool TRUE if the file pointer is at EOF; otherwise FALSE
     */
    public function stream_eof()
    {
    }
    /**
     * Returns the position of the file pointer, i.e. its offset into the file
     * stream. Implements support for ftell().
     *
     * @return int
     */
    public function stream_tell()
    {
    }
    /**
     * Implements support for fseek().
     *
     * @param int $offset byte offset
     * @param int $whence SEEK_SET, SEEK_CUR or SEEK_END
     *
     * @return bool
     */
    public function stream_seek($offset, $whence)
    {
    }
    /**
     * Implements support for fstat(). Currently the only supported field is
     * "size".
     *
     * @return array
     */
    public function stream_stat()
    {
    }
    // Methods used by stream_wrapper_register() that are not implemented:
    // bool stream_flush ( void )
    // int stream_write ( string data )
    // bool rename ( string path_from, string path_to )
    // bool mkdir ( string path, int mode, int options )
    // bool rmdir ( string path, int options )
    // bool dir_opendir ( string path, int options )
    // array url_stat ( string path, int flags )
    // string dir_readdir ( void )
    // bool dir_rewinddir ( void )
    // bool dir_closedir ( void )
}
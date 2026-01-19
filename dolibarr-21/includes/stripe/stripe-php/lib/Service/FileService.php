<?php

namespace Stripe\Service;

class FileService extends \Stripe\Service\AbstractService
{
    /**
     * Returns a list of the files that your account has access to. The files are
     * returned sorted by creation date, with the most recently created files appearing
     * first.
     *
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\File>
     */
    public function all($params = null, $opts = null)
    {
    }
    /**
     * Retrieves the details of an existing file object. Supply the unique file ID from
     * a file, and Stripe will return the corresponding file object. To access file
     * contents, see the <a href="/docs/file-upload#download-file-contents">File Upload
     * Guide</a>.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\File
     */
    public function retrieve($id, $params = null, $opts = null)
    {
    }
    /**
     * Create a file.
     *
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\File
     */
    public function create($params = null, $opts = null)
    {
    }
}
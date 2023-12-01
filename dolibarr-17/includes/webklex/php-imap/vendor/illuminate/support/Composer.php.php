<?php

namespace Illuminate\Support;

class Composer
{
    /**
     * The filesystem instance.
     *
     * @var \Illuminate\Filesystem\Filesystem
     */
    protected $files;
    /**
     * The working path to regenerate from.
     *
     * @var string|null
     */
    protected $workingPath;
    /**
     * Create a new Composer manager instance.
     *
     * @param  \Illuminate\Filesystem\Filesystem  $files
     * @param  string|null  $workingPath
     * @return void
     */
    public function __construct(\Illuminate\Filesystem\Filesystem $files, $workingPath = null)
    {
    }
    /**
     * Regenerate the Composer autoloader files.
     *
     * @param  string|array  $extra
     * @return int
     */
    public function dumpAutoloads($extra = '')
    {
    }
    /**
     * Regenerate the optimized Composer autoloader files.
     *
     * @return int
     */
    public function dumpOptimized()
    {
    }
    /**
     * Get the composer command for the environment.
     *
     * @return array
     */
    protected function findComposer()
    {
    }
    /**
     * Get the PHP binary.
     *
     * @return string
     */
    protected function phpBinary()
    {
    }
    /**
     * Get a new Symfony process instance.
     *
     * @param  array  $command
     * @return \Symfony\Component\Process\Process
     */
    protected function getProcess(array $command)
    {
    }
    /**
     * Set the working path used by the class.
     *
     * @param  string  $path
     * @return $this
     */
    public function setWorkingPath($path)
    {
    }
}
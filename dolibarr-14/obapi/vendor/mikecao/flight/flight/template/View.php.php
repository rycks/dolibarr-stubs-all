<?php

namespace flight\template;

/**
 * The View class represents output to be displayed. It provides
 * methods for managing view data and inserts the data into
 * view templates upon rendering.
 */
class View
{
    /**
     * Location of view templates.
     *
     * @var string
     */
    public $path;
    /**
     * File extension.
     *
     * @var string
     */
    public $extension = '.php';
    /**
     * View variables.
     *
     * @var array
     */
    protected $vars = [];
    /**
     * Template file.
     *
     * @var string
     */
    private $template;
    /**
     * Constructor.
     *
     * @param string $path Path to templates directory
     */
    public function __construct($path = '.')
    {
    }
    /**
     * Gets a template variable.
     *
     * @param string $key Key
     *
     * @return mixed Value
     */
    public function get($key)
    {
    }
    /**
     * Sets a template variable.
     *
     * @param mixed  $key   Key
     * @param string $value Value
     */
    public function set($key, $value = null)
    {
    }
    /**
     * Checks if a template variable is set.
     *
     * @param string $key Key
     *
     * @return bool If key exists
     */
    public function has($key)
    {
    }
    /**
     * Unsets a template variable. If no key is passed in, clear all variables.
     *
     * @param string $key Key
     */
    public function clear($key = null)
    {
    }
    /**
     * Renders a template.
     *
     * @param string $file Template file
     * @param array  $data Template data
     *
     * @throws \Exception If template not found
     */
    public function render($file, $data = null)
    {
    }
    /**
     * Gets the output of a template.
     *
     * @param string $file Template file
     * @param array  $data Template data
     *
     * @return string Output of template
     */
    public function fetch($file, $data = null)
    {
    }
    /**
     * Checks if a template file exists.
     *
     * @param string $file Template file
     *
     * @return bool Template file exists
     */
    public function exists($file)
    {
    }
    /**
     * Gets the full path to a template file.
     *
     * @param string $file Template file
     *
     * @return string Template file location
     */
    public function getTemplate($file)
    {
    }
    /**
     * Displays escaped output.
     *
     * @param string $str String to escape
     *
     * @return string Escaped string
     */
    public function e($str)
    {
    }
}
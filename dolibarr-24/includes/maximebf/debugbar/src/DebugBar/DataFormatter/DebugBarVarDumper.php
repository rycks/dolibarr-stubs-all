<?php

namespace DebugBar\DataFormatter;

/**
 * Clones and renders variables in HTML format using the Symfony VarDumper component.
 *
 * Cloning is decoupled from rendering, so that dumper users can have the fastest possible cloning
 * performance, while delaying rendering until it is actually needed.
 */
class DebugBarVarDumper implements \DebugBar\DataCollector\AssetProvider
{
    protected static $defaultClonerOptions = array();
    protected static $defaultDumperOptions = array('expanded_depth' => 0, 'styles' => array(
        // NOTE:  'default' CSS is also specified in debugbar.css
        'default' => 'word-wrap: break-word; white-space: pre-wrap; word-break: normal',
        'num' => 'font-weight:bold; color:#1299DA',
        'const' => 'font-weight:bold',
        'str' => 'font-weight:bold; color:#3A9B26',
        'note' => 'color:#1299DA',
        'ref' => 'color:#7B7B7B',
        'public' => 'color:#000000',
        'protected' => 'color:#000000',
        'private' => 'color:#000000',
        'meta' => 'color:#B729D9',
        'key' => 'color:#3A9B26',
        'index' => 'color:#1299DA',
        'ellipsis' => 'color:#A0A000',
    ));
    protected $clonerOptions;
    protected $dumperOptions;
    /** @var VarCloner */
    protected $cloner;
    /** @var DebugBarHtmlDumper */
    protected $dumper;
    /**
     * Gets the VarCloner instance with configuration options set.
     *
     * @return VarCloner
     */
    protected function getCloner()
    {
    }
    /**
     * Gets the DebugBarHtmlDumper instance with configuration options set.
     *
     * @return DebugBarHtmlDumper
     */
    protected function getDumper()
    {
    }
    /**
     * Gets the array of non-default VarCloner configuration options.
     *
     * @return array
     */
    public function getClonerOptions()
    {
    }
    /**
     * Merges an array of non-default VarCloner configuration options with the existing non-default
     * options.
     *
     * Configuration options are:
     *  - casters: a map of VarDumper Caster objects to use instead of the default casters.
     *  - additional_casters: a map of VarDumper Caster objects to use in addition to the default
     *    casters.
     *  - max_items: maximum number of items to clone beyond the minimum depth.
     *  - max_string: maximum string size
     *  - min_depth: minimum tree depth to clone before counting items against the max_items limit.
     *    (Requires Symfony 3.4; ignored on older versions.)
     *
     * @param array $options
     */
    public function mergeClonerOptions($options)
    {
    }
    /**
     * Resets the array of non-default VarCloner configuration options without retaining any of the
     * existing non-default options.
     *
     * Configuration options are:
     *  - casters: a map of VarDumper Caster objects to use instead of the default casters.
     *  - additional_casters: a map of VarDumper Caster objects to use in addition to the default
     *    casters.
     *  - max_items: maximum number of items to clone beyond the minimum depth.
     *  - max_string: maximum string size
     *  - min_depth: minimum tree depth to clone before counting items against the max_items limit.
     *    (Requires Symfony 3.4; ignored on older versions.)
     *
     * @param array $options
     */
    public function resetClonerOptions($options = null)
    {
    }
    /**
     * Gets the array of non-default HtmlDumper configuration options.
     *
     * @return array
     */
    public function getDumperOptions()
    {
    }
    /**
     * Merges an array of non-default HtmlDumper configuration options with the existing non-default
     * options.
     *
     * Configuration options are:
     *  - styles: a map of CSS styles to include in the assets, as documented in
     *    HtmlDumper::setStyles.
     *  - expanded_depth: the tree depth to initially expand.
     *    (Requires Symfony 3.2; ignored on older versions.)
     *  - max_string: maximum string size.
     *    (Requires Symfony 3.2; ignored on older versions.)
     *  - file_link_format: link format for files; %f expanded to file and %l expanded to line
     *    (Requires Symfony 3.2; ignored on older versions.)
     *
     * @param array $options
     */
    public function mergeDumperOptions($options)
    {
    }
    /**
     * Resets the array of non-default HtmlDumper configuration options without retaining any of the
     * existing non-default options.
     *
     * Configuration options are:
     *  - styles: a map of CSS styles to include in the assets, as documented in
     *    HtmlDumper::setStyles.
     *  - expanded_depth: the tree depth to initially expand.
     *    (Requires Symfony 3.2; ignored on older versions.)
     *  - max_string: maximum string size.
     *    (Requires Symfony 3.2; ignored on older versions.)
     *  - file_link_format: link format for files; %f expanded to file and %l expanded to line
     *    (Requires Symfony 3.2; ignored on older versions.)
     *
     * @param array $options
     */
    public function resetDumperOptions($options = null)
    {
    }
    /**
     * Captures the data from a variable and serializes it for later rendering.
     *
     * @param mixed $data The variable to capture.
     * @return string Serialized variable data.
     */
    public function captureVar($data)
    {
    }
    /**
     * Gets the display options for the HTML dumper.
     *
     * @return array
     */
    protected function getDisplayOptions()
    {
    }
    /**
     * Renders previously-captured data from captureVar to HTML and returns it as a string.
     *
     * @param string $capturedData Captured data from captureVar.
     * @param array $seekPath Pass an array of keys to traverse if you only want to render a subset
     *                        of the data.
     * @return string HTML rendering of the variable.
     */
    public function renderCapturedVar($capturedData, $seekPath = array())
    {
    }
    /**
     * Captures and renders the data from a variable to HTML and returns it as a string.
     *
     * @param mixed $data The variable to capture and render.
     * @return string HTML rendering of the variable.
     */
    public function renderVar($data)
    {
    }
    /**
     * Returns assets required for rendering variables.
     *
     * @return array
     */
    public function getAssets()
    {
    }
    /**
     * Helper function to dump a Data object to HTML.
     *
     * @param Data $data
     * @return string
     */
    protected function dump(\Symfony\Component\VarDumper\Cloner\Data $data)
    {
    }
}
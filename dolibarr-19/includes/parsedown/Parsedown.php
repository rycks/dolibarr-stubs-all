<?php

#
#
# Parsedown
# http://parsedown.org
#
# (c) Emanuil Rusev
# http://erusev.com
#
# For the full license information, view the LICENSE file that was distributed
# with this source code.
#
#
class Parsedown
{
    # ~
    const version = '1.7.4';
    # ~
    function text($text)
    {
    }
    #
    # Setters
    #
    function setBreaksEnabled($breaksEnabled)
    {
    }
    protected $breaksEnabled;
    function setMarkupEscaped($markupEscaped)
    {
    }
    protected $markupEscaped;
    function setUrlsLinked($urlsLinked)
    {
    }
    protected $urlsLinked = \true;
    function setSafeMode($safeMode)
    {
    }
    protected $safeMode;
    protected $safeLinksWhitelist = array('http://', 'https://', 'ftp://', 'ftps://', 'mailto:', 'data:image/png;base64,', 'data:image/gif;base64,', 'data:image/jpeg;base64,', 'irc:', 'ircs:', 'git:', 'ssh:', 'news:', 'steam:');
    #
    # Lines
    #
    protected $BlockTypes = array('#' => array('Header'), '*' => array('Rule', 'List'), '+' => array('List'), '-' => array('SetextHeader', 'Table', 'Rule', 'List'), '0' => array('List'), '1' => array('List'), '2' => array('List'), '3' => array('List'), '4' => array('List'), '5' => array('List'), '6' => array('List'), '7' => array('List'), '8' => array('List'), '9' => array('List'), ':' => array('Table'), '<' => array('Comment', 'Markup'), '=' => array('SetextHeader'), '>' => array('Quote'), '[' => array('Reference'), '_' => array('Rule'), '`' => array('FencedCode'), '|' => array('Table'), '~' => array('FencedCode'));
    # ~
    protected $unmarkedBlockTypes = array('Code');
    #
    # Blocks
    #
    protected function lines(array $lines)
    {
    }
    protected function isBlockContinuable($Type)
    {
    }
    protected function isBlockCompletable($Type)
    {
    }
    #
    # Code
    protected function blockCode($Line, $Block = \null)
    {
    }
    protected function blockCodeContinue($Line, $Block)
    {
    }
    protected function blockCodeComplete($Block)
    {
    }
    #
    # Comment
    protected function blockComment($Line)
    {
    }
    protected function blockCommentContinue($Line, array $Block)
    {
    }
    #
    # Fenced Code
    protected function blockFencedCode($Line)
    {
    }
    protected function blockFencedCodeContinue($Line, $Block)
    {
    }
    protected function blockFencedCodeComplete($Block)
    {
    }
    #
    # Header
    protected function blockHeader($Line)
    {
    }
    #
    # List
    protected function blockList($Line)
    {
    }
    protected function blockListContinue($Line, array $Block)
    {
    }
    protected function blockListComplete(array $Block)
    {
    }
    #
    # Quote
    protected function blockQuote($Line)
    {
    }
    protected function blockQuoteContinue($Line, array $Block)
    {
    }
    #
    # Rule
    protected function blockRule($Line)
    {
    }
    #
    # Setext
    protected function blockSetextHeader($Line, array $Block = \null)
    {
    }
    #
    # Markup
    protected function blockMarkup($Line)
    {
    }
    protected function blockMarkupContinue($Line, array $Block)
    {
    }
    #
    # Reference
    protected function blockReference($Line)
    {
    }
    #
    # Table
    protected function blockTable($Line, array $Block = \null)
    {
    }
    protected function blockTableContinue($Line, array $Block)
    {
    }
    #
    # ~
    #
    protected function paragraph($Line)
    {
    }
    #
    # Inline Elements
    #
    protected $InlineTypes = array('"' => array('SpecialCharacter'), '!' => array('Image'), '&' => array('SpecialCharacter'), '*' => array('Emphasis'), ':' => array('Url'), '<' => array('UrlTag', 'EmailTag', 'Markup', 'SpecialCharacter'), '>' => array('SpecialCharacter'), '[' => array('Link'), '_' => array('Emphasis'), '`' => array('Code'), '~' => array('Strikethrough'), '\\' => array('EscapeSequence'));
    # ~
    protected $inlineMarkerList = '!"*_&[:<>`~\\';
    #
    # ~
    #
    public function line($text, $nonNestables = array())
    {
    }
    #
    # ~
    #
    protected function inlineCode($Excerpt)
    {
    }
    protected function inlineEmailTag($Excerpt)
    {
    }
    protected function inlineEmphasis($Excerpt)
    {
    }
    protected function inlineEscapeSequence($Excerpt)
    {
    }
    protected function inlineImage($Excerpt)
    {
    }
    protected function inlineLink($Excerpt)
    {
    }
    protected function inlineMarkup($Excerpt)
    {
    }
    protected function inlineSpecialCharacter($Excerpt)
    {
    }
    protected function inlineStrikethrough($Excerpt)
    {
    }
    protected function inlineUrl($Excerpt)
    {
    }
    protected function inlineUrlTag($Excerpt)
    {
    }
    # ~
    protected function unmarkedText($text)
    {
    }
    #
    # Handlers
    #
    protected function element(array $Element)
    {
    }
    protected function elements(array $Elements)
    {
    }
    # ~
    protected function li($lines)
    {
    }
    #
    # Deprecated Methods
    #
    function parse($text)
    {
    }
    protected function sanitiseElement(array $Element)
    {
    }
    protected function filterUnsafeUrlInAttribute(array $Element, $attribute)
    {
    }
    #
    # Static Methods
    #
    protected static function escape($text, $allowQuotes = \false)
    {
    }
    protected static function striAtStart($string, $needle)
    {
    }
    static function instance($name = 'default')
    {
    }
    private static $instances = array();
    #
    # Fields
    #
    protected $DefinitionData;
    #
    # Read-Only
    protected $specialCharacters = array('\\', '`', '*', '_', '{', '}', '[', ']', '(', ')', '>', '#', '+', '-', '.', '!', '|');
    protected $StrongRegex = array('*' => '/^[*]{2}((?:\\\\\\*|[^*]|[*][^*]*[*])+?)[*]{2}(?![*])/s', '_' => '/^__((?:\\\\_|[^_]|_[^_]*_)+?)__(?!_)/us');
    protected $EmRegex = array('*' => '/^[*]((?:\\\\\\*|[^*]|[*][*][^*]+?[*][*])+?)[*](?![*])/s', '_' => '/^_((?:\\\\_|[^_]|__[^_]*__)+?)_(?!_)\\b/us');
    protected $regexHtmlAttribute = '[a-zA-Z_:][\\w:.-]*(?:\\s*=\\s*(?:[^"\'=<>`\\s]+|"[^"]*"|\'[^\']*\'))?';
    protected $voidElements = array('area', 'base', 'br', 'col', 'command', 'embed', 'hr', 'img', 'input', 'link', 'meta', 'param', 'source');
    protected $textLevelElements = array('a', 'br', 'bdo', 'abbr', 'blink', 'nextid', 'acronym', 'basefont', 'b', 'em', 'big', 'cite', 'small', 'spacer', 'listing', 'i', 'rp', 'del', 'code', 'strike', 'marquee', 'q', 'rt', 'ins', 'font', 'strong', 's', 'tt', 'kbd', 'mark', 'u', 'xm', 'sub', 'nobr', 'sup', 'ruby', 'var', 'span', 'wbr', 'time');
}
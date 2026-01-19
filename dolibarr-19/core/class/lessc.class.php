<?php

/**
 * lessphp v0.8.0
 * http://leafo.net/lessphp
 *
 * LESS CSS compiler, adapted from http://lesscss.org
 *
 * Copyright 2013, Leaf Corcoran <leafot@gmail.com>
 * Licensed under MIT or GPLv3, see LICENSE
 */
// phpcs:disable
/**
 * The LESS compiler and parser.
 *
 * Converting LESS to CSS is a three stage process. The incoming file is parsed
 * by `lessc_parser` into a syntax tree, then it is compiled into another tree
 * representing the CSS structure by `lessc`. The CSS tree is fed into a
 * formatter, like `lessc_formatter` which then outputs CSS as a string.
 *
 * During the first compile, all values are *reduced*, which means that their
 * types are brought to the lowest form before being dump as strings. This
 * handles math equations, variable dereferences, and the like.
 *
 * The `parse` function of `lessc` is the entry point.
 *
 * In summary:
 *
 * The `lessc` class creates an instance of the parser, feeds it LESS code,
 * then transforms the resulting tree to a CSS tree. This class also holds the
 * evaluation context, such as all available mixins and variables at any given
 * time.
 *
 * The `lessc_parser` class is only concerned with parsing its input.
 *
 * The `lessc_formatter` takes a CSS tree, and dumps it to a formatted string,
 * handling things like indentation.
 */
class Lessc
{
    public static $VERSION = "v0.8.0";
    public static $TRUE = array("keyword", "true");
    public static $FALSE = array("keyword", "false");
    protected $libFunctions = array();
    protected $registeredVars = array();
    protected $preserveComments = \false;
    public $vPrefix = '@';
    // prefix of abstract properties
    public $mPrefix = '$';
    // prefix of abstract blocks
    public $parentSelector = '&';
    public $importDisabled = \false;
    public $importDir = '';
    public $scope;
    public $formatter;
    public $formatterName;
    public $parser;
    public $_parseFile;
    public $env;
    public $count;
    protected $numberPrecision = \null;
    protected $allParsedFiles = array();
    // set to the parser that generated the current line when compiling
    // so we know how to create error messages
    protected $sourceParser = \null;
    protected $sourceLoc = \null;
    protected static $nextImportId = 0;
    // uniquely identify imports
    // attempts to find the path of an import url, returns null for css files
    protected function findImport($url)
    {
    }
    /**
     * fileExists
     *
     * @param       string  $name   Filename
     * @return      boolean
     */
    protected function fileExists($name)
    {
    }
    public static function compressList($items, $delim)
    {
    }
    public static function preg_quote($what)
    {
    }
    protected function tryImport($importPath, $parentBlock, $out)
    {
    }
    protected function compileImportedProps($props, $block, $out, $sourceParser, $importDir)
    {
    }
    /**
     * Recursively compiles a block.
     *
     * A block is analogous to a CSS block in most cases. A single LESS document
     * is encapsulated in a block when parsed, but it does not have parent tags
     * so all of it's children appear on the root level when compiled.
     *
     * Blocks are made up of props and children.
     *
     * Props are property instructions, array tuples which describe an action
     * to be taken, eg. write a property, set a variable, mixin a block.
     *
     * The children of a block are just all the blocks that are defined within.
     * This is used to look up mixins when performing a mixin.
     *
     * Compiling the block involves pushing a fresh environment on the stack,
     * and iterating through the props, compiling each one.
     *
     * See Lessc::compileProp()
     *
     */
    protected function compileBlock($block)
    {
    }
    protected function compileCSSBlock($block)
    {
    }
    protected function compileMedia($media)
    {
    }
    protected function mediaParent($scope)
    {
    }
    protected function compileNestedBlock($block, $selectors)
    {
    }
    protected function compileRoot($root)
    {
    }
    protected function compileProps($block, $out)
    {
    }
    /**
     * Deduplicate lines in a block. Comments are not deduplicated. If a
     * duplicate rule is detected, the comments immediately preceding each
     * occurence are consolidated.
     */
    protected function deduplicate($lines)
    {
    }
    protected function sortProps($props, $split = \false)
    {
    }
    protected function compileMediaQuery($queries)
    {
    }
    protected function multiplyMedia($env, $childQueries = \null)
    {
    }
    protected function expandParentSelectors(&$tag, $replace)
    {
    }
    protected function findClosestSelectors()
    {
    }
    // multiply $selectors against the nearest selectors in env
    protected function multiplySelectors($selectors)
    {
    }
    // reduces selector expressions
    protected function compileSelectors($selectors)
    {
    }
    protected function eq($left, $right)
    {
    }
    protected function patternMatch($block, $orderedArgs, $keywordArgs)
    {
    }
    protected function patternMatchAll($blocks, $orderedArgs, $keywordArgs, $skip = array())
    {
    }
    // attempt to find blocks matched by path and args
    protected function findBlocks($searchIn, $path, $orderedArgs, $keywordArgs, $seen = array())
    {
    }
    // sets all argument names in $args to either the default value
    // or the one passed in through $values
    protected function zipSetArgs($args, $orderedValues, $keywordValues)
    {
    }
    // compile a prop and update $lines or $blocks appropriately
    protected function compileProp($prop, $block, $out)
    {
    }
    /**
     * Compiles a primitive value into a CSS property value.
     *
     * Values in lessphp are typed by being wrapped in arrays, their format is
     * typically:
     *
     *     array(type, contents [, additional_contents]*)
     *
     * The input is expected to be reduced. This function will not work on
     * things like expressions and variables.
     */
    public function compileValue($value)
    {
    }
    protected function lib_pow($args)
    {
    }
    protected function lib_pi()
    {
    }
    protected function lib_mod($args)
    {
    }
    protected function lib_tan($num)
    {
    }
    protected function lib_sin($num)
    {
    }
    protected function lib_cos($num)
    {
    }
    protected function lib_atan($num)
    {
    }
    protected function lib_asin($num)
    {
    }
    protected function lib_acos($num)
    {
    }
    protected function lib_sqrt($num)
    {
    }
    protected function lib_extract($value)
    {
    }
    protected function lib_isnumber($value)
    {
    }
    protected function lib_isstring($value)
    {
    }
    protected function lib_iscolor($value)
    {
    }
    protected function lib_iskeyword($value)
    {
    }
    protected function lib_ispixel($value)
    {
    }
    protected function lib_ispercentage($value)
    {
    }
    protected function lib_isem($value)
    {
    }
    protected function lib_isrem($value)
    {
    }
    protected function lib_rgbahex($color)
    {
    }
    protected function lib_argb($color)
    {
    }
    /**
     * Given an url, decide whether to output a regular link or the base64-encoded contents of the file
     *
     * @param  array  $value either an argument list (two strings) or a single string
     * @return string        formatted url(), either as a link or base64-encoded
     */
    protected function lib_data_uri($value)
    {
    }
    // utility func to unquote a string
    protected function lib_e($arg)
    {
    }
    protected function lib__sprintf($args)
    {
    }
    protected function lib_floor($arg)
    {
    }
    protected function lib_ceil($arg)
    {
    }
    protected function lib_round($arg)
    {
    }
    protected function lib_unit($arg)
    {
    }
    /**
     * Helper function to get arguments for color manipulation functions.
     * takes a list that contains a color like thing and a percentage
     */
    public function colorArgs($args)
    {
    }
    protected function lib_darken($args)
    {
    }
    protected function lib_lighten($args)
    {
    }
    protected function lib_saturate($args)
    {
    }
    protected function lib_desaturate($args)
    {
    }
    protected function lib_spin($args)
    {
    }
    protected function lib_fadeout($args)
    {
    }
    protected function lib_fadein($args)
    {
    }
    protected function lib_hue($color)
    {
    }
    protected function lib_saturation($color)
    {
    }
    protected function lib_lightness($color)
    {
    }
    // get the alpha of a color
    // defaults to 1 for non-colors or colors without an alpha
    protected function lib_alpha($value)
    {
    }
    // set the alpha of the color
    protected function lib_fade($args)
    {
    }
    protected function lib_percentage($arg)
    {
    }
    /**
     * Mix color with white in variable proportion.
     *
     * It is the same as calling `mix(#ffffff, @color, @weight)`.
     *
     *     tint(@color, [@weight: 50%]);
     *
     * http://lesscss.org/functions/#color-operations-tint
     *
     * @return array Color
     */
    protected function lib_tint($args)
    {
    }
    /**
     * Mix color with black in variable proportion.
     *
     * It is the same as calling `mix(#000000, @color, @weight)`
     *
     *     shade(@color, [@weight: 50%]);
     *
     * http://lesscss.org/functions/#color-operations-shade
     *
     * @return array Color
     */
    protected function lib_shade($args)
    {
    }
    /**
     * lib_mix
     * mixes two colors by weight
     * mix(@color1, @color2, [@weight: 50%]);
     * http://sass-lang.com/docs/yardoc/Sass/Script/Functions.html#mix-instance_method
     *
     * @param array         $args   Args
     * @return array
     */
    protected function lib_mix($args)
    {
    }
    /**
     * lib_contrast
     *
     * @param array         $args   Args
     * @return array
     */
    protected function lib_contrast($args)
    {
    }
    private function toLuma($color)
    {
    }
    protected function lib_luma($color)
    {
    }
    public function assertColor($value, $error = "expected color value")
    {
    }
    public function assertNumber($value, $error = "expecting number")
    {
    }
    public function assertArgs($value, $expectedArgs, $name = "")
    {
    }
    protected function toHSL($color)
    {
    }
    protected function toRGB_helper($comp, $temp1, $temp2)
    {
    }
    /**
     * Converts a hsl array into a color value in rgb.
     * Expects H to be in range of 0 to 360, S and L in 0 to 100
     */
    protected function toRGB($color)
    {
    }
    protected function clamp($v, $max = 1, $min = 0)
    {
    }
    /**
     * Convert the rgb, rgba, hsl color literals of function type
     * as returned by the parser into values of color type.
     */
    protected function funcToColor($func)
    {
    }
    protected function reduce($value, $forExpression = \false)
    {
    }
    // coerce a value for use in color operation
    protected function coerceColor($value)
    {
    }
    // make something string like into a string
    protected function coerceString($value)
    {
    }
    // turn list of length 1 into value type
    protected function flattenList($value)
    {
    }
    public function toBool($a)
    {
    }
    // evaluate an expression
    protected function evaluate($exp)
    {
    }
    protected function stringConcatenate($left, $right)
    {
    }
    // make sure a color's components don't go out of bounds
    protected function fixColor($c)
    {
    }
    protected function op_number_color($op, $lft, $rgt)
    {
    }
    protected function op_color_number($op, $lft, $rgt)
    {
    }
    protected function op_color_color($op, $left, $right)
    {
    }
    public function lib_red($color)
    {
    }
    public function lib_green($color)
    {
    }
    public function lib_blue($color)
    {
    }
    // operator on two numbers
    protected function op_number_number($op, $left, $right)
    {
    }
    /* environment functions */
    protected function makeOutputBlock($type, $selectors = \null)
    {
    }
    // the state of execution
    protected function pushEnv($block = \null)
    {
    }
    // pop something off the stack
    protected function popEnv()
    {
    }
    // set something in the current env
    protected function set($name, $value)
    {
    }
    // get the highest occurrence entry for a name
    protected function get($name)
    {
    }
    // inject array of unparsed strings into environment as variables
    protected function injectVariables($args)
    {
    }
    /**
     * Initialize any static state, can initialize parser for a file
     * $opts isn't used yet
     */
    public function __construct($fname = \null)
    {
    }
    public function compile($string, $name = \null)
    {
    }
    public function compileFile($fname, $outFname = \null)
    {
    }
    // compile only if changed input has changed or output doesn't exist
    public function checkedCompile($in, $out)
    {
    }
    /**
     * Execute lessphp on a .less file or a lessphp cache structure
     *
     * The lessphp cache structure contains information about a specific
     * less file having been parsed. It can be used as a hint for future
     * calls to determine whether or not a rebuild is required.
     *
     * The cache structure contains two important keys that may be used
     * externally:
     *
     * compiled: The final compiled CSS
     * updated: The time (in seconds) the CSS was last compiled
     *
     * The cache structure is a plain-ol' PHP associative array and can
     * be serialized and unserialized without a hitch.
     *
     * @param mixed $in Input
     * @param bool $force Force rebuild?
     * @return array lessphp cache structure
     */
    public function cachedCompile($in, $force = \false)
    {
    }
    // parse and compile buffer
    // This is deprecated
    public function parse($str = \null, $initialVariables = \null)
    {
    }
    protected function makeParser($name)
    {
    }
    public function setFormatter($name)
    {
    }
    protected function newFormatter()
    {
    }
    public function setPreserveComments($preserve)
    {
    }
    public function registerFunction($name, $func)
    {
    }
    public function unregisterFunction($name)
    {
    }
    public function setVariables($variables)
    {
    }
    public function unsetVariable($name)
    {
    }
    public function setImportDir($dirs)
    {
    }
    public function addImportDir($dir)
    {
    }
    public function allParsedFiles()
    {
    }
    public function addParsedFile($file)
    {
    }
    /**
     * Uses the current value of $this->count to show line and line number
     */
    public function throwError($msg = \null)
    {
    }
    // compile file $in to file $out if $in is newer than $out
    // returns true when it compiles, false otherwise
    public static function ccompile($in, $out, $less = \null)
    {
    }
    public static function cexecute($in, $force = \false, $less = \null)
    {
    }
    protected static $cssColors = array('aliceblue' => '240,248,255', 'antiquewhite' => '250,235,215', 'aqua' => '0,255,255', 'aquamarine' => '127,255,212', 'azure' => '240,255,255', 'beige' => '245,245,220', 'bisque' => '255,228,196', 'black' => '0,0,0', 'blanchedalmond' => '255,235,205', 'blue' => '0,0,255', 'blueviolet' => '138,43,226', 'brown' => '165,42,42', 'burlywood' => '222,184,135', 'cadetblue' => '95,158,160', 'chartreuse' => '127,255,0', 'chocolate' => '210,105,30', 'coral' => '255,127,80', 'cornflowerblue' => '100,149,237', 'cornsilk' => '255,248,220', 'crimson' => '220,20,60', 'cyan' => '0,255,255', 'darkblue' => '0,0,139', 'darkcyan' => '0,139,139', 'darkgoldenrod' => '184,134,11', 'darkgray' => '169,169,169', 'darkgreen' => '0,100,0', 'darkgrey' => '169,169,169', 'darkkhaki' => '189,183,107', 'darkmagenta' => '139,0,139', 'darkolivegreen' => '85,107,47', 'darkorange' => '255,140,0', 'darkorchid' => '153,50,204', 'darkred' => '139,0,0', 'darksalmon' => '233,150,122', 'darkseagreen' => '143,188,143', 'darkslateblue' => '72,61,139', 'darkslategray' => '47,79,79', 'darkslategrey' => '47,79,79', 'darkturquoise' => '0,206,209', 'darkviolet' => '148,0,211', 'deeppink' => '255,20,147', 'deepskyblue' => '0,191,255', 'dimgray' => '105,105,105', 'dimgrey' => '105,105,105', 'dodgerblue' => '30,144,255', 'firebrick' => '178,34,34', 'floralwhite' => '255,250,240', 'forestgreen' => '34,139,34', 'fuchsia' => '255,0,255', 'gainsboro' => '220,220,220', 'ghostwhite' => '248,248,255', 'gold' => '255,215,0', 'goldenrod' => '218,165,32', 'gray' => '128,128,128', 'green' => '0,128,0', 'greenyellow' => '173,255,47', 'grey' => '128,128,128', 'honeydew' => '240,255,240', 'hotpink' => '255,105,180', 'indianred' => '205,92,92', 'indigo' => '75,0,130', 'ivory' => '255,255,240', 'khaki' => '240,230,140', 'lavender' => '230,230,250', 'lavenderblush' => '255,240,245', 'lawngreen' => '124,252,0', 'lemonchiffon' => '255,250,205', 'lightblue' => '173,216,230', 'lightcoral' => '240,128,128', 'lightcyan' => '224,255,255', 'lightgoldenrodyellow' => '250,250,210', 'lightgray' => '211,211,211', 'lightgreen' => '144,238,144', 'lightgrey' => '211,211,211', 'lightpink' => '255,182,193', 'lightsalmon' => '255,160,122', 'lightseagreen' => '32,178,170', 'lightskyblue' => '135,206,250', 'lightslategray' => '119,136,153', 'lightslategrey' => '119,136,153', 'lightsteelblue' => '176,196,222', 'lightyellow' => '255,255,224', 'lime' => '0,255,0', 'limegreen' => '50,205,50', 'linen' => '250,240,230', 'magenta' => '255,0,255', 'maroon' => '128,0,0', 'mediumaquamarine' => '102,205,170', 'mediumblue' => '0,0,205', 'mediumorchid' => '186,85,211', 'mediumpurple' => '147,112,219', 'mediumseagreen' => '60,179,113', 'mediumslateblue' => '123,104,238', 'mediumspringgreen' => '0,250,154', 'mediumturquoise' => '72,209,204', 'mediumvioletred' => '199,21,133', 'midnightblue' => '25,25,112', 'mintcream' => '245,255,250', 'mistyrose' => '255,228,225', 'moccasin' => '255,228,181', 'navajowhite' => '255,222,173', 'navy' => '0,0,128', 'oldlace' => '253,245,230', 'olive' => '128,128,0', 'olivedrab' => '107,142,35', 'orange' => '255,165,0', 'orangered' => '255,69,0', 'orchid' => '218,112,214', 'palegoldenrod' => '238,232,170', 'palegreen' => '152,251,152', 'paleturquoise' => '175,238,238', 'palevioletred' => '219,112,147', 'papayawhip' => '255,239,213', 'peachpuff' => '255,218,185', 'peru' => '205,133,63', 'pink' => '255,192,203', 'plum' => '221,160,221', 'powderblue' => '176,224,230', 'purple' => '128,0,128', 'red' => '255,0,0', 'rosybrown' => '188,143,143', 'royalblue' => '65,105,225', 'saddlebrown' => '139,69,19', 'salmon' => '250,128,114', 'sandybrown' => '244,164,96', 'seagreen' => '46,139,87', 'seashell' => '255,245,238', 'sienna' => '160,82,45', 'silver' => '192,192,192', 'skyblue' => '135,206,235', 'slateblue' => '106,90,205', 'slategray' => '112,128,144', 'slategrey' => '112,128,144', 'snow' => '255,250,250', 'springgreen' => '0,255,127', 'steelblue' => '70,130,180', 'tan' => '210,180,140', 'teal' => '0,128,128', 'thistle' => '216,191,216', 'tomato' => '255,99,71', 'transparent' => '0,0,0,0', 'turquoise' => '64,224,208', 'violet' => '238,130,238', 'wheat' => '245,222,179', 'white' => '255,255,255', 'whitesmoke' => '245,245,245', 'yellow' => '255,255,0', 'yellowgreen' => '154,205,50');
}
// responsible for taking a string of LESS code and converting it into a
// syntax tree
class lessc_parser
{
    protected static $nextBlockId = 0;
    // used to uniquely identify blocks
    protected static $precedence = array('=<' => 0, '>=' => 0, '=' => 0, '<' => 0, '>' => 0, '+' => 1, '-' => 1, '*' => 2, '/' => 2, '%' => 2);
    protected static $whitePattern;
    protected static $commentMulti;
    protected static $commentSingle = "//";
    protected static $commentMultiLeft = "/*";
    protected static $commentMultiRight = "*/";
    // regex string to match any of the operators
    protected static $operatorString;
    // these properties will supress division unless it's inside parenthases
    protected static $supressDivisionProps = array('/border-radius$/i', '/^font$/i');
    protected $blockDirectives = array("font-face", "keyframes", "page", "-moz-document", "viewport", "-moz-viewport", "-o-viewport", "-ms-viewport");
    protected $lineDirectives = array("charset");
    /**
     * if we are in parens we can be more liberal with whitespace around
     * operators because it must evaluate to a single value and thus is less
     * ambiguous.
     *
     * Consider:
     *     property1: 10 -5; // is two numbers, 10 and -5
     *     property2: (10 -5); // should evaluate to 5
     */
    protected $inParens = \false;
    // caches preg escaped literals
    protected static $literalCache = array();
    public $env;
    public $buffer;
    public $count;
    public $line;
    public $eatWhiteDefault;
    public $lessc;
    public $sourceName;
    public $writeComments;
    public $seenComments;
    public $currentProperty;
    public $inExp;
    public function __construct($lessc, $sourceName = \null)
    {
    }
    /**
     * Parse a string
     *
     * @param       string  $buffer         String to parse
     * @throws exception
     * @return NULL|stdclass
     */
    public function parse($buffer)
    {
    }
    /**
     * Parse a single chunk off the head of the buffer and append it to the
     * current parse environment.
     * Returns false when the buffer is empty, or when there is an error.
     *
     * This function is called repeatedly until the entire document is
     * parsed.
     *
     * This parser is most similar to a recursive descent parser. Single
     * functions represent discrete grammatical rules for the language, and
     * they are able to capture the text that represents those rules.
     *
     * Consider the function Lessc::keyword(). (all parse functions are
     * structured the same)
     *
     * The function takes a single reference argument. When calling the
     * function it will attempt to match a keyword on the head of the buffer.
     * If it is successful, it will place the keyword in the referenced
     * argument, advance the position in the buffer, and return true. If it
     * fails then it won't advance the buffer and it will return false.
     *
     * All of these parse functions are powered by Lessc::match(), which behaves
     * the same way, but takes a literal regular expression. Sometimes it is
     * more convenient to use match instead of creating a new function.
     *
     * Because of the format of the functions, to parse an entire string of
     * grammatical rules, you can chain them together using &&.
     *
     * But, if some of the rules in the chain succeed before one fails, then
     * the buffer position will be left at an invalid state. In order to
     * avoid this, Lessc::seek() is used to remember and set buffer positions.
     *
     * Before parsing a chain, use $s = $this->seek() to remember the current
     * position into $s. Then if a chain fails, use $this->seek($s) to
     * go back where we started.
     */
    protected function parseChunk()
    {
    }
    protected function isDirective($dirname, $directives)
    {
    }
    protected function fixTags($tags)
    {
    }
    // a list of expressions
    protected function expressionList(&$exps)
    {
    }
    /**
     * Attempt to consume an expression.
     * @link http://en.wikipedia.org/wiki/Operator-precedence_parser#Pseudo-code
     */
    protected function expression(&$out)
    {
    }
    /**
     * recursively parse infix equation with $lhs at precedence $minP
     */
    protected function expHelper($lhs, $minP)
    {
    }
    // consume a list of values for a property
    public function propertyValue(&$value, $keyName = \null)
    {
    }
    protected function parenValue(&$out)
    {
    }
    // a single value
    protected function value(&$value)
    {
    }
    // an import statement
    protected function import(&$out, $value = '')
    {
    }
    protected function mediaQueryList(&$out)
    {
    }
    protected function mediaQuery(&$out)
    {
    }
    protected function mediaExpression(&$out)
    {
    }
    // an unbounded string stopped by $end
    protected function openString($end, &$out, $nestingOpen = \null, $rejectStrs = \null)
    {
    }
    protected function string(&$out)
    {
    }
    protected function interpolation(&$out)
    {
    }
    protected function unit(&$unit)
    {
    }
    // a # color
    protected function color(&$out)
    {
    }
    // consume an argument definition list surrounded by ()
    // each argument is a variable name with optional value
    // or at the end a ... or a variable named followed by ...
    // arguments are separated by , unless a ; is in the list, then ; is the
    // delimiter.
    protected function argumentDef(&$args, &$isVararg)
    {
    }
    // consume a list of tags
    // this accepts a hanging delimiter
    protected function tags(&$tags, $simple = \false, $delim = ',')
    {
    }
    // list of tags of specifying mixin path
    // optionally separated by > (lazy, accepts extra >)
    protected function mixinTags(&$tags)
    {
    }
    // a bracketed value (contained within in a tag definition)
    protected function tagBracket(&$parts, &$hasExpression)
    {
    }
    // a space separated list of selectors
    protected function tag(&$tag, $simple = \false)
    {
    }
    // a css function
    protected function func(&$func)
    {
    }
    // consume a less variable
    protected function variable(&$name)
    {
    }
    /**
     * Consume an assignment operator
     * Can optionally take a name that will be set to the current property name
     */
    protected function assign($name = \null)
    {
    }
    // consume a keyword
    protected function keyword(&$word)
    {
    }
    // consume an end of statement delimiter
    protected function end()
    {
    }
    protected function guards(&$guards)
    {
    }
    // a bunch of guards that are and'd together
    // TODO rename to guardGroup
    protected function guardGroup(&$guardGroup)
    {
    }
    protected function guard(&$guard)
    {
    }
    /* raw parsing functions */
    protected function literal($what, $eatWhitespace = \null)
    {
    }
    protected function genericList(&$out, $parseItem, $delim = "", $flatten = \true)
    {
    }
    // advance counter to next occurrence of $what
    // $until - don't include $what in advance
    // $allowNewline, if string, will be used as valid char set
    protected function to($what, &$out, $until = \false, $allowNewline = \false)
    {
    }
    // try to match something on head of buffer
    protected function match($regex, &$out, $eatWhitespace = \null)
    {
    }
    // match some whitespace
    protected function whitespace()
    {
    }
    // match something without consuming it
    protected function peek($regex, &$out = \null, $from = \null)
    {
    }
    // seek to a spot in the buffer or return where we are on no argument
    protected function seek($where = \null)
    {
    }
    /* misc functions */
    public function throwError($msg = "parse error", $count = \null)
    {
    }
    protected function pushBlock($selectors = \null, $type = \null)
    {
    }
    // push a block that doesn't multiply tags
    protected function pushSpecialBlock($type)
    {
    }
    // append a property to the current block
    protected function append($prop, $pos = \null)
    {
    }
    // pop something off the stack
    protected function pop()
    {
    }
    // remove comments from $text
    // todo: make it work for all functions, not just url
    protected function removeComments($text)
    {
    }
}
class lessc_formatter_classic
{
    public $indentChar = "  ";
    public $break = "\n";
    public $open = " {";
    public $close = "}";
    public $selectorSeparator = ", ";
    public $assignSeparator = ":";
    public $openSingle = " { ";
    public $closeSingle = " }";
    public $disableSingle = \false;
    public $breakSelectors = \false;
    public $compressColors = \false;
    public $indentLevel;
    public function __construct()
    {
    }
    public function indentStr($n = 0)
    {
    }
    public function property($name, $value)
    {
    }
    protected function isEmpty($block)
    {
    }
    public function block($block)
    {
    }
}
/**
 *     Class for compressed result
 */
class lessc_formatter_compressed extends \lessc_formatter_classic
{
    public $disableSingle = \true;
    public $open = "{";
    public $selectorSeparator = ",";
    public $assignSeparator = ":";
    public $break = "";
    public $compressColors = \true;
    public function indentStr($n = 0)
    {
    }
}
/**
 *     Class for lessjs
 */
class lessc_formatter_lessjs extends \lessc_formatter_classic
{
    public $disableSingle = \true;
    public $breakSelectors = \true;
    public $assignSeparator = ": ";
    public $selectorSeparator = ",";
}
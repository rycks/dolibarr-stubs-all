<?php

namespace Luracast\Restler {
    /**
     * Class that implements spl_autoload facilities and multiple
     * conventions support.
     * Supports composer libraries and 100% PSR-0 compliant.
     * In addition we enable namespace prefixing and class aliases.
     *
     * @category   Framework
     * @package    Restler
     * @subpackage helper
     * @author     Nick Lombard <github@jigsoft.co.za>
     * @copyright  2012 Luracast
     * @version    3.0.0rc6
     */
    class AutoLoader
    {
        protected static $instance, $perfectLoaders, $rogueLoaders = array(), $classMap = array(), $aliases = array(
            // aliases and prefixes instead of null list aliases
            'Luracast\\Restler' => null,
            'Luracast\\Restler\\Format' => null,
            'Luracast\\Restler\\Data' => null,
            'Luracast\\Restler\\Filter' => null,
        );
        /**
         * Singleton instance facility.
         *
         * @static
         * @return AutoLoader the current instance or new instance if none exists.
         */
        public static function instance()
        {
        }
        /**
         * Helper function to add a path to the include path.
         * AutoLoader uses the include path to discover classes.
         *
         * @static
         *
         * @param $path string absolute or relative path.
         *
         * @return bool false if the path cannot be resolved
         *              or the resolved absolute path.
         */
        public static function addPath($path)
        {
        }
        /**
         * Other autoLoaders interfere and cause duplicate class loading.
         * AutoLoader is capable enough to handle all standards so no need
         * for others stumbling about.
         *
         * @return callable the one true auto loader.
         */
        public static function thereCanBeOnlyOne()
        {
        }
        /**
         * Seen this before cache handler.
         * Facilitates both lookup and persist operations as well as convenience,
         * load complete map functionality. The key can only be given a non falsy
         * value once, this will be truthy for life.
         *
         * @param $key   mixed class name considered or a collection of
         *                     classMap entries
         * @param $value mixed optional not required when doing a query on
         *                     key. Default is false we haven't seen this
         *                     class. Most of the time it will be the filename
         *                     for include and is set to true if we are unable
         *                     to load this class iow true == it does not exist.
         *                     value may also be a callable auto loader function.
         *
         * @return mixed The known value for the key or false if key has no value
         */
        public static function seen($key, $value = false)
        {
        }
        /**
         * Protected constructor to enforce singleton pattern.
         * Populate a default include path.
         * All possible includes cant possibly be catered for and if you
         * require another path then simply add it calling set_include_path.
         */
        protected function __construct()
        {
        }
        /**
         * Attempt to include the path location.
         * Called from a static context which will not expose the AutoLoader
         * instance itself.
         *
         * @param $path string location of php file on the include path
         *
         * @return bool|mixed returns reference obtained from the include or false
         */
        private static function loadFile($path)
        {
        }
        /**
         * Attempt to load class with namespace prefixes.
         *
         * @param $className string class name
         *
         * @return bool|mixed reference to discovered include or false
         */
        private function loadPrefixes($className)
        {
        }
        /**
         * Attempt to load configured aliases based on namespace part of class name.
         *
         * @param $className string fully qualified class name.
         *
         * @return bool|mixed reference to discovered include or false
         */
        private function loadAliases($className)
        {
        }
        /**
         * Load from rogueLoaders as last resort.
         * It may happen that a custom auto loader may load classes in a unique way,
         * these classes cannot be seen otherwise nor should we attempt to cover every
         * possible deviation. If we still can't find a class, as a last resort, we will
         * run through the list of rogue loaders and verify if we succeeded.
         *
         * @param      $className string className that can't be found
         * @param null $loader callable loader optional when the loader is known
         *
         * @return bool false unless className now exists
         */
        private function loadLastResort($className, $loader = null)
        {
        }
        /**
         * Helper for loadLastResort.
         * Use loader with $className and see if className exists.
         *
         * @param $className string   name of a class to load
         * @param $loader    callable autoLoader method
         *
         * @return bool false unless className exists
         */
        private function loadThisLoader($className, $loader)
        {
        }
        /**
         * Create an alias for class.
         *
         * @param $className    string the name of the alias class
         * @param $currentClass string the current class this alias references
         */
        private function alias($className, $currentClass)
        {
        }
        /**
         * Discovery process.
         *
         * @param $className    string class name to discover
         * @param $currentClass string optional name of current class when
         *                      looking up an alias
         *
         * @return bool|mixed resolved include reference or false
         */
        private function discover($className, $currentClass = null)
        {
        }
        /**
         * Checks whether supplied string exists in a loaded class or interface.
         * As a convenience the supplied $mapping can be the value for seen.
         *
         * @param $className string The class or interface to verify
         * @param $mapping   string (optional) value for map/seen if found to exist
         *
         * @return bool whether the class/interface exists without calling auto loader
         */
        private function exists($className, $mapping = null)
        {
        }
        /**
         * Auto loader callback through __invoke object as function.
         *
         * @param $className string class/interface name to auto load
         *
         * @return mixed|null the reference from the include or null
         */
        public function __invoke($className)
        {
        }
    }
}
namespace {
    /**
     * Include function in the root namespace to include files optimized
     * for the global context.
     *
     * @param $path string path of php file to include into the global context.
     *
     * @return mixed|bool false if the file could not be included.
     */
    function Luracast_Restler_autoloaderInclude($path)
    {
    }
}
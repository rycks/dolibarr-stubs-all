<?php

namespace test\functional;

/**
 * Class MyModuleFunctionalTest
 *
 * Requires chromedriver for Google Chrome
 * Requires geckodriver for Mozilla Firefox
 *
 * @fixme Firefox (Geckodriver/Marionette) support
 * @todo Opera linux support
 * @todo Windows support (IE, Google Chrome, Mozilla Firefox, Safari)
 * @todo OSX support (Safari, Google Chrome, Mozilla Firefox)
 *
 * @package Testmymodule
 */
class MyModuleFunctionalTest extends \PHPUnit_Extensions_Selenium2TestCase
{
    // TODO: move to a global configuration file?
    /** @var string Base URL of the webserver under test */
    protected static $base_url = 'http://dev.zenfusion.fr';
    /**
     * @var string Dolibarr admin username
     * @see authenticate
     */
    protected static $dol_admin_user = 'admin';
    /**
     * @var string Dolibarr admin password
     * @see authenticate
     */
    protected static $dol_admin_pass = 'admin';
    /** @var int Dolibarr module ID */
    private static $module_id = 500000;
    // TODO: autodetect?
    /** @var array Browsers to test with */
    public static $browsers = array(array('browser' => 'Google Chrome on Linux', 'browserName' => 'chrome', 'sessionStrategy' => 'shared', 'desiredCapabilities' => array()));
    /**
     * Helper function to select links by href
     *
     * @param  string  $value      Href
     * @return mixed               Helper string
     */
    protected function byHref($value)
    {
    }
    /**
     * Global test setup
     * @return void
     */
    public static function setUpBeforeClass()
    {
    }
    /**
     * Unit test setup
     * @return void
     */
    public function setUp()
    {
    }
    /**
     * Verify pre conditions
     * @return void
     */
    protected function assertPreConditions()
    {
    }
    /**
     * Handle Dolibarr authentication
     * @return void
     */
    private function authenticate()
    {
    }
    /**
     * Test enabling developer mode
     * @return bool
     */
    public function testEnableDeveloperMode()
    {
    }
    /**
     * Test enabling the module
     *
     * @depends testEnableDeveloperMode
     * @return bool
     */
    public function testModuleEnabled()
    {
    }
    /**
     * Test access to the configuration page
     *
     * @depends testModuleEnabled
     * @return bool
     */
    public function testConfigurationPage()
    {
    }
    /**
     * Test access to the about page
     *
     * @depends testConfigurationPage
     * @return bool
     */
    public function testAboutPage()
    {
    }
    /**
     * Test about page is rendering Markdown
     *
     * @depends testAboutPage
     * @return bool
     */
    public function testAboutPageRendersMarkdownReadme()
    {
    }
    /**
     * Test box is properly declared
     *
     * @depends testModuleEnabled
     * @return bool
     */
    public function testBoxDeclared()
    {
    }
    /**
     * Test trigger is properly enabled
     *
     * @depends testModuleEnabled
     * @return bool
     */
    public function testTriggerDeclared()
    {
    }
    /**
     * Test trigger is properly declared
     *
     * @depends testTriggerDeclared
     * @return bool
     */
    public function testTriggerEnabled()
    {
    }
    /**
     * Verify post conditions
     * @return void
     */
    protected function assertPostConditions()
    {
    }
    /**
     * Unit test teardown
     * @return void
     */
    public function tearDown()
    {
    }
    /**
     * Global test teardown
     * @return void
     */
    public static function tearDownAfterClass()
    {
    }
}
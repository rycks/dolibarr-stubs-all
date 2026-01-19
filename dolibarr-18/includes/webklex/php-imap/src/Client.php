<?php

namespace Webklex\PHPIMAP;

/**
 * Class Client
 *
 * @package Webklex\PHPIMAP
 */
class Client
{
    use \Webklex\PHPIMAP\Traits\HasEvents;
    /**
     * Connection resource
     *
     * @var boolean|Protocol|ProtocolInterface
     */
    public $connection = false;
    /**
     * Server hostname.
     *
     * @var string
     */
    public $host;
    /**
     * Server port.
     *
     * @var int
     */
    public $port;
    /**
     * Service protocol.
     *
     * @var int
     */
    public $protocol;
    /**
     * Server encryption.
     * Supported: none, ssl, tls, or notls.
     *
     * @var string
     */
    public $encryption;
    /**
     * If server has to validate cert.
     *
     * @var bool
     */
    public $validate_cert = true;
    /**
     * Proxy settings
     * @var array
     */
    protected $proxy = ['socket' => null, 'request_fulluri' => false, 'username' => null, 'password' => null];
    /**
     * Connection timeout
     * @var int $timeout
     */
    public $timeout;
    /**
     * Account username/
     *
     * @var mixed
     */
    public $username;
    /**
     * Account password.
     *
     * @var string
     */
    public $password;
    /**
     * Account authentication method.
     *
     * @var string
     */
    public $authentication;
    /**
     * Active folder path.
     *
     * @var string
     */
    protected $active_folder = null;
    /**
     * Default message mask
     *
     * @var string $default_message_mask
     */
    protected $default_message_mask = \Webklex\PHPIMAP\Support\Masks\MessageMask::class;
    /**
     * Default attachment mask
     *
     * @var string $default_attachment_mask
     */
    protected $default_attachment_mask = \Webklex\PHPIMAP\Support\Masks\AttachmentMask::class;
    /**
     * Used default account values
     *
     * @var array $default_account_config
     */
    protected $default_account_config = ['host' => 'localhost', 'port' => 993, 'protocol' => 'imap', 'encryption' => 'ssl', 'validate_cert' => true, 'username' => '', 'password' => '', 'authentication' => null, 'proxy' => ['socket' => null, 'request_fulluri' => false, 'username' => null, 'password' => null], "timeout" => 30];
    /**
     * Client constructor.
     * @param array $config
     *
     * @throws MaskNotFoundException
     */
    public function __construct($config = [])
    {
    }
    /**
     * Client destructor
     */
    public function __destruct()
    {
    }
    /**
     * Set the Client configuration
     * @param array $config
     *
     * @return self
     */
    public function setConfig(array $config)
    {
    }
    /**
     * Set a specific account config
     * @param string $key
     * @param array $config
     * @param array $default_config
     */
    private function setAccountConfig($key, $config, $default_config)
    {
    }
    /**
     * Look for a possible events in any available config
     * @param $config
     */
    protected function setEventsFromConfig($config)
    {
    }
    /**
     * Look for a possible mask in any available config
     * @param $config
     *
     * @throws MaskNotFoundException
     */
    protected function setMaskFromConfig($config)
    {
    }
    /**
     * Get the current imap resource
     *
     * @return bool|Protocol|ProtocolInterface
     * @throws ConnectionFailedException
     */
    public function getConnection()
    {
    }
    /**
     * Determine if connection was established.
     *
     * @return bool
     */
    public function isConnected()
    {
    }
    /**
     * Determine if connection was established and connect if not.
     *
     * @throws ConnectionFailedException
     */
    public function checkConnection()
    {
    }
    /**
     * Force a reconnect
     *
     * @throws ConnectionFailedException
     */
    public function reconnect()
    {
    }
    /**
     * Connect to server.
     *
     * @return $this
     * @throws ConnectionFailedException
     */
    public function connect()
    {
    }
    /**
     * Authenticate the current session
     *
     * @throws ConnectionFailedException
     */
    protected function authenticate()
    {
    }
    /**
     * Disconnect from server.
     *
     * @return $this
     */
    public function disconnect()
    {
    }
    /**
     * Get a folder instance by a folder name
     * @param string $folder_name
     * @param string|bool|null $delimiter
     *
     * @return mixed
     * @throws ConnectionFailedException
     * @throws FolderFetchingException
     * @throws Exceptions\RuntimeException
     */
    public function getFolder($folder_name, $delimiter = null)
    {
    }
    /**
     * Get a folder instance by a folder name
     * @param $folder_name
     *
     * @return mixed
     * @throws ConnectionFailedException
     * @throws FolderFetchingException
     * @throws Exceptions\RuntimeException
     */
    public function getFolderByName($folder_name)
    {
    }
    /**
     * Get a folder instance by a folder path
     * @param $folder_path
     *
     * @return mixed
     * @throws ConnectionFailedException
     * @throws FolderFetchingException
     * @throws Exceptions\RuntimeException
     */
    public function getFolderByPath($folder_path)
    {
    }
    /**
     * Get folders list.
     * If hierarchical order is set to true, it will make a tree of folders, otherwise it will return flat array.
     *
     * @param boolean $hierarchical
     * @param string|null $parent_folder
     *
     * @return FolderCollection
     * @throws ConnectionFailedException
     * @throws FolderFetchingException
     * @throws Exceptions\RuntimeException
     */
    public function getFolders($hierarchical = true, $parent_folder = null)
    {
    }
    /**
     * Open a given folder.
     * @param string $folder_path
     * @param boolean $force_select
     *
     * @return mixed
     * @throws ConnectionFailedException
     * @throws Exceptions\RuntimeException
     */
    public function openFolder($folder_path, $force_select = false)
    {
    }
    /**
     * Create a new Folder
     * @param string $folder
     * @param boolean $expunge
     *
     * @return bool
     * @throws ConnectionFailedException
     * @throws FolderFetchingException
     * @throws Exceptions\EventNotFoundException
     * @throws Exceptions\RuntimeException
     */
    public function createFolder($folder, $expunge = true)
    {
    }
    /**
     * Check a given folder
     * @param $folder
     *
     * @return false|object
     * @throws ConnectionFailedException
     * @throws Exceptions\RuntimeException
     */
    public function checkFolder($folder)
    {
    }
    /**
     * Get the current active folder
     *
     * @return string
     */
    public function getFolderPath()
    {
    }
    /**
     * Retrieve the quota level settings, and usage statics per mailbox
     *
     * @return array
     * @throws ConnectionFailedException
     * @throws Exceptions\RuntimeException
     */
    public function getQuota()
    {
    }
    /**
     * Retrieve the quota settings per user
     * @param string $quota_root
     *
     * @return array
     * @throws ConnectionFailedException
     */
    public function getQuotaRoot($quota_root = 'INBOX')
    {
    }
    /**
     * Delete all messages marked for deletion
     *
     * @return bool
     * @throws ConnectionFailedException
     * @throws Exceptions\RuntimeException
     */
    public function expunge()
    {
    }
    /**
     * Set the connection timeout
     * @param integer $timeout
     *
     * @return Protocol
     * @throws ConnectionFailedException
     */
    public function setTimeout($timeout)
    {
    }
    /**
     * Get the connection timeout
     *
     * @return int
     * @throws ConnectionFailedException
     */
    public function getTimeout()
    {
    }
    /**
     * Get the default message mask
     *
     * @return string
     */
    public function getDefaultMessageMask()
    {
    }
    /**
     * Get the default events for a given section
     * @param $section
     *
     * @return array
     */
    public function getDefaultEvents($section)
    {
    }
    /**
     * Set the default message mask
     * @param $mask
     *
     * @return $this
     * @throws MaskNotFoundException
     */
    public function setDefaultMessageMask($mask)
    {
    }
    /**
     * Get the default attachment mask
     *
     * @return string
     */
    public function getDefaultAttachmentMask()
    {
    }
    /**
     * Set the default attachment mask
     * @param $mask
     *
     * @return $this
     * @throws MaskNotFoundException
     */
    public function setDefaultAttachmentMask($mask)
    {
    }
}
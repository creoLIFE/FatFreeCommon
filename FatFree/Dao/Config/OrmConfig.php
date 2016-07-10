<?php
namespace FatFree\Dao\Config;

use FatFree\Dao\Config\Connection\MysqlConnection;
use Doctrine\Common\Cache\Cache;

class OrmConfig
{

    /**
     * @var Mysql
     */
    private $connection;

    /**
     * @var array
     */
    private $entityPath = [];

    /**
     * @var mixed
     */
    private $cache;

    /**
     * @var string
     */
    private $proxyDir = '/tmp';

    /**
     * @var mixed
     */
    private $env = 'production';

    /**
     * @return Mysql
     */
    public function getConnection()
    {
        return $this->connection;
    }

    /**
     * @param Mysql $connection
     */
    public function setConnection($connection)
    {
        $this->connection = $connection;
    }

    /**
     * @return array
     */
    public function getEntityPath()
    {
        return $this->entityPath;
    }

    /**
     * @param array $entityPath
     */
    public function setEntityPath($entityPath)
    {
        $this->entityPath = $entityPath;
    }

    /**
     * @return mixed
     */
    public function getCache()
    {
        return $this->cache;
    }

    /**
     * @param mixed $cache
     */
    public function setCache($cache)
    {
        $this->cache = $cache;
    }

    /**
     * @return string
     */
    public function getProxyDir()
    {
        return $this->proxyDir;
    }

    /**
     * @param string $proxyDir
     */
    public function setProxyDir($proxyDir)
    {
        $this->proxyDir = $proxyDir;
    }

    /**
     * @return mixed
     */
    public function getEnv()
    {
        return $this->env;
    }

    /**
     * @param mixed $env
     */
    public function setEnv($env)
    {
        $this->env = $env;
    }

}

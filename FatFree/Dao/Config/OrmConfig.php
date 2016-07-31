<?php
namespace FatFree\Dao\Config;

use FatFree\Dao\Config\Connection\MysqlConnection;

class OrmConfig
{
    /**
     * @var MysqlConnection
     */
    protected $connection;

    /**
     * @var array
     */
    protected $entityPath = [];

    /**
     * @var mixed
     */
    protected $cache;

    /**
     * @var string
     */
    protected $proxyDir = '/tmp/orm/proxy';

    /**
     * @var string
     */
    protected $proxyNamespace = 'OrmProxies';

    /**
     * @var boolean
     */
    protected $proxyAutogenerate = false;

    /**
     * @var string
     */
    protected $hydratorDir = '/tmp/orm/hydrator';

    /**
     * @var string
     */
    protected $hydratorNamespace = 'OrmHydrators';

    /**
     * @var boolean
     */
    protected $hydratorAutogenerate = false;

    /**
     * @var mixed
     */
    protected $env = 'production';


    /**
     * OrmConfig constructor.
     */
    public function __construct()
    {
        $this->connection = new MysqlConnection();
    }


    /**
     * @return MysqlConnection
     */
    public function getConnection()
    {
        return $this->connection;
    }

    /**
     * @param MysqlConnection $connection
     */
    public function setConnection(MysqlConnection $connection)
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
     * @return string
     */
    public function getProxyNamespace()
    {
        return $this->proxyNamespace;
    }

    /**
     * @param string $proxyNamespace
     */
    public function setProxyNamespace($proxyNamespace)
    {
        $this->proxyNamespace = $proxyNamespace;
    }

    /**
     * @return boolean
     */
    public function isProxyAutogenerate()
    {
        return $this->proxyAutogenerate;
    }

    /**
     * @param boolean $proxyAutogenerate
     */
    public function setProxyAutogenerate($proxyAutogenerate)
    {
        $this->proxyAutogenerate = $proxyAutogenerate;
    }

    /**
     * @return string
     */
    public function getHydratorDir()
    {
        return $this->hydratorDir;
    }

    /**
     * @param string $hydratorDir
     */
    public function setHydratorDir($hydratorDir)
    {
        $this->hydratorDir = $hydratorDir;
    }

    /**
     * @return string
     */
    public function getHydratorNamespace()
    {
        return $this->hydratorNamespace;
    }

    /**
     * @param string $hydratorNamespace
     */
    public function setHydratorNamespace($hydratorNamespace)
    {
        $this->hydratorNamespace = $hydratorNamespace;
    }

    /**
     * @return boolean
     */
    public function isHydratorAutogenerate()
    {
        return $this->hydratorAutogenerate;
    }

    /**
     * @param boolean $hydratorAutogenerate
     */
    public function setHydratorAutogenerate($hydratorAutogenerate)
    {
        $this->hydratorAutogenerate = $hydratorAutogenerate;
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

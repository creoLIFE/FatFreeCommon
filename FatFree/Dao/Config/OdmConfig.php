<?php
namespace FatFree\Dao\Config;

use FatFree\Dao\Config\Connection\MongodbConnection;

class OdmConfig
{
    /**
     * @var MongodbConnection
     */
    protected $connection;

    /**
     * @var array
     */
    protected $documentPath = [];

    /**
     * @var mixed
     */
    protected $cache;

    /**
     * @var mixed
     */
    protected $defaultDB;

    /**
     * @var string
     */
    protected $proxyDir = '/tmp/odm/proxy';

    /**
     * @var string
     */
    protected $proxyNamespace = 'OdmProxies';

    /**
     * @var string
     */
    protected $hydratorDir = '/tmp/odm/hydrator';

    /**
     * @var string
     */
    protected $hydratorNamespace = 'OdmHydrators';

    /**
     * @var mixed
     */
    protected $env = 'production';


    /**
     * OrmConfig constructor.
     */
    public function __construct()
    {
        $this->connection = new MongodbConnection();
    }


    /**
     * @return MongodbConnection
     */
    public function getConnection()
    {
        return $this->connection;
    }

    /**
     * @param MongodbConnection $connection
     */
    public function setConnection(MongodbConnection $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @return array
     */
    public function getDocumentPath()
    {
        return $this->documentPath;
    }

    /**
     * @param array $documentPath
     */
    public function setDocumentPath($documentPath)
    {
        $this->documentPath = $documentPath;
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
     * @return mixed
     */
    public function getDefaultDB()
    {
        return $this->defaultDB;
    }

    /**
     * @param mixed $defaultDB
     */
    public function setDefaultDB($defaultDB)
    {
        $this->defaultDB = $defaultDB;
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

}

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
     * @return array
     */
    public function getCache()
    {
        return $this->cache;
    }

    /**
     * @param array $cache
     */
    public function setCache(Cache $cache)
    {
        $this->cache = $cache;
    }
}

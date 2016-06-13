<?php
namespace FatFree\Dao\Config;

use FatFree\Dao\Config\Connection\MysqlConnection;

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
     * @return Mysql
     */
    public function getConnection()
    {
        return $this->connection;
    }

    /**
     * @param Mysql $connection
     */
    public function setConnection(MysqlConnection $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @return string
     */
    public function getEntityPath()
    {
        return $this->entityPath;
    }

    /**
     * @param string $entityPath
     */
    public function setEntityPath($entityPath)
    {
        $this->entityPath = $entityPath;
    }
}

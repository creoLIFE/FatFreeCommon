<?php
namespace FatFree\Dao\Config\Connection;

class MysqlConnection
{
    /**
     * @var string
     */
    public $driver = 'pdo_mysql';

    /**
     * @var string
     */
    public $host = 'localhost';

    /**
     * @var int
     */
    public $port = 3306;

    /**
     * @var string
     */
    public $dbname;

    /**
     * @var string
     */
    public $user;

    /**
     * @var string
     */
    public $password;

    /**
     * @var string
     */
    public $charset = 'UTF8';

    /**
     * Convert object to array
     */
    public function toArray()
    {
        return (array)$this;
    }

    /**
     * Convert object to array
     */
    public function fromArray(array $params)
    {
        foreach (get_object_vars($this) as $key => $var) {
            if (array_key_exists($key, $params)) {
                $this->$key = $params[$key];
            }
        }

        return $this;
    }
}

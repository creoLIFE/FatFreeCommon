<?php
namespace FatFree\Dao\Config\Connection;

use Doctrine\MongoDB\Connection;

class MongodbConnection extends Connection
{
    /**
     * @var string
     */
    public $host = 'localhost';

    /**
     * @var int
     */
    public $port = 27017;

    /**
     * @var string
     */
    public $dbname;

    /**
     * @var string
     */
    public $username;

    /**
     * @var string
     */
    public $password;

    /**
     * @var string
     */
    public $charset = 'UTF8';

    /**
     * @var mixed
     */
    private $w = 1;

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

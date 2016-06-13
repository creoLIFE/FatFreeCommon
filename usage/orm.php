<?php
require_once('../vendor/autoload.php');
require_once('../FatFree/loader.php');
require_once('./Service/OrmService.php');

use FatFree\Dao\Config\OrmConfig;
use FatFree\Dao\Config\Connection\MysqlConnection;
use FatFree\Dao\DoctrineOrm;
use Doctrine\ORM\EntityManager;
use Test\Service\OrmService;
use Doctrine\Common\Cache\MemcacheCache;

$mysqlConnection = new MysqlConnection();
$vars = [
    'dbname' => 'tdn',
    'user' => 'root',
    'password' => 'root'
];
$mysqlConnection->fromArray($vars);

$ormConfig = new OrmConfig();
$ormConfig->setEntityPath('./Entity/');
$ormConfig->setCache(new MemcacheCache);
$ormConfig->setConnection($mysqlConnection);

$dao = new DoctrineOrm($ormConfig);
if ($dao instanceof DoctrineOrm) {
    var_dump('DAO instance');
} else {
    var_dump('NOT DAO instance');
}

$testService = new OrmService($ormConfig);
if ($testService->entityManager instanceof EntityManager) {
    var_dump('EntityManager instance');
} else {
    var_dump('NOT EntityManager instance');
}



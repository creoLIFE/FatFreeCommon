<?php
require_once ('../vendor/autoload.php');
require_once ('../FatFree/loader.php');

use FatFree\Dao\Config\OrmConfig;
use FatFree\Dao\Config\Connection\MysqlConnection;
use FatFree\Dao\DoctrineOrm;

$mysqlConnection = new MysqlConnection();
$vars = [
    'dbname' => 'tdn',
    'user' => 'root',
    'password' => 'root'
];
$mysqlConnection->fromArray($vars);

print_r($mysqlConnection);
die();

$ormConfig = new OrmConfig();
$ormConfig->setEntityPath('./Entity/');
$ormConfig->setConnection($mysqlConnection);

$dao = new DoctrineOrm($ormConfig);

if( $dao instanceof DoctrineOrm ){
    var_dump(true);
}
else{
    var_dump(false);
}


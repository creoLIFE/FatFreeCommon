<?php
require_once ('../vendor/autoload.php');
require_once ('../FatFree/loader.php');

use FatFree\Dao\Config\OrmConfig;
use FatFree\Dao\Config\Connection\MysqlConnection;
use FatFree\Dao\DoctrineOrm;

$mysqlConnection = new MysqlConnection();
$mysqlConnection->dbname = 'tdn';
$mysqlConnection->user = 'root';
$mysqlConnection->password = 'root';

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


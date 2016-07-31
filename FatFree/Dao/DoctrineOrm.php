<?php
/**
 * Created by PhpStorm.
 * User: miroslawratman
 * Date: 06/10/15
 * Time: 21:13
 */

namespace FatFree\Dao;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Doctrine\Common\Cache\ApcCache;
use Doctrine\Common\Cache\ArrayCache;

use FatFree\Dao\Config\OrmConfig;

class DoctrineOrm
{
    /**
     * @var EntityManager
     */
    public $entityManager;

    /**
     * DoctrineOrm constructor.
     * @param OrmConfig $ormConfig
     */
    public function __construct(OrmConfig $ormConfig)
    {
        $config = Setup::createAnnotationMetadataConfiguration(
            (array)$ormConfig->getEntityPath(),
            $ormConfig->getEnv() !== 'production' ? true : false
        );
        $config->setMetadataDriverImpl(
            AnnotationDriver::create(
                (array)$ormConfig->getEntityPath()
            )
        );
        $config->setMetadataCacheImpl($ormConfig->getCache());
        $config->setProxyDir($ormConfig->getProxyDir());

        $this->entityManager = EntityManager::create($ormConfig->getConnection()->toArray(), $config);

        return $this;
    }
}


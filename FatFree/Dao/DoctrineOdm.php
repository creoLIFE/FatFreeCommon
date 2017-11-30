<?php
/**
 * Created by PhpStorm.
 * User: miroslawratman
 * Date: 06/10/15
 * Time: 21:13
 */

namespace FatFree\Dao;

use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Configuration;
use Doctrine\ODM\MongoDB\Mapping\Driver\AnnotationDriver;
use FatFree\Dao\Config\OdmConfig;

class DoctrineOdm
{
    /**
     * @var DocumentManager
     */
    public $documentManager;

    /**
     * DoctrineOdm constructor.
     * @param OdmConfig $odmConfig
     */
    public function __construct(OdmConfig $odmConfig)
    {
        $config = new Configuration();

        $config->setProxyDir($odmConfig->getProxyDir());
        $config->setProxyNamespace($odmConfig->getProxyNamespace());
        $config->setAutoGenerateProxyClasses($odmConfig->isProxyAutogenerate());
        $config->setHydratorDir($odmConfig->getHydratorDir());
        $config->setHydratorNamespace($odmConfig->getHydratorNamespace());
        $config->setAutoGenerateHydratorClasses($odmConfig->isHydratorAutogenerate());
        $config->setDefaultDB($odmConfig->getDefaultDB());
        $config->setMetadataDriverImpl(
            AnnotationDriver::create(
                (array)$odmConfig->getDocumentPath()
            )
        );

        AnnotationDriver::registerAnnotationClasses();

        $this->documentManager = DocumentManager::create(
            $odmConfig->getConnection(),
            $config
        );

        return $this;
    }
}


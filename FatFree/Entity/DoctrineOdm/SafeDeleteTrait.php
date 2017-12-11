<?php

namespace FatFree\Entity\DoctrineOdm;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

trait SafeDeleteTrait
{
    /**
     * @var boolean
     * @ODM\Field(type="boolean", nullable=false)
     */
    private $safeDelete = 0;

    /**
     * @return string
     */
    public function getSafedelete()
    {
        return $this->safedelete;
    }

    /**
     * @param string $safedelete
     */
    public function setSafedelete($safedelete)
    {
        $this->safedelete = $safedelete;
    }

}

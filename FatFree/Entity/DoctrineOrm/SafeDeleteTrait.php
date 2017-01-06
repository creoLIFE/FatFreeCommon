<?php

namespace FatFree\Entity\DoctrineOrm;

use Doctrine\ORM\Mapping as ORM;

trait SafeDeleteTrait
{
    /**
     * @var boolean
     * @ORM\Column(type="boolean", nullable=false)
     */
    protected $safeDelete = 0;

    /**
     * @return boolean
     */
    public function isSafeDelete()
    {
        return $this->safeDelete;
    }

    /**
     * @param boolean $safeDelete
     */
    public function setSafeDelete($safeDelete)
    {
        $this->safeDelete = $safeDelete;
    }
}

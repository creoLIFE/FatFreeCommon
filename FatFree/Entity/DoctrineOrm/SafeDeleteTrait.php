<?php

namespace FatFree\Entity\DoctrineOrm;

use Doctrine\ORM\Mapping as ORM;

trait SafeDeleteTrait
{
    /**
     * @var boolean
     * @ORM\Column(type="boolean", nullable=false)
     */
    protected $_safeDelete = 0;

    /**
     * @return bool
     */
    public function isSafeDelete()
    {
        return $this->_safeDelete;
    }

    /**
     * @param bool $safeDelete
     */
    public function setSafeDelete($safeDelete)
    {
        $this->_safeDelete = $safeDelete;
    }

}

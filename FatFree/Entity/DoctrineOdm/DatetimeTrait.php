<?php

namespace FatFree\Entity\DoctrineOdm;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

trait DatetimeTrait
{
    /**
     * @var string
     * @ODM\Field(type="date", nullable=true)
     */
    private $_created;

    /**
     * @var string
     * @ODM\Field(type="date", nullable=true)
     */
    private $_modified;

    /**
     * @var string
     * @ODM\Field(type="date", nullable=true)
     */
    private $_deleted;

    /**
     * @return string
     */
    public function getCreated()
    {
        return $this->_created;
    }

    /**
     * @param string $created
     */
    public function setCreated($created)
    {
        $this->_created = $created;
    }

    /**
     * @return string
     */
    public function getModified()
    {
        return $this->_modified;
    }

    /**
     * @param string $modified
     */
    public function setModified($modified)
    {
        $this->_modified = $modified;
    }

    /**
     * @return string
     */
    public function getDeleted()
    {
        return $this->_deleted;
    }

    /**
     * @param string $deleted
     */
    public function setDeleted($deleted)
    {
        $this->_deleted = $deleted;
    }

}

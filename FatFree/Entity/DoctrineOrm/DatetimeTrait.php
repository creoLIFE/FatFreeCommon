<?php

namespace FatFree\Entity\DoctrineOrm;

use Doctrine\ORM\Mapping as ORM;

trait DatetimeTrait
{
    /**
     * @var string
     * @ORM\Column(type="datetime", length=30, nullable=true)
     */
    protected $_created;

    /**
     * @var string
     * @ORM\Column(type="datetime", length=30, nullable=true)
     */
    protected $_modified;

    /**
     * @var string
     * @ORM\Column(type="datetime", length=30, nullable=true)
     */
    protected $_deleted;

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

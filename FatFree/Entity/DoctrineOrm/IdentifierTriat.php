<?php
namespace FatFree\Entity\DoctrineOrm;

use Doctrine\ORM\Mapping as ORM;

trait IdentifierTriat
{
    /**
     * @var integer
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Clone ID
     */
    public function __clone()
    {
        $this->id = NULL;
    }

    /**
     * Checks if ID is set
     * @return boolean
     */
    public function isIdSet()
    {
        return $this->id || $this->id === 0 || $this->id === '0' ? true : false;
    }

}

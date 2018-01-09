<?php
namespace FatFree\Entity\DoctrineOrm;

use Doctrine\ORM\Mapping as ORM;

trait IdentifierTrait
{
    /**
     * @var integer
     * @ORM\Id
     * @ORM\Column(type="integer", length=50, nullable=false, unique=true)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

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

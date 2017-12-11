<?php
namespace FatFree\Entity\DoctrineOdm;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

trait IdentifierTrait
{
    /**
     * @var integer
     * @ODM\Id
     * @ODM\Field(type="integer")
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

    public function __clone()
    {
        $this->id = NULL;
    }

}

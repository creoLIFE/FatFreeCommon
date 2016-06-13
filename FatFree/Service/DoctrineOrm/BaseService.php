<?php
namespace FatFree\Service\DoctrineOrm;

use FatFree\Dao\DoctrineOrm;
use FatFree\Entity\DoctrineOrm\BaseEntity;
use FatFree\Service\ServiceException;

abstract class BaseService extends DoctrineOrm
{
    /**
     * Method will insert entity to DB
     * @param BaseEntity $entity
     * @param array $values
     * @return BaseEntity|void
     * @throws ServiceException
     */
    public function insert(BaseEntity $entity, array $values)
    {
        if (empty($values)) {
            throw new ServiceException('No data proviced for insert');
            return $entity;
        }

        //Map data to entity
        $entity->fromArray($this->prepareAttributes($entity, $values));
        $entity->setCreated(date("Y-m-d H:i:s"));

        return $this->entityManager
            ->persist($entity);
    }

    /**
     * Method will insert entity to DB
     * @param BaseEntity $entity
     * @param array $values
     * @return BaseEntity|void
     * @throws ServiceException
     */
    public function insertIfNotExist(BaseEntity $entity, array $values)
    {
        if (empty($values)) {
            throw new ServiceException('No data provided for insert');
            return $entity;
        }

        //Map data to entity
        $entity->fromArray($this->prepareAttributes($entity, $values));

        if (!self::exist($entity)) {
            $entity->setCreated(date("Y-m-d H:i:s"));
            $entity = $this->entityManager
                ->persist($entity);
        }

        return $entity;
    }

    /**
     * Method will check if entity exists in DB by Its ID
     * @param BaseEntity $entity
     * @return bool
     */
    public function exist(BaseEntity $entity)
    {
        return $this->entityManager
            ->getRepository($entity::getClassName())
            ->find($entity) ? true : false;
    }

    /**
     * Method will delete entity to DB
     * @param BaseEntity $entity
     * @return integer|false
     */
    public function delete(BaseEntity $entity)
    {
        return $this->entityManager
            ->remove($entity);
    }

    /**
     * Method will mark entity as deleted but will not delete it
     * @param BaseEntity $entity
     * @return BaseEntity
     */
    public function deleteSafe(BaseEntity $entity)
    {
        $entity->setSafedelete(1);
        $entity->setDeleted(date("Y-m-d H:i:s"));
        return $this->update($entity);
    }

    /**
     * Method will update entity
     * @param BaseEntity $entity
     * @return BaseEntity
     */
    public function update(BaseEntity $entity)
    {
        $entity->setUpdated(date("Y-m-d H:i:s"));
        $this->entityManager->merge($entity);
    }

    /**
     * Method will flush changes
     */
    public function flush()
    {
        $this->entityManager->flush();
    }

    /**
     * Prepare attributes for BaseEntity
     * @param BaseEntity $entity
     * @param array $attributes
     * @return mixed
     */
    public function prepareAttributes(BaseEntity $entity, array $attributes)
    {
        foreach ($attributes as $fieldName => &$fieldValue) {
            if (!$this->entityManager->getClassMetadata($entity::getClassName())->hasAssociation($fieldName)) {
                continue;
            }

            $association = $this->entityManager->getClassMetadata($entity::getClassName())
                ->getAssociationMapping($fieldName);

            if (is_null($fieldValue)) {
                continue;
            }

            $fieldValue = $this->entityManager->getReference($association['targetEntity'], $fieldValue);

            unset($fieldValue);
        }

        return $attributes;
    }
}

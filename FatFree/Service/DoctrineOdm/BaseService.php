<?php
namespace FatFree\Service\DoctrineOdm;

use FatFree\Dao\DoctrineOdm;
use FatFree\Entity\DoctrineOdm\BaseEntity;
use FatFree\Service\ServiceException;

abstract class BaseService extends DoctrineOdm
{
    /**
     * Method will insert entity to DB
     * @param BaseEntity $entity
     * @param array $values
     * @return BaseEntity|void
     * @throws ServiceException
     */
    public function insert(BaseEntity $entity, array $values = [])
    {
        if (empty($values)) {
            //Map data to entity
            $entity->fromArray($this->prepareAttributes($entity, $values));
        }

        $entity->setCreated(date("Y-m-d H:i:s"));

        $this->documentManager
            ->persist($entity);

        return $entity;
    }

    /**
     * Method will insert entity to DB
     * @param BaseEntity $entity
     * @param array $values
     * @return BaseEntity|void
     * @throws ServiceException
     */
    public function insertIfNotExist(BaseEntity $entity, array $values = [])
    {
        if (empty($values)) {
            //Map data to entity
            $entity->fromArray($this->prepareAttributes($entity, $values));
        }

        if (!self::exist($entity)) {
            $entity->setCreated(date("Y-m-d H:i:s"));
            $entity = $this->documentManager
                ->persist($entity);
        }

        return $entity;
    }

    /**
     * Method will insert entity to DB when same entity doesnt exist. Existing entity will be checked by given keys
     * @param BaseEntity $entity
     * @param array $values
     * @param array $keys
     * @return BaseEntity|void
     * @throws ServiceException
     */
    public function insertIfNotExistByKeys(BaseEntity $entity, array $values = [], array $keys)
    {
        if (empty($values)) {
            //Map data to entity
            $entity->fromArray($this->prepareAttributes($entity, $values));
        }

        $foundEntity = $this->documentManager
            ->getRepository($entity->getClassName())
            ->findOneByKeys($entity, $keys);

        if (!$foundEntity) {
            $entity->setCreated(date("Y-m-d H:i:s"));
            $this->documentManager
                ->persist($entity);
            $this->documentManager
                ->flush();

            return $entity;
        }

        return $foundEntity;
    }

    /**
     * Method will check if entity exists in DB by Its ID
     * @param BaseEntity $entity
     * @return bool
     */
    public function exist(BaseEntity $entity)
    {
        return $this->documentManager
            ->getRepository($entity->getClassName())
            ->find($entity) ? true : false;
    }

    /**
     * Method will delete entity to DB
     * @param BaseEntity $entity
     * @return integer|false
     */
    public function delete(BaseEntity $entity)
    {
        return $this->documentManager
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
     * @param array $values
     * @return BaseEntity
     */
    public function update(BaseEntity $entity, array $values = [])
    {
        if (empty($values)) {
            //Map data to entity
            $entity->fromArray($this->prepareAttributes($entity, $values));
        }

        $entity->setModified(date("Y-m-d H:i:s"));
        $this->documentManager->merge($entity);

        return $entity;
    }

    /**
     * Method will flush changes
     */
    public function flush()
    {
        $this->documentManager->flush();
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
            if (!$this->documentManager->getClassMetadata($entity->getClassName())->hasAssociation($fieldName)) {
                continue;
            }

            $association = $this->documentManager->getClassMetadata($entity->getClassName())
                ->getAssociationMapping($fieldName);

            if (is_null($fieldValue)) {
                continue;
            }

            $fieldValue = $this->documentManager->getReference($association['targetEntity'], $fieldValue);

            unset($fieldValue);
        }

        return $attributes;
    }
}

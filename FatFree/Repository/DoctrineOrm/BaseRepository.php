<?php
namespace FatFree\Repository\DoctrineOrm;

use Doctrine\ORM\EntityRepository;
use FatFree\Entity\DoctrineOrm\BaseEntity;

abstract class BaseRepository extends EntityRepository
{

    /**
     * Method will return entity by its ID
     * @param BaseEntity $entity
     * @return bool
     */
    public function findOneById(BaseEntity $entity, array $order = null)
    {
        return $this->findOneBy(
            [
                BaseEntity::APP_ENUM_DOCTRINEORM_ENTITY_ID => $entity->{'get' . ucfirst(BaseEntity::APP_ENUM_DOCTRINEORM_ENTITY_ID)}()
            ],
            $order
        );
    }

    /**
     * Method will return entities by key names
     * @param BaseEntity $entity
     * @param array $keys
     * @return BaseEntity|bool
     */
    public function findOneByKeys(BaseEntity $entity, array $keys, array $order = null)
    {
        $arr = $entity->toArray();

        $criteria = [];
        $result = null;

        foreach ($keys as $key) {
            if (isset($arr[$key])) {
                $criteria[$key] = $arr[$key];
            }
        }

        if (count($criteria)) {
            $result = $this->findOneBy($criteria, $order);
        }

        return $result ? $result : false;
    }

    /**
     * Method will return entities by key name
     * @param BaseEntity $entity
     * @param string $key
     * @return BaseEntity|bool
     */
    public function findByKey(BaseEntity $entity, $key, array $orderBy = null, $limit = null, $offset = null)
    {
        $arr = $entity->toArray();

        if (array_key_exists($key, $arr)) {
            return $this->findBy(
                [
                    $key => $arr[$key]
                ],
                $orderBy,
                $limit,
                $offset
            );
        }
        return false;
    }

    /**
     * Method will return entities by key names
     * @param BaseEntity $entity
     * @param array $keys
     * @return array(BaseEntity)|bool
     */
    public function findByKeys(BaseEntity $entity, array $keys, array $orderBy = null, $limit = null, $offset = null)
    {
        $arr = $entity->toArray();
        $criteria = [];
        $result = null;

        foreach ($keys as $key) {
            if (isset($arr[$key])) {
                $criteria[$key] = $arr[$key];
            }
        }

        if (count($criteria)) {
            $result = $this->findBy($criteria, $orderBy, $limit, $offset);
        }

        return $result ? $result : false;
    }
}

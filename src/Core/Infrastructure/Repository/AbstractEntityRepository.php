<?php

namespace src\Core\Infrastructure\Repository;

use src\Core\Domain\Entity\EntityInterface;
use Yii;
use yii\db\Expression;

abstract class AbstractEntityRepository
{
    /**
     * @param EntityInterface $entity
     * @return bool
     * @throws \yii\db\Exception
     */
    public function save(EntityInterface $entity): bool
    {

        if (!$entity->id) {
            return $this->insert($entity);
        }
        return $this->update($entity);
    }

    /**
     * @param EntityInterface $entity
     * @return bool
     * @throws \yii\db\Exception
     */
    public function insert(EntityInterface $entity): bool
    {
        $attributes = $entity->getAttributes();
        foreach ($attributes as $key => $value) {
            if (is_null($value)) {
                $attributes[$key] = new Expression("DEFAULT");
            }
        }
        return (bool)Yii::$app->db->createCommand()
            ->insert($entity->getTableName(), $attributes)
            ->execute();
    }

    /**
     * @param EntityInterface $entity
     * @return bool
     * @throws \yii\db\Exception
     */
    public function update(EntityInterface $entity): bool
    {
        return (bool)Yii::$app->db->createCommand()
            ->update($entity->getTableName(), $entity->getAttributes())
            ->execute();
    }
}
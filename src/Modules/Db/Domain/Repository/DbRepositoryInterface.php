<?php


namespace src\Modules\Db\Domain\Repository;


use src\Core\Domain\Entity\EntityInterface;

interface DbRepositoryInterface
{
    public function findAll(): array;

    public function save(EntityInterface $entity): bool;
}
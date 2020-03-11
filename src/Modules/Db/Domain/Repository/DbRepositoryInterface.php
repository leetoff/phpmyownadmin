<?php


namespace src\Modules\Db\Domain\Repository;


interface DbRepositoryInterface
{
    public function findAll(): array;
}
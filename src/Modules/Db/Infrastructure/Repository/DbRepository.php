<?php


namespace src\Modules\Db\Infrastructure\Repository;

use src\Core\Infrastructure\Repository\AbstractEntityRepository;
use src\Modules\Db\Domain\Entity\DbTable;
use src\Modules\Db\Domain\Repository\DbRepositoryInterface;
use yii\db\Query;

class DbRepository extends AbstractEntityRepository implements DbRepositoryInterface
{
    public function findAll(): array
    {
        $result = (new Query())
            ->from(DbTable::TABLE_NAME)
            ->all();
        $dbTables = [];
        foreach ($result as $source)
        {
            $dbTable = new DbTable();
            foreach ($source as $attr => $value) {
               $dbTable->{$attr} = $value;
            }
            $dbTables[] = $dbTable;
        }
        return $dbTables;
    }
}
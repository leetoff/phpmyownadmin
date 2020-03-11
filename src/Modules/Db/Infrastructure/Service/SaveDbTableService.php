<?php


namespace src\Modules\Db\Infrastructure\Service;


use src\Modules\Db\Domain\Entity\DbTable;
use src\Modules\Db\Domain\Repository\DbRepositoryInterface;

class SaveDbTableService
{
    /** @var DbRepositoryInterface */
    private $dbRepository;

    public function __construct(DbRepositoryInterface $dbRepository)
    {
        $this->dbRepository = $dbRepository;
    }

    public function createDbTable(DbTable $dbTable)
    {
        $savingResult = $this->dbRepository->save($dbTable);
        return $savingResult;
    }
}
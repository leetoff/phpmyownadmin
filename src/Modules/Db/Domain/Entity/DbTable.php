<?php


namespace src\Modules\Db\Domain\Entity;


use src\Core\Domain\Entity\EntityInterface;

class DbTable implements EntityInterface
{
    public const TABLE_NAME = 'db_table';

    /** @var int */
    public $id;

    /** @var string */
    public $name;

    /** @var string */
    public $title;

    /** @var string */
    public $created_at;

    /** @var string */
    public $updated_at;

    /** @var int */
    public $updated_by;

    /** @var int */
    public $created_by;

    public function getTableName(): string
    {
        return self::TABLE_NAME;
    }
}
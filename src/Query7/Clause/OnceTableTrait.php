<?php
declare(strict_types=1);
namespace Query7\Clause;

use Query7\CrudQuery\QueryInterface;

trait OnceTableTrait
{
    /**
     * @var string
     */
    protected $table = "";

    /**
     * @param string $table
     * @return QueryInterface
     */
    public function setTable(string $table)
    {
        if (!$this->isValidOnceTable()) {
            $this->table = $table;
        }
        return $this;
    }

    /**
     * @return string
     */
    public function generateOnceTable(): string
    {
        return $this->table;
    }

    /**
     * @return boolean
     */
    public function isValidOnceTable(): bool
    {
        return $this->table !== "";
    }
}

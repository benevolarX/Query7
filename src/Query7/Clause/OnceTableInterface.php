<?php
declare(strict_types=1);
namespace Query7\Clause;

use Query7\CrudQuery\QueryInterface;

interface OnceTableInterface
{

    /**
     * @param string $table
     * @return QueryInterface
     */
    public function setTable(string $table);

    /**
     * @return string
     */
    public function generateTable(): string;

    /**
     * @return boolean
     */
    public function isValidOnceTable(): bool;
}

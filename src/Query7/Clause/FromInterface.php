<?php
declare(strict_types=1);
namespace Query7\Clause;

use Query7\CrudQuery\QueryInterface;

interface FromInterface
{
    /**
     * @param string $table
     * @param string|null $alias
     * @return QueryInterface
     */
    public function from(string $table, ?string $alias = null);

    /**
     * @return boolean
     */
    public function isValidFrom(): bool;

    /**
     * @return string
     */
    public function generateFrom(): string;
}

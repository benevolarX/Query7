<?php
declare(strict_types=1);
namespace Query7\Clause;

use Query7\CrudQuery\QueryInterface;

interface LimitInterface
{
    /**
     * @param integer $min
     * @param integer|null $max
     * @return QueryInterface
     */
    public function limit(int $min = 1, ?int $max = null);

    /**
     * @param integer $offset
     * @return QueryInterface
     */
    public function offset(int $offset);

    /**
     * @return boolean
     */
    public function isValidLimit(): bool;

    /**
     * @return string
     */
    public function generateLimit(): string;
}

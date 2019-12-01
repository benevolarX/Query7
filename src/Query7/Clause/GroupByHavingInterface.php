<?php
declare(strict_types=1);
namespace Query7\Clause;

use Query7\CrudQuery\QueryInterface;

interface GroupByHavingInterface
{
    /**
     * @param string $group
     * @return QueryInterface
     */
    public function groupBy(string ...$cols);

    /**
     * @param ConditionTree|string $test
     * @return QueryInterface
     */
    public function having($test);

    /**
     * @return boolean
     */
    public function isValidGroupByHaving(): bool;

    /**
     * @return string
     */
    public function generateGroupByHaving(): string;
}
